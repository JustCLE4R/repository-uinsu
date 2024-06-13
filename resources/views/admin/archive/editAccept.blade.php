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
                        <form method="post" action="/admin/archive/{{ $archive->id }}/accept" enctype="multipart/form-data">
                          @csrf
                          @method('PUT')
                          <div class="row justify-content-start page page-active" >
                              <div class="col-12">
                                <h5>Form Publikasi</h5>
                              </div>
                              <div class="col-lg-4 col-md-6 col-sm-12 my-2">
                                  <label for="exampleFormControlInput1" class="form-label">Tipe</label>
                                  <input type="text" class="form-control {{ $errors->has('type') ? 'is-invalid' : '' }}"  value="{{ old('type') ?? $archive->type }}" id="type" name="type" >
                                  @error('type')
                                    <div style="color: red; ">{{ $message }}</div>
                                  @enderror      
                              </div>
                              <div class="col-lg-4 col-md-6 col-sm-12 my-2">
                                  <label for="exampleFormControlInput1" class="form-label">Judul</label>
                                  <input type="text" class="form-control {{ $errors->has('title') ? 'is-invalid' : '' }}"  value="{{ old('title') ?? $archive->title }}" id="title" name="title" >
                                  @error('type')
                                    <div style="color: red; ">{{ $message }}</div>
                                  @enderror      
                              </div>
                              <div class="col-lg-4 col-md-6 col-sm-12 my-2">
                                  <label for="exampleFormControlInput1" class="form-label">Abstrak</label>
                                  <input type="text" class="form-control {{ $errors->has('abstract') ? 'is-invalid' : '' }}"  value="{{ old('abstract') ?? $archive->abstract }}" id="abstract" name="abstract" >
                                  @error('type')
                                    <div style="color: red; ">{{ $message }}</div>
                                  @enderror      
                              </div>
                              <div class="col-lg-4 col-md-6 col-sm-12 my-2">
                                  <label for="exampleFormControlInput1" class="form-label">Editor</label>
                                  <input type="text" class="form-control {{ $errors->has('editor') ? 'is-invalid' : '' }}"  value="{{ old('editor') ?? $archive->editor }}" id="editor" name="editor" >
                                  @error('type')
                                    <div style="color: red; ">{{ $message }}</div>
                                  @enderror      
                              </div>
                              <div class="col-lg-4 col-md-6 col-sm-12 my-2">
                                <label for="file" class="form-label">File</label>
                                <a href="{{ asset('storage/' . $archive->file) }}" target="_blank">Lihat File</a>
                                <input type="file" class="form-control {{ $errors->has('file') ? 'is-invalid' : '' }}" id="file" name="file">
                                @error('file')
                                <div style="color: red; ">{{ $message }}</div>
                                @enderror
                              </div>
    

                          </div>
                          <div class="row justify-content-between page page-active" >
                            <div class="col-12">
                              <h5>Detail Publikasi</h5>
                            </div>
                              <div class="col-lg-4 col-md-6 col-sm-12 my-2">
                                  <label for="exampleFormControlInput1" class="form-label">Penerbit</label>
                                  <input type="text" class="form-control {{ $errors->has('penerbit') ? 'is-invalid' : '' }}"  value="{{ old('penerbit') ?? $archive->penerbit }}" id="penerbit" name="penerbit" >
                                  @error('type')
                                    <div style="color: red; ">{{ $message }}</div>
                                  @enderror      
                              </div>
                              <div class="col-lg-4 col-md-6 col-sm-12 my-2">
                                  <label for="exampleFormControlInput1" class="form-label">Tempat Terbit</label>
                                  <input type="text" class="form-control {{ $errors->has('tempat_terbit') ? 'is-invalid' : '' }}"  value="{{ old('tempat_terbit') ?? $archive->tempat_terbit }}" id="tempat_terbit" name="tempat_terbit" >
                                  @error('type')
                                    <div style="color: red; ">{{ $message }}</div>
                                  @enderror      
                              </div>
                              <div class="col-lg-4 col-md-6 col-sm-12 my-2">
                                  <label for="exampleFormControlInput1" class="form-label">ISBN/ISSN</label>
                                  <input type="text" class="form-control {{ $errors->has('isbn_issn') ? 'is-invalid' : '' }}"  value="{{ old('isbn_issn') ?? $archive->isbn_issn }}" id="isbn_issn" name="isbn_issn" >
                                  @error('type')
                                    <div style="color: red; ">{{ $message }}</div>
                                  @enderror      
                              </div>
                              <div class="col-lg-4 col-md-6 col-sm-12 my-2">
                                  <label for="exampleFormControlInput1" class="form-label">Official URL</label>
                                  <input type="text" class="form-control {{ $errors->has('official_url') ? 'is-invalid' : '' }}"  value="{{ old('official_url') ?? $archive->official_url }}" id="official_url" name="official_url" >
                                  @error('type')
                                    <div style="color: red; ">{{ $message }}</div>
                                  @enderror      
                              </div>
                              <div class="col-lg-4 col-md-6 col-sm-12 my-2">
                                  <label for="exampleFormControlInput1" class="form-label">Tanggal & Waktu</label>
                                  <input type="text" class="form-control {{ $errors->has('date') ? 'is-invalid' : '' }}"  value="{{ old('date') ?? $archive->date }}" id="date" name="date" >
                                  @error('type')
                                    <div style="color: red; ">{{ $message }}</div>
                                  @enderror      
                              </div>
                              <div class="col-lg-4 col-md-6 col-sm-12 my-2">
                                  <label for="exampleFormControlInput1" class="form-label">Volume</label>
                                  <input type="text" class="form-control {{ $errors->has('volume') ? 'is-invalid' : '' }}"  value="{{ old('volume') ?? $archive->volume }}" id="volume" name="volume" >
                                  @error('type')
                                    <div style="color: red; ">{{ $message }}</div>
                                  @enderror      
                              </div>
                              <div class="col-lg-4 col-md-6 col-sm-12 my-2">
                                  <label for="exampleFormControlInput1" class="form-label">Nomor</label>
                                  <input type="text" class="form-control {{ $errors->has('number') ? 'is-invalid' : '' }}"  value="{{ old('number') ?? $archive->number }}" id="number" name="number" >
                                  @error('type')
                                    <div style="color: red; ">{{ $message }}</div>
                                  @enderror      
                              </div>
                              <div class="col-lg-4 col-md-6 col-sm-12 my-2">
                                  <label for="exampleFormControlInput1" class="form-label">Halaman</label>
                                  <input type="text" class="form-control {{ $errors->has('page') ? 'is-invalid' : '' }}"  value="{{ old('page') ?? $archive->page }}" id="page" name="page" >
                                  @error('type')
                                    <div style="color: red; ">{{ $message }}</div>
                                  @enderror      
                              </div>
                              <div class="col-lg-4 col-md-6 col-sm-12 my-2">
                                  <label for="exampleFormControlInput1" class="form-label">Nomor IDentifikasi</label>
                                  <input type="text" class="form-control {{ $errors->has('identification_number') ? 'is-invalid' : '' }}"  value="{{ old('identification_number') ?? $archive->identification_number }}" id="identification_number" name="identification_number" >
                                  @error('type')
                                    <div style="color: red; ">{{ $message }}</div>
                                  @enderror      
                              </div>
                               <div class="col-lg-4 col-md-6 col-sm-12 my-2">
                                  <label for="exampleFormControlInput1" class="form-label">Nama Jurnal</label>
                                  <input type="text" class="form-control {{ $errors->has('journal_name') ? 'is-invalid' : '' }}"  value="{{ old('journal_name') ?? $archive->journal_name }}" id="journal_name" name="journal_name" >
                                  @error('type')
                                    <div style="color: red; ">{{ $message }}</div>
                                  @enderror      
                              </div>
                               <div class="col-lg-4 col-md-6 col-sm-12 my-2">
                                  <label for="exampleFormControlInput1" class="form-label">Subjek</label>
                                  <input type="text" class="form-control {{ $errors->has('subjek') ? 'is-invalid' : '' }}"  value="{{ old('subjek') ?? $archive->subjek }}" id="subjek" name="subjek" >
                                  @error('type')
                                    <div style="color: red; ">{{ $message }}</div>
                                  @enderror      
                              </div>
                               <div class="col-lg-4 col-md-6 col-sm-12 my-2">
                                  <label for="exampleFormControlInput1" class="form-label">Nomor Klasifikasi</label>
                                  <input type="text" class="form-control {{ $errors->has('nomor_klasifikasi') ? 'is-invalid' : '' }}"  value="{{ old('nomor_klasifikasi') ?? $archive->nomor_klasifikasi }}" id="nomor_klasifikasi" name="nomor_klasifikasi" >
                                  @error('type')
                                    <div style="color: red; ">{{ $message }}</div>
                                  @enderror      
                              </div>
                          </div>       

                          <button type="submit" class="btn btn-success mb-5">Accept</button>

                        </form>
                  </div>


               
                    <div class="col-lg-12 mt-3"></div>
                </div>
            </div>
        </div>
    </div>
@endsection
