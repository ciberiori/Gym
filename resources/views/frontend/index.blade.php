<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<title>Index</title>
    
	

 
    <link rel="stylesheet" href="{{ URL::to('css/indexMobile.css') }}"/>
    <link rel="stylesheet" href="{{ URL::to('css/ActualizacionMobile.css') }}"/>
    <link rel="stylesheet" href="{{ URL::to('css/ProgresoMobile.css') }}"/>
    <link rel="stylesheet" href="{{ URL::to('css/RepeticionesMobile.css') }}"/>
    <link rel="stylesheet" href="{{ URL::to('css/CronometroMobile.css') }}"/>
    <link rel="stylesheet" href="{{ URL::to('css/SesionesMobile.css') }}"/>
    <link rel="stylesheet" href="{{ URL::to('css/DietaMobile.css') }}"/>

</head>
<body>

    <div class="Index-Controlador">

        <input type="hidden" id="ID_Usuario" value="{{ session()->get('ID_Usuario')}}">
        <input type="hidden" id="Nombre_Usuario" value="{{ session()->get('Usuario')}}">
        <input type="hidden" id="Peso_Usuario" value="{{ session()->get('Peso')}}">
    
        <div class="Index-Fondo-Pantalla"></div>
        <div class="IndexFondo-Index"></div>
    
        <div class="Index-Panel-lateral Index-Panel-Cerrado">
    
            <div class="Index-Panel-lateral-Logo">
                
                <div class="Index-Panel-btnPanelCerrar"></div>
    
                <div class="Index-Panel-Logo">
                    <span>Fitland</span>
                </div>
    
            </div>
            
            <ul class="Index-Panel-lateral-Botones">
                <li class="Progreso"><span>Progreso</span></li>
                <li class="Repeticiones Index-Label-Selected"><span>Repeticiones</span></li>
                <li class="Cronometro"><span>Cronometro</span></li>
                <li class="Sesiones"><span>Sesiones</span></li>
                <li class="Dieta"><span>Dieta</span></li>
                <div class="Index-Marcador"></div>
            </ul>
    
            <div class="Index-Panel-lateral-Footer">
                
            </div>
    
        </div>
    
        <div class="Index-Panel-lateral-Opciones Index-Panel-Opciones-Cerrado">
    
            <div class="Index-Panel-Panel-Opciones-Container">
                
                <div class="Index-Panel-Opciones-Logo"></div>
    
            </div>
            
            <ul class="Index-Panel-Opciones-Botones">
                <li>
                    <div class="Opciones-Logo-Boton"></div>
                    <div id="Opciones-btnPerfil" class="Opciones-Boton"><span>Perfil</span></div>
                </li>
                <li>
                    <div class="Opciones-Logo-Boton"></div>
                    <div id="Opciones-Info-Contacto" class="Opciones-Boton"><span>Atencion al cliente</span></div>
                </li>
                <div class="Opciones-Panel-Corredizo Contacto-Cerrado">
                        
                        <div class="Opciones-Informacion-Contacto">
                            
                            <div>
                                <p><span>Telefono(s):</span></p>
                                <span>+569 7911 0626</span><br/>
                                <span>+569 8957 2805</span><br/>
                            </div>
                            <div>
                                <p><span>Correo(s):</span></p>
                                <span>DANILO.LOPEZB@correoaiep.cl</span><br>
                                <br><span>IGNACIO.MENDEZE@correoaiep.cl</span><br>
                            </div>
    
                        </div>
    
                    </div>
                <li>
                    <div class="Opciones-Logo-Boton"></div>
                    <div id="Index-Boton-CerrarSesion" class="Opciones-Boton"><span>Cerrar Sesion</span></div>
                </li>
            </ul>
    
        </div>
    
        <div class="Actualizacion-Container-Principal Actualizacion-Cerrada">
            
            <div class="Actualizacion-Barra-Superior">
    
                <div id="Actualizacion-btnAtras"></div>
                
                <span>Actualizacion de datos</span>
    
            </div>
    
            <div class="Actualizacion-Datos-Personales">
                
                <div class="Actualizacion-Titulo Actualizacion-Datos-Personales-Titulo">
                    
                    <span>Datos Personales</span>
    
                </div>
                <div class="Actualizacion-Datos Actualizacion-Datos-Personales-Formulario">
    
                    <div class="Elemento">
                        
                        <div class="Campo">
                        <input type="text" id="Actualizacion-Nombre" value="{{ session()->get('Usuario')}}" required>
                        <label class="lbl-Campo">
                            <span class="txt-Campo">Nombre</span>
                        </label>
                        </div>
                        <div class="Campo">
                        <input type="text" id="Actualizacion-Apellido" value="{{ $usuario->Apellido }}" required>
                        <label class="lbl-Campo">
                            <span class="txt-Campo">Apellido</span>
                        </label>
                        </div>
                        <div class="Campo">
                        <input type="number" id="Actualizacion-Peso" value="{{ session()->get('Peso')}}" required>
                        <label class="lbl-Campo">
                            <span class="txt-Campo">Peso</span>
                        </label>
                        </div>
                        <div class="Campo">
                        <input type="number" id="Actualizacion-Estatura" step="0.01" value="{{ $usuario->Estatura }}" required>
                        <label class="lbl-Campo">
                            <span class="txt-Campo">Estatura</span>
                        </label>
                        </div>
    
                    </div>
    
                </div>
    
                <button id="Actualizacion-btnDatosPersonales">Actualizar</button>
    
            </div>
            <div class="Actualizacion-Credenciales">
                
                <div class="Actualizacion-Titulo Actualizaci on-Credenciales-Titulo">
                    
                    <span>Credenciales</span>
    
                </div>
                <div class="Actualizacion-Datos Actualizacion-Credenciales-Formulario">
    
                    <div class="Elemento">
                        
                        <div class="Campo">
                        <input type="text" id="Actualizacion-Email" value="{{ $usuario->Email }}" required>
                        <label class="lbl-Campo">
                            <span class="txt-Campo">Email</span>
                        </label>
                        </div>
                        <div class="Campo">
                        <input type="password" id="Actualizacion-Pass" value="{{ session()->get('Pass')}}" required>
                        <label class="lbl-Campo">
                            <span class="txt-Campo">Contraseña</span>
                        </label>
                        </div>
    
                    </div>
    
                </div>
    
                <button id="Actualizacion-btnCredenciales">Actualizar</button>
    
            </div>
    
        </div>
    
        <div class="Index-Barra-Superior">
            
            <div class="Index-Panel-btnPanelAbrir"></div>
            <div class="Index-Container-Central">
                <span>Bienvenido, {{ session()->get('Usuario')}}</span>
            </div>
            <div class="Index-Panel-Opciones"></div>
    
        </div>
    
        <div class="Index-Container-Contents">
            
            <div id="Progreso" class="Content">
                
                <div class="Progreso-Panel-Botones">
                    
                    <ul class="Progreso-Botones-Lapsos">
                        <li id="Progreso-btnDiario" class="Progreso-Selected-Lapso"><span>Diario</span></li>
                        <li id="Progreso-btnSemanal"><span>Semanal</span></li>
                        <li id="Progreso-btnMensual"><span>Mensual</span></li>
                        <li id="Progreso-btnAnual"><span>Anual</span></li>
                    </ul>
    
                </div>
                <div class="Progreso-Panel-Estadisticas">
    
                    @php 
                     $cantidad=count($usuario->repeticiones);
                     $contRep = 0;
				     $contPeso = 0;
				     $divisor = 0;
                     
                    @endphp

                    @for($i = 0; $i < $cantidad; $i++) 

                       @php 
                         $objRepeticion = json_decode($usuario->repeticiones[$i]->Repeticion, true);
					     $contArray = count($objRepeticion["Repeticiones"]);

                         
                       @endphp 

                       @for($b = 0; $b < $contArray; $b++) 
                         @php
                           $arrayRep =  $objRepeticion["Repeticiones"][$b];
                           $contRep += $arrayRep["R"];
                           $contPeso += $arrayRep["P"];
                           $divisor++;
                         @endphp
                       @endfor
                       @endfor

                       @if($divisor) {
                         @php
                           $contPeso = round($contPeso/$divisor);
                         @endphp    
                       @endif

                       @php
                         $hora = 0;
				         $minutos = 0;
				         $segundos = 0;
                         $minutosCalorias = 0;
                       @endphp
                    
                       @for($i = 0; $i < $cantidad; $i++)
                       @php
                         $tiempo = $usuario->repeticiones[$i]->Tiempo;
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
                       @endphp
                       @endfor
                       
                       @php

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
                        $calorias = ((session()->get('Peso')* $met) * 0.0175) * $minutosCalorias;
                       @endphp

                    <div class="Progreso-Container-Estadistica">
                        <ul>
                            <li>
                                <div class="Progreso-Titulo-Estadistica"><span>Actividades Realizadas</span></div>
                                <div class="Progreso-Numero-Estadistica"><span id="Progreso-CantActividades">{{ $cantidad }}</span></div>
                            </li>
                            <li>
                                <div class="Progreso-Titulo-Estadistica"><span>Repeticiones Total</span></div>
                                <div class="Progreso-Numero-Estadistica"><span id="Progreso-RepTotales">{{ $contRep }}</span></div>
                            </li>
                            <li>
                                <div class="Progreso-Titulo-Estadistica"><span>Peso Levantado (Promedio)</span></div>
                                <div class="Progreso-Numero-Estadistica"><span id="Progreso-PesoPromedio">{{ $contPeso }}</span></div>
                            </li>
                        </ul>
                    </div>
    
                    <div class="Progreso-Container-Estadistica">
                        <ul>
                            <li>
                                <div class="Progreso-Titulo-Estadistica"><span>Tiempo Ejercitado</span></div>
                                <div class="Progreso-Numero-Estadistica"><span id="Progreso-TiempoEntrenado">{{ $tiempo }}</span></div>
                            </li>
                            <li>
                                <div class="Progreso-Titulo-Estadistica"><span>Calorias Quemadas</span></div>
                                <div class="Progreso-Numero-Estadistica"><span id="Progreso-CaloriasQuemadas">{{ $calorias }}</span></div>
                            </li>
                            <li>
                                <div class="Progreso-Titulo-Estadistica"><span>???</span></div>
                                <div class="Progreso-Numero-Estadistica"><span>No Data</span></div>
                            </li>
                        </ul>
                    </div>
    
                </div>
    
            </div>
            
            <div id="Repeticiones" class="Content Index-Container-Selected">
                
                <div class="Repeticiones-Panel-Principal Panel-Abierto">
    
                <div class="Repeticiones-Container-Selectores">
                    
                    <div class="Repeticiones-Selectores">
    
                        <table>
                            
                            <tbody>
                                
                                <tr>
                                    <td><span>Region</span></td>
                                    <td>
                                        <select id="Repeticiones-cajaRegion">
                                            <option value="">Selecciona una Region</option>
                                            @foreach ($regiones as $r)
                                                <option value="{{ $r->ID_Region }}">{{ $r->Region }}</option>
                                            @endforeach
      
                                        </select>
                                    </td>
                                </tr>
                                <tr>
                                    <td><span>Area</span></td>
                                    <td>
                                        <select id="Repeticiones-cajaArea">
                                            <option value="">Selecciona una Area</option>
                                        </select>
                                    </td>
                                </tr>
                                <tr>
                                    <td><span>Ejercicio</span></td>
                                    <td>
                                        <select id="Repeticiones-cajaEjercicio">
                                            <option value="">Seleccione un Ejercicio</option>
                                        </select>
                                    </td>
                                </tr>
    
                            </tbody>
    
                        </table>
    
                    </div>
    
                </div>
                <div class="Repeticiones-Rutinas">
    
                    <div class="Repeticiones-Rutinas-Titulo">
                        
                        <div class="Repeticiones-Rutinas-Titulo-Titulo">
                            <span>Descripcion</span>
                        </div>
    
                        <div class="Repeticiones-Rutinas-Descripcion">
                            <span></span>
                        </div>
    
    
                    </div>
                        
                    <div class="Rutina-Container">
    
                    <div class="Repeticiones-Container-Fecha">
                        
                        <div class="Repeticiones-Fecha">
                            
                            <span id="Repeticiones-Fecha-Principal">--/--/--</span>
    
                        </div>
    
                    </div>
                    <div class="Repeticiones-Container-Repeticiones">
                        
                        <div class="Repeticiones-Detalle-Repeticion">
                            
                            <div class="Repeticiones-Repeticion">
                                
                                <div class="Repeticion-Rep">
                                    <span>0</span>
                                </div>
                                <div class="Repeticion-Separador"></div>
                                <div class="Repeticion-Peso">
                                    <span>0</span>
                                </div>
    
                            </div>
                            <div class="Repeticiones-Repeticion">
                                
                                <div class="Repeticion-Rep">
                                    <span>0</span>
                                </div>
                                <div class="Repeticion-Separador"></div>
                                <div class="Repeticion-Peso">
                                    <span>0</span>
                                </div>
    
                            </div>
    
                        </div>
    
                    </div>
    
                </div>
    
                </div>
                <div class="Repeticiones-Boton-AddRutina">
                    
                    <div class="Repeticiones-btn-addRutina">
                        <span>Añadir Repeticion</span>
                    </div>
    
                </div>
    
                </div>
    
                <div class="Repeticiones-Nueva-Repeticion Repeticion-Cerrada">
                    
                    <div class="Repeticiones-Container-Cronometro">
                        
                        <div class="Repeticion-Cronometro">
                            
                            <div class="Repeticion-Cronometro-Nueva-Repeticion">
                                <span id="Repeticiones-Cronometro">00:00:00</span>
                            </div>
    
                            <div class="Cronometro-Controles">
                                
                                <ul class="Repeticiones-Cronometro-Controles">
                                    <li><button id="Repeticiones-btnIniciar-Cronometro">Iniciar</button></li>
                                    <li><button id="Repeticiones-btnDetener-Cronometro">Detener</button></li>
                                </ul>
    
                            </div>
    
                        </div>
    
                    </div>
                    <div class="Repeticiones-Container-Nueva-Repeticion">
                        
                        <div class="Repeticiones-Nueva-Repeticion-Fecha">
                            
                            <div class="Repeticiones-Nueva-Fecha">
                                <span>Sesion Actual</span>
                            </div>
                            <div class="Repeticiones-Nueva-Fecha">
                                <span>Ultima Sesion</span>
                            </div>
    
                        </div>
                        <div class="Repeticiones-Nueva-Repeticion-Repeticiones">
                                
                            <div id="Repeticion-Nueva" class="Repeticiones-Anotacion-Repeticion">
                                
                                <div class="Repeticiones-Repeticion">
                                
                                <div class="Repeticion-Rep">
                                    <input type="number" class="Rep">
                                </div>
                                <div class="Repeticion-Separador"></div>
                                <div class="Repeticion-Peso">
                                    <input type="number" class="Peso">
                                </div>
    
                            </div>
                            <div class="Repeticiones-Repeticion">
                                
                                <div class="Repeticion-Rep">
                                    <input type="number" class="Rep">
                                </div>
                                <div class="Repeticion-Separador"></div>
                                <div class="Repeticion-Peso">
                                    <input type="number" class="Peso">
                                </div>
    
                            </div>
    
                            </div>
                            <div id="Repeticion-Anterior" class="Repeticiones-Anotacion-Repeticion">
                                
                            <div class="Repeticiones-Repeticion">
                                
                                <div class="Repeticion-Rep">
                                    <span class="Rep">0</span>
                                </div>
                                <div class="Repeticion-Separador"></div>
                                <div class="Repeticion-Peso">
                                    <span class="Peso">0</span>
                                </div>
    
                            </div>
                            <div class="Repeticiones-Repeticion">
                                
                                <div class="Repeticion-Rep">
                                    <span class="Rep">0</span>
                                </div>
                                <div class="Repeticion-Separador"></div>
                                <div class="Repeticion-Peso">
                                    <span class="Peso">0</span>
                                </div>
    
                            </div>
    
                            </div>
    
                            <div id="Repeticion-Comparador" class="Repeticiones-Anotacion-Repeticion">
                                
                                <div class="Repeticiones-Repeticion">
                                
                                <div class="Repeticion-Rep">
                                    <span class="Rep">0</span>
                                </div>
                                <div class="Repeticion-Separador"></div>
                                <div class="Repeticion-Peso">
                                    <span class="Peso">0</span>
                                </div>
    
                            </div>
                            <div class="Repeticiones-Repeticion">
                                
                                <div class="Repeticion-Rep">
                                    <span class="Rep">0</span>
                                </div>
                                <div class="Repeticion-Separador"></div>
                                <div class="Repeticion-Peso">
                                    <span class="Peso">0</span>
                                </div>
    
                            </div>
    
                            </div>
    
                        </div>
    
                        <div class="Repeticiones-Control-Repeticion">
                            
                            <ul>
                                <li><button id="Repeticiones-btnAgregarFila">Agregar fila</button></li>
                                <li><button id="Repeticiones-btnElimnarFila">Eliminar fila</button></li>
                            </ul>
    
                        </div>
    
                    </div>
                    <div class="Repeticiones-Comparador">
    
                        <ul class="Repeticion-Lista-Estadistica">
                            <li>
                                <div class="Repeticion-Estadistica-Titulo"><span>Progreso General Repeticiones</span></div>
                                <div class="Repeticion-Estadistica-Numero"><span id="Repeticiones-Contador-Repeticiones">0</span></div>
                            </li>
                            <li>
                                <div class="Repeticion-Estadistica-Titulo"><span>Calorias Quemadas</span></div>
                                <div class="Repeticion-Estadistica-Numero"><span id="Repeticiones-Contador-Calorias">0.00</span></div>
                            </li>
                        </ul>
    
                    </div>
                    <div class="Repeticiones-Controles">
                        
                        <ul>
                            <li><button id="Repeticiones-Cancelar-Repeticion">Cancelar</button></li>
                            <li><button id="Repeticiones-Guardar-Repeticion">Guardar</button></li>
                        </ul>
    
                    </div>
    
                </div>
    
            </div>
            <div id="Cronometro" class="Content">
                
                <div class="Cronometro-Container">
    
                    <div class="Cronometro-Crono">
    
                        <span id="Cronometro-Tiempo">00:00:00</span>
    
                    </div>
    
                    <div class="Cronometro-Container-Botones">
    
                        <ul class="Cronometro-Panel-Botones">
                            <li><button id="Cronometro-btnEmpezar">Empezar</button></li>
                            <li><button id="Cronometro-btnDetener">Detener</button></li>
                            <li><button id="Cronometro-btnReiniciar">Reiniciar</button></li>
                            <li><button id="Cronometro-btnMarcar">Marcar</button></li>
                        </ul>
    
                    </div>
    
                </div>
    
                <div class="Cronometro-Record">
    
                    <div class="Cronometro-Container-Tiempo-Log">
                        
                        <div class="Cronometro-Titulo-Tiempo-Record">
                            <span>Record:</span>
                        </div>
    
                        <div id="Cronometro-Log-Tiempo-Record">
                            
                        </div>
    
                    </div>
    
                </div>
    
            </div>
            <div id="Sesiones" class="Content">
                
                <div class="Sesiones-Container-Botones">
                        
                    <div class="Sesiones-Panel-Controles">
    
                        <div class="Sesiones-Panel-Botones">
    
                            <ul>
                                <li>
                                    <div><span>Region</span></div>
                                    <select id="Sesiones-cajaRegion">
                                        
                                        <option value="">Selecciona una Region</option>
                                        
                                            @foreach ($regiones as $r)
                                                <option value="{{ $r->ID_Region }}">{{ $r->Region }}</option>
                                            @endforeach
      
                                        
    
                                    </select>
                                </li>
                                <li>
                                    <div><span>Area</span></div>
                                    <select id="Sesiones-cajaArea">
                                        
                                        <option value="">Selecciona un Area</option>
    
                                    </select>
                                </li>
                                <li>
                                    <div><span>Ejercicio</span></div>
                                    <select id="Sesiones-cajaEjercicio">
                                        
                                        <option value="">Selecciona un Ejercicio</option>
    
                                    </select>
                                </li>
    
                            </ul>
    
                        </div>
    
                        <div class="Sesiones-Container-btnBuscar">
                            
                            <button id="Sesiones-btnBuscar">Buscar</button>
    
                        </div>
    
                    </div>
    
                </div>
    
                <div class="Sesiones-Container-Registro">
                    
                    <div class="Sesiones-Resultados">
                        
                        <div class="Sesiones-Resultado-Repeticion">
                            
                            <div class="Sesiones-Container-Fecha">
    
                                <div class="Sesiones-Resultado-Fecha"><span>00/00/0000</span></div>
                                <div class="Sesiones-Resultado-Tiempo"><span>00:00:00</span></div>
    
                            </div>
                            <div class="Sesiones-Container-Resultado">
                                
                                <div class="Sesiones-Repeticion">
                                    
                                    <div class="Sesiones-Rep">
                                        <span class="Rep">0</span>
                                    </div>
                                    <div class="Sesiones-Separador"></div>
                                    <div class="Sesiones-Peso">
                                        <span class="Peso">0</span>
                                    </div>
    
                                </div>
                                <div class="Sesiones-Repeticion">
                                    
                                    <div class="Sesiones-Rep">
                                        <span class="Rep">0</span>
                                    </div>
                                    <div class="Sesiones-Separador"></div>
                                    <div class="Sesiones-Peso">
                                        <span class="Peso">0</span>
                                    </div>
    
                                </div>
    
                            </div>
    
                        </div>
    
                        <div class="Sesiones-Resultado-Repeticion">
                            
                            <div class="Sesiones-Container-Fecha">
    
                                <div class="Sesiones-Resultado-Fecha"><span>00/00/0000</span></div>
                                <div class="Sesiones-Resultado-Tiempo"><span>00:00:00</span></div>
    
                            </div>
                            <div class="Sesiones-Container-Resultado">
                                
                                <div class="Sesiones-Repeticion">
                                    
                                    <div class="Sesiones-Rep">
                                        <span class="Rep">0</span>
                                    </div>
                                    <div class="Sesiones-Separador"></div>
                                    <div class="Sesiones-Peso">
                                        <span class="Peso">0</span>
                                    </div>
    
                                </div>
                                <div class="Sesiones-Repeticion">
                                    
                                    <div class="Sesiones-Rep">
                                        <span class="Rep">0</span>
                                    </div>
                                    <div class="Sesiones-Separador"></div>
                                    <div class="Sesiones-Peso">
                                        <span class="Peso">0</span>
                                    </div>
    
                                </div>
    
                            </div>
    
                        </div>
    
                    </div>
    
                </div>
    
            </div>
            <div id="Dieta" class="Content">	
    
                <div class="Dieta-Horarios">
    
                    <ul>
                   @for($i = 0; $i < count($comidas); $i++)
                     @php
                         if($i <= 0) {

                            echo "<li class='Dieta-Horario-btn Dieta-Horario-Selected-btn'>";

                            } else {

                            echo "<li class='Dieta-Horario-btn'>";

                            }
                     @endphp

                     <span>{{ $comidas[$i]->Comida }}</span>
                     <input type='hidden' class='Dieta-ID_Dieta'>
                        </li>
                   @endfor

                    </ul>
    
                </div>
                <div class="Dieta-Tabla-Dietas">
                    
                    <div class="Dieta-Container">
                        
                        <div class="Dieta-Container-Titulo">
                            <span>Comidas</span>
                            <div class="Dieta-Container-btnControles">
                                <button id="Dieta-Container-btnAnadir">Añadir</button>
                                <button id="Dieta-Container-btnEliminar">Eliminar</button>
                            </div>
                        </div>
                        <div class="Dieta-Container-Dietas">
                            @php
                               $caloriasTotales = 0;
                            @endphp
                           @for($i = 0; $i < count($comidas); $i++)
                           
                            @php
                                $objJson = array();
                                for($a = 0; $a < count($dieta); $a++) {
                                    
                                if($comidas[$i]->ID_Comida == $dieta[$a]->ID_Comida) {
                                    $objJson = json_decode($dieta[$a]->Dieta, true);
                                    break;
                                }

                                }

                                
                            @endphp

                            @if($i <= 0)
                                <div id="{{ $comidas[$i]->Comida }}" class='Dieta-Container-Comida Selected-Dieta'>
                            @else 
                                <div id="{{ $comidas[$i]->Comida }}" class='Dieta-Container-Comida'>
                            @endif

                            <div class='Dieta-Tabla-Comidas'>

                                @if(!empty($objJson["Dieta"])) 

                                    <ul>
                                    <li><span>Comidas</span></li>
    
                                    @for($c = 0; $c < count($objJson["Dieta"]); $c++)
    
                                    <li><input type='text' class='Dieta-Comida' value=" {{ $objJson["Dieta"][$c]["Comida"] }}"></li>
    
                                    @endfor
    
                                    </ul>
                                    <ul>
                                    <li><span>Calorias</span></li>
                                    
                                    @for($c = 0; $c < count($objJson["Dieta"]); $c++) 
                                      @php 
                                        
                                        $caloriasTotales += $objJson["Dieta"][$c]["Calorias"];
                                      @endphp
                                        <li><input type='number' class='Dieta-Calorias' value="{{ $objJson["Dieta"][$c]["Calorias"] }}"><span class='labelCal'>Kl</span></li>
    
                                    @endfor
    
                                    </ul>
                                 @else 
    
                                           <ul>
                                            <li><span>Comidas</span></li>
                                            <li><input type='text' class='Dieta-Comida'></li>
                                            <li><input type='text' class='Dieta-Comida'></li>
                                            <li><input type='text' class='Dieta-Comida'></li>
                                        </ul>
                                        <ul>
                                            <li><span>Calorias</span></li>
                                            <li><input type='number' class='Dieta-Calorias'><span class='labelCal'>Kl</span></li>
                                            <li><input type='number' class='Dieta-Calorias'><span class='labelCal'>Kl</span></li>
                                            <li><input type='number' class='Dieta-Calorias'><span class='labelCal'>Kl</span></li>
                                        </ul>
    
                                @endif

                            </div>

                            <button class='Dieta-Comida-btnGuardar' value="{{$comidas[$i]->ID_Comida }}">Guardar</button>

                        </div>
 
                           @endfor
    
                        </div>
    
                    </div>
    
                </div>
                <div class="Dieta-Avance">
                    
                    <div class="Dieta-Avance-IMC">
                        
                        <div class="Dieta-Avance-Container">
                            
                            <div class="Dieta-Avance-Titulo">
                                <span>IMC</span>
                            </div>
                            <div class="Dieta-Avance-Titulo">
                                <span>Rango Peso Saludable</span>
                            </div>
                            <div class="Dieta-Avance-Titulo">
                                <span>Peso Ideal</span>
                            </div>
                        
                        </div>
                        
                        <div class="Dieta-Avance-Container">

                            @php 

							$alturaCuadrado = session()->get('Estatura') * session()->get('Estatura');

							$IMC = session()->get('Peso') / $alturaCuadrado;
                            $IMC=number_format($IMC,2);
							$rangoBajo = 18.5 * $alturaCuadrado;
							$rangoAlto = 25 * $alturaCuadrado;

							$rangoBajo = number_format($rangoBajo, 2);
							$rangoAlto = number_format($rangoAlto, 2);

							$pesoIdeal = ($rangoBajo + $rangoAlto)/2;
							$pesoIdeal = number_format($pesoIdeal, 2);
                            
						@endphp
    
                            <div class="Dieta-Avance-Contenido">
                                 <span class="Dieta-IMC">{{ $IMC }}</span>
                            </div>
                            <div class="Dieta-Avance-Contenido">
                                 <span class="Dieta-Rango-Peso">{{ $rangoBajo }} - {{ $rangoAlto }}</span>
                            </div>
                            <div class="Dieta-Avance-Contenido">
                                 <span class="Dieta-Peso-Ideal">{{ $pesoIdeal }}</span>
                            </div>
                        
                        </div>
    
                    </div>
    
                    <div class="Dieta-Avance-Calorias">
    
                        <div class="Dieta-Avance-Calorias-Consumidas">
                            
                            <div class="Dieta-Avance-Titulo">
                                <span>Calorias diarias consumidas</span>
                            </div>
                            <div class="Dieta-Avance-Contenido">
                                 <span>{{ $caloriasTotales }}</span>
                            </div>
    
                        </div>
                        <div class="Dieta-Avance-Calorias-Quemadas">
                            
                            <div class="Dieta-Avance-Titulo">
                                <span>Calorias diarias quemadas</span>
                            </div>
                            <div class="Dieta-Avance-Contenido">
                                 <span id="Dieta-Avance-Calorias-Quemadas-Titulo">{{ number_format($calorias, 2) }}</span>
                            </div>
    
                        </div>
                        
                    </div>
    
                </div>
    
            </div>
    
        </div>
        
        </div>

    <script type="text/javascript" src="{{ URL::to('js/jquery-3.6.0.min.js') }}"></script>
    <script type="text/javascript" src="{{ URL::to('js/IndexMobileJS.js') }}"></script>
    <script type="text/javascript" src="{{ URL::to('js/ActualizacionMobileJS.js') }}"></script>
    <script type="text/javascript" src="{{ URL::to('js/ProgresoMobile.js') }}"></script>
    <script type="text/javascript" src="{{ URL::to('js/RepeticionesMobileJS.js') }}"></script>
    <script type="text/javascript" src="{{ URL::to('js/Cronometro.js') }}"></script>
    <script type="text/javascript" src="{{ URL::to('js/CronometroMobileJS.js') }}"></script>
    <script type="text/javascript" src="{{ URL::to('js/SesionesMobileJS.js') }}"></script>
    <script type="text/javascript" src="{{ URL::to('js/DietaMobileJS.js') }}"></script>
    
</body>
</html>