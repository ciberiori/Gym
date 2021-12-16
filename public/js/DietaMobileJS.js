$(document).ready(function() {

	var cantMaxComida = 5;

	$('.Dieta-Horarios ul li').click(function() {

		var botonSelected = $('.Dieta-Horarios li.Dieta-Horario-Selected-btn');
		var botonClick = $(this)

		if(!botonClick.hasClass('Dieta-Horario-Selected-btn')) {

			botonSelected.removeClass('Dieta-Horario-Selected-btn');
			botonClick.addClass('Dieta-Horario-Selected-btn');

			var containerSelected = $('.Dieta-Container-Dietas div.Selected-Dieta');
			containerSelected.removeClass('Selected-Dieta');

			var id = botonClick[0].children[0].innerHTML;
			$('#' + id).addClass('Selected-Dieta');

		}

	});

	$('#Dieta-GuardarComida').click(function() {

		var idUsuario = $('#ID_Usuario').val();
		var Horario = $(this).value;

	});

	$('#Dieta-Container-btnAnadir').click(function() {

		var cantActual = $('.Selected-Dieta div.Dieta-Tabla-Comidas')[0].children[0].children.length - 1;

		if(cantActual < cantMaxComida) {
			
			var contComidas = $('.Selected-Dieta div.Dieta-Tabla-Comidas')[0];
			var contComidasTXT = contComidas.children[0];
			var contComidasKl = contComidas.children[1];

			var contLista1 = document.createElement('li');
			var campoComida = document.createElement('input');
			contLista1.append(campoComida);

			var contLista2 = document.createElement('li');
			var campoCalorias = document.createElement('input');
			var labelKl = document.createElement('span');
			labelKl.innerHTML = "Kl";
			labelKl.className = "labelCal";
			contLista2.append(campoCalorias);
			contLista2.append(labelKl);

			contComidasTXT.append(contLista1);
			contComidasKl.append(contLista2);

			contComidas.append(contComidasTXT);
			contComidas.append(contComidasKl);

		}

	});

	$('#Dieta-Container-btnEliminar').click(function() {

		var cantActual = $('.Selected-Dieta div.Dieta-Tabla-Comidas')[0].children[0].children.length - 1;

		if(cantActual > 0) {

			var contComidas = $('.Selected-Dieta div.Dieta-Tabla-Comidas')[0];
			var contComidasTXT = contComidas.children[0];
			var contComidasKl = contComidas.children[1];

			contComidasTXT.children[cantActual].remove();
			contComidasKl.children[cantActual].remove();

		}

	});

	$('.Dieta-Comida-btnGuardar').click(function() {

		var idUsuario = $('#ID_Usuario').val();
		var idComida = $(this).val();

		if(idUsuario != "" &&
			idComida != "") {

			var texto = encodeData();

			if(texto) {

				var Metodo = 90;

				var datos = {

					'Metodo' : Metodo,
					'ID_Usuario' : idUsuario,
					'ID_Comida' : idComida,
					'Dieta' : texto

				};

				$.ajax({

					type: 'GET',
					url: '/dieta/persistirDietaUsuario',
					contentType: 'application/json; charset=utf-8',
					data: datos,
					dataType: 'json',
					async: true,
					success: function(data) {

						if(data.Bandera) {

							alert("Se ha " + data.Estado + " correctamente");

						} else {

							alert("No se ha " + data.Estado + " correctamente");

						}

					},
					error: function(error) {

						alert("Ha corrido un error intente mas tarde");

					}

				});

			} else {

				alert("Debe llenar todos los campos");

			}

		}
		
	});

	function encodeData() {

		var tablaDatos = $('.Dieta-Container-Dietas div.Selected-Dieta')[0].children[0];
		var tablaComidas = tablaDatos.children[0];
		var tablaCalorias = tablaDatos.children[1];

		var texto = '{"Dieta": [';
		var bandera = true;
		var cont = 0;

		for(var i = 1; i < tablaComidas.children.length; i++) {

			if(tablaComidas.children[i].children[0].value === "" ||
			   tablaCalorias.children[i].children[0].value === "") {

				bandera = false;
				break;

			}

			if(cont > 0) {

				texto += ",";

			}

			texto += '{"Comida": "' + tablaComidas.children[i].children[0].value + '", "Calorias": ' + tablaCalorias.children[i].children[0].value + ' }'
			cont++;

		}

		texto += ']}'

		if(bandera) {

			return texto;

		} else {

			return bandera;

		}

	}

});