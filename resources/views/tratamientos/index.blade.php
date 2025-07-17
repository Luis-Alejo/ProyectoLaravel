@extends('shared.layout')

@section('content')

<div class="card mt-5">

    <div class="card-body">
        @session('success')
            <div class="alert alert-success" role="alert"> {{ $value }} </div>
        @endsession

        <div class="d-grid gap-2 d-md-flex justify-content-md-end">
            @can('crear tratamientos')
                <button type="button" class="btn btn-success btn-sm" id="btn-create-tratamiento">
                    <i class="fa-solid fa-plus"></i>
                    Crear nuevo tratamiento
                </button>
            @endcan
        </div>

        <table class="table table-bordered table-striped mt-4">
            <thead>
                <tr>
                    <th width="80px">No</th>
                    <th>Descripción</th>
                    <th>Costo Total</th>
                    <th>Paciente</th>
                    <th width="250px">Acciones</th>
                </tr>
            </thead>

            <tbody>
            @forelse ($tratamientos as $trat)
                <tr>
                    <td>{{ ++$loop->index }}</td>
                    <td>{{ $trat->descripcion }}</td>
                    <td>{{ $trat->costo_total }}</td>
                    <td>{{ $trat->paciente->nombre }} {{ $trat->paciente->apellidos }}</td>
                    <td>
                        <form action="{{ route('tratamientos.destroy',$trat->id) }}" method="POST">
                            <a 
                                class="btn btn-info btn-sm"
                                href="{{ route('tratamientos.show',$trat->id) }}">
                                <i class="fa-solid fa-list"> </i> Ver
                            </a>
                            <a 
                                class="btn btn-primary btn-sm"
                                href="{{ route('tratamientos.edit',$trat->id) }}">
                                <i class="fa-solid fa-pen-to-square"></i> Editar
                            </a>

                            @csrf
                            @method('DELETE')

                            <button type="submit" class="btn btn-danger btn-sm">
                                <i class="fa-solid fa-trash"></i> Eliminar
                            </button>
                        </form>
                    </td>
                </tr>
            @empty
                <tr>
                    <td colspan="4">No hay información para mostrar</td>
                </tr>
            @endforelse
            </tbody>

        </table>

    </div>
</div>

<div class="modal fade" id="modal-create-tratamiento" tabindex="-1" aria-hidden="true">
  <div class="modal-dialog">
    <div class="modal-content" id="modal-create-tratamiento-content">
    </div>
  </div>
</div>

<script>
document.getElementById('btn-create-tratamiento').addEventListener('click', function () {
    fetch("{{ route('tratamientos.create') }}")
        .then(response => response.text())
        .then(html => {
            document.getElementById('modal-create-tratamiento-content').innerHTML = html;
            new bootstrap.Modal(document.getElementById('modal-create-tratamiento')).show();
        });
});
</script>

@endsection