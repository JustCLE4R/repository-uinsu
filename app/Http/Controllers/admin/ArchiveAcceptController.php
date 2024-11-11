<?php

namespace App\Http\Controllers\admin;

use App\Models\Archive;
use App\Models\Subject;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Storage;
use App\Http\Requests\AcceptArchiveRequest;

class ArchiveAcceptController extends Controller
{
    /**
     * Display a listing of the pending resource.
     */
    public function index(){
        $archive = Archive::with('user')->get()->where('status', 'pending');
        
        return view('admin.archive.request', [
            'archives' => $archive
        ]);
    }

    /**
     * Show the form for accepting the specified resource.
     */
    public function edit(Archive $archive)
    {
        abort_if($archive->status != 'pending', 403);

        return view('admin.archive.editAccept', [
            'archive' => $archive,
            'subjects' => Subject::distinct()->get(),
        ]);
    }

    /**
     * Update the specified resource in storage for accept.
     */
    public function accept(AcceptArchiveRequest $request, Archive $archive){
        abort_if($archive->status != 'pending', 403);

        $oldValues = $archive->toArray();

        $data = $request->except(['_token', '_method']);

        if($request->hasFile('file')){
            Storage::delete($archive->file);
            $data['file'] = $request->file('file')->store('archives');
        }

        $data['status'] = 'accepted';
        $data['accepted_at'] = now();
        
        $archive->update($data);
        
        $new_values = $archive->fresh()->toArray();

        createLog($archive, 'accept', $oldValues, $new_values);

        return redirect('/admin/requests');
    }
}
