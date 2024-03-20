<x-layouts.app title="Crear nueva cuota">
    @error('loan_id')
        <div class="alert alert-warning">{{ $message }}</div>
    @enderror
    <div class="card shadow-lg border-0 rounded-lg mt-5">
        <div class="card-body">
            <form action="{{ route('installments.store') }}" method="POST">
                @csrf
                <input
                    id="loan_id"
                    name="loan_id"
                    type="hidden"
                    value="{{ request()->query('loan_id') }}"
                    required
                >
                <div class="form-floating mb-3">
                    <input
                        class="form-control"
                        id="amount"
                        name="amount"
                        type="text"
                        value="{{ old('amount') }}"
                        pattern="^\d{1,18}(\.\d{1,2})?$"
                        placeholder=""
                        maxlength="21"
                        required
                    >
                    <label for="amount">Monto</label>
                    @error('amount')
                        <small class="text-danger">{{ $message }}</small>
                    @enderror
                </div>
                <div class="form-floating mb-3">
                    <input
                        class="form-control"
                        id="expiration_date"
                        name="expiration_date"
                        type="date"
                        value="{{ old('expiration_date') }}"
                        placeholder=""
                        maxlength="10"
                        required
                    >
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