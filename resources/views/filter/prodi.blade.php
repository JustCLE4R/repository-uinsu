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
                                                <div class="counter" id="clientsCount">333</div>
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
                        <img src="/assets/img/hero-3.svg" class="wave-animation-1" alt="">
                    </div>

                </div>
            </div>
        </div>
    </section>


    <section id="career" class="pt-100 pb-100">
        <div class="container">
            <div class="row align-items-center">
                <div class="col-xl-12 col-lg-12">
                    <div class="">
                        <div class="section-title mb-30">
                            <h1 class="mb-25 wow fadeInUp text-center" data-wow-delay=".2s">Arsip UIN Sumatera
                                Utara</h1>
                        </div>
                        <div class="row">
                            <div class="col-12">
                                <a class="text-success" href="/arsip"><i class="fa-solid fa-angles-left"></i> Kembali</a>
                            </div>
                            <div id="nama-prodi" class="col-12">

                            </div>
                        </div>
                        <div class="row" id="prodi">
                            <!-- Data will be inserted here -->
                        </div>

                        <nav aria-label="Page navigation example">
                            <ul class="pagination">
                                <li class="page-item">
                                    <a class="page-link" href="#" id="prevPage" aria-label="Previous">
                                        <span aria-hidden="true">&laquo;</span>
                                    </a>
                                </li>
                                <li class="page-item"><a class="page-link" href="#" id="page1">1</a></li>
                                <li class="page-item"><a class="page-link" href="#" id="page2">2</a></li>
                                <li class="page-item"><a class="page-link" href="#" id="page3">3</a></li>
                                <li class="page-item">
                                    <a class="page-link" href="#" id="nextPage" aria-label="Next">
                                        <span aria-hidden="true">&raquo;</span>
                                    </a>
                                </li>
                            </ul>
                        </nav>

                    </div>

                </div>
            </div>
    </section>
    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
    <script>
        $(document).ready(function() {
            const resultsPerPage = 10;
            let currentPage = 1;
            let searchQuery = '';
            let filteredData = [];

            // Handle search input
            $('#search-input').on('input', function() {
                searchQuery = $(this).val();
                currentPage = 1; // Reset to the first page on new search
                performSearch();
            });

            // Handle pagination click
            $('.pagination').on('click', 'a', function(e) {
                e.preventDefault();
                const id = $(this).attr('id');

                if (id === 'prevPage') {
                    if (currentPage > 1) {
                        currentPage--;
                        renderResults(filteredData);
                    }
                } else if (id === 'nextPage') {
                    currentPage++;
                    renderResults(filteredData);
                } else {
                    currentPage = parseInt($(this).text());
                    renderResults(filteredData);
                }
            });

            function performSearch() {
                $.ajax({
                    url: `/api/archives`,
                    method: 'GET',
                    dataType: 'json',
                    success: function(response) {
                        if (response.status === 'success') {
                            const data = response.data;
                            filteredData = filterResults(data);
                            renderResults(filteredData);
                        } else {
                            $('#pencarian').html('<p>Data tidak ditemukan.</p>');
                        }
                    },
                    error: function(error) {
                        console.error('Error fetching data:', error);
                        $('#pencarian').html('<p>Terjadi kesalahan saat mengambil data.</p>');
                    }
                });
            }

            function filterResults(data) {
                return data.filter(archive => {
                    return archive.title.includes(searchQuery) ||
                        archive.tempat_terbit.includes(searchQuery) ||
                        archive.isbn_issn.includes(searchQuery) ||
                        archive.user.nama.includes(searchQuery);
                });
            }

            function formatDate(dateString) {
                const options = {
                    year: 'numeric',
                    month: 'long',
                    day: 'numeric'
                };
                return new Date(dateString).toLocaleDateString('id-ID', options);
            }

            function renderResults(data) {
                let htmlContent = '';
                const totalPages = Math.ceil(data.length / resultsPerPage);
                const start = (currentPage - 1) * resultsPerPage;
                const end = start + resultsPerPage;

                const paginatedData = data.slice(start, end);

                if (paginatedData.length === 0) {
                    $('#pencarian').html('<p>Data tidak ditemukan.</p>');
                    return;
                }

                paginatedData.forEach(archive => {
                    const year = new Date(archive.date).getFullYear();
                    htmlContent += `
                <div class="col-12">
                    <div class="accordion wow fadeInUp shadow" data-wow-delay=".2s" id="accordionExample"
                        style="visibility: visible; animation-delay: 0.2s; animation-name: fadeInUp;">
                        <div class="single-faq">
                            <button class="w-100 ps-3 pe-5 text-start collapsed" type="button"
                                data-bs-toggle="collapse" data-bs-target="#collapse${archive.id}"
                                aria-expanded="false" aria-controls="collapse${archive.id}">
                                <p>${archive.user.nama} (${year}) <a href="#">${archive.title}</a> ${archive.tempat_terbit} ${archive.isbn_issn}</p>
                            </button>
                            <div id="collapse${archive.id}" class="collapse"
                                aria-labelledby="heading${archive.id}" data-bs-parent="#accordionExample"
                                style="">
                                <div class="faq-content d-flex flex-wrap" style="text-align: justify;">
                                    <ul class="">
                                        <li><i class="fa-solid fa-caret-right"></i> Jenis Item: ${archive.type}</li>
                                        <li><i class="fa-solid fa-caret-right"></i> Subjek: ${archive.subjek}</li>
                                        <li><i class="fa-solid fa-caret-right"></i> Division: Fakultas ${archive.fakultas}, Prodi ${archive.program_studi}</li>
                                        <li><i class="fa-solid fa-caret-right"></i> Editor: ${archive.editor}</li>
                                        <li><i class="fa-solid fa-caret-right"></i> Dibuat Pada: ${formatDate(archive.created_at)}</li>
                                        <li><i class="fa-solid fa-caret-right"></i> Update Terakhir Pada: ${formatDate(archive.updated_at)}</li>
                                        <li><i class="fa-solid fa-caret-right"></i> <a href="${archive.official_url}">Buka File</a></li>
                                    </ul>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            `;
                });

                $('#pencarian').html(htmlContent);
                renderPagination(totalPages);
            }

            function renderPagination(totalPages) {
                let paginationContent = '';

                if (totalPages > 1) {
                    if (currentPage > 1) {
                        paginationContent += `
                    <li class="page-item">
                        <a class="page-link" href="#" id="prevPage" aria-label="Previous">
                            <span aria-hidden="true">&laquo;</span>
                        </a>
                    </li>
                `;
                    }

                    for (let i = 1; i <= totalPages; i++) {
                        paginationContent += `
                    <li class="page-item ${i === currentPage ? 'active' : ''}">
                        <a class="page-link" href="#" id="page${i}">${i}</a>
                    </li>
                `;
                    }

                    if (currentPage < totalPages) {
                        paginationContent += `
                    <li class="page-item">
                        <a class="page-link" href="#" id="nextPage" aria-label="Next">
                            <span aria-hidden="true">&raquo;</span>
                        </a>
                    </li>
                `;
                    }
                }

                $('.pagination').html(paginationContent);
            }

            // Perform initial search to populate the page
            performSearch();
        });
    </script>
@endsection
