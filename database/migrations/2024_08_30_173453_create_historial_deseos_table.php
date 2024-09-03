<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::create('historial_deseos', function (Blueprint $table) {
            $table->id();
            $table->timestamp('obtencion');
            $table->unsignedBigInteger('jugador_id');
            $table->foreign('jugador_id')->references('id')->on('jugadores');
            $table->unsignedBigInteger('personaje_arma_id');
            $table->foreign('personaje_arma_id')->references('id')->on('personajes_armas');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('historial_deseos');
    }
};
