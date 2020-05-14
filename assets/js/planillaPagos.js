var base_url = 'http://localhost/GRUPOFIRMA/index.php/';


function cargarTablaPagosFinDeMes (){
  var table = $('#tabla_pagos5').DataTable();
  table.destroy();

  var mesActual = $('#getSelectMes').val();
  var anoActual = $('#getSelectAno').val();
  var diaTermino = 29;

  if (mesActual == '00') {
    var fechaHoy = new Date();
    var mesActual = fechaHoy.getMonth()+1;
    if (mesActual < 10) {
      mesActual = '0'+mesActual;
      alert(mesActual);
    }
  }


  if (mesActual == '04' || mesActual == '06' || mesActual == '09' || mesActual == '11') {
    diaTermino = 30;
  }else{
    if (mesActual == '01' || mesActual == '03' || mesActual == '05' || mesActual == '07' || mesActual == '08' || mesActual == '10' || mesActual == '12' ) {
      diaTermino = 31;
    }
  }


  var btnAcciones = "";

  // VER DETALLE
    btnAcciones += '<button style="display:inline" type="button" id="btnVerDetallePago" class="btn btn-info btn-sm" data-toggle="modal" data-target="#modalVertDetallePago"><i class="glyphicon glyphicon-usd"></i></button>';

  // CARGAR COMPROBANTE
    btnAcciones += '<button style="display:inline" type="button" id="btnCargarComprobante" class="btn btn-info btn-sm" data-toggle="modal" data-target="#modalCargarComprobante"><i class="glyphicon glyphicon-open"></i></button>';

  $('.dataTables-tabla_pagos5').DataTable({
    "autoWidth": false,
    "sInfo": false,
    "sInfoEmpty": false,
    // "dom": '<"top"f>rt<"bottom"flp><"clear">',
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
            url: 'http://localhost/GRUPOFIRMA/index.php/getListadoPagosFinDeMes?year='+anoActual+'&&mes='+mesActual+'&&diaTermino='+diaTermino,
            type: 'GET',
            data: {}
        },
        "columnDefs": [{
                "targets": 8,
                "data": null,
                "defaultContent": btnAcciones
            }

        ],dom: '<"html5buttons"B>lTfgitp',
        buttons: [
        ]
    });
}
