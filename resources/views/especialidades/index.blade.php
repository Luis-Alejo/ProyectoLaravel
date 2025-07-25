@extends('shared.layout')

@section('content')

<div class="card mt-5">

    <div class="card-body">
        @session('success')
            <div class="alert alert-success" role="alert"> {{ $value }} </div>
        @endsession

        <div class="d-grid gap-2 d-md-flex justify-content-md-end">
            @can('crear especialidades')
                <button type="button" class="btn btn-success btn-sm" id="btn-create-especialidad">
                    <i class="fa-solid fa-plus"></i>
                    Crear nueva especialidad
                </button>
            @endcan
        </div>

        <table class="table table-bordered table-striped mt-4">
            <thead>
                <tr>
                    <th width="80px">No</th>
                    <th>Descripción</th>
                    <th width="250px">Acciones</th>
                </tr>
            </thead>

            <tbody>
            @forelse ($especialidades as $esp)
                <tr>
                    <td>{{ ++$i }}</td>
                    <td>{{ $esp->descripcion }}</td>
                    <td>
                        <form action="{{ route('especialidades.destroy',$esp->id) }}" method="POST">
                            <a 
                                class="btn btn-info btn-sm"
                                href="{{ route('especialidades.show',$esp->id) }}">
                                <i class="fa-solid fa-list"> </i> Ver
                            </a>
                            <a 
                                class="btn btn-primary btn-sm"
                                href="{{ route('especialidades.edit',$esp->id) }}">
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

        {!! $especialidades->links() !!}
    </div>
</div>

<div class="modal fade" id="modal-create-especialidad" tabindex="-1" aria-hidden="true">
  <div class="modal-dialog">
    <div class="modal-content" id="modal-create-especialidad-content">
    </div>
  </div>
</div>

<script>
document.getElementById('btn-create-especialidad').addEventListener('click', function () {
    fetch("{{ route('especialidades.create') }}")
        .then(response => response.text())
        .then(html => {
            document.getElementById('modal-create-especialidad-content').innerHTML = html;
            new bootstrap.Modal(document.getElementById('modal-create-especialidad')).show();
        });
});
</script>

@endsection