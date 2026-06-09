<?php

use App\Http\Controllers\ProfileController;
use App\Http\Controllers\Admin\ProfileController as AdminProfileController;
use App\Http\Controllers\Admin\EducationController;
use App\Models\Profile;
use App\Models\Education;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Admin\AboutController;
Route::get('/', function () {
    $profile = Profile::first();

    $educations = Education::orderBy('sort_order')
        ->latest()
        ->get();

    return view('pages.home', compact('profile', 'educations'));
});

Route::middleware(['auth'])->group(function () {
    Route::get('/administrator', function () {
        return view('admin.dashboard');
    })->name('dashboard');

    Route::get('/administrator/profile', [AdminProfileController::class, 'edit'])
        ->name('admin.profile.edit');

    Route::put('/administrator/profile', [AdminProfileController::class, 'update'])
        ->name('admin.profile.update');

    Route::resource('/administrator/education', EducationController::class)
        ->names('admin.education');

    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
    Route::get('/administrator/about', [AboutController::class, 'edit'])->name('admin.about.edit');
    Route::put('/administrator/about', [AboutController::class, 'update'])->name('admin.about.update');
});

require __DIR__.'/auth.php';