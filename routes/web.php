<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\EmployeeController;
use App\Http\Controllers\AuthController;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
*/

Route::get('/', [EmployeeController::class, 'home'])->name('home');

// AUTH: login, register, logout
Route::get('/login', [AuthController::class, 'showLoginForm'])->name('login');
Route::post('/login', [AuthController::class, 'login'])->name('login.post');

Route::get('/register', [AuthController::class, 'showRegisterForm'])->name('register');
Route::post('/register', [AuthController::class, 'register'])->name('register.post');

Route::post('/logout', [AuthController::class, 'logout'])->name('logout');

// Routes that require authentication
Route::middleware(['auth'])->group(function () {
    // Everyone authenticated may create employee from home
    Route::post('/employees', [EmployeeController::class, 'store'])->name('employees.store');

    // Admin-only routes
    Route::middleware(['is_admin'])->group(function () {
        Route::get('/dashboard', [EmployeeController::class, 'index'])->name('employees.index');
        Route::get('/employees/{employee}/edit', [EmployeeController::class, 'edit'])->name('employees.edit');
        Route::put('/employees/{employee}', [EmployeeController::class, 'update'])->name('employees.update');
        Route::delete('/employees/{employee}', [EmployeeController::class, 'destroy'])->name('employees.destroy');
    });
});
