<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Model\Usuario;

class FrontendController extends Controller
{
   public function index(Request $request){

      
    
    $usuario=Usuario::where("ID_Usuario",$request->session()->get("ID_Usuario"))
            ->with(["repeticiones"=>function($q){
                 $fecha = date("d/m/Y");  
                 $q->where("Fecha","=",$fecha);
            }])
             ->first();
             
    $reps=$usuario->repeticiones;

   
    return view("frontend.index")
               ->with("usuario",$usuario);
   }


   public function Login(){

      return view("frontend.login");
   }
}
