$(document).ready(function() {

	var Fn = {
	
		validaRut : function (rutCompleto) {
			if (!/^[0-9]+[-|‐]{1}[0-9kK]{1}$/.test( rutCompleto ))
				return false;
			var tmp 	= rutCompleto.split('-');
			var digv	= tmp[1]; 
			var rut 	= tmp[0];
			if ( digv == 'K' ) digv = 'k' ;
			return (Fn.dv(rut) == digv );
		},
		dv : function(T){
			var M=0,S=1;
			for(;T;T=Math.floor(T/10))
				S=(S+T%10*(9-M++%6))%11;
			return S?S-1:'k';
		}
	}

	$('#btnIniciarSesion').click(function() {

		var usuario = $('#Iniciar-Usuario').val();
		var pass = $('#Iniciar-Pass').val();

		if(usuario && pass) {

			var Metodo = 102;

			$.ajax({

				type: 'GET',
				url: '/usuarios/obtenerUsuario',
				data: { 'Usuario' : usuario, 'Pass' : pass},
				dataType: 'json',
				success: function(data) {

					if(data) {

						window.location.replace('frontend');

					} else {

						alert('El usuario y/o contraseña son incorrectos');

					}

				},
				error: function(error) {

					alert("Ha corrido un error intente mas tarde");

				}

			});

		} else {

			alert('Campo usuario y/o contraseña esta(n) vacio(s)');

		}

	});

	$('#Login-Registrarse-btnRegistrarse').click(function() {

		var nombre = $('#Registrar-Nombre').val();
		var apellido = $('#Registrar-Apellido').val();
		var rut = $('#Registrar-RUT').val();
		var email = $('#Registrar-Email').val();
		var conEmail = $('#Registrar-ConEmail').val();
		var pass = $('#Registrar-Contrasena').val();
		var conPass = $('#Registrar-ConContrasena').val();
		var peso = $('#Registrar-Peso').val();
		var estatura = $('#Registrar-Estatura').val();

		var bandera1 = false;
		var bandera2 = false;
		var Metodo = 0;

		if(email.indexOf('@') >= 0) {

			if(nombre != "" &&
			   apellido != "" &&
			   rut != "" &&
			   email != "" &&
			   conEmail != "" &&
			   pass != "" &&
			   conPass != "" &&
			   peso != "" &&
			   estatura != "") {

				if(Fn.validaRut(rut)) {

					Metodo = 110;

					$.ajax({

						type: 'GET',
						url: '/usuarios/validarRutUsuario',
						data: {'Metodo' : Metodo, 'RUT' : rut},
						dataType: 'json',
						async:false,
						success: function(data) {

							if(!data) {

								bandera1 = true;

							} 

						},
						error: function(error) {

							alert("Ha corrido un error intente mas tarde");

						}

					});

					if(email != "" &&
					   email == conEmail) {

						Metodo = 109;

						$.ajax({

							type: 'GET',
							url: '/usuarios/validarEmailUsuario',
							data: {'Metodo' : Metodo, 'Email' : email},
							dataType: 'json',
							async:false,
							success: function(data) {

								if(!data) {

									bandera2 = true;

								}

							},
							error: function(error) {

								alert("Ha corrido un error intente mas tarde");

							}

						});

						if(bandera1 &&
						   bandera2) {

							if(pass != "" &&
							   pass == conPass) {

							   	Metodo = 202;

								var datos = {
									'Metodo' : Metodo,
									'Nombre' : nombre,
									'Apellido': apellido,
									'RUT' : rut,
									'Email' : email,
									'Pass' : pass,
									'Peso' : peso,
									'Estatura' : estatura
								};

								$.ajax({

									type: 'GET',
									url: '/usuarios/registrarUsuario',
									data: datos,
									dataType: 'json',
									async: false,
									success: function(data) {

										if(data) {

											$('#Registrar-Nombre').val("");
											$('#Registrar-Apellido').val("");
											$('#Registrar-RUT').val("");
											$('#Registrar-Email').val("");
											$('#Registrar-ConEmail').val("");
											$('#Registrar-Contrasena').val("");
											$('#Registrar-ConContrasena').val("");
											$('#Registrar-Peso').val("");
											$('#Registrar-Estatura').val("");

											alert('Se ha registrado de manera exitosa');

										} else {

											alert("No se ha podido crear el usuario");

										}

									},
									error:function(error) {

										alert("Ha corrido un error intente mas tarde");

									}

								});

							} else {

								alert('Los campos de contrseñas no coinciden');

							}

						} else {

							var texto = "";

							if(!bandera1) {

								texto += "El Rut ingresado ya esta en uso\n";

							}

							if(!bandera2) {

								texto += "El correo electronico ya esta en uso";

							}

							alert(texto);

						}

					} else {

						alert('Los campos de email no coinciden');

					}

				} else {

					alert('El RUT ingresado no es valido');

				}

			} else {

				alert('Se deben llenar todos los campos');

			}
		
		} else {

			alert('El correo electronico no corresponde al formato estandar');

		}

	});

	$('#Login-Ingresar-btnRegistrarse').click(function() {

		$('.Login-Container-Ingresar').removeClass('Formulario-Ingresar-Abierto');
		$('.Login-Container-Ingresar').addClass('Formulario-Ingresar-Cerrado');

		$('.Login-Container-Registrar').removeClass('Formulario-Registrarse-Cerrado');
		$('.Login-Container-Registrar').addClass('Formulario-Registrarse-Abierto');

	});

	$('#Login-Registrarse-btnIniciar').click(function() {

		$('.Login-Container-Ingresar').removeClass('Formulario-Ingresar-Cerrado');
		$('.Login-Container-Ingresar').addClass('Formulario-Ingresar-Abierto');

		$('.Login-Container-Registrar').removeClass('Formulario-Registrarse-Abierto');
		$('.Login-Container-Registrar').addClass('Formulario-Registrarse-Cerrado');

	});

});