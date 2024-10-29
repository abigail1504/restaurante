{{-- Heredemos la estructura del archivo app.blade.php --}}
@extends('layout.app')

{{-- Definimos el titulo --}}
@section('title', 'Pedidos')

{{-- Definimos el contenido --}}
@section('content')
    <h1 class="text-center text-primary">Pedidos</h1>
    <h5 class="text-muted text-center">Listado de pedidos realizados</h5>
    <hr class="border-primary">
    
    {{-- Botón para ir al formulario de agregar pedido --}}
    <div class="text-end mb-3">
        <a class="btn btn-outline-danger btn-lg" href="/pedidos/create">
            <i class="fas fa-plus-circle"></i> Agregar nuevo pedido
        </a>
    </div>

    <table class="table table-striped table-bordered shadow-sm mt-2">
        <thead class="table-primary">
            <tr>
                <th>Código</th>
                <th>Número de orden</th>
                <th>Cantidad de pedido</th>
                <th>Precio total</th>
                <th>Fecha de orden</th>
                <th>Cliente</th>
                <th>Acciones</th>
            </tr>
        </thead>
        <tbody>
            {{-- Listado de pedidos --}}
            @foreach ($pedidos as $item)
                <tr>
                    <td>{{ $item->codigo }}</td>
                    <td>{{ $item->numero_orden }}</td>
                    <td>{{ $item->cantidad_pedido }}</td>
                    <td>{{ $item->precio_total }}</td>
                    <td>{{ $item->fecha_orden }}</td>
                    <td>{{ $item->cliente }}</td>
                    <td class="text-center">
                        <a class="btn btn-outline-success btn-sm" href="/pedidos/edit/{{ $item->codigo }}">
                            <i class="fas fa-edit"></i> Modificar
                        </a>
                        <button class="btn btn-outline-danger btn-sm" 
                                onclick="destroy(this)" 
                                url="/pedidos/destroy/{{ $item->codigo }}" 
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
    <script src="{{ asset('js/pedido.js') }}"></script>
@endsection
