<?php

use App\Http\Controllers\ContactController;
use App\Http\Controllers\DepartmentController;
use App\Http\Controllers\GradeController;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\StudentController;
use App\Http\Controllers\admin\AdminController;
use App\Http\Controllers\admin\StudentAdminController;
use App\Http\Controllers\admin\GradeAdminController;
use App\Http\Controllers\admin\DepartmentAdminController;
use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('welcome');
});

Route::get('/home', [HomeController::class, 'index']);
Route::get('/contact', [ContactController::class, 'index']);
Route::get('/students', [StudentController::class, 'index']);
Route::get('/grades', [GradeController::class, 'index']);
Route::get('/departments', [DepartmentController::class, 'index']);

Route::prefix('dashboard')->name('admin.')->group(function () {
    Route::get('/', [AdminController::class, 'index'])->name('dashboard');
    Route::get('/grade', [GradeAdminController::class, 'index'])->name('grades.index');
    // Route::get('/department', [DepartmentAdminController::class, 'index'])->name('departments.index');
    Route::prefix('students')->name('students.')->group(function () {
        Route::get('/', [StudentAdminController::class, 'index'])->name('index');
        Route::get('/create', [StudentAdminController::class, 'create'])->name('create');
        Route::post('/store', [StudentAdminController::class, 'store'])->name('store');
        Route::get('/edit/{student}', [StudentAdminController::class, 'edit'])->name('edit');
        Route::put('/update/{student}', [StudentAdminController::class, 'update'])->name('update');
        Route::delete('/delete/{student}', [StudentAdminController::class, 'destroy'])->name('destroy');
    });

    Route::prefix('department')->name('department.')->group(function () {
        Route::get('/', [DepartmentAdminController::class, 'index'])->name('index');
        Route::get('/create', [DepartmentAdminController::class, 'create'])->name('create');
        Route::post('/store', [DepartmentAdminController::class, 'store'])->name('store');
        Route::get('/edit/{department}', [DepartmentAdminController::class, 'edit'])->name('edit');
        Route::put('/update/{department}', [DepartmentAdminController::class, 'update'])->name('update');
        Route::delete('/delete/{department}', [DepartmentAdminController::class, 'destroy'])->name('destroy');
    });
    
    Route::prefix('grade')->name('grade.')->group(function () {
        Route::get('/', [GradeAdminController::class, 'index'])->name('index');
        Route::get('/create', [GradeAdminController::class, 'create'])->name('create');
        Route::post('/store', [GradeAdminController::class, 'store'])->name('store');
        Route::get('/edit/{grade}', [GradeAdminController::class, 'edit'])->name('edit');
        Route::put('/update/{grade}', [GradeAdminController::class, 'update'])->name('update');
        Route::delete('/delete/{grade}', [GradeAdminController::class, 'destroy'])->name('destroy');
    });
});

