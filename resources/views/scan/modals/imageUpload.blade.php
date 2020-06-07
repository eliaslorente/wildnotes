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
              name="content" rows="15">{{ old('content', $scan ?? '') }}
            </textarea>
            @error('content')
                <div class="alert alert-danger mt-2">{{ $message }}</div>
            @enderror
          </div>

          @if(!$subjects->isEmpty())
            <div class="form-group">
              <label for="etiquetas">Materias</label>
                <select class="form-control" name="subject">
                  <option value="">Materias</option>
                  @foreach($subjects as $subject)
                    <option value="{{ $subject->id }}"
                      {{ old('subject') == $subject->id ? 'selected' : '' }}>
                      {{ $subject->name }}
                    </option>
                  @endforeach
                </select>
            </div>
          @endif

          @if(!$tags->isEmpty())
            <div class="form-group">
              <label for="etiquetas">Etiquetas</label>
                <select multiple class="form-control" name="tags">
                  @foreach($tags as $tag)
                    <option value="{{ $tag->id }}">
                      {{ $tag->name }}
                    </option>
                  @endforeach
                </select>
            </div>
          @endif

        </div>
        <div class="modal-footer">
          <button type="button" class="btn btn-secondary" data-dismiss="modal">Cerrar</button>
          <button type="submit" class="btn btn-primary">Guardar apunte</button>
        </div>
      </div>
    </div>
  </div>
</form>
