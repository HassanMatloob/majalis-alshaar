<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Admin\AgencyController;
use App\Http\Controllers\Admin\CategoryController;
use App\Http\Controllers\Admin\ListingController;
use App\Http\Controllers\Admin\ProfileController;
use App\Http\Controllers\Auth\PasswordController;
use App\Http\Controllers\Admin\DashboardController;
use App\Http\Controllers\Admin\ManagementController;
use App\Http\Controllers\Admin\MessageController;
use App\Http\Controllers\Admin\PaymentPlanController;
use App\Http\Controllers\Admin\ProjectController;

Route::get('/dashboard', [DashboardController::class, 'index'])->name('dashboard');

//Categories
Route::get('/categories', [CategoryController::class, 'index'])->name('categories');
Route::post('/categories/fetch', [CategoryController::class, 'fetch'])->name('categories.fetch');
Route::get('/category', [CategoryController::class, 'create'])->name('categories.create');
Route::post('/category', [CategoryController::class, 'store'])->name('categories.store');
Route::get('/categories/{category}/edit', [CategoryController::class, 'edit'])->name('categories.edit');
Route::put('/categories/{category}', [CategoryController::class, 'update'])->name('categories.update');
Route::delete('/categories/{category}', [CategoryController::class, 'singleDelete'])->name('categories.destroy');

//Messages
Route::get('/messages', [MessageController::class, 'index'])->name('messages');
Route::post('/messages/fetch', [MessageController::class, 'fetch'])->name('messages.fetch');

//Projects
Route::get('/projects', [ProjectController::class, 'index'])->name('projects');
Route::post('/projects/fetch', [ProjectController::class, 'fetch'])->name('projects.fetch');
Route::get('/project', [ProjectController::class, 'create'])->name('projects.create');
Route::post('/project', [ProjectController::class, 'store'])->name('projects.store');
Route::post('/project/image', [ProjectController::class, 'storeImage'])->name('projects.image.store');
Route::get('/projects/{project}', [ProjectController::class, 'edit'])->name('projects.edit');
Route::put('/projects/{project}', [ProjectController::class, 'update'])->name('projects.update');

// Profile
Route::get('/profile', [ProfileController::class, 'index'])->name('profile');
Route::put('/update-password', [PasswordController::class, 'updatePassword'])->name('update.password');



