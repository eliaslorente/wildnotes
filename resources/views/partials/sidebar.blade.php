<div class="sidebar" data-color="purple" data-background-color="white" data-image="{{ asset('img/sidebar-1.jpg') }}">
  <div class="logo"><a href="{{ route('home') }}" class="simple-text logo-normal">
      {{ config('app.name', 'WildNotes') }}
    </a></div>
  <div class="sidebar-wrapper">
    <ul class="nav">
      <li class="nav-item active  ">
        <a class="nav-link" href="{{ route('home') }}">
          <i class="material-icons">dashboard</i>
          <p>Filtros</p>
        </a>
      </li>
      <li class="nav-item ">
        <a class="nav-link" href="./user.html">
          <i class="material-icons">person</i>
          <p>Administrar usuarios</p>
        </a>
      </li>
    </ul>
  </div>
</div>
