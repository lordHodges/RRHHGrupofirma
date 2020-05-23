var base_url = 'https://imlchile.cl/grupofirma/index.php/';

/*************************** TRANSFERENCIAS ****************************/

function cargarTabla(permisoSubir){
  var table = $('#tabla_trabajador').DataTable();
  table.destroy();

  var btnAcciones = "";

  // VER CARTAS DE AMONESTACIÓN
  if (permisoSubir == "si") {
    btnAcciones += '<button style="display:inline" type="button" id="btnSubirArchivo" class="btn btn-info btn-sm" data-toggle="modal" data-target="#modalCargarArchivo"><i class="glyphicon glyphicon-open"></i></button>';
  }else{
    btnAcciones += '';
  }

  // DESCARGAR CARTAS DE AMONESTACIÓN
  btnAcciones += '<button style="display:inline" type="button" id="btnVerListaCartasAmonestacion" class="btn btn-info btn-sm" data-toggle="modal" data-target="#modalVerListaCartasAmonestacion"><i class="glyphicon glyphicon-folder-open"></i></button> ';


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
            url: "https://imlchile.cl/grupofirma/index.php/getListadoTrabajadoresContrato",
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



function getCartasAmonestacionTrabajador(idTrabajador){
  var permisoDescargar = $("#permisoDescargar").text();
  $.ajax({
      url: 'getCartasAmonestacionTrabajador',
      type: 'POST',
      dataType: 'json',
      data: {"idTrabajador": idTrabajador}
  }).then(function (response) {
      var fila = "";
      var download = "";
      var monto, fecha, arrayFecha;

      $("#modalDetalleCartasAmonestacion").empty();

      fila +='<h5 class="modal-title mx-auto">LISTADO DE CARTAS DE AMONESTACIÓN</h5><button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>';
      fila +='<table class="table table-bordered tableInModal" style="margin-top:20px;"> <thead> <tr> <td class="text-center">Carta de amonestación</td> <td class="text-center">Fecha</td> <td class="text-center">Motivo</td> <td class="text-center">Grado</td> <td class="text-center">Descargar</td> </tr> </thead> <tbody>';
      importarScript("https://imlchile.cl/grupofirma/assets/js/validaciones.js");
      $.each(response.msg, function (i, o) {
        arrayFecha =  o.atr_fecha.split("-");
        fecha = arrayFecha[2]+"-"+arrayFecha[1]+"-"+arrayFecha[0];
        fila +='<tr>';
        fila +='<td>'+o.cp_cartaAmonestacion+'</td>';
        fila +='<td>'+fecha+'</td>';
        fila +='<td>'+o.atr_motivo+'</td>';
        fila +='<td>'+o.atr_grado+'</td>';
        if(o.atr_ruta == "vacio"){
          if (permisoDescargar == "si") {
            fila +='<td> <a class="btn btn-ded btn-sm" class="isDisabled" href="#"><i class="glyphicon glyphicon-download-alt"></i></a> </td>';
          }else{
            fila += '<td><a class="btn btn-default btn-sm" href="#"><i class="glyphicon glyphicon-download-alt"></i></a> </td>';
          }
        }else{
          download = "https://imlchile.cl/grupofirma/index.php/CartaAmonestacionController/descargarCartaAmonestacion/"+o.cp_cartaAmonestacion;
          if (permisoDescargar == "si") {
            fila +='<td> <a class="btn btn-info btn-sm" href="'+download+'" download><i class="glyphicon glyphicon-download-alt"></i></a> </td>';
          }else{
            fila += '<td><a class="btn btn-default btn-sm" href="#"><i class="glyphicon glyphicon-download-alt"></i></a> </td>';
          }
        }
        fila +='</tr>';
      });
      fila +='</body> </table>';
      $("#modalDetalleCartasAmonestacion").append(fila);
  });
}

function importarScript(nombre) {
    var s = document.createElement("script");
    s.src = nombre;
    document.querySelector("head").appendChild(s);
}
