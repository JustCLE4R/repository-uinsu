<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\LoginController;
use App\Http\Controllers\ArchiveController;
use App\Http\Controllers\admin\ArchiveController as AdminArchive;
use App\Http\Controllers\admin\ArchiveAcceptController as AdminAcceptArchive;
use App\Http\Controllers\admin\ArchiveRejectController as AdminRejectArchive;
use App\Http\Controllers\admin\ArchiveTrashController as AdminTrashArchive;
use App\Http\Controllers\admin\DashboardController;

Route::get('/', [ArchiveController::class, 'landing']);
Route::get('/arsip', [ArchiveController::class, 'arsip']);
Route::view('/arsip/author/{author}' , 'filter.author' );
Route::view('/arsip/fakultas/{fakultas}', 'filter.fakultas');
Route::view('/arsip/prodi/{prodi}', 'filter.prodi');
Route::view('/arsip/tahun/{year}', 'filter.tahun')->where('year', '[0-9]{4}');
Route::view('/pencarian', 'pencarian');
Route::get('/dokumen/{archive}', [ArchiveController::class, 'showArchive']);

// Download Archive
Route::get('/dokumen/download/{id}', [ArchiveController::class, 'downloadArchive']);

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

  // Dashboard untuk admin
  Route::middleware(['is-admin', 'no-cache'])->prefix('admin')->group(function () {
    Route::get('/', [DashboardController::class, 'index']);

    Route::resource('archive', AdminArchive::class)->except(['store']);

    Route::get('/trash', [AdminTrashArchive::class, 'index']);
    Route::delete('/trash/{archive}', [AdminTrashArchive::class, 'forceDestroy']);
    Route::put('/trash/{archive}', [AdminTrashArchive::class, 'restore']);
    
    Route::get('/requests', [AdminAcceptArchive::class, 'index']);
    Route::get('/archive/{archive}/editaccept', [AdminAcceptArchive::class, 'edit']);
    Route::put('/archive/{archive}/accept', [AdminAcceptArchive::class, 'accept']);

    Route::get('/reject', [AdminRejectArchive::class, 'index']);
    Route::get('/archive/{archive}/editreject', [AdminRejectArchive::class, 'edit']);
    Route::put('/archive/{archive}/reject', [AdminRejectArchive::class, 'reject']);
    
    Route::get('/changelogs', [DashboardController::class, 'history']);
  });
});




