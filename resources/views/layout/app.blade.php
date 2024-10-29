<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>@yield('title')</title>
    @vite(['resources/sass/app.scss', 'resources/js/app.js']) 
    <style>
        /* Estilos adicionales para modernizar el diseño */
        body {
            background-color: #f8f9fa; /* Fondo claro para un contraste moderno */
            font-family: 'Arial', sans-serif;
            margin: 0;
            padding: 0;
        }
        .navbar {
            background: linear-gradient(45deg, #343a40, #6c757d); /* Gradiente moderno para la barra de navegación */
        }
        .navbar-brand {
            font-weight: bold;
            color: #f8f9fa;
            font-size: 1.5em;
        }
        .navbar-nav .nav-link {
            color: #e9ecef !important;
            transition: color 0.3s;
        }
        .navbar-nav .nav-link:hover {
            color: #ffc107 !important; /* Color de resaltado moderno */
        }
        .dropdown-menu {
            border-radius: 0.5rem;
            border: none;
            box-shadow: 0px 4px 12px rgba(0, 0, 0, 0.1); /* Sombra moderna para el menú desplegable */
        }
        .container-fluid {
            margin-top: 2rem;
        }
        /* Efecto hover en el menú */
        .nav-item:hover .dropdown-menu {
            display: block;
            opacity: 1;
            transition: opacity 0.3s ease;
        }
    </style>
</head>
<body>
    <!-- Menú de navegación -->
    <nav class="navbar navbar-expand-lg navbar-dark mb-4">
        <div class="container-fluid">
            <a class="navbar-brand" href="#">Restaurante</a>
            <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
            </button>
            <div class="collapse navbar-collapse" id="navbarNav">
                <ul class="navbar-nav ms-auto">
                    <li class="nav-item">
                        <a class="nav-link active" aria-current="page" href="/">Inicio</a>
                    </li>
                    <!-- Dropdown para Clientes -->
                    <li class="nav-item dropdown">
                        <a class="nav-link dropdown-toggle" href="#" role="button" data-bs-toggle="dropdown" aria-expanded="false">
                            Clientes
                        </a>
                        <ul class="dropdown-menu">
                            <li><a class="dropdown-item" href="/clientes/show">Ver</a></li>
                        </ul>
                    </li>
                    <!-- Dropdown para Menús -->
                    <li class="nav-item dropdown">
                        <a class="nav-link dropdown-toggle" href="#" role="button" data-bs-toggle="dropdown" aria-expanded="false">
                            Menús
                        </a>
                        <ul class="dropdown-menu">
                            <li><a class="dropdown-item" href="/menus/show">Menús</a></li>
                            <li><a class="dropdown-item" href="/platos/show">Platos</a></li>
                        </ul>
                    </li>
                    <!-- Dropdown para Ingredientes -->
                    <li class="nav-item dropdown">
                        <a class="nav-link dropdown-toggle" href="#" role="button" data-bs-toggle="dropdown" aria-expanded="false">
                            Ingredientes
                        </a>
                        <ul class="dropdown-menu">
                            <li><a class="dropdown-item" href="/ingredientes/show">Ver</a></li>
                        </ul>
                    </li>
                    <!-- Dropdown para Pedidos -->
                    <li class="nav-item dropdown">
                        <a class="nav-link dropdown-toggle" href="#" role="button" data-bs-toggle="dropdown" aria-expanded="false">
                            Pedidos
                        </a>
                        <ul class="dropdown-menu">
                            <li><a class="dropdown-item" href="/pedidos/show">Pedidos</a></li>
                            <li><a class="dropdown-item" href="/detalle_pedidos/show">Detalle pedidos</a></li>
                        </ul>
                    </li>
                    <!-- Dropdown para Facturas -->
                    <li class="nav-item dropdown">
                        <a class="nav-link dropdown-toggle" href="#" role="button" data-bs-toggle="dropdown" aria-expanded="false">
                            Facturas
                        </a>
                        <ul class="dropdown-menu">
                            <li><a class="dropdown-item" href="/facturas/show">Facturas</a></li>
                            <li><a class="dropdown-item" href="/reporte_ventas/show">Reporte de ventas</a></li>
                        </ul>
                    </li>
                </ul>
            </div>
        </div>
    </nav> 

    <!-- Contenido principal -->
    <div class="container-fluid">
        @yield('content') 
    </div> 

    <!-- Scripts adicionales -->
    @yield('scripts')

</body>
</html>
