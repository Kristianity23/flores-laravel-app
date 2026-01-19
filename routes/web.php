<?php

use App\Http\Controllers\FlowerSeedController;
use App\Http\Controllers\AuthController;
use Illuminate\Support\Facades\Route;

// Public routes
Route::get('/', function () {
    return view('index');
});

// Authentication routes
Route::get('/login', [AuthController::class, 'showLogin'])->name('login');
Route::post('/login', [AuthController::class, 'login']);
Route::get('/register', [AuthController::class, 'showRegister'])->name('register');
Route::post('/register', [AuthController::class, 'register']);
Route::post('/logout', [AuthController::class, 'logout'])->name('logout');

// Protected routes - only authenticated users can access
Route::middleware('auth')->group(function () {
    Route::get('/flowers', [FlowerSeedController::class, 'index']);
    Route::get('/flowers/create', [FlowerSeedController::class, 'create']);
    Route::post('/flowers', [FlowerSeedController::class, 'store']);
    Route::get('/flowers/{flower}', [FlowerSeedController::class, 'show']);
    Route::get('/flowers/edit/{flower}', [FlowerSeedController::class, 'edit']);
    Route::put('/flowers/update/{flower}', [FlowerSeedController::class, 'update']);
    Route::get('/flowers/delete/{flower}', [FlowerSeedController::class, 'delete']);
    Route::delete('/flowers/destroy/{flower}', [FlowerSeedController::class, 'destroy']);
});


