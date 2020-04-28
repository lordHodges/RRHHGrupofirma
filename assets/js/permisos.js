var base_url = 'http://localhost/RRHH-FIRMA/index.php/';

function getSelectPerfiles(){
  var url = base_url+'getPerfiles';
  $("#getSelectPerfiles").empty();
  var fila = "<option disabled selected>Seleccione una opción</option>";
  $.getJSON(url, function (result) {
      $.each(result, function (i, o) {
          fila += "<option value='" + o.cp_perfil + "'>" + o.atr_nombre + "</option>";
      });
      $("#getSelectPerfiles").append(fila);
  });
}

function cargarTablaPerfiles(){
  var table = $('#tabla_perfiles').DataTable();
  table.destroy();

  btnAcciones = '<button style="display:inline" type="button" id="btnVerPermisos" class="btn btn-info btn-sm" data-toggle="modal" data-target="#modalVerPermisos"><i class="fa fa-shield"></i></button>';

  $('.dataTables-perfiles').DataTable({
    "autoWidth": false,
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
            url: "http://localhost/RRHH-FIRMA/index.php/getPerfilesTabla",
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



function cargarTablaUsuarios(){
  var table = $('#tabla_usuario').DataTable();
  table.destroy();

  var btnAcciones = '<button style="display:inline" type="button" id="btnVerPermisos" class="btn btn-info btn-sm" data-toggle="modal" data-target="#modalVerPermisos"><i class="fa fa-shield"></i></button>';

    $('.dataTables-usuarios').DataTable({
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
              url: "http://localhost/RRHH-FIRMA/index.php/getListadoUsuarios",
              type: 'GET'
          },
          "columnDefs": [{
            "targets": 5,
            "data": null,
            "defaultContent": btnAcciones
          }
        ],dom: '<"html5buttons"B>lTfgitp',
            buttons: []
      });



}
