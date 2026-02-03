<?php

use App\Http\Controllers\ProfileController;
use App\Http\Controllers\AgencyController;
use App\Http\Controllers\ContactUsController;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\ProjectController;
use App\Http\Controllers\RegisterFormController;
use Illuminate\Support\Facades\Route;

Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});

Route::get('/', [HomeController::class, 'index'])->name('home');
Route::get('/about-us', [HomeController::class, 'about'])->name('about');

//Contact Us Controller
Route::get('/contact-us', [ContactUsController::class, 'index'])->name('contact');
Route::post('/contact-us', [ContactUsController::class, 'store'])->name('contact.store');

//Projects
Route::get('/projects', [ProjectController::class, 'index'])->name('projects');
Route::get('/projects/{slug}', [ProjectController::class, 'show'])->name('project.detail');
Route::get('/projects-ajax', [ProjectController::class, 'getProjectsByCategory'])->name('ProjectsByCategory');

//Language Switcher
Route::get('/lang/{locale}', [HomeController::class, 'languageSwitcher'])->name('lang');

require __DIR__ . '/auth.php';
