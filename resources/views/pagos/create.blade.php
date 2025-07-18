<div class="modal-header">
  <h5 class="modal-title">Agregar pago</h5>
  <button type="button" class="btn-close" data-bs-dismiss="modal"></button>
</div>
<div class="modal-body">
  <form action="{{ route('pagos.store') }}" method="POST">
        @csrf

        <input type="text" name="tratamiento_id" value="{{ $tratamiento_id }}" hidden>

        <div class="mb-3">
            <label for="inputMont" class="form-label"><strong>Monto:</strong></label>
            <input
                type="number"
                name="monto"
                class="form-control @error('monto') is-invalid @enderror"
                id="inputMont"
                placeholder="Monto">
            @error('monto')
                <div class="form-text text-danger">{{ $message }}</div>
            @enderror
        </div>

        <div class="mb-3">
            <label for="inputMetodo" class="form-label"><strong>Método de Pago:</strong></label>
            <select
                name="metodo_pago"
                class="form-control @error('metodo_pago') is-invalid @enderror"
                id="inputMetodo">
                <option value="">Seleccione un método</option>
                <option value="QR">QR</option>
                <option value="Efectivo">Efectivo</option>
                <option value="Tarjeta">Tarjeta</option>
                <option value="Transferencia">Transferencia</option>
                <option value="Cheque">Cheque</option>
            </select>
            @error('metodo_pago')
                <div class="form-text text-danger">{{ $message }}</div>
            @enderror
        </div>

        <button type="submit" class="btn btn-success">
            <i class="fa-solid fa-floppy-disk"></i> Agregar
        </button>
    </form>
</div>