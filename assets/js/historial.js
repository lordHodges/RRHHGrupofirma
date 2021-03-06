/*************************** TRABAJADOR ****************************/
var base_url = "https://www.imlchile.cl/grupofirma/index.php/";

function cargarTablaTrabajadorHistorial() {
	var table = $("#tabla_trabajador").DataTable();
	table.destroy();

	$(".dataTables-trabajadores").DataTable({
		autoWidth: false,
		sInfo: false,
		sInfoEmpty: false,
		language: {
			sProcessing: "Procesando...",
			sLengthMenu: "Registros _MENU_ ",
			sZeroRecords: "No se encontraron resultados",
			sEmptyTable: "Ningún dato disponible en esta tabla",
			sInfo: "",
			sInfoEmpty: "Mostrando registros del 0 al 0 de un total de 0 registros",
			sInfoFiltered: "(filtrado de un total de _MAX_ registros)",
			sInfoPostFix: "",
			sSearch: "&nbspBuscar:&nbsp",
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
			url: "https://www.imlchile.cl/grupofirma/index.php/getListadoTrabajadores",
			type: "GET",
		},
		columnDefs: [
			{
				targets: 8,
				data: null,
				defaultContent:
					'<button style="display:inline" type="button" id="btnVerTrabajador" class="btn btn-info btn-sm" data-toggle="modal" data-target="#modalVerTrabajador"><i class="fa fa-archive"></i></button>',
			},
		],
		dom: '<"html5buttons"B>lTfgitp',
		buttons: [],
	});
}

function cargarTrabajadores() {
	var url = base_url + "getTrabajadores";
	$("#getSelectTrabajadores").empty();
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
		$("#getSelectTrabajadores").append(fila);
	});
}

function cargarDetalleHistorial(idTrabajador) {
	$.ajax({
		url: "vistaCronologica",
		type: "POST",
		dataType: "json",
		data: { idTrabajador: idTrabajador },
	}).then(function (msg) {
		var fila = "";
		var urlDescarga = "";
		$("#contenedorCronologico").empty();
		fila += '<div class="x_content"> <ul class="list-unstyled timeline">';
		$.each(msg.msg, function (i, o) {
			if (o.atr_tipo == "Contrato") {
				urlDescarga =
					"https://www.imlchile.cl/grupofirma/index.php/ContratosController/descargarContrato/" + o.cf_contrato;
			} else if (o.atr_tipo == "Carta de amonestación") {
				urlDescarga =
					"https://www.imlchile.cl/grupofirma/index.php/CartaAmonestacionController/descargarCartaAmonestacion/" +
					o.cf_cartaamonestacion;
			} else if (o.atr_tipo == "Anexo") {
				urlDescarga =
					"https://www.imlchile.cl/grupofirma/index.php/ContratosController/descargarAnexo/" + o.cf_anexo;
			} else {
				urlDescarga =
					"https://www.imlchile.cl/grupofirma/index.php/TransferenciasController/descargarComprobante/" +
					o.cf_transferencia;

			}
			fecha = o.atr_fechacronologica.split("-");

			fila += "<li>";
			fila += '<div class="block">';
			fila += '<div class="tags">';
			fila += '<a href="" class="tag">';
			fila += "<span>" + fecha[2] + "-" + fecha[1] + "-" + fecha[0] + "</span>";
			fila += "</a>";
			fila += "</div>";
			fila += '<div class="block_content">';
			fila += '<h2 class="title">';
			fila += "<a>" + o.atr_tipo + "</a>";
			fila += "</h2>";
			fila += '<div class="byline">';
			fila +=
				'<a href="' + urlDescarga + '" style="color:#1ABB9C;">Descargar</a>';
			fila += "</div>";
			fila += "</div>";
			fila += "</div>";
			fila += "</li>";
		});
		fila += "</ul></div>";
		$("#contenedorCronologico").append(fila);
	});
}

