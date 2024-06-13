@extends('admin.layouts.main')
@section('content')

<!-- DataTables CSS -->
<link rel="stylesheet" href="https://cdn.datatables.net/1.13.4/css/jquery.dataTables.min.css">

<!-- jQuery -->
<script src="https://code.jquery.com/jquery-3.7.1.min.js" integrity="sha256-/JqT3SQfawRcv/BIHPThkBvs0OEvtFFmqPF/lYI/Cxo=" crossorigin="anonymous"></script>

<!-- DataTables JS -->
<script src="https://cdn.datatables.net/1.13.4/js/jquery.dataTables.min.js"></script>

<div class="container-fluid pt-4 px-4">
    <div class="row g-4">
        <div class="col-sm-12 col-xl-12">
            <div class="bg-light rounded p-5 border-top border-success border-5" style="min-height: 70vh">
                <div class="row">
                    <div class="col-12">
                        <span class="h4">Pengajuan</span>
                        <hr />
                    </div>
                </div>

                <div class="table-responsive">
                    <table class="table text-start align-middle table-bordered table-hover mb-0" id="requestTable">
                        <thead>
                            <tr class="text-dark">
                                <th style="background-color: transparent !important;" class="col">No</th>
                                <th style="background-color: transparent !important;" class="col">Pemilik</th>
                                <th style="background-color: transparent !important;" class="col">Tipe</th>
                                <th style="background-color: transparent !important;" class="col">Judul</th>
                                <th style="background-color: transparent !important;" class="col">Abstrak</th>
                                <th style="background-color: transparent !important;" class="col">Editor</th>
                                <th style="background-color: transparent !important;" class="col text-center">File</th>
                                <th style="background-color: transparent !important;" class="col text-center">Aksi</th>
                            </tr>
                        </thead>
                        <tbody style="background-color: transparent !important;">
                            @foreach ($archives as $archive)
                            <tr>
                                <td>{{ $loop->iteration }}</td>
                                <td>{{ $archive->user->nama }}</td>
                                <td>{{ $archive->type }}</td>
                                <td>{{ $archive->title }}</td>
                                <td>{{ $archive->abstract }}</td>
                                <td>{{ $archive->editor }}</td>
                                <td class="text-center"><a class="btn btn-sm btn-success" target="_blank" href="{{ asset('storage/'.$archive->file) }}">Buka</a></td>
                                <td width="12%" class="text-center">
                                    <a href="/admin/archive/{{ $archive->id }}" class="btn btn-sm btn-primary py-0 px-1 d-inline"><i class="bi bi-eye-fill"></i></a>
                                    <a href="/admin/archive/{{ $archive->id }}/editaccept" class="btn btn-sm btn-success py-0 px-1 d-inline"><i class="bi bi-check2"></i></a>
                                    <a href="/admin/archive/{{ $archive->id }}/editreject" class="btn btn-sm btn-warning py-0 px-1 d-inline"><i class="bi bi-x-lg"></i></a>
                                    <form action="/admin/archive/{{ $archive->id }}" method="POST" class="d-inline">
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

                <div class="col-lg-12 mt-3"></div>
            </div>
        </div>
    </div>
</div>
<script>
    $(document).ready(function() {
        $('#requestTable').DataTable({
            "paging": true,
            "lengthChange": true,
            "searching": true,
            "ordering": true,
            "info": true,
            "autoWidth": false,
        });
    });
</script>
@endsection
