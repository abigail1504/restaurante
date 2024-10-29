<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Detalle_pedido extends Model
{
    use HasFactory;

    protected $table = 'detalle_pedidos'; // Nombre de la tabla
    protected $primaryKey = 'codigo'; // Llave primaria de la tabla
    protected $fillable = ['cantidad', 'precio_unitario','subtotal', 'pedido','plato']; // Campos para asignación masiva

}