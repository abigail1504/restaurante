{{-- Heredemos la estructura del archivo app.blade.php --}}
@extends('layout.app')

{{-- Definimos el titulo --}}
@section('title', 'Crear Factura')

{{-- Definimos el contenido --}}
@section('content')
<h1 class="text-center text-primary">Crear Factura</h1>
<h5 class="text-muted text-center">Formulario para crear facturas</h5>
<hr class="border-primary">
<div class="container bg-light p-5 shadow-lg rounded">
    <form action="/facturas/store" method="POST">
        @csrf
        <div class="row">
            <div class="col-md-6 mb-3">
                <label for="numero_factura" class="form-label text-primary">Número de Factura</label>
                <input type="number" class="form-control border-info shadow-sm" name="numero_factura" id="numero_factura" required>
                @error('numero_factura')
                    <span class="invalid-feedback d-block" role="alert">
                        <strong>{{ $message }}</strong>
                    </span>
                @enderror
            </div>

            <div class="col-md-6 mb-3">
                <label for="fecha" class="form-label text-primary">Fecha</label>
                <input type="date" class="form-control border-info shadow-sm" name="fecha" id="fecha" required>
                @error('fecha')
                    <span class="invalid-feedback d-block" role="alert">
                        <strong>{{ $message }}</strong>
                    </span>
                @enderror
            </div>

            <div class="col-md-6 mb-3">
                <label for="subtotal" class="form-label text-primary">Subtotal</label>
                <input type="number" class="form-control border-info shadow-sm" name="subtotal" id="subtotal" required>
                @error('subtotal')
                    <span class="invalid-feedback d-block" role="alert">
                        <strong>{{ $message }}</strong>
                    </span>
                @enderror
            </div>

            <div class="col-md-6 mb-3">
                <label for="impuesto" class="form-label text-primary">Impuesto</label>
                <input type="number" class="form-control border-info shadow-sm" name="impuesto" id="impuesto" required>
                @error('impuesto')
                    <span class="invalid-feedback d-block" role="alert">
                        <strong>{{ $message }}</strong>
                    </span>
                @enderror
            </div>

            <div class="col-md-6 mb-3">
                <label for="total" class="form-label text-primary">Total</label>
                <input type="number" class="form-control border-info shadow-sm" name="total" id="total" required>
                @error('total')
                    <span class="invalid-feedback d-block" role="alert">
                        <strong>{{ $message }}</strong>
                    </span>
                @enderror
            </div>

            <div class="col-md-6 mb-3">
                <label for="metodo_pago" class="form-label text-primary">Método de Pago</label>
                <input type="text" class="form-control border-info shadow-sm" name="metodo_pago" id="metodo_pago" required>
                @error('metodo_pago')
                    <span class="invalid-feedback d-block" role="alert">
                        <strong>{{ $message }}</strong>
                    </span>
                @enderror
            </div>

            <div class="col-md-6 mb-3">
                <label for="estado" class="form-label text-primary">Estado</label>
                <input type="text" class="form-control border-info shadow-sm" name="estado" id="estado" required>
                @error('estado')
                    <span class="invalid-feedback d-block" role="alert">
                        <strong>{{ $message }}</strong>
                    </span>
                @enderror
            </div>
        </div>

        <div class="col-12 mt-3">
            <label for="cliente" class="form-label text-primary">Cliente</label>
            <select name="cliente" id="cliente" class="form-control border-info shadow-sm" required>
                @foreach ($clientes as $item)
                    <option value="{{ $item->codigo }}">{{ $item->nombre }}</option>
                @endforeach
            </select>
            @error('cliente')
                <span class="invalid-feedback d-block" role="alert">
                    <strong>{{ $message }}</strong>
                </span>
            @enderror
        </div>

        <div class="col-12 mt-4 text-center">
            <button type="submit" class="btn btn-outline-primary btn-lg shadow-sm">Guardar</button>
        </div>
    </form>
</div>
@endsection
