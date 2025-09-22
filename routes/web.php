<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\CarController;

Route::get('/', fn() => view('welcome'))->name('home');

Route::get('/prijava', [AuthController::class, 'index'])->name('login');
Route::post('/obrada', [AuthController::class, 'obrada'])->name('login.process');

Route::middleware('auth')->group(function () {
    Route::resource('cars', CarController::class)->only(['index', 'create', 'store', 'destroy', 'edit', 'update']);
});

Route::post('/odjava', [AuthController::class, 'odjava'])->name('logout')->middleware('auth');