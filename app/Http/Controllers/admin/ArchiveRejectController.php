<?php

namespace App\Http\Controllers\admin;

use App\Models\Archive;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class ArchiveRejectController extends Controller
{
    /**
     * Display a listing of the rejected resource.
     */
    public function index(){
        $archive = Archive::with('user')->latest()->get()->where('status', 'rejected');

        return view('admin.archive.index', [
            'archives' => $archive
        ]);
    }

    /**
     * Show the form for rejecting the specified resource.
     */
    public function edit(Archive $archive)
    {
        abort_if($archive->status != 'pending', 403);

        return view('admin.archive.editReject', [
            'archive' => $archive
        ]);
    }

    /**
     * Update the specified resource in storage for reject.
     */
    public function reject(Request $request, Archive $archive){
        abort_if($archive->status != 'pending', 403);

        $oldValues = $archive->toArray();

        $data = $request->except(['_token', '_method']);

        $data['status'] = 'rejected';
        
        $archive->update($data);

        $newValues = $archive->fresh()->toArray();
        
        createLog($archive, 'reject', $oldValues, $newValues);

        return redirect('/admin/requests');
    }
}
