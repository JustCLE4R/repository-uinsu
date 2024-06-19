
<nav class="shadow-sm">
    <div class="logo">
        <img src="assets/img/logo.png" alt="">
    </div>
    <ul class="top-nav">
        <li><a class="{{ request()->is('/') ? 'active-nav' : '' }}" onclick="window.location.href='/';">Beranda</a></li>           
        <li><a class="{{ request()->is('arsip') ? 'active-nav' : '' }}" onclick="window.location.href='/arsip';">Arsip</a></li>
        <li><a class="{{ request()->is('pencarian') ? 'active-nav' : '' }}" onclick="window.location.href='/pencarian';">Pencarian</a></li>
        <li><a class="{{ request()->is('unggah') ? 'active-nav' : '' }}" onclick="window.location.href='/unggah';">Unggah</a></li>
        @auth
            <li>
                <a class="{{ request()->is('dashboard') ? 'active-nav' : '' }}" onclick="window.location.href='/dashboard';">Dashboard</a>
            </li>
        @else
            <li>
                <a onclick="window.location.href='/login';">Login</a>
            </li>
        @endauth
        
    </ul>
    <div class="profile">
        @if(Auth::check())
            <img class="rounded-circle" src="{{ Auth::user()->foto ? url('https://pmb.uinsu.ac.id/file/photo/' . Auth::user()->foto) : '/assets/img/account.png' }}" alt="" style="width: 35px; height: 35px;">
        @else
            <img class="rounded-circle" src="/assets/img/account.png" alt="" style="width: 35px; height: 35px;">
        @endif
    </div>
    
</nav>
<div class="navbar bottom-nav">
    <ul>
        <li class="{{ request()->is('/') ? 'active' : '' }}">
            <a onclick="window.location.href='{{ url('/') }}'">
                <i class='bx bx-home icon'></i>
                <i class='bx bxs-home activeIcon'></i>
            </a>
        </li>
        <li class="{{ request()->is('arsip') ? 'active' : '' }}">
            <a onclick="window.location.href='{{ url('/arsip') }}'">
                <i class='bx bx-folder icon'></i>
                <i class='bx bxs-folder activeIcon'></i>
            </a>
        </li>
        <li class="{{ request()->is('pencarian') ? 'active' : '' }}">
            <a onclick="window.location.href='{{ url('/pencarian') }}'">
                <i class='bx bx-search-alt-2 icon'></i>
                <i class='bx bxs-search-alt-2 activeIcon'></i>
            </a>
        </li>
        <li class="{{ request()->is('unggah') ? 'active' : '' }}">
            <a onclick="window.location.href='{{ url('/unggah') }}'">
                <i class='bx bx-add-to-queue icon'></i>
                <i class='bx bxs-add-to-queue activeIcon'></i>
            </a>
        </li>
        <li class="{{ request()->is('dashboard') ? 'active' : '' }}">
            <a onclick="window.location.href='{{ url('/dashboard') }}'">
                <i class='bx bx-user icon'></i>
                <i class='bx bxs-user activeIcon'></i>
            </a>
        </li>
        <div class="indicator"></div>
    </ul>
</div>


