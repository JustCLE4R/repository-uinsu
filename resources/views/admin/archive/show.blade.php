@extends('admin.layouts.main')
@section('content')
    <div class="container-fluid pt-4 px-4">
        <div class="row g-4">
            <div class="col-sm-12 col-xl-12">
                <div class="bg-light rounded p-5 border-top border-success border-5" style="min-height: 70vh">
                    <div class="row">
                        <div class="col-12">
                            <span class="h4">{{ $archive->title }}</span>
                            <hr />
                        </div>
                    </div>

                  <div class="">
                          <div class="row justify-content-between page page-active" id="page-1">
                              <div class="col-lg-4 col-md-6 col-sm-12 my-2">
                                  <label for="exampleFormControlInput1" class="form-label">Tipe</label>
                                  <input type="text" class="form-control" value="{{ $archive->type }}" disabled>
                              </div>
                              <div class="col-lg-4 col-md-6 col-sm-12 my-2">
                                  <label for="exampleFormControlInput1" class="form-label">Judul</label>
                                  <input type="text" class="form-control" value="{{ $archive->title }}" disabled>
                              </div>
                              <div class="col-lg-4 col-md-6 col-sm-12 my-2">
                                  <label for="exampleFormControlInput1" class="form-label">Abstrak</label>
                                  <input type="text" class="form-control" value="{{ $archive->abstract }}" disabled>
                              </div>
                              <div class="col-lg-4 col-md-6 col-sm-12 my-2">
                                  <label for="exampleFormControlInput1" class="form-label">Editor</label>
                                  <input type="text" class="form-control" value="{{ $archive->editor }}" disabled>
                              </div>
                              <div class="col-lg-4 col-md-6 col-sm-12 my-2">
                                  <label for="exampleFormControlInput1" class="form-label">File</label> <br>
                                  <a href="{{ asset('storage/'.$archive->file) }}" class="btn btn-success w-100" target="_blank" >Lihat Isi File</a>
                                  
                              </div>
                              <div class="col-lg-4 col-md-6 col-sm-12 my-2">
                                  <label for="exampleFormControlInput1" class="form-label">Penerbit</label>
                                  <input type="text" class="form-control" value="{{ $archive->penerbit }}" disabled>
                              </div>
                              <div class="col-lg-4 col-md-6 col-sm-12 my-2">
                                <label for="exampleFormControlInput1" class="form-label">Tempat Terbit</label>
                                <input type="text" class="form-control" value="{{ $archive->tempat_terbit }}" disabled>
                              </div>
                              <div class="col-lg-4 col-md-6 col-sm-12 my-2">
                                <label for="exampleFormControlInput1" class="form-label">ISBN/ISSN</label>
                                <input type="text" class="form-control" value="{{ $archive->isbn_issn }}" disabled>
                              </div>
                              <div class="col-lg-4 col-md-6 col-sm-12 my-2">
                                <label for="exampleFormControlInput1" class="form-label">Official URL</label>
                                <input type="text" class="form-control" value="{{ $archive->official_url }}" disabled>
                              </div>
                              <div class="col-lg-4 col-md-6 col-sm-12 my-2">
                                <label for="exampleFormControlInput1" class="form-label">Tanggal & Waktu</label>
                                <input type="text" class="form-control" value="{{ $archive->date }}" disabled>
                              </div>
                              <div class="col-lg-4 col-md-6 col-sm-12 my-2">
                                <label for="exampleFormControlInput1" class="form-label">Volume</label>
                                <input type="text" class="form-control" value="{{ $archive->volume }}" disabled>
                              </div>
                              <div class="col-lg-4 col-md-6 col-sm-12 my-2">
                                <label for="exampleFormControlInput1" class="form-label">Nomor</label>
                                <input type="text" class="form-control" value="{{ $archive->number }}" disabled>
                              </div>
                              <div class="col-lg-4 col-md-6 col-sm-12 my-2">
                                <label for="exampleFormControlInput1" class="form-label">Halaman</label>
                                <input type="text" class="form-control" value="{{ $archive->page }}" disabled>
                              </div>
                              <div class="col-lg-4 col-md-6 col-sm-12 my-2">
                                <label for="exampleFormControlInput1" class="form-label">Identifikasi Nomor</label>
                                <input type="text" class="form-control" value="{{ $archive->identification_number }}" disabled>
                              </div>
                              <div class="col-lg-4 col-md-6 col-sm-12 my-2">
                                <label for="exampleFormControlInput1" class="form-label">Nama Jurnal</label>
                                <input type="text" class="form-control" value="{{ $archive->journal_name }}" disabled>
                              </div>
                              <div class="col-lg-4 col-md-6 col-sm-12 my-2">
                                <label for="exampleFormControlInput1" class="form-label">Subjek</label>
                                <input type="text" class="form-control" value="{{ $archive->subjek }}" disabled>
                              </div>
                              <div class="col-lg-4 col-md-6 col-sm-12 my-2">
                                <label for="exampleFormControlInput1" class="form-label">Nomor Klasifikasi</label>
                                <input type="text" class="form-control" value="{{ $archive->nomor_klasifikasi }}" disabled>
                              </div>
                          </div>                        

                          <div class="col-12 my-2 text-end">
                            @if ($archive->status == 'pending')
                            <span class="btn btn-lightmy-2">Status : Pending</span>
                    
                            <a href="/admin/archive/{{ $archive->id }}/editaccept"class="btn btn-success">Terima <i class="bi bi-check2-all"></i></a>
                            <a href="/admin/archive/{{ $archive->id }}/editreject" class="btn btn-success">Tolak <i class="bi bi-x-lg"></i></a>
                            <form action="/admin/archive/{{ $archive->id }}" method="POST" class="d-inline">
                              @csrf
                              @method('DELETE')
                              <button type="submit" class="btn btn-success" onclick="return confirm('Are you sure you want to delete this item?')">Hapus <i class="bi bi-trash3"></i></button>
                            </form>
                            @endif
                    
                            @if ($archive->status == 'rejected')
                              <span class="badge rounded-pill p-2 text-center fw-bold text-uppercase bg-danger">Tolak <i class="bi bi-x-lg"></i></span><br>
                              reason: {{ $archive->reject_reason }}
                            @endif
                    
                            @if ($archive->status == 'accepted')
                              <span class="badge rounded-pill p-2 text-center fw-bold text-uppercase bg-success">Terimma <i class="bi bi-check2-all"></i></span>
                            @endif
                          </div>    
                  </div>
                  
                    <div class="col-lg-12 mt-3"></div>
                </div>
            </div>
        </div>
    </div>
@endsection
