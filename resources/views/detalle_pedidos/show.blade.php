{{-- Heredemos la estructura del archivo app.blade.php --}}
@extends('layout.app')

{{-- Definimos el titulo --}}
@section('title', 'Detalle de Pedidos')

{{-- Definimos el contenido --}}
@section('content')
    <h1 class="text-center text-primary">Detalle de Pedidos</h1>
    <h5 class="text-muted text-center">Listado de detalles de pedidos</h5>
    <hr class="border-primary">
    
    {{-- Botón para ir al formulario de agregar producto --}}
    <div class="text-end mb-3">
        <a class="btn btn-outline-danger btn-lg" href="/detalle_pedidos/create">
            <i class="fas fa-plus-circle"></i> Agregar nuevo pedido
        </a>
    </div>

    <table class="table table-striped table-bordered shadow-sm mt-2">
        <thead class="table-primary">
            <tr>
                <th>Código</th>
                <th>Cantidad</th>
                <th>Precio Unitario</th>
                <th>Subtotal</th>
                <th>Pedido</th>
                <th>Plato</th>
                <th>Acciones</th>
            </tr>
        </thead>
        <tbody>
            {{-- Listado de detalles de pedidos --}}
            @foreach ($detalle_pedidos as $item)
                <tr>
                    <td>{{ $item->codigo }}</td>
                    <td>{{ $item->cantidad }}</td>
                    <td>{{ number_format($item->precio_unitario, 2) }}</td>
                    <td>{{ number_format($item->subtotal, 2) }}</td>
                    <td>{{ $item->pedido }}</td>
                    <td>{{ $item->plato }}</td>
                    <td class="text-center">
                        <a class="btn btn-outline-success btn-sm" href="/detalle_pedidos/edit/{{ $item->codigo }}">
                            <i class="fas fa-edit"></i> Modificar
                        </a>
                        <button class="btn btn-outline-danger btn-sm" 
                                onclick="destroy(this)" 
                                url="/detalle_pedidos/destroy/{{ $item->codigo }}" 
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
    <script src="{{ asset('js/detalle_pedido.js') }}"></script>
@endsection
