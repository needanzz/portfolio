<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\ProfileController;

use App\Models\Project;

Route::get('/', function () {
    $projects = Project::featured()
        ->orderBy('order', 'asc')
        ->orderBy('created_at', 'desc')
        ->take(2)
        ->get();

    if ($projects->count() < 2) {
        $additional = Project::whereNotIn('id', $projects->pluck('id'))
            ->orderBy('order', 'asc')
            ->orderBy('created_at', 'desc')
            ->take(2 - $projects->count())
            ->get();
        $projects = $projects->concat($additional);
    }

    return view('pages.dashboard', compact('projects'));
})->name('dashboard');

use App\Http\Controllers\ProjectController;
use App\Http\Controllers\Api\ProjectApiController;

Route::get('/profile', [ProfileController::class, 'index'])->name('profile');

Route::get('/projects', [ProjectController::class, 'index'])->name('projects.index');
Route::get('/projects/{project}', [ProjectController::class, 'show'])->name('projects.show');
Route::get('/api/projects', [ProjectApiController::class, 'index'])->name('api.projects.index');

use App\Http\Controllers\ExperienceController;

Route::get('/experience', [ExperienceController::class, 'index'])->name('experience');

use App\Http\Controllers\FreelancePriceController;

Route::get('/freelance-price', [FreelancePriceController::class, 'index'])->name('freelance-price');

Route::get('/language/{locale}', function ($locale) {
    if (in_array($locale, ['id', 'en'])) {
        session(['locale' => $locale]);
    }
    return redirect()->back();
})->name('language');
