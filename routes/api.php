<?php

use App\Http\Controllers\HistorialDeseosController;
use App\Http\Controllers\JugadorController;
use App\Http\Controllers\PersonajesArmasController;
use App\Models\Historial;
use App\Models\Jugador;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

Route::get('/user', function (Request $request) {
    return $request->user();
})->middleware('auth:sanctum');



Route::get('/historial/{id}',[JugadorController::class,'verHistorial']);

Route::get('/giro/{jugadorid}',[JugadorController::class,'giro10Deseos']);

Route::resource('/jugador', JugadorController::class);

Route::resource('/Ingresar', PersonajesArmasController::class);
