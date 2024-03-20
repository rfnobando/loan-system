<x-layouts.app title="Cliente #{{ $customer->id }}">
    <h4 class="mb-3">DNI: {{ $customer->dni_number }}</h4>
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
                        <td>
                            <button type="button" class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#imagesModal">
                                Ver Fotos
                            </button>
                        </td>
                        <td>
                            <div class="btn-group">
                                <a href="{{ route('customers.edit', $customer) }}" class="btn btn-warning rounded mx-1">
                                    <i class="fas fa-pencil"></i>
                                </a>
                                <form class="mx-1" id="deleteForm" action="{{ route('customers.destroy', $customer) }}" method="POST">
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
    <!-- Modal -->
    <div class="modal fade" id="imagesModal" tabindex="-1" aria-labelledby="imagesModalLabel" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h1 class="modal-title fs-5" id="imagesModalLabel">Fotos DNI</h1>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    <div id="imagesCarousel" class="carousel slide">
                        <div class="carousel-inner">
                            <div class="carousel-item active">
                                <img src="{{ asset('storage').'/'.$customer->dni_frontpic }}" class="d-block w-100" alt="...">
                            </div>
                            <div class="carousel-item">
                                <img src="{{ asset('storage').'/'.$customer->dni_backpic }}" class="d-block w-100" alt="...">
                            </div>
                        </div>
                        <button class="carousel-control-prev" type="button" data-bs-target="#imagesCarousel" data-bs-slide="prev">
                            <span class="carousel-control-prev-icon" aria-hidden="true"></span>
                            <span class="visually-hidden">Previous</span>
                        </button>
                        <button class="carousel-control-next" type="button" data-bs-target="#imagesCarousel" data-bs-slide="next">
                            <span class="carousel-control-next-icon" aria-hidden="true"></span>
                            <span class="visually-hidden">Next</span>
                        </button>
                    </div>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-danger" data-bs-dismiss="modal">Cerrar</button>
                </div>
            </div>
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
                        <th scope="col">Monto</th>
                        <th scope="col">Facturación</th>
                        <th scope="col">Estado</th>
                        <th scope="col">Fecha de Solicitud</th>
                        <th scope="col">Cuotas</th>
                    </tr>
                </thead>
                <tbody>
                    @if($customer->loans->isEmpty())
                        <tr>
                            <td class="text-center" colspan="5">
                                <h3 class="my-3">El cliente no tiene préstamos asignados.</h3>
                            </td>
                        </tr>
                    @endif
                    @foreach($customer->loans as $index => $loan)
                    <tr>
                        <td>${{ $loan->amount }}</td>
                        <td>{{ $loan->billing }}</td>
                        <td>{{ $loan->status }}</td>
                        <td>{{ $loan->created_at->format('d/m/Y') }}</td>
                        <td><a class="btn btn-primary" href="{{ route('loans.show', $loan) }}">Ver Cuotas</a></td>
                    </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
    </div>
    <form class="text-center my-3" action="{{ route('loans.create') }}" method="GET">
        <input type="hidden" name="customer_id" value="{{ $customer->id }}">
        <input type="hidden" name="customer_dni_number" value="{{ $customer->dni_number }}">
        <button class="btn btn-primary w-50">Asignar préstamo</button>
    </form>
    @section('scripts')
        <script src="{{ asset('js/confirmDelete.js') }}"></script>
    @endsection
</x-layouts.app>