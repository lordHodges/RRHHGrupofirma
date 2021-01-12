var base_url = "http://localhost/rrhh/index.php/";

function cargarTablaHaberDescuento(permisoExportar){
    // console.log("cargarTablaHaberDescuento");
    var table = $("#tabla_haberDescuento").DataTable();
    table.destroy();

    if (permisoExportar == "si"){
        $(".dataTables-haberDescuento").DataTable({
            autoWidth: false,
            info: false,
			sInfo: false,
			sInfoEmpty: false,
			sInfoFiltered: false,
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
				url: base_url + "getListadoHaberDescuento",
				type: "GET",
			},
			columnDefs: [{}],
			dom: '<"html5buttons"B>lTfgitp',
			buttons: [
				{
                    extend: "copy",
				},
				{
                    extend: "csv",
				},
				{
					extend: "excel",
                    title: "Listado de Haberes o Descuentos",
				},
				{
					extend: "pdf",
                    title: "Listado de Haberes o Descuentos",
				},
				{
					extend: "print",
                    title: "Grupo Firma",
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
		$(".dataTables-haberDescuento").DataTable({
			autoWidth: false,
			info: false,
			sInfo: false,
			sInfoEmpty: false,
			sInfoFiltered: false,
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
				url: base_url + "getListadoHaberDescuento",
				type: "GET",
			},
			columnDefs: [{}],
			dom: '<"html5buttons"B>lTfgitp',
			buttons: [],
		});
	}
}

function getSelectHaberDescuento() {
	var url = base_url + "getListadoHaberDescuento";
	$("#getSelectHaberDescuento").empty();
	var fila = "<option disabled selected>Seleccione una opción</option>";
	$.getJSON(url, function (result) {
		$.each(result, function (i, o) {
			fila +=
				"<option value='" + o.cp_hdescuentos + "'>" + o.atr_dhdescuentos +"</option>";
		});
		$("#getSelectHaberDescuento").append(fila);
	});
}

function agregarHaberDescuento() {
    var dhdescuentos = $("#dhdescuentos").val();
    var tipo = $("#tipo").val();
    var imponible = $("#imponible").val();
    var tributable = $("#tributable").val();
    var gratificable = $("#gratificable").val();
    var fijo = $("#fijo").val();
    var variable = $("#variable").val();
	var semcorrida = $("#semcorrida").val();
    
    if ( dhdescuentos == "" ) {
		toastr.error("Agregar descripción de haberes o descuentos");
    } else {
        $.ajax({
            url: base_url + "addHaberDescuento",
            type: "POST",
            dataType: "json",
            data: { 
                dhdescuentos: dhdescuentos,
                tipo: tipo,
                imponible: imponible,
                tributable: tributable,
                gratificable: gratificable,
                fijo: fijo,
                variable: variable,
                semcorrida: semcorrida,
            },
        }).then(function (msg) {
            if (msg.msg == "ok") {
                toastr.success("Haber o Descuento ingresado");
                document.getElementById("dhdescuentos").value = "";
                document.getElementById("tipo").value = "";
                document.getElementById("imponible").value = "";
                document.getElementById("tributable").value = "";
                document.getElementById("gratificable").value = "";
                document.getElementById("fijo").value = "";
                document.getElementById("variable").value = "";
                document.getElementById("semcorrida").value = "";
                console.log("ok");
                $("#myModal").modal("hide");
                var permisoExportar = $("#permisoExportar").text();
                cargarTablaHaberDescuento(permisoExportar);
            } else {
                toastr.success("Error en el ingreso");
            }
        });
    }
}