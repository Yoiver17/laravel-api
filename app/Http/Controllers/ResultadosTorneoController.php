<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class ResultadosTorneoController extends Controller
{
    public function create(Request $request){
      
         $resultado = new resultado_torneo();
         $torneo = TipoVideojuego::find($request->id_torneo);
         $resultado->torneo()->associate($request->id_torneo);
         $resultado->fecha_fin = $request->fehca_fin;
         $equipo = Equipos::find($request->equipo_id);
         $resultado->equipo()->associate($request->equipo_id);
         $modalidad = Modalidad::find($request->modalidad_id);
         $resultado->modalidad()->associate($request->modalidad_id);
         $resultado->save();

         return response()->json([

            "message" => "Guardado exitosamente"
         ],201);
    }
}
