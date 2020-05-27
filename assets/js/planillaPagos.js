var base_url = 'https://imlchile.cl/grupofirma/index.php/';

function cargarTablaPlanillaPagoMes (){
  var table = $('#tabla_planillaBanco').DataTable();
  table.destroy();

  var mesActual = $('#getSelectMes').val();
  var anoActual = $('#getSelectAno').val();
  var diaTermino = 29;
  var empresa = $('#getSelectEmpresa').val();

  if (mesActual == '00') {
    var fechaHoy = new Date();
    var mesActual = fechaHoy.getMonth()+1;
    if (mesActual < 10) {
      mesActual = '0'+mesActual;
    }
  }


  if (mesActual == '04' || mesActual == '06' || mesActual == '09' || mesActual == '11') {
    diaTermino = 30;
  }else{
    if (mesActual == '01' || mesActual == '03' || mesActual == '05' || mesActual == '07' || mesActual == '08' || mesActual == '10' || mesActual == '12' ) {
      diaTermino = 31;
    }
  }

  $('.dataTables-planillaBanco').DataTable({
    "autoWidth": false,
    "sInfo": false,
    "sInfoEmpty": false,
    // "dom": '<"top"f>rt<"bottom"flp><"clear">',
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
            url: 'https://imlchile.cl/grupofirma/index.php/getListadoPlanillaPagoMes?year='+anoActual+'&&mes='+mesActual+'&&diaTermino='+diaTermino+'&&empresa='+empresa,
            type: 'GET',
            data: {}
        },
        "columnDefs": [{
                "targets": 12,
                "data": null,
                "defaultContent": ""
            }

        ],dom: '<"html5buttons"B>lTfgitp',
        buttons: [
          {
                  extend: 'copy',
                  exportOptions: {
                      columns: [ 0,1,2,3,4,5,6,7,8,9,10,11 ]
                  }
              },
              {
                  extend: 'csv',
                  exportOptions: {
                      columns: [ 0,1,2,3,4,5,6,7,8,9,10,11 ]
                  }
              },
              {
                  extend: 'excel',
                  title: 'Listado de pagos mensuales',
                  exportOptions: {
                      columns: [ 0,1,2,3,4,5,6,7,8,9,10,11 ]
                  }
              },
              {
                  extend: 'pdf',
                  title: 'Listado de pagos mensuales',
                  exportOptions: {
                      columns: [ 0,1,2,3,4,5,6,7,8,9,10,11 ]
                  }

              },
              {
                  extend: 'print',
                  title: 'Listado de pagos mensuales',
                  exportOptions: {
                      columns: [ 0,1,2,3,4,5,6,7,8,9,10,11 ]
                  },
                  customize: function(win) {
                      $(win.document.body).addClass('white-bg');
                      $(win.document.body).css('font-size', '10px');
                      $(win.document.body).find('table')
                          .addClass('compact')
                          .css('font-size', 'inherit');
                  }
              }
        ],
        "lengthMenu": [[100, 50, 25, -1], [100, 50, 25, "All"]],
    });
}







