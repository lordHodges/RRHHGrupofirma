var base_url = "http://www.imlchilelocal.cl/index.php/";

function cargarTabla(permisoSubir) {
	var table = $("#tabla_liquidaciones").DataTable();
	table.destroy();

	var btnAcciones = "";

	// DESCARGAR CONTRATOS

	btnAcciones +=
		'<button style="display:inline" type="button" id="btnVerListaLiquidaciones" class="btn btn-info btn-sm" data-toggle="modal" data-target="#modalVerListaLiquidaciones"><i class="glyphicon glyphicon-folder-open"></i></button>';

	// VER CONTRATOS
	if (permisoSubir == "si") {
		btnAcciones +=
			'<button style="display:inline" type="button" id="btnModalCargarArchivo" class="btn btn-info btn-sm" data-toggle="modal" data-target="#modalCargarArchivo"><i class="glyphicon glyphicon-open"></i></button>';
	} else {
		btnAcciones +=
			'<button style="display:inline" type="button" id="btnModalCargarArchivo" class="btn btn-default btn-sm" disabled data-toggle="modal" data-target="#modalCargarArchivo"><i class="glyphicon glyphicon-open"></i></button>';
	}

	$(".dataTables-liquidaciones").DataTable({
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
			url: "http://www.imlchilelocal.cl/index.php/getListadoTrabajadoresContrato",
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

function getLiquidacionesTrabajador(idTrabajador) {
	var permisoDescargar = $("#permisoDescargar").text();
	$.ajax({
		url: "getLiquidacionesTrabajador",
		type: "POST",
		dataType: "json",
		data: { idTrabajador: idTrabajador },
	}).then(function (response) {
		var fila = "";
		var download = "";

		$("#modalDetalleLiquidaciones").empty();

		fila +=
			'<h5 class="modal-title mx-auto">LISTADO DE LIQUIDACIONES</h5><button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>';
		fila +=
			'<table class="table table-bordered tableInModal" style="margin-top:20px;"> <thead> <tr> <td class="text-center">Liquidación</td> <td class="text-center">Fecha</td> <td class="text-center">Haberes</td> <td class="text-center">Descuentos</td> <td class="text-center">Alcance Líquido</td> <td class="text-center">Descargar</td></tr> </thead> <tbody>';
		$.each(response.msg, function (i, o) {
			fila += "<tr>";
			fila += "<td>" + o.cp_liquidacion + "</td>";
			fila += "<td>" + o.atr_fecha + "</td>";
			fila += "<td>$" + o.atr_totalHaberes + "</td>";
			fila += "<td>$" + o.atr_totalDescuentos + "</td>";
			fila += "<td>$" + o.atr_alcanceLiquido + "</td>";

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
					"http://www.imlchilelocal.cl/index.php/LiquidacionesController/descargarLiquidacion/" +
					o.cp_liquidacion;
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
		$("#modalDetalleLiquidaciones").append(fila);
	});
}
