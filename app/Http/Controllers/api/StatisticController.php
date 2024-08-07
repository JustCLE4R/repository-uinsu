<?php

namespace App\Http\Controllers\api;

use App\Models\Archive;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\Http\Controllers\Controller;

class StatisticController extends Controller
{
    public function downloadStats(){
        try {
            $archives = Archive::all();

            $downloadStats = [];
            $downloadOrigins =[];

            foreach ($archives as $archive) {
                if ($archive->downloads) {
                    $downloads = json_decode($archive->downloads, true);
                    foreach ($downloads as $date => $count) {
                        if (isset($downloadStats[$date])) {
                            $downloadStats[$date] += $count;
                        } else {
                            $downloadStats[$date] = $count;
                        }
                    }
                }

                if ($archive->download_origins) {
                    $downloadOrigins = json_decode($archive->download_origins, true);
                    foreach ($downloadOrigins as $country => $count) {
                        if (isset($downloadOrigins[$country])) {
                            $downloadOrigins[$country] += $count;
                        } else {
                            $downloadOrigins[$country] = $count;
                        }
                    }
                }
            }

            return response()->json([
                'status' => 'success',
                'data' => [
                    'downloadStats' => $downloadStats,
                    'downloadOrigins' => $downloadOrigins
                ]
            ]);
        } catch (\Exception $e) {
            return response()->json([
                'status' => 'error',
                'message' => 'Something went wrong',
                'error' => $e->getMessage(),
            ], 500);
        }
    }

    public function visitStats(){
        try {
            $archives = Archive::all();

            $visitStats = [];

            foreach ($archives as $archive) {
                if ($archive->visits) {
                    $visits = json_decode($archive->visits, true);
                    foreach ($visits as $date => $count) {
                        if (isset($visitStats[$date])) {
                            $visitStats[$date] += $count;
                        } else {
                            $visitStats[$date] = $count;
                        }
                    }
                }
            }

            return response()->json([
                'status' => 'success',
                'data' => $visitStats
            ]);
        } catch (\Exception $e) {
            return response()->json([
                'status' => 'error',
                'message' => 'Something went wrong',
                'error' => $e->getMessage(),
            ], 500);
        }
    }

    public function uploadStats(){
        try {
            $archives = Archive::all();

            $uploadStats = [];

            foreach ($archives as $archive) {
                $date = $archive->created_at->format('Y-m-d');
                if (isset($uploadStats[$date])) {
                    $uploadStats[$date] += 1;
                } else {
                    $uploadStats[$date] = 1;
                }
            }

            return response()->json([
                'status' => 'success',
                'data' => $uploadStats
            ]);
        } catch (\Exception $e) {
            return response()->json([
                'status' => 'error',
                'message' => 'Something went wrong',
                'error' => $e->getMessage(),
            ], 500);
        }
    }
}
