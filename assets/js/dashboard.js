var base_url = 'http://localhost/RRHH-FIRMA/index.php/';

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


function cargarGraficoTransferenciasPorEmpresaHoy(){

	$("#myTabGraficTransferContent").empty();
	var fila = '<div class="tab-pane fade" id="hoyTransEmpresa" role="tabpanel" aria-labelledby="hoyTransEmpresa-tab"><canvas id="pieChart"></canvas></div>';
	$("#myTabGraficTransferContent").append(fila);

	var montos = [];
	var empresas = [];
	var colors = ["#19b597","#19b5b1","#19d3b1","#4fb5b1","#4fb59f","#26B99A","#4fa29f","#428c9f","#428c82"];
	var colores = [];

 	//  GRÁFICO DE TRANSFERENCIAS POR EMPRESAS --- AÑO ---
 	 var url = base_url+'transferenciasPorEmpresaHoy';

 	$.getJSON(url, function(result){
		if( result == null || result == ""){
			$("#myTabGraficTransferContent").empty();
			var fila = 'No hay transferencias hoy';
			$("#myTabGraficTransferContent").append(fila);
		}
 		 $.each(result, function(i, o){
 			 empresas.push(o.atr_nombre);
 			 montos.push(o.totalTransferencias);
 			 colores.push("#000");
 		 });

 		 if ($('#pieChart').length) {
 	 		var ctx = document.getElementById("pieChart");
 	 		var data = {
 				datasets: [{
 					data: montos,
 					backgroundColor: colors,
 					label: 'My dataset2' // for legend
 				}],
 				labels: empresas
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



function cargarGraficoTransferenciasPorEmpresaMes(){

	$("#myTabGraficTransferContent").empty();
	var fila = '<div class="tab-pane fade" id="mesTransEmpresa" role="tabpanel" aria-labelledby="mesTransEmpresa-tab"><canvas id="pieChart"></canvas></div>';
	$("#myTabGraficTransferContent").append(fila);


	var montos = [];
	var empresas = [];
	var colors = ["#19b597","#19b5b1","#19d3b1","#4fb5b1","#4fb59f","#26B99A","#4fa29f","#428c9f","#428c82"];
	var colores = [];
	// GRÁFICO DE TRANSFERENCIAS POR EMPRESAS --- MES ---
	var url = base_url+'transferenciasPorEmpresaMes';
	$.getJSON(url, function(result){
		if( result == null || result == ""){
			$("#myTabGraficTransferContent").empty();
			var fila = 'No hay transferencias este mes';
			$("#myTabGraficTransferContent").append(fila);
		}
		 $.each(result, function(i, o){
			 empresas.push(o.atr_nombre);
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
				labels: empresas
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


function cargarGraficoTransferenciasPorEmpresaAno(){

	$("#myTabGraficTransferContent").empty();
	var fila = '<div class="tab-pane fade-" id="anoTransEmpresa" role="tabpanel" aria-labelledby="anoTransEmpresa-tab"><canvas id="pieChart"></canvas></div>';
	$("#myTabGraficTransferContent").append(fila);

	var montos = [];
	var empresas = [];
	var colors = ["#19b597","#19b5b1","#19d3b1","#4fb5b1","#4fb59f","#26B99A","#4fa29f","#428c9f","#428c82"];
	var colores = [];

 	//  GRÁFICO DE TRANSFERENCIAS POR EMPRESAS --- AÑO ---
 	 var url = base_url+'transferenciasPorEmpresaAno';

 	$.getJSON(url, function(result){
		if( result == null || result == ""){
			$("#myTabGraficTransferContent").empty();
			var fila = 'No hay transferencias el presente año';
			$("#myTabGraficTransferContent").append(fila);
		}
 		 $.each(result, function(i, o){
 			 empresas.push(o.atr_nombre);
 			 montos.push(o.totalTransferencias);
 			 colores.push("#000");
 		 });

 		 if ($('#pieChart').length) {
 	 		var ctx = document.getElementById("pieChart");
 	 		var data = {
 				datasets: [{
 					data: montos,
 					backgroundColor: colors,
 					label: 'My dataset2' // for legend
 				}],
 				labels: empresas
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




function cargarGraficoTransferenciasPorEmpresaPrimerSemestre(){

	$("#myTabGraficTransferContent").empty();
	var fila = '  <div class="tab-pane fade" id="primerSemestreTransEmpresa" role="tabpanel" aria-labelledby="primerSemestreTransEmpresa-tab"><canvas id="pieChart"></canvas></div>';
	$("#myTabGraficTransferContent").append(fila);


	var montos = [];
	var empresas = [];
	var colors = ["#19b597","#19b5b1","#19d3b1","#4fb5b1","#4fb59f","#26B99A","#4fa29f","#428c9f","#428c82"];
	var colores = [];
	// GRÁFICO DE TRANSFERENCIAS POR EMPRESAS --- MES ---
	var url = base_url+'transferenciasPorEmpresaPrimerSemestre';
	$.getJSON(url, function(result){
		if( result == null || result == ""){
			$("#myTabGraficTransferContent").empty();
			var fila = 'No hay transferencias el primer semestre';
			$("#myTabGraficTransferContent").append(fila);
		}
		 $.each(result, function(i, o){
			 empresas.push(o.atr_nombre);
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
				labels: empresas
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


function cargarGraficoTransferenciasPorEmpresaSegundoSemestre(){

	$("#myTabGraficTransferContent").empty();
	var fila = '<div class="tab-pane fade" id="segundoSemestreTransEmpresa" role="tabpanel" aria-labelledby="segundoSemestreTransEmpresa-tab"><canvas id="pieChart"></canvas></div>';
	$("#myTabGraficTransferContent").append(fila);


	var montos = [];
	var empresas = [];
	var colors = ["#19b597","#19b5b1","#19d3b1","#4fb5b1","#4fb59f","#26B99A","#4fa29f","#428c9f","#428c82"];
	var colores = [];
	// GRÁFICO DE TRANSFERENCIAS POR EMPRESAS --- MES ---
	var url = base_url+'transferenciasPorEmpresaSegundoSemestre';
	$.getJSON(url, function(result){

		 $.each(result, function(i, o){
			 if( o == null || o == ""){
	 			$("#myTabGraficTransferContent").empty();
	 			var fila = 'No hay transferencias el segundo semestre';
	 			$("#myTabGraficTransferContent").append(fila);
	 		}
			 empresas.push(o.atr_nombre);
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
				labels: empresas
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


		if(dia < 10){
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
			fechaTermino = o.atr_fechaTermino.split("-");
			fechaTermino = fechaTermino[2]+"-"+fechaTermino[1]+"-"+fechaTermino[0];

			// alert("fecha actual: "+fechaActual+" fecha termino: "+fechaTermino);

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
