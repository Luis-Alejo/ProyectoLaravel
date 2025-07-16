@extends('especialidades.layout')

@section('content')

<div class="card mt-5">
  <h2 class="card-header">Ver Especialidad</h2>
  <div class="card-body">

    <div class="d-grid gap-2 d-md-flex justify-content-md-end">
        <a class="btn btn-primary btn-sm" href="{{ route('especialidades.index') }}">
            <i class="fa fa-arrow-left"></i> Volver
        </a>
    </div>

    <div class="row">
        <div class="col-xs-12 col-sm-12 col-md-12">
            <div class="form-group">
                <strong>Descripción:</strong> <br/>
                {{ $especialidades->name }}
            </div>
        </div>
    </div>

  </div>
</div>
@endsection