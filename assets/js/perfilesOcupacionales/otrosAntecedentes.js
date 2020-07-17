var base_url = "http://www.imlchilelocal.cl/index.php/";
var constante = 0;

function cargarTabla(permisoEliminar) {
	//obteneción de valores
	var cargo = $("#getSelectCargo").val();
	var antecedente = $("#getSelectTitulos").val();

	//destuir datatable actual
	var table = $("#tabla_otrosAntecedentes").DataTable();
	table.destroy();

	var btnAcciones = "";

	if (permisoEliminar == "si") {
		btnAcciones =
			'<button type="button" id="btnEliminarOtroAntecedente" class="btn btn-danger btn-sm"><i class="glyphicon glyphicon-trash"></i></button>';
	}

	$(".dataTables-otrosAntecedentes").DataTable({
		info: false,
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
		},
		ajax: {
			url:
				"http://www.imlchilelocal.cl/index.php/getListadoOtrosAntecedentesDataTable?idCargo=" +
				cargo +
				"&idAntecedente=" +
				antecedente,
			type: "GET",
		},
		columnDefs: [
			{
				targets: 2,
				defaultContent: btnAcciones,
			},
		],
		dom: '<"html5buttons"B>lTfgitp',
		buttons: [],
	});
}

function eliminarOtroAntecedente(idOtroAntecedente) {
	$.ajax({
		url: "deleteOtroAntecedente",
		type: "POST",
		dataType: "json",
		data: { idOtroAntecedente: idOtroAntecedente },
	}).then(function (msg) {
		toastr.success("Otro antecedente eliminado");
		var permisoEliminar = $("#permisoEliminar").text();
		cargarTabla(permisoEliminar);
	});
}

function getSelectTitulos() {
	var cargo = $("#getSelectCargo").val();
	var url = base_url + "getTitulos";
	var data = { cargo: cargo };
	document.getElementById("getSelectTitulos").innerHTML = "";
	var fila = "<option disabled selected>Seleccione una opción</option>";
	$.post(
		url,
		data,
		function (msg) {
			$.each(msg.msg, function (i, o) {
				fila +=
					"<option value='" +
					o.cp_titulo +
					"'>" +
					o.atr_descripcion +
					"</option>";
			});
			$("#getSelectTitulos").append(fila);
		},
		"json"
	);
}

function agregarTitulo() {
	var cargo = $("#getSelectCargo").val();
	var descripcion = $("#nombre").val();

	$.ajax({
		url: "addTitulo",
		type: "POST",
		dataType: "json",
		data: { descripcion: descripcion, cargo: cargo },
	}).then(function (msg) {
		if (msg.msg == "ok") {
			toastr.success("Titulo agregado");
			$("#modalCrearTitulo").modal("hide");
			getSelectTitulos();
		}
	});
}

//Aquí realizamos el comienzo del proceso para guardar todas las tareas que fueron ingresadas con un determinado cargo.
function agregarListaDeOtrosAntecedentes() {
	// Valor del cargo seleccionado
	var cargo = $("#getSelectCargo").val();
	var titulo = $("#getSelectTitulos").val();

	var identificadorInput = "";
	var antecedente = "",
		cnt = 0;
	var cantidadIngresoExitoso = 0;

	// Recorrer eL listado de tareas creadas
	for (var i = 0; i < constante; i++) {
		//controlo el autoincrementable del id de los inputs generados
		cnt = i + 1;
		//genero el id del input
		identificadorInput = "textarea" + cnt;
		//obtengo el valor del input de id generado en el paso anterior
		antecedente = $("#" + identificadorInput).val();
		//Agrego la tarea
		if (antecedente != "") {
			$.ajax({
				url: "addAntecedente",
				type: "POST",
				dataType: "json",
				data: { antecedente: antecedente, cargo: cargo, titulo: titulo },
			}).then(function (msg) {
				if (msg.msg == "ok") {
					toastr.success("Listado actualizado");
					var permisoEliminar = $("#permisoEliminar").text();
					cargarTabla(permisoEliminar);
				} else {
					toastr.warning("El antecedente ya existe");
				}
			});
		}
	}

	//Se inicializa en 0 para que al cambiar de cargo los inputs nuevamente comiencen desde 0
	constante = 0;
	$("#otros").empty();
	document.getElementById("btnAgregarListaDeOtrosAntecedentes").style.display =
		"none";
	//muestro el boton de guardar
	document
		.getElementById("btnAgregarOtrosAntecedentes")
		.removeAttribute("style");
}

function bloquearBoton() {
	//oculto boton de agregar inputs
	document.getElementById("btnAgregarOtrosAntecedentes").style.display = "none";
	//muestro el boton de guardar
	document
		.getElementById("btnAgregarListaDeOtrosAntecedentes")
		.removeAttribute("style");
}

// Agrega un input cada vez que es llamada la función 'agregarTarea()'
// Llama a la función contar para saber qué id es el siguiente en ser concatenado al id
function agregarOtroAntecedente() {
	constante = constante + 1;
	var fila = document.getElementById("otros");
	var count = contar();
	fila.innerHTML +=
		'<div class="col-md-12 perfilOcupacional"><textarea type="text" style="margin-bottom:15px;" class="form-control custom-input-sm " onkeypress="bloquearBoton()" id="textarea' +
		count +
		'"></textarea></div>';
}

// la función contar me devuelve la cantidad de inputs que comienzen con id='input_tarea'
function contar() {
	var inputs = $("textarea[id^=textarea]");
	var count = inputs.length + 1;
	return count;
}
