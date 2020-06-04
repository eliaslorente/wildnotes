<!doctype html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>@yield('title', config('app.name', 'WildNotes'))</title>

    <!-- Scripts -->
    <script src="{{ asset('js/app.js') }}" defer></script>
    <script type="text/javascript" src="https://code.jquery.com/jquery-3.5.1.min.js"></script>
    <script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.13.0/js/fontawesome.min.js"></script>

    <!-- Fonts -->
    <link rel="dns-prefetch" href="//fonts.gstatic.com">
    <link href="https://fonts.googleapis.com/css?family=Nunito" rel="stylesheet">
    <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.13.0/css/fontawesome.min.css" rel="stylesheet">

    <!-- Styles -->
    <link href="{{ asset('css/app.css') }}" rel="stylesheet">
</head>
<body>
<div id="app">
<nav class="navbar navbar-expand-lg navbar-light bg-light pb-5">
  <a class="navbar-brand" href="/home">{{ config('app.name', 'WildNotes') }}</a>
  <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
    <span class="navbar-toggler-icon"></span>
  </button>

  <div class="collapse navbar-collapse" id="navbarSupportedContent">
    <ul class="navbar-nav mr-auto">
      <li class="nav-item">
        <a class="nav-link" href="{{ route('scan') }}">Escanear</a>
      </li>
      <li class="nav-item">
        <a class="nav-link" href="{{ route('notes') }}">Apuntes</a>
      </li>
      <li class="nav-item">
        <a class="nav-link" href="#">Grupos</a>
      </li>
      <li class="nav-item">
        <a class="nav-link" href="#">Calendario</a>
      </li>
      <li class="nav-item">
        <a class="nav-link" href="#">Gestión de usuarios</a>
      </li>
      <li class="nav-item">
        <a class="nav-link" href="#">Sugerencias</a>
      </li>
    </ul>
    <ul class="navbar-nav">
      <li class="nav-item ">
        <a class="dropdown-item" href="{{ route('logout') }}"
           onclick="event.preventDefault();
            document.getElementById('logout-form').submit();">
            Cerrar Sesión
        </a>
        <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
            @csrf
        </form>
      </li>
    </ul>
  </div>
</nav>
  @include('partials.messages')
  @yield('content')
</div>
</body>
</html>
