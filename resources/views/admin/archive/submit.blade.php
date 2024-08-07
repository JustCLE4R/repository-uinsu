@extends('admin.layouts.main')

@section('content')
<div class="container-fluid pt-4 px-4">
  <div class="row g-4">
      <div class="col-sm-12 col-xl-12">
          <div class="bg-light rounded p-5 border-top border-success border-5" style="min-height: 70vh">
              <div class="row">
                  <div class="col-12">
                    <span class="h4">Arsip</span>
                    <hr />
                  </div>
              </div>
              <form method="post" action="/submit" enctype="multipart/form-data">
                @csrf
                <div class="row justify-content-start page page-active">
                  <div class="col-12">
                    <h5>Form Publikasi</h5>
                  </div>
                  <div class="col-lg-6 col-md-6 col-sm-12 my-2">
                    <label for="type" class="form-label">Tipe</label>
                    <input type="text" class="form-control {{ $errors->has('type') ? 'is-invalid' : '' }}" id="type" name="type" value="{{ old('type') }}" required>
                    @error('type')
                    <div style="color: red; ">{{ $message }}</div>
                    @enderror
                  </div>
                  <div class="col-lg-6 col-md-6 col-sm-12 my-2">
                    <label for="title" class="form-label">Judul</label>
                    <input type="text" class="form-control {{ $errors->has('title') ? 'is-invalid' : '' }}" id="title" name="title" value="{{ old('title') }}" required>
                    @error('title')
                    <div style="color: red; ">{{ $message }}</div>
                    @enderror
                  </div>
                  
                  <div class="col-lg-6 col-md-6 col-sm-12 my-2">
                    <label for="editor" class="form-label">Editor</label>
                    <input type="text" class="form-control {{ $errors->has('editor') ? 'is-invalid' : '' }}" id="editor" name="editor" value="{{ old('editor') }}" required>
                    @error('editor')
                    <div style="color: red; ">{{ $message }}</div>
                    @enderror
                  </div>
                  <div class="col-lg-6 col-md-6 col-sm-12 my-2">
                    <label for="file" class="form-label">File</label>
                    <input type="file" class="form-control {{ $errors->has('file') ? 'is-invalid' : '' }}" id="file"
                      name="file" required accept=".pdf">
                    @error('file')
                    <div style="color: red; ">{{ $message }}</div>
                    @enderror
                  </div>
                  <div class="col-lg-12 col-md-12 col-sm-12 my-2">
                    <label for="abstract" class="form-label">Abstrak</label>
                    <textarea type="text" class="form-control {{ $errors->has('abstract') ? 'is-invalid' : '' }}" name="abstract" cols="30" rows="2">{{ old('abstract') }}</textarea>
                    @error('abstract')
                      <div style="color: red; ">{{ $message }}</div>
                    @enderror 
                  </div>

                </div>
                <div class="row justify-content-start page page-active">
                  <div class="col-12">
                    <h5>Detail Publikasi</h5>
                  </div>
                  <div class="col-lg-4 col-md-6 col-sm-12 my-2">
                    <label for="fakultas" class="form-label">Fakultas</label>
                    <select type="text" class="form-control {{ $errors->has('fakultas') ? 'is-invalid' : '' }}" id="fakultas" name="fakultas" onchange="getProgramStudi(this.value)" required>
                      <option value="" selected hidden>Pilih Fakultas</option>
                      <option value="Dakwah dan Komunikasi">Dakwah dan Komunikasi</option>
                      <option value="Kesehatan Masyarakat">Kesehatan Masyarakat</option>
                      <option value="Ilmu Sosial">Ilmu Sosial</option>
                      <option value="Ilmu Tarbiyah dan Keguruan">Ilmu Tarbiyah dan Keguruan</option>
                      <option value="Syariah dan Hukum">Syariah dan Hukum</option>
                      <option value="Sains dan Teknologi">Sains dan Teknologi</option>
                      <option value="Ushuluddin dan Studi Islam">Ushuluddin dan Studi Islam</option>
                    </select>
                    @error('fakultas')
                      <div style="color: red; ">{{ $message }}</div>
                    @enderror
                  </div>
                  <div class="col-lg-4 col-md-6 col-sm-12 my-2">
                    <label for="program_studi" class="form-label">Program Studi</label>
                    <select type="text" class="form-control" id="program_studi" name="program_studi" required disabled>
                      <option value="" selected hidden>Pilih Program Studi</option>
                      {{-- populate by ajax --}}
                    </select>
                    @error('program_studi')
                      <div style="color: red; ">{{ $message }}</div>
                    @enderror
                  </div>
                  <div class="col-lg-4 col-md-6 col-sm-12 my-2">
                    <label for="penerbit" class="form-label">Penerbit</label>
                    <input type="text" class="form-control {{ $errors->has('penerbit') ? 'is-invalid' : '' }}" id="penerbit" name="penerbit" value="{{ old('penerbit') }}" required>
                    @error('penerbit')
                      <div style="color: red; ">{{ $message }}</div>
                    @enderror
                  </div>
                  <div class="col-lg-4 col-md-6 col-sm-12 my-2">
                    <label for="tempat_terbit" class="form-label">Tempat Terbit</label>
                    <input type="text" class="form-control {{ $errors->has('tempat_terbit') ? 'is-invalid' : '' }}" id="tempat_terbit" name="tempat_terbit" value="{{ old('tempat_terbit') }}" required>
                    @error('tempat_terbit')
                      <div style="color: red; ">{{ $message }}</div>
                    @enderror
                  </div>
                  <div class="col-lg-4 col-md-6 col-sm-12 my-2">
                    <label for="isbn_issn" class="form-label">ISBN/ISSN</label>
                    <input type="text" class="form-control {{ $errors->has('isbn_issn') ? 'is-invalid' : '' }}" id="isbn_issn" name="isbn_issn" value="{{ old('isbn_issn') }}" required>
                    @error('isbn_issn')
                      <div style="color: red; ">{{ $message }}</div>
                    @enderror
                  </div>
                  <div class="col-lg-4 col-md-6 col-sm-12 my-2">
                    <label for="official_url" class="form-label">Official URL</label>
                    <input type="text" class="form-control {{ $errors->has('official_url') ? 'is-invalid' : '' }}" id="official_url" name="official_url" value="{{ old('official_url') }}" required>
                    @error('official_url')
                      <div style="color: red; ">{{ $message }}</div>
                    @enderror
                  </div>
                  <div class="col-lg-4 col-md-6 col-sm-12 my-2">
                    <label for="date" class="form-label">Tanggal &amp; Waktu</label>
                    <input type="date" class="form-control {{ $errors->has('date') ? 'is-invalid' : '' }}" id="date" name="date" value="{{ old('date') }}" required>
                    @error('date')
                      <div style="color: red; ">{{ $message }}</div>
                    @enderror
                  </div>
                  <div class="col-lg-4 col-md-6 col-sm-12 my-2">
                    <label for="volume" class="form-label">Volume</label>
                    <input type="text" class="form-control {{ $errors->has('volume') ? 'is-invalid' : '' }}" id="volume" name="volume" value="{{ old('volume') }}" required>
                    @error('volume')
                      <div style="color: red; ">{{ $message }}</div>
                    @enderror
                  </div>
                  <div class="col-lg-4 col-md-6 col-sm-12 my-2">
                    <label for="number" class="form-label">Nomor</label>
                    <input type="text" class="form-control {{ $errors->has('number') ? 'is-invalid' : '' }}" id="number" name="number" value="{{ old('number') }}" required>
                    @error('number')
                      <div style="color: red; ">{{ $message }}</div>
                    @enderror
                  </div>
                  <div class="col-lg-4 col-md-6 col-sm-12 my-2">
                    <label for="page" class="form-label">Halaman</label>
                    <input type="text" class="form-control {{ $errors->has('page') ? 'is-invalid' : '' }}" id="page" name="page" value="{{ old('page') }}" required>
                    @error('page')
                      <div style="color: red; ">{{ $message }}</div>
                    @enderror
                  </div>
                  <div class="col-lg-4 col-md-6 col-sm-12 my-2">
                    <label for="identification_number" class="form-label">Nomor Identifikasi</label>
                    <input type="text" class="form-control {{ $errors->has('identification_number') ? 'is-invalid' : '' }}" id="identification_number" name="identification_number" value="{{ old('identification_number') }}" required>
                    @error('identification_number')
                      <div style="color: red; ">{{ $message }}</div>
                    @enderror
                  </div>
                  <div class="col-lg-4 col-md-6 col-sm-12 my-2">
                    <label for="journal_name" class="form-label">Nama Jurnal</label>
                    <input type="text" class="form-control {{ $errors->has('journal_name') ? 'is-invalid' : '' }}" id="journal_name" name="journal_name" value="{{ old('journal_name') }}" required>
                    @error('journal_name')
                      <div style="color: red; ">{{ $message }}</div>
                    @enderror
                  </div>
                  <div class="col-lg-4 col-md-6 col-sm-12 my-2">
                    <label for="subject_id" class="form-label">Subjek</label>
                    <select class="form-control {{ $errors->has('subject_id') ? 'is-invalid' : '' }}" id="subject_id" name="subject_id" required>
                      <option value="" selected hidden>Pilih Subjek</option>
                      @foreach ($subjects as $subject)
                        <option value="{{ $subject->id }}" {{ old('subject_id') == $subject->id ? 'selected' : '' }}>{{ '[' . $subject->code . '] ' . $subject->name }}</option>
                      @endforeach
                    </select>
                    @error('subject_id')
                      <div style="color: red; ">{{ $message }}</div>
                    @enderror
                  </div>
                  <div class="col-lg-4 col-md-6 col-sm-12 my-2">
                    <label for="nomor_klasifikasi" class="form-label">Nomor Klasifikasi</label>
                    <input type="text" class="form-control {{ $errors->has('nomor_klasifikasi') ? 'is-invalid' : '' }}" id="nomor_klasifikasi" name="nomor_klasifikasi" value="{{ old('nomor_klasifikasi') }}" required>
                    @error('nomor_klasifikasi')
                      <div style="color: red; ">{{ $message }}</div>
                    @enderror
                  </div>
                  <div class="col-lg-4 col-md-6 col-sm-12 my-2">
                    <label for="visibility" class="form-label">Visibilitas</label>
                    <select class="form-control {{ $errors->has('visibility') ? 'is-invalid' : '' }}"  id="visibility" name="visibility">
                      <option value="" selected hidden>Pilih Visibilitas</option>
                      <option value="public" {{ old('visibility') == 'public' ? 'selected' : '' }}>Public</option>
                      <option value="private" {{ old('visibility') == 'private' ? 'selected' : '' }}>Private</option>
                    </select>
                    @error('visibility')
                      <div style="color: red; ">{{ $message }}</div>
                    @enderror      
                  </div>
                </div>
                <div class="col-12 text-end">
                  <button type="submit" class="btn btn-success mt-3">Submit Dokumen</button>
                </div>
              </form>
          </div>
      </div>
  </div>
</div>
@endsection

<script src="https://code.jquery.com/jquery-3.7.1.min.js" integrity="sha256-/JqT3SQfawRcv/BIHPThkBvs0OEvtFFmqPF/lYI/Cxo=" crossorigin="anonymous"></script>
<script>
  function getProgramStudi(fakultas) {
    var prodi = $('#program_studi');
    prodi.prop('disabled', false);
    $.ajax({
      type: 'GET',
      url: '/json/fakultas.json',
      data: {
        fakultas: fakultas
      },
      success: function(data) {
        prodi.empty();
        prodi.append('<option value="" selected hidden>Pilih Program Studi</option>');
        data[fakultas].forEach(function(item) {
          prodi.append('<option value="' + item + '">' + item + '</option>');
        });
      }
    });
  }
</script>