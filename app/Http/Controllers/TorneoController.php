<?php

namespace App\Http\Controllers;

use App\Models\Equipos;
use App\Models\VideoJuego;
use Illuminate\Http\Request;
use App\Models\Torneo;
class TorneoController extends Controller
{
    public function create(Request $request) {
        $torneo=Torneo::create([
            "nombre" => $request->nombre,
            "premio" => $request->premio,
            "fecha_inicio"=> $request->fecha_inicio,
            "fecha_fin"=> $request->fecha_fin,
            "limite_equipos" => $request->limite_equipos,
            "modalidad" => $request->modalidad,
        ]);
             
             $torneo->videojuego()->associate($request->videojuego);
             $torneo->save();
        return response()->json([
            "message" => "Torneo Guardado Exitosamente!"
        ], 201);
    }

    public function createWithGame(Request $request, $idVideoJuego){
        
        $videojuego = VideoJuego::find($idVideoJuego);
        $torneo = new Torneo();
        $torneo->nombre = $request->nombre;
        $torneo->premio = $request->premio;
        $torneo->fecha_inicio = $request->fecha_inicio;
        $torneo->fecha_fin = $request->fecha_fin;
        $torneo->limite_equipos = $request->limite_equipos;
        $torneo->modalidad = $request->modalidad;
       
        $torneo->save();
        return response()->json([
            "message"=> "Torneo creado con video juego exitosamente"
            ],201);

    }

    public function index() {
        return response()->json([
            "data" => Torneo::with('videojuego')->get(),
            "message" => "Lista de torneos obtenida exitosamente"
        ]);
    }

    public function show(Torneo $torneo) {
        return response()->json([
            "data" => $torneo->load(['videojuego', 'equipos.jugadores']),
            "message" => "Torneo obtenido exitosamente"
        ]);
    }

    

}
