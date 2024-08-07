@extends('layouts.main')
@section('content')

        <div class="row align-items-center justify-content-center pt-120  mb-120">
            <div class=" col-lg-10 bg-light p-5 pt-4 shadow-sm ">
                <div class="row">
                    <div class="col-12">
                        <a class="text-success" href="/arsip"><i class="fa-solid fa-angles-left"></i> Kembali</a>
                    </div>
                </div>
                <div class=" mb-30 mt-10">
                    <h3 class="mb-25 wow fadeInUp text-center" data-wow-delay=".2s">{{ $archive->title }}</h3>
                </div>
                <span>
                    {{ $archive->user->nama }} ({{ \Carbon\Carbon::parse($archive->date)->format('Y') }}){{ $archive->title }};{{ $archive->tempat_terbit }} {{ $archive->isbn_issn }}
                </span>
                <span class="h6 mt-5">Abstrak</span>
                <span style="text-align: justify">
                    {{ $archive->abstract }}
                </span>
                <div class="row mt-4">
                    
                                
                    <div class="col-lg-9 col-sm-12">
                        <b>Jenis Item</b><br>
                        <span class="mb-1">{{ $archive->type }}</span></br>
                        <b>Subjek</b><br>
                        <span class="mb-1">{{ '['. $archive->subject->code . '] ' . $archive->subject->name }} </span></br>
                        <b>Division</b><br>                                            
                        <span class="mb-1"class="mb-1">Fakultas {{ $archive->fakultas }}, Prodi {{ $archive->program_studi }}</span></br>
                        <b>Editor</b><br>
                        <span class="mb-1">Mrs Tias Andini </span></br>
                        <b>Tanggal Deposit</b><br>
                        <span class="mb-1">{{ \Carbon\Carbon::parse($archive->created_at)->format('d M Y H:i') }}</span></br>
                        <b>Terakhir Diubah Pada</b><br>
                        <span class="mb-1">{{ \Carbon\Carbon::parse($archive->updated_at)->format('d M Y H:i') }}</span></br>
                        <b>URL Arsip</b><br>
                        <a class="text-success" href="http://repository.uinsu.ac.id/id/eprint/21200">http://repository.uinsu.ac.id/id/eprint/21200</a></br>
                    </div>
                    <div class="col-lg-3 col-sm-12 text-center">                                            
                        <a href="${archive.official_url}" class="mb-1" target="_blank">
                            <img src="https://i.pinimg.com/736x/13/67/8e/13678e13661844593564d8587f112ba6.jpg" alt="Cover" width="220px" height="270px">
                        </a>
                        @if ($archive->visibility == 'public')
                            <a href="/dokumen/download/{{ $archive->id }}" class="btn btn-sm btn-success">Unduh <i class="fa-solid fa-download"></i></a>
                            <a href="" class="btn btn-sm btn-success">Lihat <i class="fa-solid fa-eye"></i></a>
                        @endif
                    </div>
                </div>

            </div>
        </div>

@endsection