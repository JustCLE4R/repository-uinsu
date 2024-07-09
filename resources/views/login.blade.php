
<!DOCTYPE html>
<html lang="en" dir="ltr">
  <head>
    <meta charset="UTF-8">
    <link rel="stylesheet" href="assets/css/login.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.3/css/all.min.css">
    <!-- Font Awesome CSS -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0-beta3/css/all.min.css">

    <link href='https://unpkg.com/boxicons@2.1.1/css/boxicons.min.css' rel='stylesheet'>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/aos/2.3.4/aos.css">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
   </head>
<body>

  
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
                <a class="{{ request()->is('login') ? 'active-nav' : '' }}" onclick="window.location.href='/login';">Login</a>
            </li>
        @endauth
        
    </ul>
    <div class="profile">
        <img src="assets/img/account.png" style="width: 35px;" alt="">
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
        <li class="{{ request()->is('login') ? 'active' : '' }}">
            <a onclick="window.location.href='{{ url('/login') }}'">
                <i class='bx bx-user icon'></i>
                <i class='bx bxs-user activeIcon'></i>
            </a>
        </li>
        <div class="indicator"></div>
    </ul>
</div>


  <div class="container">
    <div class="cover">
      <div class="front">
        <img src="/assets/img/hero-2.svg" alt="">
        
        <div class="text" data-aos="fade-up" data-aos-duration="800">
          <div class="carousel">
            <span class="text-1">Selamat Datang <br> Di Website Repositori UINSU <br><a class="kunjungi" href="/">Kunjungi Repositori <i class="fa-regular fa-paper-plane"></i></a></span>
            <span class="text-1" style="display: none;">Terima Kasih <br> Telah Menggunakan Layanan Kami</span>
            <!-- Add additional text items here -->
          </div>
          <div class="controls">
            <i class="fas fa-chevron-left prev"></i>
            <i class="fas fa-chevron-right next"></i>
          </div>
        </div>
        
        
      </div>      
    </div>
    <div class="forms">
        <div class="form-content">
          <div class="login-form">
              <div class="row justify-content-between" data-aos="fade-up" data-aos-duration="800">
                <div class="col-2">
                  <div class="title">Login </div>
                </div>
                <div class="col-3">
                  <span><img src="assets/img/logo.png"  alt=""></span>
                </div>
              </div>
            @if (session('error'))
              <div class="alert alert-danger">{{ session('error') }}</div>
            @endif
            <form action="{{ route('login') }}" method="POST">
              @csrf
              <div class="input-boxes">
                <div class="input-box" data-aos="fade-up" data-aos-duration="1200">
                  <i class="fas fa-envelope"></i>
                  <input type="text" name="nim" id="NIM" placeholder="Masukan NIM" value="41144013" maxlength="12" required>
                  @error('nim')
                    <div style="color: red; ">{{ $message }}</div>
                  @enderror
                </div>

                <div class="input-box" data-aos="fade-up" data-aos-duration="1400">
                  <i class="fas fa-lock"></i>
                  <input type="password" name="password" placeholder="Masukan Password" required>
                  @error('password')
                    <div style="color: red; ">{{ $message }}</div>
                  @enderror
                </div>

                <div class="button input-box" data-aos="fade-up" data-aos-duration="1600">
                  <input type="submit" value="Login">
                </div>                
              </div>
            </form>
          </div>
        </div>
    </div>
  </div>

  <script src="https://cdnjs.cloudflare.com/ajax/libs/aos/2.3.4/aos.js"></script>
  <script>
   
    $(document).ready(function() {
      AOS.init();
      var currentIndex = 0;
      var texts = $(".carousel").children();

      function showText(index) {
        texts.hide();
        $(texts[index]).fadeIn();
      }

      function nextText() {
        currentIndex = (currentIndex + 1) % texts.length;
        showText(currentIndex);
      }

      function prevText() {
        currentIndex = (currentIndex - 1 + texts.length) % texts.length;
        showText(currentIndex);
      }

      $(".next").click(function() {
        nextText();
      });

      $(".prev").click(function() {
        prevText();
      });

      // Autoplay functionality
      setInterval(function() {
        nextText();
      }, 7000);

      // Show initial text
      showText(currentIndex);
    });


    </script>
</body>
</html>

