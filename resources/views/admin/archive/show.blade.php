<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>View</title>
  <link href="{{ asset('assets/bootstrap-5.3.3-dist/css/bootstrap.min.css') }}" rel="stylesheet">
</head>
<body>
  <div class="container mt-5">
    <div class="row">
      <div class="col-6">
        <h2>Publication Form</h2>
        <div class="card mb-3">
          <div class="card-body">
            <div class="mb-3">
              <label for="type" class="form-label">Type</label>
              <p class="border-0 bg-light">{{ $archive->type }}</p>
            </div>

            <div class="mb-3">
              <label for="title" class="form-label">Title</label>
              <p class="border-0 bg-light">{{ $archive->title }}</p>
            </div>

            <div class="mb-3">
              <label for="abstract" class="form-label">Abstract</label>
              <p class="border-0 bg-light">{{ $archive->abstract }}</p>
            </div>

            <div class="mb-3">
              <label for="editor" class="form-label">Editor</label>
              <p class="border-0 bg-light">{{ $archive->editor }}</p>
            </div>

            <div class="mb-3">
              <label for="file" class="form-label">File</label>
              <p class="border-0 bg-light"><a href="{{ asset('storage/'.$archive->file) }}" target="_blank">{{ basename($archive->file) }}</a></p>
            </div>

            <div class="mb-3">
              <label for="penerbit" class="form-label">Penerbit</label>
              <p class="border-0 bg-light">{{ $archive->penerbit }}</p>
            </div>

            <div class="mb-3">
              <label for="tempat_terbit" class="form-label">Tempat Terbit</label>
              <p class="border-0 bg-light">{{ $archive->tempat_terbit }}</p>
            </div>

            <div class="mb-3">
              <label for="isbn_issn" class="form-label">ISBN/ISSN</label>
              <p class="border-0 bg-light">{{ $archive->isbn_issn }}</p>
            </div>

            <div class="mb-3">
              <label for="official_url" class="form-label">Official URL</label>
              <p class="border-0 bg-light">{{ $archive->official_url }}</p>
            </div>

            <div class="mb-3">
              <label for="date" class="form-label">Date</label>
              <p class="border-0 bg-light">{{ $archive->date }}</p>
            </div>

            <div class="mb-3">
              <label for="volume" class="form-label">Volume</label>
              <p class="border-0 bg-light">{{ $archive->volume }}</p>
            </div>

            <div class="mb-3">
              <label for="number" class="form-label">Number</label>
              <p class="border-0 bg-light">{{ $archive->number }}</p>
            </div>

            <div class="mb-3">
              <label for="page" class="form-label">Page</label>
              <p class="border-0 bg-light">{{ $archive->page }}</p>
            </div>

            <div class="mb-3">
              <label for="identification_number" class="form-label">Identification Number</label>
              <p class="border-0 bg-light">{{ $archive->identification_number }}</p>
            </div>

            <div class="mb-3">
              <label for="journal_name" class="form-label">Journal Name</label>
              <p class="border-0 bg-light">{{ $archive->journal_name }}</p>
            </div>

            <div class="mb-3">
              <label for="subjek" class="form-label">Subjek</label>
              <p class="border-0 bg-light">{{ $archive->subjek }}</p>
            </div>

            <div class="mb-3">
              <label for="nomor_klasifikasi" class="form-label">Nomor Klasifikasi</label>
              <p class="border-0 bg-light">{{ $archive->nomor_klasifikasi }}</p>
            </div>
          </div>
        </div>
      </div>
      <div class="col-6">
        @if ($archive->status == 'pending')
        <span class="badge rounded-pill mb-3 p-2 text-center fw-bold text-uppercase bg-primary">Pending</span><br>

        <a href="/admin/archive/{{ $archive->id }}/editaccept" class="btn btn-primary">Accept</a>
        <a href="/admin/archive/{{ $archive->id }}/editreject" class="btn btn-warning">Reject</a>
        <form action="/admin/archive/{{ $archive->id }}" method="POST" class="d-inline">
          @csrf
          @method('DELETE')
          <button type="submit" class="btn btn-danger" onclick="return confirm('Are you sure you want to delete this item?')">Delete</button>
        </form>
        @endif

        @if ($archive->status == 'rejected')
          <span class="badge rounded-pill p-2 text-center fw-bold text-uppercase bg-danger">Rejected</span><br>
          reason: {{ $archive->reject_reason }}
        @endif

        @if ($archive->status == 'accepted')
          <span class="badge rounded-pill p-2 text-center fw-bold text-uppercase bg-success">Accepted</span>
        @endif
      </div>
    </div>
  </div>
  <script src="{{ asset('assets/bootstrap-5.3.3-dist/js/bootstrap.bundle.min.js') }}"></script>
</body>
</html>

