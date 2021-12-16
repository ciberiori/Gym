<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Model\Dieta;

class DietaController extends Controller
{
   
    public function  PersistirDietaUsuario(Request $request){

       $usuario=$request->input("ID_Usuario");
       $comida=$request->input("ID_Comida");
       $dieta=$request->input("Dieta");

       $data=Dieta::where("ID_Usuario",$usuario)->where("ID_Comida",$comida)->first();
       if(!is_null($data)){
         $data->Dieta=$dieta;
         
         if($data->save()) return response()->json( array("Bandera" => true, "Estado" => "Actualizo"));
       
        }else{
         $data=new Dieta();
         $data->ID_Usuario=$usuario;
         $data->ID_Comida=$comida;
         $data->Dieta=$dieta;

         if($data->save()) return response()->json( array("Bandera" => true, "Estado" => "inserto"));
       }
      
        return response()->json( array("Bandera" => false, "Estado" => "actualizo"));

    }


}