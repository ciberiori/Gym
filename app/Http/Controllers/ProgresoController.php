<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Model\Repeticion;

class ProgresoController extends Controller
{
    public function ObtenerFechaActual(){ return response()->json(date("d/m/Y"));}
    public function ObtenerSemanaActual(){ return response()->json(date("W"));}
    public function ObtenerMesActual(){ return response()->json(date("m"));}
    public function ObtenerAnioActual(){ return response()->json(date("Y"));}

    public function ObtenerDatosProgreso(Request $request){

        $idUsuario=$request->input("ID_Usuario");
        $fecha="";
        $semana="";
        $arrayDatos=array();
        
        if($request->has("Semana")){
            $semana=$request->input("Semana");
        }else{
            $fecha=$request->input("Fecha");
        }
         
        $data=Repeticion::where("ID_Usuario",$idUsuario);
        
        if($semana){
           $data=$data->where("SemanaEnt",$semana);
        }else{
           $data=$data->where("Fecha","Like",$fecha);
        }

        $result=$data->get();
        $cantidad=count($result);
        $arrayDatos["CantidadActividades"] = $cantidad;

        
        $contRep = 0;
	    $contPeso = 0;
	    $divisor = 0;

        for($i = 0; $i < $cantidad; $i++) {
            $objRepeticion = json_decode($result[$i]->Repeticion, true);
            $contArray = count($objRepeticion["Repeticiones"]);

            for($b = 0; $b < $contArray; $b++) {

                $arrayRep =  $objRepeticion["Repeticiones"][$b];
        
                $contRep += $arrayRep["R"];
                $contPeso += $arrayRep["P"];
                $divisor++;
            }
        }

        if($divisor) {
            $contPeso = round($contPeso/$divisor);
    
        }
    
        $arrayDatos["Repeticiones"] = $contRep;
	    $arrayDatos["PesoPromedio"] = $contPeso;

        $hora = 0;						
	    $minutos = 0;
	    $segundos = 0;
        $minutosCalorias = 0;

        for($i = 0; $i < $cantidad; $i++) {

            $tiempo = $result[$i]->Tiempo;
    
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
    
        $textoHora = "";
        $textoMinuto = "";
        $textoSegundo = "";
    
        if($segundos < 10) {
            $textoSegundo = "0" . $segundos;
        } else {
            $textoSegundo = $segundos;
        }
        if($minutos < 10) {
            $textoMinuto = "0" . $minutos;							
        } else {
            $textoMinuto = $minutos;
        }
    
        if($hora < 10) {
            $textoHora = "0" . $hora;
        } else {
            $textoHora = $hora;
        }
    
        $tiempo = $textoHora . ":" . $textoMinuto . ":" . $textoSegundo;
        $met = 4.8;
        $calorias = ((session()->get("Peso") * $met) * 0.0175) * $minutosCalorias;
    
        $arrayDatos["Tiempo"] = $tiempo;
        $arrayDatos["Calorias"] = number_format($calorias, 2);

        return response()->json($arrayDatos);
    }

}
