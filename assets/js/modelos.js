var base_url = 'http://10.10.10.1/GRUPOFIRMA/index.php/';


function cargarTablaModelos(permisoEditar,permisoExportar){
  var table = $('#tabla_modelo').DataTable();
  table.destroy();

  var btnAcciones = ""

  if (permisoEditar == "si") {
     btnAcciones = '<button type="button" id="getDetalleModelo" class="btn btn-info btn-sm" data-toggle="modal" data-target="#modalEditarModelo"><i class="glyphicon glyphicon-pencil"></i></button>';
  }

  if (permisoExportar == "si") {
    $('.dataTables-modelos').DataTable({
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
              url: "http://10.10.10.1/GRUPOFIRMA/index.php/getListadoModelos",
              type: 'GET'
          },
          "columnDefs": [{
            "targets": 3,
            "data": null,
            "defaultContent": btnAcciones
          }
          ],dom: '<"html5buttons"B>lTfgitp',
            buttons: [{
                    extend: 'copy',
                    exportOptions: {
                        columns: [ 1,2 ]
                    }
                },
                {
                    extend: 'csv',
                    exportOptions: {
                        columns: [ 1,2 ]
                    }
                },
                {
                    extend: 'excel',
                    title: 'Listado de modelos',
                    exportOptions: {
                        columns: [ 1,2 ]
                    }
                },
                {
                    extend: 'pdf',
                    title: 'Listado de modelos',
                    exportOptions: {
                        columns: [ 1,2 ]
                    }

                },
                {
                    extend: 'print',
                    title: 'Modelos de vehículos',
                    exportOptions: {
                        columns: [ 1,2 ]
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
    $('.dataTables-modelos').DataTable({
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
              url: "http://10.10.10.1/GRUPOFIRMA/index.php/getListadoModelos",
              type: 'GET'
          },
          "columnDefs": [{
            "targets": 3,
            "data": null,
            "defaultContent": btnAcciones
          }
          ],dom: '<"html5buttons"B>lTfgitp',
            buttons: []
      });
  }
}



function agregarModelo() {
    var nombre = $("#nombre").val();
    var marca = $("#getSelectMarca").val();
    if (nombre == "" || marca == null) {
        toastr.error("Rellene todos los campos");
    } else {
        $.ajax({
            url: 'addModelo',
            type: 'POST',
            dataType: 'json',
            data: { "nombre":nombre, "marca":marca }
        }).then(function (msg) {
            if (msg.msg == "ok") {
               toastr.success('Modelo ingresado')
               document.getElementById("nombre").value = "";
               $('#myModal').modal('hide');
               var permisoExportar = $("#permisoExportar").text();
               var permisoEditar = $("#permisoEditar").text();
               cargarTablaModelos(permisoEditar,permisoExportar);
            } else {
                toastr.error("Error en el ingreso.");
            }
        });
    }
  }


  function getDetalleModelo(idModelo){
      $.ajax({
          url: 'getDetalleModelo',
          type: 'POST',
          dataType: 'json',
          data: {"idModelo": idModelo}
      }).then(function (msg) {
          $("#contenedorDetalleModelo").empty();

          var fila = "";
          $.each(msg.msg, function (i, o) {
            fila +='<h5 class="modal-title mx-auto">MODELO</h5><button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>';


            var url = base_url+'getMarcas';

            fila +='<div class="col-md-12">';
            fila +='<br><label for="nombre">MARCA&nbsp; </label>'
            fila +='<select class="custom-select"  id="getSelectM;arca2">';
            fila += '<option disabled selected >Seleccione una opción</option>';
            $.getJSON(url, function (result) {
                $.each(result, function (i, o) {
                    fila += "<option value='" + o.cp_marca + "'>" + o.atr_descripcion + "</option>";
                });
                fila +='</select></div>';
                fila +='<div class="col-md-12"><br><label for="nombre">NOMBRE&nbsp; </label><label id="idMarca" style="color:#2A3F54;">'+o.cp_modelo+'</label><input type="text" style="color:#848484" class="form-control custom-input-sm" oninput="mayus(this)" id="nombreEditar" value="'+o.atr_descripcion+'"></div>';
                fila +='<label style="display:none" id="labelMarca">'+o.cf_marca+'</label><label style="display:none" id="labelModelo2">'+idModelo+'</label>';
                $("#contenedorDetalleModelo").append(fila);
            });

          });

      });
  }


  function editarModelo() {
      var nombre = $("#nombreEditar").val();
      var marca = $("#getSelectMarca2").val();
      var idModelo = $("#labelModelo2").text();

      if ( marca == null || marca == "" ) {
          marca = $("#labelMarca").text();
      }
      if (nombre == "" ) {
          toastr.error("Rellene todos los campos");
      } else {
          $.ajax({
              url: 'editarModelo',
              type: 'POST',
              dataType: 'json',
              data: { "idModelo":idModelo, "nombre":nombre, "marca":marca}
          }).then(function (msg) {
              if (msg.msg == "ok") {
                 toastr.success('Modelo modificado')
                 document.getElementById("nombre").value = "";
                 $('#modalEditarModelo').modal('hide');
                 var permisoExportar = $("#permisoExportar").text();
                 var permisoEditar = $("#permisoEditar").text();
                 cargarTablaModelos(permisoEditar,permisoExportar);
              } else {
                  toastr.error("Error en el ingreso.");
              }
          });
      }
    }
