var base_url = 'http://localhost/GRUPOFIRMA/index.php/';

function cargarTablaAdelantos(permisoEditar,permisoExportar){
  var table = $('#tabla_adelantos').DataTable();
  table.destroy();

  var btnAcciones = "";

  if (permisoEditar == "si") {
    btnAcciones += '<button type="button" id="getDetalleAdelanto" class="btn btn-info btn-sm" data-toggle="modal" data-target="#modalEditarAdelanto"><i class="glyphicon glyphicon-pencil"></i></button>';
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
              url: "http://localhost/GRUPOFIRMA/index.php/getListadoAdelantos",
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
                    title: 'Lista de adelantos',
                    exportOptions: {
                        columns: [ 1,2,3,4,5,6 ]
                    }

                },
                {
                    extend: 'pdf',
                    title: 'Lista de adelantos',
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
              url: "http://localhost/GRUPOFIRMA/index.php/getListadoAdelantos",
              type: 'GET'
          },
          "columnDefs": [{
            "targets": 7,
            "data": null,
            "defaultContent": btnAcciones
          }
          ],dom: '<"html5buttons"B>lTfgitp',
            buttons: []
      });
  }


}






function getDetalleAdelanto(idAdelanto){
    $.ajax({
        url: 'getDetalleAdelanto',
        type: 'POST',
        dataType: 'json',
        data: {"idAdelanto": idAdelanto}
    }).then(function (msg) {
        $("#contenedorDetalleAdelanto").empty();

        var fila = "";
        $.each(msg, function (i, o) {
          fila +='<h5 class="modal-title mx-auto">ADELANTO</h5><button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>';
          fila +='<div class="col-md-12"><br><label for="nombre">RUT&nbsp; </label><label id="rut" style="color:#2A3F54;"></label><input type="text" style="color:#848484" class="form-control custom-input-sm" id="rut" value="'+o.rutTrabajador+'" disabled></div>';
          fila +='<div class="col-md-12"><br><label for="nombre">NOMBRE COMPLETO&nbsp; </label><input type="text" style="color:#848484" class="form-control custom-input-sm" id="nombreCompleto" value="'+o.nombres+' '+o.apellidos+'" disabled></div>';

          var url = base_url+'getBancos';
          fila +='<div class="col-md-6"><br> <label for="getSelectBanco2">BANCO: &nbsp;</label><label id="bancoActual">'+o.banco+'</label><br> <select class="custom-select " id="getSelectBanco2"> ';
          fila +='<option disabled selected>Seleccione una opción</option>';

          $.getJSON(url, function (result) {
              $.each(result, function (i, o) {
                  fila += "<option value='" + o.cp_banco+ "'>" + o.atr_nombre + "</option>";
              });
              fila +='</select></div>';
              fila +='<div class="col-md-6"><br><label for="nombre">TIPO DE CUENTA&nbsp; </label><input type="text" style="color:#848484" class="form-control custom-input-sm" id="tipoCuenta" value="'+o.atr_tipoCuenta+'"></div>';
              fila +='<div class="col-md-6"><br><label for="nombre">NÚMERO DE CUENTA&nbsp; </label><input type="text" style="color:#848484" class="form-control custom-input-sm" id="numCuenta" value="'+o.atr_numCuenta+'"></div>';
              fila +='<div class="col-md-6"><br><label for="nombre">MONTO&nbsp; </label><input type="text" style="color:#848484" class="form-control custom-input-sm" id="monto" value="'+o.atr_monto+'"></div>';
              fila +='<label style="display:none" id="idAdelanto">'+idAdelanto+'</label>';

              $("#contenedorDetalleAdelanto").append(fila);
          });


        });

    });
}



function updateAdelanto(){
    var id = $("#idAdelanto").text();
    var banco = $("#getSelectBanco2").val();
    var tipoCuenta = $("#tipoCuenta").val();
    var numeroCuenta = $("#numCuenta").val();
    var monto = $("#monto").val();

    if (banco == null) {
      banco =  $("#bancoActual").text();
    }

    $.ajax({
        url: 'updateAdelanto',
        type: 'POST',
        dataType: 'json',
        data: {"idAdelanto": id, "banco":banco, "tipoCuenta":tipoCuenta, "numeroCuenta":numeroCuenta, "monto":monto}
    }).then(function (msg) {
        if(msg.msg == "ok"){
          toastr.success('Información actualizada');
          $('#modalEditarAdelanto').modal('hide');
          var permisoExportar = $("#permisoExportar").text();
          var permisoEditar = $("#permisoEditar").text();
          cargarTablaAdelantos(permisoEditar,permisoExportar);
        }else{
          toastr.error('No se ha actualizado la información');
          $('#modalEditarAdelanto').modal('hide');
          var permisoExportar = $("#permisoExportar").text();
          var permisoEditar = $("#permisoEditar").text();
          cargarTablaAdelantos(permisoEditar,permisoExportar);
        }
    });
}
