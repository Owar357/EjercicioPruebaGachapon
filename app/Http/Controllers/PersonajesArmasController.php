<?php

namespace App\Http\Controllers;

use App\Models\Personaje;
use Illuminate\Http\Request;

class PersonajesArmasController extends Controller
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
         $PersonajeA = new Personaje();

         $PersonajeA -> nombre = $request -> nombre;
         $PersonajeA -> rareza = $request -> rareza;
          if($PersonajeA->save())
          {
            return response()->json(["status" => "ok", "data" => $PersonajeA, 'message' => 'Personaje creado'],201); 
          }

         } catch (\Exception $e) {
            return $e-> getMessage();
         }
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
