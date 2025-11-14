<?php

namespace App\Http\Controllers\FreelanceJob;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Models\FreelanceJob;
use App\Models\Category;

class FreelanceJobController extends Controller
{
    public function index()
    {
        $jobs = FreelanceJob::with('user')
            ->active()
            ->orderBy('created_at', 'desc')
            ->paginate(12);

        $categories = Category::active()->orderBy('name')->get();

        return view('jobs.index', compact('jobs', 'categories'));
    }

    public function create()
    {
        if (!Auth::check()) {
            return redirect()->route('login');
        }

        $categories = Category::active()->orderBy('name')->get();
        return view('jobs.create', compact('categories'));
    }

    public function store(Request $request)
    {
        if (!Auth::check()) {
            return redirect()->route('login');
        }

        $validated = $request->validate([
            'title' => 'required|string|max:255',
            'description' => 'required|string',
            'category_id' => 'required|exists:categories,id',
            'vacancies_count' => 'required|integer|min:1',
            'paid_value' => 'required|numeric|min:0',
            'requirements' => 'nullable|string',
            'start_date' => 'required|date|after_or_equal:today',
            'end_date' => 'required|date|after:start_date',
            'company' => 'required|string|max:255',
            'location' => 'required|string|max:255',
        ]);

        FreelanceJob::create([
            'user_id' => Auth::id(),
            'status' => FreelanceJob::STATUS_OPEN, // Define status como open por padrão
            ...$validated
        ]);

        return redirect()->route('jobs.index')
            ->with('success', 'Vaga publicada com sucesso!');
    }

    public function show(FreelanceJob $job)
    {
        $related_jobs = FreelanceJob::with(['user', 'category'])
            ->where('category_id', $job->category_id)
            ->where('id', '!=', $job->id)
            ->where('status', 'open')
            ->where('end_date', '>', now())
            ->orderBy('created_at', 'desc')
            ->take(3)
            ->get();
        return view('jobs.show', compact('job', 'related_jobs'));
    }

    public function search(Request $request)
    {
        $query = FreelanceJob::with(['user', 'category'])
            ->where('status', 'open')
            ->where('end_date', '>', now());

        if ($request->has('search') && $request->search) {
            $query->where(function ($q) use ($request) {
                $q->where('title', 'like', "%{$request->search}%")
                    ->orWhere('description', 'like', "%{$request->search}%")
                    ->orWhere('company', 'like', "%{$request->search}%")
                    ->orWhereHas('category', function ($categoryQuery) use ($request) {
                        $categoryQuery->where('name', 'like', "%{$request->search}%");
                    });
            });
        }

        if ($request->has('category') && $request->category) {
            $query->where('category_id', $request->category);
        }

        $jobs = $query->orderBy('created_at', 'desc')->paginate(12);
        $categories = Category::active()->orderBy('name')->get();

        return view('jobs.index', compact('jobs', 'categories'));
    }

    // Métodos para gerenciar status (opcional - para o futuro)
    public function updateStatus(Request $request, FreelanceJob $job)
    {
        if (!Auth::check() || Auth::id() !== $job->user_id) {
            return redirect()->back()->with('error', 'Você não tem permissão para esta ação.');
        }

        $request->validate([
            'status' => 'required|in:open,filled,done'
        ]);

        $job->update(['status' => $request->status]);

        return redirect()->back()->with('success', 'Status da vaga atualizado!');
    }

    public function myJobs()
    {
        $jobs = FreelanceJob::with(['category'])
            ->where('user_id', auth()->id())
            ->orderBy('created_at', 'desc')
            ->paginate(12);

        return view('jobs.my-jobs', compact('jobs'));
    }

    public function edit(FreelanceJob $job)
    {
        // Verificar se o usuário é o dono da vaga
        if ($job->user_id !== auth()->id()) {
            abort(403, 'Acesso não autorizado.');
        }

        $categories = Category::active()->orderBy('name')->get();
        return view('jobs.edit', compact('job', 'categories'));
    }

    public function update(Request $request, FreelanceJob $job)
    {
        // Verificar se o usuário é o dono da vaga
        if ($job->user_id !== auth()->id()) {
            abort(403, 'Acesso não autorizado.');
        }

        $validated = $request->validate([
            'title' => 'required|string|max:255',
            'description' => 'required|string',
            'category_id' => 'required|exists:categories,id',
            'vacancies_count' => 'required|integer|min:1',
            'paid_value' => 'required|numeric|min:0',
            'requirements' => 'nullable|string',
            'start_date' => 'required|date|after_or_equal:today',
            'end_date' => 'required|date|after:start_date',
            'company' => 'required|string|max:255',
            'location' => 'required|string|max:255',
            'status' => 'required|in:open,filled,done',
        ]);

        $job->update($validated);

        return redirect()->route('jobs.my')
            ->with('success', 'Vaga atualizada com sucesso!');
    }

    public function destroy(FreelanceJob $job)
    {
        // Verificar se o usuário é o dono da vaga
        if ($job->user_id !== auth()->id()) {
            abort(403, 'Acesso não autorizado.');
        }

        $job->delete();

        return redirect()->route('jobs.my')
            ->with('success', 'Vaga excluída com sucesso!');
    }
}
