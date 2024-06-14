<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\LoginController;
use App\Http\Controllers\ArchiveController;
use App\Http\Controllers\admin\ArchiveController as AdminArchive;

Route::middleware(['guest', 'no-cache', 'security-header'])->group(function () {
  Route::get('/login', [LoginController::class, 'index'])->name('login');
  Route::post('/login', [LoginController::class, 'authenticate']);
});

Route::get('/', function () {
  return view('landing');
});

Route::get('/arsip', function () {
  return view('arsip');
});

Route::get('/pencarian', function () {
  return view('pencarian');
});





Route::middleware(['auth'])->group(function () {
  Route::get('/logout', [LoginController::class, 'logout'])->name('logout');

  // Route untuk role 'mahasiswa'
    Route::get('/dashboard', function () {
        $user = Auth::user();
        if ($user->role == 'mahasiswa') {
            return view('dashboard');
        } else {
            abort(403, 'Unauthorized action.');
        }
    })->name('dashboard');

    // Route untuk role 'admin'
    Route::get('/admin', function () {
        $user = Auth::user();
        if ($user->role == 'admin') {
            return view('admin.index');
        } else {
            abort(403, 'Unauthorized action.');
        }
    })->name('admin');

  Route::get('/unggah', function () {
    return view('unggah');
  });
  Route::get('/submit', [ArchiveController::class, 'create']);
  Route::post('/submit', [ArchiveController::class, 'store']);

  Route::middleware(['is-admin'])->prefix('admin')->group(function () {
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




