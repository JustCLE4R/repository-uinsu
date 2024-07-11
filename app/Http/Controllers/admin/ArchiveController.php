<?php

namespace App\Http\Controllers\admin;

use App\Models\User;
use App\Models\Archive;
use App\Models\Subject;
use App\Models\ChangeLog;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Http\Requests\ArchiveRequest;
use Illuminate\Support\Facades\Storage;
use App\Http\Requests\AcceptArchiveRequest;

class ArchiveController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index(){
        return view('admin.index');
    }

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
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('admin.archive.submit',[
            'subjects' => Subject::distinct()->get()
        ]);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(ArchiveRequest $request)
    {
        $data = $request->all();

        $data['file'] = $request->file('file')->store('archives');
        $data['user_id'] = auth()->user()->id;
        $data['fakultas'] = auth()->user()->fakultas;
        $data['program_studi'] = auth()->user()->program_studi;
        
        Archive::create($data);

        if(auth()->user()->role == 'admin')
            return redirect('/admin/requests')->with('success', 'Archive submitted successfully');

        return redirect('/')->with('success', 'Archive submitted successfully');
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
    public function editAccept(Archive $archive)
    {
        abort_if($archive->status != 'pending', 403);

        return view('admin.archive.editAccept', [
            'archive' => $archive,
            'subjects' => Subject::distinct()->get(),
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

        $data = $request->except(['_token', '_method']);

        if($request->hasFile('file')){
            Storage::delete($archive->file);
            $data['file'] = $request->file('file')->store('archives');
        }

        $data['status'] = 'accepted';
        $data['accepted_at'] = now();
        
        $archive->update($data);
        
        $new_values = $archive->fresh()->toArray();

        $this->createLog($archive, 'accept', $oldValues, $new_values);

        return redirect('/admin/requests');
    }

    public function reject(Request $request, Archive $archive){
        abort_if($archive->status != 'pending', 403);

        $oldValues = $archive->toArray();

        $data = $request->except(['_token', '_method']);

        $data['status'] = 'rejected';
        
        $archive->update($data);

        $newValues = $archive->fresh()->toArray();
        
        $this->createLog($archive, 'reject', $oldValues, $newValues);

        return redirect('/admin/requests');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Archive $archive)
    {
        $oldValues = $archive->toArray();

        $archive->delete();

        $newValues = $archive->fresh()->toArray();

        $this->createLog($archive, 'delete', $oldValues, $newValues);

        return redirect('/admin/requests');
    }

    public function restore($id){
        $archive = Archive::onlyTrashed()->findOrFail($id);

        $oldValues = $archive->toArray();

        $archive->restore();

        $newValues = $archive->fresh()->toArray();

        $this->createLog($archive, 'restore', $oldValues, $newValues);

        return redirect('/admin/trash');
    }

    public function forceDestroy($id){
        $archive = Archive::withTrashed()->findOrFail($id);
        
        $oldValues = $archive->toArray();

        Storage::delete($archive->file);

        $archive->forceDelete();

        $this->createLog($archive, 'permanent_delete', $oldValues);

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


    private function createLog(Archive $archive, $action, array $old_values = null, array $new_values = null){
        if ($old_values !== null) {
            unset($old_values['id'], $old_values['created_at'], $old_values['updated_at']);
        }

        if ($new_values !== null) {
            unset($new_values['id'], $new_values['created_at'], $new_values['updated_at']);
        }

        ChangeLog::create([
            'user_id' => auth()->user()->id,
            'archive_id' => $archive->id,
            'action' => $action,
            'old_values' => json_encode($old_values),
            'new_values' => json_encode($new_values),
        ]);
    }
}
