var base_url = 'http://10.10.11.240/RRHH-FIRMA/index.php/';

function cargarCantidadContratos(){

	var url = base_url+'totalContratosPlazo';
	var fila = "";
	$.getJSON(url, function(result){
		$.each(result, function(i, o){
			fila += '<h4 class="card-text text-center">'+o.total+'</h4>';
		});
		$("#contratosPlazo").append(fila);
		fila = "";
	});


	url = base_url+'totalContratosIndefinidos';
	$.getJSON(url, function(result){
		$.each(result, function(i, o){
			fila += '<h4 class="card-text text-center">'+o.total+'</h4>';
		});
		$("#contratosIndefinido").append(fila);
		fila = "";
	});

	url = base_url+'totalContratosPorProyecto';
	$.getJSON(url, function(result){
		$.each(result, function(i, o){
			fila += '<h4 class="card-text text-center">'+o.total+'</h4>';
		});
		$("#contratosProyecto").append(fila);
		fila = "";
	});
}



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

// Función para calcular los días transcurridos entre dos fechas
function restarFechas(f1,f2){
	 var aFecha1 = f1.split('-');
	 var aFecha2 = f2.split('-');
	 var fFecha1 = Date.UTC(aFecha1[2],aFecha1[1]-1,aFecha1[0]);
	 var fFecha2 = Date.UTC(aFecha2[2],aFecha2[1]-1,aFecha2[0]);
	 var dif = fFecha2 - fFecha1;
	 var dias = Math.floor(dif / (1000 * 60 * 60 * 24));
	 return dias;
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


		if(dia > 10){
			dia = "0"+dia;
		}
		if(mes < 10){
			mes = "0"+mes;
		}
		var fechaActual = dia+"-"+mes+"-"+ano;

		$("#contenedorNotificaciones").empty();
		var fila = "", tiempo = 0;

		$.each(msg.msg, function (i, o) {

			// Obtengo fecha desde la base de datos
			var fechaTermino = o.atr_fechaTermino;
			
			// calculo diferencia de fechas para saber cuántos días quedan antes de caducar el contrato.
			tiempo = restarFechas(fechaActual,fechaTermino);
			tiempo = Math.round(tiempo);
			// alert("math round es :"+tiempo);

			// Establecer la cantidad de días de anticipacipón en que se mostraran las alertas
			if( tiempo <= 5 && tiempo >= 0){
				fila += '<li class="col-sm-12 col-md-12" style="padding-left:3px; padding-right:3px; background-color:#C40012; color:#fff"><a><span><span style="margin-left:9px;"><b>Vence en '+tiempo+' días</b></span><br><span style="margin-left:12px;">'+o.atr_nombres+" "+o.atr_apellidos+'</span></span><br><span class="message" style="margin-left:12px;">'+o.cargo+'</span></a></li>';
			}
		});
		$("#contenedorNotificaciones").append(fila);

	});

}
