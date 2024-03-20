<x-layouts.app title="Editar préstamo">
    <h4>DNI: {{ $loan->customer->dni_number }}</h4>
    <div class="card shadow-lg border-0 rounded-lg mt-5">
        <div class="card-body">
            <form action="{{ route('loans.update', $loan) }}" method="POST" enctype="multipart/form-data">
                @csrf
                @method('PATCH')
                <div class="form-floating mb-3">
                    <input
                        class="form-control"
                        id="amount"
                        name="amount"
                        type="text"
                        value="{{ old('amount', $loan->amount) }}"
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
                <div class="mt-4 mb-0">
                    <div class="d-grid">
                        <button class="btn btn-primary btn-block" type="submit">Guardar cambios</button>
                    </div>
                </div>
            </form>
        </div>
    </div>
    @section('scripts')
        <script src="{{ asset('js/formatAmount.js') }}"></script>
    @endsection
</x-layouts.app>