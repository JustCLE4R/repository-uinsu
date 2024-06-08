<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <meta http-equiv="X-UA-Compatible" content="ie=edge">
  <link rel="stylesheet" href="{{ asset('assets/bootstrap-5.3.3-dist/css/bootstrap.min.css') }}">
  <title>Archive</title>
</head>
<body>
  <div class="container">
    <div class="row">
      <div class="col">
        <table class="table table-striped table-hover table-bordered mt-3">
          <thead class="table-dark">
            <tr>
              <th>#</th>
              <th>Pemilik</th>
              <th>Tipe</th>
              <th>Judul</th>
              <th>Abstrak</th>
              <th>Editor</th>
              <th>File</th>
            </tr>
          </thead>
          <tbody>
            @foreach ($archives as $archive)
              <tr>
                <td>{{ $loop->iteration }}</td>
                <td>{{ $archive->user->nama }}</td>
                <td>{{ $archive->type }}</td>
                <td>{{ $archive->title }}</td>
                <td>{{ $archive->abstract }}</td>
                <td>{{ $archive->editor }}</td>
                <td><a href="{{ asset('storage/'.$archive->file) }}">{{ $archive->file }}</a></td>
              </tr>
            @endforeach
          </tbody>
        </table>
      </div>
    </div>
  </div>
</body>
</html>