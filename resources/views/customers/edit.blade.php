<x-layouts.app title="Editar cliente #{{ $customer->id }}">
    <div class="card shadow-lg border-0 rounded-lg mt-5">
        <div class="card-body">
            <form action="{{ route('customers.update', $customer) }}" method="POST" enctype="multipart/form-data">
                @csrf
                @method('PATCH')
                @include('customers.form-fields')
                <div class="mt-4 mb-0">
                    <div class="text-center">
                        <button class="btn btn-primary btn-block w-50" type="submit">Guardar cambios</button>
                    </div>
                </div>
            </form>
        </div>
    </div>
    @section('scripts')
        <script src="{{ asset('js/disableRequiredImages.js') }}"></script>
    @endsection
</x-layouts.app>