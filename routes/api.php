<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\CoursesController;
use App\Http\Controllers\UsersController;
use App\Http\Middleware\EnsureTokenIsValid;
Route::get('/user', function (Request $request) {
    return $request->user();
})->middleware('auth:sanctum');

Route::post('/login', [UsersController::class, 'login'])->name('Login');
Route::post('/register', [UsersController::class, 'register'])->name('register');


Route::middleware('auth:sanctum')->group(function () {
Route::post('/logout', [UsersController::class, 'Logout'])->name('logout');

Route::get('/courses', [CoursesController::class, 'index'])->name('Courses');
Route::get('/courses/show', [CoursesController::class, 'show'])->name('ShowCourse');
Route::post('/courses/add', [CoursesController::class, 'add'])->name('AddCourse');
Route::post('/courses/edit', [CoursesController::class, 'update'])->name('EditCourse');

});
