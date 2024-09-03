<?php

namespace App\Http\Controllers;

use App\Models\Historial;
use App\Models\Jugador;
use App\Models\Personaje;
use Illuminate\Database\QueryException;
use Illuminate\Http\Request;

class JugadorController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        //
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        try {
            $jugador = new Jugador();

            $jugador -> nombre = $request -> nombre;
            $jugador -> email = $request -> email;

            if($jugador->save())
            {
                return response()->json(['message' => 'Bienvenido al juego: '.  $jugador -> nombre ],200);
            }
            
        } catch (QueryException $q) {
            return response()->json(['status' => 'fail','message' => 'Error el correo '. $jugador -> email . ' ya fue registrado' ],200);
        }
    }


    public function verHistorial(string $id)
    {
       try {
        $historial = Historial::with('personajeArma')->
                                where('jugador_id', $id)
                                ->get();

       return response()->json(['message' => 'Tu historial de deseos :', 'data' => $historial],200);
       
         if(is_null($historial)|| $historial->empty())
         {
             return response()->json(['message' => 'No hay historial de deseos para este jugador'],404);
         }
       
         
    } catch (\Exception $e) {
           return response()->json(['status' => 'fail', 'message' => 'ocurrio un error inesperado'. $e -> getMessage()],500);
       }
    }
    
    
     

     public function giro10Deseos($jugador_id)
     {

        $arrayPersonajes = [];

        for ($i=0;  $i < 10; $i++) { 
            
            $pjAleatorio = rand(1,115);

            $arrayPersonajes[] = Personaje::find($pjAleatorio);
        }
       
        foreach ($arrayPersonajes as $personaje) {
            Historial::create([
                'obtencion' => now(),
                'jugador_id' => $jugador_id,
                'personaje_arma_id' => $personaje->id,
            ]);
        }
        return response()->json(['message' => 'Historial de deseos guardado con éxito.' , 'data' => $arrayPersonajes]);
     }


   
    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        //
    }
}
