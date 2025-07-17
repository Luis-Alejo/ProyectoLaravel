<div class="modal-header">
  <h5 class="modal-title">Agregar nuevo tratamiento</h5>
  <button type="button" class="btn-close" data-bs-dismiss="modal"></button>
</div>
<div class="modal-body">
  <form action="{{ route('tratamientos.store') }}" method="POST">
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

        <div class="mb-3">
            <label for="inputPaciente" class="form-label"><strong>Paciente:</strong></label>
            <select name="paciente_id" id="inputPaciente" class="form-control @error('paciente_id') is-invalid @enderror" required>
                <option value="">Seleccione un paciente</option>
                @foreach($pacientes as $paciente)
                    <option value="{{ $paciente->id }}">{{ $paciente->nombre }} {{ $paciente->apellidos }}</option>
                @endforeach
            </select>
            @error('paciente_id')
                <div class="form-text text-danger">{{ $message }}</div>
            @enderror
        </div>

        <div class="mb-3">
            <label for="inputCosto" class="form-label"><strong>Costo total:</strong></label>
            <input
                type="number"
                name="costo_total"
                class="form-control @error('costo_total') is-invalid @enderror"
                id="inputCosto"
                placeholder="Costo total">
            @error('costo_total')
                <div class="form-text text-danger">{{ $message }}</div>
            @enderror
        </div>

        <button type="submit" class="btn btn-success">
            <i class="fa-solid fa-floppy-disk"></i> Agregar
        </button>
    </form>
</div>