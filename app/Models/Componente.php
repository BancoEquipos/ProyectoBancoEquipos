<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class Componente extends Model
{
    use HasFactory;
    protected $primaryKey = 'componente_id';

    protected $fillable = [
        'componente_id',
        'n_serie',
        'tipo_componente_id',
    ];

    public function tipo_componente(){
        return $this->belongsTo(Tipocomponente::class, 'tipo_componente_id', 'id');
    }
}
