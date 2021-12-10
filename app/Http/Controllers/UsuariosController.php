<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Model\Usuario;

class UsuariosController extends Controller
{
    public function ObtenerUsuarioUsuarioPassword(Request $request){

       $username=$request->query("Usuario");
       $password=$request->query("Pass");
       $usuario=Usuario::where("Email",$username)->where("Pass",md5($password))->first();
       $bandera=false;
       if(!is_null($usuario)){

         $request->session()->put("ID_Usuario",$usuario->ID_Usuario);
         $request->session()->put("Pass",$password);
         $request->session()->put("Usuario",$usuario->Nombre);
         $request->session()->put("Peso",$usuario->Peso);
         $request->session()->put("Estatura",$usuario->Estatura);
         $bandera=true;
        }

       return response()->json($bandera);

    }

    public function ValidarRutUsuario(Request $request){

       $rut=$request->input("RUT");
       $data=Usuario::where("RUT",$rut)->first();
       $bandera=false;

       if(!is_null($data)){
           $bandera=true;
       }

       return response()->json($bandera);

    }

    public function ValidarEmailUsuario(Request $request){

        $email=$request->input("Email");
        $data=Usuario::where("Email",$email)->first();
        $bandera=false;
 
        if(!is_null($data)){
            $bandera=true;
        }
 
        return response()->json($bandera);

    }

    


    public function RegistrarUsuario(Request $request){

        $nombre=$request->input("Nombre");
        $apellido=$request->input("Apellido");
        $rut=$request->input("RUT");
        $email=$request->input("Email");
        $pass=$request->input("Pass");
        $peso=$request->input("Peso");
        $estatura=$request->input("Estatura");

        $bandera=false;

        $usuario=new Usuario();

        $usuario->Nombre=$nombre;
        $usuario->Apellido=$apellido;
        $usuario->RUT=$rut;
        $usuario->Email=$email;
        $usuario->Pass=md5($pass);
        $usuario->Verificado=0;
        $usuario->Peso=$peso;
        $usuario->Estatura=$estatura;
        
        $result=$usuario->save();
        if($result){
            $bandera=true;
        }

        return response()->json($bandera);

    }
}
