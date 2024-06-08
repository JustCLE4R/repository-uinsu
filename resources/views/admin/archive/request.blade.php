<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <meta http-equiv="X-UA-Compatible" content="ie=edge">
  <link rel="stylesheet" href="{{ asset('assets/bootstrap-5.3.3-dist/css/bootstrap.min.css') }}">
  <link rel="stylesheet" href="//cdn.datatables.net/2.0.8/css/dataTables.dataTables.min.css">
  <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.3/font/bootstrap-icons.min.css">
  <title>Archive</title>
</head>
<body>
  <div class="container">
    <div class="row">
      <div class="col">
        <table class="table table-striped table-hover table-bordered mt-3" id="requestTable">
          <thead class="table-dark">
            <tr>
              <th>#</th>
              <th>Pemilik</th>
              <th>Tipe</th>
              <th>Judul</th>
              <th>Abstrak</th>
              <th>Editor</th>
              <th>File</th>
              <th>Aksi</th>
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
                <td width="12%" class="text-center">
                  <a href="/admin/archive/{{ $archive->id  }}" class="btn btn-sm btn-primary py-0 px-1 d-inline"><i class="bi bi-eye-fill"></i></a>
                  <a href="/admin/archive/{{ $archive->id  }}/editaccept" class="btn btn-sm btn-success py-0 px-1 d-inline"><i class="bi bi-check2"></i></i></a>
                  <a href="/admin/archive/{{ $archive->id  }}/editreject" class="btn btn-sm btn-warning py-0 px-1 d-inline"><i class="bi bi-x-lg"></i></i></a>
                  <form action="/admin/archive/{{ $archive->id  }}" method="POST" class="d-inline">
                    @csrf
                    @method('DELETE')
                    <button type="submit" class="btn btn-sm btn-danger py-0 px-1" onclick="return confirm('Are you sure to delete?')"><i class="bi bi-trash"></i></button>
                  </form>
                </td>
              </tr>
            @endforeach
          </tbody>
        </table>
      </div>
    </div>
  </div>

  <script src="https://code.jquery.com/jquery-3.7.1.min.js" integrity="sha256-/JqT3SQfawRcv/BIHPThkBvs0OEvtFFmqPF/lYI/Cxo=" crossorigin="anonymous"></script>
  <script src="//cdn.datatables.net/2.0.8/js/dataTables.min.js"></script>
  <script>
    $(document).ready( function () {
        $('#requestTable').DataTable();
    } );
  </script>
</body>
</html>