<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class CicloFormativo extends Model
{
    use HasFactory;
    protected $table = 'ciclos_formativos';

    protected $fillable = [
        "nombre",
        "siglas",
    ];

    /*public function alumnos(){
        return $this->belongsToMany(Alumno::class, 'alumnos_ciclos_formativos', 'ciclo_id', 'alumno_id');
    }*/
}
