<?php

use Illuminate\Support\Facades\Auth;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\DashboardController;
use App\Http\Controllers\SettingsController;
use App\Http\Controllers\TrainingProgramController;

Route::get('/', function () {
    return Auth::check() ? redirect(route('dashboard')) : redirect(route('login'));
});

// Authentication Routes
Route::view('/login', 'auth.login')->name('login');
Route::post('/login', [AuthController::class, 'authenticate']);
Route::view('/register', 'auth.register')->name('register');
Route::post('/register', [AuthController::class, 'store'])->name('register');
Route::post('/logout', [AuthController::class, 'logout'])->name('logout');

Route::get('/settings', [SettingsController::class, 'index'])->name('settings.index');
Route::post('/settings', [SettingsController::class, 'update'])->name('settings.update');

// Dashboard and Training Programs Routes
Route::get('/dashboard', [DashboardController::class, 'index'])->name('dashboard');
Route::resource('training_programs', TrainingProgramController::class);
