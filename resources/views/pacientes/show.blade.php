<div class="modal-header">
    <h5 class="modal-title">Ver Paciente</h5>
    <button type="button" class="btn-close" data-bs-dismiss="modal"></button>
</div>
<div class="modal-body">
    <div class="mb-3">
        <label class="form-label"><strong>Nombre:</strong></label>
        <div class="form-control-plaintext">{{ $paciente->nombre }}</div>
    </div>
    <div class="mb-3">
        <label class="form-label"><strong>Apellidos:</strong></label>
        <div class="form-control-plaintext">{{ $paciente->apellidos }}</div>
    </div>
    <div class="d-grid gap-2 d-md-flex justify-content-md-end">
        <button type="button" class="btn btn-secondary btn-sm" data-bs-dismiss="modal">
            <i class="fa fa-arrow-left"></i> Cerrar
        </button>
    </div>
</div>