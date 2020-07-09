var base_url = "https://www.imlchile.cl/dev_test/grupofirma/index.php/";

function getExistenciasPorModulo() {
	var url = base_url + "getModulos";
	var fila = "";
	var contadorDeCantidadPermisos = 0;
	$("#contenerdorParaPermisos").empty();

	$.getJSON(url, function (result) {
		fila += '<div class="row">';

		$.ajax({
			url: "getExistenciasPorModulo",
			type: "POST",
			dataType: "json",
			data: { modulo: m.cp_modulo },
		}).then(function (result) {
			$.each(result.arrayModulos, function (i, m) {
				fila +=
					'<div class="x_panel col-md-6" style="background-color:#f7f7f7; border:none">';
				fila += "<h6>" + m.atr_nombre + "</h6>";
			});
		});

		//     fila += '<div class="x_content">';
		//     fila += '<ul>';
		//     $.each(permisos.msg, function (i, o) {
		//       contadorDeCantidadPermisos = contadorDeCantidadPermisos + 1;
		//       fila += '<li>HELLO</li>';
		//     });
		//     fila += '</ul>';
		//   });
		//   fila += '</div>';
		// });
		// fila += '</div>';

		$("#contenerdorParaPermisos").append(fila);
	});
}

function getSelectPerfiles() {
	var url = base_url + "getPerfiles";
	$("#getSelectPerfiles").empty();
	var fila = "<option disabled selected>Seleccione una opción</option>";
	$.getJSON(url, function (result) {
		$.each(result, function (i, o) {
			fila +=
				"<option value='" + o.cp_perfil + "'>" + o.atr_nombre + "</option>";
		});
		$("#getSelectPerfiles").append(fila);
	});
}

function getSelectUsuariosPorPerfil() {
	var url = base_url + "cargarUsuariosConPerfil";
	$("#getSelectUsuariosPorPerfil").empty();
	var fila = "<option disabled selected>Seleccione una opción</option>";
	$.getJSON(url, function (result) {
		$.each(result, function (i, o) {
			fila +=
				"<option value='" + o.cp_usuario + "'>" + o.atr_nombre + "</option>";
		});
		$("#getSelectUsuariosPorPerfil").append(fila);
	});
}

function getDetallePermisosUsuario() {
	var usuario = $("#getSelectUsuariosPorPerfil").val();

	var url = base_url + "getListadoPermisosExistentes";
	var url2 = base_url + "getModulos";

	$.getJSON(url2, function (result) {
		$.each(result, function (i, o) { });

		$.getJSON(url, function (result) {
			$.each(result, function (i, p) { });

			$("#getSelectUsuariosPorPerfil").append(fila);
		});
	});
}

function cargarTablaPerfiles() {
	var table = $("#tabla_perfiles").DataTable();
	table.destroy();

	btnAcciones =
		'<a style="display:inline" href="https://www.imlchile.cl/dev_test/grupofirma/index.php/inicioPermisosPerfil" type="button" id="btnVerPermisos" class="btn btn-info btn-sm"><i class="fa fa-shield"></i></a>';

	$(".dataTables-perfiles").DataTable({
		autoWidth: false,
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
			url: "https://www.imlchile.cl/dev_test/grupofirma/index.php/getPerfilesTabla",
			type: "GET",
		},
		columnDefs: [
			{
				targets: 2,
				data: null,
				defaultContent: btnAcciones,
			},
		],
		dom: '<"html5buttons"B>lTfgitp',
		buttons: [],
	});
}

function cargarTablaUsuarios() {
	var table = $("#tabla_usuario").DataTable();
	table.destroy();

	var btnAcciones =
		'<a style="display:inline" href="https://www.imlchile.cl/dev_test/grupofirma/index.php/inicioPermisosUsuario" type="button" id="btnVerPermisos" class="btn btn-info btn-sm"><i class="fa fa-shield"></i></a>';

	$(".dataTables-usuarios").DataTable({
		autoWidth: false,
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
			url: "https://www.imlchile.cl/dev_test/grupofirma/index.php/getListadoUsuarios",
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
