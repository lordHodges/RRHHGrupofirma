var base_url = "https://www.imlchile.cl/grupofirma/index.php/";

var constante = 0;
var constanteRemuneraciones = 0;

function deleteRemuneracionExtra(boton) {
	var descripcionRemuneracionExtra = boton.value;
	var idCargo = $("#idCargo").text();

	$.ajax({
		url: "deleteRemuneracionExtra",
		type: "POST",
		dataType: "json",
		data: {
			idCargo: idCargo,
			descripcionRemuneracionExtra: descripcionRemuneracionExtra,
		},
	}).then(function (response) {
		if (response.msg == "ok") {
			toastr.success("Remuneración extra eliminada");
			getDetalleRemuneracion($("#idCargo").text());
		} else {
		}
	});
}

function getDetalleRemuneracion(id) {
	var idCargo = id;

	$.ajax({
		url: "getDetalleRemuneracion",
		type: "POST",
		dataType: "json",
		data: { idCargo: idCargo },
	}).then(function (response) {
		$("#contenedorDetalleRemuneración").empty();

		var fila = "";
		var contadorRemuneraciones = 1;
		$.each(response.msg.array_remuneracion, function (i, o) {
			fila +=
				'<h5 class="modal-title mx-auto">REMUNERACIÓN</h5><button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>';

			fila +=
				'<div class="col-md-12"><h5 id="cargoActual" class="text-center" style="color:#fafafa;">' +
				o.atr_nombre +
				'</h5><label id="idCargo" style="color:#2A3F54; position:absolute; margin-top:0px;">' +
				o.cp_cargo +
				"</label></div>";

			fila +=
				'<div class="col-md-12"><br><label for="nombre">Sueldo mensual:&nbsp;$ </label><label id="sueldoMensualActual">' +
				o.atr_sueldoMensual +
				'</label><input type="text" onkeyup="this.value=soloNumeros(this.value); formatoMiles(this);" class="form-control custom-input-sm" id="sueldoMensualNuevo"></div>';

			fila +=
				'<div class="col-md-12"><br><label for="imposiciones">Imposiciones</label><select class="custom-select" id="getSelectImposiciones"><option disabled selected >Seleccione una opción</option><option value="1">Si</option><option value="0">No</option></select></div>';

			fila +=
				'<div class="col-md-12"><br><label for="nombre">Colación:&nbsp;$ </label><label id="colacionActual">' +
				o.atr_colacion +
				'</label><input type="text" class="form-control custom-input-sm" onkeyup="this.value=soloNumeros(this.value); formatoMiles(this);" id="colacionNuevo"></div>';

			fila +=
				'<div class="col-md-12"><br><label for="nombre">Movilización:&nbsp; $</label><label id="movilizacionActual">' +
				o.atr_movilizacion +
				'</label><input type="text" class="form-control custom-input-sm" onkeyup="this.value=soloNumeros(this.value); formatoMiles(this);" id="movilizacionNuevo"></div>';

			fila +=
				'<div class="col-md-12"><br><label for="nombre">Asistencia:&nbsp; $</label><label id="asistenciaActual">' +
				o.atr_asistencia +
				'</label><input type="text" class="form-control custom-input-sm" onkeyup="this.value=soloNumeros(this.value); formatoMiles(this);" id="asistenciaNuevo"></div>';

			fila +=
				'<div class="col-md-10"><br><label > OTRAS REMUNERACIONES &nbsp</label><button type="button" class="btn btn-success btn-sm center"  id="btnAgregarInputRemuneracionesExtra" ><i class="glyphicon glyphicon-plus"></i></button></div>';
			fila += '<div id="contenedorDeRemuneraciones" class="col-md-12"></div>';

			fila += '<div id="remuneracionesActuales" class="col-md-12">';

			$.each(response.msg.array_remuneracionExtra, function (i, r) {
				fila +=
					'<div class="col-md-12"><br><button type="button" class="btn btn-danger btn-sm center" value="' +
					r.atr_descripcion +
					'" onclick="deleteRemuneracionExtra(this)"><i class="glyphicon glyphicon-minus"></i></button>&nbsp;<label id="remuneracionActual_' +
					contadorRemuneraciones +
					'">' +
					r.atr_descripcion +
					'</label><input type="text" id="remuneracionNuevo_' +
					contadorRemuneraciones +
					'" placeholder="Escriba aquí para modificar" class="form-control custom-input-sm" id="remuneracionNuevo_' +
					r.cp_remuneracion +
					'"></div>';
				contadorRemuneraciones = contadorRemuneraciones + 1;
				constanteRemuneraciones = constanteRemuneraciones + 1;
			});

			fila += "</div>";

			$("#contenedorDetalleRemuneración").append(fila);
		});
	});
}

