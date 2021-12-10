$(document).ready(function() {

	$('#Actualizacion-btnAtras').click(function() {

		var contPerfil = $('.Actualizacion-Container-Principal');

		contPerfil.removeClass('Actualizacion-Abierta');
		contPerfil.addClass('Actualizacion-Cerrada');

	});

	$('#Actualizacion-btnDatosPersonales').click(function() {

		var idUsuario = $('#ID_Usuario').val();
		var nombre = $('#Actualizacion-Nombre').val();
		var apellido = $('#Actualizacion-Apellido').val();
		var peso = $('#Actualizacion-Peso').val();
		var estatura = $('#Actualizacion-Estatura').val();

		if(nombre != "" &&
			apellido != "" &&
			peso != "" &&
			estatura != "") {

			var Metodo = 301;

			var datos = {

				'Metodo' : Metodo,
				'ID_Usuario' : idUsuario,
				'Nombre' : nombre,
				'Apellido' : apellido,
				'Peso' : peso,
				'Estatura' : estatura

			};

			$.ajax({

				type: 'GET',
				url: 'Consultas/DataConsulter.php',
				contentType: 'application/json; charset=utf-8',
				data: datos,
				dataType: 'json',
				async: true,
				success: function(data) {

					if(data) {

						alert('Los datos se han actualizado correctamente');

					} else {

						alert('Los datos no se han actualziado');

					}

				},
				error: function(error) {

					alert("Ha corrido un error intente mas tarde");

				}

			});

		}

	});

	$('#Actualizacion-btnCredenciales').click(function() {

		var idUsuario = $('#ID_Usuario').val();
		var email = $('#Actualizacion-Email').val();
		var pass = $('#Actualizacion-Pass').val();

		if(email != "" &&
			pass != "") {

			var Metodo = 302;

			var datos = {

				'Metodo' : Metodo,
				'ID_Usuario' : idUsuario,
				'Email' : email,
				'Pass' : pass

			};

			$.ajax({

				type: 'GET',
				url: 'Consultas/DataConsulter.php',
				contentType: 'application/json; charset=utf-8',
				data: datos,
				dataType: 'json',
				async: true,
				success: function(data) {

					if(data) {

						alert('Los datos se han actualizado correctamente');

					} else {

						alert('Los datos no se han actualizado');

					}

				},
				error: function(error) {

					alert("Ha corrido un error intente mas tarde");

				}

			});

		}

	});

});