<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Form Input</title>
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
</head>
<body>
  <div class="container mt-5">
    <div class="row">
      <div class="col-6">
    <h2>Publication Form</h2>
    <form method="post" action="">
      <!-- Type -->
      <div class="mb-3">
        <label for="type" class="form-label">Type</label>
        <input type="text" class="form-control" id="type" name="type" required>
      </div>

      <!-- Title -->
      <div class="mb-3">
        <label for="title" class="form-label">Title</label>
        <input type="text" class="form-control" id="title" name="title" required>
      </div>

      <!-- Abstract -->
      <div class="mb-3">
        <label for="abstract" class="form-label">Abstract</label>
        <input type="text" class="form-control" id="abstract" name="abstract" required>
      </div>

      <!-- Editor -->
      <div class="mb-3">
        <label for="editor" class="form-label">Editor</label>
        <input type="text" class="form-control" id="editor" name="editor" required>
      </div>

      <!-- File -->
      <div class="mb-3">
        <label for="file" class="form-label">File</label>
        <input type="text" class="form-control" id="file" name="file" required>
      </div>

      <!-- Publication Details -->
      <h4 class="mt-4">Publication Details</h4>

      <!-- Penerbit -->
      <div class="mb-3">
        <label for="penerbit" class="form-label">Penerbit</label>
        <input type="text" class="form-control" id="penerbit" name="penerbit" required>
      </div>

      <!-- Tempat Terbit -->
      <div class="mb-3">
        <label for="tempat_terbit" class="form-label">Tempat Terbit</label>
        <input type="text" class="form-control" id="tempat_terbit" name="tempat_terbit" required>
      </div>

      <!-- ISBN/ISSN -->
      <div class="mb-3">
        <label for="isbn_issn" class="form-label">ISBN/ISSN</label>
        <input type="text" class="form-control" id="isbn_issn" name="isbn_issn" required>
      </div>

      <!-- Official URL -->
      <div class="mb-3">
        <label for="official_url" class="form-label">Official URL</label>
        <input type="text" class="form-control" id="official_url" name="official_url" required>
      </div>

      <!-- Date -->
      <div class="mb-3">
        <label for="date" class="form-label">Date</label>
        <input type="datetime-local" class="form-control" id="date" name="date" required>
      </div>

      <!-- Volume -->
      <div class="mb-3">
        <label for="volume" class="form-label">Volume</label>
        <input type="text" class="form-control" id="volume" name="volume" required>
      </div>

      <!-- Number -->
      <div class="mb-3">
        <label for="number" class="form-label">Number</label>
        <input type="text" class="form-control" id="number" name="number" required>
      </div>

      <!-- Page -->
      <div class="mb-3">
        <label for="page" class="form-label">Page</label>
        <input type="text" class="form-control" id="page" name="page" required>
      </div>

      <!-- Identification Number -->
      <div class="mb-3">
        <label for="identification_number" class="form-label">Identification Number</label>
        <input type="text" class="form-control" id="identification_number" name="identification_number" required>
      </div>

      <!-- Journal Name -->
      <div class="mb-3">
        <label for="journal_name" class="form-label">Journal Name</label>
        <input type="text" class="form-control" id="journal_name" name="journal_name" required>
      </div>

      <!-- Subjek -->
      <div class="mb-3">
        <label for="subjek" class="form-label">Subjek</label>
        <input type="text" class="form-control" id="subjek" name="subjek" required>
      </div>

      <!-- Nomor Klasifikasi -->
      <div class="mb-3">
        <label for="nomor_klasifikasi" class="form-label">Nomor Klasifikasi</label>
        <input type="text" class="form-control" id="nomor_klasifikasi" name="nomor_klasifikasi" required>
      </div>

      <button type="submit" class="btn btn-primary mb-5">Submit</button>
    </form>
  </div>
</div>
  </div>

  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>
