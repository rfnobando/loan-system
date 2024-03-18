<x-layouts.app title="Clientes">
    <div class="card mb-4">
        <div class="card-header">
            <i class="fas fa-table me-1"></i>
            Lista
        </div>
        <div class="table-responsive">
            <table class="table table-bordered">
                <thead>
                    <tr>
                        <th scope="col">Nombre Completo</th>
                        <th scope="col">Teléfono</th>
                        <th scope="col">Email</th>
                        <th scope="col">DNI</th>
                        <th scope="col">Préstamos</th>
                    </tr>
                </thead>
                <tbody>
                    @if($customers->isEmpty())
                        <tr>
                            <td class="text-center" colspan="5">
                                <h3 class="my-3">No hay clientes registrados.</h3>
                            </td>
                        </tr>
                    @endif
                    @foreach($customers as $customer)
                        <tr>
                            <td>{{ $customer->full_name }}</td>
                            <td>{{ $customer->phone_number }}</td>
                            <td>{{ $customer->email }}</td>
                            <td>{{ $customer->dni_number }}</td>
                            <td><a class="btn btn-primary" href="{{ route('customers.show', $customer) }}">Ver Historial</a></td>
                        </tr>
                    @endforeach
                </tbody>
            </table>
            <div class="px-3">
                {{ $customers->links() }}
            </div>
        </div>
    </div>
</x-layouts.app>
