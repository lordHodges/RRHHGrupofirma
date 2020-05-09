var base_url = 'http://10.10.11.240/RRHH-FIRMA/index.php/';


function cargarTablaPrestamoTrabajadores(permisoEditar,permisoExportar){
  var table = $('#tabla_prestamoTrabajadores').DataTable();
  table.destroy();

  var btnAcciones = "";

  if (permisoEditar == "si") {
    btnAcciones += '<button type="button" id="getDetallePrestamoTrabajador" class="btn btn-info btn-sm" data-toggle="modal" data-target="#modalEditarPrestamoTrabajador"><i class="glyphicon glyphicon-pencil"></i></button>';
  }

  if (permisoExportar == "si") {
    $('.dataTables-adelantos').DataTable({
        "autoWidth": false,
        "sInfo": false,
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
              url: "http://10.10.11.240/RRHH-FIRMA/index.php/getListadoPrestamosTrabajador",
              type: 'GET'
          },
          "columnDefs": [{
            "targets": 6,
            "data": null,
            "defaultContent": btnAcciones
          }
          ],dom: '<"html5buttons"B>lTfgitp',
            buttons: [{
                    extend: 'copy',
                    exportOptions: {
                        columns: [ 1,2,3,4,5,6 ]
                    }
                },
                {
                    extend: 'csv',
                    exportOptions: {
                        columns: [ 1,2,3,4,5,6 ]
                    }
                },
                {
                    extend: 'excel',
                    title: 'Lista de préstamos a trabajadores',
                    exportOptions: {
                        columns: [ 1,2,3,4,5,6 ]
                    }

                },
                {
                    extend: 'pdf',
                    title: 'Lista de préstamos a trabajadores',
                    exportOptions: {
                        columns: [ 1,2,3,4,5,6 ]
                    }

                },
                {
                    extend: 'print',
                    title: 'Firma de abogados',
                    exportOptions: {
                        columns: [ 1,2,3,4,5,6 ]
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
  }else{
    $('.dataTables-prestamoTrabajadores').DataTable({
        "autoWidth": false,
        "sInfo": false,
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
              url: "http://10.10.11.240/RRHH-FIRMA/index.php/getListadoPrestamosTrabajador",
              type: 'GET'
          },
          "columnDefs": [{
            "targets": 6,
            "data": null,
            "defaultContent": btnAcciones
          }
          ],dom: '<"html5buttons"B>lTfgitp',
            buttons: []
      });
  }


}
