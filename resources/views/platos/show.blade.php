{{-- Heredemos la estructura del archivo app.blade.php --}}
@extends('layout.app')

{{-- Definimos el titulo --}}
@section('title', 'Platos')

{{-- Definimos el contenido --}}
@section('content')
    <h1 class="text-center text-primary">Platos</h1>
    <h5 class="text-muted text-center">Listado de platos disponibles</h5>
    <hr class="border-primary">
    
    {{-- Botón para ir al formulario de agregar plato --}}
    <div class="text-end mb-3">
        <a class="btn btn-outline-primary btn-lg" href="/platos/create">
            <i class="fas fa-plus-circle"></i> Agregar nuevo plato
        </a>
    </div>

    <table class="table table-striped table-bordered shadow-sm mt-2">
        <thead class="table-primary">
            <tr>
                <th>Código</th>
                <th>Nombre</th>
                <th>Precio</th>
                <th>Descripción</th>
                <th>Menú</th>
                <th>Acciones</th>
            </tr>
        </thead>
        <tbody>
            {{-- Listado de platos --}}
            @foreach ($platos as $item)
                <tr>
                    <td>{{ $item->codigo }}</td>
                    <td>{{ $item->nombre }}</td>
                    <td>{{ $item->precio }}</td>
                    <td>{{ $item->descripcion }}</td>
                    <td>{{ $item->menu }}</td>
                    <td class="text-center">
                        <a class="btn btn-outline-success btn-sm" href="/platos/edit/{{ $item->codigo }}">
                            <i class="fas fa-edit"></i> Modificar
                        </a>
                        <button class="btn btn-outline-danger btn-sm" 
                                onclick="destroy(this)" 
                                url="/platos/destroy/{{ $item->codigo }}" 
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
    <script src="{{ asset('js/plato.js') }}"></script>
@endsection
