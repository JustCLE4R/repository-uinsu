<!-- Sidebar Start -->
<div class="sidebar pe-4 pb-3 shadow ">
    <nav class="navbar">
        <a href="/" class="navbar-brand mx-4 ">
            <img src="/assets/img/logo-admin.png" width="140px" style="margin-top: -10px" alt="">
        </a>

        <div class="navbar-nav w-100 ">
            <a href="/admin" class="nav-item nav-link {{ Request::is('admin') ? 'nav-active' : '' }}"><i class="bi bi-house-fill me-2 fs-5"></i>Beranda</a>
            <a href="/admin/archive" class="nav-item nav-link {{ Request::is('admin/archives') ? 'nav-active' : '' }}"><i class="bi bi-files me-2 fs-5"></i>Arsip</a>
            <a href="/admin/archive/create" class="nav-item nav-link {{ Request::is('admin/archive/create') ? 'nav-active' : '' }}"><i class="bi bi-file-earmark-plus-fill me-2 fs-5"></i>Tambah Arsip</a>
            <a href="/admin/requests" class="nav-item nav-link {{ Request::is('admin/requests') ? 'nav-active' : '' }}"><i class="bi bi-speedometer2 me-2 fs-5"></i>Pengajuan</a>
            <a href="/admin/trash" class="nav-item nav-link {{ Request::is('admin/trash') ? 'nav-active' : '' }}"><i class="bi bi-ui-checks me-2 fs-5"></i>Sampah</a>
            <a href="/admin/changelogs" class="nav-item nav-link {{ Request::is('admin/changelogs') ? 'nav-active' : '' }}"><i class="bi bi-person-fill-gear me-2 fs-5"></i>Riwayat Edit</a>
            <a href="/logout" class="nav-item nav-link"><i class="bi bi-box-arrow-right me-2 fs-5"></i>Keluar</a>
            
        </div>
    </nav>
</div>


<div class="content">
    <!-- Navbar Start -->
    <nav class="navbar navbar-expand bg-light navbar-light sticky-top px-4 py-0">
        <a href="#" class="sidebar-toggler flex-shrink-0 text-success">
            <i class="bi bi-justify"></i>
        </a>
        <div class="navbar-nav w-100 d-flex justify-content-between align-items-center m-2">
            <div class="text-end me-2 flex-grow-1">
                <a href="#">
                    <span class="d-none text-success d-lg-inline-flex overflow-hidden" style="max-width: 150px;">Admin</span>
                </a>
            </div>
            <div class="text-start">
                <a href="#" class="">
                    <img class="rounded-circle " src="/assets/img/account.png" alt=""
                        width="40vh" height="40vh" style="object-fit: cover;">
                </a>
            </div>
        </div>
    </nav>
