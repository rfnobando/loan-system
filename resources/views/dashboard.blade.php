<x-layouts.app title="Dashboard">
    @section('styles')
        <link rel="stylesheet" href="{{ asset('css/custom-styles.css') }}">:
    @endsection
    <section class="my-5">
        <div class="card text-white bg-primary mb-3" >
            <div class="card-body">
                <h5 class="card-header text-center">Lista de clientes</h5>
                <h6 class="card-text text-center my-3">
                    Ver todos los clientes registrados hasta el momento.
                </h6>
                <a class="stretched-link" href="{{ route('customers.index') }}"></a>
            </div>
        </div>
        <div class="card text-white bg-success mb-3" >
            <div class="card-body">
                <h5 class="card-header text-center">Nuevo cliente</h5>
                <h6 class="card-text text-center my-3">
                    Registra un nuevo cliente para comenzar a asignarle préstamos.
                </h6>
                <a class="stretched-link" href="{{ route('customers.create') }}"></a>
            </div>
        </div>
    </section>
</x-layouts.app>