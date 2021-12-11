<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Model\Usuario;
use App\Model\RegionCuerpo;

class FrontendController extends Controller
{
   public function index(Request $request){

      
    
    $usuario=Usuario::where("ID_Usuario",$request->session()->get("ID_Usuario"))
            ->with(["repeticiones"=>function($q){
                 $fecha = date("d/m/Y");  
                 $q->where("Fecha","=",$fecha);
            }])
             ->first();

    $regiones=RegionCuerpo::get();
   
    return view("frontend.index")
               ->with("usuario",$usuario)
               ->with("regiones",$regiones);
   }


   public function Login(){

      return view("frontend.login");
   }
}
