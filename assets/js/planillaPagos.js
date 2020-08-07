var base_url = "https://www.imlchile.cl/grupofirma/index.php/";

function cargarTablaPlanillaPagoMes() {
	var table = $("#tabla_planillaBanco").DataTable();
	table.destroy();

	var mesActual = $("#getSelectMes").val();
	var anoActual = $("#getSelectAno").val();
	var diaTermino = 29;
	var empresa = $("#getSelectEmpresa").val();

	if (mesActual == "00") {
		var fechaHoy = new Date();
		var mesActual = fechaHoy.getMonth() + 1;
		if (mesActual < 10) {
			mesActual = "0" + mesActual;
		}
	}

	if (
		mesActual == "04" ||
		mesActual == "06" ||
		mesActual == "09" ||
		mesActual == "11"
	) {
		diaTermino = 30;
	} else {
		if (
			mesActual == "01" ||
			mesActual == "03" ||
			mesActual == "05" ||
			mesActual == "07" ||
			mesActual == "08" ||
			mesActual == "10" ||
			mesActual == "12"
		) {
			diaTermino = 31;
		}
	}

	$(".dataTables-planillaBanco").DataTable({
		autoWidth: false,
		sInfo: false,
		sInfoEmpty: false,
		dom: '<"top"f>rt<"bottom"flp><"clear">',
		language: {
			sProcessing: "Procesando...",
			sLengthMenu: "Registros&nbsp;&nbsp; _MENU_ ",
			sZeroRecords: "No se encontraron resultados",
			sEmptyTable: "Ningún dato disponible en esta tabla",
			sInfo: "",
			sInfoEmpty: "",
			sInfoFiltered: "",
			sInfoPostFix: "",
			sSearch: "Buscar:&nbsp;&nbsp;",
			sUrl: "",
			sInfoThousands: ",",
			sLoadingRecords: "Cargando...",
			oPaginate: {
				sFirst: "Primero",
				sLast: "Último",
				sNext: "Siguiente",
				sPrevious: "Anterior",
			},
			oAria: {
				sSortAscending:
					": Activar para ordenar la columna de manera ascendente",
				sSortDescending:
					": Activar para ordenar la columna de manera descendente",
			},
			buttons: {
				copy: "Copiar",
				colvis: "Visibilidad",
			},
		},
		ajax: {
			url:
				"https://www.imlchile.cl/grupofirma/index.php/getListadoPlanillaPagoMes?year=" +
				anoActual +
				"&&mes=" +
				mesActual +
				"&&diaTermino=" +
				diaTermino +
				"&&empresa=" +
				empresa,
			type: "GET",
			data: {},
		},
		columnDefs: [
			{
				targets: 12,
				data: null,
				defaultContent: "",
			},
		],
		dom: '<"html5buttons"B>lTfgitp',
		buttons: [
			{
				extend: "copy",
				exportOptions: {
					columns: [0, 1, 2, 3, 4, 5, 6, 7, 8, 9, 10, 11],
				},
			},
			{
				extend: "csv",
				exportOptions: {
					columns: [0, 1, 2, 3, 4, 5, 6, 7, 8, 9, 10, 11],
				},
			},
			{
				extend: "excel",
				title: "Listado de pagos mensuales",
				exportOptions: {
					columns: [0, 1, 2, 3, 4, 5, 6, 7, 8, 9, 10, 11],
				},
			},
			{
				extend: "pdf",
				title: "Listado de pagos mensuales",
				exportOptions: {
					columns: [0, 1, 2, 3, 4, 5, 6, 7, 8, 9, 10, 11],
				},
			},
			{
				extend: "print",
				title: "Listado de pagos mensuales",
				exportOptions: {
					columns: [0, 1, 2, 3, 4, 5, 6, 7, 8, 9, 10, 11],
				},
				customize: function (win) {
					$(win.document.body).addClass("white-bg");
					$(win.document.body).css("font-size", "10px");
					$(win.document.body)
						.find("table")
						.addClass("compact")
						.css("font-size", "inherit");
				},
			},
		],
		lengthMenu: [
			[100, 50, 25, -1],
			[100, 50, 25, "All"],
		],
	});
}

