@extends('layouts.timLayout')
@section('classDiv', 'w-100')

@section('content')
<div class="content">
  <form action="{{ url('notes/update') }}/{{ $note->id }}" method="post">
  @csrf
  <div class="container-fluid">
    <div class="row">
      <div class="col-md-8">
        <div class="card">
          <div class="card-header card-header-primary">
            <h4 class="card-title">Nota</h4>
          </div>
          <div class="card-body">

              <div class="row">
                <div class="col-md-5">
                  <div class="form-group">
                    <label class="bmd-label-floating">Título</label>
                    <input type="text" class="form-control" readonly name="title" value="{{ $note->name }}"
                    required>
                  </div>
                </div>
              </div>

              <div class="row">
                <div class="col-md-12">
                  <div class="form-group">
                    <label>Contenido</label>
                    <div class="form-group">
                      <textarea class="form-control" readonly name="content" rows="5">{{ $note->content }}
                      </textarea>
                    </div>
                  </div>
                </div>
              </div>
              <div class="row">
                <div class="col-md-4">
                  <div class="form-group">
                    <label class="bmd-label-floating">Materia</label>
                    <select class="form-control" readonly name="subject">
                    <option value="">Materias</option>
                    @foreach($subjects as $subject)
                      <option value="{{ $subject->id }}" {{ $note->subject != null && $note->subject->id == $subject->id ? 'selected' : '' }}>
                        {{ $subject->name }}
                      </option>
                    @endforeach
                    </select>
                  </div>
                </div>

                <div class="col-md-4">
                  <div class="form-group">
                    <label class="bmd-label-floating">Color</label>
                    <select class="form-control" readonly name="color">
                    <option value="">Colores</option>
                    @foreach($colors as $color)
                      <option value="{{ $color->id }}" {{ $note->color != null && $note->color->id == $color->id ? 'selected' : '' }}
                        style="background-color: {{ $color->hexadecimal ?? '' }}">{{ $color->name }}</option>
                    @endforeach
                    </select>
                  </div>
                </div>

                <div class="col-md-4">
                  <div class="form-group">
                    <label class="bmd-label-floating">Etiquetas</label>
                    <select class="form-control" disabled name="tags[]" style="height:190px" multiple>
                        @foreach($tags as $tag)
                            <option value="{{ $tag->id }}"
                              @foreach($note->tags as $noteTag) {{ $noteTag->id == $tag->id ? 'selected' : '' }} @endforeach >
                              {{ $tag->name }}
                            </option>
                        @endforeach
                    </select>
                  </div>
                </div>
              </div>
          </div>
        </div>
      </div>

      <div class="col-md-3">
        <div class="card card-profile">
          <div class="card-body">
            <h4 class="card-title">Editar nota</h4>
            <p class="card-description">
            <a href="{{ route('notes.edit', ['id' => $note->id]) }}" class="btn btn-primary btn-round">Editar</a>
          </div>
        </div>
      </div>
    </div>
  </form>
</div>
@endsection
