<x-layouts.app title="Detalles del préstamo">
    <h4 class="mb-3">DNI: {{ $loan->customer->dni_number }}</h4>
    <div class="card mb-4">
        <div class="card-header">
            <i class="fas fa-table me-1"></i>
            Datos del préstamo
        </div>
        <div class="table-responsive">
            <table class="table table-bordered">
                <thead>
                    <tr>
                        <th scope="col">Monto</th>
                        <th scope="col">Facturación</th>
                        <th scope="col">Estado</th>
                        <th scope="col">Fecha de Solicitud</th>
                        <th scope="col">DNI Solicitante</th>
                        <th scope="col">Acciones</th>
                    </tr>
                </thead>
                <tbody>
                    <tr>
                        <td>${{ $loan->amount }}</td>
                        <td>{{ $loan->billing }}</td>
                        <td>{{ $loan->status }}</td>
                        <td>{{ $loan->created_at->format('d/m/Y') }}</td>
                        <td>{{ $loan->customer->dni_number }}</td>
                        <td>
                            <a href="{{ route('loans.edit', $loan) }}" class="btn btn-warning">
                                <i class="fas fa-pencil"></i>
                            </a>
                            <button class="btn btn-danger" id="deleteBtn">
                                <i class="fas fa-trash"></i>
                            </button>
                            <form id="deleteForm" action="{{ route('loans.destroy', $loan) }}" method="POST">
                                @csrf
                                @method('DELETE')
                            </form>
                        </td>
                    </tr>
                </tbody>
            </table>
        </div>
    </div>
    <form action="{{ route('installments.create') }}" method="GET">
        <input type="hidden" name="loan_id" value="{{ $loan->id }}">
        <button class="btn btn-primary m-4">Agregar cuota</button>
    </form>
    <div class="card mb-4">
        <div class="card-header">
            <i class="fas fa-table me-1"></i>
            Cuotas
        </div>
        <div class="table-responsive">
            <table class="table table-bordered">
                <thead>
                    <tr>
                        <th colspan="8">Cantidad de cuotas: {{ count($loan->installments) }}</th>
                    </tr>
                    <tr>
                        <th scope="col">#</th>
                        <th scope="col">Monto</th>
                        <th scope="col">Estado</th>
                        <th scope="col">Fecha de Emisión</th>
                        <th scope="col">Fecha de Vencimiento</th>
                        <th scope="col">Fecha de Pago</th>
                        <th scope="col">Pagos</th>
                        <th scope="col">Acciones</th>
                    </tr>
                </thead>
                <tbody>
                    @if($loan->installments->isEmpty())
                        <tr>
                            <td class="text-center" colspan="8">
                                <h3 class="my-3">El préstamo aún no tiene cuotas.</h3>
                            </td>
                        </tr>
                    @endif
                    @foreach($loan->installments as $index => $installment)
                    <tr>
                        <td>{{ $index + 1 }}</td>
                        <td>${{ $installment->amount }}</td>
                        <td>{{ $installment->status }}</td>
                        <td>{{ $installment->created_at->format('d/m/Y') }}</td>
                        <td>{{ $installment->expiration_date->format('d/m/Y') }}</td>
                        <td>{{ ($installment->paid_at != null) ? $installment->paid_at->format('d/m/Y') : 'Impaga' }}</td>
                        <td>
                            <form action="{{ route('installments.update', $installment) }}" method="post">
                                @csrf
                                @method('PATCH')
                                <button type="submit" class="btn {{ $installment->status == 'Pendiente' ? 'btn-success' : 'btn-secondary' ; }}">
                                    {{ $installment->status == 'Pendiente' ? 'Registrar pago' : 'Anular pago' }}
                                </button>
                            </form>
                        </td>
                        <td>
                            <a href="#" class="btn btn-warning">
                                <i class="fas fa-pencil"></i>
                            </a>
                            <button class="btn btn-danger">
                                <i class="fas fa-trash"></i>
                            </button>
                            <form id="deleteInstallmentForm" action="" method="POST">
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
    @section('scripts')
        <script src="{{ asset('js/submitDeleteForm.js') }}"></script>
    @endsection
</x-layouts.app>