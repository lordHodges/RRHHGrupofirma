var base_url = 'https://imlchile.cl/grupofirma/index.php/';

function cargarTablaSucursales(permisoExportar){
  var table = $('#tabla_sucursal').DataTable();
  table.destroy();

  if (permisoExportar == "si") {
    $('.dataTables-sucursales').DataTable({
        "autoWidth": false,
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
              url: "https://imlchile.cl/grupofirma/index.php/getListadoSucursales",
              type: 'GET'
          },
          "columnDefs": [{

          }
          ],dom: '<"html5buttons"B>lTfgitp',
            buttons: [{
                    extend: 'copy',
                    exportOptions: {
                        columns: [ 1 ]
                    }
                },
                {
                    extend: 'csv',
                    exportOptions: {
                        columns: [ 1 ]
                    }
                },
                {
                    extend: 'excel',
                    title: 'Lista de Sucursales',
                    exportOptions: {
                        columns: [ 1 ]
                    }

                },
                {
                    extend: 'pdf',
                    title: 'Lista de Sucursales',
                    exportOptions: {
                        columns: [ 1 ]
                    }

                },
                {
                    extend: 'print',
                    title: 'Grupo Firma',
                    exportOptions: {
                        columns: [ 1 ]
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
    $('.dataTables-sucursales').DataTable({
        "autoWidth": false,
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
              url: "https://imlchile.cl/grupofirma/index.php/getListadoSucursales",
              type: 'GET'
          },
          "columnDefs": [{

          }
          ],dom: '<"html5buttons"B>lTfgitp',
            buttons: []
      });
  }


}


function cargarTablaPrevision(permisoEditar,permisoExportar){
  var table = $('#tabla_prevision').DataTable();
  table.destroy();

  $('.dataTables-prevision').DataTable({
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
            url: "https://imlchile.cl/grupofirma/index.php/getListadoPrevisiones",
            type: 'GET'
        },
        "columnDefs": [{
          "targets": 2,
          "data": null,
          "defaultContent": '<button type="button" id="getDetallePrevision" class="btn btn-info btn-sm" data-toggle="modal" data-target="#modalEditarPrevision"><i class="glyphicon glyphicon-pencil"></i></button>'
        }
        ],dom: '<"html5buttons"B>lTfgitp',
          buttons: [{
                  extend: 'copy',
                  exportOptions: {
                      columns: [ 1 ]
                  }
              },
              {
                  extend: 'csv',
                  exportOptions: {
                      columns: [ 1 ]
                  }
              },
              {
                  extend: 'excel',
                  title: 'Lista de Previsiones',
                  exportOptions: {
                      columns: [ 1 ]
                  }

              },
              {
                  extend: 'pdf',
                  title: 'Lista de Previsiones',
                  exportOptions: {
                      columns: [ 1 ]
                  }

              },
              {
                  extend: 'print',
                  title: 'Grupo Firma',
                  exportOptions: {
                      columns: [ 1 ]
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

function cargarTablaNacionalidades(permisoEditar,permisoExportar){
  var table = $('#tabla_nacionalidad').DataTable();
  table.destroy();

  var btnAcciones = ""

  if (permisoEditar == "si") {
     btnAcciones = '<button type="button" id="getDetalleNacionalidad" class="btn btn-info btn-sm" data-toggle="modal" data-target="#modalEditarNacionalidad"><i class="glyphicon glyphicon-pencil"></i></button>';
  }

  if (permisoExportar == "si") {
    $('.dataTables-sucursales').DataTable({
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
              url: "https://imlchile.cl/grupofirma/index.php/getListadoNacionalidades",
              type: 'GET'
          },
          "columnDefs": [{
            "targets": 2,
            "data": null,
            "defaultContent": btnAcciones
          }
          ],dom: '<"html5buttons"B>lTfgitp',
            buttons: [{
                    extend: 'copy',
                    exportOptions: {
                        columns: [ 1 ]
                    }
                },
                {
                    extend: 'csv',
                    exportOptions: {
                        columns: [ 1 ]
                    }
                },
                {
                    extend: 'excel',
                    title: 'Listado de nacionalidades',
                    exportOptions: {
                        columns: [ 1 ]
                    }
                },
                {
                    extend: 'pdf',
                    title: 'Listado de nacionalidades',
                    exportOptions: {
                        columns: [ 1 ]
                    }

                },
                {
                    extend: 'print',
                    title: 'Grupo Firma',
                    exportOptions: {
                        columns: [ 1 ]
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
    $('.dataTables-sucursales').DataTable({
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
              url: "https://imlchile.cl/grupofirma/index.php/getListadoNacionalidades",
              type: 'GET'
          },
          "columnDefs": [{
            "targets": 2,
            "data": null,
            "defaultContent": btnAcciones
          }
          ],dom: '<"html5buttons"B>lTfgitp',
            buttons: []
      });
  }
}

function cargarTablaEstadosContrato(permisoEditar,permisoExportar){
  var table = $('#tabla_estadoContrato').DataTable();
  table.destroy();

  var btnAcciones = ""

  if (permisoEditar == "si") {
     btnAcciones = '<button type="button" id="getDetalleEstadosContrato" class="btn btn-info btn-sm" data-toggle="modal" data-target="#modalEditarEstadosContrato"><i class="glyphicon glyphicon-pencil"></i></button>';
  }

  if (permisoExportar == "si") {
    $('.dataTables-estadoContrato').DataTable({
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
              url: "https://imlchile.cl/grupofirma/index.php/getEstadoContrato",
              type: 'GET'
          },
          "columnDefs": [{
            "targets": 2,
            "data": null,
            "defaultContent": btnAcciones
          }
          ],dom: '<"html5buttons"B>lTfgitp',
            buttons: [{
                    extend: 'copy',
                    exportOptions: {
                        columns: [ 1 ]
                    }
                },
                {
                    extend: 'csv',
                    exportOptions: {
                        columns: [ 1 ]
                    }
                },
                {
                    extend: 'excel',
                    title: 'Listado de estados de contrato',
                    exportOptions: {
                        columns: [ 1 ]
                    }

                },
                {
                    extend: 'pdf',
                    title: 'Listado de estados de contrato',
                    exportOptions: {
                        columns: [ 1 ]
                    }

                },
                {
                    extend: 'print',
                    title: 'Grupo Firma',
                    exportOptions: {
                        columns: [ 1 ]
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
    $('.dataTables-estadoContrato').DataTable({
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
              url: "https://imlchile.cl/grupofirma/index.php/getEstadoContrato",
              type: 'GET'
          },
          "columnDefs": [{
            "targets": 2,
            "data": null,
            "defaultContent": btnAcciones
          }
          ],dom: '<"html5buttons"B>lTfgitp',
            buttons: []
      });
  }
}

function cargarTablaEstadosCiviles(permisoExportar){
  var table = $('#tabla_estadoCivil').DataTable();
  table.destroy();

  if (permisoExportar == "si") {
    $('.dataTables-estadoCivil').DataTable({
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
              url: "https://imlchile.cl/grupofirma/index.php/getListadoEstadosCiviles",
              type: 'GET'
          },
          "columnDefs": [{

          }
          ],dom: '<"html5buttons"B>lTfgitp',
            buttons: [{
                    extend: 'copy',
                    exportOptions: {
                        columns: [ 1 ]
                    }
                },
                {
                    extend: 'csv',
                    exportOptions: {
                        columns: [ 1 ]
                    }
                },
                {
                    extend: 'excel',
                    title: 'Lista de estados civiles',
                    exportOptions: {
                        columns: [ 1 ]
                    }

                },
                {
                    extend: 'pdf',
                    title: 'Lista de estados civiles',
                    exportOptions: {
                        columns: [ 1 ]
                    }

                },
                {
                    extend: 'print',
                    title: 'Grupo Firma',
                    exportOptions: {
                        columns: [ 1 ]
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
    $('.dataTables-estadoCivil').DataTable({
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
              url: "https://imlchile.cl/grupofirma/index.php/getListadoEstadosCiviles",
              type: 'GET'
          },
          "columnDefs": [{

          }
          ],dom: '<"html5buttons"B>lTfgitp',
            buttons: []
      });
  }

}

function cargarTablaCiudades(exportar){
  var table = $('#tabla_ciudad').DataTable();
  table.destroy();

  if (exportar == "si") {
    $('.dataTables-ciudades').DataTable({
        "autoWidth": false,
        "info":false,
        "sInfo": false,
        "sInfoEmpty":false,
        "sInfoFiltered":false,
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
              url: "https://imlchile.cl/grupofirma/index.php/getListadoCiudades",
              type: 'GET'
          },
          "columnDefs": [{

          }
          ] ,dom: '<"html5buttons"B>lTfgitp',
            buttons: [{
                    extend: 'copy'
                },
                {
                    extend: 'csv'
                },
                {
                    extend: 'excel',
                    title: 'Listado de ciudades',

                },
                {
                    extend: 'pdf',
                    title: 'Listado de ciudades'

                },
                {
                    extend: 'print',
                    title: 'Grupo Firma',
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
      $('.dataTables-ciudades').DataTable({
          "autoWidth": false,
          "info":false,
          "sInfo": false,
          "sInfoEmpty":false,
          "sInfoFiltered":false,
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
                url: "https://imlchile.cl/grupofirma/index.php/getListadoCiudades",
                type: 'GET'
            },
            "columnDefs": [{

            }
            ] ,dom: '<"html5buttons"B>lTfgitp',
              buttons: [
              ]
        });
    }
}

function cargarTablaEmpresa(permisoEditar, exportar){
  var table = $('#tabla_empresa').DataTable();
  table.destroy();
  var btnAcciones = ""

  if (permisoEditar == "si") {
     btnAcciones = '<button type="button" id="getDetalleEmpresa" class="btn btn-info btn-sm" data-toggle="modal" data-target="#modalEditarEmpresa"><i class="glyphicon glyphicon-pencil"></i></button>';
  }

  if (exportar == "si") {
    $('.dataTables-prevision').DataTable({
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
              url: "https://imlchile.cl/grupofirma/index.php/getListadoEmpresa",
              type: 'GET'
          },
          "columnDefs": [{
            "targets": 7,
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
                    title: 'Lista de Empresas',
                    exportOptions: {
                        columns: [ 1,2,3,4,5,6 ]
                    }

                },
                {
                    extend: 'pdf',
                    title: 'Lista de Empresas',
                    exportOptions: {
                        columns: [ 1,2,3,4,5,6 ]
                    }

                },
                {
                    extend: 'print',
                    title: 'Grupo Firma',
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
    $('.dataTables-prevision').DataTable({
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
              url: "https://imlchile.cl/grupofirma/index.php/getListadoEmpresa",
              type: 'GET'
          },
          "columnDefs": [{
            "targets": 7,
            "data": null,
            "defaultContent": btnAcciones
          }]

      });
  }
}




function cargarTablaAFP(permisoEditar, permisoExportar){
  var table = $('#tabla_AFP').DataTable();
  table.destroy();
  var btnAcciones = ""

  if (permisoEditar == "si") {
     btnAcciones = '<button type="button" id="btnVerAFP" class="btn btn-info btn-sm" data-toggle="modal" data-target="#modaleditarAFP"><i class="glyphicon glyphicon-pencil"></i></button>';
  }

  if (permisoExportar == "si") {
    $('.dataTables-AFP').DataTable({
        "autoWidth": false,
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
              url: "https://imlchile.cl/grupofirma/index.php/getListadoAFP",
              type: 'GET'
          },
          "columnDefs": [{
            "targets": 2,
            "data": null,
            "defaultContent": btnAcciones
          }
        ],dom: '<"html5buttons"B>lTfgitp',
            buttons: [{
                    extend: 'copy'
                },
                {
                    extend: 'csv'
                },
                {
                    extend: 'excel',
                    title: 'Listado de AFP',

                },
                {
                    extend: 'pdf',
                    title: 'Listado de AFP'

                },
                {
                    extend: 'print',
                    title: 'Grupo Firma',
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
    $('.dataTables-AFP').DataTable({
        "autoWidth": false,
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
              url: "https://imlchile.cl/grupofirma/index.php/getListadoAFP",
              type: 'GET'
          },
          "columnDefs": [{
            "targets": 2,
            "data": null,
            "defaultContent": btnAcciones
          }
        ],dom: '<"html5buttons"B>lTfgitp',
            buttons: []
      });
  }
}


/*************************** RELLENO DE SELECTS ****************************/


function getSelectCiudad(){
    var url = base_url+'getCiudades';
    $("#getSelectCiudad").empty();
    var fila = "<option disabled selected>Seleccione una opción</option>";
    $.getJSON(url, function (result) {
        $.each(result, function (i, o) {
            fila += "<option value='" + o.cp_ciudad + "'>" + o.atr_nombre + "</option>";
        });
        $("#getSelectCiudad").append(fila);
    });
}

// USADO PARA LA GESTION DE CONTRATOS
function getSelectCiudad2(){
    var url = base_url+'getCiudades';
    $("#getSelectCiudad2").empty();
    var fila = "<option disabled selected>Seleccione una opción</option>";
    $.getJSON(url, function (result) {
        $.each(result, function (i, o) {
            fila += "<option value='" + o.cp_ciudad + "'>" + o.atr_nombre + "</option>";
        });
        $("#getSelectCiudad2").append(fila);
    });
}

// USADO PARA LA GESTION DE ANEXOS - HORAS EXTRAS
function getSelectCiudad3(){
    var url = base_url+'getCiudades';
    $("#getSelectCiudad3").empty();
    var fila = "<option disabled selected>Seleccione una opción</option>";
    $.getJSON(url, function (result) {
        $.each(result, function (i, o) {
            fila += "<option value='" + o.cp_ciudad + "'>" + o.atr_nombre + "</option>";
        });
        $("#getSelectCiudad3").append(fila);
    });
}

function getSelectCargos(){

    var url = base_url+'getCargos';
    $("#getSelectCargo").empty();
    var fila = "<option disabled selected>Seleccione una opción</option>";
    $.getJSON(url, function (result) {
        $.each(result, function (i, o) {
            fila += "<option value='" + o.cp_cargo + "'>" + o.atr_nombre + "</option>";
        });
        $("#getSelectCargo").append(fila);
    });
}

function getSucursales(){

    var url = base_url+'getSucursales';
    $("#getSelectSucursal").empty();
    var fila = "<option disabled selected>Seleccione una opción</option>";
    $.getJSON(url, function (result) {
        $.each(result, function (i, o) {
            fila += "<option value='" + o.cp_sucursal + "'>" + o.atr_nombre + "</option>";
        });
        $("#getSelectSucursal").append(fila);
    });
}

function getEmpresas(){

    var url = base_url+'getEmpresas';
    $("#getSelectEmpresa").empty();
    var fila = "<option disabled selected>Seleccione una opción</option>";
    $.getJSON(url, function (result) {
        $.each(result, function (i, o) {
            fila += "<option value='" + o.cp_empresa + "'>" + o.atr_nombre + "</option>";
        });
        $("#getSelectEmpresa").append(fila);
    });
}

function getAFP(){

    var url = base_url+'getAFP';
    $("#getSelectAFP").empty();
    var fila = "<option disabled selected>Seleccione una opción</option>";
    $.getJSON(url, function (result) {
        $.each(result, function (i, o) {
            fila += "<option value='" + o.cp_afp + "'>" + o.atr_nombre + "</option>";
        });
        $("#getSelectAFP").append(fila);
    });
}

function getPrevisiones(){

    var url = base_url+'getPrevisiones';
    $("#getSelectPrevision").empty();
    var fila = "<option disabled selected>Seleccione una opción</option>";
    $.getJSON(url, function (result) {
        $.each(result, function (i, o) {
            fila += "<option value='" + o.cp_prevision + "'>" + o.atr_nombre + "</option>";
        });
        $("#getSelectPrevision").append(fila);
    });
}

function getDetallePrevision(idPrevision){
    var id = idPrevision;
    $.ajax({
        url: 'getDetallePrevision',
        type: 'POST',
        dataType: 'json',
        data: {"idPrevision": id}
    }).then(function (msg) {
        $("#contenedorDetallePrevision").empty();

        var fila = "";
        $.each(msg.msg, function (i, o) {
          fila +='<h5 class="modal-title mx-auto">PREVISIÓN</h5><button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>';
          fila +='<div class="col-md-12"><br><label for="nombre">NOMBRE:&nbsp; </label><label id="idPrevision" style="color:#2A3F54;">'+o.cp_prevision+'</label><input type="text" style="color:#848484" class="form-control custom-input-sm" id="nombreNuevo" value="'+o.atr_nombre+'"></div>';
          $("#contenedorDetallePrevision").append(fila);
        });

    });
}

function updatePrevision(){
    var idPrevision = $("#idPrevision").text();
    var nombre = $("#nombreNuevo").val();


    $.ajax({
        url: 'updatePrevision',
        type: 'POST',
        dataType: 'json',
        data: {"idPrevision": idPrevision, "nombre":nombre}
    }).then(function (msg) {
        if(msg.msg == "ok"){
          toastr.success('Información actualizada');
          $('#modalEditarPrevision').modal('hide');
        }else{
          toastr.error('No se ha actualizado la información');
          $('#modalEditarPrevision').modal('hide');
          var permisoExportar = $("#permisoExportar").text();
          var permisoEditar = $("#permisoEditar").text();
          cargarTablaPrevision(permisoEditar,permisoExportar);
        }
    });
}

function getEstadosContrato(){

    var url = base_url+'getEstadosContrato';
    $("#getSelectEstadoContrato").empty();
    var fila = "<option disabled selected>Seleccione una opción</option>";
    $.getJSON(url, function (result) {
        $.each(result, function (i, o) {
            fila += "<option value='" + o.cp_estado + "'>" + o.atr_nombre + "</option>";
        });
        $("#getSelectEstadoContrato").append(fila);
    });
}

function getDetalleEstadosContrato(idEstadoContrato){
    var id = idEstadoContrato;
    $.ajax({
        url: 'getDetalleEstadosContrato',
        type: 'POST',
        dataType: 'json',
        data: {"idEstadoContrato": id}
    }).then(function (msg) {
        $("#contenedorDetalleEstadoContrato").empty();

        var fila = "";
        $.each(msg.msg, function (i, o) {
          fila +='<h5 class="modal-title mx-auto">ESTADO CONTRATO</h5><button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>';
          fila +='<div class="col-md-12"><br><label for="nombre">NOMBRE:&nbsp; </label><label id="idEstadoContrato" style="color:#2A3F54;">'+o.cp_estado+'</label><input type="text" style="color:#848484" class="form-control custom-input-sm" id="nombreNuevo" value="'+o.atr_nombre+'"></div>';
          $("#contenedorDetalleEstadoContrato").append(fila);
        });

    });
}

function updateEstadoContrato(){
    var idEstadoContrato = $("#idEstadoContrato").text();
    var nombre = $("#nombreNuevo").val();

    $.ajax({
        url: 'updateEstadoContrato',
        type: 'POST',
        dataType: 'json',
        data: {"idEstadoContrato": idEstadoContrato, "nombre":nombre}
    }).then(function (msg) {
        if(msg.msg == "ok"){
          toastr.success('Información actualizada');
          $('#modalEditarEstadosContrato').modal('hide');
          var permisoEditar = $("#permisoEditar").text();
          var permisoExportar = $("#permisoExportar").text();
          cargarTablaEstadosContrato(permisoEditar,permisoExportar);
        }else{
          toastr.error('No se ha actualizado la información');
          $('#modalEditarEstadosContrato').modal('hide');
        }
    });
}

function getEstadosCiviles(){

    var url = base_url+'getEstadosCiviles';
    $("#getSelectCivil").empty();
    var fila = "<option disabled selected>Seleccione una opción</option>";
    $.getJSON(url, function (result) {
        $.each(result, function (i, o) {
            fila += "<option value='" + o.cp_estadoCivil+ "'>" + o.atr_nombre + "</option>";
        });
        $("#getSelectCivil").append(fila);
    });
}

function getNacionalidades(){

    var url = base_url+'getNacionalidades';
    $("#getSelectNacionalidad").empty();
    var fila = "<option disabled selected>Seleccione una opción</option>";
    $.getJSON(url, function (result) {
        $.each(result, function (i, o) {
            fila += "<option value='" + o.cp_nacionalidad+ "'>" + o.atr_nombre + "</option>";
        });
        $("#getSelectNacionalidad").append(fila);
    });
}

function getDetalleNacionalidad(idNacionalidad){
    var id = idNacionalidad;
    $.ajax({
        url: 'getDetalleNacionalidad',
        type: 'POST',
        dataType: 'json',
        data: {"idNacionalidad": id}
    }).then(function (msg) {
        $("#contenedorDetalleNacionalidad").empty();

        var fila = "";
        $.each(msg.msg, function (i, o) {
          fila +='<h5 class="modal-title mx-auto">NACIONALIDAD</h5><button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>';
          fila +='<div class="col-md-12"><br><label for="nombre">NOMBRE:&nbsp; </label><label id="idNacionalidad" style="color:#2A3F54;">'+o.cp_nacionalidad+'</label><input type="text" style="color:#848484" class="form-control custom-input-sm" id="nombreNuevo" value="'+o.atr_nombre+'"></div>';
          $("#contenedorDetalleNacionalidad").append(fila);
        });

    });
}

function updateNacionalidad(){
    var idNacionalidad = $("#idNacionalidad").text();
    var nombre = $("#nombreNuevo").val();


    $.ajax({
        url: 'updateNacionalidad',
        type: 'POST',
        dataType: 'json',
        data: {"idNacionalidad": idNacionalidad, "nombre":nombre}
    }).then(function (msg) {
        if(msg.msg == "ok"){
          toastr.success('Información actualizada');
          $('#modalEditarNacionalidad').modal('hide');
          var permisoExportar = $("#permisoExportar").text();
          var permisoEditar = $("#permisoEditar").text();
          cargarTablaNacionalidades(permisoEditar,permisoExportar);
        }else{
          toastr.error('No se ha actualizado la información');
          $('#modalEditarNacionalidad').modal('hide');
        }
    });
}




/*************************** MANTENEDORES ****************************/


function agregarCiudad() {
    var nombre = $("#nombre").val();
    if (nombre == "" ) {
        toastr.error("Rellene todos los campos");
    } else {
        $.ajax({
            url: 'addCiudad',
            type: 'POST',
            dataType: 'json',
            data: { "nombre":nombre }
        }).then(function (msg) {

            if (msg.msg == "ok") {
               toastr.success('Ciudad ingresada')
               document.getElementById("nombre").value = "";
               $('#myModal').modal('hide');
               var permisoExportar = $("#permisoExportar").text();
               cargarTablaCiudades(permisoExportar);
            } else {
                toastr.error("Error en el ingreso.");
            }
        });
    }
}

function agregarSucursal() {
    var nombre = $("#nombre").val();
    if (nombre == "" ) {
        toastr.error("Rellene todos los campos");
    } else {
        $.ajax({
            url: 'addSucursal',
            type: 'POST',
            dataType: 'json',
            data: { "nombre":nombre }
        }).then(function (msg) {
            if (msg.msg == "ok") {
               toastr.success('Sucursal ingresada')
               document.getElementById("nombre").value = "";
               $('#myModal').modal('hide');
               var permisoExportar = $("#permisoExportar").text();
               cargarTablaSucursales(permisoExportar);
            } else {
                toastr.error("Error en el ingreso.");
            }
        });
    }
}



function agregarEstadoCivil() {
    var nombre = $("#nombre").val();
    if (nombre == "" ) {
        toastr.error("Rellene todos los campos");
    } else {
        $.ajax({
            url: 'addEstadoCivil',
            type: 'POST',
            dataType: 'json',
            data: { "nombre":nombre }
        }).then(function (msg) {
            if (msg.msg == "ok") {
               toastr.success('Estado Civil ingresado')
               document.getElementById("nombre").value = "";
               $('#myModal').modal('hide');
               var permisoExportar = $("#permisoExportar").text();
               cargarTablaEstadosCiviles(permisoExportar);
            } else {
                toastr.error("Error en el ingreso.");
            }
        });
    }
}


function agregarAFP() {
    var nombre = $("#nombre").val();
    if (nombre == "" ) {
        toastr.error("Rellene todos los campos");
    } else {
        $.ajax({
            url: 'addAFP',
            type: 'POST',
            dataType: 'json',
            data: { "nombre":nombre }
        }).then(function (msg) {
            if (msg.msg == "ok") {
               toastr.success('AFP ingresada')
               document.getElementById("nombre").value = "";
               $('#modalCrearAFP').modal('hide');
               var permisoExportar = $("#permisoExportar").text();
               var permisoEditar = $("#permisoEditar").text();
               cargarTablaAFP(permisoEditar,permisoExportar);

            } else {
                toastr.error("Error en el ingreso.");
            }
        });
    }
}

function getDetalleAFP(id){
  var afp = id;
  $.ajax({
      url: 'getDetalleAFP',
      type: 'POST',
      dataType: 'json',
      data: {"afp": afp}
  }).then(function (msg) {
      $("#modalDetalleAFP").empty();
      var fila = "";
      $.each(msg.msg, function (i, o) {
        fila += '<label value="'+o.cp_afp+'"></label>'
        fila += '<div class="col-md-12"><br><label for="nombre">NOMBRE: &nbsp;&nbsp;</label><label id="idAFP" style="color:#2a3f54">'+o.cp_afp+'</label> <input type="text" placeholder="Ingrese nuevo nombre" style="color:#848484" value="'+o.atr_nombre+'" class="form-control custom-input-sm" id="nombreNuevo"></div>';
        $("#modalDetalleAFP").append(fila);
      });
  });
}


function editarAFP(id) {
    var idAFP = $("#idAFP").text();
    var nombreNuevo = $("#nombreNuevo").val();

    if (nombreNuevo == "" ) {
        toastr.error("Rellene todos los campos");
    } else {
        $.ajax({
            url: 'updateAFP',
            type: 'POST',
            dataType: 'json',
            data: { "nombreNuevo":nombreNuevo,
                    "idAFP":idAFP}
        }).then(function (msg) {
            if (msg.msg == "ok") {
               toastr.success('AFP modificada');
               $('#modaleditarAFP').modal('hide');
               document.getElementById("nombreNuevo").value = "";
               document.getElementById("nombreAntiguo").value = "";
               var permisoExportar = $("#permisoExportar").text();
               var permisoEditar = $("#permisoEditar").text();
               cargarTablaAFP(permisoEditar,permisoExportar);
            } else {
                toastr.error("Error en el ingreso.");
                $('#modaleditarAFP').modal('hide');
            }
        });
    }

}



function agregarNacionalidad() {
    var nombre = $("#nombre").val();
    if (nombre == "" ) {
        toastr.error("Rellene todos los campos");
    } else {
        $.ajax({
            url: 'addNacionalidad',
            type: 'POST',
            dataType: 'json',
            data: { "nombre":nombre }
        }).then(function (msg) {
            if (msg.msg == "ok") {
               toastr.success('Nacionalidad ingresada');
               document.getElementById("nombre").value = "";
               $('#myModal').modal('hide');
               var permisoExportar = $("#permisoExportar").text();
               var permisoEditar = $("#permisoEditar").text();
               cargarTablaNacionalidades(permisoEditar,permisoExportar);
            } else {
                toastr.error("Error en el ingreso.");
            }
        });
    }
}

function agregarEstadoContrato() {
    var nombre = $("#nombre").val();
    if (nombre == "" ) {
        toastr.error("Rellene todos los campos");
    } else {
        $.ajax({
            url: 'addEstadoContrato',
            type: 'POST',
            dataType: 'json',
            data: { "nombre":nombre }
        }).then(function (msg) {
            if (msg.msg == "ok") {
               toastr.success('Estado ingresado')
               document.getElementById("nombre").value = "";
               $('#myModal').modal('hide');
               var permisoEditar = $("#permisoEditar").text();
               var permisoExportar = $("#permisoExportar").text();
               cargarTablaEstadosContrato(permisoEditar,permisoExportar);
            } else {
                toastr.error("Error en el ingreso.");
            }
        });
    }
}

function agregarPrevision() {
    var nombre = $("#nombre").val();

    if (nombre == "" || nombre == null ) {
        toastr.error("Rellene todos los campos");
    } else {

        $.ajax({
            url: 'addPrevision',
            type: 'POST',
            dataType: 'json',
            data: { "nombre":nombre }
        }).then(function (msg) {
            if (msg.msg == "ok") {
               toastr.success('Previsión ingresada')
               document.getElementById("nombre").value = "";
               $('#myModal').modal('hide');
               var permisoExportar = $("#permisoExportar").text();
               var permisoEditar = $("#permisoEditar").text();
               cargarTablaPrevision(permisoEditar,permisoExportar);
            } else {
                toastr.error("Error en el ingreso.");
            }
        });
    }
}



function agregarEmpresa() {
    var nombre = $("#nombre").val();
    var rut = $("#RUT").val();
    var domicilio = $("#ubicacion").val();
    var representante = $("#nombreRepre").val();
    var cedula_representante = $("#cedulaRepre").val();
    var ciudad = $("#getSelectCiudad").val();

    var tipo = $("#getSelectTipo").val();
    if( tipo == "persona" ){
      nombre = representante;
      rut = cedula_representante;
      representante = "";
      cedula_representante = "";
    }

    if (tipo == "empresa"){
      if( nombre == "" || rut == "" || domicilio == "" || representante == "" || cedula_representante == "" || ciudad == "" ) {
          toastr.error("Rellene todos los campos");
      }
    }else {

    }

    $.ajax({
        url: 'addEmpresa',
        type: 'POST',
        dataType: 'json',
        data: { "nombre":nombre, "rut":rut, "domicilio":domicilio, "representante":representante, "cedula_representante":cedula_representante, "ciudad":ciudad },
    }).then(function (msg) {
        if (msg.msg == "ok") {
           toastr.success('Empresa ingresada');
           document.getElementById("nombre").value = "";
           document.getElementById("RUT").value = "";
           document.getElementById("ubicacion").value = "";
           document.getElementById("nombreRepre").value = "";
           document.getElementById("cedulaRepre").value = "";
           document.getElementById("getSelectCiudad").value = "";
           $('#myModal').modal('hide');
           var permisoExportar = $("#permisoExportar").text();
           var permisoEditar = $("#permisoEditar").text();
           cargarTablaEmpresa(permisoEditar,permisoExportar);
        } else {
            toastr.error("Error en el ingreso.");
        }
    });
}

function getDetalleEmpresa(idEmpresa){
  var id = idEmpresa;
  $.ajax({
      url: 'getDetalleEmpresa',
      type: 'POST',
      dataType: 'json',
      data: {"idEmpresa": id}
  }).then(function (msg) {
      $("#contenedorDetalleEmpresa").empty();
      var fila = "";
      $.each(msg.msg, function (i, o) {
          fila +='<h5 class="modal-title mx-auto">EMPRESA</h5><button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>';
          fila +='<div class="col-md-12"><br><label for="nombre">NOMBRE:&nbsp; </label><label id="idEmpresa" style="color:#2A3F54;">'+o.cp_empresa+'</label><input type="text" class="form-control custom-input-sm" value="'+o.atr_nombre+'" style="color:#848484;" id="nombreNuevo" oninput="mayus(this);"></div>';
          fila +='<div class="col-md-12"><br><label for="rut">ROL UNICO TRIBUTARIO:&nbsp;</label><input type="text" class="form-control custom-input-sm" id="rutNuevo" onkeyup="this.value=caracteresRUT(this.value)" value="'+o.atr_run+'" style="color:#848484;" oninput="checkRutOficial(this)"></div>';
          fila +='<div class="col-md-12"><br><label for="ubicacion">UBICACIÓN:&nbsp;</label><input type="text" class="form-control custom-input-sm" id="ubicacionNuevo" value="'+o.atr_domicilio+'" style="color:#848484;" oninput="mayus(this);"></div>';
          fila +='<div class="col-md-12"><br><label for="nombreRepre">NOMBRE DE REPRESENTANTE:&nbsp;</label><input type="text" class="form-control custom-input-sm" id="nombreRepreNuevo" oninput="mayus(this);" value="'+o.atr_representante+'" style="color:#848484;" onkeyup="this.value=soloLetras(this.value)" ></div>';
          fila +='<div class="col-md-12"><br><label for="cedulaRepre">CÉLUDA DE REPRESENTANTE:&nbsp;</label><input type="text" class="form-control custom-input-sm" value="'+o.atr_cedula_representante+'" style="color:#848484;" id="cedulaRepreNuevo" onkeyup="this.value=caracteresRUT(this.value)" oninput="checkRutOficial(this)"></div>';

          fila +='<div class="col-md-12"><br> <label for="getSelectCiudad">CIUDAD:&nbsp;</label><label id="ciudadActual">'+o.nombreCiudad+'</label><br> <select class="custom-select" id="getSelectCiudad2"> ';

          var url = base_url+'getCiudades';
          fila +='<option disabled selected>Seleccione una opción</option>';
          $.getJSON(url, function (result) {
              $.each(result, function (i, o) {
                  fila += '<option value="'+ o.cp_ciudad + '">' + o.atr_nombre + '</option>';
              });
              fila +='</select></div>'; //cerrando el select
              $("#contenedorDetalleEmpresa").append(fila);
          });



      });
  });
}

function editarEmpresa() {


    var idEmpresa = $("#idEmpresa").text();
    var nombre = $("#nombreNuevo").val();
    var rut = $("#rutNuevo").val();
    var domicilio = $("#ubicacionNuevo").val();
    var representante = $("#nombreRepreNuevo").val();
    var cedula_representante = $("#cedulaRepreNuevo").val();
    var ciudad = $("#getSelectCiudad2").val();
    var esNuevo = true;

    if( ciudad == "" || ciudad == null){
      ciudad = $("#ciudadActual").text();
      esNuevo == false;
    }

      $.ajax({
          url: 'updateEmpresa',
          type: 'POST',
          dataType: 'json',
          data: { "esNuevo":esNuevo, "idEmpresa":idEmpresa, "nombre":nombre, "rut":rut, "domicilio":domicilio, "representante":representante, "cedula_representante":cedula_representante, "ciudad":ciudad },
      }).then(function (msg) {
        if(msg.msg == "ok"){
          toastr.success('Información actualizada')
          $('#modalEditarEmpresa').modal('hide');
          var permisoExportar = $("#permisoExportar").text();
          var permisoEditar = $("#permisoEditar").text();
          cargarTablaEmpresa(permisoEditar,permisoExportar);
        }else{
          toastr.error('Ups, ha ocurrido un problema');
          $('#modalEditarEmpresa').modal('hide');
        }
      });




}
