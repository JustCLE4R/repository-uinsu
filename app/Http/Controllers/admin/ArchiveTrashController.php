<?php

namespace App\Http\Controllers\admin;

use App\Models\Archive;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Storage;

class ArchiveTrashController extends Controller
{
    /**
     * Display a listing of the soft deleted resource.
     */
    public function index(){
        $archive = Archive::with('user')->latest()->onlyTrashed()->get();

        return view('admin.archive.trash', [
            'archives' => $archive
        ]);
    }

    /**
     * Permanently remove the specified resource from storage.
     */
    public function forceDestroy($id){
        $archive = Archive::withTrashed()->findOrFail($id);
        
        $oldValues = $archive->toArray();

        Storage::delete($archive->file);

        $archive->forceDelete();

        createLog($archive, 'permanent_delete', $oldValues);

        return redirect('/admin/trash');
    }

    /**
     * Restore the specified resource from soft delete.
     */
    public function restore($id){
        $archive = Archive::onlyTrashed()->findOrFail($id);

        $oldValues = $archive->toArray();

        $archive->restore();

        $newValues = $archive->fresh()->toArray();

        createLog($archive, 'restore', $oldValues, $newValues);

        return redirect('/admin/trash');
    }
}
