<<<<<<< HEAD
var base_url = 'http://localhost/GRUPOFIRMA/index.php/';
=======
var base_url = 'http://10.10.11.240/GRUPOFIRMA/index.php/';
>>>>>>> 6d452e33e03ff9b08367071c515f6627be833f1a


function cargarTabla(permisoSubir){
    var table = $('#tabla_finiquitos').DataTable();
    table.destroy();

    var btnAcciones = "";

    // DESCARGAR CONTRATOS


      btnAcciones += '<button style="display:inline" type="button" id="btnVerListaFiniquitos" class="btn btn-info btn-sm" data-toggle="modal" data-target="#modalVerListaFiniquitos"><i class="glyphicon glyphicon-folder-open"></i></button>';

    // VER CONTRATOS
    if (permisoSubir == "si") {
        btnAcciones += '<button style="display:inline" type="button" id="btnModalCargarArchivo" class="btn btn-info btn-sm" data-toggle="modal" data-target="#modalCargarArchivo"><i class="glyphicon glyphicon-open"></i></button>';
    }else{
      btnAcciones += '<button style="display:inline" type="button" id="btnModalCargarArchivo" class="btn btn-default btn-sm" disabled data-toggle="modal" data-target="#modalCargarArchivo"><i class="glyphicon glyphicon-open"></i></button>';
    }

    $('.dataTables-finiquitos').DataTable({
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
<<<<<<< HEAD
              url: "http://localhost/GRUPOFIRMA/index.php/getListadoTrabajadoresContrato",
=======
              url: "http://10.10.11.240/GRUPOFIRMA/index.php/getListadoTrabajadoresContrato",
>>>>>>> 6d452e33e03ff9b08367071c515f6627be833f1a
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






function getFiniquitosTrabajador(idTrabajador){
    var permisoDescargar = $("#permisoDescargar").text();
    $.ajax({
        url: 'getFiniquitosTrabajador',
        type: 'POST',
        dataType: 'json',
        data: {"idTrabajador": idTrabajador}
    }).then(function (response) {
        var fila = "";
        var download = "";

        $("#modalDetalleFiniquitos").empty();

        fila +='<h5 class="modal-title mx-auto">LISTADO DE FINIQUITOS</h5><button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>';
        fila +='<table class="table table-bordered tableInModal" style="margin-top:20px;"> <thead> <tr> <td class="text-center">Finiquito</td> <td class="text-center">Fecha</td> <td class="text-center">Monto</td> <td class="text-center">Acciones</td> </tr> </thead> <tbody>';
        $.each(response.msg, function (i, o) {

          fila +='<tr>';
          fila +='<td>'+o.cp_finiquito+'</td>';
          fila +='<td>'+o.atr_fecha+'</td>';
          fila +='<td>$'+o.atr_total+'</td>';

          if(o.atr_ruta == "vacio"){
            if (permisoDescargar == "si") {
              fila += '<td> <a class="btn btn-default btn-sm" href="#"><i class="glyphicon glyphicon-download-alt"></i></a> </td>';
            }else{
              fila += '<td> <a class="btn btn-default btn-sm" href="#"><i class="glyphicon glyphicon-download-alt"></i></a> </td>';
            }
          }else{
<<<<<<< HEAD
            download = "http://localhost/GRUPOFIRMA/index.php/FiniquitosController/descargarFiniquito/"+o.cp_finiquito;
=======
            download = "http://10.10.11.240/GRUPOFIRMA/index.php/FiniquitosController/descargarFiniquito/"+o.cp_finiquito;
>>>>>>> 6d452e33e03ff9b08367071c515f6627be833f1a
            if (permisoDescargar == "si") {
              fila +='<td> <a class="btn btn-info btn-sm" href="'+download+'" download><i class="glyphicon glyphicon-download-alt"></i></a> </td>';
            }else{
              fila += '<td><a class="btn btn-default btn-sm" href="#"><i class="glyphicon glyphicon-download-alt"></i></a> </td>';
            }
          }

          fila +='</tr>';
        });
        fila +='</body> </table>';
        $("#modalDetalleFiniquitos").append(fila);

    });
  }
