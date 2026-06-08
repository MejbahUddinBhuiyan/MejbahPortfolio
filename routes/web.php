<?php

use App\Http\Controllers\ProfileController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Admin\ProfileController as AdminProfileController;
use App\Models\Profile;

Route::get('/', function () {
    $profile = Profile::first();

    return view('pages.home', compact('profile'));
});

Route::middleware(['auth'])->group(function () {

    Route::get('/administrator', function () {
        return view('admin.dashboard');
    })->name('dashboard');

});
Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
    Route::get('/administrator/profile', [AdminProfileController::class, 'edit'])->name('admin.profile.edit');
    Route::put('/administrator/profile', [AdminProfileController::class, 'update'])->name('admin.profile.update');
});

require __DIR__.'/auth.php';
