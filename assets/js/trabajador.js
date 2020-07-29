/*************************** TRABAJADOR ****************************/
var base_url = 'http://www.imlchilel.cl/grupofirma/index.php/';

function cargarTablaTrabajador(permisoEditar, permisoExportar) {
  var table = $('#tabla_trabajador').DataTable();
  table.destroy();

  permisoEditar = $("#permisoEditar").text();

  var btnAcciones = "";

  btnAcciones = '<button style="display:inline" type="button" id="btnVerTrabajador" class="btn btn-info btn-sm" data-toggle="modal" data-target="#modalVerTrabajador"><i class="glyphicon glyphicon-eye-open"></i></button>';


  if (permisoEditar == "si") {
    btnAcciones += '<button style="display:inline" type="button" id="getDetalleTrabajadorViewEdit" class="btn btn-info btn-sm" data-toggle="modal" data-target="#modalEditarTrabajador"><i class="glyphicon glyphicon-pencil"></i></button>';
    btnAcciones += '<button style="display:inline" type="button" id="getRemuneracionTrabajadorViewEdit" class="btn btn-info btn-sm" data-toggle="modal" data-target="#modalEditarRemuneracionTrabajador"><i class="glyphicon glyphicon-usd"></i></button>';
  }

  if (permisoExportar == "si") {
    $('.dataTables-trabajadores').DataTable({
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
        url: "http://www.imlchilel.cl/grupofirma/index.php/getListadoTrabajadores",
        type: 'GET'
      },
      "columnDefs": [{
        "targets": 8,
        "data": null,
        "defaultContent": btnAcciones
      }

      ], dom: '<"html5buttons"B>lTfgitp',
      buttons: [
        {
          extend: 'copy',
          exportOptions: {
            columns: [1, 2, 3, 4, 5, 6, 7]
          },
        },
        {
          extend: 'csv',
          exportOptions: {
            columns: [1, 2, 3, 4, 5, 6, 7]
          },
        },
        {
          extend: 'excel',
          title: 'Lista de Trabajadores',
          exportOptions: {
            columns: [1, 2, 3, 4, 5, 6, 7]
          },
        },
        {
          extend: 'pdf',
          title: 'Lista de Trabajadores',
          exportOptions: {
            columns: [1, 2, 3, 4, 5, 6, 7]
          },
          customize: function (doc) {
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
          title: 'Grupo Firma',
          exportOptions: {
            columns: [1, 2, 3, 4, 5, 6, 7]
          },
          customize: function (win) {
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
  } else {
    $('.dataTables-trabajadores').DataTable({
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
        url: "http://www.imlchilel.cl/grupofirma/index.php/getListadoTrabajadores",
        type: 'GET'
      },
      "columnDefs": [{
        "targets": 8,
        "data": null,
        "defaultContent": btnAcciones
      }

      ], dom: '<"html5buttons"B>lTfgitp',
      buttons: [],
      "lengthMenu": [[100, 50, 25, -1], [100, 50, 25, "All"]],
    });
  }

}

function agregarTrabajador() {


  var rut = $("#rut").val();
  var nombres = $("#nombres").val();
  var apellidos = $("#apellidos").val();
  var direccion = $("#direccion").val();
  var fechaNacimiento = $("#fechaNacimiento").val();
  var ciudad = $("#getSelectCiudad").val();
  var cargo = $("#getSelectCargo").val();
  var sucursal = $("#getSelectSucursal").val();
  var empresa = $("#getSelectEmpresa").val();
  var afp = $("#getSelectAFP").val();
  var prevision = $("#getSelectPrevision").val();
  var estadoContrato = $("#getSelectEstadoContrato").val();
  var estadoCivil = $("#getSelectCivil").val();
  var nacionalidad = $("#getSelectNacionalidad").val();

  if (estadoCivil == null || estadoCivil == "") {
    estadoCivil = 8;
  }

  if (rut == "" || nombres == "" || apellidos == "" || direccion == "" || ciudad == null || cargo == null || fechaNacimiento == null || sucursal == null || empresa == null || afp == null || prevision == null || estadoContrato == null || nacionalidad == null) {
    toastr.error("Rellene todos los campos");
  } else {
    $.ajax({
      url: 'addTrabajador',
      type: 'POST',
      dataType: 'json',
      data: {
        "rut": rut,
        "nombres": nombres,
        "apellidos": apellidos,
        "fecha": fechaNacimiento,
        "direccion": direccion,
        "fechaNacimiento": fechaNacimiento,
        "ciudad": ciudad,
        "sucursal": sucursal,
        "cargo": cargo,
        "empresa": empresa,
        "afp": afp,
        "prevision": prevision,
        "estadoContrato": estadoContrato,
        "estadoCivil": estadoCivil,
        "nacionalidad": nacionalidad

      }
    }).then(function (msg) {
      if (msg == "ok") {
        toastr.success('Trabajador ingresado')
        document.getElementById("rut").value = "";
        document.getElementById("nombres").value = "";
        document.getElementById("apellidos").value = "";
        document.getElementById("direccion").value = "";
        // document.getElementById("getSelectCiudad").value = "";
        // document.getElementById("getSelectCargo").value = "";
        // document.getElementById("getSelectEmpresa").value = "";
        // document.getElementById("getSelectAFP").value = "";
        // document.getElementById("getSelectPrevision").value = "";
        // document.getElementById("getSelectEstadoContrato").value = "";
        // document.getElementById("getSelectCivil").value = "";
        // document.getElementById("getSelectNacionalidad").value = "";
        // document.getElementById("fechaNacimiento").value = "";
        $('#myModal').modal('hide');
      } else {
        toastr.error("Error en el ingreso.");
      }
    });

  }
}



//Se utiliza cuando quiero VER LA INFORMACIÓN
function getDetalleTrabajador(id) {

  var id = id;
  $.ajax({
    url: 'getDetalleTrabajador',
    type: 'POST',
    dataType: 'json',
    data: { "id": id }
  }).then(function (msg) {

    $("#modalDetalleTrabajador").empty();

    var fila = "";
    $.each(msg.msg, function (i, o) {

      fila += '<div class="col-md-12"><br><label for="rut">RUT</label><input type="text" style="color:#848484" class="form-control custom-input-sm" id="rut" value="' + o.atr_rut + '" disabled></div>';
      fila += '<div class="col-md-6 col-sm-12"><br><label for="nombres">NOMBRES</label><input type="text" style="color:#848484" class="form-control" id="nombres" value="' + o.atr_nombres + '"  disabled></div>';
      fila += '<div class="col-md-6 col-sm-12"><br><label for="apellidos">APELLIDOS</label><input type="text" style="color:#848484" class="form-control" id="apellidos" value="' + o.atr_apellidos + '"disabled></div>';
      fila += '<div class="col-md-12 col-sm-12"><br><label for="direccion">DIRECCIÓN</label><input type="text" style="color:#848484" class="form-control" id="direccion" value="' + o.atr_direccion + '"disabled></div><br><br>';
      fila += '<div class="col-md-12 col-sm-12" style=" display: none;"><br><label for="direccion">SUELDO</label><input type="text" style="color:#848484; display: none" class="form-control" id="sueldo" value="' + o.atr_sueldo + '"disabled></div><br><br>';
      fila += '<div class="col-md-6"><br><label for="ciudad">CIUDAD / COMUNA</label><input type="text" style="color:#848484" class="form-control" id="ciudad" value="' + o.ciudad + '"disabled></div>';
      fila += '<div class="col-md-6"><br><label for="sucursal">SUCURSAL</label><input type="text" style="color:#848484" class="form-control" id="sucursal" value="' + o.sucursal + '"disabled></div>'
      fila += '<div class="col-md-6"><br><label for="cargo">CARGO</label> <input type="text" style="color:#848484" class="form-control" id="cargo" value="' + o.cargo + '"disabled></div>'
      fila += '<div class="col-md-6"><br><label for="empresa">EMPRESA CONTRATANTE</label><input type="text" style="color:#848484" class="form-control" id="empresa" value="' + o.empresa + '"disabled></div>'
      fila += '<div class="col-md-6"><br><label for="afp">AFP</label><input type="text" style="color:#848484" class="form-control" id="afp" value="' + o.afp + '"disabled></div>'
      fila += '<div class="col-md-6"><br><label for="prevision">PREVISIÓN</label><input type="text" style="color:#848484" class="form-control" id="prevision" value="' + o.prevision + '"disabled></div>'
      fila += '<div class="col-md-6"><br><label for="contrato">ESTADO DE CONTRATACIÓN</label><input type="text" style="color:#848484" class="form-control" id="contrato" value="' + o.estado + '"disabled></div>'
      fila += '<div class="col-md-6"><br><label for="estadocivil">ESTADO CIVIL</label><input type="text" style="color:#848484" class="form-control" id="estadocivil" value="' + o.estadocivil + '"disabled></div>'
      fila += '<div class="col-md-6"><br><label for="nacionalidad">NACIONALIDAD</label><input type="text" style="color:#848484" class="form-control" id="nacionalidad" value="' + o.nacionalidad + '"disabled></div>'
      fila += '<div class="col-md-6"><br><label for="fechaNacimiento">FECHA DE NACIMIENTO</label><input type="text" style="color:#848484" class="form-control" id="fechaNacimiento" value="' + o.atr_fechaNacimiento + '"disabled></div>'

      $("#modalDetalleTrabajador").append(fila);
    });

  });
}


//SE UTILIZA CUANDO QUIERO EDITAR LA INFORMACIÓN
function getDetalleTrabajadorViewEdit(id) {
  var id = id;
  $.ajax({
    url: 'getDetalleTrabajadorViewEdit',
    type: 'POST',
    dataType: 'json',
    data: { "id": id }
  }).then(function (msg) {
    $("#contenedorDetalleTrabajador").empty();

    var fila = "";
    $.each(msg.msg, function (i, o) {
      fila += '<h5 class="modal-title mx-auto">EDITAR TRABAJADOR</h5><button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>';

      fila += '<div class="col-md-12"><br><label for="rut">RUT:&nbsp;</label><label id="rutActual">' + o.atr_rut + '</label><label id="idTrabajador"  style="color:#2a3f54">' + o.cp_trabajador + '</label><input type="text" style="color:#848484" oninput="checkRutOficial(this)"  onkeyup="this.value=caracteresRUT(this.value)" class="form-control custom-input-sm" id="rutNuevo" ></div>';

      fila += '<div class="col-md-12 col-sm-12"><br><label for="nombres">NOMBRES:&nbsp;</label><label id="nombresActual">' + o.atr_nombres + '</label><input type="text" style="color:#848484" class="form-control" id="nombresNuevo" oninput="mayus(this);" onkeyup="this.value=soloLetras(this.value)"></div>';

      fila += '<div class="col-md-12 col-sm-12"><br><label for="apellidos">APELLIDOS:&nbsp;</label><label id="apellidosActual">' + o.atr_apellidos + '</label><input type="text" style="color:#848484" class="form-control" id="apellidosNuevo" oninput="mayus(this);" onkeyup="this.value=soloLetras(this.value)"></div>';

      fila += '<div class="col-md-12 col-sm-12"><br><label for="direccion">DIRECCIÓN:&nbsp;</label><label id="direccionActual">' + o.atr_direccion + '</label><input type="text" style="color:#848484" class="form-control" id="direccionNuevo" oninput="mayus(this);"></div><br><br>';

      fila += '<div class="col-md-12 col-sm-12" style="display:none"><br><label for="direccion"style="display:none" >SUELDO:&nbsp;</label><label style="display:none" id="sueldoActual">' + o.atr_sueldo + '</label><input type="text" style="color:#848484" class="form-control" id="sueldoNuevo" style="display:none" ></div><br><br>';

      fila += '<div class="col-md-12 col-sm-12"><br><label for="plan">Valor Isapre UF:&nbsp;</label><label id="planActual">' + o.atr_plan + '</label><input type="number" style="color:#848484" class="form-control" id="planNuevo"></div><br><br>';

      fila += '<div class="col-md-12 col-sm-12"><br><label for="cargas">Cantidad Cargas Familiares:&nbsp;</label><label id="cargasActual">' + o.atr_cargas + '</label><input type="number" style="color:#848484" class="form-control" id="cargasNuevo"></div><br><br>';

      //SELECTOR DE CIUDAD
      fila += '<div class="col-md-12"><br><label for="ciudad">CIUDAD / COMUNA:&nbsp;</label><label id="ciudadActual">' + o.ciudad + '</label><select class="custom-select" id="getSelectCiudad2"> '; //<input type="text" style="color:#848484" class="form-control" id="ciudadNuevo"></div>
      url = base_url + 'getCiudades';
      fila += '<option  selected>Seleccione una opción</option>';
      $.getJSON(url, function (result) {
        $.each(result, function (i, o) {
          fila += '<option value="' + o.cp_ciudad + '">' + o.atr_nombre + '</option>';
        });
        fila += '</select></div>'; //cerrando el select

        //SELECTOR DE SUCURSAL
        fila += '<div class="col-md-12"><br><label for="sucursal">SUCURSAL:&nbsp;</label><label id="sucursalActual">' + o.sucursal + '</label><select class="custom-select" id="getSelectSucursal2"> '; //<input type="text" style="color:#848484" class="form-control" id="sucursalNuevo"></div>
        url = base_url + 'getSucursales';
        fila += '<option selected>Seleccione una opción</option>';
        $.getJSON(url, function (result) {
          $.each(result, function (i, o) {
            fila += '<option value="' + o.cp_sucursal + '">' + o.atr_nombre + '</option>';
          });
          fila += '</select></div>'; //cerrando el select


          //SELECTOR DE CARGO
          fila += '<div class="col-md-12"><br><label for="cargo">CARGO:&nbsp;</label><label id="cargoActual">' + o.cargo + '</label> <select class="custom-select" id="getSelectCargo2">'; //<input type="text" style="color:#848484" class="form-control" id="cargoNuevo"></div>
          url = base_url + 'getCargos';
          fila += '<option  selected>Seleccione una opción</option>';
          $.getJSON(url, function (result) {
            $.each(result, function (i, o) {
              fila += '<option value="' + o.cp_cargo + '">' + o.atr_nombre + '</option>';
            });
            fila += '</select></div>'; //cerrando el select



            //SELECTOR DE EMPRESA CONTRATANTE
            fila += '<div class="col-md-12"><br><label for="empresa">EMPRESA CONTRATANTE:&nbsp;</label><label id="empresaContratranteActual">' + o.empresa + '</label>  <select class="custom-select" id="getSelectEmpresa2">'; //<input type="text" style="color:#848484" class="form-control" id="empresaNuevo"></div>

            url = base_url + 'getEmpresas';
            fila += '<option  selected>Seleccione una opción</option>';
            $.getJSON(url, function (result) {
              $.each(result, function (i, o) {
                fila += '<option value="' + o.cp_empresa + '">' + o.atr_nombre + '</option>';
              });
              fila += '</select></div>'; //cerrando el select

              //SELECTOR DE AFP
              fila += '<div class="col-md-12"><br><label for="afp">AFP:&nbsp;</label><label id="afpActual">' + o.afp + '</label>   <select class="custom-select" id="getSelectAFP2">'; //<input type="text" style="color:#848484" class="form-control" id="afpNuevo"></div>

              url = base_url + 'getAFP';
              fila += '<option  selected>Seleccione una opción</option>';
              $.getJSON(url, function (result) {
                $.each(result, function (i, o) {
                  fila += '<option value="' + o.cp_afp + '">' + o.atr_nombre + '</option>';
                });
                fila += '</select></div>'; //cerrando el select

                //SELECTOR DE PREVISIÓN
                fila += '<div class="col-md-12"><br><label for="prevision">PREVISIÓN:&nbsp;</label><label id="previsionActual">' + o.prevision + '</label> <select class="custom-select" id="getSelectPrevision2">'; //<input type="text" style="color:#848484" class="form-control" id="previsionNuevo"></div>

                url = base_url + 'getPrevisiones';
                fila += '<option  selected>Seleccione una opción</option>';
                $.getJSON(url, function (result) {
                  $.each(result, function (i, o) {
                    fila += '<option value="' + o.cp_prevision + '">' + o.atr_nombre + '</option>';
                  });
                  fila += '</select></div>'; //cerrando el select

                  //SELECTOR DE ESTADO DE CONTRATACIÓN
                  fila += '<div class="col-md-12"><br><label for="contrato">ESTADO DE CONTRATACIÓN:&nbsp;</label><label id="estadoActual">' + o.estado + '</label> <select class="custom-select" id="getSelectEstadoContrato2">';

                  url = base_url + 'getEstadosContrato';
                  fila += '<option  selected>Seleccione una opción</option>';
                  $.getJSON(url, function (result) {
                    $.each(result, function (i, o) {
                      fila += '<option value="' + o.cp_estado + '">' + o.atr_nombre + '</option>';
                    });
                    fila += '</select></div>'; //cerrando el select

                    //SELECTOR DE ESTADO CIVIL
                    fila += '<div class="col-md-12"><br><label for="estadocivil">ESTADO CIVIL:&nbsp;</label><label id="estadoCivilActual">' + o.estadocivil + '</label> <select class="custom-select" id="getSelectEstadoCivil2">'; //<input type="text" style="color:#848484" class="form-control" id="estadoCivilNuevo"></div>

                    url = base_url + 'getEstadosCiviles';
                    fila += '<option  selected>Seleccione una opción</option>';
                    $.getJSON(url, function (result) {
                      $.each(result, function (i, o) {
                        fila += '<option value="' + o.cp_estadoCivil + '">' + o.atr_nombre + '</option>';
                      });
                      fila += '</select></div>'; //cerrando el select

                      //SELECTOR DE NACIONALIDAD
                      fila += '<div class="col-md-12"><br><label for="nacionalidad">NACIONALIDAD:&nbsp;</label><label id="nacionalidadActual">' + o.nacionalidad + '</label> <select class="custom-select" id="getSelectNacionalidad2">'; //<input type="text" style="color:#848484" class="form-control" id="nacionalidadNuevo"></div>

                      url = base_url + 'getNacionalidades';
                      fila += '<option  selected>Seleccione una opción</option>';
                      $.getJSON(url, function (result) {
                        $.each(result, function (i, o) {
                          fila += '<option value="' + o.cp_nacionalidad + '">' + o.atr_nombre + '</option>';
                        });
                        fila += '</select></div>'; //cerrando el select

                        fila += '<div class="col-md-12"><br><label for="fechaNacimiento">FECHA DE NACIMIENTO:&nbsp;</label><label id="fechaNacimientoActual">' + o.atr_fechaNacimiento + '</label><input type="date" class="form-control" id="fechaNacimiento2" required>';





                        $("#contenedorDetalleTrabajador").append(fila);
                      }); //fin getJSON Nacionalidad
                    }); //fin getJSON Estado civil
                  }); //fin getJSON Estado de contratación
                }); //fin getJSON Previsión
              }); //fin getJSON AFP
            }); //fin getJSON empresa contratante
          }); //fin getJSON cargo
        }); //fin getJSON sucursal
      }); //fin getJSON ciudad

    }); //fin foreach de creación del contenido del modal
  });
}

function updateTrabajador() {
  var idTrabajador = $("#idTrabajador").text();
  var rut = $("#rutNuevo").val();
  var sueldo = $("#sueldoNuevo").val();
  var nombres = $("#nombresNuevo").val();
  var apellidos = $("#apellidosNuevo").val();
  var direccion = $("#direccionNuevo").val();
  var plan = $("#planNuevo").val();
  var cargas = $("#cargasNuevo").val();
  var ciudad = $("#getSelectCiudad2").val();
  var sucursal = $("#getSelectSucursal2").val();
  var cargo = $("#getSelectCargo2").val();
  var empresa = $("#getSelectEmpresa2").val();
  var afp = $("#getSelectAFP2").val();
  var prevision = $("#getSelectPrevision2").val();
  var estadoContrato = $("#getSelectEstadoContrato2").val();
  var estadoCivil = $("#getSelectEstadoCivil2").val();
  var nacionalidad = $("#getSelectNacionalidad2").val();
  var fechaNacimiento = $("#fechaNacimiento2").val();

  if (rut == "" && nombres == "" && apellidos == "" && direccion == "" && sueldo == "" && plan == "" && cargas == "" && ciudad == null && sucursal == null && cargo == null && empresa == null && afp == null && prevision == null && estadoContrato == null && estadoCivil == null && nacionalidad == null && fechaNacimiento == "") {
    toastr.error("No se ha modificado información.");
    $('#modalEditarTrabajador').modal('hide');
  } else {
    if (rut == "") {
      rut = $("#rutActual").text();
    }
    if (sueldo == "") {
      sueldo = $("#sueldoActual").text();
    }
    if (nombres == "") {
      nombres = $("#nombresActual").text();
    }
    if (apellidos == "") {
      apellidos = $("#apellidosActual").text();
    }
    if (direccion == "") {
      direccion = $("#direccionActual").text();
    }
    if (plan == "") {
      plan = $("#planActual").text();
    }
    if (cargas == "") {
      cargas = $("#cargasActual").text();
    }
    if (ciudad == null || ciudad == "Seleccione una opción") {
      ciudad = $("#ciudadActual").text();
    }
    if (sucursal == null || sucursal == "Seleccione una opción") {
      sucursal = $("#sucursalActual").text();
    }
    if (cargo == null || cargo == "Seleccione una opción") {
      cargo = $("#cargoActual").text();
    }
    if (empresa == null || empresa == "Seleccione una opción") {
      empresa = $("#empresaContratranteActual").text();
    }
    if (afp == null || afp == "Seleccione una opción") {
      afp = $("#afpActual").text();
    }
    if (prevision == null || prevision == "Seleccione una opción") {
      prevision = $("#previsionActual").text();
    }
    if (estadoContrato == null || estadoContrato == "Seleccione una opción") {
      estadoContrato = $("#estadoActual").text();
    }
    if (estadoCivil == null || estadoCivil == "Seleccione una opción") {
      estadoCivil = $("#estadoCivilActual").text();
    }
    if (nacionalidad == null || nacionalidad == "Seleccione una opción") {
      nacionalidad = $("#nacionalidadActual").text();
    }
    if (fechaNacimiento == "") {
      fechaNacimiento = $("#fechaNacimientoActual").text();
    }




  }

  $.ajax({
    url: 'updateTrabajador',
    type: 'POST',
    dataType: 'json',
    data: { "idTrabajador": idTrabajador, "sueldo": sueldo, "rut": rut, "nombres": nombres, "apellidos": apellidos, "direccion": direccion, "ciudad": ciudad, "sucursal": sucursal, "cargo": cargo, "empresa": empresa, "afp": afp, "prevision": prevision, "estadoContrato": estadoContrato, "estadoCivil": estadoCivil, "nacionalidad": nacionalidad, "fechaNacimiento": fechaNacimiento, "plan": plan, "cargas": cargas }
  }).then(function (msg) {
    if (msg == "ok") {
      toastr.success("Información actualizada.");
      $('#modalEditarTrabajador').modal('hide');
    }

  });
  // var permisoEditar = $("#permisoEditar").text();
  // var permisoExportar = $("#permisoExportar").text();
  // cargarTablaTrabajador(permisoEditar, permisoExportar);
}
function getRemuneracionTrabajadorViewEdit(id) {
  var id = id;
  $.ajax({
    url: 'getRemuneracionTrabajadorViewEdit',
    type: 'POST',
    dataType: 'json',
    data: { "id": id }
  }).then(function (msg) {
    $("#contenedorDetalleRemuneracionTrabajador").empty();

    var fila = "";
    $.each(msg.msg, function (i, o) {
      fila += '<h5 class="modal-title mx-auto">EDITAR REMUNERACION</h5><button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>';
      fila +=
        '<div class="col-md-12"><br><label for="nombre">Sueldo mensual:&nbsp;$ </label><label id="sueldoMensualActual">' +
        o.atr_sueldoMensual +
        '</label><input type="text" onkeyup="this.value=soloNumeros(this.value); formatoMiles(this);" class="form-control custom-input-sm" id="sueldoMensualNuevo"></div>';

      fila +=
        '<div class="col-md-12"><br><label for="nombre">Colación:&nbsp;$ </label><label id="colacionActual">' +
        o.atr_colacion +
        '</label><input type="text" class="form-control custom-input-sm" onkeyup="this.value=soloNumeros(this.value); formatoMiles(this);" id="colacionNuevo"></div>';

      fila +=
        '<div class="col-md-12"><br><label for="nombre">Movilización:&nbsp; $</label><label id="movilizacionActual">' +
        o.atr_movilizacion +
        '</label><input type="text" class="form-control custom-input-sm" onkeyup="this.value=soloNumeros(this.value); formatoMiles(this);" id="movilizacionNuevo"></div>';
      fila +=
        '<div class="col-md-12"><br><label for="nombre">Asistencia:&nbsp; $</label><label id="asistenciaActual">' +
        o.atr_asistencia +
        '</label><input type="text" class="form-control custom-input-sm" onkeyup="this.value=soloNumeros(this.value); formatoMiles(this);" id="asistenciaNuevo"></div>';
      fila +=
        '<input type="text" class="form-control custom-input-sm" id="idTrabajador" hidden="true" disabled value="' + o.cp_trabajador + '"></div>';





      $("#contenedorDetalleRemuneracionTrabajador").append(fila);


    }); //fin foreach de creación del contenido del modal
  });
}
function updateRemuneracionTrabajador() {
  var idTrabajador = $("#idTrabajador").val();
  var sueldoMensual = $("#sueldoMensualNuevo").val();
  var colacion = $("#colacionNuevo").val();
  var movilizacion = $("#movilizacionNuevo").val();

  var asistencia = $("#asistenciaNuevo").val();

  if (
    sueldoMensual == "" &&
    colacion == "" &&
    movilizacion == "" &&

    asistencia == ""
  ) {
    // SI ENTRA AQUI ES PORQUE NO SE MODIFICO NINGUN DATO, POR ENDE NO SE EJECUTA NADA MAS.
  } else {
    // VALIDACIÓN DE CAMPOS DE TEXTO VACIOS. Si los campos son vacios se mantiene el valor original en la base de datos.
    if (sueldoMensual == "") {
      sueldoMensual = $("#sueldoMensualActual").text();
    }
    if (colacion == "") {
      colacion = $("#colacionActual").text();
    }
    if (movilizacion == "") {
      movilizacion = $("#movilizacionActual").text();
    }
    if (asistencia == "") {
      asistencia = $("#asistenciaActual").text();
    }
    // ACTUALIZACION DE CARGOS
    $.ajax({
      url: "updateRemuneracionTrabajador",
      type: "POST",
      dataType: "json",
      data: {
        idTrabajador: idTrabajador,
        sueldoMensual: sueldoMensual,
        colacion: colacion,
        movilizacion: movilizacion,

        asistencia: asistencia,
      },
    }).then(function (msg) {
      if (msg == "ok") {
      } else {
        // toastr.error('Ha ocurrido un error, favor contáctese con el soporte.');
      }
    });
    toastr.success("Remuneracion actualizada");
    $("#modalEditarRemuneracionTrabajador").modal("hide");
  }

  // ACTUALIZACION DE OTRAS REMUNERACIONES EXISTENTES
  /* var identificadorInput = "";
  var remuneracion = "",
    cnt = 1;
  var cantidadIngresoExitoso = 0;

  // Recorrer eL listado de remuneraciones creadas
  for (var i = 0; i < constanteRemuneraciones; i++) {
    //genero el id del input
    identificadorInputActual = "remuneracionActual_" + cnt;

    identificadorInputNuevo = "remuneracionNuevo_" + cnt;
    //controlo el autoincrementable del id de los inputs generados
    cnt = cnt + 1;

    var descripcionNueva = $("#" + identificadorInputNuevo).val();

    if (descripcionNueva == "" || descripcionNueva == null) {
    } else {
      var descripcionActual = $("#" + identificadorInputActual).text();

      $.ajax({
        url: "updateRemuneracionExtra",
        type: "POST",
        dataType: "json",
        data: {
          descripcionActual: descripcionActual,
          descripcionNueva: descripcionNueva,
          idCargo: id,
        },
      }).then(function (msg) {
        toastr.success("Remuneración extra actualizada");
      });
    } }*/


  // ADICIÓN DE NUEVAS RESPONSABILIDADES

  /* identificadorInput = "";
  (remuneracion = ""), (cnt = 1);
  cantidadIngresoExitoso = 0;
  
  // Recorrer eL listado de tareas creadas
  for (var i = 0; i < constante; i++) {
    //genero el id del input
    identificadorInput = "input_tarea" + cnt;
    //controlo el autoincrementable del id de los inputs generados
    cnt = cnt + 1;
  
    var remuneracion = $("#" + identificadorInput).val();
    // alert("responsabilidad: "+responsabilidad);
    if (remuneracion != "") {
      $.ajax({
        url: "addRemuneracionPorIDCargo",
        type: "POST",
        dataType: "json",
        data: { remuneracion: remuneracion, cargo: id },
      }).then(function (msg) {
        if (msg.msg == "ok") {
          toastr.success("Remuneración extra agregada");
        } else {
          // toastr.error('Ha ocurrido un error, favor contáctese con el soporte.');
        }
      });
    }
  } */


  //getDetalleRemuneracion($("#idCargo").text());
  // $('#modalEditarRemuneración').modal('hide');
}
