@extends('layouts.timLayout')
@section('classDiv', 'w-100')
@section('notifications')
  @if(isset($notifCount) && $notifCount > 0)
    <span class="notification">{{ $notifCount }}</span>
  @endif
@endsection

@section('content')
<div class="content">
  <form class="navbar-form mb-0" action="{{ route('notif.search') }}" method="post">
    @csrf
    <label>Buscar usuario por email</label>
    <div class="form-group input-group no-border col-12 col-md-5 mb-0">
      <input type="text" class="form-control" name="email" value="{{ old('email') }}" required placeholder="Email...">
      <button type="submit" class="btn btn-white btn-round btn-just-icon ml-2">
        <i class="material-icons ml-">search</i>
        <div class="ripple-container"></div>
      </button>
    </div>
  </form>

  @if ($userShare ?? '' != null)
    <table class="table">
        <thead class="text-primary">
          <th>
            Usuario
          </th>
          <th>
            Email
          </th>
          <th>
            Apunte
          </th>
          <th>
            Acción
          </th>
        </thead>
        <tbody>
          <form action="{{ route('notif.send') }}" method="post">
            @csrf
            <input type="hidden" name="userShare" value="{{ $userShare->id }}">
            <tr>
              <td>{{ $userShare->name }}</td>
              <td>{{ $userShare->email }}</td>
              <td>
                <label>Seleccione apuntes para compartir</label>
                @isset($notes)
                  <select class="form-control w-75" multiple name="notes[]">
                      @foreach($notes as $note)
                        <option value="{{ $note->id }}">
                          {{ $note->name }} | {{ \Illuminate\Support\Str::limit(strip_tags($note->content), 50) }}
                        </option>
                      @endforeach
                  </select>
                @else
                  <p class="text-danger mb-0">Aun no tienes apuntes creados</p>
                  <a class="btn btn-primary" href="{{ route('scan') }}">Crear</a>
                @endisset
              </td>
              <td>
                <button type="submit" class="btn btn-primary" name="button">Compartir apunte</button>
              </td>
            </tr>
          </form>
        </tbody>
      </table>
    @endif
    @isset($empty)
      <p class="text-danger">No hay ningun usuario con ese email</p>
    @endisset

  <div class="container-fluid">
    <div class="row">
      <div class="col-md-12">
        <div class="card">
          <div class="card-header card-header-primary">
            <h4 class="card-title">Notificaciones</h4>
          </div>
          <div class="card-body">
            @if(isset($notifications) && count($notifications))
            <table class="table">
                <thead class="text-primary">
                  <th>
                    Usuario
                  </th>
                  <th>
                    Email
                  </th>
                  <th>
                    Apunte
                  </th>
                  <th>
                    Acción
                  </th>
                </thead>
                <tbody>
                  <form action="{{ route('notif.action') }}" method="post">
                    <button class="btn btn-success" type="submit" name="acceptAll" value="true">Aceptar todos</button>
                    <button class="btn btn-danger" type="submit" name="rejectAll" value="true">Rechazar todos</button>
                    @foreach($notifications as $notif)
                      <form action="{{ route('notif.action') }}" method="post">
                        @csrf
                        <input type="hidden" name="notificationId" value="{{ $notif->id }}">
                        <tr>
                          <td>{{ $notif->user->name }}</td>
                          <td>{{ $notif->user->email }}</td>
                          <td>{{ $notif->note->name }} | {{ \Illuminate\Support\Str::limit(strip_tags($notif->note->content), 50) }}</td>
                          <td>
                            <button type="submit" class="btn btn-success" name="accept" value="true"><i class="fas fa-check-circle"></i></button>
                            <button type="submit" class="btn btn-danger" name="reject" value="true"><i class="fas fa-times-circle"></i></button>
                          </td>
                        </tr>
                      </form>
                    @endforeach
                  </form>
                </tbody>
              </table>
            @else
              <p class="text-success">No tienes notificaciones pendientes</p>
            @endif
          </div>
        </div>
      </div>
    </div>
</div>
@endsection
