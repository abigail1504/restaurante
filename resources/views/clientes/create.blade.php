@extends('layouts.app')

@section('title', 'Clientes')

@section('content')
<h1 class="text-center text-info">Crear Cliente</h1>
<h5 class="text-muted text-center">Formulario para registrar nuevos clientes</h5>
<hr class="border-info">
<div class="container bg-light p-5 shadow-lg rounded">
    <form action="/clientes/store" method="POST">
        @csrf
        <div class="row">
            <div class="col-md-6 mb-3">
                <label for="nombre" class="form-label text-primary">Nombre</label>
                <input type="text" class="form-control border-info shadow-sm @error('nombre') is-invalid @enderror" name="nombre" id="nombre" placeholder="Ingrese nombre">
                @error('nombre')
                    <span class="invalid-feedback d-block" role="alert">
                        <strong>{{ $message }}</strong>
                    </span>
                @enderror
            </div>
            <div class="col-md-6 mb-3">
                <label for="email" class="form-label text-primary">Email</label>
                <input type="email" class="form-control border-info shadow-sm @error('email') is-invalid @enderror" name="email" id="email" placeholder="Ingrese email">
                @error('email')
                    <span class="invalid-feedback d-block" role="alert">
                        <strong>{{ $message }}</strong>
                    </span>
                @enderror
            </div>
            <div class="col-md-6 mb-3">
                <label for="telefono" class="form-label text-primary">Teléfono</label>
                <input type="number" class="form-control border-info shadow-sm @error('telefono') is-invalid @enderror" name="telefono" id="telefono" placeholder="Ingrese teléfono">
                @error('telefono')
                    <span class="invalid-feedback d-block" role="alert">
                        <strong>{{ $message }}</strong>
                    </span>
                @enderror
            </div>
        </div>
        
        <div class="col-12 mt-4 text-center">
            <button type="submit" class="btn btn-outline-info btn-lg shadow-sm">Guardar</button>
        </div>
    </form>
</div>
@endsection

