<?php

namespace App\Http\Controllers;

use Carbon\Carbon;
use App\Models\Archive;
use GeoIp2\Database\Reader;
use Illuminate\Http\Request;
use Torann\GeoIP\Facades\GeoIP;
use App\Http\Requests\ArchiveRequest;
use App\Models\Subject;
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
        
        Archive::create($data);

        if(auth()->user()->role == 'admin')
            return redirect('/admin/requests')->with('success', 'Archive submitted successfully');

        return redirect('/')->with('success', 'Archive submitted successfully');
    }

    public function downloadArchive($id, Request $request){
        $archive = Archive::findorfail($id);

        if (!Storage::exists($archive->file)) {
            abort(404, 'File not found.');
        }

        $location = GeoIP::getLocation($request->ip());

        $originCountry = $location->iso_code ?? 'Unknown';

        $this->updateDownloadStatistics($archive, $originCountry);

        return Storage::download($archive->file, $archive->title . '.' . pathinfo($archive->file, PATHINFO_EXTENSION));
    }

    protected function updateDownloadStatistics(Archive $archive, $originCountry) {
        // Update total downloads
        $archive->increment('total_downloads');

        // Update monthly downloads
        $currentMonth = Carbon::now()->format('Y-m');
        $monthlyDownloads = json_decode($archive->monthly_downloads, true) ?? [];
        if (isset($monthlyDownloads[$currentMonth])) {
            $monthlyDownloads[$currentMonth]++;
        } else {
            $monthlyDownloads[$currentMonth] = 1;
        }
        $archive->monthly_downloads = json_encode($monthlyDownloads);

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

    public function show(Archive $archive){
        return view('filter.dokumen', [
            'archive' => $archive
        ]);
    }
}
