<?php

namespace App\Http\Controllers\api;

use App\Http\Controllers\Controller;
use App\Models\Archive;
use Illuminate\Http\Request;

class ArchiveController extends Controller
{
    public function show(Request $request)
    {
        $query = Archive::query()->with('user');

        if ($request->has('tahun')) {
            $query->where('tahun', $request->tahun);
        }
        if ($request->has('user')) {
            $query->where('user_id', $request->user);
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

        return $query->get();
    }
}
