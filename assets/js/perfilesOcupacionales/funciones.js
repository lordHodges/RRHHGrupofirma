var base_url = "http://www.imlchilel.cl/grupofirma/index.php/";
var constante = 0;

function cargarTabla(cargo, permisoEliminar) {
	var table = $("#tabla_funciones").DataTable();
	table.destroy();

	var btnAcciones = "";

	if (permisoEliminar == "si") {
		btnAcciones =
			'<button type="button" id="btnEliminarTarea" class="btn btn-danger btn-sm"><i class="glyphicon glyphicon-trash"></i></button>';
	}

	$(".dataTables-funciones").DataTable({
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
			url: "http://www.imlchilel.cl/grupofirma/index.php/getListadoTareasDataTable?id=" + cargo,
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

function eliminarTarea(idTarea) {
	var cargo = $("#getSelectCargo").val();
	$.ajax({
		url: "deleteTarea",
		type: "POST",
		dataType: "json",
		data: { idTarea: idTarea },
	}).then(function (msg) {
		toastr.success("Función eliminada");
		var permisoEliminar = $("#permisoEliminar").text();
		//recargar el datatable
		cargarTabla(cargo, permisoEliminar);
	});
}

//Aquí realizamos el comienzo del proceso para guardar todas las tareas que fueron ingresadas con un determinado cargo.
function agregarListaDeTareas() {
	// Valor del cargo seleccionado
	var cargo = $("#getSelectCargo").val();

	var identificadorInput = "";
	var tarea = "",
		cnt = 0;
	var cantidadIngresoExitoso = 0;

	// Recorrer eL listado de tareas creadas
	for (var i = 0; i < constante; i++) {
		//controlo el autoincrementable del id de los inputs generados
		cnt = i + 1;
		//genero el id del input
		identificadorInput = "input_tarea" + cnt;
		//obtengo el valor del input de id generado en el paso anterior
		tarea = $("#" + identificadorInput).val();
		//Agrego la tarea
		if (tarea != "") {
			$.ajax({
				url: "addTarea",
				type: "POST",
				dataType: "json",
				data: { tarea: tarea, cargo: cargo },
			}).then(function (msg) {
				if (msg.msg == "ok") {
					toastr.success("Requisitos mínimos agregados");
					var permisoEliminar = $("#permisoEliminar").text();
					//recargar el datatable
					cargarTabla(cargo, permisoEliminar);
				} else {
					toastr.warning("Función ya existe");
				}
			});
		}
	}
	//Se inicializa en 0 para que al cambiar de cargo los inputs nuevamente comiencen desde 0
	constante = 0;

	$("#tareas").empty();
	var permisoEliminar = $("#permisoEliminar").text();
	//recargar el datatable
	cargarTabla(cargo, permisoEliminar);
	document.getElementById("btnAgregarListaDeTareas").style.display = "none";
}

function bloquearBoton() {
	//oculto boton de agregar inputs
	document.getElementById("btnAgregarTarea").style.display = "none";
	//muestro el boton de guardar
	document.getElementById("btnAgregarListaDeTareas").removeAttribute("style");
}

function autocompleteTareas() {
	var url = base_url + "getListadoTareas";
	var tareas = [];
	$.getJSON(url, function (result) {
		$.each(result, function (i, o) {
			tareas.push(o.atr_descripcion);
		});
	});
	$(".autocompleteTareas").autocomplete({
		source: tareas,
	});
}

// Agrega un input cada vez que es llamada la función 'agregarTarea()'
// Llama a la función contar para saber qué id es el siguiente en ser concatenado al id
function agregarTarea() {
	constante = constante + 1;
	var fila = document.getElementById("tareas");
	var count = contar();
	fila.innerHTML +=
		'<div class="col-md-12 perfilOcupacional"><input type="text" style="margin-bottom:15px;" class="form-control custom-input-sm " onkeypress="bloquearBoton()" id="input_tarea' +
		count +
		'"></div>';
}

// la función contar me devuelve la cantidad de inputs que comienzen con id='input_tarea'
function contar() {
	var inputs = $("input[id^=input_tarea]");
	var count = inputs.length + 1;
	return count;
}
