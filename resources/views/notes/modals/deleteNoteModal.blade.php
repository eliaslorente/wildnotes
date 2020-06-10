<form action="{{ url('notes/delete') }}" method="get" id="deleteNoteForm">
  @csrf

  <div class="modal fade" id="deleteNoteModal" tabindex="-1" role="dialog"
    aria-labelledby="deleteNoteModal" aria-hidden="true">
    <div class="modal-dialog modal-lg" role="document">
      <div class="modal-content">
        <div class="modal-header">
          <h5 class="modal-title">¿Está seguro de que desea borrar esta Nota?</h5>
          <button type="button" class="close" data-dismiss="modal" aria-label="Close">
            <span aria-hidden="true">&times;</span>
          </button>
        </div>
        <div class="modal-body d-flex justify-content-center">
          <button type="button" class="btn btn-secondary" data-dismiss="modal">No</button>
          <button type="submit" class="btn btn-primary">Si, deseo borrarla</button>
          <input type="hidden" id="inputId">
      </div>
    </div>
  </div>

</form>
