@extends('especialidades.layout')

@section('content')

<div class="card mt-5">
    <h2 class="card-header">Clínica <em>"Los Andes"</em></h2>
    <form action="{{ route('logout') }}" method="POST">
        @csrf
        <button type="submit">Cerrar sesión</button>
    </form>

    <div class="card-body">
        @session('success')
            <div class="alert alert-success" role="alert"> {{ $value }} </div>
        @endsession

        <div class="d-grid gap-2 d-md-flex justify-content-md-end">
            @can('crear especialidades')
                <a class="btn btn-success btn-sm" href="{{ route('especialidades.create') }}">
                    <i class="fa fa-plus"></i> Agregar nueva especialidad
                </a>
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
@endsection