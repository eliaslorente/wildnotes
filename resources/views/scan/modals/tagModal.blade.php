<div class="modal fade" id="tagModal" tabindex="-1" role="dialog"
  aria-labelledby="tagModal" aria-hidden="true">
  <div class="modal-dialog modal-lg" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title">Crear Etiqueta</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">

        <div class="form-group">
          <label class="mt-3" for="titulo">Nombre</label>
          <input class="form-control" type="text" id="tagName" required >
        </div>

      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-dismiss="modal">Cerrar</button>
        <button type="submit" class="btn btn-wild" onclick="createTag()">Crear Etiqueta</button>
      </div>
    </div>
  </div>
</div>
