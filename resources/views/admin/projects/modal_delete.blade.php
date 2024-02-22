
  
  <!-- Modal -->
  <div class="modal fade" id="modal_project_delete" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog">
      <div class="modal-content">
        <div class="modal-header">
          <h1 class="modal-title fs-5" id="exampleModalLabel">Conferma eliminazione progetto</h1>
          <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
        </div>

        <div class="modal-body">
          <h4>Sei sicuro di volere eliminare il progetto?</h4>
        </div>

        <div class="modal-footer">
            <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Chiudi</button>
            <form action="{{ route("admin.projects.destroy", ["project" => $project->id])}}" method="POST"> 
                @csrf
                @method("DELETE")
            <button type="submit" class="btn btn-danger btn-sm btn-square"> Elimina</button>

            </form>
        </div>
        </div>
      </div>
    </div>
  </div>