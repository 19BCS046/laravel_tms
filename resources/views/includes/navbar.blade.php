<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="utf-8">
  <meta content="width=device-width, initial-scale=1.0" name="viewport">
  <title>PeruZ</title>
  <meta content="" name="description">
  <meta content="" name="keywords">

  <!-- Favicons -->
  <link href="{{asset('assets/img/favicon.png')}}" rel="icon">
  <link href="assets/img/apple-touch-icon.png" rel="apple-touch-icon">

  <!-- Fonts -->
  <link href="https://fonts.googleapis.com" rel="preconnect">
  <link href="https://fonts.gstatic.com" rel="preconnect" crossorigin>
  <link href="https://fonts.googleapis.com/css2?family=Open+Sans:ital,wght@0,300;0,400;0,500;0,600;0,700;0,800;1,300;1,400;1,500;1,600;1,700;1,800&family=Raleway:ital,wght@0,100;0,200;0,300;0,400;0,500;0,600;0,700;0,800;0,900;1,100;1,200;1,300;1,400;1,500;1,600;1,700;1,800;1,900&display=swap" rel="stylesheet">

  <!-- Vendor CSS Files -->
  <link href="{{asset('assets/vendor/bootstrap/css/bootstrap.min.css')}}" rel="stylesheet">
  <link href="{{asset('assets/vendor/bootstrap-icons/bootstrap-icons.css')}}" rel="stylesheet">
  <link href="{{asset('assets/vendor/aos/aos.css')}}" rel="stylesheet">
  <link href="{{asset('assets/vendor/glightbox/css/glightbox.min.css')}}" rel="stylesheet">
  <link href="{{asset('assets/vendor/swiper/swiper-bundle.min.css')}}" rel="stylesheet">

  <!-- Main CSS File -->
  <link href="{{asset('assets/css/main.css')}}" rel="stylesheet">

  <!-- =======================================================
  * Template Name: Ninestars
  * Template URL: https://bootstrapmade.com/ninestars-free-bootstrap-3-theme-for-creative/
  * Updated: Jun 14 2024 with Bootstrap v5.3.3
  * Author: BootstrapMade.com
  * License: https://bootstrapmade.com/license/
  ======================================================== -->
  <style>
    .navmenu{
        font-size: 20px;
    }
  </style>
</head>


<body class="index-page">

  <header id="header" class="header d-flex align-items-center sticky-top">
    <div class="container-fluid container-xl position-relative d-flex align-items-center">

      <a href="index.html" class="logo d-flex align-items-center me-auto">
        <!-- Uncomment the line below if you also wish to use an image logo -->
        <!-- <img src="assets/img/logo.png" alt=""> -->
        <h1 class="sitename">{{__('msg.logo')}}</h1>
      </a>

      <nav id="navmenu" class="navmenu">
        <ul>
          <li><a class="fs-5" href="{{url('home')}}" class="active">{{__('msg.home')}}</a></li>
          <li><a class="fs-5" href="{{url('cart')}}">{{__('msg.touristcart')}}</a></li>
          <li><a class="fs-5" href="{{url('mycart')}}">{{__('msg.mycart')}}</a></li>
          <li class="dropdown fs-5"><a href="#"><span class="fs-5">{{__('msg.language')}}</span> <i class="bi bi-chevron-down toggle-dropdown"></i></a>
            <ul>
              <li><a class="fs-5" href="{{ route('lang.switch', 'en') }}">
                English
                <img src="https://static.vecteezy.com/system/resources/previews/000/532/212/original/vector-united-states-of-america-flag-usa-flag-america-flag-background.jpg" alt="English" style="width: 40px; height: auto; margin-right: 2px;">
                </a></li>
              <li><a class="fs-5" href="{{ route('lang.switch', 'es') }}">Spanish
                <img src="https://static.vecteezy.com/system/resources/previews/000/401/734/original/illustration-of-spain-flag-vector.jpg" alt="English" style="width: 40px; height: auto; margin-right: 2px;">
                </a></li>
              <li><a class="fs-5" href="{{ route('lang.switch', 'ar') }}">Arabic
                <img src="https://wallpapercave.com/wp/wp4215855.jpg" alt="English" style="width: 40px; height: auto; margin-right: 2px;">
            </a></li>
            <li><a class="fs-5" href="{{ route('lang.switch', 'tamil') }}">தமிழ்
                <img src="https://i.redd.it/flag-of-tamil-nadu-india-v0-un0lcwzewpr91.png?auto=webp&s=81a2afaaa1376c0a13d5564dc1f4036eeeb8c99f" alt="English" style="width: 40px; height: auto; margin-right: 2px;">
            </a></li>
            </ul>
          </li>
          <li><a class="fs-5" href="{{url('profile')}}">{{__('msg.profile')}}</a></li>
        </ul>
        <i class="mobile-nav-toggle d-xl-none bi bi-list"></i>
      </nav>

      {{-- <a class="btn-getstarted fs-5" href="index.html#about">Get Started</a> --}}
      @auth
      <form id="logout-form" action="{{ route('logout') }}" method="POST">
          @csrf
          <button type="submit" class="btn-getstarted fs-5">{{__('msg.logout')}}</button>
      </form>
  @else
      <a href="{{ route('login') }}" class="btn-getstarted fs-5">{{__('msg.login')}}</a>
  @endauth
    </div>
  </header>
</body>
</html>
