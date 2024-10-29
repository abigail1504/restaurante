{{-- Heredemos la estructura del archivo app.blade.php --}}
@extends('layouts.app')

{{-- Definimos el titulo --}}
@section('title', 'Clientes')

{{-- Definimos el contenido --}}
@section('content')
    <h1 class="text-center text-primary">Clientes</h1>
    <h5 class="text-muted text-center">Listado de clientes registrados</h5>
    <hr class="border-primary">
    
    {{-- Botón para ir al formulario de agregar cliente --}}
    <div class="text-end mb-3">
        <a class="btn btn-outline-primary btn-lg" href="/clientes/create">
            <i class="fas fa-plus-circle"></i> Agregar nuevo cliente
        </a>
        <a class="btn btn-outline-primary btn-lg" href="/reporte">
            <i class="fas fa-plus-circle"></i> Reporte de clientes
        </a>
    </div>

    <table class="table table-striped table-bordered shadow-sm mt-2">
        <thead class="table-primary">
            <tr>
                <th>Código</th>
                <th>Nombre</th>
                <th>Email</th>
                <th>Teléfono</th>
                <th>Acciones</th>
            </tr>
        </thead>
        <tbody>
            {{-- Listado de clientes --}}
            @foreach ($clientes as $item)
                <tr>
                    <td>{{ $item->codigo }}</td>
                    <td>{{ $item->nombre }}</td>
                    <td>{{ $item->email }}</td>
                    <td>{{ $item->telefono }}</td>
                    <td class="text-center">
                        <a class="btn btn-outline-success btn-sm" href="/clientes/edit/{{ $item->codigo }}">
                            <i class="fas fa-edit"></i> Modificar
                        </a>
                        <button class="btn btn-outline-danger btn-sm" 
                                onclick="destroy(this)" 
                                url="/clientes/destroy/{{ $item->codigo }}" 
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
    <script src="{{ asset('js/cliente.js') }}"></script>
@endsection
