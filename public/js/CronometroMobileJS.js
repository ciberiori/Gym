$(document).ready(function() {

	var inter;

	const cronometroTotal = new Cronometro();
	const cronometroInt = new Cronometro();

	$('#Cronometro-btnEmpezar').click(function() {

		startInterval();

		$(this).prop('disabled', true);
		$('#Cronometro-btnDetener').prop('disabled', false);

	});

	$('#Cronometro-btnDetener').click(function() {

		stopInterval();

		$('#Cronometro-btnEmpezar').prop('disabled', false);
		$(this).prop('disabled', true);

	});

	$('#Cronometro-btnReiniciar').click(function() {

		cronometroTotal.reiniciarTemp();
		cronometroInt.reiniciarTemp();

		var tiempo = cronometroTotal.getTime();

		$('#Cronometro-Tiempo')[0].innerHTML = tiempo;

	});

	$('#Cronometro-btnMarcar').click(function() {

		var tiempoActual = cronometroTotal.getTime();
		var tiempoIntervalo = cronometroInt.getTime();

		var intervalos = [];

		var tiempos = {"tiempoActual" : tiempoActual, "Intervalo" : tiempoIntervalo};
		intervalos[intervalos.length] = tiempos;

		cronometroInt.reiniciarTemp();

		var area = $('#Cronometro-Log-Tiempo-Record')[0];

		area.innerHTML += "</br>El tiempo Actual es: " + intervalos[intervalos.length - 1]["tiempoActual"] + "</br>";
		area.innerHTML += "Intervalo: " + intervalos[intervalos.length - 1]["Intervalo"] + "</br>";

	});

	function startInterval() {

		inter = setInterval(function() {

			cronometroTotal.addSec();
			cronometroInt.addSec();

			$('#Cronometro-Tiempo')[0].innerHTML = cronometroTotal.time;

		}, 1000);

	}

	function stopInterval() {

		clear();

		setTimeout(function() {}, 1000);

	}

	function clear() {

		clearInterval(inter);

	}
	
});