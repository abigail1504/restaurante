<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\ClienteController;
use App\Http\Controllers\MenuController;
use App\Http\Controllers\PlatoController;
use App\Http\Controllers\PedidoController;
use App\Http\Controllers\Detalle_pedidoController;
use App\Http\Controllers\IngredienteController;
use App\Http\Controllers\FacturaController;
use App\Http\Controllers\Reporte_ventaController;
use App\Http\Controllers\ReportController;

Route::get('/home', function () {   return view('home'); });  


//clientes  
Route::get('/clientes/show', [ClienteController::class, 'index']);

// Ruta para mostrar la vista create.blade.php
Route::get('/clientes/create', [ClienteController::class, 'create']);

// Ruta para mostrar la vista update.blade.php
Route::get('/clientes/edit/{cliente}', [ClienteController::class, 'edit']);

// Ruta para insertar plato
Route::post('/clientes/store', [ClienteController::class, 'store']);

// Ruta para modificar plato
Route::put('/clientes/update/{cliente}', [ClienteController::class, 'update']);

// Ruta para eliminar pedido
Route::delete('/clientes/destroy/{id}', [ClienteController::class, 'destroy']);


//menus
Route::get('/menus/show', [MenuController::class, 'index']);

// Ruta para mostrar la vista create.blade.php
Route::get('/menus/create', [MenuController::class, 'create']);

// Ruta para mostrar la vista update.blade.php
Route::get('/menus/edit/{menu}', [MenuController::class, 'edit']);

// Ruta para insertar menu
Route::post('/menus/store', [MenuController::class, 'store']);

// Ruta para modificar menu
Route::put('/menus/update/{menu}', [MenuController::class, 'update']);

// Ruta para eliminar menu
Route::delete('/menus/destroy/{id}', [MenuController::class, 'destroy']);


Route::get('/platos/show', [PlatoController::class, 'index']);

// Ruta para mostrar la vista create.blade.php
Route::get('/platos/create', [PlatoController::class, 'create']);

// Ruta para mostrar la vista update.blade.php
Route::get('/platos/edit/{plato}', [PlatoController::class, 'edit']);

// Ruta para insertar plato
Route::post('/platos/store', [PlatoController::class, 'store']);

// Ruta para modificar plato
Route::put('/platos/update/{plato}', [PlatoController::class, 'update']);

// Ruta para eliminar plato
Route::delete('/platos/destroy/{id}', [PlatoController::class, 'destroy']);


//pedido
//Route::get('/pedidos/show', [PedidoController::class, 'index']);
Route::get('/pedidos/show', [PedidoController::class, 'index']);

// Ruta para mostrar la vista create.blade.php
Route::get('/pedidos/create', [PedidoController::class, 'create']);

// Ruta para mostrar la vista update.blade.php
Route::get('/pedidos/edit/{pedido}', [PedidoController::class, 'edit']);

// Ruta para insertar plato
Route::post('/pedidos/store', [PedidoController::class, 'store']);

// Ruta para modificar plato
Route::put('/pedidos/update/{pedido}', [PedidoController::class, 'update']);

// Ruta para eliminar pedido
Route::delete('/pedidos/destroy/{id}', [PedidoController::class, 'destroy']);



//detalle pedido
Route::get('/detalle_pedidos/show', [Detalle_pedidoController::class, 'index']);

// Ruta para mostrar la vista create.blade.php
Route::get('/detalle_pedidos/create', [Detalle_pedidoController::class, 'create']);

// Ruta para mostrar la vista update.blade.php
Route::get('/detalle_pedidos/edit/{detalle_pedido}', [Detalle_pedidoController::class, 'edit']);

// Ruta para insertar plato
Route::post('/detalle_pedidos/store', [Detalle_pedidoController::class, 'store']);

// Ruta para modificar plato
Route::put('/detalle_pedidos/update/{detalle_pedido}', [Detalle_pedidoController::class, 'update']);

// Ruta para eliminar pedido
Route::delete('/detalle_pedidos/destroy/{id}', [Detalle_pedidoController::class, 'destroy']);



//ingrediente
Route::get('/ingredientes/show', [IngredienteController::class, 'index']);

// Ruta para mostrar la vista create.blade.php
Route::get('/ingredientes/create', [IngredienteController::class, 'create']);

// Ruta para mostrar la vista update.blade.php
Route::get('/ingredientes/edit/{ingrediente}', [IngredienteController::class, 'edit']);

// Ruta para insertar plato
Route::post('/ingredientes/store', [IngredienteController::class, 'store']);

// Ruta para modificar plato
Route::put('/ingredientes/update/{ingrediente}', [IngredienteController::class, 'update']);

// Ruta para eliminar pedido
Route::delete('/ingredientes/destroy/{id}', [IngredienteController::class, 'destroy']);



//factura
Route::get('/facturas/show', [FacturaController::class, 'index']);

// Ruta para mostrar la vista create.blade.php
Route::get('/facturas/create', [FacturaController::class, 'create']);

// Ruta para mostrar la vista update.blade.php
Route::get('/facturas/edit/{factura}', [FacturaController::class, 'edit']);

// Ruta para insertar plato
Route::post('/facturas/store', [FacturaController::class, 'store']);

// Ruta para modificar plato
Route::put('/facturas/update/{factura}', [FacturaController::class, 'update']);

// Ruta para eliminar pedido
Route::delete('/facturas/destroy/{id}', [FacturaController::class, 'destroy']);


//reporte de ventas
Route::get('/reporte_ventas/show', [Reporte_ventaController::class, 'index']);

// Ruta para mostrar la vista create.blade.php
Route::get('/reporte_ventas/create', [Reporte_ventaController::class, 'create']);

// Ruta para mostrar la vista update.blade.php
Route::get('/reporte_ventas/edit/{reporte_venta}', [Reporte_ventaController::class, 'edit']);

// Ruta para insertar plato
Route::post('/reporte_ventas/store', [Reporte_ventaController::class, 'store']);

// Ruta para modificar plato
Route::put('/reporte_ventas/update/{reporte_venta}', [Reporte_ventaController::class, 'update']);

// Ruta para eliminar pedido
Route::delete('/reporte_ventas/destroy/{id}', [Reporte_ventaController::class, 'destroy']);

// Ruta para reporte  
Route::get('/reporte', [ReportController::class,'reporteUno']);  



Auth::routes();

Route::get('/', [App\Http\Controllers\HomeController::class, 'index'])->name('home');
