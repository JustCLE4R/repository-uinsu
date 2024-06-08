<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <meta http-equiv="X-UA-Compatible" content="ie=edge">
  <title>Reject Reason</title>
  <link rel="stylesheet" href="{{ asset('assets/bootstrap-5.3.3-dist/css/bootstrap.min.css') }}">
</head>
<body>
  <div class="container">
    <div class="row">
      <div class="col">
        <h2>Reject Reason</h2>
        <form action="/admin/archive/{{ $archive->id }}/reject" method="POST">
          @csrf
          @method('PUT')
          <div class="mb-3">
            <label for="reason" class="form-label">Reason</label>
            <textarea class="form-control" id="reason" name="reject_reason" rows="3" required></textarea>
          </div>
          <button type="submit" class="btn btn-warning">Reject</button>
        </form>
      </div>
    </div>
  </div>


  <script src="{{ asset('assets/bootstrap-5.3.3-dist/js/bootstrap.bundle.min.js') }}"></script>
</body>
</html>