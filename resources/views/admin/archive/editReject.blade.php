@extends('admin.layouts.main')
@section('content')
    <div class="container-fluid pt-4 px-4">
        <div class="row g-4">
            <div class="col-sm-12 col-xl-12">
                <div class="bg-light rounded p-5 border-top border-success border-5" style="min-height: 70vh">
                    <div class="row">
                        <div class="col-12">
                            <span class="h4">Penolakan</span>
                            <hr />
                        </div>
                    </div>

                    <div class="row">
                      <div class="col-12">
                        <form action="/admin/archive/{{ $archive->id }}/reject" method="POST">
                          @csrf
                          @method('PUT')
                          <div class="mb-3">
                            <label for="reason" class="form-label">Alasan Penolakan</label>
                            <textarea class="form-control" id="reason" name="reject_reason" rows="3" required></textarea>
                          </div>
                          <button type="submit" class="btn btn-success">Tolak!</button>
                        </form>
                      </div>
                    </div>

                    <div class="col-lg-12 mt-3"></div>
                </div>
            </div>
        </div>
    </div>
@endsection
