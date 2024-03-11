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
                        <th scope="col">Fotos DNI</th>
                        <th scope="col">Préstamos</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach($customers as $customer)
                        <tr>
                            <td>{{ $customer->full_name }}</td>
                            <td>{{ $customer->phone_number }}</td>
                            <td>{{ $customer->email }}</td>
                            <td>{{ $customer->dni_number }}</td>
                            <td><a href="#">Ver Fotos</a></td>
                            <td><a href="{{ route('customers.show', $customer->id) }}">Ver Historial</a></td>
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
