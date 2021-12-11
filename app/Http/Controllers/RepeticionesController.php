<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Model\Ejercicio;
use App\Model\AreaCuerpo;
use App\Model\Repeticion;

class RepeticionesController extends Controller
{
    public function ObtenerAreasPorRegion(Request $request){
          $region=$request->input("Region");
          $areas=AreaCuerpo::where("Region",$region)->get();
          return response()->json($areas);
    }



    public function ObtenerEjerciciosPorArea(Request $request){
        $area=$request->input("Area");
        $ejercicios=Ejercicio::where("Area",$area)->get();
        return response()->json($ejercicios);
    }

    public function ObtenerDescripcionEjercicio(Request $request){
       $ejercicio=$request->input("Ejercicio");
       $descripcion=Ejercicio::where("ID_Ejercicio",$ejercicio)->first();

       if(is_null($descripcion)){
        return response()->json(false);
       }

       return response()->json($descripcion);

    }

    public function ObtenerCalculoCaloriasDiarias(Request $request){

        $fecha = date('d/m/Y');
        $usuario=$request->input("ID_Usuario");

        $reps=Repeticion::where("Tiempo",$fecha)->where("ID_Usuario",$usuario)->get();

        $cantidad=count($reps);
        
        $hora = 0;						
	    $minutos = 0;
	    $segundos = 0;
        $minutosCalorias = 0;

        for($i = 0; $i < $cantidad; $i++) {

            $tiempo = $reps[$i]->Tiempo;
    
            $find = ":";
    
            $hrs = intval(substr($tiempo, 0, strpos($tiempo, $find)));
            $tiempo = substr($tiempo, strpos($tiempo, $find)+1, strlen($tiempo)-1);
    
            $min = intval(substr($tiempo, 0, strpos($tiempo, $find)));
            $seg = intval(substr($tiempo, strpos($tiempo, $find)+1, strlen($tiempo)-1));
    
            $hora += $hrs;
            $minutos += $min;
            $minutosCalorias += $min;
            $segundos += $seg;
    
            if($minutos >= 60) {
    
                $hora += 1;
                $minutos += -60;
    
            }
    
            if($segundos >= 60) {
    
                $minutos += 1;
                $minutosCalorias += 1;
                $segundos += -60;
    
            }
    
        }

        $met = 4.8;
	    $calorias = ((session()->get("Peso") * $met) * 0.0175) * $minutosCalorias;

	    $calorias = number_format($calorias, 2);

        return response()->json($calorias);

    }

    public function GuardarRepeticiones(Request $request){

       $repeticion=$request->input("Repeticion");
       $tiempo=$request->input("Tiempo");
       $ejercicio=$request->input("Ejercicio");
       $usuario=$request->input("ID_Usuario");

       $fecha = date('d/m/Y');
	   $fechaSemana = \DateTime::createFromFormat("d/m/Y", $fecha);
       $nSemana = $fechaSemana->format('W');

       $model=new Repeticion();
       $model->Repeticion=$repeticion;
       $model->Ejercicio=$ejercicio;
       $model->ID_Usuario=$usuario;
       $model->Fecha=$fecha;
       $model->Tiempo=$tiempo;
       $model->SemanaEnt=$nSemana;
       $model->save();

       if(!$model){
           return response()->json(false);
       }

       return response()->json(true);


    }

    public function ObtenerUltimoResultadoEjercicio(Request $request){

        $ejercicio=$request->input("Ejercicio");
        $usuario=$request->input("ID_Usuario");

        $resultado=Repeticion::where("Ejercicio",$ejercicio)
                                 ->where("ID_Usuario",$usuario)
                                 ->orderByDesc("ID_Repeticion")
                                 ->first();

        if(is_null($resultado)){
            return response()->json(false);
        }
   
        return response()->json($resultado);
    }
}
