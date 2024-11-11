<?php

namespace App\Http\Controllers\admin;

use App\Models\Archive;
use App\Models\Subject;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class ArchiveController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $archive = Archive::with('user')->latest()->get()->where('status', 'accepted');

        return view('admin.archive.index', [
            'archives' => $archive
        ]);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        // storing through public ArchiveController
        return view('admin.archive.submit',[
            'subjects' => Subject::distinct()->get()
        ]);
    }

    /**
     * Display the specified resource.
     */
    public function show(Archive $archive)
    {
        return view('admin.archive.show', [
            'archive' => $archive,
        ]);
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Archive $archive)
    {
        return view('admin.archive.edit', [
            'archive' => $archive,
            'subjects' => Subject::distinct()->get()
        ]);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Archive $archive)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Archive $archive)
    {
        $oldValues = $archive->toArray();

        $archive->delete();

        $newValues = $archive->fresh()->toArray();

        createLog($archive, 'delete', $oldValues, $newValues);

        return redirect()->back();
    }
}
