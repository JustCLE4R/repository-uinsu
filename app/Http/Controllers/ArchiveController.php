<?php

namespace App\Http\Controllers;

use Carbon\Carbon;
use App\Models\Archive;
use GeoIp2\Database\Reader;
use Illuminate\Http\Request;
use Torann\GeoIP\Facades\GeoIP;
use App\Http\Requests\ArchiveRequest;
use App\Models\Subject;
use Illuminate\Support\Facades\Session;
use Illuminate\Support\Facades\Storage;

class ArchiveController extends Controller
{
    public function landing(){
        $arsip = [
            'count' => Archive::where('status', 'accepted')->count(),
        ];

        return view('landing', [
            'arsip' => $arsip
        ]);
    }
    public function arsip(){
        $arsip = [
            'count' => Archive::where('status', 'accepted')->count(),
        ];

        return view('arsip', [
            'arsip' => $arsip
        ]);
    }

    public function dashboard(){
        return view('dashboard');
    }

    public function create(){
        return view('unggah',[
            'subjects' => Subject::distinct()->get(),
        ]);
    }

    public function store(ArchiveRequest $request){
        $data = $request->all();

        $data['file'] = $request->file('file')->store('archives');
        $data['user_id'] = auth()->user()->id;
        
        $archive = Archive::create($data);

        createLog($archive, 'submit', null, $archive->toArray());

        if(auth()->user()->role == 'admin')
            return redirect('/admin/requests')->with('success', 'Archive submitted successfully');

        return redirect('/')->with('success', 'Archive submitted successfully');
    }

    public function downloadArchive($id, Request $request){
        $archive = Archive::findorfail($id);

        if (!Storage::exists($archive->file) || $archive->visibility == 'private') {
            abort(404, 'File not found.');
        }

        $location = GeoIP::getLocation($request->ip());

        $originCountry = $location->iso_code ?? 'Unknown';

        $this->updateDownloadStatistics($archive, $originCountry);

        return Storage::download($archive->file, $archive->title . '.' . pathinfo($archive->file, PATHINFO_EXTENSION));
    }

    protected function updateDownloadStatistics(Archive $archive, $originCountry) {
        $currentDate = Carbon::now()->format('Y-m-d');

        $sessionKey = 'downloaded_archives_' . $archive->id;
        $downloadSession = Session::get($sessionKey, []);
    
        // If the current date is already in the session, do not count this download
        if (in_array($currentDate, $downloadSession)) {
            return;
        }
    
        // Add the current date to the session
        $downloadSession[] = $currentDate;
        Session::put($sessionKey, $downloadSession);

        // Update daily downloads
        $download = json_decode($archive->downloads, true) ?? [];
        if (isset($download[$currentDate])) {
            $download[$currentDate]++;
        } else {
            $download[$currentDate] = 1;
        }
        $archive->downloads = json_encode($download);

        // Update download origins
        $downloadOrigins = json_decode($archive->download_origins, true) ?? [];
        if (isset($downloadOrigins[$originCountry])) {
            $downloadOrigins[$originCountry]++;
        } else {
            $downloadOrigins[$originCountry] = 1;
        }
        $archive->download_origins = json_encode($downloadOrigins);

        $archive->save();
    }

    public function showArchive(Archive $archive){
        if($archive->status != 'accepted')
            abort(404);
        
        $this->updateViewStatistics($archive);

        return view('filter.dokumen', [
            'archive' => $archive
        ]);
    }

    protected function updateViewStatistics(Archive $archive) {
        $currentDate = Carbon::now()->format('Y-m-d');

        // Handle session visit for prevent repeated visits
        $sessionKey = 'visited_archives_' . $archive->id;
        $visitSession = Session::get($sessionKey, []);

        // If the current date is already in the session, do not count this visit
        if (in_array($currentDate, $visitSession)) {
            return;
        }

        // Add the current date to the session
        $visitSession[] = $currentDate;
        Session::put($sessionKey, $visitSession);

        // Update daily views
        $visit = json_decode($archive->visits, true) ?? [];
        if (isset($visit[$currentDate])) {
            $visit[$currentDate]++;
        } else {
            $visit[$currentDate] = 1;
        }
        $archive->visits = json_encode($visit);

        $archive->save();
    }
}
