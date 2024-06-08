<?php

namespace App\Http\Controllers\admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\AcceptArchiveRequest;
use App\Models\Archive;
use App\Models\ChangeLog;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class ArchiveController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function indexPending(){
        $archive = Archive::with('user')->get()->where('status', 'pending');
        
        return view('admin.archive.request', [
            'archives' => $archive
        ]);
    }

    public function indexAccepted()
    {
        $archive = Archive::with('user')->latest()->get()->where('status', 'accepted');

        return view('admin.archive.index', [
            'archives' => $archive
        ]);
    }

    public function indexRejected(){
        $archive = Archive::with('user')->latest()->get()->where('status', 'rejected');

        return view('admin.archive.index', [
            'archives' => $archive
        ]);
    }

    public function indexTrash(){
        $archive = Archive::with('user')->latest()->onlyTrashed()->get();

        return view('admin.archive.trash', [
            'archives' => $archive
        ]);
    }

    /**
     * Display the specified resource.
     */
    public function show(Archive $archive)
    {
        return view('admin.archive.show', [
            'archive' => $archive
        ]);
    }


    /**
     * Show the form for editing the specified resource.
     */
    public function editAccept(Archive $archive)
    {
        abort_if($archive->status != 'pending', 403);

        return view('admin.archive.editAccept', [
            'archive' => $archive
        ]);
    }

    public function editReject(Archive $archive)
    {
        abort_if($archive->status != 'pending', 403);

        return view('admin.archive.editReject', [
            'archive' => $archive
        ]);
    }

    public function accept(AcceptArchiveRequest $request, Archive $archive){
        abort_if($archive->status != 'pending', 403);

        $oldValues = $archive->toArray();
        unset($oldValues['id'], $oldValues['created_at'], $oldValues['updated_at']);

        $data = $request->except(['_token', '_method']);


        if($request->hasFile('file')){
            Storage::delete($archive->file);
            $data['file'] = $request->file('file')->store('archives');
        }

        $data['status'] = 'accepted';
        $data['accepted_at'] = now();
        
        $archive->update($data);
        
        $newValues = $archive->fresh()->toArray();
        unset($newValues['id'], $newValues['created_at'], $newValues['updated_at']);    

        $archive->changeLogs()->create([
            'user_id' => auth()->user()->id,
            'archive_id' => $archive->id,
            'action' => 'accept',
            'old_values' => json_encode($oldValues),
            'new_values' => json_encode($newValues),
        ]);

        return redirect('/admin/requests');
    }

    public function reject(Request $request, Archive $archive){
        abort_if($archive->status != 'pending', 403);

        $oldValues = $archive->toArray();
        unset($oldValues['id'], $oldValues['created_at'], $oldValues['updated_at']);

        $data = $request->except(['_token', '_method']);


        if($request->hasFile('file')){
            Storage::delete($archive->file);
            $data['file'] = $request->file('file')->store('archives');
        }

        $data['status'] = 'rejected';
        
        $archive->update($data);
        
        $newValues = $archive->fresh()->toArray();
        unset($newValues['id'], $newValues['created_at'], $newValues['updated_at']);    

        $archive->changeLogs()->create([
            'user_id' => auth()->user()->id,
            'archive_id' => $archive->id,
            'action' => 'reject',
            'old_values' => json_encode($oldValues),
            'new_values' => json_encode($newValues),
        ]);

        return redirect('/admin/requests');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Archive $archive)
    {
        $oldValues = $archive->toArray();
        unset($oldValues['id'], $oldValues['created_at'], $oldValues['updated_at']);

        $archive->delete();

        $newValues = $archive->fresh()->toArray();
        unset($newValues['id'], $newValues['created_at'], $newValues['updated_at']);

        $archive->changeLogs()->create([
            'user_id' => auth()->user()->id,
            'archive_id' => $archive->id,
            'action' => 'delete',
            'old_values' => json_encode($oldValues),
            'new_values' => json_encode($newValues),
        ]);

        return redirect('/admin/requests');
    }

    public function restore($id){
        $archive = Archive::onlyTrashed()->findOrFail($id);

        $oldValues = $archive->toArray();
        unset($oldValues['id'], $oldValues['created_at'], $oldValues['updated_at']);

        $archive->restore();

        $newValues = $archive->fresh()->toArray();
        unset($newValues['id'], $newValues['created_at'], $newValues['updated_at']);

        $archive->changeLogs()->create([
            'user_id' => auth()->user()->id,
            'archive_id' => $archive->id,
            'action' => 'restore',
            'old_values' => json_encode($oldValues),
            'new_values' => json_encode($newValues),
        ]);

        return redirect('/admin/trash');
    }

    public function forceDestroy($id){
        $archive = Archive::withTrashed()->findOrFail($id);
        
        $oldValues = $archive->toArray();
        unset($oldValues['id'], $oldValues['created_at'], $oldValues['updated_at']);

        if(Storage::exists($archive->file)){
            Storage::delete($archive->file);
        }

        $archive->forceDelete();

        $archive->changeLogs()->create([
            'user_id' => auth()->user()->id,
            'archive_id' => $archive->id,
            'action' => 'permanent_delete',
            'old_values' => json_encode($oldValues),
            'new_values' => null,
        ]);

        return redirect('/admin/trash');
    }

    public function history()
    {
        $user_id = request('user_id');
        $archive_id = request('archive_id');
        $action = request('action');
        
        $query = ChangeLog::query()
                ->with('archive.user')
                ->latest();

        if ($user_id) {
            $query->where('user_id', $user_id);
        }

        if ($archive_id) {
            $query->where('archive_id', $archive_id);
        }

        if ($action) {
            $query->where('action', $action);
        }

        $changeLogs = $query->get();

        return response()->json($changeLogs);
    }
}
