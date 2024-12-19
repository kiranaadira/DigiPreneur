<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\TrainingProgramController;
use App\Http\Controllers\DashboardController;

Route::get('/', function () {
    return redirect(route('dashboard'));
});

Route::get('/dashboard', function () {
    $nav = 'Dashboard';
    return view('dashboard', compact('nav'));
})->name('dashboard');

Route::get('/dashboard', [DashboardController::class, 'index'])->name('dashboard');
Route::resource('training_programs', TrainingProgramController::class);
