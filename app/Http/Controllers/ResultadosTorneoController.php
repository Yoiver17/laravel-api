<?php

namespace App\Http\Controllers;
use App\Models\ResultadosTorneo;
use App\Models\Equipos;
use App\Models\Modalidad;
use App\Models\Torneo;
use Illuminate\Http\Request;

class ResultadosTorneoController extends Controller
{
    public function create(Request $request) {
    $resultado = new ResultadosTorneo();

    $torneo = Torneo::find($request->id_torneo);
    $equipo = Equipos::find($request->equipo_id);
    $modalidad = Modalidad::find($request->modalidad_id);
    if (!$torneo || !$equipo || !$modalidad) {
        return response()->json(['message' => 'Torneo, equipo o modalidad no encontrados'], 404);
    }

    $resultado->torneo()->associate($torneo);
    $resultado->equipo()->associate($equipo);
    $resultado->modalidad()->associate($modalidad);
    $resultado->fehca_fin = $request->fehca_fin;
    $resultado->premio = $request->premio;

    $resultado->save();

    return response()->json([
        "message" => "Guardado exitosamente"
    ], 201);
    }


    public function show(ResultadosTorneo $resultado) {
        return response()->json([
            "data" => $resultado->load(['torneo', 'equipo', 'modalidad']),
            "message" => "Resultado obtenido exitosamente"
        ]);
    }

        public  function getAll(){
        $resultado = ResultadosTorneo::with('torneo','equipo','modalidad')->get();
        return response()->json([
            "data" => $resultado, 
            "message" => "Consulta exitosa"
        ],200);
    }


    public function destroy( ResultadosTorneo $resultado) {
        $resultado->delete();
         return response()->json([
            "message" => "Resultado eliminado Exitosamente!"
        ], 200);
     
    }
}
