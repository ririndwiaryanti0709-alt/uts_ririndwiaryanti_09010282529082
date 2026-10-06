<?php

use App\Http\Controllers\AuthController;
use App\Http\Controllers\BookController;
use App\Http\Controllers\DashboardController;
use Illuminate\Support\Facades\Route;

// Halaman login
Route::get('/login', [AuthController::class, 'showLogin'])
    ->name('login');

// Proses login
Route::post('/login', [AuthController::class, 'login']);

// Proses logout
Route::post('/logout', [AuthController::class, 'logout'])
    ->name('logout');

// Dashboard
Route::get('/dashboard', [DashboardController::class, 'index'])
    ->middleware('auth')
    ->name('dashboard');

// CRUD buku
Route::resource('books', BookController::class)
    ->middleware('auth');

// Halaman awal
Route::get('/', function () {
    return redirect()->route('login');
});