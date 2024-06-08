<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Form Input</title>
  <link href="{{ asset('assets/bootstrap-5.3.3-dist/css/bootstrap.min.css') }}" rel="stylesheet">
</head>

<body>
  <div class="container mt-5">
    <div class="row">
      <div class="col-6">
        <h2>Publication Form</h2>
        <form method="post" action="/admin/archive/{{ $archive->id }}/accept" enctype="multipart/form-data">
          @csrf
          @method('PUT')
          <!-- Type -->
          <div class="mb-3">
            <label for="type" class="form-label">Type</label>
            <input type="text" class="form-control {{ $errors->has('type') ? 'is-invalid' : '' }}" id="type" name="type"
              value="{{ old('type') ?? $archive->type }}" required>
            @error('type')
            <div style="color: red; ">{{ $message }}</div>
            @enderror
          </div>

          <!-- Title -->
          <div class="mb-3">
            <label for="title" class="form-label">Title</label>
            <input type="text" class="form-control" id="title" name="title"
              value="{{ old('title') ?? $archive->title }}" required>
            @error('title')
            <div style="color: red; ">{{ $message }}</div>
            @enderror
          </div>

          <!-- Abstract -->
          <div class="mb-3">
            <label for="abstract" class="form-label">Abstract</label>
            <input type="text" class="form-control" id="abstract" name="abstract"
              value="{{ old('abstract') ?? $archive->abstract }}" required>
            @error('abstract')
            <div style="color: red; ">{{ $message }}</div>
            @enderror
          </div>

          <!-- Editor -->
          <div class="mb-3">
            <label for="editor" class="form-label">Editor</label>
            <input type="text" class="form-control" id="editor" name="editor"
              value="{{ old('editor') ?? $archive->editor }}" required>
            @error('editor')
            <div style="color: red; ">{{ $message }}</div>
            @enderror
          </div>

          <!-- File -->
          <div class="mb-3">
            <label for="file" class="form-label">File</label>
            <a href="{{ asset('storage/' . $archive->file) }}" target="_blank">{{ basename($archive->file) }}</a>
            <input type="file" class="form-control {{ $errors->has('file') ? 'is-invalid' : '' }}" id="file" name="file">
            @error('file')
            <div style="color: red; ">{{ $message }}</div>
            @enderror
          </div>

          <!-- Publication Details -->
          <h4 class="mt-4">Publication Details</h4>

          <!-- Penerbit -->
          <div class="mb-3">
            <label for="penerbit" class="form-label">Penerbit</label>
            <input type="text" class="form-control" id="penerbit" name="penerbit"
              value="{{ old('penerbit') ?? $archive->penerbit }}" required>
            @error('penerbit')
            <div style="color: red; ">{{ $message }}</div>
            @enderror
          </div>

          <!-- Tempat Terbit -->
          <div class="mb-3">
            <label for="tempat_terbit" class="form-label">Tempat Terbit</label>
            <input type="text" class="form-control" id="tempat_terbit" name="tempat_terbit"
              value="{{ old('tempat_terbit') ?? $archive->tempat_terbit }}" required>
            @error('tempat_terbit')
            <div style="color: red; ">{{ $message }}</div>
            @enderror
          </div>

          <!-- ISBN/ISSN -->
          <div class="mb-3">
            <label for="isbn_issn" class="form-label">ISBN/ISSN</label>
            <input type="text" class="form-control" id="isbn_issn" name="isbn_issn"
              value="{{ old('isbn_issn') ?? $archive->isbn_issn }}" required>
            @error('isbn_issn')
            <div style="color: red; ">{{ $message }}</div>
            @enderror
          </div>

          <!-- Official URL -->
          <div class="mb-3">
            <label for="official_url" class="form-label">Official URL</label>
            <input type="text" class="form-control" id="official_url" name="official_url"
              value="{{ old('official_url') ?? $archive->official_url }}" required>
            @error('official_url')
            <div style="color: red; ">{{ $message }}</div>
            @enderror
          </div>

          <!-- Date -->
          <div class="mb-3">
            <label for="date" class="form-label">Date</label>
            <input type="date" class="form-control" id="date" name="date" value="{{ old('date') ?? $archive->date }}"
              required>
            @error('date')
            <div style="color: red; ">{{ $message }}</div>
            @enderror
          </div>

          <!-- Volume -->
          <div class="mb-3">
            <label for="volume" class="form-label">Volume</label>
            <input type="text" class="form-control" id="volume" name="volume"
              value="{{ old('volume') ?? $archive->volume }}" required>
            @error('volume')
            <div style="color: red; ">{{ $message }}</div>
            @enderror
          </div>

          <!-- Number -->
          <div class="mb-3">
            <label for="number" class="form-label">Number</label>
            <input type="text" class="form-control" id="number" name="number"
              value="{{ old('number') ?? $archive->number }}" required>
            @error('number')
            <div style="color: red; ">{{ $message }}</div>
            @enderror
          </div>

          <!-- Page -->
          <div class="mb-3">
            <label for="page" class="form-label">Page</label>
            <input type="text" class="form-control" id="page" name="page" value="{{ old('page') ?? $archive->page }}"
              required>
            @error('page')
            <div style="color: red; ">{{ $message }}</div>
            @enderror
          </div>

          <!-- Identification Number -->
          <div class="mb-3">
            <label for="identification_number" class="form-label">Identification Number</label>
            <input type="text" class="form-control" id="identification_number" name="identification_number"
              value="{{ old('identification_number') ?? $archive->identification_number }}" required>
            @error('identification_number')
            <div style="color: red; ">{{ $message }}</div>
            @enderror
          </div>

          <!-- Journal Name -->
          <div class="mb-3">
            <label for="journal_name" class="form-label">Journal Name</label>
            <input type="text" class="form-control" id="journal_name" name="journal_name"
              value="{{ old('journal_name') ?? $archive->journal_name }}" required>
            @error('journal_name')
            <div style="color: red; ">{{ $message }}
              @enderror
            </div>

            <!-- Subjek -->
            <div class="mb-3">
              <label for="subjek" class="form-label">Subjek</label>
              <input type="text" class="form-control" id="subjek" name="subjek" value="{{ old('subjek') ?? $archive->subjek }}" required>
              @error('subjek')
              <div style="color: red; ">{{ $message }}</div>
              @enderror
            </div>

            <!-- Nomor Klasifikasi -->
            <div class="mb-3">
              <label for="nomor_klasifikasi" class="form-label">Nomor Klasifikasi</label>
              <input type="text" class="form-control" id="nomor_klasifikasi" name="nomor_klasifikasi"
                value="{{ old('nomor_klasifikasi') ?? $archive->nomor_klasifikasi }}" required>
              @error('nomor_klasifikasi')
              <div style="color: red; ">{{ $message }}</div>
              @enderror
            </div>

            <button type="submit" class="btn btn-success mb-5">Accept</button>
        </form>
      </div>
    </div>
  </div>

  <script src="{{ asset('assets/bootstrap-5.3.3-dist/js/bootstrap.bundle.min.js') }}"></script>
</body>

</html>