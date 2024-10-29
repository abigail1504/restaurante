<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Ingrediente extends Model
{
    use HasFactory;

    protected $table = 'ingredientes'; // Nombre de la tabla
    protected $primaryKey = 'codigo'; // Llave primaria de la tabla
    protected $fillable = ['nombre','descripcion','plato']; // Campos para asignación masiva

}