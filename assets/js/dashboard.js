var base_url = 'http://localhost/RRHH-FIRMA/index.php/';



function cargarGraficoTransferenciasMes(){

	var montos = [];
	var bancos = [];
	var colors = ["#19b597","#19b5b1","#19d3b1","#4fb5b1","#4fb59f","#26B99A","#4fa29f","#428c9f","#428c82"];
	var colores = [];

	var url = base_url+'transferenciasPorBancoMes';

	$.getJSON(url, function(result){
		 $.each(result, function(i, o){
			 bancos.push(o.atr_nombre);
			 montos.push(o.totalTransferencias);
			 colores.push("#000");
		 });

		 if ($('#pieChart').length) {
	 		var ctx = document.getElementById("pieChart");
	 		var data = {
	 				datasets: [{
	 						data: montos,
	 						backgroundColor: colors,
	 						label: 'My dataset' // for legend
	 				}],
	 				labels: bancos
	 		};

	 		var pieChart = new Chart(ctx, {
	 				data: data,
	 				type: 'pie',
	 				otpions: {
	 						legend: false
	 				}
	 		});
	 	}
	 });

}


function cargarNotificaciones(){
	$.ajax({
			url: 'buscarContratosPorVencer',
			type: 'GET',
			dataType: 'json',
			data: {}
	}).then(function (msg) {
		// Obtener y convertir fecha actual
		var fecha = new Date();
		var dia = fecha.getDate(); var mes = fecha.getMonth()+1; var ano = fecha.getFullYear();

		var fechaActual = dia+"-"+mes+"-"+ano;


		$("#contenedorNotificaciones").empty();
		var fila = "", tiempo = 0;

		$.each(msg.msg, function (i, o) {

			// Obtengo fecha desde la base de datos
			var fechaTermino = o.atr_fechaTermino;
			// calculo diferencia de fechas para saber cuántos días quedan antes de caducar el contrato.
			tiempo = calcularDias(fechaActual,fechaTermino);
			tiempo = Math.round(tiempo);

			// Establecer la cantidad de días de anticipacipón en que se mostraran las alertas
			if( tiempo <= 5 && tiempo >= 0){
				fila += '<li class="col-sm-12 col-md-12" style="padding-left:3px; padding-right:3px; background-color:#C40012; color:#fff"><a><span><span style="margin-left:9px;"><b>Vence en '+tiempo+' días</b></span><br><span style="margin-left:12px;">'+o.atr_nombres+" "+o.atr_apellidos+'</span></span><br><span class="message" style="margin-left:12px;">'+o.cargo+'</span></a></li>';
			}
		});

		$("#contenedorNotificaciones").append(fila);

		if( $("#contenedorNotificaciones").html()=="" ){
			$("#contenedorDeContratosPorCaducar").css({ display: "none" });
		}

	});

}





function isValidDate(day,month,year)
	{
		var dteDate;
		month=month-1;
		dteDate=new Date(year,month,day);
		return ((day==dteDate.getDate()) && (month==dteDate.getMonth()) && (year==dteDate.getFullYear()));
	}



function validate_fecha(fecha){
	var patron=new RegExp("^([0-9]{1,2})([-])([0-9]{1,2})([-])(19|20)+([0-9]{2})$");

	if(fecha.search(patron)==0)
	{
		var values=fecha.split("-");
		if(isValidDate(values[0],values[1],values[2]))
		{
			return true;
		}
	}
	return false;
}






// FUNCIÓN QUE CALCULA LA CANTIDAD DE DÍAS DE DIFERENCIA ENTRE 2 FECHAS INGRESADAS
function calcularDias(fechaInicial, fechaFinal){
  // LAS FECHAS DE PARAMETROS DEBEN IR EN FORMATO DD-MM-YYYY
	var resultado="";
	if(validate_fecha(fechaInicial) && validate_fecha(fechaFinal))
	{
		inicial=fechaInicial.split("-");
		final=fechaFinal.split("-");
		// obtenemos las fechas en milisegundos
		var dateStart=new Date(inicial[2],(inicial[1]-1),inicial[0]);
          var dateEnd=new Date(final[2],(final[1]-1),final[0]);
          if(dateStart<dateEnd)
          {
			// la diferencia entre las dos fechas, la dividimos entre 86400 segundos
			// que tiene un dia, y posteriormente entre 1000 ya que estamos
			// trabajando con milisegundos.
			resultado=(((dateEnd-dateStart)/86400)/1000);
		}else{
			resultado="La fecha inicial es posterior a la fecha final";
		}
	}else{
		if(!validate_fecha(fechaInicial))
			resultado="La fecha inicial es incorrecta";
		if(!validate_fecha(fechaFinal))
			resultado="La fecha final es incorrecta";
	}
	return resultado;
}
