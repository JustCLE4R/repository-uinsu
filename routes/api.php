<?php

use App\Http\Controllers\api\ArchiveController;
use App\Http\Controllers\api\CountArchiveController;
use App\Http\Controllers\api\StatisticController;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

Route::prefix('archives/count')->group(function () {
    Route::get('/tahun', [CountArchiveController::class, 'countByYear']);
    Route::get('/user', [CountArchiveController::class, 'countByUser']);
    route::get('/division', [CountArchiveController::class, 'countByDivision']);
    Route::get('/fakultas', [CountArchiveController::class, 'countByFakultas']);
    Route::get('/prodi', [CountArchiveController::class, 'countByProdi']);
    Route::get('/subjek', [CountArchiveController::class, 'countBySubject']);
});

Route::prefix('archives/statistic')->group(function () {
    Route::get('/download', [StatisticController::class, 'downloadStats']);
    Route::get('/visit', [StatisticController::class, 'visitStats']);
    Route::get('/upload', [StatisticController::class, 'uploadStats']);
});

Route::prefix('archives')->group(function () {
    Route::get('/', [ArchiveController::class, 'show']);
});