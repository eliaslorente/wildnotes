<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="utf-8" />
  <link rel="apple-touch-icon" sizes="76x76" href="{{ asset('/nowTemplate/img/apple-icon.png') }}">
  <link rel="icon" type="image/png" href="{{ asset('/nowTemplate/img/favicon.png') }}">
  <meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1" />
  <title>
    {{ config('app.name', 'WildNotes') }}
  </title>
  <meta content='width=device-width, initial-scale=1.0, maximum-scale=1.0, user-scalable=0, shrink-to-fit=no' name='viewport' />
  <!--     Fonts and icons     -->
  <link href="https://fonts.googleapis.com/css?family=Montserrat:400,700,200" rel="stylesheet" />
  <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.7.1/css/all.css" integrity="sha384-fnmOCqbTlWIlj8LyTjo7mOUStjsKC4pOpQbqyi7RrhN7udi9RwhKkMHpvLbHG9Sr" crossorigin="anonymous">
  <!-- CSS Files -->
  <link href="{{ asset('/nowTemplate/css/bootstrap.min.css') }}" rel="stylesheet" />
  <link href="{{ asset('/nowTemplate/css/now-ui-kit.css?v=1.3.0') }}" rel="stylesheet" />
  <!-- CSS Just for demo purpose, don't include it in your project -->
  <link href="{{ asset('/nowTemplate/demo/demo.css') }}" rel="stylesheet" />
</head>

<body class="index-page sidebar-collapse">
  <!-- Navbar -->
  <nav class="navbar navbar-expand-lg bg-primary fixed-top navbar-transparent " color-on-scroll="400">
    <div class="container">
      <div class="navbar-translate">
        <a class="navbar-brand" href="/" rel="tooltip"  data-placement="bottom" >
          {{ config('app.name', 'WildNotes') }}
        </a>
      </div>
      <div class="collapse navbar-collapse justify-content-end" id="navigation" data-nav-image="{{ asset('/nowTemplate/img/blurred-image-1.jpg') }}">
        <ul class="navbar-nav">
          @if (Route::has('login'))
              @auth
                <li class="nav-item">
                  <a class="nav-link" href="{{ url('/home') }}">
                    <p>INICIO</p>
                  </a>
                </li>
              @else
                <li class="nav-item">
                  <a class="nav-link" href="{{ route('login') }}">
                    <p>ACCEDER</p>
                  </a>
                </li>
                @if (Route::has('register'))
                  <li class="nav-item">
                    <a class="nav-link" href="{{ route('register') }}">
                      <p>REGISTRARSE</p>
                    </a>
                  </li>
                @endif
              @endauth
          @endif
        </ul>
      </div>
    </div>
  </nav>
  <!-- End Navbar -->
  <div class="wrapper">
    <div class="page-header clear-filter" filter-color="orange">
      <div class="page-header-image" data-parallax="true" style="background-image:url({{ asset('/nowTemplate/img/header.jpg') }});">
      </div>
      <div class="container">
        <div class="content-center brand">
          <img class="n-logo" src="{{ asset('/nowTemplate/img/now-logo.png') }}" alt="">
          <h1 class="h1-seo">{{ config('app.name', 'WildNotes') }}</h1>
          <h3>Organizando el conocimiento</h3>
        </div>
        <h6 class="category category-absolute">Diseñado por
          <a href="#">
            WildNotes
          </a>
        </h6>
      </div>
    </div>
  </div>
  <!--   Core JS Files   -->
  <script src="{{ asset('/nowTemplate/js/core/jquery.min.js') }}" type="text/javascript"></script>
  <script src="{{ asset('/nowTemplate/js/core/popper.min.js') }}" type="text/javascript"></script>
  <script src="{{ asset('/nowTemplate/js/core/bootstrap.min.js') }}" type="text/javascript"></script>
  <!--  Plugin for Switches, full documentation here: http://www.jque.re/plugins/version3/bootstrap.switch/ -->
  <script src="{{ asset('/nowTemplate/js/plugins/bootstrap-switch.js') }}"></script>
  <!--  Plugin for the Sliders, full documentation here: http://refreshless.com/nouislider/ -->
  <script src="{{ asset('/nowTemplate/js/plugins/nouislider.min.js') }}" type="text/javascript"></script>
  <!--  Plugin for the DatePicker, full documentation here: https://github.com/uxsolutions/bootstrap-datepicker -->
  <script src="{{ asset('/nowTemplate/js/plugins/bootstrap-datepicker.js') }}" type="text/javascript"></script>
  <!--  Google Maps Plugin    -->
  <!--<script src="https://maps.googleapis.com/maps/api/js?key=YOUR_KEY_HERE"></script>-->
  <!-- Control Center for Now Ui Kit: parallax effects, scripts for the example pages etc -->
  <script src="{{ asset('/nowTemplate/js/now-ui-kit.js?v=1.3.0') }}" type="text/javascript"></script>
  <script>
    $(document).ready(function() {
      // the body of this function is in assets/js/now-ui-kit.js
      nowuiKit.initSliders();
    });

    function scrollToDownload() {

      if ($('.section-download').length != 0) {
        $("html, body").animate({
          scrollTop: $('.section-download').offset().top
        }, 1000);
      }
    }
  </script>
</body>

</html>
