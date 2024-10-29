{{-- Heredemos la estructura del archivo app.blade.php --}}
@extends('layout.app')

{{-- Definimos el titulo --}}
@section('title', 'Menús')

{{-- Definimos el contenido --}}
@section('content')
<h1 class="text-center text-primary">Menús</h1>
<h5 class="text-muted text-center">Listado de Menús Disponibles</h5>
<hr class="border-primary">

{{-- Botón para ir al formulario de agregar menús --}}
<div class="text-end mb-3">
    <a class="btn btn-outline-primary btn-lg" href="/menus/create">
        <i class="fas fa-plus-circle"></i> Agregar nuevo menú
    </a>
</div>

<table class="table table-striped table-bordered shadow-sm mt-2">
    <thead class="table-primary">
        <tr>
            <th>Código</th>
            <th>Nombre</th>
            <th>Descripción</th>
            <th>Precio</th>
            <th>Acciones</th>
        </tr>
    </thead>
    <tbody>
        {{-- Listado de menús --}}
        @foreach ($menus as $item)
            <tr>
                <td>{{ $item->codigo }}</td>
                <td>{{ $item->nombre }}</td>
                <td>{{ $item->descripcion }}</td>
                <td>{{ $item->precio }}</td>
                <td class="text-center">
                    <a class="btn btn-outline-success btn-sm" href="/menus/edit/{{ $item->codigo }}">
                        <i class="fas fa-edit"></i> Modificar
                    </a>
                    <button class="btn btn-outline-danger btn-sm" 
                            onclick="destroy(this)" 
                            url="/menus/destroy/{{ $item->codigo }}" 
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
    <script src="{{ asset('js/menu.js') }}"></script>
@endsection
