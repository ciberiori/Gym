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

    public function Logout(Request $request){

       $request->session()->flush();

       return response()->json(true);
    }

    public function ActualizarDatosPersonales(Request $request){

        $nombre=$request->input("Nombre");
        $apellido=$request->input("Apellido");
        $peso=$request->input("Peso");
        $estatura=$request->input("Estatura");
        $usuario=$request->input("ID_Usuario");

        $usuario=Usuario::where("ID_Usuario",$usuario)->first();
        $usuario->Nombre=$nombre;
        $usuario->Apellido=$apellido;
        $usuario->Peso=$peso;
        $usuario->Estatura=$estatura;
        $res=$usuario->save();

        if(!$res){
            return response()->json(false);
        }

        return response()->json(true);

    }


    public function ActualizarCredenciales(Request $request){

        $email=$request->input("Email");
        $password=$request->input("Pass");
        $usuario=$request->input("ID_Usuario");

        $usuario=Usuario::where("ID_Usuario",$usuario)->first();
        $usuario->Email=$email;
        $usuario->Pass=md5($password);
        $res=$usuario->save();

        if(!$res){
            return response()->json(false);
        }

        return response()->json(true);

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
