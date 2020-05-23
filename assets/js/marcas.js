var base_url = 'http://10.10.10.1/grupofirma/index.php/';


function cargarTablaMarcas(permisoEditar,permisoExportar){
  var table = $('#tabla_marcas').DataTable();
  table.destroy();

  var btnAcciones = ""

  if (permisoEditar == "si") {
     btnAcciones = '<button type="button" id="getDetalleMarca" class="btn btn-info btn-sm" data-toggle="modal" data-target="#modalEditarMarca"><i class="glyphicon glyphicon-pencil"></i></button>';
  }

  if (permisoExportar == "si") {
    $('.dataTables-marcas').DataTable({
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
              url: "http://10.10.10.1/grupofirma/index.php/getListadoMarcas",
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
                    title: 'Listado de marcas',
                    exportOptions: {
                        columns: [ 1 ]
                    }
                },
                {
                    extend: 'pdf',
                    title: 'Listado de marcas',
                    exportOptions: {
                        columns: [ 1 ]
                    }

                },
                {
                    extend: 'print',
                    title: 'Marcas de vehículos',
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
    $('.dataTables-marcas').DataTable({
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
              url: "http://10.10.10.1/grupofirma/index.php/getListadoMarcas",
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



function agregarMarca() {
    var nombre = $("#nombre").val();

    if (nombre == "" ) {
        toastr.error("Rellene todos los campos");
    } else {
        $.ajax({
            url: 'addMarca',
            type: 'POST',
            dataType: 'json',
            data: { "nombre":nombre}
        }).then(function (msg) {
            if (msg.msg == "ok") {
               toastr.success('Marca ingresada')
               document.getElementById("nombre").value = "";
               $('#myModal').modal('hide');
               var permisoExportar = $("#permisoExportar").text();
               var permisoEditar = $("#permisoEditar").text();
               cargarTablaMarcas(permisoEditar,permisoExportar);
            } else {
                toastr.error("Error en el ingreso.");
            }
        });
    }
  }

  function editarMarca() {
      var nombre = $("#nombreEditar").val();
      var idMarca = $("#labelMarca").text();

      if (nombre == "" ) {
          toastr.error("Rellene todos los campos");
      } else {
          $.ajax({
              url: 'editarMarca',
              type: 'POST',
              dataType: 'json',
              data: { "idMarca":idMarca, "nombre":nombre}
          }).then(function (msg) {
              if (msg.msg == "ok") {
                 toastr.success('Marca modificada')
                 document.getElementById("nombre").value = "";
                 $('#modalEditarMarca').modal('hide');
                 var permisoExportar = $("#permisoExportar").text();
                 var permisoEditar = $("#permisoEditar").text();
                 cargarTablaMarcas(permisoEditar,permisoExportar);
              } else {
                  toastr.error("Error en el ingreso.");
              }
          });
      }
    }


  function getDetalleMarca(idMarca){
      $.ajax({
          url: 'getDetalleMarca',
          type: 'POST',
          dataType: 'json',
          data: {"idMarca": idMarca}
      }).then(function (msg) {

          $("#contenedorDetalleMarca").empty();

          var fila = "";
          $.each(msg.msg, function (i, o) {
            fila +='<h5 class="modal-title mx-auto">MARCA</h5><button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>';
            fila +='<div class="col-md-12"><br><label for="nombre">NOMBRE&nbsp; </label><label id="idMarca" style="color:#2A3F54;">'+o.cp_marca+'</label><input type="text" style="color:#848484" class="form-control custom-input-sm" oninput="mayus(this)" id="nombreEditar" value="'+o.atr_descripcion+'"></div>';
            fila +='<label id="labelMarca" style="display:none">'+idMarca+'</label>';
            $("#contenedorDetalleMarca").append(fila);
          });

      });
  }


  function getSelectMarcas(){
      var url = base_url+'getMarcas';
      $("#getSelectMarca").empty();
      var fila = "<option disabled selected >Seleccione una opción</option>";
      $.getJSON(url, function (result) {
          $.each(result, function (i, o) {
              fila += "<option value='" + o.cp_marca + "'>" + o.atr_descripcion + "</option>";
          });
          $("#getSelectMarca").append(fila);
      });
  }
