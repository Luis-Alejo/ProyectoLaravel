<form action="{{ route('pagos.store') }}" method="POST">
    @csrf
    <input type="hidden" name="tratamiento_id" value="{{ $tratamiento->id }}">
    <div class="mb-3">
        <label>Método de pago:</label>
        <input type="text" name="metodo_pago" class="form-control" required>
    </div>
    <div class="mb-3">
        <label>Monto:</label>
        <input type="number" name="monto" class="form-control" required>
    </div>
    <button type="submit" class="btn btn-success">Registrar pago</button>
</form>