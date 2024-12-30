<?php

use App\Http\Controllers\ArticlesController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\DashboardController;
use App\Http\Controllers\SettingsController;
use App\Http\Controllers\TrainingProgramController;

// Rute untuk pengguna yang belum login
Route::middleware('guest')->group(function () {
    Route::view('/login', 'auth.login')->name('login');
    Route::post('/login', [AuthController::class, 'authenticate']);
    Route::view('/register', 'auth.register')->name('register');
    Route::post('/register', [AuthController::class, 'store'])->name('register');
});

// Logout route untuk pengguna yang sudah login
Route::post('/logout', [AuthController::class, 'logout'])->name('logout')->middleware('auth');

// Rute untuk pengguna yang sudah login
Route::middleware(['auth'])->group(function () {
    Route::get('/dashboard', [DashboardController::class, 'index'])->name('dashboard');
    Route::resource('training_programs', TrainingProgramController::class)->middleware('auth');
    Route::get('/settings', [SettingsController::class, 'index'])->name('settings.index');
    Route::post('/settings', [SettingsController::class, 'update'])->name('settings.update');
    Route::resource('articles', ArticlesController::class);
    Route::get('articles/pdf/{id}', [ArticlesController::class, 'downloadPDF'])->name('articles.pdf');
});
