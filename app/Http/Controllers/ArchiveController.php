<?php

namespace App\Http\Controllers;

use App\Models\Archive;
use Illuminate\Http\Request;
use App\Http\Requests\ArchiveRequest;

class ArchiveController extends Controller
{
    public function create(){
        return view('submitArchive');
    }

    public function store(ArchiveRequest $request){
        $data = $request->all();

        $data['file'] = $request->file('file')->store('archives');
        $data['user_id'] = auth()->user()->id;
        
        Archive::create($data);

        return redirect('/')->with('success', 'Archive submitted successfully');
    }
}
