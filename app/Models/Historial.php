<?php

namespace App\Models;

use Carbon\Carbon;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Historial extends Model
{
    use HasFactory;

    protected $table = 'historial_deseos';

    protected $fillable = [
      'obtencion',
      'jugador_id',
      'personaje_arma_id' 
  ];


    protected static function boot()
    {
        parent::boot();

        static::creating(function($model){
            $model -> obtencion = Carbon::now()->timezone('America/El_Salvador');
        });
    }

   public function jugador()
   {
       return $this->belongsTo(Jugador::class);
   }

   public function personajeArma()
   {
     return $this->belongsTo(Personaje::class);
   }


   public function jugadores()
   {
     return $this->hasMany(Jugador::class);
   }

   
}

