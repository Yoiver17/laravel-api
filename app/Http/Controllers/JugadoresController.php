<?php

namespace App\Http\Controllers;

use App\Models\Jugadores;
use Illuminate\Http\Request;

class JugadoresController extends Controller
{
    public function create(Request $request){
        Jugadores::create([
          
        "nombre" => $request->nombre,
        "nickname" => $request->nickname,
        "correo" => $request->correo,
        "pais" => $request->pais,
        ]);  
        return response()->json([
            "message" => "Guardado exitosamente"
        ],201);
    }

    public function update(Request $request, Jugadores $jugador){
        $jugador->update([ 
        "nombre" => $request->nombre,
        "nickname" => $request->nickname,
        "correo" => $request->correo,
        "pais" => $request->pais,
        ]);  
        return response()->json([
            "message" => "Actualizado exitosamente"
        ],200);


    }
    
}
