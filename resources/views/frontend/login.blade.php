<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<title>Inicio Sesion</title>
    <link rel="stylesheet" href="{{ URL::to('css/LoginMobile.css') }}"/>

</head>
<body>

	<div class="Login-Principal-Container">

		<div class="Login-Container-Ingresar Formulario-Ingresar-Abierto">

			<div class="Login-Ingresar-Fondo"></div>

			<div class="Login-Ingresar-Titulo">
				
				<div class="Login-Ingresar-Container-Titulo">
					<span class="Login-Ingresar-Titulo-Logo">Fitland</span>
					<p class="Login-Ingresar-Titulo-Login">Iniciar Sesion</p>
				</div>

			</div>

			<div class="Login-Ingresar-Formulario">
				
				<div class="Elemento Elemento-Ingresar">
					
					<div class="Campo Campo-Ingresar">
					<input type="text" id="Iniciar-Usuario" required>
					<label class="lbl-Campo">
						<span class="txt-Campo">Usuario</span>
					</label>
					</div>

					<div class="Campo Campo-Ingresar">
					<input type="password" id="Iniciar-Pass" required>
					<label class="lbl-Campo">
						<span class="txt-Campo">Clave</span>
					</label>
					</div>

					<button id="btnIniciarSesion" class="Login-btnFormulario">Iniciar Sesion</button>

				</div>

			</div>

			<div id="Login-Ingresar-btnRegistrarse" class="Login-Ingresar-RegistrarUsuario">
				
				<div class="Login-Ingresar-btnRegistro">
					<span>¿No tienes Cuenta?</span>
					<p>Crea una</p>
				</div>

			</div>

		</div>

		<div class="Login-Container-Registrar Formulario-Registrarse-Cerrado">
			
			<div class="Login-Registrar-Titulo">
				
				<div class="Login-Registrar-Titulo-Titulo">
				<div><span>Fitland</span></div>
				<div><span>Registrarse</span></div>
				</div>

			</div>
			<div class="Login-Registrar-Formulario">
				
				<div class="Elemento Elemento-Registrarse">
					
					<div class="Campo Campo-Registrar">
					<input type="text" id="Registrar-Nombre" required>
					<label class="lbl-Campo">
						<span class="txt-Campo">Nombre</span>
					</label>
					</div>

					<div class="Campo Campo-Registrar">
					<input type="text" id="Registrar-Apellido" required>
					<label class="lbl-Campo">
						<span class="txt-Campo">Apellido</span>
					</label>
					</div>

					<div class="Campo Campo-Registrar">
					<input type="text" id="Registrar-RUT" required>
					<label class="lbl-Campo">
						<span class="txt-Campo">RUT</span>
					</label>
					</div>

					<div class="Campo Campo-Registrar">
					<input type="text" id="Registrar-Email" required>
					<label class="lbl-Campo">
						<span class="txt-Campo">Email</span>
					</label>
					</div>

					<div class="Campo Campo-Registrar">
					<input type="text" id="Registrar-ConEmail" required>
					<label class="lbl-Campo">
						<span class="txt-Campo">Confirmar Email</span>
					</label>
					</div>

					<div class="Campo Campo-Registrar">
					<input type="password" id="Registrar-Contrasena" required>
					<label class="lbl-Campo">
						<span class="txt-Campo">Contraseña</span>
					</label>
					</div>

					<div class="Campo Campo-Registrar">
					<input type="password" id="Registrar-ConContrasena" required>
					<label class="lbl-Campo">
						<span class="txt-Campo">Confirmar Contraseña</span>
					</label>
					</div>

					<div class="Campo Campo-Registrar">
					<input type="number" id="Registrar-Peso" value="50" required>
					<label class="lbl-Campo">
						<span class="txt-Campo">Peso</span>
					</label>
					</div>

					<div class="Campo Campo-Registrar">
					<input type="number" id="Registrar-Estatura" value="1.50" step="0.01" required>
					<label class="lbl-Campo">
						<span class="txt-Campo">Estatura</span>
					</label>
					</div>

					<button id="Login-Registrarse-btnRegistrarse" class="Login-btnFormulario">Registrarse</button>

				</div>

			</div>
			<div class="Login-Registrarse-Ingresar">
				
				<div id="Login-Registrarse-btnIniciar">
					<span>¿Tienes una cuenta?</span>
					<p>Inicia sesion</p>
				</div>

			</div>

		</div>

	</div>
    <script type="text/javascript" src="{{ URL::to('js/jquery-3.6.0.min.js') }}"></script>
    <script type="text/javascript" src="{{ URL::to('js/LoginMobile.js') }}"></script>
</body>
</html>