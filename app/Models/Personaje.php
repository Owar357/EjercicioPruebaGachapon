<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Personaje extends Model
{

     protected $table = 'personajes_armas';

    use HasFactory;

    public function Historiales()
    {
        return $this->hasMany(Historial::class);
    }
}
