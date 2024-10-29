{{-- Heredemos la estructura del archivo app.blade.php --}}
@extends('layout.app')

{{-- Definimos el titulo --}}
@section('title', 'Reporte de Ventas')

{{-- Definimos el contenido --}}
@section('content')
    <h1 class="text-center text-primary">Reporte de Ventas</h1>
    <h5 class="text-muted text-center">Listado de Reporte de Ventas</h5>
    <hr class="border-primary">
    
    {{-- Botón para ir al formulario de agregar producto --}}
    <div class="text-end mb-3">
        <a class="btn btn-outline-danger btn-lg" href="/reporte_ventas/create">
            <i class="fas fa-plus-circle"></i> Agregar nuevo reporte de ventas
        </a>
    </div>

    <table class="table table-striped table-bordered shadow-sm mt-2">
        <thead class="table-primary">
            <tr>
                <th>Código</th>
                <th>Fecha</th>
                <th>Número de Ventas</th>
                <th>Subtotal</th>
                <th>Impuesto Total</th>
                <th>Total de Ventas</th>
                <th>Ventas en Efectivo</th>
                <th>Ventas con Tarjeta</th>
                <th>Total Efectivo</th>
                <th>Total Tarjeta</th>
                <th>Acciones</th>
            </tr>
        </thead>
        <tbody>
            {{-- Listado de reportes de ventas --}}
            @foreach ($reporte_ventas as $item)
                <tr>
                    <td>{{ $item->codigo }}</td>
                    <td>{{ $item->fecha }}</td>
                    <td>{{ $item->numero_ventas }}</td>
                    <td>{{ number_format($item->subtotal, 2) }}</td>
                    <td>{{ number_format($item->impuesto_total, 2) }}</td>
                    <td>{{ number_format($item->total_ventas, 2) }}</td>
                    <td>{{ number_format($item->ventas_efectivo, 2) }}</td>
                    <td>{{ number_format($item->ventas_tarjeta, 2) }}</td>
                    <td>{{ number_format($item->total_efectivo, 2) }}</td>
                    <td>{{ number_format($item->total_tarjeta, 2) }}</td>
                    <td class="text-center">
                        <a class="btn btn-outline-success btn-sm" href="/reporte_ventas/edit/{{ $item->codigo }}">
                            <i class="fas fa-edit"></i> Modificar
                        </a>
                        <button class="btn btn-outline-danger btn-sm" 
                                onclick="destroy(this)" 
                                url="/reporte_ventas/destroy/{{ $item->codigo }}" 
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
    <script src="{{ asset('js/reporte_venta.js') }}"></script>
@endsection
