class Cronometro {

	constructor() {

		this.sec = 0;
		this.min = 0;
		this.hr = 0;

		this.time = "00:00:00";

		this.getSec = function() {

			return this.sec;

		}

		this.setSec = function(segundo) {

			this.sec = segundo;

		}

		this.getMin = function() {

			return this.min;

		}

		this.setMin = function(minuto) {

			this.min = minuto;

		}

		this.getHr = function() {

			return this.hr;

		}

		this.setHr = function(hora) {

			this.hr = hora;

		}

		this.addSec = function() {

			this.sec++;

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

			if(this.getSec() >= 60) {

				this.setSec(0);
				this.setMin(this.getMin() + 1)

			} else if(this.getMin() >= 60) {

				this.setMin(0);
				this.setHr(this.getHr() + 1);

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