<x-layouts.app title="Editar préstamo #{{ $loan->id }}">
    <div class="card shadow-lg border-0 rounded-lg mt-5">
        <div class="card-body">
            <form action="{{ route('loans.update', $loan) }}" method="POST" enctype="multipart/form-data">
                @csrf
                @method('PATCH')
                <div class="form-floating mb-3">
                    <input class="form-control" id="amount" name="amount" type="text" placeholder="" pattern="^\d{1,8}(\.\d{1,2})?$" value="{{ old('amount', $loan->amount) }}" required>
                    <label for="amount">Monto</label>
                    @error('amount')
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
    <script src="{{ asset('js/formatAmount.js') }}"></script>
</x-layouts.app>