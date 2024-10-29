<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Plato extends Model
{
    use HasFactory;

    protected $table = 'platos'; // Nombre de la tabla
    protected $primaryKey = 'codigo'; // Llave primaria de la tabla
    protected $fillable = ['nombre', 'precio', 'descripcion','menu']; // Campos para asignación masiva

}