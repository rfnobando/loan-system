<x-layouts.app title="Asignar préstamo">
    <h4>DNI: {{ request()->query('customer_dni_number') }}</h4>
    <div class="card shadow-lg border-0 rounded-lg mt-5">
        <div class="card-body">
            <form action="{{ route('loans.store') }}" method="POST">
                @csrf
                <input
                    id="customer_id"
                    name="customer_id"
                    type="hidden"
                    value="{{ request()->query('customer_id') }}"
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
                    @error('customer_id')
                        <small class="text-danger">{{ $message }}</small>
                    @enderror
                <div class="mt-4 mb-0">
                    <div class="text-center">
                        <button class="btn btn-primary btn-block w-50" type="submit">Crear préstamo</button>
                    </div>
                </div>
            </form>
        </div>
    </div>
    @section('scripts')
        <script src="{{ asset('js/formatAmount.js') }}"></script>
    @endsection
</x-layouts.app>