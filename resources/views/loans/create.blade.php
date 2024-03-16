<x-layouts.app title="Asignar préstamo">
    <h4>DNI: {{ request()->query('customer_dni_number') }}</h4>
    <div class="card shadow-lg border-0 rounded-lg mt-5">
        <div class="card-body">
            <form action="{{ route('loans.store') }}" method="POST">
                @csrf
                <input id="customer_id" name="customer_id" type="hidden" value="{{ request()->query('customer_id') }}" required>
                <input id="status" name="status" type="hidden" value="Pendiente" required>
                <div class="form-floating mb-3">
                    <input class="form-control" id="amount" name="amount" pattern="^\d{1,8}(\.\d{1,2})?$" type="text" placeholder="" required>
                    <label for="amount">Monto del préstamo</label>
                    @error('amount')
                        <small class="text-danger">{{ $message }}</small>
                    @enderror
                </div>
                <div class="input-group mb-3">
                    <label class="input-group-text" for="billing">Facturación:</label>
                    <select class="form-select" id="billing" name="billing">
                        <option selected value="Semanal">Semanal</option>
                        <option value="Quincenal">Quincenal</option>
                        <option value="Mensual">Mensual</option>
                    </select>
                    @error('billing')
                        <small class="text-danger">{{ $message }}</small>
                    @enderror
                </div>
                <div class="form-floating mb-3">
                    <input class="form-control" id="installment_count" name="installment_count" type="number" placeholder="" required>
                    <label for="installment_count">Cantidad de cuotas</label>
                    @error('installment_count')
                        <small class="text-danger">{{ $message }}</small>
                    @enderror
                </div>
                <div class="form-floating mb-3">
                    <input class="form-control" id="installment_amount" name="installment_amount" type="text" placeholder="" required>
                    <label for="installment_amount">Monto de las cuotas</label>
                    @error('installment_amount')
                        <small class="text-danger">{{ $message }}</small>
                    @enderror
                </div>
                <div class="mt-4 mb-0">
                    <div class="d-grid">
                        <button class="btn btn-primary btn-block" type="submit">Crear préstamo</button>
                    </div>
                </div>
            </form>
        </div>
    </div>
</x-layouts.app>