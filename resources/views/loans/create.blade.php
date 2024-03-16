<x-layouts.app title="Asignar préstamo">
    <h4>DNI: {{ request()->query('customer_dni_number') }}</h4>
    <div class="card shadow-lg border-0 rounded-lg mt-5">
        <div class="card-body">
            <form action="{{ route('loans.store') }}" method="POST">
                @csrf
                <input id="customer_id" name="customer_id" type="hidden" value="{{ request()->query('customer_id') }}" required>
                <input id="status" name="status" type="hidden" value="Pendiente" required>
                <div class="form-floating mb-3">
                    <input class="form-control" id="amount" name="amount" type="text" placeholder="" required>
                    <label for="amount">Monto</label>
                </div>
                <div class="input-group mb-3">
                    <label class="input-group-text" for="billing">Facturación:</label>
                    <select class="form-select" id="billing" name="billing">
                        <option selected value="Semanal">Semanal</option>
                        <option value="Quincenal">Quincenal</option>
                        <option value="Mensual">Mensual</option>
                    </select>
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