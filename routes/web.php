<?php

use App\Http\Controllers\ProfileController;
use App\Http\Controllers\CoursesController;
use App\Http\Controllers\UsersController;
use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('welcome');
});

Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware(['auth', 'verified'])->name('dashboard');

Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile/{id}', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});
Route::get('/courses', [CoursesController::class, 'index'])->middleware(['auth'])->name('courses');
Route::post('/courses/add', [CoursesController::class, 'add'])->middleware(['auth'])->name('courses.add');
Route::get('/courses/{id}', [CoursesController::class, 'show'])->middleware(['auth'])->name('courses.show');
Route::post('/courses/{id}/edit', [CoursesController::class, 'update'])->middleware(['auth'])->name('courses.edit');

Route::get('/users', [UsersController::class, 'index'])->middleware(['auth'])->name('users');
Route::post('/users/add', [UsersController::class, 'add'])->middleware(['auth'])->name('users.add');
Route::get('/users/{id}', [UsersController::class, 'show'])->middleware(['auth'])->name('users.show');
Route::post('/users/{id}/edit', [UsersController::class, 'update'])->middleware(['auth'])->name('users.edit');






require __DIR__.'/auth.php';
