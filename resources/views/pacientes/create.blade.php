<div class="modal-header">
    <h5 class="modal-title">Agregar nuevo paciente</h5>
    <button type="button" class="btn-close" data-bs-dismiss="modal"></button>
</div>
<div class="modal-body">
    <form action="{{ route('pacientes.store') }}" method="POST">
                @csrf

                <div class="mb-3">
                        <label for="inputNombre" class="form-label"><strong>Nombre:</strong></label>
                        <input
                                type="text"
                                name="nombre"
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
                                class="form-control @error('apellidos') is-invalid @enderror"
                                id="inputApellidos"
                                placeholder="Apellidos">
                        @error('apellidos')
                                <div class="form-text text-danger">{{ $message }}</div>
                        @enderror
                </div>

                <button type="submit" class="btn btn-success">
                        <i class="fa-solid fa-floppy-disk"></i> Agregar
                </button>
        </form>
</div>