function cargarDetalleContratos(idTrabajador) {
	$.ajax({
		url: "vistaContratos",
		type: "POST",
		dataType: "json",
		data: { idTrabajador: idTrabajador },
	}).then(function (msg) {
		var fila = "";
		var urlDescarga = "";
		$("#contratos").empty();
		fila += '<div class="x_content"> <ul class="list-unstyled timeline">';
		$.each(msg.msg, function (i, o) {
			urlDescarga =
				"https://www.imlchile.cl/grupofirma/index.php/ContratosController/descargarContrato/" + o.cp_contrato;

			fecha = o.atr_fechaInicio.split("-");

			fila += "<li>";
			fila += '<div class="block">';
			fila += '<div class="tags">';
			fila += '<a href="" class="tag">';
			fila += "<span>" + fecha[2] + "-" + fecha[1] + "-" + fecha[0] + "</span>";
			fila += "</a>";
			fila += "</div>";
			fila += '<div class="block_content">';
			fila += '<h2 class="title">';
			fila += "<a>" + o.cargo + "</a>";
			fila += "</h2>";
			fila += '<div class="byline">';
			fila +=
				'<a href="' + urlDescarga + '" style="color:#1ABB9C;">Descargar</a>';
			fila += "</div>";
			fila += "</div>";
			fila += "</div>";
			fila += "</li>";
		});
		fila += "</ul></div>";
		$("#contratos").append(fila);
	});
}

function cargarDetalleAnexos(idTrabajador) {
	$.ajax({
		url: "vistaAnexos",
		type: "POST",
		dataType: "json",
		data: { idTrabajador: idTrabajador },
	}).then(function (msg) {
		var fila = "";
		var urlDescarga = "";
		$("#anexos").empty();
		fila += '<div class="x_content"> <ul class="list-unstyled timeline">';
		$.each(msg.msg, function (i, o) {
			urlDescarga =
				"https://www.imlchile.cl/grupofirma/index.php/ContratosController/descargarAnexo/" + o.cp_anexo;

			fecha = o.atr_fechaDesde.split("-");

			fila += "<li>";
			fila += '<div class="block">';
			fila += '<div class="tags">';
			fila += '<a href="" class="tag">';
			fila += "<span>" + fecha[2] + "-" + fecha[1] + "-" + fecha[0] + "</span>";
			fila += "</a>";
			fila += "</div>";
			fila += '<div class="block_content">';
			fila += '<h2 class="title">';
			fila += "<a>" + o.atr_motivo + "</a>";
			fila += "</h2>";
			fila += '<div class="byline">';
			fila +=
				'<a href="' + urlDescarga + '" style="color:#1ABB9C;">Descargar</a>';
			fila += "</div>";
			fila += "</div>";
			fila += "</div>";
			fila += "</li>";
		});
		fila += "</ul></div>";
		$("#anexos").append(fila);
	});
}

function cargarDetalleTransferencias(idTrabajador) {
	$.ajax({
		url: "vistaTransferencias",
		type: "POST",
		dataType: "json",
		data: { idTrabajador: idTrabajador },
	}).then(function (msg) {
		var fila = "";
		var urlDescarga = "";
		$("#transferencias").empty();
		fila += '<div class="x_content"> <ul class="list-unstyled timeline">';
		$.each(msg.msg, function (i, o) {
			urlDescarga =
				"https://www.imlchile.cl/grupofirma/index.php/TransferenciasController/descargarComprobante/" +
				o.cp_transferencia;

			fecha = o.atr_fecha.split("-");

			fila += "<li>";
			fila += '<div class="block">';
			fila += '<div class="tags">';
			fila += '<a href="" class="tag">';
			fila += "<span>" + fecha[2] + "-" + fecha[1] + "-" + fecha[0] + "</span>";
			fila += "</a>";
			fila += "</div>";
			fila += '<div class="block_content">';
			fila += '<h2 class="title">';
			fila += "<a>" + o.tipo + "</a>";
			fila += "</h2>";
			fila += '<div class="byline">';
			fila +=
				"<span>$" +
				o.atr_monto +
				'&nbsp;</span><br><a href="' +
				urlDescarga +
				'" style="color:#1ABB9C;">Descargar</a>';
			fila += "</div>";
			fila += "</div>";
			fila += "</div>";
			fila += "</li>";
		});
		fila += "</ul></div>";
		$("#transferencias").append(fila);
	});
}

