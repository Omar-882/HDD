<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\CoursesController;
use App\Http\Controllers\UsersController;
use App\Http\Controllers\CouresRegisertController;
use App\Http\Middleware\EnsureTokenIsValid;
Route::get('/user', function (Request $request) {
    return $request->user();
})->middleware('auth:sanctum');

Route::post('/login', [UsersController::class, 'login'])->name('Login');
Route::post('/register', [UsersController::class, 'register'])->name('register');


Route::middleware('auth:sanctum')->group(function () {
Route::post('/logout', [UsersController::class, 'Logout'])->name('logout');

//Courses Api
Route::get('/courses', [CoursesController::class, 'index'])->name('Courses');
Route::get('/courses/show', [CoursesController::class, 'show'])->name('ShowCourse');
Route::post('/courses/add', [CoursesController::class, 'add'])->name('AddCourse');
Route::post('/courses/edit', [CoursesController::class, 'update'])->name('EditCourse');

//Users Api
Route::get('/users', [UsersController::class, 'index'])->name('Users');
Route::get('/users/show', [UsersController::class, 'show'])->name('ShowUser');
Route::post('/users/add', [UsersController::class, 'add'])->name('AddUser');//Not used yet and not added to postman
Route::post('/users/edit', [UsersController::class, 'update'])->name('EditUser');
Route::post('/users/delete', [UsersController::class, 'delete'])->name('DeleteUser');
Route::post('/users/restore', [UsersController::class, 'restore'])->name('RestoreUser');

//Course Registeration Api
Route::get('/registerd-coureses/allPendings', [CouresRegisertController::class, 'GetAllPendings'])->name('AllPendings');
Route::post('/registerd-coureses/register-new-course', [CouresRegisertController::class, 'RegisterCourse'])->name('RegisterCourse');
Route::post('/registerd-coureses/change-Approval-Status', [CouresRegisertController::class, 'changeApprovalStatus'])->name('changeApprovalStatus');
Route::post('/registerd-coureses/add-payment', [CouresRegisertController::class, 'addPayment'])->name('addPayment');
Route::get('/registerd-coureses/all-payments', [CouresRegisertController::class, 'GetAllPayments'])->name('GetAllPayments');
Route::get('/registerd-coureses/student-payments', [CouresRegisertController::class, 'GetAllPaymentsForAStudent'])->name('GetAllPaymentsForAStudent');


});
