  <nav class="navbar navbar-expand-lg navbar-transparent navbar-absolute fixed-top ">
    <div class="container-fluid">
      <div class="navbar-wrapper">
        <a class="navbar-brand" href="{{ route('scan') }}">Crear</a>
      </div>
      <div class="navbar-wrapper">
        <a class="navbar-brand" href="{{ route('notes') }}">Apuntes</a>
      </div>
      <div class="navbar-wrapper">
        <a class="navbar-brand" href="{{ route('notif') }}">Compartir</a>
      </div>
      @if (Auth::user()->role->role_name == 'admin')
        <div class="navbar-wrapper">
          <a class="navbar-brand" href="{{ route('admin') }}">Ver usuarios</a>
        </div>
      @endif
      <div class="collapse navbar-collapse justify-content-end">
        <ul class="navbar-nav">
          <li class="nav-item dropdown">
            <a class="nav-link" href="{{ route('notif') }}" id="navbarDropdownMenuLink" >
              <i class="material-icons">notifications</i>
              @yield('notifications')
            </a>
          </li>
          <li class="nav-item dropdown">
            <a class="nav-link" href="javascript:;" id="navbarDropdownProfile" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
              <i class="material-icons">person</i>
              <p class="d-lg-none d-md-block">
                Cuenta
              </p>
            </a>
            <div class="dropdown-menu dropdown-menu-right" aria-labelledby="navbarDropdownProfile">
              <a class="dropdown-item" href="#">{{ Auth::user()->name }}</a>
              <div class="dropdown-divider"></div>
              <a class="dropdown-item" href="{{ route('logout') }}"
                 onclick="event.preventDefault();
                  document.getElementById('logout-form').submit();">
                  Cerrar sesión
              </a>
              <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                  @csrf
              </form>
            </div>
          </li>
        </ul>
      </div>
    </div>
  </nav>
