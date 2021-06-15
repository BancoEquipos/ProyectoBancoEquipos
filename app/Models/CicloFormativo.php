<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Cicloformativo extends Model
{
    use HasFactory;
    protected $table = 'cicloformativos';

    protected $fillable = [
        'id',
        'nombre',
    ];
}
