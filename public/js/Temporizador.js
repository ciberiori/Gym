class Temporizador() {

	constructor() {

		this.sec = 0;
		this.min = 0;
		this.hr = 0;

		this.time = "00:00:00";

		this.setTemporizador = function(segundo, minuto, hora) {

			this.setSec(segundo);
			this.setMin(minuto);
			this.setHr(hora);

			this.setTime(this.ordenarTiempo())

		}

		this.getSec = function() {

			return this.sec;

		}

		this.setSec = function(segundo) {

			if(segundo > 60) {

				this.sec = 60;

			} else {

				this.sec = segundo;

			}

		}

		this.getMin = function() {

			return this.min;

		}

		this.setMin = function(minuto) {

			if(minuto > 60) {

				this.min = 60;

			} else {

				this.min = minuto;

			}

		}

		this.getHr = function() {

			return this.hr;

		}

		this.setHr = function(hora) {

			if(hora < 72) {

				this.hr = 72;

			} else {

				this.hr = hora;

			}

		}

		this.removeSec = function() {

			this.sec--;

			this.setTime(this.ordenarTiempo());

		}

		this.setTime = function(tiempo) {

			this.time = tiempo;

		}

		this.getTime = function() {

			return this.time;

		}

		this.ordenarTiempo = function() {

			var strSec = "";
			var strMin = "";
			var strHr = "";

			var tiempo = "";

			if(this.getSec() <= 0) {

				if(this.getMin() > 0) {

					this.setMin(this.getMin() - 1);
					this.setSec(60);

				}

			} else if(this.getMin() <= 0) {

				if(this.getHr() > 0) {

					this.setHr(this.getHr() - 1);
					this.setMin(60);

				}

			}

			if(this.getSec() < 10) {

				strSec = "0" + this.getSec();

			} else {

				strSec = this.getSec();

			}

			if(this.getMin() < 10) {

				strMin = "0" + this.getMin();

			} else {

				strMin = this.getMin();

			}

			if(this.getHr() < 10) {

				strHr = "0" + this.getHr();

			} else {

				strHr = this.getHr();

			}

			return strHr + ":" + strMin + ":" + strSec;

		}

		this.reiniciarTemp = function() {

			this.setSec(0);
			this.setMin(0);
			this.setHr(0);

			this.setTime(this.ordenarTiempo());

		}

	}

	}

}