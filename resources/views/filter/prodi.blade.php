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
           

           const itemsPerPage = 10;
           let currentPage = 1;
           let data = [];

           function renderPage(page) {
               const startIndex = (page - 1) * itemsPerPage;
               const endIndex = startIndex + itemsPerPage;
               const paginatedData = data.slice(startIndex, endIndex);

               let htmlContent = '';

               $.each(paginatedData, function(index, archive) {
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
                                           <a href="/dokumen/${archive.id}" class="btn btn-sm btn-success text-light">Kunjungi <i class="fa-solid fa-angles-right"></i></a>
                                       </div>
                           
                               </div>
                           </div>
                       </div>
                   </div>
               </div>
           `;
               });

               $('#prodi').html(htmlContent);
           }

           function updatePagination() {
               $('#prevPage').parent().toggleClass('disabled', currentPage === 1);
               $('#nextPage').parent().toggleClass('disabled', currentPage * itemsPerPage >= data.length);
           }

           const prodi = window.location.href.split('/').pop();
           const path = decodeURIComponent(window.location.pathname);
           const segments = path.split('/');
           const prodis = segments.pop(); 

           $('#nama-prodi').html(`<h5 class="my-2">Arsip prodi ${prodis}</h5>`);
           $.ajax({
               url: `/api/archives?prodi=${prodi}`,
               method: 'GET',
               dataType: 'json',
               success: function(response) {
                   if (response.status === 'success') {
                       data = response.data;

                       renderPage(currentPage);
                       updatePagination();
                   }
               },
               error: function(error) {
                   console.error('Error fetching data:', error);
               }
           });

           $('#prevPage').click(function(e) {
               e.preventDefault();
               if (currentPage > 1) {
                   currentPage--;
                   renderPage(currentPage);
                   updatePagination();
               }
           });

           $('#nextPage').click(function(e) {
               e.preventDefault();
               if (currentPage * itemsPerPage < data.length) {
                   currentPage++;
                   renderPage(currentPage);
                   updatePagination();
               }
           });

           $('.pagination').on('click', 'a.page-link', function(e) {
               e.preventDefault();
               const page = parseInt($(this).text());
               if (!isNaN(page)) {
                   currentPage = page;
                   renderPage(currentPage);
                   updatePagination();
               }
           });
       });
    </script>
@endsection
