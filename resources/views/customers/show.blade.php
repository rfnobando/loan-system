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
                        <td>
                            <button type="button" class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#imagesModal">
                                Ver Fotos
                            </button>
                        </td>
                        <td>
                            <a href="{{ route('customers.edit', $customer) }}" class="btn btn-warning">
                                <i class="fas fa-pencil"></i>
                            </a>
                            <button id="deleteBtn" class="btn btn-danger">
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
                        <th scope="col">Monto Solicitado</th>
                        <th scope="col">Estado</th>
                        <th scope="col">Fecha de Solicitud</th>
                        <th scope="col">Cuotas</th>
                    </tr>
                    @foreach($customer->loans as $loan)
                    <tr>
                        <td>${{ $loan->amount }}</td>
                        <td>{{ $loan->status }}</td>
                        <td>{{ $loan->created_at }}</td>
                        <td><a href="{{ route('loans.show', $loan) }}">Ver Cuotas</a></td>
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