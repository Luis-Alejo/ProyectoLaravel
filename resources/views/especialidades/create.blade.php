@extends('especialidades.layout')

@section('content')

<div class="card mt-5">
  <h2 class="card-header">Agregar Nueva Especialidad</h2>
  <div class="card-body">

    <div class="d-grid gap-2 d-md-flex justify-content-md-end">
        <a class="btn btn-primary btn-sm" href="{{ route('especialidades.index') }}">
            <i class="fa fa-arrow-left"></i> Volver
        </a>
    </div>

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
</div>
@endsection