function cargarDetalleCartasDeAmonestacion(idTrabajador) {
	$.ajax({
		url: "vistaCartasAmonestacion",
		type: "POST",
		dataType: "json",
		data: { idTrabajador: idTrabajador },
	}).then(function (msg) {
		var fila = "";
		var urlDescarga = "";
		$("#cartasAmonestacion").empty();
		fila += '<div class="x_content"> <ul class="list-unstyled timeline">';
		$.each(msg.msg, function (i, o) {
			urlDescarga =
				"https://www.imlchile.cl/grupofirma/index.php/CartaAmonestacionController/descargarCartaAmonestacion/" +
				o.cp_cartaAmonestacion;

			fecha = o.atr_fecha.split("-");

			fila += "<li>";
			fila += '<div class="block">';
			fila += '<div class="tags">';
			fila += '<a href="" class="tag">';
			fila += "<span>" + fecha[2] + "-" + fecha[1] + "-" + fecha[0] + "</span>";
			fila += "</a>";
			fila += "</div>";
			fila += '<div class="block_content">';
			fila += '<h2 class="title">';
			fila += "<a>" + o.atr_motivo + "</a>";
			fila += "</h2>";
			fila += '<div class="byline">';
			fila +=
				"<span>Grado: " +
				o.atr_grado +
				'&nbsp;</span><br><a href="' +
				urlDescarga +
				'" style="color:#1ABB9C;">Descargar</a>';
			fila += "</div>";
			fila += "</div>";
			fila += "</div>";
			fila += "</li>";
		});
		fila += "</ul></div>";
		$("#cartasAmonestacion").append(fila);
	});
}

function cargarDetalleContratosPorFecha(mes, ano, idTrabajador) {
	$.ajax({
		url: "vistaContratos",
		type: "POST",
		dataType: "json",
		data: { idTrabajador: idTrabajador },
	}).then(function (msg) {
		var fila = "";
		var urlDescarga = "";
		$("#contratos").empty();
		fila += '<div class="x_content"> <ul class="list-unstyled timeline">';
		$.each(msg.msg, function (i, o) {
			fecha = o.atr_fechaInicio.split("-");

			if (fecha[0] == ano && fecha[1] == mes) {
				urlDescarga =
					"https://www.imlchile.cl/grupofirma/index.php/ContratosController/descargarContrato/" + o.cp_contrato;

				fila += "<li>";
				fila += '<div class="block">';
				fila += '<div class="tags">';
				fila += '<a href="" class="tag">';
				fila +=
					"<span>" + fecha[2] + "-" + fecha[1] + "-" + fecha[0] + "</span>";
				fila += "</a>";
				fila += "</div>";
				fila += '<div class="block_content">';
				fila += '<h2 class="title">';
				fila += "<a>" + o.cargo + "</a>";
				fila += "</h2>";
				fila += '<div class="byline">';
				fila +=
					'<a href="' + urlDescarga + '" style="color:#1ABB9C;">Descargar</a>';
				fila += "</div>";
				fila += "</div>";
				fila += "</div>";
				fila += "</li>";
			}
		});
		fila += "</ul></div>";
		$("#contratos").append(fila);
	});
}

function cargarDetalleAnexosPorFecha(mes, ano, idTrabajador) {
	$.ajax({
		url: "vistaAnexos",
		type: "POST",
		dataType: "json",
		data: { idTrabajador: idTrabajador },
	}).then(function (msg) {
		var fila = "";
		var urlDescarga = "";
		$("#anexos").empty();
		fila += '<div class="x_content"> <ul class="list-unstyled timeline">';
		$.each(msg.msg, function (i, o) {
			fecha = o.atr_fechaDesde.split("-");

			if (fecha[0] == ano && fecha[1] == mes) {
				urlDescarga =
					"https://www.imlchile.cl/grupofirma/index.php/ContratosController/descargarAnexo/" + o.cp_anexo;

				fila += "<li>";
				fila += '<div class="block">';
				fila += '<div class="tags">';
				fila += '<a href="" class="tag">';
				fila +=
					"<span>" + fecha[2] + "-" + fecha[1] + "-" + fecha[0] + "</span>";
				fila += "</a>";
				fila += "</div>";
				fila += '<div class="block_content">';
				fila += '<h2 class="title">';
				fila += "<a>" + o.atr_motivo + "</a>";
				fila += "</h2>";
				fila += '<div class="byline">';
				fila +=
					'<a href="' + urlDescarga + '" style="color:#1ABB9C;">Descargar</a>';
				fila += "</div>";
				fila += "</div>";
				fila += "</div>";
				fila += "</li>";
			}
		});
		fila += "</ul></div>";
		$("#anexos").append(fila);
	});
}

