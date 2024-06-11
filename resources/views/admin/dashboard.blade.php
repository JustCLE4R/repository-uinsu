@extends('admin.layouts.main')
@section('content')
    <div class="container-fluid pt-4 px-4">
        <div class="row g-4">
            <div class="col-sm-12 col-xl-12">
                <div class="bg-light rounded p-5 border-top border-success border-5" style="min-height: 70vh">
                    <div class="row">
                        <div class="col-12">
                            <span class="h4">Career</span>
                            <hr />
                        </div>
                    </div>

                    <div class="row g-0">
                        <div class="col-lg-3 col-md-4 col-sm-10">
                            <a href="/dashboard/career/create" class="btn btn-success btn-sm mb-3"><i
                                    class="bi bi-plus"></i> Tambah
                                Career</a>
                        </div>
                    </div>
                    <div class="table-responsive">
                        <table class="table text-start align-middle table-bordered table-hover mb-0">
                            <thead>
                                <tr class="text-dark">
                                    <th style="
                                        background-color: transparent !important;
                                    "
                                        class="col">
                                        No
                                    </th>
                                    <th style="
                                        background-color: transparent !important;
                                    "
                                        class="col">
                                        Perusahaan
                                    </th>
                                    <th style="
                                        background-color: transparent !important;
                                    "
                                        class="col">
                                        Posisi
                                    </th>
                                    <th style="
                                        background-color: transparent !important;
                                    "
                                        class="col text-center">
                                        Aksi
                                    </th>
                                </tr>
                            </thead>
                            <tbody
                                style="
                                background-color: transparent !important;
                            ">
                            </tbody>
                        </table>
                    </div>

                    <div class="col-lg-12 mt-3"></div>
                </div>
            </div>
        </div>
    </div>
@endsection
