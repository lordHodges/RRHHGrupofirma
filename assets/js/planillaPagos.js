var base_url = 'http://localhost/GRUPOFIRMA/index.php/';


function cargarTablaPagosFinDeMes(){
  var table = $('#tabla_trabajador').DataTable();
  table.destroy();

  var btnAcciones = "";

  // VER DETALLE
    btnAcciones += '<button style="display:inline" type="button" id="btnVerDetallePago" class="btn btn-info btn-sm" data-toggle="modal" data-target="#modalVertDetallePago"><i class="glyphicon glyphicon-usd"></i></button>';

  // CARGAR COMPROBANTE
    btnAcciones += '<button style="display:inline" type="button" id="btnCargarComprobante" class="btn btn-info btn-sm" data-toggle="modal" data-target="#modalCargarComprobante"><i class="glyphicon glyphicon-open"></i></button>';

  $('.dataTables-trabajadores').DataTable({
    "autoWidth": false,
    "sInfo": false,
    "sInfoEmpty": false,
        language: {
            "sProcessing": "Procesando...",
            "sLengthMenu": "Registros&nbsp;&nbsp; _MENU_ ",
            "sZeroRecords": "No se encontraron resultados",
            "sEmptyTable": "Ningún dato disponible en esta tabla",
            "sInfo": "",
            "sInfoEmpty": "",
            "sInfoFiltered": "",
            "sInfoPostFix": "",
            "sSearch": "Buscar:&nbsp;&nbsp;",
            "sUrl": "",
            "sInfoThousands": ",",
            "sLoadingRecords": "Cargando...",
            "oPaginate": {
                "sFirst": "Primero",
                "sLast": "Último",
                "sNext": "Siguiente",
                "sPrevious": "Anterior"
            },
            "oAria": {
                "sSortAscending": ": Activar para ordenar la columna de manera ascendente",
                "sSortDescending": ": Activar para ordenar la columna de manera descendente"
            },
            "buttons": {
                "copy": "Copiar",
                "colvis": "Visibilidad"
            }
        },
        "ajax": {
            url: "http://localhost/GRUPOFIRMA/index.php/getListadoPagosFinDeMes",
            type: 'GET'
        },
        "columnDefs": [{
                "targets": 5,
                "data": null,
                "defaultContent": btnAcciones
            }

        ],dom: '<"html5buttons"B>lTfgitp',
        buttons: [
        ]
    });
}
