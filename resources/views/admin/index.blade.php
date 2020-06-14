@extends('layouts.timLayout')
@section('classDiv', 'w-100')
@section('notifications')
  @if(isset($notifCount) && $notifCount > 0)
    <span class="notification">{{ $notifCount }}</span>
  @endif
@endsection

@section('content')
<div class="content">
  <div class="container-fluid">
    <table class="table">
        <thead class="text-primary">
          <th>
            Nombre
          </th>
          <th>
            Email
          </th>
          <th>
            Rol
          </th>
        </thead>
        <tbody>
          @forelse($users as $user)
          <tr>
            <td>{{ $user->name }}</td>
            <td>{{ $user->email }}</td>
            <td>{{ $user->role->role_name }}</td>
          </tr>
          @empty
            <p class="text-danger">No hay usuarios disponibles</p>
          @endempty
        </tbody>
    </table>
  </div>
</div>

@endsection
