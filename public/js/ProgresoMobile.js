$(document).ready(function() {

	$('.Progreso-Botones-Lapsos li').click(function() {

		var botonSelected = $('.Progreso-Botones-Lapsos li.Progreso-Selected-Lapso');
		var botonClick = $(this)

		if(!botonClick.hasClass('Progreso-Selected-Lapso')) {

			botonSelected.removeClass('Progreso-Selected-Lapso');
			botonClick.addClass('Progreso-Selected-Lapso');

		}

	});

	$('#Progreso-btnDiario').click(function() {

		var usuario = $('#ID_Usuario').val();
		var semana = "";
		var Metodo = 4;

		$.ajax({

			type: 'GET',
			url: 'Consultas/DataConsulter.php',
			contentType: 'application/json; charset=utf-8',
			data: {'Metodo' : Metodo},
			dataType: 'json',
			async: false,
			success: function(data) {

				fecha = data;
				loadTablaProgreso(usuario, fecha, semana);

			},
			error: function(error) {

				alert("Ha corrido un error intente mas tarde");

			}

		});

	});

	$('#Progreso-btnSemanal').click(function() {

		var usuario = $('#ID_Usuario').val();
		var fecha = "";
		var semana = 0;
		var Metodo = 5;

		$.ajax({

			type: 'GET',
			url: 'Consultas/DataConsulter.php',
			contentType: 'application/json; charset=utf-8',
			data: {'Metodo' : Metodo},
			dataType: 'json',
			async: false,
			success: function(data) {

				semana = parseInt(data);
				loadTablaProgreso(usuario, fecha, semana);

			},
			error: function(error) {

				alert("Ha corrido un error intente mas tarde");

			}

		});

	});

	$('#Progreso-btnMensual').click(function() {

		var usuario = $('#ID_Usuario').val();
		var fecha = "%/";
		var semana = "";
		var Metodo = 6;

		$.ajax({

			type: 'GET',
			url: 'Consultas/DataConsulter.php',
			contentType: 'application/json; charset=utf-8',
			data: {'Metodo' : Metodo},
			dataType: 'json',
			async: false,
			success: function(data) {

				fecha += data + "/";

			},
			error: function(error) {

				alert("Ha corrido un error intente mas tarde");

			}

		});

		Metodo = 7;

		$.ajax({

			type: 'GET',
			url: 'Consultas/DataConsulter.php',
			contentType: 'application/json; charset=utf-8',
			data: {'Metodo' : Metodo},
			dataType: 'json',
			async: false,
			success: function(data) {

				fecha += data;
				loadTablaProgreso(usuario, fecha);

			},
			error: function(error) {

				alert("Ha corrido un error intente mas tarde");

			}

		});

	});

	$('#Progreso-btnAnual').click(function() {

		var usuario = $('#ID_Usuario').val();
		var fecha = "%/";
		var semana = "";
		var Metodo = 7;

		$.ajax({

			type: 'GET',
			url: 'Consultas/DataConsulter.php',
			contentType: 'application/json; charset=utf-8',
			data: {'Metodo' : Metodo},
			dataType: 'json',
			async: false,
			success: function(data) {

				fecha += data;
				loadTablaProgreso(usuario, fecha, semana);

			},
			error: function(error) {

				alert("Ha corrido un error intente mas tarde");

			}

		});

	});

	function loadTablaProgreso(usuario, fecha, semana) {

		var Metodo = 108;
		var jsonData = {"Metodo" : Metodo, "ID_Usuario" : usuario};

		if(semana) {

			jsonData.Semana = semana;

		} else {

			jsonData.Fecha = fecha;

		}

		$.ajax({

			type: 'GET',
			url: 'Consultas/DataConsulter.php',
			contentType: 'application/json; charset=utf-8',
			data: jsonData,
			dataType: 'json',
			async: true,
			success: function(data) {

				$('#Progreso-CantActividades').text(data.CantidadActividades);
				$('#Progreso-RepTotales').text(data.Repeticiones);
				$('#Progreso-PesoPromedio').text(data.PesoPromedio);
				$('#Progreso-TiempoEntrenado').text(data.Tiempo);
				$('#Progreso-CaloriasQuemadas').text(data.Calorias);

			},
			error: function(error) {

				alert("Ha corrido un error intente mas tarde");

			}

		});

	}

});