<div class="modal-header">
    <h5 class="modal-title me-2">{{ $tratamiento->descripcion }}</h5>
    <span class="badge rounded-pill
        {{ $tratamiento->estado == 'No pagado' ? 'text-bg-danger' : '' }}
        {{ $tratamiento->estado == 'Parcial' ? 'text-bg-warning' : '' }}
        {{ $tratamiento->estado == 'Pagado' ? 'text-bg-success' : '' }}"
    >{{ $tratamiento->estado }}</span>
    <button type="button" class="btn-close" data-bs-dismiss="modal"></button>
</div>
<div class="modal-body">
    <div class="d-flex align-items-center justify-content-between mb-3">
        <div class="form-group">
            <strong>Paciente:</strong>
            {{ $tratamiento->paciente->nombre }} {{ $tratamiento->paciente->apellidos }}
        </div>
        <div class="form-group">
            <strong>Costo Total:</strong>
            {{ $tratamiento->costo_total }}
        </div>
    </div>
    <hr>
    <div class="d-flex align-items-center justify-content-between mb-3">
        <h2 class="fs-5">Pagos</h2>
        @if($tratamiento->estado != 'Pagado')
            <button class="btn btn-success btn-sm" id="btn-create-pago" data-id="{{ $tratamiento->id }}">
                <i class="fa-solid fa-plus"></i> Agregar Pago
            </button>
        @endif
    </div>
    <table class="table table-striped table-bordered">
        <thead>
            <tr>
                <th>Fecha</th>
                <th>Monto</th>
                <th>Forma de Pago</th>
            </tr>
        </thead>
        <tbody>
            @forelse($tratamiento->detallePagos as $pago)
                <tr>
                    <td>{{ $pago->created_at->format('d-m-Y') }}</td>
                    <td>{{ $pago->monto }}</td>
                    <td>{{ $pago->metodo_pago }}</td>
                </tr>
            @empty
                <tr>
                    <td colspan="3" class="text-center">Aún no se realizó ningun pago</td>
                </tr>
            @endforelse
        </tbody>
    </table>
    <div class="d-grid gap-2 d-md-flex justify-content-md-end">
        <button type="button" class="btn btn-secondary btn-sm" data-bs-dismiss="modal">
            <i class="fa fa-arrow-left"></i> Cerrar
        </button>
    </div>
</div>
