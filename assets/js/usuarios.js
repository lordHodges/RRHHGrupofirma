var base_url = 'http://imlchile.cl/grupofirma/index.php/';

function cargarTabla(permisoEditar,permisoExportar, permisoCambiar){
  var table = $('#tabla_usuario').DataTable();
  table.destroy();

  var btnAcciones = "";

  if (permisoCambiar == "si") {
    btnAcciones += '<button type="button" id="btnCambiarEstado" class="btn btn-info btn-sm"><i class="glyphicon glyphicon-refresh"></i></button>';
  }

  if (permisoEditar == "si") {
    btnAcciones += '<button type="button" id="btnEditarUsuario" class="btn btn-info btn-sm" data-toggle="modal" data-target="#modaleditarUsuario"><i class="glyphicon glyphicon-pencil"></i></button>';
  }

  if (permisoExportar == "si") {
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
              url: "http://imlchile.cl/grupofirma/index.php/getListadoUsuarios",
              type: 'GET'
          },
          "columnDefs": [{
            "targets": 5,
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
                    title: 'Listado de usuarios',

                },
                {
                    extend: 'pdf',
                    title: 'Listado de usuarios'

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
              url: "http://imlchile.cl/grupofirma/index.php/getListadoUsuarios",
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

               var permisoEditar = $("#permisoEditar").text();
               var permisoExportar = $("#permisoExportar").text();
               var permisoCambiar = $("#permisoCambiar").text();
               cargarTabla(permisoEditar,permisoExportar, permisoCambiar);
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
             toastr.success("Usuario bloqueado.");
           }else{
             toastr.success("Usuario activado.");
           }
           var permisoEditar = $("#permisoEditar").text();
           var permisoExportar = $("#permisoExportar").text();
           var permisoCambiar = $("#permisoCambiar").text();
           cargarTabla(permisoEditar,permisoExportar, permisoCambiar);
        } else {
            toastr.error("Error al cambiar el estado.");
        }
    });
}


function getDetalleUsuario(idUsuario){
    $.ajax({
        url: 'getDetalleUsuario',
        type: 'POST',
        dataType: 'json',
        data: {"id": idUsuario}
    }).then(function (msg) {
        console.log(msg);
        $("#divDetalleUsuario").empty();
        var fila = "";
        $.each(msg, function (i, o) {

          fila +='<div class="col-md-12"><label for="nombre">NOMBRE DE USUARIO</label><input type="text" class="form-control custom-input-sm" id="name" value="'+o.atr_nombre+'"></div>';
          fila +='<div class="col-md-12"><br><label for="nombre">CORREO ELECTRÓNICO</label><input type="text" class="form-control custom-input-sm" id="email" value="'+o.atr_correo+'"></div>';
          fila +='<div class="col-md-6 col-sm-12"><br><label for="nombre">CONTRASEÑA</label><input type="password" class="form-control custom-input-sm" id="pass1"></div>';
          fila +='<div class="col-md-6 col-sm-12"><br><label for="nombre">CONFIRMAR CONTRASEÑA</label><input type="password" class="form-control custom-input-sm" id="pass2"></div>';
          fila +='<div class="col-md-12"><br><label for="getSelectPerfilesEditar">PERFIL</label><select class="custom-select" id="getSelectPerfilesEditar">';


          url = base_url+'getPerfiles';
          $.getJSON(url, function (result) {
            fila += '<option value="vacio">Seleccionar una opción</option>';
            $.each(result, function (i, o) {
                fila += '<option value="'+ o.cp_perfil + '">' + o.atr_nombre + '</option>';
            });


            fila +='</select></div>';
            fila +='<label id="idUser" style="display:none">'+idUsuario+'</label>';
            $("#divDetalleUsuario").append(fila);
          });

        });

    });
}



function editarUsuario(){
    // capturar DATOS
    var idUser = $("#idUser").text();
    var nombre = $("#name").val();
    var correo = $("#email").val();
    var perfil = $("#getSelectPerfilesEditar").val();
    var pass1  = $("#pass1").val();
    var pass2  = $("#pass2").val();



    if (nombre == "" || correo == "" ) {
      toastr.error("Debe rellenar nombre y correo");
    }else{
      if (pass1 != "" || pass2 != "") {
        if (pass1 == pass2) {
          //entonces las claves ingresadas son iguales
          $.ajax({
              url: 'cambiarPass',
              type: 'POST',
              dataType: 'json',
              data: {"id": idUser, "clave":pass1}
          }).then(function (msg) {
            if (msg == "ok") {

            }else{
              toastr.error("Ha ocurrido un error");
              exit();
            }
          });
        }else{
          toastr.error("Las contraseñas no coinciden");
          exit();
        }
      }
      // invocar método
      $.ajax({
          url: 'editarUsuario',
          type: 'POST',
          dataType: 'json',
          data: {"nombre": nombre, "correo":correo, "perfil":perfil, "idUser":idUser}
      }).then(function (msg) {
          if (msg == "ok") {

          }else{
            toastr.error("Ha ocurrido un error");
            exit();
          }
      });
    }

    $('#modaleditarUsuario').modal('hide');
    var permisoEditar = $("#permisoEditar").text();
    var permisoExportar = $("#permisoExportar").text();
    var permisoCambiar = $("#permisoCambiar").text();
    cargarTabla(permisoEditar,permisoExportar, permisoCambiar);
    toastr.success("Modificación exitosa");
}
