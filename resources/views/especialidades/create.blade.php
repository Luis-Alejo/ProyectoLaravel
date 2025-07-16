<div class="modal-header">
  <h5 class="modal-title">Agregar nueva especialidad</h5>
  <button type="button" class="btn-close" data-bs-dismiss="modal"></button>
</div>
<div class="modal-body">
  <form action="{{ route('especialidades.store') }}" method="POST">
        @csrf

        <div class="mb-3">
            <label for="inputDescripcion" class="form-label"><strong>Descripción:</strong></label>
            <input
                type="text"
                name="descripcion"
                class="form-control @error('descripcion') is-invalid @enderror"
                id="inputDescripcion"
                placeholder="Descripcion">
            @error('descripcion')
                <div class="form-text text-danger">{{ $message }}</div>
            @enderror
        </div>

        <button type="submit" class="btn btn-success">
            <i class="fa-solid fa-floppy-disk"></i> Agregar
        </button>
    </form>
</div>