<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\LoginController;
use App\Http\Controllers\ArchiveController;
use App\Http\Controllers\admin\ArchiveController as AdminArchive;

Route::get('/', [ArchiveController::class, 'landing']);
Route::get('/arsip', [ArchiveController::class, 'arsip']);
Route::get('/filter/{author}', [ArchiveController::class, 'archivesByAuthor']);
Route::get('/filter/{fakultas}', [ArchiveController::class, 'archivesByProdi']);
Route::view('/filter/{year}', 'filter.tahun')->where('year', '[0-9]{4}');
Route::view('/pencarian', 'pencarian');

  Route::middleware(['guest', 'no-cache'])->group(function () {
    Route::get('/login', [LoginController::class, 'index'])->name('login');
    Route::post('/login', [LoginController::class, 'authenticate']);
  });

Route::middleware(['auth'])->group(function () {
  Route::get('/logout', [LoginController::class, 'logout'])->middleware('no-cache')->name('logout');

  // Dashboard untuk mahasiswa
  Route::get('/dashboard', [ArchiveController::class, 'dashboard'])->name('dashboard');

  Route::get('/unggah', [ArchiveController::class, 'create']);
  Route::post('/submit', [ArchiveController::class, 'store']);

  Route::middleware(['is-admin', 'no-cache'])->prefix('admin')->group(function () {
    Route::get('/', [AdminArchive::class, 'index']);

    Route::get('/archive/create', [AdminArchive::class, 'create']);
    
    Route::get('/archives', [AdminArchive::class, 'indexAccepted']);
    Route::get('/archive/{archive}', [AdminArchive::class, 'show']);
    Route::delete('/archive/{archive}', [AdminArchive::class, 'destroy']);

    Route::get('/trash', [AdminArchive::class, 'indexTrash']);
    Route::delete('/trash/{archive}', [AdminArchive::class, 'forceDestroy']);
    Route::put('/trash/{archive}', [AdminArchive::class, 'restore']);
    
    Route::get('/requests', [AdminArchive::class, 'indexPending']);
    Route::get('/archive/{archive}/editaccept', [AdminArchive::class, 'editAccept']);
    Route::put('/archive/{archive}/accept', [AdminArchive::class, 'accept']);

    Route::get('/reject', [AdminArchive::class, 'indexRejected']);
    Route::get('/archive/{archive}/editreject', [AdminArchive::class, 'editReject']);
    Route::put('/archive/{archive}/reject', [AdminArchive::class, 'reject']);
    
    Route::get('/changelogs', [AdminArchive::class, 'history']);
  });
});




