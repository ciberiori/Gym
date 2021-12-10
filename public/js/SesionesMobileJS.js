$(document).ready(function() {

	var inicioLimitador = 0;
	var terminoLimitador = 10;

	$('#Sesiones-cajaRegion').change(function() {

		var region = $(this)[0].selectedOptions[0].value;

		loadArea(region);

	});

	$('#Sesiones-cajaArea').change(function() {

		var area = $(this)[0].selectedOptions[0].value;

		loadEjercicios(area);

	});

	$('#Sesiones-btnBuscar').click(function() {

		var usuario = $('#ID_Usuario').val();
		var ejercicio = $('#Sesiones-cajaEjercicio').val();

		if(ejercicio) {

			var Metodo = 106;

			var datos = {

				'Metodo' : Metodo,
				'ID_Usuario' : usuario,
				'Ejercicio' : ejercicio,
				'LI' : inicioLimitador,
				'LF' : terminoLimitador

			};

			$.ajax({

				type: 'GET',
				url: 'Consultas/DataConsulter.php',
				contentType: 'application/json; charset=utf-8',
				data: datos,
				dataType: 'json',
				async: true,
				success: function(data) {

					var contSesiones = $('.Sesiones-Resultados')[0];

					if(data) {

						$('.Sesiones-Resultados').empty();

						for(var i = 0; i < data.length; i++) {

							var contDatos = document.createElement('div');
							contDatos.className = 'Sesiones-Resultado-Repeticion';

							var contFecha = document.createElement('div');
							contFecha.className = 'Sesiones-Container-Fecha';
							
							var contResultFecha = document.createElement('div');
							contResultFecha.className = 'Sesiones-Resultado-Fecha';
							var txtFecha = document.createElement('span');
							txtFecha.innerHTML = data[i].Fecha;

							contResultFecha.append(txtFecha);

							var contResultTiempo = document.createElement('div');
							contResultTiempo.className = 'Sesiones-Resultado-Tiempo';
							var txtTiempo = document.createElement('span');
							txtTiempo.innerHTML = data[i].Tiempo;

							contResultTiempo.append(txtTiempo);

							contFecha.append(contResultFecha);
							contFecha.append(contResultTiempo);
							contDatos.append(contFecha);

							var contResultado = document.createElement('div');
							contResultado.className = 'Sesiones-Container-Resultado';

							contDatos.append(contResultado);

							var dataObj = JSON.parse(data[i].Repeticion);

							for(var a = 0; a < dataObj.Repeticiones.length; a++) {

								var contRepeticion = document.createElement('div');
								contRepeticion.className = 'Sesiones-Repeticion';

								var contRep = document.createElement('div');
								contRep.className = 'Sesiones-Rep';
								var txtRep = document.createElement('span');
								txtRep.innerHTML = dataObj.Repeticiones[a]["R"];

								contRep.append(txtRep);

								var contDivisor = document.createElement('div');
								contDivisor.className = 'Sesiones-Separador';

								var contPeso = document.createElement('div');
								contPeso.className = 'Sesiones-Peso';
								var txtPeso = document.createElement('span');
								txtPeso.innerHTML = dataObj.Repeticiones[a]["P"];

								contPeso.append(txtPeso);

								contRepeticion.append(contRep);
								contRepeticion.append(contDivisor);
								contRepeticion.append(contPeso);

								contResultado.append(contRepeticion);

							}

							contSesiones.append(contDatos);

						}

					}

				},
				error: function(error) {

					alert("Ha corrido un error intente mas tarde");

				}

			});

		} else {

			alert("Debe seleccionar un ejercicio");

		}

	});

	function loadArea(region) {

	if(region) {

		var Metodo = 101;

		$.ajax({

			type: 'GET',
			url: 'Consultas/DataConsulter.php',
			contentType: 'application/json; charset=utf-8',
			data: {'Metodo' : Metodo, 'Region' : region},
			dataType: 'json',
			async: true,
			success: function(data) {

				var cajaArea = $('#Sesiones-cajaArea');

				if(data) {

					cajaArea.empty();

					const option1 = document.createElement('option');
					option1.value = "";
					option1.innerHTML = "Seleccione una Region";

					cajaArea.append(option1);

					for(var i = 0; i < data.length; i++) {

						const option2 = document.createElement('option');
						option2.value = data[i]["ID_Area"];
						option2.innerHTML = data[i]["Area"];

						cajaArea.append(option2);

					}

				} else {

					alert("No se han encontrado datos");

				}

			},
			error: function(error) {

				alert("Ha corrido un error intente mas tarde");

			}

		});

	} else {

		cajaArea.empty();

		const option = document.createElement('option');
		option.value = "";
		option.text = "-- Seleccione una Region --";

		cajaArea.append(option);

	}

}

function loadEjercicios(area) {

	if(area) {

		var Metodo = 103;

		$.ajax({

			type: 'GET',
			url: 'Consultas/DataConsulter.php',
			contentType: 'application/json; charset=utf-8',
			data: {'Metodo' : Metodo, 'Area' : area},
			dataType: 'json',
			async: true,
			success: function(data) {

				var cajaEjercicio = $('#Sesiones-cajaEjercicio');

				if(data) {

					cajaEjercicio.empty();

					const option1 = document.createElement('option');
					option1.value = "";
					option1.innerHTML = "Seleccione un Ejercicio";

					cajaEjercicio.append(option1);

					for(var i = 0; i < data.length; i++) {

						const option2 = document.createElement('option');
						option2.value = data[i]["ID_Ejercicio"];
						option2.innerHTML = data[i]["Ejercicio"];

						cajaEjercicio.append(option2);

					}

				} else {

					cajaEjercicio.empty();

					const option1 = document.createElement('option');
					option1.value = "";
					option1.innerHTML = "Seleccione un Ejercicio";

					cajaEjercicio.append(option1);

				}

			},
			error: function(error) {

				alert("Ha corrido un error intente mas tarde");

			}

		});

	}

}

});