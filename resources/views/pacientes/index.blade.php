@extends('shared.layout')

@section('content')

<div class="card mt-5">

    <div class="card-body">
        @session('success')
            <div class="alert alert-success" role="alert"> {{ $value }} </div>
        @endsession

        <div class="d-grid gap-2 d-md-flex justify-content-md-end">
            @can('crear pacientes')
                <button type="button" class="btn btn-success btn-sm" id="btn-create-paciente">
                    <i class="fa-solid fa-plus"></i>
                    Crear nuevo paciente
                </button>
            @endcan
        </div>

        <table class="table table-bordered table-striped mt-4">
            <thead>
                <tr>
                    <th width="80px">No</th>
                    <th>Nombre</th>
                    <th>Apellidos</th>
                    <th width="250px">Acciones</th>
                </tr>
            </thead>

            <tbody>
            @forelse ($pacientes as $paciente)
                <tr>
                    <td>{{ ++$loop->index }}</td>
                    <td>{{ $paciente->nombre }}</td>
                    <td>{{ $paciente->apellidos }}</td>
                    <td>
                        <form action="{{ route('pacientes.destroy',$paciente->id) }}" method="POST">
                            <a 
                                class="btn btn-info btn-sm"
                                href="{{ route('pacientes.show',$paciente->id) }}">
                                <i class="fa-solid fa-list"> </i> Ver
                            </a>
                            <a 
                                class="btn btn-primary btn-sm"
                                href="{{ route('pacientes.edit',$paciente->id) }}">
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
                    <td colspan="5">No hay información para mostrar</td>
                </tr>
            @endforelse
            </tbody>

        </table>

    </div>
</div>

<div class="modal fade" id="modal-paciente" tabindex="-1" aria-hidden="true">
  <div class="modal-dialog">
    <div class="modal-content" id="modal-paciente-content">
    </div>
  </div>
</div>

<script>
function openModalPaciente(url) {
    fetch(url)
        .then(response => response.text())
        .then(html => {
            document.getElementById('modal-paciente-content').innerHTML = html;
            new bootstrap.Modal(document.getElementById('modal-paciente')).show();
        });
}
document.addEventListener('DOMContentLoaded', function () {
    const btnCreate = document.getElementById('btn-create-paciente');
    if (btnCreate) {
        btnCreate.addEventListener('click', function () {
            openModalPaciente("{{ route('pacientes.create') }}");
        });
    }
    document.querySelectorAll('a.btn-info, a.btn-primary').forEach(btn => {
        btn.addEventListener('click', function (e) {
            e.preventDefault();
            openModalPaciente(this.getAttribute('href'));
        });
    });
});
</script>

@endsection