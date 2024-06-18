<?php

namespace App\Http\Controllers;

use App\Models\Archive;
use App\Models\ChangeLog;
use Illuminate\Http\Request;
use App\Http\Requests\ArchiveRequest;

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

    public function dashboard(){
        return view('dashboard');
    }

    public function create(){
        return view('unggah');
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
}
