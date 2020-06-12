<form action="{{ url('escaner/crear') }}" method="post">
  @csrf

  <div class="modal fade" id="imageUploadModal" tabindex="-1" role="dialog"
    aria-labelledby="imageUploadModal" aria-hidden="true">
    <div class="modal-dialog modal-lg" role="document">
      <div class="modal-content">
        <div class="modal-header">
          <h5 class="modal-title">Apunte</h5>
          <button type="button" class="close" data-dismiss="modal" aria-label="Close">
            <span aria-hidden="true">&times;</span>
          </button>
        </div>
        <div class="modal-body">
          <div class="form-group">
            <label class="mt-3" for="titulo">Título</label>
            <input class="form-control" type="text" name="title" required
              value="{{ old('title') }}">
            @error('title')
              <div class="alert alert-danger mt-2">{{ $message }}</div>
            @enderror
          </div>

          <div class="form-group">
            <label for="contenido">Contenido</label>
            <textarea class="form-control" required
              name="content" rows="15">{{ old('content', $scan ?? '') }}</textarea>
            @error('content')
                <div class="alert alert-danger mt-2">{{ $message }}</div>
            @enderror
          </div>

          @if(!$subjects->isEmpty())
            <div class="row align-items-center">
              <div class="form-group col-sm-10">
                <label for="etiquetas">Materias</label>
                  <select class="form-control" name="subject" id="selectSubject">
                    <option value="">Materias</option>
                    @foreach($subjects as $subject)
                      <option value="{{ $subject->id }}"
                        {{ old('subject') == $subject->id ? 'selected' : '' }}>
                        {{ $subject->name }}
                      </option>
                    @endforeach
                  </select>
              </div>
              <div class="col-sm-2 mt-3 pl-0">
                <button class="btn btn-wild pb-0" type="button" data-toggle="modal" data-target="#subjectModal">
                  <i class="material-icons" style="font-size:20px">add_box</i>
                </button>
              </div>
            </div>
          @endif

          @if(!$colors->isEmpty())
            <div class="form-group">
              <label for="etiquetas">Colores</label>
                <select class="form-control" name="color" id="selectSubject">
                  <option value="">Colores</option>
                  @foreach($colors as $color)
                    <option value="{{ $color->id }}"
                      style="background-color: {{ $color->hexadecimal ?? '' }}"
                      {{ old('color') == $color->id ? 'selected' : '' }}>
                      {{ $color->name }}
                    </option>
                  @endforeach
                </select>
            </div>
          @endif

          @if(!$tags->isEmpty())
            <div class="row align-items-center">
              <div class="form-group col-sm-10">
                <label for="etiquetas">Etiquetas</label>
                  <select multiple class="form-control" name="tags[]" id="selectTag">
                    @foreach($tags as $tag)
                      <option value="{{ $tag->id }}">
                        {{ $tag->name }}
                      </option>
                    @endforeach
                  </select>
              </div>
                <div class="col-sm-2 mt-3 pl-0">
                  <button class="btn btn-wild pb-0" type="button" data-toggle="modal" data-target="#tagModal">
                    <i class="material-icons" style="font-size:20px">add_box</i>
                  </button>
                </div>
            </div>
          @endif

        </div>
        <div class="modal-footer">
          <button type="button" class="btn btn-secondary" data-dismiss="modal">Cerrar</button>
          <button type="submit" class="btn btn-wild">Guardar apunte</button>
        </div>
      </div>
    </div>
  </div>
</form>
