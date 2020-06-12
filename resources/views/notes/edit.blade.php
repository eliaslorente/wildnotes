@extends('layouts.timLayout')

@section('content')
  <div class="content">
  <div class="container-fluid">
    <div class="row">
      <div class="col-md-8">
        <div class="card">
          <div class="card-header card-header-primary">
            <h4 class="card-title">Editar apunte</h4>
          </div>
          <div class="card-body">
            <form action="" method="post">

              <div class="row">
                <div class="col-md-5">
                  <div class="form-group">
                    <label class="bmd-label-floating">Título</label>
                    <input type="text" class="form-control" value="{{ $note->name }}"
                    required>
                  </div>
                </div>
              </div>

              <div class="row">
                <div class="col-md-12">
                  <div class="form-group">
                    <label>Contenido</label>
                    <div class="form-group">
                      <textarea class="form-control" rows="5">{{ $note->content }}
                      </textarea>
                    </div>
                  </div>
                </div>
              </div>
              <div class="row">
                <div class="col-md-4">
                  <div class="form-group">
                    <label class="bmd-label-floating">Materia</label>
                    <select class="form-control" >
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
                    <select class="form-control" >
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
                    <select class="form-control" name="tags[]" style="height:190px" multiple>
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

              <button type="submit" class="btn btn-primary pull-right">Modificar apunte</button>
              <div class="clearfix"></div>

            </form>
          </div>
        </div>
      </div>

      <div class="col-md-3">
        <div class="card card-profile">
          <div class="card-body">
            <h4 class="card-title">Listado de apuntes</h4>
            <p class="card-description">
            <a href="{{ URL::previous() }}" class="btn btn-primary btn-round">Volver</a>
          </div>
        </div>
      </div>
    </div>
  </div>
@endsection
