<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Tipocomponente extends Model
{
    use HasFactory;

    protected $fillable = [
        'id',
        'tipo_componente',
    ];

    public function componentes(){
        return $this->hasMany(Componente::class, 'tipo_componente_id', 'id');
    }
}
