<div class="modal-header">
    <h5 class="modal-title">Editar Paciente</h5>
    <button type="button" class="btn-close" data-bs-dismiss="modal"></button>
</div>
<div class="modal-body">
    <form action="{{ route('pacientes.update', $paciente->id) }}" method="POST">
        @csrf
        @method('PUT')
        <div class="mb-3">
            <label for="inputNombre" class="form-label"><strong>Nombre:</strong></label>
            <input
                type="text"
                name="nombre"
                value="{{ old('nombre', $paciente->nombre) }}"
                class="form-control @error('nombre') is-invalid @enderror"
                id="inputNombre"
                placeholder="Nombre">
            @error('nombre')
                <div class="form-text text-danger">{{ $message }}</div>
            @enderror
        </div>
        <div class="mb-3">
            <label for="inputApellidos" class="form-label"><strong>Apellidos:</strong></label>
            <input
                type="text"
                name="apellidos"
                value="{{ old('apellidos', $paciente->apellidos) }}"
                class="form-control @error('apellidos') is-invalid @enderror"
                id="inputApellidos"
                placeholder="Apellidos">
            @error('apellidos')
                <div class="form-text text-danger">{{ $message }}</div>
            @enderror
        </div>
        <div class="d-grid gap-2 d-md-flex justify-content-md-end">
            <button type="button" class="btn btn-secondary btn-sm me-2" data-bs-dismiss="modal">
                <i class="fa fa-arrow-left"></i> Cancelar
            </button>
            <button type="submit" class="btn btn-success">
                <i class="fa-solid fa-floppy-disk"></i> Guardar
            </button>
        </div>
    </form>
</div>