$(document).ready(function() {

	var btnFrame = $('.Index-Label-Selected')[0];
	var align = btnFrame.offsetHeight * 0.20;
	$('.Index-Marcador').css({top: btnFrame.offsetTop + align});

	$('.Index-Panel-btnPanelCerrar').click(function() {

		var panel = $('.Index-Panel-lateral');

		panel.removeClass('Index-Panel-Abierto');
		panel.addClass('Index-Panel-Cerrado');

	});

	$('.Index-Panel-btnPanelAbrir').click(function() {

		var panel = $('.Index-Panel-lateral');

		panel.removeClass('Index-Panel-Cerrado');
		panel.addClass('Index-Panel-Abierto');

	});

	$('.Index-Panel-Opciones').click(function() {

		var panel = $('.Index-Panel-lateral-Opciones');

		panel.removeClass('Index-Panel-Opciones-Cerrado');
		panel.addClass('Index-Panel-Opciones-Abierto');

	});

	$('.Index-Panel-Opciones-Logo').click(function() {

		var panel = $('.Index-Panel-lateral-Opciones');

		panel.removeClass('Index-Panel-Opciones-Abierto');
		panel.addClass('Index-Panel-Opciones-Cerrado');

	});

	$('#Opciones-btnPerfil').click(function() {

		var contPerfil = $('.Actualizacion-Container-Principal');

		contPerfil.removeClass('Actualizacion-Cerrada');
		contPerfil.addClass('Actualizacion-Abierta');

	});

	$('#Opciones-Info-Contacto').click(function() {

		var cont = $('.Opciones-Panel-Corredizo');

		if(cont.hasClass('Contacto-Cerrado')) {

			cont.removeClass('Contacto-Cerrado');
			cont.addClass('Contacto-Abierto');

		} else {

			cont.removeClass('Contacto-Abierto');
			cont.addClass('Contacto-Cerrado');

		}

	});

	$('#Index-Boton-CerrarSesion').click(function() {

		var Metodo = 3;

		$.ajax({

			type: 'GET',
			url: 'Consultas/DataConsulter.php',
			contentType: 'application/json; charset=utf-8',
			data: {'Metodo' : Metodo},
			dataType: 'json',
			async: true,
			success: function(data) {

				if(data) {

					window.location.replace('LoginMobile.php');

				} else {

					console.log('No se ha podido cerrar la sesion');

				}

			},
			error: function(error) {

				alert("Ha corrido un error intente mas tarde");

			}

		});

	});

	$('.Index-Panel-lateral-Botones li').click(function() {

		var btn = $(this);
		var btnSelected = $('.Index-Label-Selected');

		var frameSelected = $('.Index-Container-Selected');

		if(!btn.hasClass('Index-Label-Selected')) {

			btnSelected.removeClass('Index-Label-Selected');
			var id = btn[0].className;

			btn.addClass('Index-Label-Selected');
			var btnFrame = $('.Index-Label-Selected')[0];
			var align = btnFrame.offsetHeight * 0.20;
			$('.Index-Marcador').css({top: btnFrame.offsetTop + align});

			frameSelected.removeClass('Index-Container-Selected');
			$('#' + id).addClass('Index-Container-Selected');

		}

	});

});