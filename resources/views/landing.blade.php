@extends('layouts.main')
@section('content')
    <section id="home" class="hero-section">
        <div class="container">
            <div class="row align-items-center">
                <div class="col-lg-6">
                    <div class="hero-content animate__animated animate__fadeInLeft wow" data-wow-duration="2s">
                        <span class="  fs-5 text-secondary" > Selamat Datang Di
                            Website</span>
                        <h1>Repositori Universitas Islam Negeri Sumatera
                            Utara
                        </h1>
                        <p >Repository Universitas Islam Negeri Sumatera Utara
                            (UINSU) merupakan wadah untuk mempublikasi semua jenis koleksi elektronik yang dihasilkan
                            oleh civitas akademika UIN Sumatera Utara.</p>

                        <div class="about-counter mt-50 animate__animated animate__fadeInLeft wow" data-wow-duration="2.3s" >
                            <div class="row">
                                <div class="col-sm-4 ">
                                    <div class="single-counter counter-color-1 d-flex  " >
                                        <div class="counter-content media-body" >
                                            <div class="counter-count">
                                                <div class="counter" id="clientsCount" >4232350</div>
                                            </div>
                                            <p class="text" >Total Arsip</p>
                                        </div>
                                    </div> <!-- single counter -->
                                </div>

                            </div>
                        </div>


                    </div>
                </div>
                <div class="col-lg-6">
                    <div class="hero-img animate__animated animate__fadeInRight wow" data-wow-duration="1.5s">
                        <div class="hero-figure-box hero-figure-box-09"></div>
                        <div class="hero-figure-box hero-figure-box-07"></div>
                        <div class="hero-figure-box hero-figure-box-08 " data-wow-delay=".5s" data-rotation="-22deg"
                            style="transform: rotate(-22deg) scale(1); opacity: 1;"></div>
                      <img src="assets/img/hero-2.svg" alt="" class="wave-animation-2">
                    </div>
                </div>
                  
            </div>
        </div>
    </section>

    <section id="tentang" class="about-section pt-50 pb-50">
        <div class="container">
            <div class="row align-items-center">                
                <div class="col-xl-6 col-lg-6 order-1" id="content-1">
                    <div class="about-img text-lg-right animate__animated animate__fadeInUp wow" data-wow-duration="1.5s">
                        <img src="assets/img/hero-3.svg" alt="">
                    </div>
                </div>
                <div class="col-xl-6 col-lg-6" id="content-2">
                    <div class="about-content animate__animated animate__fadeInUp wow" data-wow-duration="1.5s" >
                        <div class="section-title ">
                            <h1 class="mb-25  " >Informasi Tentang Repositori UIN
                                Sumatera Utara</h1>
                            <p class=" " >Repository Universitas Islam Negeri Sumatera
                                Utara (UINSU) di awali pada tanggal 8 Desember 2015. Repositoy ini merupakan wadah untuk
                                mempublikasi semua jenis koleksi elektronik yang dihasilkan oleh civitas akademika UIN
                                Sumatera Utara.</p>
                        </div>                        
                    </div>
                </div>                
            </div>
            <div class="row " style="justify-content: center">
                <div class="col-10">
                    <div class="accordion    shadow  animate__animated animate__fadeInUp wow" data-wow-duration="1.5s"   id="accordionExample"
                            style="visibility: visible; animation-delay: 0.2s; animation-name: ;">
                            <div class="single-faq">
                                <button class="w-100 ps-4 text-start collapsed" type="button" data-bs-toggle="collapse"
                                    data-bs-target="#collapseOne" aria-expanded="true" aria-controls="collapseOne">
                                    <h3>Informasi Selengkapnya</h3>
                                </button>

                                <div id="collapseOne" class="collapse show" aria-labelledby="headingOne"
                                    data-bs-parent="#accordionExample">

                                    <div class="faq-content d-flex flex-wrap" style="text-align: justify;">
                                        <p class=" " >Jenis koleksi tersebut meliputi:
                                            semua hasil karya dosen UIN Sumatera Utara dalam bentuk buku, jurnal ilmiah,
                                            laporan penelitian, proceeding konferensi, buku ajar, laporan kegiatan
                                            pengabdian masyarakat, dan lain sebagainya; Karya mahasiswa meliputi:
                                            skripsi, thesis, disertasi, laporan kerja lapangan; Dokumen kegiatan
                                            pimpinan meliputi: naskah pidato rektor pada berbagai event, poto
                                            dokumentasi kegiatan UIN Sumatera Utara.</p>
                                        <p class=" " >Repository ini juga memuat karya
                                            ilmiah yang ditulis oleh penulis luat UIN Sumatera Utara yang diterbitkan
                                            pada karya cetak atau publikasi UIN Sumatera Utara seperti misalnya artikel
                                            yang dimuat dalam Online Jurnal System (OJS). Dengan tersedianya Repository
                                            UIN Sumatera Utara ini diharapkan bukan saja menjadi wadah karya intelektual
                                            civitas akademika dan memberikan akses informasi yang luas kepada public,
                                            tetapi juga sekaligus dapat meningkatkan ranking UIN Sumatera Utara pada
                                            Webometric perguruan tinggi tingkat nasional maupun dunia.</p>

                                    </div>

                                </div>
                            </div>
                        </div>
                </div>
            </div>
        </div>
    </section>

    <section id="arsip" class="about-section pt-10 pb-10">
        <div class="container">
            <div class="row align-items-center">
                <div class="col-xl-6 col-lg-6">
                    <div class="about-content animate__animated animate__fadeInUp wow" data-wow-duration="1.5s">
                        <div class="section-title mb-30 ">
                            <h1 class="mb-25  " >Arsip UIN Sumatera Utara</h1>
                            <p class=" " >Arsip UIN Sumatera Utara menyediakan berbagai
                                jenis hasil karya ilmiah, baik hasil karya dari dosen ataupun dari mahasiswa </p>
                        </div>
                        <ul>
                            <li class=" ">
                                <i class="lni lni-checkmark-circle"></i>
                                E-book & Jurnal Ilmiah
                            </li>
                            <li class=" " >
                                <i class="lni lni-checkmark-circle"></i>
                                Laporan Kerja Lapangan & Laporan Kegiatan Pengabdian
                            </li>
                            <li class=" " >
                                <i class="lni lni-checkmark-circle"></i>
                                Laporan Penelitian & Buku Ajar
                            </li>
                            <li class=" " >
                                <i class="lni lni-checkmark-circle"></i>
                                Thesis & Skripsi
                            </li>
                        </ul>
                        <a href="/arsip" onclick="window.location.href='/arsip'"
                            class="button  mt-20 radius-10  " >Kunjungi Arsip <i
                                class="lni lni-angle-double-right"></i></a>
                    </div>
                </div>
                <div class="col-xl-6 col-lg-6">
                    <div class="about-img text-lg-right  animate__animated animate__fadeInUp wow" data-wow-duration="1.5s" >
                        <img src="assets/img/hero-1.svg" alt="">
                    </div>
                </div>
            </div>
        </div>
    </section>

    <section id="pencarian" class="about-section pt-10 pb-10">
        <div class="container">
            <div class="row align-items-center">
                <div class="col-xl-6 col-lg-6" id="content-3">
                    <div class="about-img text-lg-right  animate__animated animate__fadeInUp wow" data-wow-duration="1.5s" >
                        <img src="assets/img/search-3.svg" alt="">
                    </div>
                </div>
                <div class="col-xl-6 col-lg-6" id="content-4">
                    <div class="about-content animate__animated animate__fadeInUp wow" data-wow-duration="1.5s">
                        <div class="section-title mb-30">
                            <h1 class="mb-25  " >Temukan Dokumen di Arsip UIN Sumatera
                                Utara</h1>
                            <p class=" " >Anda Ingin Mecari Dokumen di Arsip Universitas
                                Islam Negeri Sumatera Utara Dengan Cepat? Kunjungi dan Lakukan Pencarian Cepat dan Mudah
                                disini</p>
                        </div>

                        <a href="/pencarian" onclick="window.location.href='/pencarian'"
                            class="button  mt-20 radius-10  " >Pencarian Arsip <i
                                class="lni lni-angle-double-right"></i></a>
                    </div>
                </div>

            </div>
        </div>
    </section>

    <section id="service" class="service-section img-bg pt-100 pb-100 mt-150">
        <div class="container">
            <div class="row justify-content-center">
                <div class="col-xxl-6 col-xl-9 col-lg-12 col-md-12">
                    <div class="section-title text-center mb-50  animate__animated animate__fadeInUp wow" data-wow-duration="1.5s" >
                        <h1>Virtual Tour </h1>
                        <p>UIN Sumatera Utara Menyediakan Sarana Virtual Tour Bagi Para Pengunjung Yang Ingin
                            Mengunjungi
                            Setiap Kampus UINSU Secara Virtual</p>
                    </div>
                </div>
            </div>

            <div class="row  justify-content-center">
                <div class="col-xl-4 col-md-6">
                    <div class="single-service">
                        <div class="icon color-1">
                            <i class="lni lni-map-marker"></i>
                        </div>
                        <div class="content  animate__animated animate__fadeInUp wow" data-wow-duration="1.5s" >
                            <h3>Kampus I UINSU</h3>
                            <p>Berlokasikan di Jl. Sutomo Ujung Kota Medan, Sumatera Utara</p>
                            <a href="https://sutomo.uinsu.ac.id/" class="button-sm radius-30 mt-2">Kunjungi <i
                                    class="lni lni-angle-double-right"></i></a>
                        </div>
                    </div>
                </div>
                <div class="col-xl-4 col-md-6">
                    <div class="single-service">
                        <div class="icon color-2">
                            <i class="lni lni-map-marker"></i>
                        </div>
                        <div class="content  animate__animated animate__fadeInUp wow" data-wow-duration="1.5s" >
                            <h3>Kampus II UINSU</h3>
                            <p>Berlokasikan di Jl. William Iskandar Ps. V, Kabupaten Deli Serdang, Sumatera Utara</p>
                            <a href="https://pancing.uinsu.ac.id/" class="button-sm radius-30 mt-2">Kunjungi <i
                                    class="lni lni-angle-double-right"></i></a>
                        </div>
                    </div>
                </div>
                <div class="col-xl-4 col-md-6">
                    <div class="single-service">
                        <div class="icon color-3">
                            <i class="lni lni-map-marker"></i>
                        </div>
                        <div class="content  animate__animated animate__fadeInUp wow" data-wow-duration="1.5s" >
                            <h3>Kampus IV UINSU</h3>
                            <p>Berlokasikan di Jl. Lap. Golf No.120, Kabupaten Deli Serdang, Sumatera Utara </p>
                            <a href="https://tuntungan.uinsu.ac.id/" class="button-sm radius-30 mt-2">Kunjungi <i
                                    class="lni lni-angle-double-right"></i></a>
                        </div>
                    </div>
                </div>
            </div>


        </div>
    </section>



    <section id="pricing" class="pricing-section pricing-style-4 bg-light">
        <div class="container">
            <div class="row align-items-center">
                <div class="col-xl-5 col-lg-6">
                    <div class="section-title mb-60 animate__animated animate__fadeInUp wow" data-wow-duration="1.5s">
                        <h3 class="mb-15  " >Aplikasi Layanan</h3>
                        <p class=" " >UIN Sumatera Utara Memiliki Banyak Layanan Aplikasi
                            Dalam Mengelola dan Memanajemen Sistem Yang Ada Dikampus</p>
                    </div>
                </div>
                <div class="col-xl-7 col-lg-6">
                    <div class="pricing-active-wrapper  animate__animated animate__fadeInUp wow" data-wow-duration="1.5s" >
                        <div class="pricing-active">
                            <div class="single-pricing-wrapper">
                                <div class="single-pricing">
                                    <h4>Portal SIA</h4>
                                    <h3><i class="bi bi-gear"></i></h3>
                                    <p>Menangani Sistem Informasi Akademik Dosen dan Mahasiswa UINSU</p>
                                    <a href="https://portalsia.uinsu.ac.id " target="_blank"
                                        class="button radius-30 mt-2">Kunjungi <i class="lni lni-angle-double-right"></i>
                                    </a>
                                </div>
                            </div>
                            <div class="single-pricing-wrapper">
                                <div class="single-pricing">
                                    <h4>SI-PMB</h4>
                                    <h3><i class="bi bi-person-bounding-box"></i></h3>
                                    <p>Menangani Sistem Informasi Penerimaan Mahasiswa Baru UIN Sumatera Utara</p>
                                    <a href="https://sipmb.uinsu.ac.id " target="_blank"
                                        class="button radius-30 mt-2">Kunjungi <i
                                            class="lni lni-angle-double-right"></i></a>
                                </div>
                            </div>
                            <div class="single-pricing-wrapper">
                                <div class="single-pricing">
                                    <h4>SI-MABA</h4>
                                    <h3><i class="bi bi-person-standing"></i></h3>
                                    <p>Menangani Sistem Informasi Daftar Ulang Mahasiswa Baru UIN Sumatera Utara</p>
                                    <a href="https://maba.uinsu.ac.id " target="_blank"
                                        class="button radius-30 mt-2">Kunjungi <i
                                            class="lni lni-angle-double-right"></i></a>
                                </div>
                            </div>
                            <div class="single-pricing-wrapper">
                                <div class="single-pricing">
                                    <h4>SI-SELMA</h4>
                                    <h3><i class="bi bi-person-circle"></i></h3>
                                    <p>Menangani Sistem Informasi Surat Elektronik Mahasiswa UIN Sumatera Utara</p>
                                    <a href="https:// .uinsu.ac.id " target="_blank"
                                        class="button radius-30 mt-2">Kunjungi <i
                                            class="lni lni-angle-double-right"></i></a>
                                </div>
                            </div>
                            <div class="single-pricing-wrapper">
                                <div class="single-pricing">
                                    <h4>SI-LIANA</h4>
                                    <h3><i class="bi bi-check2-all"></i></h3>
                                    <p>Menangani Sistem Informasi Kuliah Kerja Nyata UIN Sumatera Utara</p>
                                    <a href="https://siselma.uinsu.ac.id " target="_blank"
                                        class="button radius-30 mt-2">Kunjungi <i
                                            class="lni lni-angle-double-right"></i></a>
                                </div>
                            </div>
                            <div class="single-pricing-wrapper">
                                <div class="single-pricing">
                                    <h4>E-LEARNING</h4>
                                    <h3><i class="bi bi-mortarboard-fill"></i></h3>
                                    <p>Menangani Sistem Informasi Pembelajaran Online UIN Sumatera Utara</p>
                                    <a href="https://elearning.uinsu.ac.id " target="_blank"
                                        class="button radius-30 mt-2">Kunjungi <i
                                            class="lni lni-angle-double-right"></i></a>
                                </div>
                            </div>
                            <div class="single-pricing-wrapper">
                                <div class="single-pricing">
                                    <h4>SI-JURNAL</h4>
                                    <h3><i class="bi bi-journals"></i></h3>
                                    <p>Menangani Tentang Sistem Informasi Jurnal UIN Sumatera Utara</p>
                                    <a href="https://sijurnal.uinsu.ac.id " target="_blank"
                                        class="button radius-30 mt-2">Kunjungi <i
                                            class="lni lni-angle-double-right"></i></a>
                                </div>
                            </div>
                            <div class="single-pricing-wrapper">
                                <div class="single-pricing">
                                    <h4>SI-LIBRARY</h4>
                                    <h3><i class="bi bi-book-half"></i></h3>
                                    <p>Menangani Website Perpustakaan UIN Sumatera Utara</p>
                                    <a href="https://silibrary.uinsu.ac.id " target="_blank"
                                        class="button radius-30 mt-2">Kunjungi <i
                                            class="lni lni-angle-double-right"></i></a>
                                </div>
                            </div>
                            <div class="single-pricing-wrapper">
                                <div class="single-pricing">
                                    <h4>REPOSITORY</h4>
                                    <h3><i class="bi bi-bookmarks-fill"></i></h3>
                                    <p>Menangani Sistem Informasi Repositori UIN Sumatera Utara</p>
                                    <a href="https://repository.uinsu.ac.id " target="_blank"
                                        class="button radius-30 mt-2">Kunjungi <i
                                            class="lni lni-angle-double-right"></i></a>
                                </div>
                            </div>
                            <div class="single-pricing-wrapper">
                                <div class="single-pricing">
                                    <h4>SI-PUSAKA</h4>
                                    <h3><i class="bi bi-chat-square-dots-fill"></i></h3>
                                    <p>Menangani Sistem Informasi Pengajuan Surat Bebas Pustaka UIN Sumatera Utara</p>
                                    <a href="https://sipusaka.uinsu.ac.id " target="_blank"
                                        class="button radius-30 mt-2">Kunjungi <i
                                            class="lni lni-angle-double-right"></i></a>
                                </div>
                            </div>
                            <div class="single-pricing-wrapper">
                                <div class="single-pricing">
                                    <h4>SI-RASIDA</h4>
                                    <h3><i class="bi bi-mortarboard"></i></h3>
                                    <p>Menangani Sistem Informasi Pendaftaran Sidang dan Wisuda UINSU</p>
                                    <a href="https://sirasida.uinsu.ac.id " target="_blank"
                                        class="button radius-30 mt-2">Kunjungi <i
                                            class="lni lni-angle-double-right"></i></a>
                                </div>
                            </div>
                            <div class="single-pricing-wrapper">
                                <div class="single-pricing">
                                    <h4>SI-KIP</h4>
                                    <h3><i class="bi bi-person-vcard-fill"></i></h3>
                                    <p>Menangani Sistem Informasi Penjaringan Beasiswa KIP UIN Sumatera Utara</p>
                                    <a href="https://kip.uinsu.ac.id " target="_blank"
                                        class="button radius-30 mt-2">Kunjungi <i
                                            class="lni lni-angle-double-right"></i></a>
                                </div>
                            </div>
                            <div class="single-pricing-wrapper">
                                <div class="single-pricing">
                                    <h4>UMM</h4>
                                    <h3><i class="bi bi-pencil-square"></i></h3>
                                    <p>Menangani Sistem Informasi Ujian Masuk Mandiri Online UIN Sumatera Utara</p>
                                    <a href="https://umm.uinsu.ac.id " target="_blank"
                                        class="button radius-30 mt-2">Kunjungi <i
                                            class="lni lni-angle-double-right"></i></a>
                                </div>
                            </div>
                            <div class="single-pricing-wrapper">
                                <div class="single-pricing">
                                    <h4>SI-DAHLIA</h4>
                                    <h3><i class="bi bi-info-circle-fill"></i></h3>
                                    <p>Menangani Sistem Informasi Daftar Hadir Kuliah UIN Sumatera Utara</p>
                                    <a href="https://.uinsu.ac.id " target="_blank"
                                        class="button radius-30 mt-2">Kunjungi <i
                                            class="lni lni-angle-double-right"></i></a>
                                </div>
                            </div>
                            <div class="single-pricing-wrapper">
                                <div class="single-pricing">
                                    <h4>SI-BEDJO</h4>
                                    <h3<i class="bi bi-person-video3"></i></h3>
                                        <p>Menangani Sistem Informasi Beban Kinerja Dosen UIN Sumatera Utara</p>
                                        <a href="https://sibedjo.uinsu.ac.id " target="_blank"
                                            class="button radius-30 mt-2">Kunjungi <i
                                                class="lni lni-angle-double-right"></i></a>
                                </div>
                            </div>
                            <div class="single-pricing-wrapper">
                                <div class="single-pricing">
                                    <h4>SI-RALINE</h4>
                                    <h3><i class="bi bi-person-check"></i></h3>
                                    <p>Menangani Sistem Informasi Presensi Online UIN Sumatera Utara</p>
                                    <a href="https://siraline.uinsu.ac.id " target="_blank"
                                        class="button radius-30 mt-2">Kunjungi <i
                                            class="lni lni-angle-double-right"></i></a>
                                </div>
                            </div>
                            <div class="single-pricing-wrapper">
                                <div class="single-pricing">
                                    <h4>LKP</h4>
                                    <h3><i class="bi bi-person-fill-gear"></i></h3>
                                    <p>Menangani Sistem Informasi Laporan Kinerja UIN Sumatera Utara</p>
                                    <a href="https://lkp.uinsu.ac.id " target="_blank"
                                        class="button radius-30 mt-2">Kunjungi <i
                                            class="lni lni-angle-double-right"></i></a>
                                </div>
                            </div>

                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
@endsection
