{{-- Heredemos la estructura del archivo app.blade.php --}}
@extends('layout.app')

{{-- Definimos el titulo --}}
@section('title', 'Crear Detalle de Pedidos')

{{-- Definimos el contenido --}}
@section('content')
<h1 class="text-center text-primary">Crear Detalle de Pedido</h1>
<h5 class="text-muted text-center">Formulario para crear un detalle de pedido</h5>
<hr class="border-primary">
<div class="container bg-light p-5 shadow-lg rounded">
    <form action="/detalle_pedidos/store" method="POST">
        @csrf
        <div class="row">
            <div class="col-md-6 mb-3">
                <label for="cantidad" class="form-label text-primary">Cantidad</label>
                <input type="number" class="form-control border-info shadow-sm" name="cantidad" id="cantidad" required>
                @error('cantidad')
                    <span class="invalid-feedback d-block" role="alert">
                        <strong>{{ $message }}</strong>
                    </span>
                @enderror
            </div>

            <div class="col-md-6 mb-3">
                <label for="precio_unitario" class="form-label text-primary">Precio Unitario</label>
                <input type="number" class="form-control border-info shadow-sm" name="precio_unitario" id="precio_unitario" required>
                @error('precio_unitario')
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
        </div>

        <div class="col-12 mt-3">
            <label for="pedido" class="form-label text-primary">Pedido</label>
            <select name="pedido" id="pedido" class="form-control border-info shadow-sm" required>
                @foreach ($pedidos as $item)
                    <option value="{{ $item->codigo }}">{{ $item->nombre }}</option>
                @endforeach
            </select>
            @error('pedido')
                <span class="invalid-feedback d-block" role="alert">
                    <strong>{{ $message }}</strong>
                </span>
            @enderror
        </div>

        <div class="col-12 mt-3">
            <label for="plato" class="form-label text-primary">Plato</label>
            <select name="plato" id="plato" class="form-control border-info shadow-sm" required>
                @foreach ($platos as $item)
                    <option value="{{ $item->codigo }}">{{ $item->nombre }}</option>
                @endforeach
            </select>
            @error('plato')
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
