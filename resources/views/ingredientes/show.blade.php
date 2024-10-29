{{-- Heredemos la estructura del archivo app.blade.php --}}
@extends('layout.app')

{{-- Definimos el titulo --}}
@section('title', 'Ingredientes')

{{-- Definimos el contenido --}}
@section('content')
    <h1 class="text-center text-primary">Ingredientes</h1>
    <h5 class="text-muted text-center">Listado de ingredientes disponibles</h5>
    <hr class="border-primary">

    {{-- Botón para ir al formulario de agregar ingrediente --}}
    <div class="text-end mb-3">
        <a class="btn btn-outline-primary btn-lg" href="/ingredientes/create">
            <i class="fas fa-plus-circle"></i> Agregar nuevo ingrediente
        </a>
    </div>

    <table class="table table-striped table-bordered shadow-sm mt-2">
        <thead class="table-primary">
            <tr>
                <th>Código</th>
                <th>Nombre</th>
                <th>Descripción</th>
                <th>Plato</th>
                <th>Acciones</th>
            </tr>
        </thead>
        <tbody>
            {{-- Listado de ingredientes --}}
            @foreach ($ingredientes as $item)
                <tr>
                    <td>{{ $item->codigo }}</td>
                    <td>{{ $item->nombre }}</td>
                    <td>{{ $item->descripcion }}</td>
                    <td>{{ $item->plato }}</td>
                    <td class="text-center">
                        <a class="btn btn-outline-success btn-sm" href="/ingredientes/edit/{{ $item->codigo }}">
                            <i class="fas fa-edit"></i> Modificar
                        </a>
                        <button class="btn btn-outline-danger btn-sm" 
                                onclick="destroy(this)" 
                                url="/ingredientes/destroy/{{ $item->codigo }}" 
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
    <script src="{{ asset('js/ingrediente.js') }}"></script>
@endsection
