<?php

namespace App\Http\Controllers;

use App\Models\Equipos;
use App\Models\Torneo;

use Illuminate\Http\Request;

 class EquiposController 
{
    public function create(Request $request) {
        $equipo= new Equipos();
        $equipo->nombre = $request->nombre;
        $equipo->lider_id = $request->lider_id;
        $equipo->save();
        
        $equipo->torneos()->attach([$request->torneoId]);
        $jugadores = $request->players; 
        $torneoId = $request->torneoId;   

        $syncData = [];
        foreach ($jugadores as $jugadorId) {
            $syncData[$jugadorId] = ['id_torneo' => $torneoId];
        }
               
        $equipo->jugadores()->sync($syncData);
        $equipo->save();
        return response()->json([
            "message" => "Equipo Guardado Exitosamente!"
        ], 201);
    }

    public  function getAll(){
        $equipos = Equipos::with('jugadores')->get();
        return response()->json([
            "data" => $equipos, 
            "message" => "Consulta exitosa"
        ],200);
    }

    public function update(Request $request, Equipos $equipo) {
    

        $equipo->nombre = $request->nombre;
        $equipo->lider_id = $request->lider_id;
        
        $jugadores = $request->players; 
        $torneoId = $request->torneoId;   

        $syncData = [];
        foreach ($jugadores as $jugadorId) {
            $syncData[$jugadorId] = ['id_torneo' => $torneoId];
        }
               
        $equipo->jugadores()->sync($syncData);
        $equipo->save();
        return response()->json([
            "message" => "Equipo Guardado Exitosamente!"
        ], 200);

    }

    public function destroy( Equipos $equipo) {
        $equipo->delete();
         return response()->json([
            "message" => "Equipo eliminado Exitosamente!"
        ], 200);
     
    }
}

