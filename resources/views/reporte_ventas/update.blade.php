{{-- Heredemos la estructura del archivo app.blade.php --}}
@extends('layout.app')

{{-- Definimos el titulo --}}
@section('title', 'Modificar Reporte de Ventas')

{{-- Definimos el contenido --}}
@section('content')
<h1 class="text-center text-primary">Modificar Reporte de Ventas</h1>
<h5 class="text-muted text-center">Formulario para actualizar datos del reporte de ventas</h5>
<hr class="border-primary">
<div class="container bg-light p-5 shadow-lg rounded">
    <form action="/reporte_ventas/update/{{ $reporte_venta->codigo }}" method="POST">
        @csrf
        @method('PUT')
        <div class="row">
            <div class="col-md-6 mb-3">
                <label for="fecha" class="form-label text-primary">Fecha</label>
                <input type="date" class="form-control border-info shadow-sm" name="fecha" id="fecha" value="{{ old('fecha', $reporte_venta->fecha) }}" required>
                @error('fecha')
                    <span class="invalid-feedback d-block" role="alert">
                        <strong>{{ $message }}</strong>
                    </span>
                @enderror
            </div>
            <div class="col-md-6 mb-3">
                <label for="numero_ventas" class="form-label text-primary">Número de Ventas</label>
                <input type="number" class="form-control border-info shadow-sm" name="numero_ventas" id="numero_ventas" value="{{ old('numero_ventas', $reporte_venta->numero_ventas) }}" required>
                @error('numero_ventas')
                    <span class="invalid-feedback d-block" role="alert">
                        <strong>{{ $message }}</strong>
                    </span>
                @enderror
            </div>
            <div class="col-md-6 mb-3">
                <label for="subtotal" class="form-label text-primary">Subtotal</label>
                <input type="number" class="form-control border-info shadow-sm" name="subtotal" id="subtotal" value="{{ old('subtotal', $reporte_venta->subtotal) }}" required>
                @error('subtotal')
                    <span class="invalid-feedback d-block" role="alert">
                        <strong>{{ $message }}</strong>
                    </span>
                @enderror
            </div>
            <div class="col-md-6 mb-3">
                <label for="impuesto_total" class="form-label text-primary">Impuesto Total</label>
                <input type="number" class="form-control border-info shadow-sm" name="impuesto_total" id="impuesto_total" value="{{ old('impuesto_total', $reporte_venta->impuesto_total) }}" required>
                @error('impuesto_total')
                    <span class="invalid-feedback d-block" role="alert">
                        <strong>{{ $message }}</strong>
                    </span>
                @enderror
            </div>
            <div class="col-md-6 mb-3">
                <label for="total_ventas" class="form-label text-primary">Total de Ventas</label>
                <input type="number" class="form-control border-info shadow-sm" name="total_ventas" id="total_ventas" value="{{ old('total_ventas', $reporte_venta->total_ventas) }}" required>
                @error('total_ventas')
                    <span class="invalid-feedback d-block" role="alert">
                        <strong>{{ $message }}</strong>
                    </span>
                @enderror
            </div>
            <div class="col-md-6 mb-3">
                <label for="ventas_efectivo" class="form-label text-primary">Ventas en Efectivo</label>
                <input type="number" class="form-control border-info shadow-sm" name="ventas_efectivo" id="ventas_efectivo" value="{{ old('ventas_efectivo', $reporte_venta->ventas_efectivo) }}" required>
                @error('ventas_efectivo')
                    <span class="invalid-feedback d-block" role="alert">
                        <strong>{{ $message }}</strong>
                    </span>
                @enderror
            </div>
            <div class="col-md-6 mb-3">
                <label for="ventas_tarjeta" class="form-label text-primary">Ventas con Tarjeta</label>
                <input type="number" class="form-control border-info shadow-sm" name="ventas_tarjeta" id="ventas_tarjeta" value="{{ old('ventas_tarjeta', $reporte_venta->ventas_tarjeta) }}" required>
                @error('ventas_tarjeta')
                    <span class="invalid-feedback d-block" role="alert">
                        <strong>{{ $message }}</strong>
                    </span>
                @enderror
            </div>
            <div class="col-md-6 mb-3">
                <label for="total_efectivo" class="form-label text-primary">Total Efectivo</label>
                <input type="number" class="form-control border-info shadow-sm" name="total_efectivo" id="total_efectivo" value="{{ old('total_efectivo', $reporte_venta->total_efectivo) }}" required>
                @error('total_efectivo')
                    <span class="invalid-feedback d-block" role="alert">
                        <strong>{{ $message }}</strong>
                    </span>
                @enderror
            </div>
            <div class="col-md-6 mb-3">
                <label for="total_tarjeta" class="form-label text-primary">Total Tarjeta</label>
                <input type="number" class="form-control border-info shadow-sm" name="total_tarjeta" id="total_tarjeta" value="{{ old('total_tarjeta', $reporte_venta->total_tarjeta) }}" required>
                @error('total_tarjeta')
                    <span class="invalid-feedback d-block" role="alert">
                        <strong>{{ $message }}</strong>
                    </span>
                @enderror
            </div>
        </div>
        
        <div class="col-12 mt-4 text-center">
            <button type="submit" class="btn btn-outline-primary btn-lg shadow-sm">Guardar</button>
        </div>
    </form>
</div>
@endsection
