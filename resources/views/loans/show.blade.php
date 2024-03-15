<x-layouts.app title="Prestamo #{{ $loan->id }}">
    <div class="card mb-4">
        <div class="card-header">
            <i class="fas fa-table me-1"></i>
            Datos del préstamo
        </div>
        <div class="table-responsive">
            <table class="table table-bordered">
                <thead>
                    <tr>
                        <th scope="col">DNI Solicitante</th>
                        <th scope="col">Monto</th>
                        <th scope="col">Estado</th>
                        <th scope="col">Fecha de Solicitud</th>
                        <th scope="col">Acciones</th>
                    </tr>
                </thead>
                <tbody>
                    <tr>
                        <td>{{ $loan->customer->dni_number }}</td>
                        <td>${{ $loan->amount }}</td>
                        <td>{{ $loan->status }}</td>
                        <td>{{ $loan->created_at }}</td>
                        <td>
                            <a href="{{ route('loans.edit', $loan) }}" class="btn btn-warning">
                                <i class="fas fa-pencil"></i>
                            </a>
                            <button class="btn btn-danger">
                                <i class="fas fa-trash"></i>
                            </button>
                            <form id="deleteForm" action="" method="POST">
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
            Cuotas
        </div>
        <div class="table-responsive">
            <table class="table table-bordered">
                <thead>
                    <tr>
                        <th colspan="6">Cantidad de cuotas: {{ count($loan->installments) }}</th>
                    </tr>
                    <tr>
                        <th scope="col">Monto</th>
                        <th scope="col">Estado</th>
                        <th scope="col">Fecha de Emisión</th>
                        <th scope="col">Fecha de Vencimiento</th>
                        <th scope="col">Pagos</th>
                        <th scope="col">Acciones</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach($loan->installments as $installment)
                    <tr>
                        <td>${{ $installment->amount }}</td>
                        <td>{{ $installment->status }}</td>
                        <td>{{ $installment->created_at }}</td>
                        <td>{{ $installment->expiration_date }}</td>
                        <td>
                            <button class="btn {{ $installment->status == 'Pendiente' ? 'btn-success' : 'btn-secondary' ; }}">
                                {{ $installment->status == 'Pendiente' ? 'Registrar pago' : 'Anular pago' ; }}
                            </button>
                        </td>
                        <td>
                            <a href="#" class="btn btn-warning">
                                <i class="fas fa-pencil"></i>
                            </a>
                            <button class="btn btn-danger">
                                <i class="fas fa-trash"></i>
                            </button>
                            <form id="deleteForm" action="" method="POST">
                                @csrf
                                @method('DELETE')
                            </form>
                        </td>
                    </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
    </div>
</x-layouts.app>