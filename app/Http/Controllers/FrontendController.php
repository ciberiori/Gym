<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Model\Usuario;
use App\Model\RegionCuerpo;
use App\Model\Comida;
use App\Model\Dieta;

class FrontendController extends Controller
{
   public function index(Request $request){

    if(!$request->session()->exists("ID_Usuario") || 
       !$request->session()->exists("Usuario")){
 
         return redirect("/");
       }


    $usuario=Usuario::where("ID_Usuario",$request->session()->get("ID_Usuario"))
            ->with(["repeticiones"=>function($q){
                 $fecha = date("d/m/Y");  
                 $q->where("Fecha","=",$fecha);
            }])
             ->first();

    $regiones=RegionCuerpo::get();
    $comidas=Comida::get();


    $dieta=Dieta::where("ID_Usuario",$request->session()->get("ID_Usuario"))
                  ->where(function($q){
                     $comidas=Comida::get();
                     foreach($comidas as $c){
                       $q->orWhere("ID_Comida",$c->ID_Comida);
                     }
                  })->get();
  
    return view("frontend.index")
               ->with("usuario",$usuario)
               ->with("regiones",$regiones)
               ->with("comidas",$comidas)
               ->with("dieta",$dieta);

   }


   public function Login(){

      return view("frontend.login");
   }
}
