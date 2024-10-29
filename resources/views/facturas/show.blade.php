{{-- Heredemos la estructura del archivo app.blade.php --}}
@extends('layout.app')

{{-- Definimos el titulo --}}
@section('title', 'Facturas')

{{-- Definimos el contenido --}}
@section('content')
    <h1 class="text-center text-primary">Facturas</h1>
    <h5 class="text-muted text-center">Listado de facturas registradas</h5>
    <hr class="border-primary">
    
    {{-- Botón para ir al formulario de agregar factura --}}
    <div class="text-end mb-3">
        <a class="btn btn-outline-danger btn-lg" href="/facturas/create">
            <i class="fas fa-plus-circle"></i> Agregar nueva factura
        </a>
    </div>

    <table class="table table-striped table-bordered shadow-sm mt-2">
        <thead class="table-primary">
            <tr>
                <th>Código</th>
                <th>Número de factura</th>
                <th>Fecha</th>
                <th>Subtotal</th>
                <th>Impuesto</th>
                <th>Total</th>
                <th>Método de pago</th>
                <th>Estado</th>
                <th>Cliente</th>
                <th>Acciones</th>
            </tr>
        </thead>
        <tbody>
            {{-- Listado de facturas --}}
            @foreach ($facturas as $item)
                <tr>
                    <td>{{ $item->codigo }}</td>
                    <td>{{ $item->numero_factura }}</td>
                    <td>{{ $item->fecha }}</td>
                    <td>{{ $item->subtotal }}</td>
                    <td>{{ $item->impuesto }}</td>
                    <td>{{ $item->total }}</td>
                    <td>{{ $item->metodo_pago }}</td>
                    <td>{{ $item->estado }}</td>
                    <td>{{ $item->cliente }}</td>
                    <td class="text-center">
                        <a class="btn btn-outline-success btn-sm" href="/facturas/edit/{{ $item->codigo }}">
                            <i class="fas fa-edit"></i> Modificar
                        </a>
                        <button class="btn btn-outline-danger btn-sm" 
                                onclick="destroy(this)" 
                                url="/facturas/destroy/{{ $item->codigo }}" 
                                token="{{ csrf_token() }}">
                            <i class="fas fa-trash-alt"></i> Eliminar
                        </button>
                    </td>
                </tr>
            @endforeach
        </tbody>
    </table>
@endsection

@section('scripts')
    {{-- SweetAlert --}}
    <script src="//cdn.jsdelivr.net/npm/sweetalert2@11"></script>
    {{-- JS --}}
    <script src="{{ asset('js/factura.js') }}"></script>
@endsection
