<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Jugador extends Model
{
    use HasFactory;

    protected $table = 'jugadores';

    public function historiales()
    {
       return $this->HasMany(Historial::class);
    }

   public function historial()
    {
        return $this->belongsTo(Historial::class);
    } 
}