function cargarDetalleTransferenciasPorFecha(mes, ano, idTrabajador) {
	$.ajax({
		url: "vistaTransferencias",
		type: "POST",
		dataType: "json",
		data: { idTrabajador: idTrabajador },
	}).then(function (msg) {
		var fila = "";
		var urlDescarga = "";
		$("#transferencias").empty();
		fila += '<div class="x_content"> <ul class="list-unstyled timeline">';
		$.each(msg.msg, function (i, o) {
			fecha = o.atr_fecha.split("-");

			if (fecha[0] == ano && fecha[1] == mes) {
				urlDescarga =
					"https://www.imlchile.cl/grupofirma/index.php/TransferenciasController/descargarComprobante/" +
					o.cp_transferencia;

				fila += "<li>";
				fila += '<div class="block">';
				fila += '<div class="tags">';
				fila += '<a href="" class="tag">';
				fila +=
					"<span>" + fecha[2] + "-" + fecha[1] + "-" + fecha[0] + "</span>";
				fila += "</a>";
				fila += "</div>";
				fila += '<div class="block_content">';
				fila += '<h2 class="title">';
				fila += "<a>" + o.tipo + "</a>";
				fila += "</h2>";
				fila += '<div class="byline">';
				fila +=
					"<span>$" +
					o.atr_monto +
					'&nbsp;</span><br><a href="' +
					urlDescarga +
					'" style="color:#1ABB9C;">Descargar</a>';
				fila += "</div>";
				fila += "</div>";
				fila += "</div>";
				fila += "</li>";
			}
		});
		fila += "</ul></div>";
		$("#transferencias").append(fila);
	});
}

function cargarDetalleCartasDeAmonestacionPorFecha(mes, ano, idTrabajador) {
	$.ajax({
		url: "vistaCartasAmonestacion",
		type: "POST",
		dataType: "json",
		data: { idTrabajador: idTrabajador },
	}).then(function (msg) {
		var fila = "";
		var urlDescarga = "";
		$("#cartasAmonestacion").empty();
		fila += '<div class="x_content"> <ul class="list-unstyled timeline">';
		$.each(msg.msg, function (i, o) {
			fecha = o.atr_fecha.split("-");

			if (fecha[0] == ano && fecha[1] == mes) {
				urlDescarga =
					"https://www.imlchile.cl/grupofirma/index.php/CartaAmonestacionController/descargarCartaAmonestacion/" +
					o.cp_cartaAmonestacion;

				fila += "<li>";
				fila += '<div class="block">';
				fila += '<div class="tags">';
				fila += '<a href="" class="tag">';
				fila +=
					"<span>" + fecha[2] + "-" + fecha[1] + "-" + fecha[0] + "</span>";
				fila += "</a>";
				fila += "</div>";
				fila += '<div class="block_content">';
				fila += '<h2 class="title">';
				fila += "<a>" + o.atr_motivo + "</a>";
				fila += "</h2>";
				fila += '<div class="byline">';
				fila +=
					"<span>Grado: " +
					o.atr_grado +
					'&nbsp;</span><br><a href="' +
					urlDescarga +
					'" style="color:#1ABB9C;">Descargar</a>';
				fila += "</div>";
				fila += "</div>";
				fila += "</div>";
				fila += "</li>";
			}
		});
		fila += "</ul></div>";
		$("#cartasAmonestacion").append(fila);
	});
}

function cargarDetallePrestamosPorFecha(mes, ano, idTrabajador) {
	$.ajax({
		url: "vistaPrestamos",
		type: "POST",
		dataType: "json",
		data: { idTrabajador: idTrabajador },
	}).then(function (msg) {
		var fila = "";
		var urlDescarga = "";
		$("#prestamos").empty();
		fila += '<div class="x_content"> <ul class="list-unstyled timeline">';
		$.each(msg.msg, function (i, o) {
			fecha = o.atr_fechaPrestamo.split("-");

			alert(o.cp_prestamo);
			if (fecha[0] == ano && fecha[1] == mes) {
				urlDescarga =
					"https://www.imlchile.cl/grupofirma/index.php/PrestamosController/descargarComprobante/" +
					o.cp_prestamo;

				fila += "<li>";
				fila += '<div class="block">';
				fila += '<div class="tags">';
				fila += '<a href="" class="tag">';
				fila +=
					"<span>" + fecha[2] + "-" + fecha[1] + "-" + fecha[0] + "</span>";
				fila += "</a>";
				fila += "</div>";
				fila += '<div class="block_content">';
				fila += '<h2 class="title">';
				fila += "<a>$" + o.atr_montoTotal + "</a>";
				fila += "</h2>";
				fila += '<div class="byline">';
				fila +=
					"<span>Autoriza: " +
					o.atr_autoriza +
					'&nbsp;</span><br><a href="' +
					urlDescarga +
					'" style="color:#1ABB9C;">Descargar</a>';
				fila += "</div>";
				fila += "</div>";
				fila += "</div>";
				fila += "</li>";
			}
		});
		fila += "</ul></div>";
		$("#prestamos").append(fila);
	});
}
