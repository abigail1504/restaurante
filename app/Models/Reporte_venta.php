<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Reporte_venta extends Model
{
    use HasFactory;

    protected $table = 'reporte_ventas'; // Nombre de la tabla
    protected $primaryKey = 'codigo'; // Llave primaria de la tabla
    protected $fillable = ['fecha','numero_ventas','subtotal', 'impuesto_total','total_ventas','ventas_efectivo','ventas_tarjeta','total_efectivo','total_tarjeta']; // Campos para asignación masiva

}