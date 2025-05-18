<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\TipoVideojuego;

class TipoVideojuegoController extends Controller
{
    public function create(Request $request){
        TipoVideojuego::create([
            "tipo_id" => $request->tipo_id,
            "videojuego_id" => $request->videjuego_id,
            "tipo" => $request->tipo,
        ]);
        
        return response()->json([
            "message" => "Tipo de videjuego guardado exitosamente"
        ],201   );
    }

    
    
    
}
