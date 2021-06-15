<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class PrestamosComponente extends Model
{
    use HasFactory;

    protected $fillable = [
        'id',
        'activo',
        'componente_id',
        'prestamo_id',
        'tipo_componente_id',
    ];
}
