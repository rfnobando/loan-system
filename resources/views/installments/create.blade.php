<x-layouts.app title="Crear nueva cuota">
    <h4>Préstamo #{{ request()->query('loan_id') }}</h4>
    <div class="card shadow-lg border-0 rounded-lg mt-5">
        <div class="card-body">
            <form action="{{ route('loans.store') }}" method="POST">
                @csrf
                <input id="loan_id" name="loan_id" type="hidden" value="{{ request()->query('loan_id') }}" required>
                <input id="status" name="status" type="hidden" value="Pendiente" required>
                <div class="form-floating mb-3">
                    <input class="form-control" id="amount" name="amount" type="text" placeholder="" required>
                    <label for="amount">Monto</label>
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