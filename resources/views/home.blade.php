{{-- Heredemos la estructura del archivo app.blade.php --}}
@extends('layouts.app')

{{-- Definimos el titulo --}}
@section('title', 'Inicio')

{{-- Definimos el contenido --}}
@section('content')
<style>
        body {
            background-image: url('https://img.bekiacocina.com/articulos/portada/57000/57437.jpg');
            background-size: cover; 
            background-position: center; 
            background-repeat: no-repeat; 
        }
        h1{
            color:white;
            
        }
    </style>

<h1>Nuestro Restaurante</h1>


@endsection
