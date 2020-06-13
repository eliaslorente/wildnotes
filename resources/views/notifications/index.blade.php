@extends('layouts.timLayout')
@section('classDiv', 'w-100')

@section('content')
<div class="content">
  <form class="navbar-form" action="{{ route('notif.search') }}" method="post">
    @csrf
    <label>Buscar usuario por email</label>
    <div class="form-group input-group no-border col-12 col-md-5">
      <input type="text" class="form-control" name="email" required placeholder="Email...">
      <button type="submit" class="btn btn-white btn-round btn-just-icon ml-2">
        <i class="material-icons ml-">search</i>
        <div class="ripple-container"></div>
      </button>
    </div>
  </form>

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
          {{--@if (!$empty ?? '' != null)--}}
          <tr>
            <td>{{ $userShare->name }}</td>
            <td>{{ $userShare->email }}</td>
            <td>{{ $subject ?? '' }}</td>
            <td>
              <button type="button" class="btn btn-success" name="button"><i class="fas fa-check-circle"></i></button>
              <button type="button" class="btn btn-danger" name="button"><i class="fas fa-times-circle"></i></button>
            </td>
          </tr>
          {{--@endif--}}
        </tbody>
      </table>

  <div class="container-fluid">
    <div class="row">
      <div class="col-md-6">
        <div class="card">
          <div class="card-header card-header-primary">
            <h4 class="card-title">Notificaciones</h4>
          </div>
          <div class="card-body">
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
                  {{--@if (!$empty ?? '' != null)--}}
                  <tr>
                    <td></td>
                    <td></td>
                    <td></td>
                    <td>
                      <button type="button" class="btn btn-success" name="button"><i class="fas fa-check-circle"></i></button>
                      <button type="button" class="btn btn-danger" name="button"><i class="fas fa-times-circle"></i></button>
                    </td>
                  </tr>
                  {{--@endif--}}
                </tbody>
              </table>
          </div>
        </div>
      </div>
    </div>
</div>
@endsection
