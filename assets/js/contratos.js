var base_url = 'http://localhost/RRHH-FIRMA/';

/*************************** CONTRATO ****************************/

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
            url: "http://localhost/RRHH-FIRMA/getListadoTrabajadoresContrato",
            type: 'GET'
        },
        "columnDefs": [{
                "targets": 5,
                "data": null,
                "defaultContent": '<button style="display:inline" type="button" id="btnVerListaContratos" class="btn btn-info" data-toggle="modal" data-target="#modalVerListaContratos"><i class="glyphicon glyphicon-folder-open"></i></button>   <button style="display:inline" type="button" id="btnModalCargarArchivo" class="btn btn-info" data-toggle="modal" data-target="#modalCargarArchivo"><i class="glyphicon glyphicon-open"></i></button>'
            }

        ],dom: '<"html5buttons"B>lTfgitp',
          buttons: [{
                  extend: 'copy',
                  exportOptions: {
                      columns: [ 1,2,3,4,5,6,7 ]
                  },
              },
              {
                  extend: 'csv',
                  exportOptions: {
                      columns: [ 1,2,3,4,5,6,7 ]
                  },
              },
              {
                  extend: 'excel',
                  title: 'Lista de Trabajadores',
                  exportOptions: {
                      columns: [ 1,2,3,4,5,6,7 ]
                  },
              },
              {
                  extend: 'pdf',
                  title: 'Lista de Trabajadores',
                  exportOptions: {
                      columns: [ 1,2,3,4,5,6,7 ]
                  },
                  customize:function(doc) {
                      doc.styles.title = {
                          fontSize: '25',
                          alignment: 'center'
                      }
                      doc.styles['td:nth-child(2)'] = {
                          'padding': '100px'
                      }
                  }
              },
              {
                  extend: 'print',
                  title: 'Firma de abogados',
                  exportOptions: {
                      columns: [ 1,2,3,4,5,6,7 ]
                  },
                  customize: function(win) {
                      $(win.document.body).addClass('white-bg');
                      $(win.document.body).css('font-size', '10px');
                      $(win.document.body).find('table')
                          .addClass('compact')
                          .css('font-size', 'inherit');
                  }
              }
          ]
    });
}

function getContratosTrabajador(idTrabajador){
  $.ajax({
      url: 'getContratosTrabajador',
      type: 'POST',
      dataType: 'json',
      data: {"idTrabajador": idTrabajador}
  }).then(function (response) {
      var fila = "";

      $("#modalDetalleTrabajador").empty();

      fila +='<h5 class="modal-title mx-auto">LISTADO DE CONTRATOS</h5><button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>';
      fila +='<table class="table table-bordered tableInModal" style="margin-top:20px;"> <thead> <tr> <td class="text-center">Fecha de inicio</td> <td class="text-center">Fecha de termino</td> <td class="text-center">Cargo</td> <td class="text-center">Descargar</td> </tr> </thead> <tbody>';
      $.each(response.msg, function (i, o) {
        fila +='<tr>';
        fila +='<td>'+o.atr_fechaInicio+'</td>';
        fila +='<td>'+o.atr_fechaTermino+'</td>';
        fila +='<td>'+o.atr_nombre+'</td>';
        fila +='<td> <button style="display:inline" type="button" id="btnDescargarContrato" class="btn btn-info"><i class="glyphicon glyphicon-download-alt"></i></button> </td>';
        fila +='</tr>';
      });
      fila +='</body> </table>';
      $("#modalDetalleTrabajador").append(fila);

  });
}
