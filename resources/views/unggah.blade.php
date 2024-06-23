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
                        <a href="#unggah" class="btn btn-success wow fadeInUp " data-wow-delay=".4s">Unggah <i class="fa-solid fa-upload"></i> </a>
                    </div>
                </div>
                <div class="col-lg-6">
                    <div class="hero-img wow fadeInUp" data-wow-delay=".5s" >
                        <img src="assets/img/unggah-3.svg" class="wave-animation-1" alt="">
                    </div>

                </div>
            </div>
        </div>
    </section>


    <section id="unggah" class="about-section pt-100 pb-100">
        <div class="container">
            <div class="row align-items-center">
                <div class="col-xl-12 col-lg-12">
                    <div class="about-content">
                        <div class="section-title mb-30">
                            <h1 class="mb-25 wow fadeInUp text-center" data-wow-delay=".2s">Unggah Dokumen di Repositori
                            </h1>
                            <div class="shadow p-5 ">
                                <form method="post" action="/submit" enctype="multipart/form-data">
                                    @csrf
                                    <div class="row justify-content-start page page-active">
                                      <div class="col-12">
                                        <h5>Form Publikasi</h5>
                                      </div>
                                      <div class="col-lg-4 col-md-6 col-sm-12 my-2">
                                        <label for="type" class="form-label">Tipe</label>
                                        <input type="text" class="form-control" id="type" name="type" required>
                                      </div>
                                      <div class="col-lg-4 col-md-6 col-sm-12 my-2">
                                        <label for="title" class="form-label">Judul</label>
                                        <input type="text" class="form-control" id="title" name="title" required>
                                      </div>
                                      <div class="col-lg-4 col-md-6 col-sm-12 my-2">
                                        <label for="abstract" class="form-label">Abstrak</label>
                                        <input type="text" class="form-control" id="abstract" name="abstract" required>
                                      </div>
                                      <div class="col-lg-4 col-md-6 col-sm-12 my-2">
                                        <label for="editor" class="form-label">Editor</label>
                                        <input type="text" class="form-control" id="editor" name="editor" required>
                                      </div>
                                      <div class="col-lg-4 col-md-6 col-sm-12 my-2">
                                        <label for="file" class="form-label">File</label>
                                        <input type="file" class="form-control" id="file" name="file" required>
                                      </div>
                                    </div>
                                    <div class="row justify-content-between page page-active">
                                      <div class="col-12">
                                        <h5>Detail Publikasi</h5>
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
                                        <input type="text" class="form-control" id="official_url" name="official_url" required>
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
                                        <input type="text" class="form-control" id="identification_number" name="identification_number" required>
                                      </div>
                                      <div class="col-lg-4 col-md-6 col-sm-12 my-2">
                                        <label for="journal_name" class="form-label">Nama Jurnal</label>
                                        <input type="text" class="form-control" id="journal_name" name="journal_name" required>
                                      </div>
                                      <div class="col-lg-4 col-md-6 col-sm-12 my-2">
                                        <label for="subjek" class="form-label">Subjek</label>
                                        <input type="text" class="form-control" id="subjek" name="subjek" required>
                                      </div>
                                      <div class="col-lg-4 col-md-6 col-sm-12 my-2">
                                        <label for="nomor_klasifikasi" class="form-label">Nomor Klasifikasi</label>
                                        <input type="text" class="form-control" id="nomor_klasifikasi" name="nomor_klasifikasi" required>
                                      </div>
                                    </div>       
                                    <div class="col-12 text-end">
                                        <button type="submit" class="btn btn-success mt-3">Ajukan Dokumen</button>
                                    </div>
                                  </form>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
@endsection