function cargarTablaPagosFinDeMes() {
	var table = $("#tabla_pagos5").DataTable();
	table.destroy();

	var mesActual = $("#getSelectMes").val();
	var anoActual = $("#getSelectAno").val();
	var diaTermino = 29;
	var empresa = $("#getSelectEmpresa").val();

	if (mesActual == "00") {
		var fechaHoy = new Date();
		var mesActual = fechaHoy.getMonth() + 1;
		if (mesActual < 10) {
			mesActual = "0" + mesActual;
		}
	}

	if (
		mesActual == "04" ||
		mesActual == "06" ||
		mesActual == "09" ||
		mesActual == "11"
	) {
		diaTermino = 30;
	} else {
		if (
			mesActual == "01" ||
			mesActual == "03" ||
			mesActual == "05" ||
			mesActual == "07" ||
			mesActual == "08" ||
			mesActual == "10" ||
			mesActual == "12"
		) {
			diaTermino = 31;
		}
	}

	var btnAcciones = "";

	// VER DETALLE
	btnAcciones +=
		'<button style="display:inline" type="button" id="btnVerDetallePago" class="btn btn-info btn-sm" data-toggle="modal" data-target="#modalDetallePago"><i class="glyphicon glyphicon-usd"></i></button>';

	// CARGAR COMPROBANTE
	btnAcciones +=
		'<button style="display:inline" type="button" id="btnCargarComprobante" class="btn btn-info btn-sm" data-toggle="modal" data-target="#modalCargarArchivo"><i class="glyphicon glyphicon-open"></i></button>';

	//generarliquidacion VHT
	btnAcciones +=
		'<button style="display:inline" type="button" id="btnVerLiquidacion" class="btn btn-info btn-sm" data-toggle="modal" data-target="#modalGenerarLiquidacion"><i class="glyphicon glyphicon-edit"></i></button>';

	$(".dataTables-tabla_pagos5").DataTable({
		autoWidth: false,
		sInfo: false,
		sInfoEmpty: false,
		dom: '<"top"f>rt<"bottom"flp><"clear">',
		language: {
			sProcessing: "Procesando...",
			sLengthMenu: "Registros&nbsp;&nbsp; _MENU_ ",
			sZeroRecords: "No se encontraron resultados",
			sEmptyTable: "Ningún dato disponible en esta tabla",
			sInfo: "",
			sInfoEmpty: "",
			sInfoFiltered: "",
			sInfoPostFix: "",
			sSearch: "Buscar:&nbsp;&nbsp;",
			sUrl: "",
			sInfoThousands: ",",
			sLoadingRecords: "Cargando...",
			oPaginate: {
				sFirst: "Primero",
				sLast: "Último",
				sNext: "Siguiente",
				sPrevious: "Anterior",
			},
			oAria: {
				sSortAscending:
					": Activar para ordenar la columna de manera ascendente",
				sSortDescending:
					": Activar para ordenar la columna de manera descendente",
			},
			buttons: {
				copy: "Copiar",
				colvis: "Visibilidad",
			},
		},
		ajax: {
			url:
				"https://www.imlchile.cl/grupofirma/index.php/getListadoPagosFinDeMes?year=" +
				anoActual +
				"&&mes=" +
				mesActual +
				"&&diaTermino=" +
				diaTermino +
				"&&empresa=" +
				empresa,
			type: "GET",
			data: {},
		},
		columnDefs: [
			{
				targets: 10,
				data: null,
				defaultContent: btnAcciones,
			},
		],
		dom: '<"html5buttons"B>lTfgitp',
		buttons: [],
		lengthMenu: [
			[100, 50, 25, -1],
			[100, 50, 25, "All"],
		],
	});
}

