{{-- Heredemos la estructura del archivo app.blade.php --}}
@extends('layout.app')

{{-- Definimos el titulo --}}
@section('title', 'Modificar Menú')

{{-- Definimos el contenido --}}
@section('content')
<h1 class="text-center text-primary">Modificar Menú</h1>
<h5 class="text-muted text-center">Formulario para actualizar datos del menú</h5>
<hr class="border-primary">

<div class="container bg-light p-5 shadow-lg rounded">
    <form action="/menus/update/{{ $menu->codigo }}" method="POST">
        @csrf
        @method('PUT')
        <div class="row">
            <div class="col-md-6 mb-3">
                <label for="nombre" class="form-label text-primary">Nombre</label>
                <input type="text" class="form-control border-info shadow-sm" name="nombre" id="nombre" value="{{ old('nombre', $menu->nombre) }}" required>
                @error('nombre')
                    <span class="invalid-feedback d-block" role="alert">
                        <strong>{{ $message }}</strong>
                    </span>
                @enderror
            </div>
            <div class="col-md-6 mb-3">
                <label for="descripcion" class="form-label text-primary">Descripción</label>
                <input type="text" class="form-control border-info shadow-sm" name="descripcion" id="descripcion" value="{{ old('descripcion', $menu->descripcion) }}" required>
                @error('descripcion')
                    <span class="invalid-feedback d-block" role="alert">
                        <strong>{{ $message }}</strong>
                    </span>
                @enderror
            </div>
            <div class="col-md-6 mb-3">
                <label for="precio" class="form-label text-primary">Precio</label>
                <input type="number" class="form-control border-info shadow-sm" name="precio" id="precio" value="{{ old('precio', $menu->precio) }}" required>
                @error('precio')
                    <span class="invalid-feedback d-block" role="alert">
                        <strong>{{ $message }}</strong>
                    </span>
                @enderror
            </div>
        </div>
        
        <div class="col-12 mt-4 text-center">
            <button class="btn btn-outline-primary btn-lg shadow-sm">Guardar</button>
        </div>
    </form>
</div>
@endsection

