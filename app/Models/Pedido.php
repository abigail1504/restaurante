<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Pedido extends Model
{
    use HasFactory;

    protected $table = 'pedidos'; // Nombre de la tabla
    protected $primaryKey = 'codigo'; // Llave primaria de la tabla
    protected $fillable = ['numero_orden', 'cantidad_pedido','precio_total', 'fecha_orden','cliente']; // Campos para asignación masiva

}