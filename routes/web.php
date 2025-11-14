<?php

use App\Http\Controllers\FreelanceJob\FreelanceJobController;
use App\Http\Controllers\Home\HomeController;
use Illuminate\Support\Facades\Route;

Route::get('/', [HomeController::class, 'index'])->name('home');
Route::get('/vagas', [FreelanceJobController::class, 'index'])->name('jobs.index');
Route::get('/vagas/busca', [FreelanceJobController::class, 'search'])->name('jobs.search');
Route::get('/vagas/detalhes/{job}', [FreelanceJobController::class, 'show'])->name('jobs.show');

Route::middleware(['auth'])->group(function () {
    Route::get('/vagas/criar', [FreelanceJobController::class, 'create'])->name('jobs.create');
    Route::post('/vagas', [FreelanceJobController::class, 'store'])->name('jobs.store');
    Route::get('/minhas-vagas', [FreelanceJobController::class, 'myJobs'])->name('jobs.my');
    Route::get('/minhas-vagas/{job}/editar', [FreelanceJobController::class, 'edit'])->name('jobs.edit');
    Route::put('/minhas-vagas/{job}', [FreelanceJobController::class, 'update'])->name('jobs.update');
    Route::delete('/minhas-vagas/{job}', [FreelanceJobController::class, 'destroy'])->name('jobs.destroy');
});

require __DIR__.'/auth.php';