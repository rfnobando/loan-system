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
                        <td>
                            @if($loan->status == 'Pendiente')
                                <strong>Pendiente</strong>
                            @else
                                <strong class="text-success">Pagado</strong>
                            @endif
                        </td>
                        <td>{{ $loan->created_at->format('d/m/Y') }}</td>
                        <td>{{ $loan->customer->dni_number }}</td>
                        <td>
                            <div class="btn-group">
                                <a href="{{ route('loans.edit', $loan) }}" class="btn btn-warning rounded mx-1">
                                    <i class="fas fa-pencil"></i>
                                </a>
                                <form class="mx-1" action="{{ route('loans.destroy', $loan) }}" method="POST">
                                    @csrf
                                    @method('DELETE')
                                    <button class="btn btn-danger rounded delete-btn">
                                        <i class="fas fa-trash"></i>
                                    </button>
                                </form>
                            </div>
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
                        <td>
                            @if($installment->status == 'Pendiente')
                                @if($installment->expiration_date->lessThan(now()))
                                    <strong class="text-danger">Vencida</strong>
                                @else
                                    <strong>Pendiente</strong>
                                @endif
                            @else
                                <strong class="text-success">Pagada</strong>
                            @endif
                        </td>
                        <td>{{ $installment->created_at->format('d/m/Y') }}</td>
                        <td>{{ $installment->expiration_date->format('d/m/Y') }}</td>
                        <td>
                            @if($installment->paid_at != null)
                                {{ $installment->paid_at->format('d/m/Y') }}
                            @else
                                <strong>Impaga</strong>
                            @endif
                        </td>
                        <td>
                            <form action="{{ route('installments.update-status', $installment) }}" method="post">
                                @csrf
                                @method('PATCH')
                                <button type="submit" class="btn {{ $installment->status == 'Pendiente' ? 'btn-success' : 'btn-secondary' ; }}">
                                    {{ $installment->status == 'Pendiente' ? 'Registrar pago' : 'Anular pago' }}
                                </button>
                            </form>
                        </td>
                        <td>
                            <div class="btn-group">
                                <a href="{{ route('installments.edit', $installment) }}" class="btn btn-warning rounded mx-1">
                                    <i class="fas fa-pencil"></i>
                                </a>
                                <form class="mx-1" action="{{ route('installments.destroy', $installment) }}" method="POST">
                                    @csrf
                                    @method('DELETE')
                                    <button class="btn btn-danger rounded delete-btn">
                                        <i class="fas fa-trash"></i>
                                    </button>
                                </form>
                            </div>
                        </td>
                    </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
    </div>
    <form class="text-center my-3" action="{{ route('installments.create') }}" method="GET">
        <input type="hidden" name="loan_id" value="{{ $loan->id }}">
        <button class="btn btn-primary w-50">Agregar cuota</button>
    </form>
    @section('scripts')
        <script src="{{ asset('js/confirmDelete.js') }}"></script>
    @endsection
</x-layouts.app>