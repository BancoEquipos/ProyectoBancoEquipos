<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Prestamo extends Model
{
    use HasFactory;

    protected $fillable = [
        "curso",
        "profesor_valida",
        "fecha_validacion",
        "fecha_devolucion",
        "fecha_entrega",
        "fecha_alta_solicitud",
    ];

    public function alumno(){
        return $this->belongsTo(Alumno::class, 'alumno_id', 'id');
    }
}
