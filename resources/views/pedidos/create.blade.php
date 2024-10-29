{{-- Heredemos la estructura del archivo app.blade.php --}}
@extends('layout.app')

{{-- Definimos el titulo --}}
@section('title', 'Crear Pedido')

{{-- Definimos el contenido --}}
@section('content')
<h1 class="text-center text-primary">Crear Pedido</h1>
<h5 class="text-muted text-center">Formulario para crear nuevos pedidos</h5>
<hr class="border-primary">
<div class="container bg-light p-5 shadow-lg rounded">
    <form action="/pedidos/store" method="POST">
        @csrf
        <div class="row">
            <div class="col-md-6 mb-3">
                <label for="numero_orden" class="form-label text-primary">Número de Orden</label>
                <input type="number" class="form-control border-info shadow-sm" name="numero_orden" id="numero_orden" required>
                @error('numero_orden')
                    <span class="invalid-feedback d-block" role="alert">
                        <strong>{{ $message }}</strong>
                    </span>
                @enderror
            </div>

            <div class="col-md-6 mb-3">
                <label for="cantidad_pedido" class="form-label text-primary">Cantidad de Pedido</label>
                <input type="number" class="form-control border-info shadow-sm" name="cantidad_pedido" id="cantidad_pedido" required>
                @error('cantidad_pedido')
                    <span class="invalid-feedback d-block" role="alert">
                        <strong>{{ $message }}</strong>
                    </span>
                @enderror
            </div>

            <div class="col-md-6 mb-3">
                <label for="precio_total" class="form-label text-primary">Precio Total</label>
                <input type="number" class="form-control border-info shadow-sm" name="precio_total" id="precio_total" required>
                @error('precio_total')
                    <span class="invalid-feedback d-block" role="alert">
                        <strong>{{ $message }}</strong>
                    </span>
                @enderror
            </div>

            <div class="col-md-6 mb-3">
                <label for="fecha_orden" class="form-label text-primary">Fecha de Orden</label>
                <input type="date" class="form-control border-info shadow-sm" name="fecha_orden" id="fecha_orden" required>
                @error('fecha_orden')
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
