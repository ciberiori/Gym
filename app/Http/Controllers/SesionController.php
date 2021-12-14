<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Model\Repeticion;

class SesionController extends Controller
{
    public function ObtenerSesionesUsuario(Request $request){

        $usuario=$request->input("ID_Usuario");
        $ejercicio=$request->input("Ejercicio");
        $inicioDelimitador=$request->input("LI");
        $finDelimitador=$request->input("LF");

        $sesiones=Repeticion::with("ejercicio")
                               ->where("ID_Usuario",$usuario)
                               ->where("Ejercicio",$ejercicio)
                               ->take($finDelimitador)
                               ->skip($inicioDelimitador)
                               ->get();

        return response()->json($sesiones);                    
    }
}
