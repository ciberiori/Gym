<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\FrontendController;
use App\Http\Controllers\UsuariosController;
/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::get('/', [FrontendController::class,"login"]);
Route::get('/frontend',[FrontendController::class,"index"]);


Route::get('/usuarios/obtenerUsuario',[UsuariosController::class,"ObtenerUsuarioUsuarioPassword"]);
Route::get('/usuarios/validarRutUsuario',[UsuariosController::class,"ValidarRutUsuario"]);
Route::get('/usuarios/validarEmailUsuario',[UsuariosController::class,"ValidarEmailUsuario"]);
Route::get('/usuarios/registrarUsuario',[UsuariosController::class,"RegistrarUsuario"]);