function cargarTablaPagosFinDeMes(){
  var table = $('#tabla_pagos5').DataTable();
  table.destroy();

  var mesActual = $('#getSelectMes').val();
  var anoActual = $('#getSelectAno').val();
  var diaTermino = 29;
  var empresa = $('#getSelectEmpresa').val();

  if (mesActual == '00') {
    var fechaHoy = new Date();
    var mesActual = fechaHoy.getMonth()+1;
    if (mesActual < 10) {
      mesActual = '0'+mesActual;
    }
  }


  if (mesActual == '04' || mesActual == '06' || mesActual == '09' || mesActual == '11') {
    diaTermino = 30;
  }else{
    if (mesActual == '01' || mesActual == '03' || mesActual == '05' || mesActual == '07' || mesActual == '08' || mesActual == '10' || mesActual == '12' ) {
      diaTermino = 31;
    }
  }


  var btnAcciones = "";

  // VER DETALLE
    btnAcciones += '<button style="display:inline" type="button" id="btnVerDetallePago" class="btn btn-info btn-sm" data-toggle="modal" data-target="#modalDetallePago"><i class="glyphicon glyphicon-usd"></i></button>';

  // CARGAR COMPROBANTE
    btnAcciones += '<button style="display:inline" type="button" id="btnCargarComprobante" class="btn btn-info btn-sm" data-toggle="modal" data-target="#modalCargarArchivo"><i class="glyphicon glyphicon-open"></i></button>';

  $('.dataTables-tabla_pagos5').DataTable({
    "autoWidth": false,
    "sInfo": false,
    "sInfoEmpty": false,
    // "dom": '<"top"f>rt<"bottom"flp><"clear">',
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
            url: 'https://imlchile.cl/grupofirma/index.php/getListadoPagosFinDeMes?year='+anoActual+'&&mes='+mesActual+'&&diaTermino='+diaTermino+'&&empresa='+empresa,
            type: 'GET',
            data: {}
        },
        "columnDefs": [{
                "targets": 10,
                "data": null,
                "defaultContent": btnAcciones
            }

        ],dom: '<"html5buttons"B>lTfgitp',
        buttons: [
        ],
        "lengthMenu": [[100, 50, 25, -1], [100, 50, 25, "All"]],
    });
}


