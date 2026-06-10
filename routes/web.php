<?php

use Illuminate\Support\Facades\Route;

use App\Http\Controllers\ProfileController;
use App\Http\Controllers\ContactController;

use App\Http\Controllers\Admin\ProfileController as AdminProfileController;
use App\Http\Controllers\Admin\AboutController;
use App\Http\Controllers\Admin\EducationController;
use App\Http\Controllers\Admin\SkillController;
use App\Http\Controllers\Admin\ProjectController;
use App\Http\Controllers\Admin\ResearchController;
use App\Http\Controllers\Admin\BlogController;
use App\Http\Controllers\Admin\GalleryController;
use App\Http\Controllers\Admin\SocialController;
use App\Http\Controllers\Admin\ContactMessageController;
use App\Http\Controllers\Admin\CertificateController;

use App\Models\Certificate;
use App\Models\Profile;
use App\Models\About;
use App\Models\Education;
use App\Models\Skill;
use App\Models\Project;
use App\Models\Research;
use App\Models\Blog;
use App\Models\Gallery;
use App\Models\Social;

/*
|--------------------------------------------------------------------------
| Public Routes
|--------------------------------------------------------------------------
*/

Route::get('/', function () {

    $profile = Profile::first();

    $about = About::first();

    $educations = Education::orderBy('sort_order')
        ->latest()
        ->get();

    $skills = Skill::orderBy('sort_order')
        ->get();
    $certificates = Certificate::latest()->get();
    $projects = Project::where('is_featured', true)
        ->latest()
        ->get();

    $researches = Research::where('is_featured', true)
        ->orderBy('sort_order')
        ->latest()
        ->get();

    $blogs = Blog::where('status', 'published')
        ->latest('published_at')
        ->take(3)
        ->get();

    $galleries = Gallery::orderBy('sort_order')
        ->latest()
        ->get();

    $socials = Social::where('is_active', true)
        ->orderBy('sort_order')
        ->get();

    return view('pages.home', compact(
        'profile',
        'about',
        'educations',
        'skills',
        'certificates',
        'projects',
        'researches',
        'blogs',
        'galleries',
        'socials'
    ));
});

/*
|--------------------------------------------------------------------------
| Blog Details Page (PUBLIC)
|--------------------------------------------------------------------------
*/

Route::get('/blog/{blog:slug}', function (Blog $blog) {

    abort_if($blog->status !== 'published', 404);

    return view('pages.blog-details', compact('blog'));

})->name('blog.show');

/*
|--------------------------------------------------------------------------
| Contact Form (PUBLIC)
|--------------------------------------------------------------------------
*/

Route::post('/contact', [ContactController::class, 'store'])
    ->name('contact.store');

/*
|--------------------------------------------------------------------------
| Admin Routes
|--------------------------------------------------------------------------
*/

Route::middleware(['auth'])->group(function () {

    Route::get('/administrator', function () {
        return view('admin.dashboard');
    })->name('dashboard');

    /*
    |--------------------------------------------------------------------------
    | Profile
    |--------------------------------------------------------------------------
    */

    Route::get('/administrator/profile', [AdminProfileController::class, 'edit'])
        ->name('admin.profile.edit');

    Route::put('/administrator/profile', [AdminProfileController::class, 'update'])
        ->name('admin.profile.update');

    /*
    |--------------------------------------------------------------------------
    | About
    |--------------------------------------------------------------------------
    */

    Route::get('/administrator/about', [AboutController::class, 'edit'])
        ->name('admin.about.edit');

    Route::put('/administrator/about', [AboutController::class, 'update'])
        ->name('admin.about.update');

    /*
    |--------------------------------------------------------------------------
    | Education
    |--------------------------------------------------------------------------
    */

    Route::resource('/administrator/education', EducationController::class)
        ->names('admin.education');

    /*
    |--------------------------------------------------------------------------
    | Skills
    |--------------------------------------------------------------------------
    */

    Route::resource('/administrator/skills', SkillController::class)
        ->names('admin.skills');

    /*
    |--------------------------------------------------------------------------
    | Projects
    |--------------------------------------------------------------------------
    */

    Route::resource('/administrator/projects', ProjectController::class)
        ->names('admin.projects');

    Route::post('/administrator/projects/sync-github', [ProjectController::class, 'syncGithub'])
        ->name('admin.projects.syncGithub');

    /*
    |--------------------------------------------------------------------------
    | Research
    |--------------------------------------------------------------------------
    */

    Route::resource('/administrator/research', ResearchController::class)
        ->names('admin.research');

    /*
    |--------------------------------------------------------------------------
    | Blogs
    |--------------------------------------------------------------------------
    */

    Route::resource('/administrator/blogs', BlogController::class)
        ->names('admin.blogs');

    /*
    |--------------------------------------------------------------------------
    | Gallery
    |--------------------------------------------------------------------------
    */

    Route::resource('/administrator/gallery', GalleryController::class)
        ->names('admin.gallery');

    /*
    |--------------------------------------------------------------------------
    | Social Media
    |--------------------------------------------------------------------------
    */

    Route::resource('/administrator/socials', SocialController::class)
        ->names('admin.socials');

    /*
    |--------------------------------------------------------------------------
    | Contact Messages
    |--------------------------------------------------------------------------
    */

    Route::get('/administrator/contacts', [ContactMessageController::class, 'index'])
        ->name('admin.contacts.index');

    Route::get('/administrator/contacts/{contact}', [ContactMessageController::class, 'show'])
        ->name('admin.contacts.show');

    Route::delete('/administrator/contacts/{contact}', [ContactMessageController::class, 'destroy'])
        ->name('admin.contacts.destroy');

    /*
    |--------------------------------------------------------------------------
    | Breeze Profile
    |--------------------------------------------------------------------------
    */

    Route::get('/profile', [ProfileController::class, 'edit'])
        ->name('profile.edit');

    Route::patch('/profile', [ProfileController::class, 'update'])
        ->name('profile.update');

    Route::delete('/profile', [ProfileController::class, 'destroy'])
        ->name('profile.destroy');

    Route::resource('/administrator/certificates', CertificateController::class)
        ->names('admin.certificates');    
});

require __DIR__.'/auth.php';