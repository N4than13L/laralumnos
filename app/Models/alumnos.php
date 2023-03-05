<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Alumnos extends Model
{
    use HasFactory;
    // desactivar el tiempo.
    public $timestamps = false;
    // crear campos protegidos de la tabla.
    protected $fillable = [
        "nombre", "apellido", "edad", "cuota", "correo",  "curso_id",
        "curso_clasificacion_id",
        "padre_tutor_id"
    ];
}
