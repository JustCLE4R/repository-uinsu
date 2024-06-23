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
                                                <div class="counter" id="clientsCount">{{ $arsip['count'] }}</div>
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
                            <div class="col-lg-4 col-sm-12">
                                <div class=" mb-3">
                                    <select id="filterSelect" class="form-select">
                                        <option value="">Filter Arsip</option>
                                        <option value="tahun">Berdasarkan Tahun</option>
                                        <option value="division">Berdasarkan Divisi</option>
                                        <option value="author">Berdasarkan Author</option>
                                        <option value="subjek">Berdasarkan Subjek</option>
                                    </select>
                                </div>

                            </div>
                        </div>
                        <div class="row" id="tahun" > </div>
                        <div class="row" id="division"style="display: none;"> </div>
                        <div class="row" id="author" style="display: none;">
                            <nav aria-label="Page navigation">
                                <ul class="pagination" id="authorPagination"></ul>
                            </nav>
                        </div>
                        <div class="row" id="subjek" style="display: none;"> </div>

                    </div>
                </div>

            </div>
        </div>
    </section>
    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
    <script>
        // Select Filter
        $(document).ready(function() {

            $('#division').show();

            $('#filterSelect').change(function() {
                var selectedOption = $(this).val();
                $('#tahun, #division, #author, #subjek').hide();

                $('#' + selectedOption).show();
            });
        });

        //Filter tahun
        $(document).ready(function() {
            $.ajax({
                url: '/api/archives/count/tahun',
                method: 'GET',
                dataType: 'json',
                success: function(response) {
                    if (response.status === 'success') {
                        const data = response.data;
                        let htmlContent = '';

                        const sortedYears = Object.keys(data).sort((a, b) => b - a);

                        sortedYears.forEach(year => {
                            const count = data[year];
                            htmlContent += `
                        <div class="col-lg-2 col-md-4 col-sm-6">
                            <div class="shadow-sm my-2 p-3">
                                <a class="" href="/arsip/tahun/${year}">Tahun ${year} (${count})</a>
                            </div>
                        </div>
                    `;
                        });

                        $('#tahun').html(htmlContent);
                    }
                },
                error: function(error) {
                    console.error('Error fetching data:', error);
                }
            });
        });

        // Filter Divisi
        $(document).ready(function() {
            $.ajax({
                url: '/api/archives/count/division',
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

                        $('#division').html(htmlContent);
                    }
                },
                error: function(error) {
                    console.error('Error fetching data:', error);
                }
            });
        });

        // Filter Author
        $(document).ready(function() {
            const perPage = 40;
            let currentPage = 1;
            let totalItems = 0;

            function fetchData(page) {
                $.ajax({
                    url: `/api/archives/count/user?page=${page}&limit=${perPage}`,
                    method: 'GET',
                    dataType: 'json',
                    success: function(response) {
                        if (response.status === 'success') {
                            const data = response.data;
                            totalItems = data.length;

                            let htmlContent = '';

                            $.each(data, function(index, user) {
                                htmlContent += `
                                    <div class="col-lg-3 col-md-6 col-sm-12">
                                        <div class="shadow my-2 p-3">
                                            <a class="" href="/arsip/author/${encodeURIComponent(user.nama)}">${user.nama} (${user.count})</a>
                                        </div>
                                    </div>
                                `;
                            });

                            $('#author').html(htmlContent);

                            updatePagination();
                        }
                    },
                    error: function(error) {
                        console.error('Error fetching data:', error);
                    }
                });
            }

            function updatePagination() {
                const totalPages = Math.ceil(totalItems / perPage);

                let paginationHtml = '';
                paginationHtml += `
                    <li class="page-item ${currentPage === 1 ? 'disabled' : ''}">
                        <a class="page-link" href="#" aria-label="Previous" onclick="changePage(${currentPage - 1})">
                            <span aria-hidden="true">&laquo;</span>
                        </a>
                    </li>
                `;

                for (let i = 1; i <= totalPages; i++) {
                    paginationHtml += `
                        <li class="page-item ${currentPage === i ? 'active' : ''}">
                            <a class="page-link" href="#" onclick="changePage(${i})">${i}</a>
                        </li>
                    `;
                }

                paginationHtml += `
                    <li class="page-item ${currentPage === totalPages ? 'disabled' : ''}">
                        <a class="page-link" href="#" aria-label="Next" onclick="changePage(${currentPage + 1})">
                            <span aria-hidden="true">&raquo;</span>
                        </a>
                    </li>
                `;

                $('#authorPagination').html(paginationHtml);
            }

            window.changePage = function(page) {
                if (page < 1 || page > Math.ceil(totalItems / perPage)) {
                    return;
                }
                currentPage = page;
                fetchData(currentPage);
            };

            fetchData(currentPage);
        });

        // Count Arsip
        $(document).ready(function() {
            const clientsCount = $('#clientsCount');
            let clients = 0;
            let targetClients = {{ $arsip['count'] }};
            const interval = setInterval(function() {
                clients += Math.ceil((targetClients - clients) / 10);
                clientsCount.text(clients);
                if (clients >= targetClients) {
                    clearInterval(interval);
                }
            }, 100);
        });
    </script>
@endsection
