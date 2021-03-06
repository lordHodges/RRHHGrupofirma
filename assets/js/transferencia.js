var base_url = "https://www.imlchile.cl/grupofirma/index.php/";

/*************************** TRANSFERENCIAS ****************************/

function cargarTabla(permisoSubir) {
	var table = $("#tabla_trabajador").DataTable();
	table.destroy();

	var btnAcciones = "";

	// DESCARGAR TRANSFERENCIAS
	btnAcciones +=
		'<button style="display:inline" type="button" id="btnVerListaTransferencias" class="btn btn-info btn-sm" data-toggle="modal" data-target="#modalVerListaTransferencias"><i class="glyphicon glyphicon-folder-open"></i></button>';

	// VER TRANSFERENCIAS
	if (permisoSubir == "si") {
		btnAcciones +=
			'<button style="display:inline" type="button" id="btnModalCargarArchivo" class="btn btn-info btn-sm" data-toggle="modal" data-target="#modalCargarArchivo"><i class="glyphicon glyphicon-open"></i></button>';
	} else {
		btnAcciones += "";
	}

	$(".dataTables-trabajadores").DataTable({
		autoWidth: false,
		sInfo: false,
		sInfoEmpty: false,
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
			url: "https://www.imlchile.cl/grupofirma/index.php/getListadoTrabajadoresContrato",
			type: "GET",
		},
		columnDefs: [
			{
				targets: 5,
				data: null,
				defaultContent: btnAcciones,
			},
		],
		dom: '<"html5buttons"B>lTfgitp',
		buttons: [],
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

function getTransferenciasTrabajador(idTrabajador) {
	var permisoDescargar = $("#permisoDescargar").text();
	$.ajax({
		url: "getTransferenciasTrabajador",
		type: "POST",
		dataType: "json",
		data: { idTrabajador: idTrabajador },
	}).then(function (response) {
		var fila = "";
		var download = "";
		var monto, fecha, arrayFecha;

		$("#modalDetalleTransferencias").empty();

		fila +=
			'<h5 class="modal-title mx-auto">LISTADO DE TRANSFERENCIAS</h5><button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>';
		fila +=
			'<table class="table table-bordered tableInModal" style="margin-top:20px;"> <thead> <tr> <td class="text-center">Transferencia</td> <td class="text-center">Fecha</td> <td class="text-center">Motivo</td> <td class="text-center">Monto</td> <td class="text-center">Descargar</td> </tr> </thead> <tbody>';
		// importarScript("https://www.imlchile.cl/grupofirma/assets/js/validaciones.js");
		$.each(response.msg, function (i, o) {
			arrayFecha = o.atr_fecha.split("-");
			fecha = arrayFecha[2] + "-" + arrayFecha[1] + "-" + arrayFecha[0];
			fila += "<tr>";
			fila += "<td>" + o.cp_transferencia + "</td>";
			fila += "<td>" + fecha + "</td>";
			fila += "<td>" + o.atr_tipo + "</td>";
			fila += "<td>$" + o.atr_monto + "</td>";

			if (o.atr_ruta == "vacio") {
				if (permisoDescargar == "si") {
					fila +=
						'<td> <a class="btn btn-default btn-sm" href="#"><i class="glyphicon glyphicon-download-alt"></i></a> </td>';
				} else {
					fila +=
						'<td> <a class="btn btn-default btn-sm" href="#"><i class="glyphicon glyphicon-download-alt"></i></a> </td>';
				}
			} else {
				download =
					"https://www.imlchile.cl/grupofirma/index.php/TransferenciasController/descargarComprobante/" +
					o.cp_transferencia;
				if (permisoDescargar == "si") {
					fila +=
						'<td> <a class="btn btn-info btn-sm" href="' +
						download +
						'" download><i class="glyphicon glyphicon-download-alt"></i></a> </td>';
				} else {
					fila +=
						'<td><a class="btn btn-default btn-sm" href="#"><i class="glyphicon glyphicon-download-alt"></i></a> </td>';
				}
			}

			fila += "</tr>";
		});
		fila += "</body> </table>";
		$("#modalDetalleTransferencias").append(fila);
	});
}

function importarScript(nombre) {
	var s = document.createElement("script");
	s.src = nombre;
	document.querySelector("head").appendChild(s);
}
