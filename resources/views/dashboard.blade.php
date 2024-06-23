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

                        <a href="/logout" class="btn btn-success wow fadeInUp " data-wow-delay=".4s">Logout <i class="fa-solid fa-arrow-right-from-bracket"></i> </a>

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
                            <div class="col-lg-4 col-sm-12">
                                <div class=" mb-3">
                                    <select id="filterSelect" class="form-select">
                                        <option value="">Filter Arsip</option>
                                        <option value="diproses">Sedang Diproses</option>
                                        <option value="ditolak">Ditolak</option>
                                        <option value="diterima">Diterima</option>
                                    </select>
                                </div>

                            </div>
                        </div>
                        <div class="row" id="semua" > </div>
                        <div class="row" id="diproses" style="display: none"> </div>
                        <div class="row" id="ditolak" style="display: none"> </div>
                        <div class="row" id="diterima" style="display: none"> </div>
                    </div>
                </div>

            </div>
        </div>
    </section>
    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
    <script>
         // Filter Semua
         $(document).ready(function() {
            $.ajax({
                url: '/api/archives?user={{ Auth::user()->nama }}',
                method: 'GET',
                dataType: 'json',
                success: function(response) {
                    if (response.status === 'success') {
                        const data = response.data;
                        let htmlContent = '';

                        $.each(data, function(division, details) {
                            const count = details.count;
                            const programs = details.program_studi;

                            let programList = '';
                            $.each(programs, function(program, programCount) {
                                programList += `
                                    <li><a href="/arsip/prodi/${encodeURIComponent(program)}">
                                    <i class="fa-solid fa-caret-right"></i> Prodi ${program} (${programCount})</a></li>
                                `;
                            });

                            htmlContent += `
                                <div class="col-lg-4 col-md-6 col-sm-12">
                                    <div class="accordion  wow fadeInUp shadow" data-wow-delay=".2s" id="accordionExample"
                                        style="visibility: visible; animation-delay: 0.2s; animation-name: fadeInUp;">
                                        <div class="single-faq">
                                            <button class="w-100 ps-3 pe-5 text-start collapsed" type="button"
                                                data-bs-toggle="collapse" data-bs-target="#collapse${division.replace(/\s+/g, '')}" aria-expanded="true"
                                                aria-controls="collapse${division.replace(/\s+/g, '')}">
                                                <p>${division} (${count})</p>
                                            </button>
                                            <div id="collapse${division.replace(/\s+/g, '')}" class="collapse" aria-labelledby="heading${division.replace(/\s+/g, '')}"
                                                data-bs-parent="#accordionExample">
                                                <div class="faq-content d-flex flex-wrap" style="text-align: justify;">
                                                    <p><b><a href="/arsip/fakultas/${encodeURIComponent(division)}">Fakultas ${division} (${count})</a></b></p>
                                                    <ul class="">
                                                        ${programList}
                                                    </ul>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            `;
                        });

                        $('#semua').html(htmlContent);
                    }
                },
                error: function(error) {
                    console.error('Error fetching data:', error);
                }
            });
        });
    </script>
@endsection
