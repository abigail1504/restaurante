{{-- Heredemos la estructura del archivo app.blade.php --}}
@extends('layout.app')

{{-- Definimos el titulo --}}
@section('title', 'Crear Plato')

{{-- Definimos el contenido --}}
@section('content')
<h1 class="text-center text-primary">Crear Plato</h1>
<h5 class="text-muted text-center">Formulario para registrar un nuevo plato</h5>
<hr class="border-primary">
<div class="container bg-light p-5 shadow-lg rounded">
    <form action="/platos/store" method="POST">
        @csrf
        <div class="row">
            <div class="col-md-6 mb-3">
                <label for="nombre" class="form-label text-primary">Nombre</label>
                <input type="text" class="form-control border-info shadow-sm" name="nombre" id="nombre" placeholder="Ingrese el nombre del plato" required>
                @error('nombre')
                    <span class="invalid-feedback d-block" role="alert">
                        <strong>{{ $message }}</strong>
                    </span>
                @enderror
            </div>
            
            <div class="col-md-6 mb-3">
                <label for="precio" class="form-label text-primary">Precio</label>
                <input type="number" class="form-control border-info shadow-sm" name="precio" id="precio" placeholder="Ingrese el precio" required>
                @error('precio')
                    <span class="invalid-feedback d-block" role="alert">
                        <strong>{{ $message }}</strong>
                    </span>
                @enderror
            </div>

            <div class="col-md-6 mb-3">
                <label for="descripcion" class="form-label text-primary">Descripción</label>
                <input type="text" class="form-control border-info shadow-sm" name="descripcion" id="descripcion" placeholder="Descripción breve del plato" required>
                @error('descripcion')
                    <span class="invalid-feedback d-block" role="alert">
                        <strong>{{ $message }}</strong>
                    </span>
                @enderror
            </div>
        </div>
        
        <div class="col-12 mb-4">
            <label for="menu" class="form-label text-primary">Menú</label>
            <select name="menu" id="menu" class="form-control border-info shadow-sm" required>
                @foreach ($menus as $item)
                    <option value="{{ $item->codigo }}">{{ $item->nombre }}</option>
                @endforeach
            </select>
            @error('menu')
                <span class="invalid-feedback d-block" role="alert">
                    <strong>{{ $message }}</strong>
                </span>
            @enderror
        </div>
        
        <div class="col-12 text-center mt-4">
            <button type="submit" class="btn btn-outline-primary btn-lg shadow-sm">Guardar</button>
        </div>
    </form>
</div>
@endsection
