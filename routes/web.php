<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\FrontendController;
use App\Http\Controllers\UsuariosController;
use App\Http\Controllers\RepeticionesController;
use App\Http\Controllers\ProgresoController;
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


Route::get('/repeticiones/obtenerAreasPorRegion',[RepeticionesController::class,"ObtenerAreasPorRegion"]);
Route::get('/repeticiones/obtenerEjerciciosPorArea',[RepeticionesController::class,"ObtenerEjerciciosPorArea"]);
Route::get('/repeticiones/obtenerDescripcionEjercicio',[RepeticionesController::class,"ObtenerDescripcionEjercicio"]);
Route::get('/repeticiones/obtenerUltimoResultadoEjercicio',[RepeticionesController::class,"ObtenerUltimoResultadoEjercicio"]);
Route::get('/repeticiones/obtenerCalculoCaloriasDiarias',[RepeticionesController::class,"ObtenerCalculoCaloriasDiarias"]);
Route::get('/repeticiones/guardarRepeticiones',[RepeticionesController::class,"GuardarRepeticiones"]);

Route::get('/progeso/obtenerFechaActual',[ProgresoController::class,"ObtenerFechaActual"]);
Route::get('/progreso/obtenerSemanaActual',[ProgresoController::class,"ObtenerSemanaActual"]);
Route::get('/progreso/obtenerMesActual',[ProgresoController::class,"ObtenerMesActual"]);
Route::get('/progreso/obtenerAnioActual',[ProgresoController::class,"ObtenerAnioActual"]);
Route::get('/progreso/obtenerDatosProgreso',[ProgresoController::class,"ObtenerDatosProgreso"]);


