<?php

use App\Http\Controllers\ArchiveController;
use App\Http\Controllers\LoginController;
use Illuminate\Support\Facades\Route;

Route::get('/login', [LoginController::class, 'index'])->name('login');
Route::post('/login', [LoginController::class, 'authenticate']);
Route::post('/logout', [LoginController::class, 'logout']);

Route::view('/dashboard', 'dashboard')->name('dashboard');

Route::get('/submit', [ArchiveController::class, 'submit'])->name('submit');

