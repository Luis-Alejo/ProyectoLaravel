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
                    <th>Paciente</th>
                    <th>Estado</th>
                    <th>Monto Pagado</th>
                    <th>Costo Total</th>
                    <th width="250px">Acciones</th>
                </tr>
            </thead>

            <tbody>
            @forelse ($tratamientos as $trat)
                <tr>
                    <td>{{ ++$loop->index }}</td>
                    <td>{{ $trat->descripcion }}</td>
                    <td>{{ $trat->paciente->nombre }} {{ $trat->paciente->apellidos }}</td>
                    <td @class([
                        'text-danger' => ($trat->estado == 'No pagado'),
                        'text-warning' => ($trat->estado == 'Parcial'),
                        'text-success' => ($trat->estado == 'Pagado')
                        ])>{{ $trat->estado }}</td>
                    <td @class([
                        'text-danger' => ($trat->estado == 'No pagado'),
                        'text-warning' => ($trat->estado == 'Parcial'),
                        'text-success' => ($trat->estado == 'Pagado')
                        ])>{{ $trat->monto_pagado }} Bs.</td>
                    <td>{{ $trat->costo_total }} Bs.</td>
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

<div class="modal fade" id="modal-tratamiento" tabindex="-1" aria-hidden="true">
  <div class="modal-dialog modal-dialog-centered">
    <div class="modal-content" id="modal-tratamiento-content">
    </div>
  </div>
</div>


<div class="modal fade" id="modal-pago" tabindex="-1" aria-hidden="true">
  <div class="modal-dialog">
    <div class="modal-content" id="modal-pago-content">
    </div>
  </div>
</div>


<script>
function openModalPaciente(url) {
    fetch(url)
        .then(response => response.text())
        .then(html => {
            document.getElementById('modal-tratamiento-content').innerHTML = html;
            new bootstrap.Modal(document.getElementById('modal-tratamiento')).show();
    });
}
document.addEventListener('DOMContentLoaded', function () {
    const btnCreate = document.getElementById('btn-create-tratamiento');
    if (btnCreate) {
        btnCreate.addEventListener('click', function () {
            openModalPaciente("{{ route('tratamientos.create') }}");
        });
    }
    document.querySelectorAll('a.btn-info, a.btn-primary').forEach(btn => {
        btn.addEventListener('click', function (e) {
            e.preventDefault();
            openModalPaciente(this.getAttribute('href'));
        });
    });
    document.body.addEventListener('click', function(e) {
        if (e.target && e.target.id === 'btn-create-pago') {
            const tratamientoId = e.target.getAttribute('data-id');
            const url = "{{ route('pagos.create', ':id') }}".replace(':id', tratamientoId);
            console.log('URL:' + url);
            fetch(url)
                .then(response => response.text())
                .then(html => {
                    document.getElementById('modal-pago-content').innerHTML = html;
                    new bootstrap.Modal(document.getElementById('modal-pago')).show();
                })
                .catch(error => console.error('Error fetching create pago form:', error));
        }
    });
});
</script>

@endsection