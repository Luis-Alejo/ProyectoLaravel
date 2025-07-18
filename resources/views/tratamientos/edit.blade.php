@extends('shared.layout')

@section('content')

<div class="card mt-5">
  <h2 class="card-header">Editar Tratamiento</h2>
  <div class="card-body">

    <div class="d-grid gap-2 d-md-flex justify-content-md-end">
        <a class="btn btn-primary btn-sm" href="{{ route('tratamientos.index') }}">
            <i class="fa fa-arrow-left"></i> Cancelar
        </a>
    </div>

    <form action="{{ route('tratamientos.update', $tratamiento->id) }}" method="POST">
        @csrf
        @method('PUT')

        <div class="mb-3">
            <label for="editDescripcion" class="form-label"><strong>Descripción:</strong></label>
            <input
                type="text"
                name="descripcion"
                value="{{ old('descripcion', $tratamiento->descripcion) }}"
                class="form-control @error('descripcion') is-invalid @enderror"
                id="editDescripcion"
                placeholder="Descripcion">
            @error('descripcion')
                <div class="form-text text-danger">{{ $message }}</div>
            @enderror
        </div>

        <div class="mb-3">
            <label for="editPaciente" class="form-label"><strong>Paciente:</strong></label>
            <select name="paciente_id" id="editPaciente" class="form-control @error('paciente_id') is-invalid @enderror" required>
                <option value="{{ old('paciente_id', $tratamiento->paciente_id) }}">{{ $tratamiento->paciente->nombre }} {{ $tratamiento->paciente->apellidos }}</option>
                @foreach($pacientes as $paciente)
                    <option value="{{ $paciente->id }}">{{ $paciente->nombre }} {{ $paciente->apellidos }}</option>
                @endforeach
            </select>
            @error('paciente_id')
                <div class="form-text text-danger">{{ $message }}</div>
            @enderror
        </div>

        <div class="mb-3">
            <label for="editCosto" class="form-label"><strong>Costo total:</strong></label>
            <input
                type="number"
                name="costo_total"
                value="{{ old('costo_total', $tratamiento->costo_total) }}"
                class="form-control @error('costo_total') is-invalid @enderror"
                id="editCosto"
                placeholder="Costo total">
            @error('costo_total')
                <div class="form-text text-danger">{{ $message }}</div>
            @enderror
        </div>
        <div class="d-grid gap-2 d-md-flex justify-content-md-end">
            <button type="button" class="btn btn-secondary btn-sm me-2" data-bs-dismiss="modal">
                <i class="fa fa-arrow-left"></i> Cancelar
            </button>
            <button type="submit" class="btn btn-success btn-sm me-2">
                <i class="fa-solid fa-floppy-disk"></i> Guardar
            </button>
        </div>
    </form>

  </div>
</div>
@endsection