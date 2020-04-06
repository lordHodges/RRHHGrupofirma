var base_url = 'http://10.10.11.240/RRHH-FIRMA/index.php/';

/*************************** TRANSFERENCIAS ****************************/

function cargarTabla(){
  var table = $('#tabla_trabajador').DataTable();
  table.destroy();

  $('.dataTables-trabajadores').DataTable({
    "autoWidth": false,
        language: {
            "sProcessing": "Procesando...",
            "sLengthMenu": "Registros _MENU_ ",
            "sZeroRecords": "No se encontraron resultados",
            "sEmptyTable": "Ningún dato disponible en esta tabla",
            "sInfo": "Mostrando registros del _START_ al _END_ de un total de _TOTAL_ registros",
            "sInfoEmpty": "Mostrando registros del 0 al 0 de un total de 0 registros",
            "sInfoFiltered": "(filtrado de un total de _MAX_ registros)",
            "sInfoPostFix": "",
            "sSearch": "Buscar:",
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
            url: "http://10.10.11.240/RRHH-FIRMA/index.php/getListadoTrabajadoresContrato",
            type: 'GET'
        },
        "columnDefs": [{
                "targets": 5,
                "data": null,
                "defaultContent": '<button style="display:inline" type="button" id="btnVerListaTransferencias" class="btn btn-info" data-toggle="modal" data-target="#modalVerListaTransferencias"><i class="glyphicon glyphicon-folder-open"></i></button>   <button style="display:inline" type="button" id="btnModalCargarArchivo" class="btn btn-info" data-toggle="modal" data-target="#modalCargarArchivo"><i class="glyphicon glyphicon-open"></i></button>'
            }

        ],dom: '<"html5buttons"B>lTfgitp',
        buttons: [
        ]
    });
}

function getTransferenciasTrabajador(idTrabajador){
  $.ajax({
      url: 'getTransferenciasTrabajador',
      type: 'POST',
      dataType: 'json',
      data: {"idTrabajador": idTrabajador}
  }).then(function (response) {
      var fila = "";
      var download = "";

      $("#modalDetalleTransferencias").empty();

      fila +='<h5 class="modal-title mx-auto">LISTADO DE TRANSFERENCIAS</h5><button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>';
      fila +='<table class="table table-bordered tableInModal" style="margin-top:20px;"> <thead> <tr> <td class="text-center">Transferencia</td> <td class="text-center">Fecha</td> <td class="text-center">Monto</td> <td class="text-center">Descargar</td> </tr> </thead> <tbody>';
      $.each(response.msg, function (i, o) {

        fila +='<tr>';
        fila +='<td>'+o.cp_transferencia+'</td>';
        fila +='<td>'+o.atr_fecha+'</td>';
        fila +='<td>'+o.atr_monto+'</td>';
        if(o.atr_ruta == "vacio"){
          fila +='<td> <a class="btn btn-ded" class="isDisabled" href="#"><i class="glyphicon glyphicon-download-alt"></i></a> </td>';
        }else{
          download = "http://10.10.11.240/RRHH-FIRMA/index.php/TransferenciasController/descargarComprobante/"+o.cp_transferencia;
          fila +='<td> <a class="btn btn-info" href="'+download+'" download><i class="glyphicon glyphicon-download-alt"></i></a> </td>';
        }
        fila +='</tr>';
      });
      fila +='</body> </table>';
      $("#modalDetalleTransferencias").append(fila);

  });
}