function getDetallePagoTrabajador(idTrabajador) {
	var mesActual = $("#getSelectMes").val();
	var anoActual = $("#getSelectAno").val();
	var diaTermino = 29;

	if (mesActual == "00") {
		var fechaHoy = new Date();
		var mesActual = fechaHoy.getMonth() + 1;
		if (mesActual < 10) {
			mesActual = "0" + mesActual;
		}
	}

	if (
		mesActual == "04" ||
		mesActual == "06" ||
		mesActual == "09" ||
		mesActual == "11"
	) {
		diaTermino = 30;
	} else {
		if (
			mesActual == "01" ||
			mesActual == "03" ||
			mesActual == "05" ||
			mesActual == "07" ||
			mesActual == "08" ||
			mesActual == "10" ||
			mesActual == "12"
		) {
			diaTermino = 31;
		}
	}

	$.ajax({
		url: "getDetallePagoTrabajador",
		type: "POST",
		dataType: "json",
		data: {
			idTrabajador: idTrabajador,
			year: anoActual,
			mes: mesActual,
			diaTermino: diaTermino,
		},
	}).then(function (response) {
		var fila = "";
		$("#contenedorDetallePago").empty();

		$.each(response, function (i, o) {
			var bonoColacionAPagar = new Intl.NumberFormat("es-ES").format(
				Math.round(o.bonoColacionAPagar)
			);
			var bonoMovilizacionAPagar = new Intl.NumberFormat("es-ES").format(
				Math.round(o.bonoMovilizacionAPagar)
			);
			var bonoAsistenciaAPagar = new Intl.NumberFormat("es-ES").format(
				Math.round(o.bonoAsistenciaAPagar)
			);

			fila += '<div class="col-lg-6 col-md-6 col-sm-6"><br>';
			fila +=
				'<label class="text-center" for="sueldoBase">SUELDO LÍQUIDO</label>';
			fila +=
				'<input type="text" class="form-control custom-input-sm" id="sueldoBase" disabled style="color:#000;" value="$' +
				o.sueldoBase +
				'">';
			fila += "</div>";

			fila += '<div class="col-lg-6 col-md-6 col-sm-6"><br>';
			fila +=
				'<label class="text-center" for="sueldoAPago">SUELDO A PAGO</label>';
			fila +=
				'<input type="text" class="form-control custom-input-sm" id="sueldoAPago" disabled style="color:#000;" value="$' +
				o.sueldoAPago +
				'">';
			fila += "</div>";

			fila += '<div class="col-lg-6 col-md-6 col-sm-6"><br>';
			fila +=
				'<label class="text-center" for="inasistencias">INASISTENCIAS</label>';
			fila +=
				'<input type="text" class="form-control custom-input-sm" id="inasistencias" disabled style="color:#000;" value="' +
				o.inasistencias +
				'">';
			fila += "</div>";

			fila += '<div class="col-lg-6 col-md-6 col-sm-6"><br>';
			fila +=
				'<label class="text-center" for="diasAPagar">DÍAS A PAGAR</label>';
			fila +=
				'<input type="text" class="form-control custom-input-sm" id="diasAPagar" disabled style="color:#000;" value="' +
				o.diasAPagar +
				'">';
			fila += "</div>";

			fila +=
				'<h5 class="col-lg-12 col-md-12 text-center" style="color:#fff; margin-top:20px">BONOS</h5>';

			fila += '<div class="col-lg-5 col-md-5"><br>';
			fila +=
				'<label class="text-center" for="bonoColacion">BONO DE COLACIÓN</label>';
			fila +=
				'<input type="text" class="form-control custom-input-sm" id="bonoColacion" disabled style="color:#000;" value="$' +
				o.bonoColacionBase +
				'">';
			fila += "</div>";

			fila += '<div class="col-lg-3 col-md-3 col-sm-6"><br>';
			fila +=
				'<label class="text-center" for="bonoColacionPorDia">BONO POR DÍA</label>';
			fila +=
				'<input type="text" class="form-control custom-input-sm" id="bonoColacionPorDia" disabled style="color:#000;" value="$' +
				o.bonoColacionDiario +
				'">';
			fila += "</div>";

			fila += '<div class="col-lg-4 col-md-4 col-sm-6"><br>';
			fila +=
				'<label class="text-center" for="bonoColacionAPagar">BONO A PAGAR</label>';
			fila +=
				'<input type="text" class="form-control custom-input-sm" id="bonoColacionAPagar" disabled style="color:#000;" value="$' +
				bonoColacionAPagar +
				'">';
			fila += "</div>";

			fila += '<div class="col-lg-5 col-md-5"><br>';
			fila +=
				'<label class="text-center" for="bonoMovilizacion">BONO DE MOVILIZACIÓN</label>';
			fila +=
				'<input type="text" class="form-control custom-input-sm" id="bonoMovilizacion" disabled style="color:#000;" value="$' +
				o.bonoBaseMovilizacion +
				'">';
			fila += "</div>";

			fila += '<div class="col-lg-3 col-md-3 col-sm-6"><br>';
			fila +=
				'<label class="text-center" for="bonoMovilizacionPorDia">BONO POR DÍA</label>';
			fila +=
				'<input type="text" class="form-control custom-input-sm" id="bonoMovilizacionPorDia" disabled style="color:#000;" value="$' +
				o.bonoMovilizacionDiaria +
				'">';
			fila += "</div>";

			fila += '<div class="col-lg-4 col-md-4 col-sm-6"><br>';
			fila +=
				'<label class="text-center" for="bonoMovilizacionAPagar">BONO A PAGAR</label>';
			fila +=
				'<input type="text" class="form-control custom-input-sm" id="bonoMovilizacionAPagar" disabled style="color:#000;" value="$' +
				bonoMovilizacionAPagar +
				'">';
			fila += "</div>";

			fila += '<div class="col-md-8 col-sm-12"><br>';
			fila +=
				'<label class="text-center" for="bonoAsistencia">BONO DE ASISTENCIA Y PUNTUALIDAD</label>';
			fila +=
				'<input type="text" class="form-control custom-input-sm" id="bonoAsistencia" disabled style="color:#000;" value="$' +
				o.bonoBaseAsistencia +
				'">';
			fila += "</div>";

			fila += '<div class="col-md-4 col-sm-12"><br>';
			fila +=
				'<label class="text-center" for="bonoAsistencia">BONO A PAGAR</label>';
			fila +=
				'<input type="text" class="form-control custom-input-sm" id="bonoAsistencia" disabled style="color:#000;" value="$' +
				bonoAsistenciaAPagar +
				'">';
			fila += "</div>";
			/*  fila += '<input type="text" id="bonoAsistenciaAPagar" value="'+o.bonoAsistenciaAPagar+'"></input>' */

			if (o.arrayPrestamos != "") {
				fila +=
					'<h5 class="col-md-12 text-center" style="color:#fff; margin-top:20px">PRÉSTAMOS</h5>';

				fila += '<div class="col-md-4" style="margin-bottom:-20px"><br>';
				fila += "<label>MONTO TOTAL</label>";
				fila += "</div>";

				fila += '<div class="col-md-4" style="margin-bottom:-20px"><br>';
				fila += "<label>N° DE CUOTA</label>";
				fila += "</div>";

				fila += '<div class="col-md-4" style="margin-bottom:-20px"><br>';
				fila += "<label>MONTO DESCUENTO</label>";
				fila += "</div>";
			}

			// recorrer listado de prestamos
			$.each(o.arrayPrestamos, function (i, p) {
				var atr_montoTotal = new Intl.NumberFormat("de-DE").format(
					p.atr_montoTotal
				);
				var atr_montoDescontar = new Intl.NumberFormat("de-DE").format(
					p.atr_montoDescontar
				);

				// número de la cuota
				fila += '<div class="col-md-4"><br>';
				fila +=
					'<input type="text" class="form-control custom-input-sm" disabled style="color:#000;" value="$' +
					atr_montoTotal +
					'">';
				fila += "</div>";

				// monto total del préstamo
				fila += '<div class="col-md-4"><br>';
				fila +=
					'<input type="text" class="form-control custom-input-sm" disabled style="color:#000;" value="' +
					p.atr_numCuota +
					"/" +
					p.atr_cantidadCuotas +
					'">';
				fila += "</div>";

				// monto de descuento
				fila += '<div class="col-md-4"><br>';
				fila +=
					'<input type="text" class="form-control custom-input-sm" disabled style="color:#000;" value="$' +
					atr_montoDescontar +
					'">';
				fila += "</div>";
			});

			if (o.arrayAdelantos != "") {
				fila +=
					'<h5 class="col-md-12 text-center" style="color:#fff; margin-top:20px">ADELANTOS</h5>';

				fila += '<div class="col-md-6" style="margin-bottom:-20px"><br>';
				fila += "<label>FECHA</label>";
				fila += "</div>";

				fila += '<div class="col-md-6" style="margin-bottom:-20px"><br>';
				fila += "<label>MONTO</label>";
				fila += "</div>";
			}

			//recorrer listado de adelantos
			$.each(o.arrayAdelantos, function (i, a) {
				// cambiar formato de visluzación de la fecha
				var fechaOrdenadaAdelanto = a.atr_fecha.split("-");
				fechaOrdenadaAdelanto =
					fechaOrdenadaAdelanto[2] +
					"-" +
					fechaOrdenadaAdelanto[1] +
					"-" +
					fechaOrdenadaAdelanto[0];

				// fecha del adelanto
				fila += '<div class="col-md-6"><br>';
				fila +=
					'<input type="text" class="form-control custom-input-sm" disabled style="color:#000;" value="' +
					fechaOrdenadaAdelanto +
					'">';
				fila += "</div>";

				// monto del adelanto
				var atr_monto = new Intl.NumberFormat("de-DE").format(a.atr_monto);
				fila += '<div class="col-md-6"><br>';
				fila +=
					'<input type="text" class="form-control custom-input-sm" disabled style="color:#000;" value="$' +
					atr_monto +
					'">';
				fila += "</div>";
			});
		});

		$("#contenedorDetallePago").append(fila);
	});
}

