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

function getSelectUsuariosPorPerfil(){
  var url = base_url+'cargarUsuariosConPerfil';
  $("#getSelectUsuariosPorPerfil").empty();
  var fila = "<option disabled selected>Seleccione una opción</option>";
  $.getJSON(url, function (result) {
      $.each(result, function (i, o) {
          fila += "<option value='" + o.cp_usuario + "'>" + o.atr_nombre+ "</option>";
      });
      $("#getSelectUsuariosPorPerfil").append(fila);
  });
}


function getDetallePermisosUsuario(){
  var usuario = $("#getSelectUsuariosPorPerfil").val();

  var url  = base_url+'getListadoPermisosExistentes';
  var url2 = base_url+'getModulos';

  $.getJSON(url2, function (result) {
      $.each(result, function (i, o) {
        
      });

      $.getJSON(url, function (result) {
          $.each(result, function (i, p) {

          });

          $("#getSelectUsuariosPorPerfil").append(fila);

      });

  });

}


function cargarTablaPerfiles(){
  var table = $('#tabla_perfiles').DataTable();
  table.destroy();

  btnAcciones = '<a style="display:inline" href="http://localhost/RRHH-FIRMA/index.php/inicioPermisosPerfil" type="button" id="btnVerPermisos" class="btn btn-info btn-sm"><i class="fa fa-shield"></i></a>';

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

  var btnAcciones = '<a style="display:inline" href="http://localhost/RRHH-FIRMA/index.php/inicioPermisosUsuario" type="button" id="btnVerPermisos" class="btn btn-info btn-sm"><i class="fa fa-shield"></i></a>';

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
