<?php

namespace App\Http\Controllers\api;

use App\Http\Controllers\Controller;
use App\Models\Archive;
use Illuminate\Http\Request;

class CountArchiveController extends Controller
{
    public function countByYear(){
        try {
            $data = Archive::selectRaw('YEAR(date) as year, COUNT(*) as count')
                ->where('status', 'accepted')
                ->groupBy('year')
                ->orderBy('year', 'desc')
                ->get()
                ->mapWithKeys(function ($archive) {
                    return [
                        $archive->year => $archive->count,
                    ];
                });

            $response = [
                'status' => 'success',
                'data' => $data,
                'total' => $data->sum(),
            ];

            return response()->json($response, 200);
        } catch (\Exception $e) {
            return response()->json([
                'status' => 'error',
                'message' => 'Something went wrong',
                'error' => $e->getMessage(),
            ], 500);
        }
    }

    public function countByUser(){
        try {
            $data = Archive::selectRaw('user_id, COUNT(*) as count')
                ->where('status', 'accepted')
                ->with('user:id,nama') // Load id and nama column from user table
                ->groupBy('user_id')
                ->orderByDesc('count')
                ->get()
                ->map(function ($archive) {
                    return [
                        'id' => $archive->user_id,
                        'nama' => $archive->user->nama,
                        'count' => $archive->count,
                    ];
                });

            $response = [
                'status' => 'success',
                'data' => $data,
                'total' => $data->sum('count'),
            ];

            return response()->json($response, 200);
        } catch (\Exception $e) {
            return response()->json([
                'status' => 'error',
                'message' => 'Something went wrong',
                'error' => $e->getMessage(),
            ], 500);
        }
    }

    public function countByDivision(){
        try {
            $archives = Archive::where('status', 'accepted')->get();

            $data = [];
            $total = 0;

            foreach ($archives as $archive) {
                $faculty = $archive->fakultas;
                $major = $archive->program_studi;

                if (!isset($data[$faculty])) {
                    $data[$faculty] = [
                        'count' => 0,
                        'program_studi' => []
                    ];
                }

                $data[$faculty]['count']++;
                $total++;

                if (!isset($data[$faculty]['program_studi'][$major])) {
                    $data[$faculty]['program_studi'][$major] = 0;
                }

                $data[$faculty]['program_studi'][$major]++;
            }

            $response = [
                'status' => 'success',
                'data' => $data,
                'total' => $total,
            ];

            return response()->json($response, 200);

        } catch (\Exception $e) {
            return response()->json([
                'status' => 'error',
                'message' => 'Something went wrong',
                'error' => $e->getMessage(),
            ], 500);
        }
    }

    public function countByFakultas(){
        try {
            $data = Archive::selectRaw('fakultas, COUNT(*) as count')
                ->where('status', 'accepted')
                ->groupBy('fakultas')
                ->orderByDesc('count')
                ->get()
                ->mapWithKeys(function ($archive) {
                    return [
                        $archive->fakultas => $archive->count,
                    ];
                });

            $response = [
                'status' => 'success',
                'data' => $data,
                'total' => $data->sum(),
            ];

            return response()->json($response, 200);
        } catch (\Exception $e) {
            return response()->json([
                'status' => 'error',
                'message' => 'Something went wrong',
                'error' => $e->getMessage(),
            ], 500);
        }
    }

    public function countByProdi(){
        try {
            $data = Archive::selectRaw('program_studi, COUNT(*) as count')
                ->where('status', 'accepted')
                ->groupBy('program_studi')
                ->orderByDesc('count')
                ->get()
                ->mapWithKeys(function ($archive) {
                    return [
                        $archive->program_studi => $archive->count,
                    ];
                });

            $response = [
                'status' => 'success',
                'data' => $data,
                'total' => $data->sum(),
            ];

            return response()->json($response, 200);
        } catch (\Exception $e) {
            return response()->json([
                'status' => 'error',
                'message' => 'Something went wrong',
                'error' => $e->getMessage(),
            ], 500);
        }
    }

    public function countBySubject(){
        try {
            $archives = Archive::with('subject')
                ->where('status', 'accepted')
                ->get();
            
            $data = [];
            $total = 0;
            
            foreach ($archives as $archive) {
                $subjectId = $archive->subject_id;
                if (!isset($data[$subjectId])) {
                    $subject = $archive->subject;
                    $data[$subjectId] = [
                        'count' => 0,
                        'code' => $subject ? $subject->code : '',
                        'name' => $subject ? $subject->name : '',
                    ];
                }
                $data[$subjectId]['count']++;
                $total++;
            }
            
            $response = [
                'status' => 'success',
                'data' => $data,
                'total' => $total,
            ];
            
            return response()->json($response, 200);        
        } catch (\Exception $e) {
            return response()->json([
                'status' => 'error',
                'message' => 'Something went wrong',
                'error' => $e->getMessage(),
            ], 500);
        }
    }
}
