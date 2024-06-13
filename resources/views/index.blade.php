<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <meta http-equiv="X-UA-Compatible" content="ie=edge">
  <title>Dashboard eceknya</title>
</head>
<body>
  Login as: {{ Auth::user()->nama }}
  <br>
  <a href="/logout">Logout</a>
  <br>
  <a href="/submit">Submit</a>
  <br>
  @if (Auth::user()->role == 'admin')
    <a href="/admin/archives">Archive</a>
    <br>
    <a href="/admin/requests">Request</a>
    <br>
    <a href="/admin/reject">Reject</a>
    <br>
    <a href="/admin/changelogs">Change Log</a>
    <br>
    <a href="/admin/trash">Trash</a>
    <br>
  @endif

</body>
</html>

<link rel="stylesheet" href="//cdn.datatables.net/2.0.8/css/dataTables.dataTables.min.css">
<script src="https://code.jquery.com/jquery-3.7.1.min.js" integrity="sha256-/JqT3SQfawRcv/BIHPThkBvs0OEvtFFmqPF/lYI/Cxo=" crossorigin="anonymous"></script>
  <script src="//cdn.datatables.net/2.0.8/js/dataTables.min.js"></script>