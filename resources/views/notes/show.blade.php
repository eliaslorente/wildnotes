@extends('layouts.layout')

@section('content')

<div class="content">

  <div class="row">
    <div class="col-12">

      <div class="col-9">
        <div class="form-group">
          <label class="mt-3" for="titulo">Título</label>
          <input class="form-control" type="text" name="title" disabled="true"
            required value="{{ $note->name }}">

          <label for="contenido">Contenido</label>
          <textarea class="form-control" required disabled="true"
            name="content" rows="15">{{ $note->content }}
          </textarea>
        </div>
      </div>

    </div>
  </div>
</div>

@endsection
