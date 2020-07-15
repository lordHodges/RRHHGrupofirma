var base_url = "https://www.imlchile.cl/grupofirma/index.php/";

function cargarTablaPrestamoTrabajadores(permisoEditar, permisoExportar) {
	var table = $("#tabla_prestamoTrabajadores").DataTable();
	table.destroy();

	var btnAcciones = "";

	if (permisoEditar == "si") {
		btnAcciones +=
			'<button type="button" id="btnGetModalDetallePrestamoTrabajador" class="btn btn-info btn-sm" data-toggle="modal" data-target="#modalEditarPrestamoTrabajador"><i class="glyphicon glyphicon-pencil"></i></button>';
	}
	btnAcciones +=
		'<button style="display:inline" type="button" id="btnModalCargarArchivo" class="btn btn-info btn-sm" data-toggle="modal" data-target="#modalCargarArchivo"><i class="glyphicon glyphicon-open"></i></button>';
	btnAcciones +=
		'<button type="button" id="btnGenerarComprobantePrestamo" class="btn btn-info btn-sm"><i class="glyphicon glyphicon-file"></i></button>';

	if (permisoExportar == "si") {
		$(".dataTables-prestamoTrabajadores").DataTable({
			autoWidth: false,
			sInfo: false,
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
				url: "https://www.imlchile.cl/grupofirma/index.php/getListadoPrestamosTrabajador",
				type: "GET",
			},
			columnDefs: [
				{
					targets: 6,
					data: null,
					defaultContent: btnAcciones,
				},
			],
			dom: '<"html5buttons"B>lTfgitp',
			buttons: [
				{
					extend: "copy",
					exportOptions: {
						columns: [1, 2, 3, 4, 5, 6],
					},
				},
				{
					extend: "csv",
					exportOptions: {
						columns: [1, 2, 3, 4, 5, 6],
					},
				},
				{
					extend: "excel",
					title: "Lista de préstamos a trabajadores",
					exportOptions: {
						columns: [1, 2, 3, 4, 5, 6],
					},
				},
				{
					extend: "pdf",
					title: "Lista de préstamos a trabajadores",
					exportOptions: {
						columns: [1, 2, 3, 4, 5, 6],
					},
				},
				{
					extend: "print",
					title: "Grupo Firma",
					exportOptions: {
						columns: [1, 2, 3, 4, 5, 6],
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
		});
	} else {
		$(".dataTables-prestamoTrabajadores").DataTable({
			autoWidth: false,
			sInfo: false,
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
				url: "https://www.imlchile.cl/grupofirma/index.php/getListadoPrestamosTrabajador",
				type: "GET",
			},
			columnDefs: [
				{
					targets: 6,
					data: null,
					defaultContent: btnAcciones,
				},
			],
			dom: '<"html5buttons"B>lTfgitp',
			buttons: [],
		});
	}
}

function generarCuotas(valor) {
	var monto = $("#monto").val();
	var cuotas = $("#cuotas").val();

	if (monto == "" || cuotas == "") {
	} else {
		if (cuotas > 100) {
			toastr.error("No se pueden ingresar prestamos mayores a 100");
		}

		// alert(monto);
		if (monto > 0) {
			var montoCuota = Math.round(monto / cuotas);

			montoCuota = new Intl.NumberFormat().format(montoCuota);

			$("#contenedorCuotasPrestamo").empty();

			var fila = "";
			var f = new Date();
			var mes,
				dia = "05";
			var fechaActual;

			if (f.getMonth() + 1 < 9) {
				mes = "0" + (f.getMonth() + 1);
			} else {
				mes = f.getMonth() + 1;
			}

			fechaActual = dia + "-" + mes + "-" + f.getFullYear();
			// alert(fechaActual);

			fila += '<div class="col-md-12"><br>';
			fila += '<label class="text-center">CUOTAS A DESCONTAR</label>';
			fila += "</div>";

			fila += '<div class="col-md-3" style="margin-bottom:-20px"><br>';
			fila += "<label>N°</label>";
			fila += "</div>";

			fila += '<div class="col-md-4" style="margin-bottom:-20px"><br>';
			fila += "<label>Monto</label>";
			fila += "</div>";

			fila += '<div class="col-md-5" style="margin-bottom:-20px"><br>';
			fila += "<label>Fecha de pago</label>";
			fila += "</div>";

			for (var i = 1; i <= cuotas; i++) {
				fila += '<div class="col-md-3"><br>';
				fila +=
					'<input type="text" class="form-control custom-input-sm" id="numCuotaDetalle_' +
					i +
					'" disabled value="' +
					i +
					'" style="color:#000">';
				fila += "</div>";

				fila += '<div class="col-md-4"><br>';
				fila +=
					'<input type="text" class="form-control custom-input-sm" id="montoCuotaDetalle_' +
					i +
					'" value="$' +
					montoCuota +
					'">';
				fila += "</div>";

				fila += '<div class="col-md-5"><br>';
				fila +=
					'<input type="date" class="form-control required custom-input-sm" id="fechaPagoDetalle_' +
					i +
					'">';
				fila += "</div>";
			}

			$("#contenedorCuotasPrestamo").append(fila);
		}
		return cuotas;
	}
}

function getSelectTrabajador() {
	var url = base_url + "getTrabajadores";
	$("#getSelectTrabajador").empty();
	var fila = "<option disabled selected>Seleccione una opción</option>";
	$.getJSON(url, function (result) {
		$.each(result, function (i, o) {
			fila +=
				"<option value='" +
				o.cp_trabajador +
				"'>" +
				o.atr_nombres +
				" " +
				o.atr_apellidos +
				"</option>";
		});
		$("#getSelectTrabajador").append(fila);
	});
}

function completarRUT() {
	var idTrabajador = $("#getSelectTrabajador").val();

	$.ajax({
		url: "obtenerRutTrabajador",
		type: "POST",
		dataType: "json",
		data: { idTrabajador: idTrabajador },
	}).then(function (msg) {
		$.each(msg, function (i, o) {
			$("#rutTrabajador").val(o.atr_rut);
		});
	});
}

function agregarPrestamo() {
	var idTrabajador = $("#getSelectTrabajador").val();
	var rutTrabajador = $("#rutTrabajador").val();
	var monto = $("#monto").val();
	var cuotas = $("#cuotas").val();
	var autoriza = $("#autoriza").val();
	var observacion = $("#observacion").val();

	var sePuedeAgregar = true;

	for (var i = 1; i <= cuotas; i++) {
		var comprobarFecha = "#fechaPagoDetalle_" + i;
		var idComprobarDetalle = $(comprobarFecha).val();

		if (idComprobarDetalle == null || idComprobarDetalle == "") {
			sePuedeAgregar = false;
		}
	}

	if (sePuedeAgregar == true) {
		$.ajax({
			url: "addPrestamo",
			type: "POST",
			dataType: "json",
			data: {
				montoTotal: monto,
				totalCuotas: cuotas,
				idTrabajador: idTrabajador,
				autoriza: autoriza,
				observacion: observacion,
			},
		}).then(function (msg) {
			var cfPrestamo = msg;

			var fechasCompletas = 1;
			for (var j = 1; j <= cuotas; j++) {
				if (true) {
					var fecha = "#fechaPagoDetalle_" + j;
					var idFechaDetalle2 = $(fecha).val();
					if (idFechaDetalle2 == null || idFechaDetalle2 == "") {
						fechasCompletas = 0;
					}
				}
			}

			for (var i = 1; i <= cuotas; i++) {
				var variableNumCuota = "#numCuotaDetalle_" + i;
				var idNumCuotaDetalle = $(variableNumCuota).val();

				var variableMonto = "#montoCuotaDetalle_" + i;
				var idMontoDetalle = $(variableMonto).val();

				var variableFecha = "#fechaPagoDetalle_" + i;
				var idFechaDetalle = $(variableFecha).val();
				$.ajax({
					url: "addDetallePrestamo",
					type: "POST",
					dataType: "json",
					data: {
						idTrabajador: idTrabajador,
						numCuota: idNumCuotaDetalle,
						montoDetalle: idMontoDetalle,
						fechaDetalle: idFechaDetalle,
						cfPrestamo: cfPrestamo,
					},
				}).then(function (msg2) {
					if (msg2 == false) {
						exit();
					}
				});
			}

			toastr.success("Ingreso exitoso");
			$("#modalCrearPrestamo").modal("hide");
			var permisoEditar = $("#permisoEditarTrabajadores").text();
			var permisoExportar = $("#permisoExportarTrabajadores").text();
			cargarTablaPrestamoTrabajadores(permisoEditar, permisoExportar);
		});
	} else {
		toastr.error("Alguna de las fechas no se ha completado");
	}
}

function getDetallePrestamo(idPrestamo, rut, nombre, cuotas, montoTotal) {
	$("#labelPrestamo").text(idPrestamo);
	$("#idTrabajador2").val(nombre);
	$("#rutTrabajador2").val(rut);
	$("#monto2").val(montoTotal);
	$("#cuotas2").val(cuotas);
	var atr_montoDescontar;

	$.ajax({
		url: "getDetallePrestamo",
		type: "POST",
		dataType: "json",
		data: { idPrestamo: idPrestamo },
	}).then(function (result) {
		var fila = "";
		var cantEstado = 1;
		$("#contenedorCuotasPrestamoEditar").empty();

		fila += '<div class="col-md-12"><br>';
		fila += '<label class="text-center">CUOTAS A DESCONTAR</label>';
		fila += "</div>";

		fila += '<div class="col-md-2" style="margin-bottom:-20px"><br>';
		fila += "<label>N°</label>";
		fila += "</div>";

		fila += '<div class="col-md-3" style="margin-bottom:-20px"><br>';
		fila += "<label>Monto</label>";
		fila += "</div>";

		fila += '<div class="col-md-3" style="margin-bottom:-20px"><br>';
		fila += "<label>Fecha de pago</label>";
		fila += "</div>";

		fila += '<div class="col-md-4" style="margin-bottom:-20px"><br>';
		fila += "<label>Estado de pago</label>";
		fila += "</div>";

		$.each(result, function (i, o) {
			var fechaDescuento = o.atr_fechaDescuento;
			fechaDescuento = fechaDescuento.split("-");
			fechaDescuento =
				fechaDescuento[2] + "-" + fechaDescuento[1] + "-" + fechaDescuento[0];

			fila += '<div class="col-md-2"><br>';
			fila +=
				'<input type="text" class="form-control custom-input-sm" id="numCuotaDetalle_' +
				o.atr_numCuota +
				'" disabled value="' +
				o.atr_numCuota +
				'" style="color:#000">';
			fila += "</div>";
			if (o.atr_estado == 0) {
				atr_montoDescontar = new Intl.NumberFormat().format(
					o.atr_montoDescontar
				);
				fila += '<div class="col-md-3"><br>';
				fila +=
					'<input type="text" class="form-control custom-input-sm" id="montoCuotaDetalle_' +
					o.atr_numCuota +
					'" value="$' +
					atr_montoDescontar +
					'">';
				fila += "</div>";

				fila += '<div class="col-md-3"><br>';
				fila +=
					'<input type="text" class="form-control custom-input-sm" id="fechaPagoDetalle_' +
					o.atr_numCuota +
					'" value="' +
					fechaDescuento +
					'">';
				fila += "</div>";

				fila += '<div class="col-md-4"><br>';
				fila +=
					'<input type="text" class="form-control custom-input-sm" id="estado_' +
					cantEstado +
					'" value="Pendiente">';
				fila += "</div>";
			} else {
				atr_montoDescontar = new Intl.NumberFormat().format(
					o.atr_montoDescontar
				);
				fila += '<div class="col-md-3"><br>';
				fila +=
					'<input type="text" class="form-control custom-input-sm" id="montoCuotaDetalle_' +
					o.atr_numCuota +
					'" disabled style="color:#000" value="' +
					o.atr_montoDescontar +
					'">';
				fila += "</div>";

				fila += '<div class="col-md-3"><br>';
				fila +=
					'<input type="text" class="form-control custom-input-sm" id="fechaPagoDetalle_' +
					o.atr_numCuota +
					'" disabled style="color:#000" value="' +
					fechaDescuento +
					'">';
				fila += "</div>";

				fila += '<div class="col-md-4"><br>';
				fila +=
					'<input type="text" class="form-control custom-input-sm" disabled value="Pagado" id="estado_' +
					cantEstado +
					'" style="color:#000">';
				fila += "</div>";
			}
			cantEstado = cantEstado + 1;
		});

		$("#contenedorCuotasPrestamoEditar").append(fila);
	});
}

function editarDetallePrestamo() {
	var numCuotaDetalle_, montoCuotaDetalle_, fechaPagoDetalle_, estado_;
	var idPrestamo = $("#labelPrestamo").text();
	var cuotas = $("#cuotas2").val();

	for (var i = 1; i <= cuotas; i++) {
		estado_ = "estado_" + i;
		if ($("#" + estado_).val() == "Pendiente") {
			numCuotaDetalle_ = $("#numCuotaDetalle_" + i).val();
			montoCuotaDetalle_ = $("#montoCuotaDetalle_" + i).val();
			fechaPagoDetalle_ = $("#fechaPagoDetalle_" + i).val();

			fechaPagoDetalle_ = fechaPagoDetalle_.split("-");
			fechaPagoDetalle_ =
				fechaPagoDetalle_[2] +
				"-" +
				fechaPagoDetalle_[1] +
				"-" +
				fechaPagoDetalle_[0];

			$.ajax({
				url: "editarDetalleDePrestamo",
				type: "POST",
				dataType: "json",
				data: {
					idPrestamo: idPrestamo,
					numCuota: numCuotaDetalle_,
					montoCuota: montoCuotaDetalle_,
					fechaPago: fechaPagoDetalle_,
				},
			}).then(function (msg) { });
		}
	}

	toastr.success("Modificación exitosa");
	$("#modalEditarPrestamoTrabajador").modal("hide");
}

function seleccionTabs(nombre) {
	var elemento = document.getElementById(nombre);
	elemento.style.color = "#fafafa";
	elemento.style.backgroundColor = "#2a3f54";
	if (nombre == "trabajadores-tab") {
		document.getElementById("empresas-tab").style = "";
	} else {
		document.getElementById("trabajadores-tab").style = "";
	}
}
