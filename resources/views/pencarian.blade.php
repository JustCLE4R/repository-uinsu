@extends('layouts.main')
@section('content')
    <section id="home" class="hero-section">
        <div class="container">
            <div class="row align-items-center">
                <div class="col-lg-6">
                    <div class="hero-content">
                        <span class="wow fadeInLeft fs-5 text-secondary" data-wow-delay=".2s">Selamat Datang </span>
                        <h1 class="wow fadeInUp " data-wow-delay=".4s">Pencarian Repositori Universitas Islam Negeri
                            Sumatera Utara
                        </h1>
                        <p class="wow fadeInUp" data-wow-delay=".6s">Anda Ingin Mecari Dokumen di Repositori Universitas
                            Islam Negeri Sumatera Utara Dengan Cepat? Kunjungi dan Lakukan Pencarian Cepat dan Mudah disini
                        </p>

                        <div class="about-counter ">
                            <div class="row">
                                <div class="col-5">
                                    <div class="search-box wow fadeInUp" data-wow-delay=".4s">
                                        <input type="text" id="search-input" placeholder="Cari Arsip Disini..">
                                        <div class="search-icon">
                                            <i class="fas fa-search"></i>
                                        </div>
                                        <div class="cancel-icon">
                                            <i class="fas fa-times"></i>
                                        </div>
                                        <div class="search-data"></div>
                                    </div>
                                </div>
                            </div>
                        </div>


                    </div>
                </div>
                <div class="col-lg-6">
                    <div class="hero-img wow fadeInUp" data-wow-delay=".5s">
                        <img src="assets/img/search-3.svg" class="wave-animation-1" alt="">
                    </div>

                </div>
            </div>
        </div>
    </section>


    <section id="career" class=" pt-100 pb-100">
        <div class="container">
            <div class="row align-items-center">
                <div class="col-xl-12 col-lg-12">
                    <div class="about-content">
                        <div class="section-title mb-30">
                            <h1 class="mb-25 wow fadeInUp text-center" data-wow-delay=".2s">Hasil Pencarian Repositori </h1>

                        </div>
                        <div class="col-12 my-2">
                            <a class="text-success" href="/pencarian"><i class="fa-regular fa-window-restore"></i> Reset</a>
                        </div>
                        <div class="row" id="pencarian">
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
        </div>
    </section>
    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
    <script>
        $(document).ready(function() {
            const resultsPerPage = 10;
            let currentPage = 1;
            let searchQuery = '';

            // Handle search input
            $('#search-input').on('input', function() {
                searchQuery = $(this).val();
                console.log("Search query:", searchQuery); // Debug log
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
                        performSearch();
                    }
                } else if (id === 'nextPage') {
                    currentPage++;
                    performSearch();
                } else {
                    currentPage = parseInt($(this).text());
                    performSearch();
                }
            });

            function performSearch() {
                console.log("Performing search for page:", currentPage); // Debug log
                $.ajax({
                    url: `/api/archives?search=${encodeURIComponent(searchQuery)}&page=${currentPage}`,
                    method: 'GET',
                    dataType: 'json',
                    success: function(response) {
                        console.log("API response:", response); // Debug log
                        if (response.status === 'success') {
                            const data = response.data;
                            renderResults(data);
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

            function renderResults(data) {
                let htmlContent = '';

                if (data.length === 0) {
                    $('#pencarian').html('<p>Data tidak ditemukan.</p>');
                    return;
                }

                const filteredData = data.filter(archive => {
                    const year = new Date(archive.date).getFullYear();
                    return archive.title.includes(searchQuery) ||
                        archive.tempat_terbit.includes(searchQuery) ||
                        archive.isbn_issn.includes(searchQuery) ||
                        archive.user.nama.includes(searchQuery);
                });

                filteredData.forEach(archive => {
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
                                <div class="faq-content d-flex row" style="text-align: start;">                            
                               
                                       <div class="col-lg-3 col-sm-12">                                            
                                           <a href="${archive.official_url}" target="_blank">
                                               <img src="https://i.pinimg.com/736x/13/67/8e/13678e13661844593564d8587f112ba6.jpg" alt="Cover" width="200px" height="250px">
                                           </a>
                                       </div>
                                                   
                                       <div class="col-lg-9 col-sm-12">
                                           <b>Jenis Item</b><br>
                                           <span class="mb-1">${archive.type}</span></br>
                                           <b>Subjek</b><br>
                                           <span class="mb-1">${archive.subjek}</span></br>
                                           <b>Division</b><br>                                            
                                           <span class="mb-1"class="mb-1">Fakultas ${archive.fakultas}, Prodi ${archive.program_studi}</span></br>
                                           <b>Editor</b><br>
                                           <span class="mb-1">${archive.editor}</span></br>
                                           <a href="/dokumen" class="btn btn-sm btn-success text-light">Kunjungi <i class="fa-solid fa-angles-right"></i></a>
                                       </div>
                           
                               </div>
                            </div>
                        </div>
                    </div>
                </div>
            `;
                });

                $('#pencarian').html(htmlContent);
            }
        });
    </script>
@endsection
