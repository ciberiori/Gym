$(document).ready(function() {

	var hhh = $('#Repeticion-Nueva');
	var cantRep = $('#Repeticion-Nueva')[0].children.length;
	var repMin = 2;
	var repMax = 6;

	var inter;
	var repCronometro = new Cronometro();

	var met = 4.8;
	var mult = 0.0175;
	var peso = $('#Peso_Usuario').val();

	buttonsEnabled();

	$('#Repeticiones-cajaRegion').change(function() {

		var region = $(this)[0].selectedOptions[0].value;

		loadArea(region);

	});

	$('#Repeticiones-cajaArea').change(function() {

		var area = $(this)[0].selectedOptions[0].value;

		loadEjercicios(area);

	});

	$('#Repeticiones-cajaEjercicio').change(function() {

		var ejercicio = $(this)[0].selectedOptions[0].value;

		lastRutina(ejercicio);

	});

	$('.Repeticiones-btn-addRutina').click(function() {

		var ejercicio = $('#Repeticiones-cajaEjercicio')[0].selectedOptions[0].value;

		if(ejercicio) {

			var container1 = $('.Repeticiones-Panel-Principal');
			var container2 = $('.Repeticiones-Nueva-Repeticion');

			container1.removeClass('Panel-Abierto');
			container1.addClass('Panel-Cerrado');
			container2.removeClass('Repeticion-Cerrada');
			container2.addClass('Nueva-Repeticion');

		} else {

			alert('Debe seleccionar un ejercicio');

		} 

	});

	$('#Repeticiones-btnIniciar-Cronometro').click(function() {

		startInterval();

		$(this).prop('disabled', true);
		$('#Repeticiones-btnDetener-Cronometro').prop('disabled', false);

	});

	$('#Repeticiones-btnDetener-Cronometro').click(function() {

		stopInterval();

		$(this).prop('disabled', true);
		$('#Repeticiones-btnIniciar-Cronometro').prop('disabled', false);

	});

	$('#Repeticion-Nueva').on('keyup', '.Rep, .Peso', function() {

		if(this.value >= 0) {

			var contRepAntigua = $('#Repeticion-Anterior')[0];
			var contRepComp = $('#Repeticion-Comparador')[0];
			var nodoContainer = this.offsetParent.offsetParent;
			var indexContainer = 0;
			var posicion = 0;

			while(nodoContainer = nodoContainer.previousElementSibling) {

				indexContainer++;

			}

			if(this.className == 'Rep') {

				posicion = 0;

			} else {

				posicion = 2;
				
			}

			var num1 = parseInt(this.value);

			if(isNaN(num1)) {

				num1 = 0;

			}

			var num2 = 0;

			if(contRepAntigua.children[indexContainer] != undefined) {

				num2 = parseInt(contRepAntigua.children[indexContainer].children[posicion].children[0].innerHTML);

			}

			var contador = num1 - num2;
			var resultado = "";

			if(contador > 0) {

				resultado = "+" + contador;

			} else {

				resultado = contador.toString();

			}

			contRepComp.children[indexContainer].children[posicion].children[0].innerHTML= resultado;

			var contadorRep = 0;
			var contadorPeso = 0;

			for(var i = 0; i < contRepComp.children.length; i++) {

				contadorRep += parseInt(contRepComp.children[i].children[0].children[0].innerHTML);
				contadorPeso += parseInt(contRepComp.children[i].children[2].children[0].innerHTML);

			}

			contadorPeso = (contadorPeso/contRepComp.children.length);

			$('#Repeticiones-Contador-Repeticiones')[0].innerHTML = contadorRep;

		} else {

			this.value = 0;
			alert('El numero debe ser ayor a 0');

		}

	});

	$('#Repeticiones-btnAgregarFila').click(function() {

		if(cantRep < repMax) {

			var contRepComp = $('#Repeticion-Comparador')[0];

			var container1 = document.createElement('div');
			container1.className = 'Repeticiones-Repeticion';

			var contRep1 = document.createElement('div');
			contRep1.className = 'Repeticion-Rep';
			var inputRep1 = document.createElement('input');
			inputRep1.type = 'number';
			inputRep1.className = 'Rep';

			var contSep1 = document.createElement('div');
			contSep1.className = 'Repeticion-Separador';

			var contPeso1 = document.createElement('div');
			contPeso1.className = 'Repeticion-Peso';
			var inputPeso1 = document.createElement('input');
			inputPeso1.type = 'number';
			inputPeso1.className = 'Peso';

			contRep1.append(inputRep1);
			contPeso1.append(inputPeso1);

			container1.append(contRep1);
			container1.append(contSep1);
			container1.append(contPeso1);

			$('#Repeticion-Nueva').append(container1);

			var container2 = document.createElement('div');
			container2.className = 'Repeticiones-Repeticion';

			var contRep2 = document.createElement('div');
			contRep2.className = 'Repeticion-Rep';
			var inputRep2 = document.createElement('span');
			inputRep2.innerHTML = 0;
			inputRep2.className = 'Rep';

			var contSep2 = document.createElement('div');
			contSep2.className = 'Repeticion-Separador';

			var contPeso2 = document.createElement('div');
			contPeso2.className = 'Repeticion-Peso';
			var inputPeso2 = document.createElement('span');
			inputPeso2.innerHTML = 0;
			inputPeso2.className = 'Peso';

			contRep2.append(inputRep2);
			contPeso2.append(inputPeso2);

			container2.append(contRep2);
			container2.append(contSep2);
			container2.append(contPeso2);

			contRepComp.append(container2);

			cantRep++;

			buttonsEnabled();

		}

	});

	$('#Repeticiones-btnElimnarFila').click(function() {

		if(cantRep > repMin) {

			var contRep = $('#Repeticion-Nueva')[0];
			var contCompRep = $('#Repeticion-Comparador')[0];

			contRep.children[cantRep - 1].remove();
			contCompRep.children[cantRep -1].remove();
			cantRep--;

			buttonsEnabled();

		}

	});

	$('#Repeticiones-Cancelar-Repeticion').click(function() {

		restartRepeticion();

	});

	$('#Repeticiones-Guardar-Repeticion').click(function() {

		var usuario = $('#ID_Usuario').val();
		var ejercicio = $('#Repeticiones-cajaEjercicio').val();

		if(usuario != "" &&
		   ejercicio != "") {

			var texto = encodeData();
			var tiempo = repCronometro.time;

			if(texto) {

				var Metodo = 201;

				var datos = {

					'Metodo' : Metodo,
					'Repeticion' : texto,
					'Ejercicio' : ejercicio,
					'ID_Usuario' : usuario,
					'Tiempo' : tiempo

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

							alert("Se ha registrado con exito ");

							restartRepeticion();
							lastRutina(ejercicio);
							loadData();

						} else {

							alert("No se podido registrar su repeticion");

						}

					},
					error: function(error) {

						alert("Ha corrido un error intente mas tarde");

					}

				});

			} else {

				alert('Debe llenar todos los campos disponibles');

			}

		}
		
	});

	function buttonsEnabled() {

		var btnAgregarFila = $('#Repeticiones-btnAgregarFila');
		var btnEliminarFila = $('#Repeticiones-btnElimnarFila');

		if(cantRep < repMax) {

			btnAgregarFila.prop('disabled', false);

		} else if(cantRep >= repMax) {

			btnAgregarFila.prop('disabled', true);

		} else {

			btnAgregarFila.prop('disabled', false);

		}

		if(cantRep > repMin) {

			btnEliminarFila.prop('disabled', false);

		} else if(cantRep <= repMin) {

			btnEliminarFila.prop('disabled', true);

		} else {

			btnEliminarFila.prop('disabled', false);

		}

	}

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

				if(data) {

					var cajaArea = $('#Repeticiones-cajaArea');

					cajaArea.empty();

					const option1 = document.createElement('option');
					option1.value = "";
					option1.innerHTML = "Seleccione un Area";

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

		var cajaArea = $('#Repeticiones-cajaArea');

		cajaArea.empty();

		const option = document.createElement('option');
		option.value = "";
		option.text = "Seleccione una Region";

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

				var cajaEjercicio = $('#Repeticiones-cajaEjercicio');

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

function lastRutina(ejercicio) {

	var usuario = $('#ID_Usuario').val();
	var Metodo = 0;

	if(ejercicio) {

		Metodo = 111;

		$.ajax({

			type: 'GET',
			url: 'Consultas/DataConsulter.php',
			contentType: 'application/json; charset=utf-8',
			data: {'Metodo' : Metodo, 'Ejercicio' : ejercicio},
			dataType: 'json',
			async: false,
			success: function(data) {

				if(data) {

					var contDescripcion = $('.Repeticiones-Rutinas-Descripcion span')[0];

					contDescripcion.innerHTML = data.Descripcion;

				}

			},
			error: function(error) {

				alert("Ha corrido un error intente mas tarde");

			}

		});

		Metodo = 104;

		$.ajax({

			type: 'GET',
			url: 'Consultas/DataConsulter.php',
			contentType: 'application/json; charset=utf-8',
			data: {'Metodo' : Metodo, 'ID_Usuario' : usuario, 'Ejercicio' : ejercicio},
			dataType: 'json',
			async: false,
			success: function(data) {

				var repResultados = $('.Repeticiones-Detalle-Repeticion');
				var repRepeticiones = $('#Repeticion-Anterior');
				repResultados.empty();
				repRepeticiones.empty();

				if(data) {

					$('#Repeticiones-Fecha-Principal').text(data.Fecha);

					var obj = JSON.parse(data.Repeticion);

					for(var i = 0; i < obj.Repeticiones.length; i++) {

						var container1 = document.createElement('div');
						container1.className = 'Repeticiones-Repeticion';

						var contRep1 = document.createElement('div');
						contRep1.className = 'Repeticion-Rep';
						var txtRep1 = document.createElement('span');
						txtRep1.innerHTML = obj.Repeticiones[i]['R'];
						contRep1.append(txtRep1);

						var contSeparador1 = document.createElement('div');
						contSeparador1.className = 'Repeticion-Separador';

						var contPeso1 = document.createElement('div');
						contPeso1.className = 'Repeticion-Peso';
						var txtPeso1 = document.createElement('span');
						txtPeso1.innerHTML = obj.Repeticiones[i]['P'];
						contPeso1.append(txtPeso1);

						container1.append(contRep1);
						container1.append(contSeparador1);
						container1.append(contPeso1);

						repResultados.append(container1);

						var container2 = document.createElement('div');
						container2.className = 'Repeticiones-Repeticion';

						var contRep2 = document.createElement('div');
						contRep2.className = 'Repeticion-Rep';
						var txtRep2 = document.createElement('span');
						txtRep2.innerHTML = obj.Repeticiones[i]['R'];
						contRep2.append(txtRep2);

						var contSeparador2 = document.createElement('div');
						contSeparador2.className = 'Repeticion-Separador';

						var contPeso2 = document.createElement('div');
						contPeso2.className = 'Repeticion-Peso';
						var txtPeso2 = document.createElement('span');
						txtPeso2.innerHTML = obj.Repeticiones[i]['P'];
						contPeso2.append(txtPeso2);

						container2.append(contRep2);
						container2.append(contSeparador2);
						container2.append(contPeso2);

						repRepeticiones.append(container2);

						if(i >= repMax) {

							break;

						}

					}

				} else {

					var texto = document.createElement('span');
					texto.className = 'Repeticiones-No-Data';
					texto.innerHTML = "No existen datos registrados";

					repResultados.append(texto);

				}

			},
			error: function(error) {

				console.log(error);

			}

		});

	} else {

		$('#Repeticiones-Repeticiones-Resultado').empty();

		var container = document.createElement('div');
		container.className = "Elemento";

		const texto = document.createElement('p');
		texto.innerHTML = "Debe seleccionar un ejercicio disponible";

		container.append(texto);
		$('#Repeticiones-Repeticiones-Resultado').append(container);

	}

}

function encodeData() {

		var contenido = $('#Repeticion-Nueva')[0];

		var texto = '{"Repeticiones": [';
		var bandera = true;
		var cont = 0;

		for(var a = 0; a < cantRep; a++) {

			if(contenido.children[a].children[0].children[0].value === "" ||
			   contenido.children[a].children[2].children[0].value === "") {

				bandera = false;
				break;

			}

			if(cont > 0) {

				texto += ",";

			}

			texto += '{"R":' + contenido.children[a].children[0].children[0].value + ', "P":' + contenido.children[a].children[2].children[0].value + ' }';
			cont++;

		}

		texto += ']}';

		if(bandera) {

			return texto;

		} else {

			return bandera;

		}

	}

function startInterval() {

		inter = setInterval(function() {

			repCronometro.addSec();

			$('#Repeticiones-Contador-Calorias')[0].innerHTML = calCalorias();
			$('#Repeticiones-Cronometro')[0].innerHTML = repCronometro.time;

		}, 1000);

	}

	function stopInterval() {

		clear();

		setTimeout(function() {}, 1000);

	}

	function clear() {

		clearInterval(inter);

	}

	function restartRepeticion() {

		var container1 = $('.Repeticiones-Panel-Principal');
		var container2 = $('.Repeticiones-Nueva-Repeticion');

		container1.removeClass('Panel-Cerrado');
		container1.addClass('Panel-Abierto');
		container2.removeClass('Nueva-Repeticion');
		container2.addClass('Repeticion-Cerrada');

		stopInterval();
		repCronometro.reiniciarTemp();
		$('#Repeticiones-Cronometro')[0].innerHTML = repCronometro.time;

		var contRep = $('#Repeticion-Nueva')[0];
		var contComp = $('#Repeticion-Comparador')[0];

		for(var i = contRep.children.length; i > repMin; i--) {

			contRep.children[i - 1].remove();
			contComp.children[i - 1].remove();
			cantRep--;

		}

		for(var i = 0; i < cantRep; i++) {

			contRep.children[i].children[0].children[0].value = "";
			contRep.children[i].children[2].children[0].value = "";
			contComp.children[i].children[0].children[0].innerHTML = "0";
			contComp.children[i].children[2].children[0].innerHTML = "0";

		}

		$('#Repeticiones-Contador-Repeticiones')[0].innerHTML = 0;
		$('#Repeticiones-Contador-Calorias')[0].innerHTML = 0;

		buttonsEnabled();

	}

	function calCalorias() {

		var calorias = 0;
		var minutosTotales = 0;

		minutosTotales += repCronometro.hr * 60;
		minutosTotales += repCronometro.min;

		calorias = parseFloat(((peso * met) * mult) * minutosTotales).toFixed(2);

		return calorias;

	}

	function loadData() {

		$('.Progreso-Botones-Lapsos li.Progreso-Selected-Lapso').trigger('click');

		var usuario = $('#ID_Usuario').val();
		var Metodo = 112;

		$.ajax({

			type: 'GET',
			url: 'Consultas/DataConsulter.php',
			contentType: 'application/json; charset=utf-8',
			data: {'Metodo' : Metodo, 'ID_Usuario' : usuario},
			dataType: 'json',
			async: false,
			success: function(data) {

				$('#Dieta-Avance-Calorias-Quemadas-Titulo').text(data);

			},
			error: function(error) {

				console.log(error);

			}

		});

	}

});