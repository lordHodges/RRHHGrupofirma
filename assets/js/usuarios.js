var base_url = 'http://localhost/RRHH-FIRMA/index.php/';

function cargarTabla(){
  var table = $('#tabla_usuario').DataTable();
  table.destroy();

  $('.dataTables-usuarios').DataTable({
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
            url: "http://localhost/RRHH-FIRMA/index.php/getListadoUsuarios",
            type: 'GET'
        },
        "columnDefs": [{
          "targets": 5,
          "data": null,
          "defaultContent": '<button type="button" id="btnCambiarEstado" class="btn btn-info btn-sm">Cambiar estado&nbsp;&nbsp;<i class="glyphicon glyphicon-refresh"></i></button>'
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
                  title: 'Listado de usuarios',

              },
              {
                  extend: 'pdf',
                  title: 'Listado de usuarios'

              },
              {
                  extend: 'print',
                  title: 'Firma de abogados',
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

function agregarUsuario() {
    var nombre = $("#nombre").val();
    var correo = $("#correo").val();
    var perfil = $("#getSelectPerfiles").val();

    if (nombre == "" || correo == "" ||  perfil == null) {
        toastr.error("Rellene todos los campos");
    } else {
        $.ajax({
            url: 'addUsuario',
            type: 'POST',
            dataType: 'json',
            data: { "nombre":nombre, "correo":correo, "perfil":perfil}
        }).then(function (msg) {
            if (msg == "ok") {
               toastr.success('Usuario ingresado')
               document.getElementById("nombre").value = "";
               document.getElementById("correo").value = "";
               $('#modalCrearUsuario').modal('hide');
               cargarTabla();
            } else {
                toastr.error("Error en el ingreso.");
            }
        });
    }
}

function cambiarEstado(idUsuario, estado) {
    if (estado == "Activo") {
      valorEstado = "0";
    }else{
      valorEstado = "1";
    }

    $.ajax({
        url: 'cambiarEstado',
        type: 'POST',
        dataType: 'json',
        data: { "valorEstado":valorEstado, "usuario":idUsuario }
    }).then(function (msg) {
        if (msg == "ok") {
           if (estado == "Activo") {
             toastr.success("Usuario desactivado.");
           }else{
             toastr.success("Usuario activado.");
           }
           cargarTabla();
        } else {
            toastr.error("Error al cambiar el estado.");
        }
    });
}
