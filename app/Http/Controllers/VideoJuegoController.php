<?php

namespace App\Http\Controllers;

use App\Models\TipoVideojuego;
use App\Models\VideoJuego;
use Illuminate\Http\Request;

class VideoJuegoController extends Controller
{
    public function create(Request $request){
      
        $game = new VideoJuego();
        $game->nombre = $request->nombre;
        $tipo = TipoVideojuego::find($request->tipo_id);
        $game->tipo()->associate($tipo);
        $game->save();
       
       $game->modalidades()->attach( [$request->modalidadId]);
       $game->save();
       return response()->json([
        "message" => "Guardado exitosamente"
        ],201);
    }
}
