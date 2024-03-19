<x-layouts.app title="Clientes">
    <form action="{{ route('customers.index') }}" method="GET">
        <div class="input-group" style="width: 18rem;">
            <select class="form-select" name="sort">
                <option value="desc" {{ $sort == 'desc' ? 'selected' : null }}>Más recientes</option>
                <option value="asc" {{ $sort == 'asc' ? 'selected' : null }} >Más antiguos</option>
            </select>
            <button class="btn btn-primary" type="submit">Aplicar</button>
        </div>
    </form>
    <div class="card mt-2 mb-4">
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
                {{ $customers->appends(['sort' => $sort])->links() }}
            </div>
        </div>
    </div>
    <script>

    </script>
</x-layouts.app>
