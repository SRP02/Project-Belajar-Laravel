<?php

use App\Http\Controllers\AdminController;
use App\Http\Controllers\ContactController;
use App\Http\Controllers\DepartmentAdminController;
use App\Http\Controllers\DepartmentController;
use App\Http\Controllers\GradeAdminController;
use App\Http\Controllers\GradeController;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\StudentAdminController;
use App\Http\Controllers\StudentController;
use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('welcome');
});

Route::get('/home', [HomeController::class, 'index']);

Route::get('/contact', [ContactController::class, 'index']);

Route::get('/students', [StudentController::class, 'index']);

Route::get('/grades', [GradeController::class, 'index']);
 
Route::get('/departments', [DepartmentController::class, 'index']); 

Route::get('/dashboard', [AdminController::class, 'index']); 

Route::get('/dashboard/students', [StudentAdminController::class, 'index']);
Route::get('/dashboard/grade', [GradeAdminController::class, 'index']);
Route::get('/dashboard/deparment', [DepartmentAdminController::class, 'index']); 