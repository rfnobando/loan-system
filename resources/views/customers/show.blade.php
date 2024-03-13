<x-layouts.app title="Cliente #{{ $customer->id }}">
    <div class="card mb-4">
        <div class="card-header">
            <i class="fas fa-table me-1"></i>
            Datos del cliente
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
                        <th scope="col">Acciones</th>
                    </tr>
                </thead>
                <tbody>
                    <tr>
                        <td>{{ $customer->full_name }}</td>
                        <td>{{ $customer->phone_number }}</td>
                        <td>{{ $customer->email }}</td>
                        <td>{{ $customer->dni_number }}</td>
                        <td><a href="#">Ver Fotos</a></td>
                        <td>
                            <a href="{{ route('customers.edit', $customer) }}" class="btn btn-warning">
                                <i class="fas fa-pencil"></i>
                            </a>
                            <button onclick="submitDeleteForm()" class="btn btn-danger">
                                <i class="fas fa-trash"></i>
                            </button>
                            <form id="deleteForm" action="{{ route('customers.destroy', $customer) }}" method="POST">
                                @csrf
                                @method('DELETE')
                            </form>
                        </td>
                    </tr>
                </tbody>
            </table>
        </div>
    </div>
    <div class="card mb-4">
        <div class="card-header">
            <i class="fas fa-table me-1"></i>
            Historial de préstamos
        </div>
        <div class="table-responsive">
            <table class="table table-bordered">
                <thead>
                    <tr>
                        <th scope="col">Monto Solicitado</th>
                        <th scope="col">Estado</th>
                        <th scope="col">Fecha de Solicitud</th>
                        <th scope="col">Cuotas</th>
                    </tr>
                    @foreach($customer->loans as $loan)
                        <tr>
                            <td>${{ $loan->amount }}</td>
                            <td>{{ $loan->status }}</td>
                            <td>{{ $loan->created_at->format('d-m-Y') }}</td>
                            <td><a href="">Ver Cuotas</a></td>
                        </tr>
                    @endforeach
                </thead>
                <tbody>
                </tbody>
            </table>
        </div>
    </div>
    <script src="{{ asset('js/submitDeleteForm.js') }}"></script>
</x-layouts.app>