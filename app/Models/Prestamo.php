<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class Prestamo extends Model
{
    use HasFactory;

    protected $fillable = [
        "id",
        "curso",
        "profesor_valida",
        "alta_solicitud",
        "fecha_valida",
        "fecha_fin",
        "fecha_devolucion",
        "fecha_envio",
        'motivo_id',
        'alumno_id',
        'domicilio_id',
        'curso_id',
        'ciclo_formativo_id'
    ];

    public function alumno(){
        return $this->belongsTo(Alumno::class, 'alumno_id', 'id');
    }

    public function tipocomponente(){
        return $this->belongsToMany(Tipocomponente::class, 'prestamos_componentes', 'prestamo_id', 'tipo_componente_id');
    }

    public function motivo(){
        return $this->belongsTo(Motivo::class, 'motivo_id', 'id');
    }

    public function domicilio(){
        return $this->belongsTo(Domicilio::class, 'domicilio_id', 'id');
    }

    public function ciclo_formativo(){
        return $this->belongsTo(Cicloformativo::class, 'ciclo_formativo_id', 'id');
    }

    public function componentes(){
        return $this->belongsToMany(Componente::class, 'prestamos_componentes', 'prestamo_id', 'componente_id');
    }
}
