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
                              <div class="col-lg-6 col-md-6 col-sm-12 my-2">
                                  <label for="type" class="form-label">Tipe</label>
                                  <input type="text" class="form-control {{ $errors->has('type') ? 'is-invalid' : '' }}"  value="{{ old('type', $archive->type) ?? $archive->type }}" id="type" name="type" >
                                  @error('type')
                                    <div style="color: red; ">{{ $message }}</div>
                                  @enderror      
                              </div>
                              <div class="col-lg-6 col-md-6 col-sm-12 my-2">
                                  <label for="title" class="form-label">Judul</label>
                                  <input type="text" class="form-control {{ $errors->has('title') ? 'is-invalid' : '' }}"  value="{{ old('title', $archive->title) ?? $archive->title }}" id="title" name="title" >
                                  @error('title')
                                    <div style="color: red; ">{{ $message }}</div>
                                  @enderror      
                              </div>
                              
                              <div class="col-lg-6 col-md-6 col-sm-12 my-2">
                                  <label for="editor" class="form-label">Editor</label>
                                  <input type="text" class="form-control {{ $errors->has('editor') ? 'is-invalid' : '' }}"  value="{{ old('editor', $archive->editor) ?? $archive->editor }}" id="editor" name="editor" >
                                  @error('editor')
                                    <div style="color: red; ">{{ $message }}</div>
                                  @enderror      
                              </div>
                              <div class="col-lg-6 col-md-6 col-sm-12 my-2">
                                <label for="file" class="form-label">File</label>
                                <a href="{{ asset('storage/' . $archive->file) }}" target="_blank">Lihat File</a>
                                <input type="file" class="form-control {{ $errors->has('file') ? 'is-invalid' : '' }}" id="file" name="file">
                                @error('file')
                                <div style="color: red; ">{{ $message }}</div>
                                @enderror
                              </div>
                              <div class="col-lg-12 col-md-12 col-sm-12 my-2">
                                <label for="abstract" class="form-label">Abstrak</label>
                                <textarea type="text" class="form-control {{ $errors->has('abstract', $archive->abstract) ? 'is-invalid' : '' }}" name="abstract" cols="30" rows="2">{{ old('abstract') ?? $archive->abstract }}</textarea>
                                @error('abstract')
                                  <div style="color: red; ">{{ $message }}</div>
                                @enderror      
                              </div>
    

                          </div>
                          <div class="row justify-content-between page page-active" >
                            <div class="col-12">
                              <h5>Detail Publikasi</h5>
                            </div>
                              <div class="col-lg-4 col-md-6 col-sm-12 my-2">
                                  <label for="penerbit" class="form-label">Penerbit</label>
                                  <input type="text" class="form-control {{ $errors->has('penerbit') ? 'is-invalid' : '' }}"  value="{{ old('penerbit', $archive->penerbit) ?? $archive->penerbit }}" id="penerbit" name="penerbit" >
                                  @error('penerbit')
                                    <div style="color: red; ">{{ $message }}</div>
                                  @enderror      
                              </div>
                              <div class="col-lg-4 col-md-6 col-sm-12 my-2">
                                  <label for="tempat_terbit" class="form-label">Tempat Terbit</label>
                                  <input type="text" class="form-control {{ $errors->has('tempat_terbit') ? 'is-invalid' : '' }}"  value="{{ old('tempat_terbit', $archive->tempat_terbit) ?? $archive->tempat_terbit }}" id="tempat_terbit" name="tempat_terbit" >
                                  @error('tempat_terbit')
                                    <div style="color: red; ">{{ $message }}</div>
                                  @enderror      
                              </div>
                              <div class="col-lg-4 col-md-6 col-sm-12 my-2">
                                  <label for="isbn_issn" class="form-label">ISBN/ISSN</label>
                                  <input type="text" class="form-control {{ $errors->has('isbn_issn') ? 'is-invalid' : '' }}"  value="{{ old('isbn_issn', $archive->isbn_issn) ?? $archive->isbn_issn }}" id="isbn_issn" name="isbn_issn" >
                                  @error('isbn_issn')
                                    <div style="color: red; ">{{ $message }}</div>
                                  @enderror      
                              </div>
                              <div class="col-lg-4 col-md-6 col-sm-12 my-2">
                                  <label for="official_url" class="form-label">Official URL</label>
                                  <input type="text" class="form-control {{ $errors->has('official_url') ? 'is-invalid' : '' }}"  value="{{ old('official_url', $archive->official_url) ?? $archive->official_url }}" id="official_url" name="official_url" >
                                  @error('official_url')
                                    <div style="color: red; ">{{ $message }}</div>
                                  @enderror      
                              </div>
                              <div class="col-lg-4 col-md-6 col-sm-12 my-2">
                                  <label for="date" class="form-label">Tanggal & Waktu</label>
                                  <input type="date" class="form-control {{ $errors->has('date') ? 'is-invalid' : '' }}"  value="{{ old('date', $archive->date) ?? date('Y-m-d', strtotime($archive->date)) }}" id="date" name="date" >
                                  @error('date')
                                    <div style="color: red; ">{{ $message }}</div>
                                  @enderror      
                              </div>
                              <div class="col-lg-4 col-md-6 col-sm-12 my-2">
                                  <label for="volume" class="form-label">Volume</label>
                                  <input type="text" class="form-control {{ $errors->has('volume') ? 'is-invalid' : '' }}"  value="{{ old('volume', $archive->volume) ?? $archive->volume }}" id="volume" name="volume" >
                                  @error('volume')
                                    <div style="color: red; ">{{ $message }}</div>
                                  @enderror      
                              </div>
                              <div class="col-lg-4 col-md-6 col-sm-12 my-2">
                                  <label for="number" class="form-label">Nomor</label>
                                  <input type="text" class="form-control {{ $errors->has('number') ? 'is-invalid' : '' }}"  value="{{ old('number', $archive->number) ?? $archive->number }}" id="number" name="number" >
                                  @error('number')
                                    <div style="color: red; ">{{ $message }}</div>
                                  @enderror      
                              </div>
                              <div class="col-lg-4 col-md-6 col-sm-12 my-2">
                                  <label for="page" class="form-label">Halaman</label>
                                  <input type="text" class="form-control {{ $errors->has('page') ? 'is-invalid' : '' }}"  value="{{ old('page', $archive->page) ?? $archive->page }}" id="page" name="page" >
                                  @error('page')
                                    <div style="color: red; ">{{ $message }}</div>
                                  @enderror      
                              </div>
                              <div class="col-lg-4 col-md-6 col-sm-12 my-2">
                                  <label for="identification_number" class="form-label">Nomor Identifikasi</label>
                                  <input type="text" class="form-control {{ $errors->has('identification_number') ? 'is-invalid' : '' }}"  value="{{ old('identification_number', $archive->identification_number) ?? $archive->identification_number }}" id="identification_number" name="identification_number" >
                                  @error('identification_number')
                                    <div style="color: red; ">{{ $message }}</div>
                                  @enderror      
                              </div>
                                <div class="col-lg-4 col-md-6 col-sm-12 my-2">
                                  <label for="journal_name" class="form-label">Nama Jurnal</label>
                                  <input type="text" class="form-control {{ $errors->has('journal_name') ? 'is-invalid' : '' }}"  value="{{ old('journal_name', $archive->journal_name) ?? $archive->journal_name }}" id="journal_name" name="journal_name" >
                                  @error('journal_name')
                                    <div style="color: red; ">{{ $message }}</div>
                                  @enderror      
                              </div>
                                <div class="col-lg-4 col-md-6 col-sm-12 my-2">
                                  <label for="subject_id" class="form-label">Subjek</label>
                                  <select class="form-control {{ $errors->has('subject_id') ? 'is-invalid' : '' }}"  id="subject_id" name="subject_id" >
                                    <option value="" selected hidden>Pilih subject_id</option>
                                    @foreach ($subjects as $subject)
                                        <option value="{{ $subject->id }}" {{ old('subject_id', $archive->subject_id) == $subject->id || $archive->subject_id == $subject->id ? 'selected' : '' }}>{{ '[' . $subject->code . '] ' . $subject->name }}</option>
                                    @endforeach
                                  </select>
                                  @error('subject_id')
                                    <div style="color: red; ">{{ $message }}</div>
                                  @enderror      
                              </div>
                              <div class="col-lg-4 col-md-6 col-sm-12 my-2">
                                <label for="nomor_klasifikasi" class="form-label">Nomor Klasifikasi</label>
                                <input type="text" class="form-control {{ $errors->has('nomor_klasifikasi') ? 'is-invalid' : '' }}"  value="{{ old('nomor_klasifikasi', $archive->nomor_klasifikasi) ?? $archive->nomor_klasifikasi }}" id="nomor_klasifikasi" name="nomor_klasifikasi" >
                                @error('nomor_klasifikasi')
                                  <div style="color: red; ">{{ $message }}</div>
                                @enderror      
                            </div>
                          </div>
                          <div class="col-lg-4 col-md-6 col-sm-12 my-2">
                            <label for="visibility" class="form-label">Visibilitas</label>
                            <select class="form-control {{ $errors->has('visibility') ? 'is-invalid' : '' }}"  id="visibility" name="visibility">
                              <option value="" selected hidden>Pilih Visibilitas</option>
                              <option value="public" {{ old('visibility', $archive->visibility) == 'public' || $archive->visibility == 'public' ? 'selected' : '' }}>Public</option>
                              <option value="private" {{ old('visibility', $archive->visibility) == 'private' || $archive->visibility == 'private' ? 'selected' : '' }}>Private</option>
                            </select>
                            @error('visibility')
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
