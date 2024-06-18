<?php

namespace App\Http\Controllers\api;

use App\Http\Controllers\Controller;
use App\Models\Archive;
use Illuminate\Http\Request;

class ArchiveController extends Controller
{
    public function show(Request $request)
    {
        try {
            $query = Archive::query()->with('user');
    
            if ($request->has('tahun')) {
                $query->whereYear('date', $request->tahun);
            }
    
            if ($request->has('user')) {
                $query->whereHas('user', function ($query) use ($request) {
                    $query->where('nama', $request->user);
                });
            }
    
            if ($request->has('fakultas')) {
                $query->where('fakultas', $request->fakultas);
            }
    
            if ($request->has('prodi')) {
                $query->where('program_studi', $request->prodi);
            }
    
            if ($request->has('status')) {
                if ($request->status == 'deleted') {
                    $query->onlyTrashed();
                } else {
                    $query->where('status', $request->status);
                }
            }
    
            $data = $query->paginate(500)->appends($request->all());
    
            $response = [
                'status' => $data->total() > 0 ? 'success' : 'empty',
                'data' => $data->items(),
                'total' => $data->total(),
                'current_page' => $data->currentPage(),
                'last_page' => $data->lastPage(),
                'per_page' => $data->perPage(),
                'next_page_url' => $data->nextPageUrl(),
                'prev_page_url' => $data->previousPageUrl(),
            ];
    
            return response()->json($response, 200);
        } catch (\Exception $e) {
            return response()->json([
                'status' => 'error',
                'message' => 'Something went wrong',
                'error' => $e->getMessage()
            ], 500);
        }
    }
    
}
