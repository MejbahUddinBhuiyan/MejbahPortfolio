<?php

use App\Http\Controllers\ProfileController;
use App\Http\Controllers\Admin\ProfileController as AdminProfileController;
use App\Http\Controllers\Admin\EducationController;
use App\Http\Controllers\Admin\AboutController;
use App\Http\Controllers\Admin\SkillController;
use App\Http\Controllers\Admin\ProjectController;
use App\Models\Profile;
use App\Models\Education;
use App\Models\About;
use App\Models\Skill;
use App\Models\Project;
use Illuminate\Support\Facades\Route;


Route::get('/', function () {

    $profile = Profile::first();

    $about = About::first();

    $educations = Education::orderBy('sort_order')
        ->latest()
        ->get();

    $skills = Skill::orderBy('sort_order')
        ->get();

    $projects = Project::where('is_featured', true)
        ->latest()
        ->get();    

    return view('pages.home', compact(
        'profile',
        'about',
        'educations',
        'skills',
        'projects'
    ));
});

Route::middleware(['auth'])->group(function () {

    Route::get('/administrator', function () {
        return view('admin.dashboard');
    })->name('dashboard');

    // Profile
    Route::get('/administrator/profile', [AdminProfileController::class, 'edit'])
        ->name('admin.profile.edit');

    Route::put('/administrator/profile', [AdminProfileController::class, 'update'])
        ->name('admin.profile.update');

    // About
    Route::get('/administrator/about', [AboutController::class, 'edit'])
        ->name('admin.about.edit');

    Route::put('/administrator/about', [AboutController::class, 'update'])
        ->name('admin.about.update');

    // Education
    Route::resource('/administrator/education', EducationController::class)
        ->names('admin.education');

    // Breeze Profile
    Route::get('/profile', [ProfileController::class, 'edit'])
        ->name('profile.edit');

    Route::patch('/profile', [ProfileController::class, 'update'])
        ->name('profile.update');

    Route::delete('/profile', [ProfileController::class, 'destroy'])
        ->name('profile.destroy');
    Route::resource('/administrator/skills', SkillController::class)
        ->names('admin.skills');  
    Route::resource('/administrator/projects', ProjectController::class)
        ->names('admin.projects');

    Route::post('/administrator/projects/sync-github', [ProjectController::class, 'syncGithub'])
        ->name('admin.projects.syncGithub');      
});

require __DIR__.'/auth.php';