function agregaInputRemuneracionesExtra() {
	constante = constante + 1;
	var fila = document.getElementById("contenedorDeRemuneraciones");
	var count = contar();
	fila.innerHTML +=
		'<div class="col-md-12" style="margin-top:10px; color:#848484"><input type="text" class="form-control custom-input-sm " onkeypress="btnAgregarInputRemuneracionesExtra()" id="input_tarea' +
		count +
		'" required></div>';
}

// la función contar me devuelve la cantidad de inputs que comienzen con id='input_tarea'
function contar() {
	var inputs = $("input[id^=input_tarea]");
	var count = inputs.length + 1;
	return count;
}

function btnAgregarInputRemuneracionesExtra() {
	//oculto boton de agregar inputs
	document.getElementById("btnAgregarInputRemuneracionesExtra").style.display =
		"none";
}

function updateRemuneracion() {
	var id = $("#idCargo").text();
	var sueldoMensual = $("#sueldoMensualNuevo").val();
	var colacion = $("#colacionNuevo").val();
	var movilizacion = $("#movilizacionNuevo").val();
	var imposiciones = $("#getSelectImposiciones").val();
	var asistencia = $("#asistenciaNuevo").val();

	if (
		sueldoMensual == "" &&
		colacion == "" &&
		movilizacion == "" &&
		imposiciones == null &&
		asistencia == ""
	) {
		// SI ENTRA AQUI ES PORQUE NO SE MODIFICO NINGUN DATO, POR ENDE NO SE EJECUTA NADA MAS.
	} else {
		// VALIDACIÓN DE CAMPOS DE TEXTO VACIOS. Si los campos son vacios se mantiene el valor original en la base de datos.
		if (sueldoMensual == "") {
			sueldoMensual = $("#sueldoMensualActual").text();
		}
		if (colacion == "") {
			colacion = $("#colacionActual").text();
		}
		if (movilizacion == "") {
			movilizacion = $("#movilizacionActual").text();
		}
		if (asistencia == "") {
			asistencia = $("#asistenciaActual").text();
		}
		// ACTUALIZACION DE CARGOS
		$.ajax({
			url: "updateRemuneracion",
			type: "POST",
			dataType: "json",
			data: {
				idCargo: id,
				sueldoMensual: sueldoMensual,
				colacion: colacion,
				movilizacion: movilizacion,
				imposiciones: imposiciones,
				asistencia: asistencia,
			},
		}).then(function (msg) {
			if (msg == "ok") {
			} else {
				// toastr.error('Ha ocurrido un error, favor contáctese con el soporte.');
			}
		});
		toastr.success("Remuneración actualizada");
		$("#modalEditarRemuneración").modal("hide");
	}

	// ACTUALIZACION DE OTRAS REMUNERACIONES EXISTENTES
	var identificadorInput = "";
	var remuneracion = "",
		cnt = 1;
	var cantidadIngresoExitoso = 0;

	// Recorrer eL listado de remuneraciones creadas
	for (var i = 0; i < constanteRemuneraciones; i++) {
		//genero el id del input
		identificadorInputActual = "remuneracionActual_" + cnt;

		identificadorInputNuevo = "remuneracionNuevo_" + cnt;
		//controlo el autoincrementable del id de los inputs generados
		cnt = cnt + 1;

		var descripcionNueva = $("#" + identificadorInputNuevo).val();

		if (descripcionNueva == "" || descripcionNueva == null) {
		} else {
			var descripcionActual = $("#" + identificadorInputActual).text();

			$.ajax({
				url: "updateRemuneracionExtra",
				type: "POST",
				dataType: "json",
				data: {
					descripcionActual: descripcionActual,
					descripcionNueva: descripcionNueva,
					idCargo: id,
				},
			}).then(function (msg) {
				toastr.success("Remuneración extra actualizada");
			});
		}
	}

	// ADICIÓN DE NUEVAS RESPONSABILIDADES

	identificadorInput = "";
	(remuneracion = ""), (cnt = 1);
	cantidadIngresoExitoso = 0;

	// Recorrer eL listado de tareas creadas
	for (var i = 0; i < constante; i++) {
		//genero el id del input
		identificadorInput = "input_tarea" + cnt;
		//controlo el autoincrementable del id de los inputs generados
		cnt = cnt + 1;

		var remuneracion = $("#" + identificadorInput).val();
		// alert("responsabilidad: "+responsabilidad);
		if (remuneracion != "") {
			$.ajax({
				url: "addRemuneracionPorIDCargo",
				type: "POST",
				dataType: "json",
				data: { remuneracion: remuneracion, cargo: id },
			}).then(function (msg) {
				if (msg.msg == "ok") {
					toastr.success("Remuneración extra agregada");
				} else {
					// toastr.error('Ha ocurrido un error, favor contáctese con el soporte.');
				}
			});
		}
	}

	constanteRemuneraciones = 0;
	getDetalleRemuneracion($("#idCargo").text());
	// $('#modalEditarRemuneración').modal('hide');
}
