<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Alumno extends Model
{
    use HasFactory;

    protected $fillable = [
        'nre',
        'nombre',
        'apellidos',
        'nif',
        'email',
        'telefono',
    ];

    public function prestamos(){
        return $this->hasMany(Prestamo::class, 'alumno_id', 'id');
    }
}
