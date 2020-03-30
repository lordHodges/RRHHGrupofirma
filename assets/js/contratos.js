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
            url: "http://localhost/RRHH-FIRMA/index.php/getListadoTrabajadoresContrato",
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
      var download = "";

      $("#modalDetalleTrabajador").empty();

      fila +='<h5 class="modal-title mx-auto">LISTADO DE CONTRATOS</h5><button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>';
      fila +='<table class="table table-bordered tableInModal" style="margin-top:20px;"> <thead> <tr> <td class="text-center">Contrato</td> <td class="text-center">Fecha de inicio</td> <td class="text-center">Fecha de termino</td> <td class="text-center">Cargo</td> <td class="text-center">Descargar</td> </tr> </thead> <tbody>';
      $.each(response.msg, function (i, o) {

        fila +='<tr>';
        fila +='<td>'+o.cp_contrato+'</td>';
        fila +='<td>'+o.atr_fechaInicio+'</td>';
        fila +='<td>'+o.atr_fechaTermino+'</td>';
        fila +='<td>'+o.atr_nombre+'</td>';
        if(o.atr_ruta == "vacio"){
          fila +='<td> <a class="btn btn-ded" class="isDisabled" href="#"><i class="glyphicon glyphicon-download-alt"></i></a> </td>';
        }else{
          download = "http://localhost/RRHH-FIRMA/index.php/ContratosController/descargarContrato/"+o.cp_contrato;
          fila +='<td> <a class="btn btn-info" href="'+download+'" download><i class="glyphicon glyphicon-download-alt"></i></a> </td>';
        }
        fila +='</tr>';
      });
      fila +='</body> </table>';
      $("#modalDetalleTrabajador").append(fila);

  });
}

function seleccionTabs(nombre){
  cargarElementosDeContrato();
  var elemento = document.getElementById(nombre);
  elemento.style.color = "#fafafa";
  elemento.style.backgroundColor  = "#2a3f54";
  if(nombre == "estandar"){
    document.getElementById('personalizado').style = "";
  }else{
    document.getElementById('estandar').style = "";
  }
}

function cargarElementosDeContrato(){
  var url = base_url+'getTrabajadores';
  $("#selectTrabajador1").empty();
  $("#selectTrabajador2").empty();
  var fila = "<option disabled selected>Seleccione una opción</option>";
  $.getJSON(url, function (result) {
      $.each(result, function (i, o) {
          fila += "<option value='" + o.cp_trabajador + "'>" + o.atr_nombres +" "+o.atr_apellidos+ "</option>";
      });
      $("#selectTrabajador1").append(fila);
      $("#selectTrabajador2").append(fila);
  });
}

function cargarDatosEsenciales(idTrabajador){
  $.ajax({
      url: 'getDetalleTrabajadorContrato',
      type: 'POST',
      dataType: 'json',
      data: {"id": idTrabajador}
  }).then(function (msg) {
      // información del trabajador
      $.each(msg.arrayTrabajador, function (i, o) {

        $("#rut").val(o.atr_rut);
        $("#direccion").val(o.atr_direccion);
        $("#cargo").val(o.cargo);
        $("#empresa").val(o.empresa);
        $("#jefeDirecto").val(o.atr_jefeDirecto);
        $("#afp").val(o.afp);
        $("#prevision").val(o.prevision);
        $("#nacionalidad").val(o.nacionalidad);
        $("#fechaNacimiento").val(o.atr_fechaNacimiento);
        $("#ciudad").val(o.ciudad);
        $("#estadoCivil").val(o.estadocivil);
        $("#repre_legal").val(o.repre_legal);
        $("#repre_rut").val(o.repre_rut);
      });

      // informacion de remuneración
      var filaRemuneracion = "";
      $.each(msg.arrayRemuneracion, function (i, o) {
        filaRemuneracion += '<ul>';
        filaRemuneracion += '<li><h6 style="color:#49505c;">Sueldo: $'+o.atr_sueldoMensual+'</h6></li>';
        if(o.atr_cotizaciones == 1){
          filaRemuneracion += '<li><h6 style="color:#49505c;">+Imposiciones</h6></li>';
        }
        if(o.atr_colacion > 0){
          filaRemuneracion += '<li><h6 style="color:#49505c;">Colación: $'+o.atr_colacion+' </h6></li>';
        }
        if(o.atr_movilizacion > 0){
          filaRemuneracion += '<li><h6 style="color:#49505c;">Movilización: $'+o.atr_colacion+' </h6></li>';
        }
        $.each(msg.arrayRemuneracionExtra, function (i, o) {
          filaRemuneracion += '<li><h6 style="color:#49505c;">'+o.atr_descripcion+' </h6></li>';
        });
        filaRemuneracion += '</ul>';
        $("#getDetalleRemuneracion").append(filaRemuneracion);
      });
  });
}
