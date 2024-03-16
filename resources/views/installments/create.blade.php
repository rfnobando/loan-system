<x-layouts.app title="Crear nueva cuota">
    <h4>Préstamo #{{ request()->query('loan_id') }}</h4>
    <div class="card shadow-lg border-0 rounded-lg mt-5">
        <div class="card-body">
            <form action="{{ route('installments.store') }}" method="POST">
                @csrf
                <input id="loan_id" name="loan_id" type="hidden" value="{{ request()->query('loan_id') }}" required>
                <input id="status" name="status" type="hidden" value="Pendiente" required>
                <div class="form-floating mb-3">
                    <input class="form-control" id="amount" name="amount" type="text" pattern="^\d{1,8}(\.\d{1,2})?$" placeholder="" required>
                    <label for="amount">Monto</label>
                    @error('amount')
                        <small class="text-danger">{{ $message }}</small>
                    @enderror
                </div>
                <div class="form-floating mb-3">
                    <input class="form-control" id="expiration_date" name="expiration_date" type="date" placeholder="" maxlength="10" required>
                    <label for="expiration_date">Fecha de Vencimiento</label>
                    @error('expiration_date')
                        <small class="text-danger">{{ $message }}</small>
                    @enderror
                </div>
                <div class="mt-4 mb-0">
                    <div class="d-grid">
                        <button class="btn btn-primary btn-block" type="submit">Crear cuota</button>
                    </div>
                </div>
            </form>
        </div>
    </div>
    @section('scripts')
        <script src="{{ asset('js/formatAmount.js') }}"></script>
    @endsection
</x-layouts.app>