function getDetallePagoTrabajador(idTrabajador){
  var mesActual = $('#getSelectMes').val();
  var anoActual = $('#getSelectAno').val();
  var diaTermino = 29;

  if (mesActual == '00') {
    var fechaHoy = new Date();
    var mesActual = fechaHoy.getMonth()+1;
    if (mesActual < 10) {
      mesActual = '0'+mesActual;
    }
  }


  if (mesActual == '04' || mesActual == '06' || mesActual == '09' || mesActual == '11') {
    diaTermino = 30;
  }else{
    if (mesActual == '01' || mesActual == '03' || mesActual == '05' || mesActual == '07' || mesActual == '08' || mesActual == '10' || mesActual == '12' ) {
      diaTermino = 31;
    }
  }

  $.ajax({
      url: 'getDetallePagoTrabajador',
      type: 'POST',
      dataType: 'json',
      data: {"idTrabajador":idTrabajador, "year":anoActual, "mes":mesActual, "diaTermino":diaTermino}
  }).then(function (response) {
    var fila = '';
    $("#contenedorDetallePago").empty();

    $.each(response, function (i, o) {

      var bonoColacionAPagar = new Intl.NumberFormat("es-ES").format(Math.round(o.bonoColacionAPagar));
      var bonoMovilizacionAPagar = new Intl.NumberFormat("es-ES").format(Math.round(o.bonoMovilizacionAPagar));
      var bonoAsistenciaAPagar = new Intl.NumberFormat("es-ES").format(Math.round(o.bonoAsistenciaAPagar));


      fila += '<div class="col-lg-6 col-md-6 col-sm-6"><br>';
      fila += '<label class="text-center" for="sueldoBase">SUELDO LÍQUIDO</label>';
      fila += '<input type="text" class="form-control custom-input-sm" id="sueldoBase" disabled style="color:#000;" value="$'+o.sueldoBase+'">';
      fila += '</div>';

      fila += '<div class="col-lg-6 col-md-6 col-sm-6"><br>';
      fila += '<label class="text-center" for="sueldoAPago">SUELDO A PAGO</label>';
      fila += '<input type="text" class="form-control custom-input-sm" id="sueldoAPago" disabled style="color:#000;" value="$'+o.sueldoAPago+'">';
      fila += '</div>';



      fila += '<div class="col-lg-6 col-md-6 col-sm-6"><br>';
      fila += '<label class="text-center" for="inasistencias">INASISTENCIAS</label>';
      fila += '<input type="text" class="form-control custom-input-sm" id="inasistencias" disabled style="color:#000;" value="'+o.inasistencias+'">';
      fila += '</div>';

      fila += '<div class="col-lg-6 col-md-6 col-sm-6"><br>';
      fila += '<label class="text-center" for="diasAPagar">DÍAS A PAGAR</label>';
      fila += '<input type="text" class="form-control custom-input-sm" id="diasAPagar" disabled style="color:#000;" value="'+o.diasAPagar+'">';
      fila += '</div>';

      fila += '<h5 class="col-lg-12 col-md-12 text-center" style="color:#fff; margin-top:20px">BONOS</h5>';


      fila += '<div class="col-lg-5 col-md-5"><br>';
      fila += '<label class="text-center" for="bonoColacion">BONO DE COLACIÓN</label>';
      fila += '<input type="text" class="form-control custom-input-sm" id="bonoColacion" disabled style="color:#000;" value="$'+o.bonoColacionBase+'">';
      fila += '</div>';

      fila += '<div class="col-lg-3 col-md-3 col-sm-6"><br>';
      fila += '<label class="text-center" for="bonoColacionPorDia">BONO POR DÍA</label>';
      fila += '<input type="text" class="form-control custom-input-sm" id="bonoColacionPorDia" disabled style="color:#000;" value="$'+o.bonoColacionDiario+'">';
      fila += '</div>';

      fila += '<div class="col-lg-4 col-md-4 col-sm-6"><br>';
      fila += '<label class="text-center" for="bonoColacionAPagar">BONO A PAGAR</label>';
      fila += '<input type="text" class="form-control custom-input-sm" id="bonoColacionAPagar" disabled style="color:#000;" value="$'+bonoColacionAPagar+'">';
      fila += '</div>';




      fila += '<div class="col-lg-5 col-md-5"><br>';
      fila += '<label class="text-center" for="bonoMovilizacion">BONO DE MOVILIZACIÓN</label>';
      fila += '<input type="text" class="form-control custom-input-sm" id="bonoMovilizacion" disabled style="color:#000;" value="$'+o.bonoBaseMovilizacion+'">';
      fila += '</div>';

      fila += '<div class="col-lg-3 col-md-3 col-sm-6"><br>';
      fila += '<label class="text-center" for="bonoMovilizacionPorDia">BONO POR DÍA</label>';
      fila += '<input type="text" class="form-control custom-input-sm" id="bonoMovilizacionPorDia" disabled style="color:#000;" value="$'+o.bonoMovilizacionDiaria+'">';
      fila += '</div>';

      fila += '<div class="col-lg-4 col-md-4 col-sm-6"><br>';
      fila += '<label class="text-center" for="bonoMovilizacionAPagar">BONO A PAGAR</label>';
      fila += '<input type="text" class="form-control custom-input-sm" id="bonoMovilizacionAPagar" disabled style="color:#000;" value="$'+bonoMovilizacionAPagar+'">';
      fila += '</div>';





      fila += '<div class="col-md-8 col-sm-12"><br>';
      fila += '<label class="text-center" for="bonoAsistencia">BONO DE ASISTENCIA Y PUNTUALIDAD</label>';
      fila += '<input type="text" class="form-control custom-input-sm" id="bonoAsistencia" disabled style="color:#000;" value="$'+o.bonoBaseAsistencia+'">';
      fila += '</div>';

      fila += '<div class="col-md-4 col-sm-12"><br>';
      fila += '<label class="text-center" for="bonoAsistencia">BONO A PAGAR</label>';
      fila += '<input type="text" class="form-control custom-input-sm" id="bonoAsistencia" disabled style="color:#000;" value="$'+bonoAsistenciaAPagar+'">';
      fila += '</div>';




      if (o.arrayPrestamos != "") {
        fila += '<h5 class="col-md-12 text-center" style="color:#fff; margin-top:20px">PRÉSTAMOS</h5>';

        fila += '<div class="col-md-4" style="margin-bottom:-20px"><br>';
        fila += '<label>MONTO TOTAL</label>';
        fila += '</div>';

        fila += '<div class="col-md-4" style="margin-bottom:-20px"><br>';
        fila += '<label>N° DE CUOTA</label>';
        fila += '</div>';

        fila += '<div class="col-md-4" style="margin-bottom:-20px"><br>';
        fila += '<label>MONTO DESCUENTO</label>';
        fila += '</div>';
      }

      // recorrer listado de prestamos
      $.each(o.arrayPrestamos, function (i, p) {

        var atr_montoTotal = new Intl.NumberFormat("de-DE").format(p.atr_montoTotal);
        var atr_montoDescontar = new Intl.NumberFormat("de-DE").format(p.atr_montoDescontar);

        // número de la cuota
        fila += '<div class="col-md-4"><br>';
        fila += '<input type="text" class="form-control custom-input-sm" disabled style="color:#000;" value="$'+atr_montoTotal+'">';
        fila += '</div>';


        // monto total del préstamo
        fila += '<div class="col-md-4"><br>';
        fila += '<input type="text" class="form-control custom-input-sm" disabled style="color:#000;" value="'+p.atr_numCuota+'/'+p.atr_cantidadCuotas+'">';
        fila += '</div>';

        // monto de descuento
        fila += '<div class="col-md-4"><br>';
        fila += '<input type="text" class="form-control custom-input-sm" disabled style="color:#000;" value="$'+atr_montoDescontar+'">';
        fila += '</div>';


      });

      if (o.arrayAdelantos != "" ) {
        fila += '<h5 class="col-md-12 text-center" style="color:#fff; margin-top:20px">ADELANTOS</h5>';

        fila += '<div class="col-md-6" style="margin-bottom:-20px"><br>';
        fila += '<label>FECHA</label>';
        fila += '</div>';

        fila += '<div class="col-md-6" style="margin-bottom:-20px"><br>';
        fila += '<label>MONTO</label>';
        fila += '</div>';
      }


      //recorrer listado de adelantos
      $.each(o.arrayAdelantos, function (i, a) {

        // cambiar formato de visluzación de la fecha
        var fechaOrdenadaAdelanto = a.atr_fecha.split("-");
        fechaOrdenadaAdelanto = fechaOrdenadaAdelanto[2]+"-"+fechaOrdenadaAdelanto[1]+"-"+fechaOrdenadaAdelanto[0];

        // fecha del adelanto
        fila += '<div class="col-md-6"><br>';
        fila += '<input type="text" class="form-control custom-input-sm" disabled style="color:#000;" value="'+fechaOrdenadaAdelanto+'">';
        fila += '</div>';

        // monto del adelanto
        var atr_monto = new Intl.NumberFormat("de-DE").format(a.atr_monto);
        fila += '<div class="col-md-6"><br>';
        fila += '<input type="text" class="form-control custom-input-sm" disabled style="color:#000;" value="$'+atr_monto+'">';
        fila += '</div>';
      });

    });

    $("#contenedorDetallePago").append(fila);

  });
}



function cargarBancos(){
  $.ajax({
      url: 'getBancos',
      type: 'GET',
      dataType: 'json'
  }).then(function (response) {
      var fila = "";
      $("#getSelectBanco").empty();
      fila += '<option value="">Seleccione una opción</opion>'
      $.each(response, function (i, o) {
        fila += '<option value="'+o.cp_banco+'">'+o.atr_nombre+'</opion>';
      });
      $("#getSelectBanco").append(fila);
  });
}

function cargarEmpresas(){
  $.ajax({
      url: 'getEmpresas',
      type: 'GET',
      dataType: 'json'
  }).then(function (response) {
      var fila = "";
      $("#getSelectEmpresa").empty();
      // fila += '<option value="">Seleccione una opción</opion>'
      $.each(response, function (i, o) {
        fila += '<option value="'+o.cp_empresa+'">'+o.atr_nombre+'</opion>';
      });
      $("#getSelectEmpresa").append(fila);
  });
}
