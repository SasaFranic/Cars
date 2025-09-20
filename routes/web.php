<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\CarController;

Route::get('/', function () {
    return view('welcome');
});

Route::get('/prijava', [AuthController::class, 'index']);
Route::post('/obrada', [AuthController::class, 'obrada']);

Route::resource('cars', CarController::class);
