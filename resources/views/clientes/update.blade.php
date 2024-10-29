{{-- Heredemos la estructura del archivo app.blade.php --}}
@extends('layouts.app')

{{-- Definimos el titulo --}}
@section('title', 'Modificar Cliente')

{{-- Definimos el contenido --}}
@section('content')
<h1 class="text-center text-primary">Modificar Cliente</h1>
<h5 class="text-muted text-center">Formulario para actualizar datos del cliente</h5>
<hr class="border-primary">
<div class="container bg-light p-5 shadow-lg rounded">
    <form action="/clientes/update/{{ $cliente->codigo }}" method="POST">
        @csrf
        @method('PUT')
        <div class="row">
            <div class="col-md-6 mb-3">
                <label for="nombre" class="form-label text-primary">Nombre</label>
                <input type="text" class="form-control border-info shadow-sm" name="nombre" id="nombre" value="{{ old('nombre', $cliente->nombre) }}" required>
                @error('nombre')
                    <span class="invalid-feedback d-block" role="alert">
                        <strong>{{ $message }}</strong>
                    </span>
                @enderror
            </div>
            <div class="col-md-6 mb-3">
                <label for="email" class="form-label text-primary">Email</label>
                <input type="email" class="form-control border-info shadow-sm" name="email" id="email" value="{{ old('email', $cliente->email) }}" required>
                @error('email')
                    <span class="invalid-feedback d-block" role="alert">
                        <strong>{{ $message }}</strong>
                    </span>
                @enderror
            </div>
            <div class="col-md-6 mb-3">
                <label for="telefono" class="form-label text-primary">Teléfono</label>
                <input type="number" class="form-control border-info shadow-sm" name="telefono" id="telefono" value="{{ old('telefono', $cliente->telefono) }}" required>
                @error('telefono')
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

