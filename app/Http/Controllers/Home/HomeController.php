<?php

namespace App\Http\Controllers\Home;

use App\Http\Controllers\Controller;
use App\Models\FreelanceJob;
use App\Models\Category;

class HomeController extends Controller
{
    public function index()
    {
        $stats = [
            'total_jobs' => FreelanceJob::active()->count(),
            'total_companies' => FreelanceJob::active()->distinct('company')->count('company'),
            'featured_categories' => $this->getFeaturedCategories(),
        ];

        $featured_jobs = FreelanceJob::with('user')
            ->active()
            ->orderBy('created_at', 'desc')
            ->take(6)
            ->get();

        return view('home', compact('stats', 'featured_jobs'));
    }

    private function getFeaturedCategories()
    {
        return Category::withCount(['jobs as active_jobs_count' => function($query) {
                $query->where('status', 'open')
                    ->where('end_date', '>', now());
            }])
            ->active()
            ->having('active_jobs_count', '>', 0)
            ->orderBy('active_jobs_count', 'desc')
            ->take(6)
            ->get();
    }
}
