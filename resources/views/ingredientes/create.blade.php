{{-- Heredemos la estructura del archivo app.blade.php --}}
@extends('layout.app')

{{-- Definimos el titulo --}}
@section('title', 'Crear Ingredientes')

{{-- Definimos el contenido --}}
@section('content')
<h1 class="text-center text-primary">Crear Ingrediente</h1>
<h5 class="text-muted text-center">Formulario para registrar un nuevo ingrediente</h5>
<hr class="border-primary">
<div class="container bg-light p-5 shadow-lg rounded">
    <form action="/ingredientes/store" method="POST">
        @csrf
        <div class="row">
            <div class="col-md-6 mb-3">
                <label for="nombre" class="form-label text-primary">Nombre</label>
                <input type="text" class="form-control border-info shadow-sm" name="nombre" id="nombre" placeholder="Ingrese nombre">
                @error('nombre')
                    <span class="invalid-feedback d-block" role="alert">
                        <strong>{{ $message }}</strong>
                    </span>
                @enderror
            </div>
            <div class="col-md-6 mb-3">
                <label for="descripcion" class="form-label text-primary">Descripción</label>
                <input type="text" class="form-control border-info shadow-sm" name="descripcion" id="descripcion" placeholder="Ingrese descripción">
                @error('descripcion')
                    <span class="invalid-feedback d-block" role="alert">
                        <strong>{{ $message }}</strong>
                    </span>
                @enderror
            </div>
        </div>

        <div class="col-12 mt-3">
            <label for="plato" class="form-label text-primary">Plato</label>
            <select name="plato" id="plato" class="form-control border-info shadow-sm">
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
