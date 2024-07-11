@extends('layouts.main')
@section('content')
    <section id="home" class="hero-section">
        <div class="container">
            <div class="row align-items-center">
                <div class="col-lg-6">
                    <div class="hero-content">
                        <span class="wow fadeInLeft fs-5 text-secondary" data-wow-delay=".2s">Selamat Datang </span>
                        <h1 class="wow fadeInUp " data-wow-delay=".4s">Unggah Repositori Universitas Islam Negeri
                            Sumatera Utara
                        </h1>
                        <p class="wow fadeInUp" data-wow-delay=".6s">Anda Ingin Mengunggah Dokumen anda di Repositori
                            Universitas Islam Negeri Sumatera Utara ? Login Lalu Selesaikan Proses Pengunggahan Dokumen</p>
                        <a href="#" class="btn btn-success wow fadeInUp" data-bs-toggle="modal"
                            data-bs-target="#unggahModal" data-wow-delay=".4s">Unggah <i class="fa-solid fa-upload"></i></a>
                    </div>
                </div>
                <div class="col-lg-6">
                    <div class="hero-img wow fadeInUp" data-wow-delay=".5s">
                        <img src="assets/img/unggah-3.svg" class="wave-animation-1" alt="">
                    </div>

                </div>
            </div>
        </div>
    </section>

    <div class="modal fade" id="unggahModal" tabindex="-1" aria-labelledby="unggahModalLabel" aria-hidden="true">
        <div class="modal-dialog modal-lg">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title text-center" id="unggahModalLabel">Unggah Arsip</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body p-5 pt-3">
                    <form method="post" action="/submit" enctype="multipart/form-data">
                        @csrf
                        <div class="row justify-content-start page page-active">
                            <div class="col-12">
                                <h6>Form Publikasi</h6>
                            </div>
                            <div class="col-lg-6 col-md-6 col-sm-12 my-2">
                                <label for="title" class="form-label">Judul</label>
                                <input type="text" class="form-control" id="title" name="title" required>
                            </div>                           
                            <div class="col-lg-6 col-md-6 col-sm-12 my-2">
                                <label for="type" class="form-label">Tipe</label>
                                <input type="text" class="form-control" id="type" name="type" required>
                            </div>
                            <div class="col-lg-6 col-md-6 col-sm-12 my-2">
                                <label for="editor" class="form-label">Editor</label>
                                <input type="text" class="form-control" id="editor" name="editor" required>
                            </div>
                            <div class="col-lg-6 col-md-6 col-sm-12 my-2">
                                <label for="file" class="form-label">Berkas</label>
                                <input type="file" class="form-control" id="file" name="file" required>
                            </div>
                            <div class="col-lg-12 col-md-12 col-sm-12 my-2">
                                <label for="abstract" class="form-label">Abstrak</label>
                                <textarea type="text" class="form-control" id="abstract" name="abstract" required cols="30" rows="3"></textarea>
                            </div>
                        </div>
                        <div class="row pt-2 justify-content-between page page-active">
                            <div class="col-12">
                                <h6>Detail Publikasi</h6>
                            </div>
                            <div class="col-lg-4 col-md-6 col-sm-12 my-2">
                                <label for="penerbit" class="form-label">Penerbit</label>
                                <input type="text" class="form-control" id="penerbit" name="penerbit" required>
                            </div>
                            <div class="col-lg-4 col-md-6 col-sm-12 my-2">
                                <label for="tempat_terbit" class="form-label">Tempat Terbit</label>
                                <input type="text" class="form-control" id="tempat_terbit" name="tempat_terbit" required>
                            </div>
                            <div class="col-lg-4 col-md-6 col-sm-12 my-2">
                                <label for="isbn_issn" class="form-label">ISBN/ISSN</label>
                                <input type="text" class="form-control" id="isbn_issn" name="isbn_issn" required>
                            </div>
                            <div class="col-lg-4 col-md-6 col-sm-12 my-2">
                                <label for="official_url" class="form-label">Official URL</label>
                                <input type="text" class="form-control" id="official_url" name="official_url"
                                    required>
                            </div>
                            <div class="col-lg-4 col-md-6 col-sm-12 my-2">
                                <label for="date" class="form-label">Tanggal &amp; Waktu</label>
                                <input type="date" class="form-control" id="date" name="date" required>
                            </div>
                            <div class="col-lg-4 col-md-6 col-sm-12 my-2">
                                <label for="volume" class="form-label">Volume</label>
                                <input type="text" class="form-control" id="volume" name="volume" required>
                            </div>
                            <div class="col-lg-4 col-md-6 col-sm-12 my-2">
                                <label for="number" class="form-label">Nomor</label>
                                <input type="text" class="form-control" id="number" name="number" required>
                            </div>
                            <div class="col-lg-4 col-md-6 col-sm-12 my-2">
                                <label for="page" class="form-label">Halaman</label>
                                <input type="text" class="form-control" id="page" name="page" required>
                            </div>
                            <div class="col-lg-4 col-md-6 col-sm-12 my-2">
                                <label for="identification_number" class="form-label">Nomor Identifikasi</label>
                                <input type="text" class="form-control" id="identification_number"
                                    name="identification_number" required>
                            </div>
                            <div class="col-lg-4 col-md-6 col-sm-12 my-2">
                                <label for="journal_name" class="form-label">Nama Jurnal</label>
                                <input type="text" class="form-control" id="journal_name" name="journal_name"
                                    required>
                            </div>
                            <div class="col-lg-4 col-md-6 col-sm-12 my-2">
                                <label for="subject_id" class="form-label">Subjek</label>
                                <select class="form-control" id="subject_id" name="subject_id" required>
                                    <option value="" selected hidden>Pilih Subjek</option>
                                    @foreach ($subjects as $subject)
                                        <option value="{{ $subject->id }}">{{ '[' . $subject->code . '] ' . $subject->name }}</option>
                                    @endforeach
                                </select>
                            </div>
                            <div class="col-lg-4 col-md-6 col-sm-12 my-2">
                                <label for="nomor_klasifikasi" class="form-label">Nomor Klasifikasi</label>
                                <input type="text" class="form-control" id="nomor_klasifikasi"
                                    name="nomor_klasifikasi" required>
                            </div>
                            <div class="col-lg-4 col-md-6 col-sm-12 my-2">
                                <label for="visibility" class="form-label">Visibilitas</label>
                                <select class="form-control" id="visibility" name="visibility" required>
                                    <option value="" selected hidden>Pilih Visibilitas</option>
                                    <option value="public">Public</option>
                                    <option value="private">Private</option>
                                </select>
                            </div>
                        </div>
                        <div class="col-12 text-end">
                            <button type="submit" class="btn btn-success mt-3">Ajukan Dokumen <i class="fa-solid fa-upload"></i></button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
@endsection
