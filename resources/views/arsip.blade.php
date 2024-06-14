@extends('layouts.main')
@section('content')
    <section id="home" class="hero-section">
        <div class="container">
            <div class="row align-items-center">
                <div class="col-lg-6">
                    <div class="hero-content">
                        <span class="wow fadeInLeft fs-5 text-secondary" data-wow-delay=".2s">Selamat Datang </span>
                        <h1 class="wow fadeInUp " data-wow-delay=".4s">Arsip Universitas Islam Negeri Sumatera
                            Utara
                        </h1>
                        <p class="wow fadeInUp" data-wow-delay=".6s">Arsip Universitas Islam Negeri Sumatera Utara
                            (UINSU) merupakan wadah untuk mempublikasi semua jenis koleksi elektronik yang dihasilkan
                            oleh civitas akademika UIN Sumatera Utara.</p>

                        <div class="about-counter mt-50 ">
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
                        </div>


                    </div>
                </div>
                <div class="col-lg-6">
                    <div class="hero-img wow fadeInUp" style="margin-top: -65px;" data-wow-delay=".5s">
                        <img src="assets/img/hero-3.svg" class="wave-animation-1" alt="">
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
                            <h1 class="mb-25 wow fadeInUp text-center" data-wow-delay=".2s">Arsip UIN Sumatera
                                Utara</h1>
                        </div>
                        <div class="row">
                            <div class="col-lg-5 col-sm-12">
                                <div class="input-group mb-3">
                                    <select id="tahunLulusSelect-pekerja" class="form-select">
                                        <option value="">Pilih Tahun</option>
                                        <option value="2022">2022</option>
                                        <option value="2023">2023</option>
                                        <option value="2024">2024</option>
                                    </select>
                                    <select id="fakultasSelect-pekerja" class="form-select">
                                        <option value="">Pilih Subjek</option>
                                        <option value="Ushuluddin%20dan%20Studi%20Islam">Ushuluddin dan Studi Islam
                                        </option>
                                        <option value="Ekonomi%20dan%20Bisnis%20Islam">Ekonomi dan Bisnis Islam</option>
                                        <option value="Dakwah%20dan%20Komunikasi">Dakwah dan Komunikasi</option>
                                        <option value="Syariah%20dan%20Hukum">Syariah dan Hukum</option>
                                        <option value="Ilmu%20Tarbiyah%20dan%20Keguruan">Ilmu Tarbiyah dan Keguruan
                                        </option>
                                        <option value="Ilmu%20Sosial">Ilmu Sosial</option>
                                        <option value="Sains%20dan%20Teknologi">Sains dan Teknologi</option>
                                        <option value="Kesehatan%20Masyarakat">Kesehatan Masyarakat</option>
                                        <option value="Pascasarjana">Pascasarjana</option>
                                    </select>

                                </div>

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
