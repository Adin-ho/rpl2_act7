<?php
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\DashboardController;
use App\Http\Controllers\UserController;
use App\Http\Controllers\AttendanceController;
use Illuminate\Support\Facades\Auth;

Auth::routes();

Route::get('/', fn() => redirect()->route('dashboard'));

Route::middleware('auth')->group(function() {
    Route::get('/dashboard', [DashboardController::class,'index'])->name('dashboard');
    Route::resource('users', UserController::class)->except(['show']);
    Route::resource('attendance', AttendanceController::class)->only(['index','create','store','destroy']);
});

Auth::routes();

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');
