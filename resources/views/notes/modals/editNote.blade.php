<div class="modal fade" id="editNoteModal" tabindex="-1" role="dialog"
  aria-labelledby="editNoteModal" aria-hidden="true">
  <div class="modal-dialog modal-lg" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title">Editar Nota</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
        <div class="form-group">

          <label class="mt-3" for="titulo">Título</label>
          <input class="form-control" type="text" name="title" disabled="true"
            required value="{{ $note->name }}">

          <label for="contenido">Contenido</label>
          <textarea class="form-control" required disabled="true"
            name="content" rows="15">{{ $note->content }}
          </textarea>
          @error('content')
              <div class="alert alert-danger mt-2">{{ $message }}</div>
          @enderror

        </div>
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-dismiss="modal">Cerrar</button>
        <button type="submit" class="btn btn-primary">Guardar apunte</button>
      </div>
    </div>
  </div>
</div>
