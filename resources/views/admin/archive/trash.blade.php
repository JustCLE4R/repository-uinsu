@extends('admin.layouts.main')
@section('content')
    <div class="container-fluid pt-4 px-4">
        <div class="row g-4">
            <div class="col-sm-12 col-xl-12">
                <div class="bg-light rounded p-5 border-top border-success border-5" style="min-height: 70vh">
                    <div class="row">
                        <div class="col-12">
                            <span class="h4">Sampah</span>
                            <hr />
                        </div>
                    </div>

                    <div class="table-responsive">
                        <table class="table text-start align-middle table-bordered table-hover mb-0">
                            <thead>
                                <tr class="text-dark">
                                    <th style="background-color: transparent !important; " class="col"> No </th>
                                    <th style="background-color: transparent !important; " class="col"> Pemilik </th>
                                    <th style=" background-color: transparent !important; " class="col"> Tipe  </th>
                                    <th style="background-color: transparent !important; " class="col"> Judul </th>
                                    <th style="background-color: transparent !important; " class="col"> Abstrak </th>
                                    <th style=" background-color: transparent !important; " class="col"> Editor  </th>
                                    <th style=" background-color: transparent !important; " class="col text-center"> File </th>
                                    <th style=" background-color: transparent !important; " class="col text-center"> Aksi </th>
                                </tr>
                            </thead>
                            <tbody style=" background-color: transparent !important; ">
                              @foreach ($archives as $archive)
                                <tr>
                                  <td>{{ $loop->iteration }}</td>
                                  <td>{{ $archive->user->nama }}</td>
                                  <td>{{ $archive->type }}</td>
                                  <td>{{ $archive->title }}</td>
                                  <td>{{ $archive->abstract }}</td>
                                  <td>{{ $archive->editor }}</td>
                                  <td class="text-center"><a class="btn btn-sm btn-success" target="_blank" href="{{ asset('storage/'.$archive->file) }}">Buka</a></td>
                                  <td width="7%" class="text-center">
                                    <form action="/admin/trash/{{ $archive->id }}" method="POST" class="d-inline">
                                      @csrf
                                      @method('PUT')
                                      <input type="hidden" name="restore" value="1">
                                      <button type="submit" class="btn btn-sm btn-success py-0 px-1" onclick="return confirm('Are you sure to restore?')"><i class="bi bi-arrow-counterclockwise"></i></button>
                                    </form>
                                    <form action="/admin/trash/{{ $archive->id }}" method="POST" class="d-inline">
                                      @csrf
                                      @method('DELETE')
                                      <button type="submit" class="btn btn-sm btn-danger py-0 px-1" onclick="return confirm('Are you sure to force delete?')"><i class="bi bi-trash"></i></button>
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
@endsection
