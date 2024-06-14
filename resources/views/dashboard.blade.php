@extends('layouts.main')
@section('content')
    <section id="home" class="hero-section">
        <div class="container">
            <div class="row align-items-center">
                <div class="col-lg-6">
                    <div class="hero-content">
                        <span class="wow fadeInLeft fs-5 text-secondary" data-wow-delay=".2s">Selamat Datang, {{ Auth::user()->nama }} di </span>
                        <h1 class="wow fadeInUp " data-wow-delay=".4s">Dashboard Repositori Universitas Islam Negeri Sumatera
                            Utara
                        </h1>
                        <p class="wow fadeInUp" data-wow-delay=".6s">Dalam Dashboard ini Anda bisa mengelola dokumen arsip anda dengan sangat mudah</p>

                        {{-- <div class="about-counter mt-50 ">
                            <div class="row">
                                <div class="col-sm-4 ">
                                    <div class="single-counter counter-color-1 d-flex wow fadeInUp" data-wow-duration="1s"
                                        data-wow-delay="0.3s">
                                        <div class="counter-content media-body">
                                            <div class="counter-count">
                                                <div class="counter" id="clientsCount">4352320</div>
                                            </div>
                                            <p class="text">Dokumen Arsip</p>
                                        </div>
                                    </div> <!-- single counter -->
                                </div>


                            </div>
                        </div> --}}

                        <a href="/logout" class="btn btn-success">Logout</a>

                    </div>
                </div>
                <div class="col-lg-6">
                    <div class="hero-img wow fadeInUp" data-wow-delay=".5s">
                        <img src="assets/img/dashboard.svg" class="wave-animation-1" alt="">
                    </div>

                </div>
            </div>
        </div>
    </section>


    <section id="career" class="about-section pt-100 pb-100">
        <div class="container">
            <div class="row align-items-center">
                <div class="col-xl-12 col-lg-12">
                    <div class="about-content">
                        <div class="section-title mb-30">
                            <h1 class="mb-25 wow fadeInUp text-center" data-wow-delay=".2s">Dokumen Arsip Anda</h1>
                        </div>
                        <div class="row">
                            <div class="col-lg-4 col-sm-12 my-4">
                                    <select id="tahunLulusSelect-pekerja" class="form-select">
                                        <option value="">Pilih Status Arsip</option>
                                        <option value="Diterima">Diterima</option>
                                        <option value="Ditolak">Ditolak</option>
                                        <option value="Dalam Proses">Dalam Proses</option>
                                    </select>
                            </div>
                        </div>
                        <div class="row">

                            <div class="col-lg-4 col-md-6 col-sm-12">
                                <div class="accordion  wow fadeInUp shadow" data-wow-delay=".2s" id="accordionExample"
                                    style="visibility: visible; animation-delay: 0.2s; animation-name: fadeInUp;">
                                    <div class="single-faq">
                                        <button class="w-100 ps-4 text-start collapsed" type="button"
                                            data-bs-toggle="collapse" data-bs-target="#collapseOne" aria-expanded="true"
                                            aria-controls="collapseOne">
                                            <p>Informasi Selengkapnya</p>
                                        </button>
                                        <div id="collapseOne" class="collapse" aria-labelledby="headingOne"
                                            data-bs-parent="#accordionExample">
                                            <div class="faq-content d-flex flex-wrap" style="text-align: justify;">
                                                <p class="wow fadeInUp" data-wow-delay=".3s">Jenis koleksi tersebut
                                                    meliputi: semua hasil karya dosen UIN Sumatera Utara </p>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="col-lg-4 col-md-6 col-sm-12">
                                <div class="accordion  wow fadeInUp shadow" data-wow-delay=".2s" id="accordionExample"
                                    style="visibility: visible; animation-delay: 0.2s; animation-name: fadeInUp;">
                                    <div class="single-faq">
                                        <button class="w-100 ps-4 text-start collapsed" type="button"
                                            data-bs-toggle="collapse" data-bs-target="#collapseOne" aria-expanded="true"
                                            aria-controls="collapseOne">
                                            <p>Informasi Selengkapnya</p>
                                        </button>
                                        <div id="collapseOne" class="collapse" aria-labelledby="headingOne"
                                            data-bs-parent="#accordionExample">
                                            <div class="faq-content d-flex flex-wrap" style="text-align: justify;">
                                                <p class="wow fadeInUp" data-wow-delay=".3s">Jenis koleksi tersebut
                                                    meliputi: semua hasil karya dosen UIN Sumatera Utara </p>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="col-lg-4 col-md-6 col-sm-12">
                                <div class="accordion  wow fadeInUp shadow" data-wow-delay=".2s" id="accordionExample"
                                    style="visibility: visible; animation-delay: 0.2s; animation-name: fadeInUp;">
                                    <div class="single-faq">
                                        <button class="w-100 ps-4 text-start collapsed" type="button"
                                            data-bs-toggle="collapse" data-bs-target="#collapseOne" aria-expanded="true"
                                            aria-controls="collapseOne">
                                            <p>Informasi Selengkapnya</p>
                                        </button>
                                        <div id="collapseOne" class="collapse" aria-labelledby="headingOne"
                                            data-bs-parent="#accordionExample">
                                            <div class="faq-content d-flex flex-wrap" style="text-align: justify;">
                                                <p class="wow fadeInUp" data-wow-delay=".3s">Jenis koleksi tersebut
                                                    meliputi: semua hasil karya dosen UIN Sumatera Utara </p>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>

                        </div>
                    </div>
                </div>

            </div>
        </div>
    </section>
@endsection