/* VHT */
function getGenerarLiquidacion(idTrabajador) {
	var mesActual = $("#getSelectMes").val();
	var anoActual = $("#getSelectAno").val();
	var diaTermino = 29;

	if (mesActual == "00") {
		var fechaHoy = new Date();
		var mesActual = fechaHoy.getMonth() + 1;
		if (mesActual < 10) {
			mesActual = "0" + mesActual;
		}
	}

	if (
		mesActual == "04" ||
		mesActual == "06" ||
		mesActual == "09" ||
		mesActual == "11"
	) {
		diaTermino = 30;
	} else {
		if (
			mesActual == "01" ||
			mesActual == "03" ||
			mesActual == "05" ||
			mesActual == "07" ||
			mesActual == "08" ||
			mesActual == "10" ||
			mesActual == "12"
		) {
			diaTermino = 31;
		}
	}

	$.ajax({
		url: "getGenerarLiquidacion",
		type: "POST",
		dataType: "json",
		data: {
			idTrabajador: idTrabajador,
			year: anoActual,
			mes: mesActual,
			diaTermino: diaTermino,
		},
	}).then(function (response) {
		var fila = "";
		$("#contenedorGenerarLiquidacion").empty();

		$.each(response, function (i, o) {
			/* var bonoAsistenciaAPagar = new Intl.NumberFormat("es-ES").format(
				Math.round(o.bonoAsistenciaAPagar)
			); */

			/* vht */

			/* remuneraciones mes corriente */
			fila += '<div class="col-lg-6 col-md-6 col-sm-6"><br>';

			fila +=
				'<label class="text-center" for="mesCorriente">REMUNERACIONES MES:</label>';
			fila +=
				'<input type="text" class="form-control custom-input-sm" id="mesCorriente" disabled style="color:#000;" value="' +
				o.mesCorriente +
				" " +
				o.añoLiquidacion +
				'">';
			fila += "</div>";

			fila += '<div class="col-lg-6 col-md-6 col-sm-6"><br>';

			fila +=
				'<label class="text-center" for="fechaTermino">Fecha Emision:</label>';
			fila +=
				'<input type="text" class="form-control custom-input-sm" id="fechaTermino" disabled style="color:#000;" value="' +
				o.fechaTermino +
				'">';
			fila += "</div>";
			/* nombre empresa contrato razon social*/
			fila +=
				'<p class="col-md-12 text-center" style="color:#fff;text-decoration: underline;margin-top:80px; margin-bottom:0px">DATOS EMPRESA</p>';
			fila += '<div class="col-lg-6 col-md-6 col-sm-6"><br>';
			fila +=
				'<label class="text-center" for="razonSocial">RAZON SOCIAL</label>';
			fila +=
				'<input type="text" class="form-control custom-input-sm" id="razonSocial" disabled style="color:#000;" value="' +
				o.razonSocial +
				'">';
			fila += "</div>";
			/* rut empresa */
			fila += '<div class="col-lg-6 col-md-6 col-sm-6"><br>';
			fila += '<label class="text-center" for="rutEmpresa">RUT EMPRESA</label>';
			fila +=
				'<input type="text" class="form-control custom-input-sm" id="rutEmpresa" disabled style="color:#000;" value="' +
				o.rutEmpresa +
				'">';
			fila += "</div>";
			/* &&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&& */
			/* nombre trabajador */
			fila +=
				'<p class="col-md-12 text-center" style="color:#fff; text-decoration: underline;margin-top:80px; margin-bottom:0px">DATOS TRABAJADOR</p>';
			fila += '<div class="col-lg-6 col-md-6 col-sm-6"><br>';
			fila +=
				'<label class="text-center" for="nombreTrabajador">NOMBRE TRABAJADOR</label>';
			fila +=
				'<input type="text" class="form-control custom-input-sm" id="nombreTrabajador" disabled style="color:#000;" value="' +
				o.nombres +
				" " +
				o.apellidos +
				'">';
			fila += "</div>";
			/* run trabajador */
			fila += '<div class="col-lg-6 col-md-6 col-sm-6"><br>';
			fila +=
				'<label class="text-center" for="rutTrabajador">RUN TRABAJADOR</label>';
			fila +=
				'<input type="text" class="form-control custom-input-sm" id="rutTrabajador" disabled style="color:#000;" value="' +
				o.rutTrabajador +
				'">';
			fila += "</div>";
			/* centro de costos (numero entidad no existe se debe ingresar)*/
			fila += '<div class="col-lg-6 col-md-6 col-sm-6 "><br>';
			fila += '<label class="text-center" for="centralCosto">CC</label>';
			fila +=
				'<input type="text" class="form-control custom-input-sm" id="centralCosto" placeholder="consulte CC trabajador" style="color:#000;" value="1">';
			fila += "</div>";
			/* &&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&& */
			fila +=
				'<p class="col-md-12 text-center" style="color:#fff;text-decoration: underline; margin-top:80px; margin-bottom:0px">INFORMACION PREVICIONAL</p>';
			/* AFP dato del trabajador */
			fila += '<div class="col-lg-6 col-md-6 col-sm-6"><br>';
			fila += '<div class="input-group">';
			fila += '<label class="text-center" for="afpTrabajador">AFP</label>';
			fila +=
				'<input type="text" class="form-control custom-input-sm" id="afpTrabajador" disabled style="color:#000;margin-left:1rem" value="' +
				o.afpTrabajador +
				'">';
			fila += "</div>";
			fila += "</div>";
			/* SALUD to del trabajador */
			fila += '<div class="col-lg-6 col-md-6 col-sm-6"><br>';
			fila += '<div class="input-group">';
			fila += '<label class="text-center" for="saludTrabajador">SALUD</label>';
			fila +=
				'<input type="text" class="form-control custom-input-sm" id="saludTrabajador" disabled style="color:#000;margin-left:1rem" value="' +
				o.saludTrabajador +
				'">';
			fila += "</div>";
			fila += "</div>";
			if (o.saludTrabajador != "Fonasa") {
				fila += '<div class="col-lg-6 col-md-6 col-sm-6"><br>';
				fila += '<div class="input-group">';
				fila += '<label class="text-center" for="plan">ValorPlan</label>';
				fila +=
					'<input type="text" class="form-control custom-input-sm" id="plan" disabled style="color:#000;margin-left:1rem" value="' +
					o.plan +
					'">';
				fila += "</div>";
				fila += "</div>";
			}
			/* %%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%% titulo*/
			fila +=
				'<p class="col-md-12 text-center" style="color:#fff; text-decoration: underline;margin-top:80px; margin-bottom:0px">INFORMACION PARA CALCULO</p>';
			/* dias trabajados calculado*/
			fila += '<div class="col-lg-4 col-md-4 col-sm-4"><br>';
			fila +=
				'<label class="text-center" for="diasTrabajados">DIAS TRABAJADOS</label>';
			fila +=
				'<input type="text" class="form-control custom-input-sm" id="diasTrabajados" disabled style="color:#000;" value="' +
				o.diasTrabajados +
				'">';
			fila += "</div>";

			/* horas extras (no existe entidad que lo informe se debe ingresar) */
			fila += '<div class="col-lg-4 col-md-4 col-sm-4"><br>';
			fila +=
				'<label class="text-center" for="horasExtras">HORAS EXTRA</label>';
			fila +=
				'<input type="text" class="form-control custom-input-sm" id="horasExtras" style="color:#000;" value="0">'; //ingreso manual
			fila += "</div>";
			/* CARGAS FAMILIARES (se debe ingresar valor manualmente) */
			fila += '<div class="col-lg-4 col-md-4 col-sm-4"><br>';
			fila +=
				'<label class="text-center" for="cargas">CARGAS FAMILIARES</label>';
			fila +=
				'<input type="number" class="form-control custom-input-sm" id="cargas" disabled style="color:#000;" value="' +
				o.cargas +
				'">'; //ingreso manual;
			fila += "</div>";
			/* TOTAL TRUBUTABLE valor calculado*/
			/* %%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%% */
			/* HABERES titulo */
			fila +=
				'<p class="col-md-12 text-center" style="color:#fff;text-decoration: underline; margin-top:80px; margin-bottom:0px">HABERES</p>';
			/* sueldo base (dato del trabajador)*/
			fila += '<div class="col-lg-4 col-md-4 col-sm-4"><br>';
			fila += '<label class="text-center" for="sueldoBase">SUELDO BASE</label>';
			fila +=
				'<input type="text" class="form-control custom-input-sm" id="sueldoBase" disabled style="color:#000;" value="' +
				o.sueldoBase +
				'">';
			fila += "</div>";
			/* gratificacion legal (valor calculado) */
			fila += '<div class="col-lg-4 col-md-4 col-sm-4"><br>';
			fila +=
				'<label class="text-center" for="gratificacionLegal">GRATIFICACION LEGAL</label>';
			fila +=
				'<input type="text" class="form-control custom-input-sm" id="gratificacionLegal" disabled style="color:#000;" value="' +
				o.gratificacionLegal +
				'">';
			fila += "</div>";
			fila += "<br>";
			/* TOTAL IMPONIBLE (valor calculado) */
			fila += '<div class="col-lg-12 col-md-12 col-sm-12"><br>';
			fila +=
				'<label class="text-center" style="text-decoration: underline" for="totalImponible">TOTAL IMPONIBLE</label>';
			fila +=
				'<input type="text" class="form-control custom-input-sm" id="totalImponible" disabled style="color:#000; margin-botton:60px" value="' +
				o.totalImponible +
				'">';
			fila += "</div>";
			/* cargas familiares, bonificaciones no imponibles(colacion locomocion, etc) */
			if (o.cargasFamiliaresMonto > 0) {
				fila += '<div class="col-lg-12 col-md-12 col-sm-12"><br>';
				fila += '<div class="input-group">';
				fila +=
					'<label class="text-center" for="cargasFamiliaresMonto">CARGAS FAMILIARES</label>';
				fila +=
					'<input type="text" class="form-control custom-input-sm" id="cargasFamiliaresMonto" disabled style="color:#000;margin-left:1rem;" value="' +
					o.cargasFamiliaresMonto +
					'">';
				fila += "</div>";
				fila += "</div>";
				fila += "<br>";
			}
			if (o.arrayBonos != "") {
				$.each(o.arrayBonos, function (i, b) {
					var nombreBono = b.atr_nombreBono;
					var montoBono = new Int16Array.NumberFormat("de_DE").format(
						b.atr_montoBono
					);
					fila += '<div class="col-md-6">';
					fila += 'div class="input-group"';
					fila +=
						'<label class="text-center" for="montoBono" style="">' +
						nombreBono +
						"</label>";
					fila +=
						'<input type="text" class="form-control custom-input-sm" id="montoBono" disabled style="color:#000;margin-left:1rem" value="' +
						montoBono +
						'">';
					fila += "</div>";
					fila += "</div>";
				});
			}
			fila += '<div class="col-md-4 col-sm-12"><br>';
			fila +=
				'<label class="text-center" for="bonoAsistencia">BONO ASISTENCIA</label>';
			fila +=
				'<input type="text" class="form-control custom-input-sm" id="bonoAsistenciaAPagar" disabled style="color:#000;" value="' +
				o.bonoAsistenciaAPagar +
				'">';
			fila += "</div>";
			fila += '<div class="col-md-4 col-sm-12"><br>';
			fila +=
				'<label class="text-center" for="bonoColacionAPagar">BONO COLACION</label>';
			fila +=
				'<input type="text" class="form-control custom-input-sm" id="bonoColacionAPagar" disabled style="color:#000;" value="$' +
				o.bonoColacionAPagar +
				'">';
			fila += "</div>";
			fila += '<div class="col-md-4 col-sm-12"><br>';
			fila +=
				'<label class="text-center" for="bonoMovilizacionAPagar">BONO MOVILIZACION</label>';
			fila +=
				'<input type="text" class="form-control custom-input-sm" id="bonoMovilizacionAPagar" disabled style="color:#000;" value="$' +
				o.bonoMovilizacionAPagar +
				'">';
			fila += "</div>";

			/*  fila += '<input type="text" id="bonoAsistenciaAPagar" value="'+o.bonoAsistenciaAPagar+'"></input>' */
			/* TOTAL NO IMPONIBLE  */
			fila += '<div class="col-lg-12 col-md-12 col-sm-12"><br>';
			fila +=
				'<label class="text-center" for="totalNoImponible" style="text-decoration:underline green">TOTAL NO IMPONIBLE</label>';
			fila +=
				'<input type="text" class="form-control custom-input-sm" id="totalNoImponible" disabled style="color:#000;" value="' +
				o.totalNoImponible +
				'">';
			fila += "</div>";

			/* %%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%% */
			/* DESCUENTOS titulo*/
			fila +=
				'<p class="col-md-12 text-center" style="color:#fff; text-decoration: underline;margin-top:80px; margin-bottom:0px">DESCUENTOS LEGALES</p>';
			/* prevision salud impuesto unico seguro de cesantia*/
			fila += '<div class="col-lg-12 col-md-12 col-sm-12"><br>';
			fila += '<div class="input-group">';
			fila +=
				'<label class="text-center" for="valorPrevision" style="">AFP</label>';
			fila +=
				'<input type="text" class="form-control custom-input-sm" id="valorPrevision" disabled style="color:#000;margin-left:1rem" value="' +
				o.valorPrevision +
				'">';
			fila += "</div>";
			fila += "</div>";
			fila += '<div class="col-lg-12 col-md-12 col-sm-12"><br>';
			fila += '<div class="input-group">';
			fila +=
				'<label class="text-center" for="valorSalud" style="">SALUD</label>';
			fila +=
				'<input type="text" class="form-control custom-input-sm" id="valorSalud" disabled style="color:#000;margin-left:1rem" value="' +
				o.valorSalud +
				'">';
			fila += "</div>";
			fila += "</div>";
			fila += '<div class="col-lg-12 col-md-12 col-sm-12"><br>';
			fila += '<div class="input-group">';
			fila +=
				'<label class="text-center" for="valorSaludAdicional" style="">Adicional Isapre :</label>';
			fila +=
				'<input type="text" class="form-control custom-input-sm" id="valorSaludAdicional" disabled style="color:#000;margin-left:1rem" value="' +
				o.valorSaludAdicional +
				'">';
			fila += "</div>";
			fila += "</div>";
			fila += '<div class="col-lg-12 col-md-12 col-sm-12"><br>';
			fila += '<div class="input-group">';
			fila +=
				'<label class="text-center" for="valorCesantia" style="">SEGURO CESANTIA</label>';
			fila +=
				'<input type="text" class="form-control custom-input-sm" id="valorCesantia" disabled style="color:#000;margin-left:1rem" value="' +
				o.valorCesantia +
				'">';
			fila += "</div>";
			fila += "</div>";

			/* Subtotal descuentos legales (valor calculado suma anteriores)*/
			fila += '<div class="col-lg-12 col-md-12 col-sm-12"><br>';
			fila += '<div class="input-group">';
			fila +=
				'<label class="text-center" for="totalDescuentosLegales" style="">TOTAL DESC. LEGALES</label>';
			fila +=
				'<input type="text" class="form-control custom-input-sm" id="totalDescuentosLegales" disabled style="color:#000;margin-left:1rem" value="' +
				o.totalDescuentosLegales +
				'">';
			fila += "</div>";
			fila += "</div>";

			/* oTROS DESCUENTOS */
			fila +=
				'<p class="col-md-12 text-center" style="color:#fff; text-decoration: underline;margin-top:80px; margin-bottom:0px">OTROS DESCUENTOS</p>';
			/* anticipo cuotas prestamo */

			if (o.arrayAdelantos != "") {
				fila +=
					'<p class="col-md-12 text-left" style="color:#fff; margin-top:20px; margin-bottom:0px">ADELANTOS</p>';

				fila += '<div class="col-md-6" style="margin-bottom:-20px"><br>';
				fila += "<label>FECHA</label>";
				fila += "</div>";

				fila += '<div class="col-md-6" style="margin-bottom:-20px"><br>';
				fila += "<label>MONTO</label>";
				fila += "</div>";
			}

			//recorrer listado de adelantos
			$.each(o.arrayAdelantos, function (i, a) {
				// cambiar formato de visluzación de la fecha
				var fechaOrdenadaAdelanto = a.atr_fecha.split("-");
				fechaOrdenadaAdelanto =
					fechaOrdenadaAdelanto[2] +
					"-" +
					fechaOrdenadaAdelanto[1] +
					"-" +
					fechaOrdenadaAdelanto[0];

				// fecha del adelanto
				fila += '<div class="col-md-6"><br>';
				fila +=
					'<input type="text" class="form-control custom-input-sm" id="fechaOrdenadaAdelanto" disabled style="color:#000;" value="' +
					fechaOrdenadaAdelanto +
					'">';
				fila += "</div>";

				// monto del adelanto
				var atr_monto = new Intl.NumberFormat("de-DE").format(a.atr_monto);
				fila += '<div class="col-md-6"><br>';
				fila +=
					'<input type="text" class="form-control custom-input-sm" id="atr_monto" disabled style="color:#000;" value="' +
					atr_monto +
					'">';
				fila += "</div>";
			});
			/* ------- */
			if (o.arrayPrestamos != "") {
				fila +=
					'<p class="col-md-12 text-left" style="color:#fff; margin-top:20px;margin-bottom:0px">PRÉSTAMOS</p>';

				fila += '<div class="col-md-4" style="margin-bottom:-20px"><br>';
				fila += "<label>MONTO TOTAL</label>";
				fila += "</div>";

				fila += '<div class="col-md-4" style="margin-bottom:-20px"><br>';
				fila += "<label>N° DE CUOTA</label>";
				fila += "</div>";

				fila += '<div class="col-md-4" style="margin-bottom:-20px"><br>';
				fila += "<label>MONTO DESCUENTO</label>";
				fila += "</div>";
			}

			// recorrer listado de prestamos
			$.each(o.arrayPrestamos, function (i, p) {
				var atr_montoTotal = new Intl.NumberFormat("de-DE").format(
					p.atr_montoTotal
				);
				var atr_montoDescontar = new Intl.NumberFormat("de-DE").format(
					p.atr_montoDescontar
				);

				// número de la cuota
				fila += '<div class="col-md-4"><br>';
				fila +=
					'<input type="text" class="form-control custom-input-sm" id="totalPrestamo" disabled style="color:#000;" value="$' +
					atr_montoTotal +
					'">';
				fila += "</div>";

				// monto total del préstamo
				fila += '<div class="col-md-4"><br>';
				fila +=
					'<input type="text" class="form-control custom-input-sm" id="cantidadCuotas" disabled style="color:#000;" value="' +
					p.atr_numCuota +
					"/" +
					p.atr_cantidadCuotas +
					'">';
				fila += "</div>";

				// monto de descuento
				fila += '<div class="col-md-4"><br>';
				fila +=
					'<input type="text" class="form-control custom-input-sm" id="montoDescuento" disabled style="color:#000;" value="$' +
					atr_montoDescontar +
					'">';
				fila += "</div>";
			});
			fila += '<div class="col-md-4"><br>';
			fila += "<label>TOTAL PRESTAMO</label>";
			fila +=
				' <input class="form-control custom-input-sm" type="text"  id="montoPrestamo" value="' +
				o.montoPrestamo +
				'">';
			fila += "</div>";
			fila += '<div class="col-md-4"><br>';
			fila += "<label>UF al Dia</label>";
			fila +=
				' <input class="form-control custom-input-sm" type="text"  id="valorUF" value="' +
				o.valorUF +
				'">';
			fila += "</div>";
			fila += '<div class="col-md-4"><br>';
			fila += "<label>UTM al Dia</label>";
			fila +=
				' <input class="form-control custom-input-sm" type="text"  id="valorUTM" value="' +
				o.valorUTM +
				'">';
			fila += "</div>";

			/* Subtotal otros descuentos (anticipo y creditos)*/
			fila += '<div class="col-lg-12 col-md-12 col-sm-12"><br>';
			fila += '<div class="input-group" style="margin-bottom: 60px">';
			fila +=
				'<label class="text-center" for="totalOtrosDescuentos" style="margin-top:10px;">TOTAL OTROS DESC.</label>';
			fila +=
				'<input type="text" class="form-control custom-input-sm" id="totalOtrosDescuentos" disabled style="color:#000;margin-left:1rem" value="' +
				o.totalOtrosDescuentos +
				'">';
			fila += "</div>";
			fila += "</div>";
			/* %%%%%%%%%%%%%%%%%%%%%%%%%%%%TOTALES%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%% */
			/* TRIBUTABLE */
			fila += '<div class="col-lg-6 col-md-6 col-sm-6">';
			fila += '<div class="input-group">';
			fila +=
				'<label class="text-center " for="totalTributable" style="text-decoration: underline green; font-weight: bold;">TOTAL TRIBUTABLE</label>';
			fila +=
				'<input type="text" class="form-control custom-input-sm" id="totalTributable" disabled style="color:#000;margin-left:1rem;font-weight: bold;" value="' +
				o.totalTributable +
				'">';
			fila += "</div>";
			fila += "</div>";
			fila += '<div class="col-lg-6 col-md-6 col-sm-6">';
			fila += '<div class="input-group">';
			fila +=
				'<label class="text-center " for="valorImponible" style="text-decoration: underline green; font-weight: bold;">TOTAL TRIBUTABLE</label>';
			fila +=
				'<input type="text" class="form-control custom-input-sm" id="valorImponible" disabled style="color:#000;margin-left:1rem;font-weight: bold;" value="' +
				o.valorImponible +
				'">';
			fila += "</div>";
			fila += "</div>";
			/* HHHHHHHHHHHHHHIMPUESTO UNICOHHHHHHHHHHHHHHHH */
			if (o.valorImpuestoUnico != "undefined" && o.valorImpuestoUnico > 0) {
				fila += '<div class="col-lg-12 col-md-12 col-sm-12"><br>';
				fila += '<div class="input-group">';
				fila +=
					'<label class="text-center" for="valorImpuestoUnico" style="">IMPUESTO UNICO</label>';
				fila +=
					'<input type="text" class="form-control custom-input-sm" id="valorImpuestoUnico" disabled style="color:#000;margin-left:1rem" value="' +
					o.valorImpuestoUnico +
					'">';
				fila += "</div>";
				fila += "</div>";
			}

			/* total descuentos */
			fila += '<div class="col-lg-6 col-md-6 col-sm-6">';
			fila += '<div class="input-group">';
			fila +=
				'<label class="text-center " for="totalDescuentos" style="text-decoration: underline green; font-weight: bold;">TOTAL DESCUENTOS</label>';
			fila +=
				'<input type="text" class="form-control custom-input-sm" id="totalDescuentos" disabled style="color:#000;margin-left:1rem;font-weight: bold;" value="' +
				o.totalDescuentos +
				'">';
			fila += "</div>";
			fila += "</div>";

			/* TOTAL HABERES (valor calculado  imponible + no imponible)*/
			fila += '<div class="col-lg-6 col-md-6 col-sm-6">';
			fila += '<div class="input-group">';
			fila +=
				'<label class="text-center" for="totalHaberes" style="text-decoration:underline green;font-weight: bold;">TOTAL HABERES</label>';
			fila +=
				'<input type="text" class="form-control custom-input-sm" id="totalHaberes" disabled style="color:#000;font-weight: bold;" value="' +
				o.totalHaberes +
				'">';
			fila += "</div>";
			fila += "</div>";
			/* %%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%% */
			/* alcance liquido (calculado haberes-descuentos) */
			fila +=
				'<div class="col-lg-12 col-md-12 col-sm-12" style="margin-top:3rem">';
			fila += '<div class="input-group">';
			fila +=
				'<label class="text-center " for="valorAlcanceLiquido" style="text-decoration: underline green; font-weight: bold;">ALCANCE LIQUIDO</label>';
			fila +=
				'<input type="text" class="form-control custom-input-sm" id="valorAlcanceLiquido" disabled style="color:#000;margin-left:1rem;font-weight: bold;" value="' +
				o.valorAlcanceLiquido +
				'">';
			fila += "</div>";
			fila += "</div>";

			/* fecha emision */

			/* valor en palabras  :( */

			/* boton submit */
			fila += "";
			/* vht fin */
		});

		$("#contenedorGenerarLiquidacion").append(fila);
	});
}

function cargarBancos() {
	$.ajax({
		url: "getBancos",
		type: "GET",
		dataType: "json",
	}).then(function (response) {
		var fila = "";
		$("#getSelectBanco").empty();
		fila += '<option value="">Seleccione una opción</opion>';
		$.each(response, function (i, o) {
			fila += '<option value="' + o.cp_banco + '">' + o.atr_nombre + "</opion>";
		});
		$("#getSelectBanco").append(fila);
	});
}

function cargarEmpresas() {
	$.ajax({
		url: "getEmpresas",
		type: "GET",
		dataType: "json",
	}).then(function (response) {
		var fila = "";
		$("#getSelectEmpresa").empty();
		// fila += '<option value="">Seleccione una opción</opion>'
		$.each(response, function (i, o) {
			fila +=
				'<option value="' + o.cp_empresa + '">' + o.atr_nombre + "</opion>";
		});
		$("#getSelectEmpresa").append(fila);
	});
}
