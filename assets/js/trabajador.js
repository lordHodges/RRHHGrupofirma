/*************************** TRABAJADOR ****************************/
var base_url = 'http://localhost/grupofirma/index.php/';

function cargarTablaTrabajador(permisoEditar, permisoExportar){
  var table = $('#tabla_trabajador').DataTable();
  table.destroy();

  permisoEditar = $("#permisoEditar").text();

  var btnAcciones = "";

  btnAcciones = '<button style="display:inline" type="button" id="btnVerTrabajador" class="btn btn-info btn-sm" data-toggle="modal" data-target="#modalVerTrabajador"><i class="glyphicon glyphicon-eye-open"></i></button>';


  if (permisoEditar == "si") {
    btnAcciones += '<button style="display:inline" type="button" id="getDetalleTrabajadorViewEdit" class="btn btn-info btn-sm" data-toggle="modal" data-target="#modalEditarTrabajador"><i class="glyphicon glyphicon-pencil"></i></button>';
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
              url: "http://localhost/grupofirma/index.php/getListadoTrabajadores",
              type: 'GET'
          },
          "columnDefs": [{
                  "targets": 8,
                  "data": null,
                  "defaultContent": btnAcciones
              }

          ],dom: '<"html5buttons"B>lTfgitp',
            buttons: [
                {
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
                    title: 'Grupo Firma',
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
            ],
            "lengthMenu": [[100, 50, 25, -1], [100, 50, 25, "All"]],
      });
  }else{
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
              url: "http://localhost/grupofirma/index.php/getListadoTrabajadores",
              type: 'GET'
          },
          "columnDefs": [{
                  "targets": 8,
                  "data": null,
                  "defaultContent": btnAcciones
              }

          ],dom: '<"html5buttons"B>lTfgitp',
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

    if (rut == "" || nombres == "" || apellidos == "" || direccion == "" || ciudad == null || cargo == null || fechaNacimiento == null ||sucursal == null || empresa == null || afp == null || prevision == null || estadoContrato == null || nacionalidad == null) {
        toastr.error("Rellene todos los campos");
    } else {
        $.ajax({
            url: 'addTrabajador',
            type: 'POST',
            dataType: 'json',
            data: { "rut":rut,
                    "nombres": nombres,
                    "apellidos": apellidos,
                    "fecha": fechaNacimiento,
                    "direccion": direccion,
                    "fechaNacimiento":fechaNacimiento,
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
function getDetalleTrabajador(id){

  var id = id;
  $.ajax({
      url: 'getDetalleTrabajador',
      type: 'POST',
      dataType: 'json',
      data: {"id": id}
  }).then(function (msg) {

      $("#modalDetalleTrabajador").empty();

      var fila = "";
      $.each(msg.msg, function (i, o) {

          fila +='<div class="col-md-12"><br><label for="rut">RUT</label><input type="text" style="color:#848484" class="form-control custom-input-sm" id="rut" value="'+o.atr_rut+'" disabled></div>';
          fila +='<div class="col-md-6 col-sm-12"><br><label for="nombres">NOMBRES</label><input type="text" style="color:#848484" class="form-control" id="nombres" value="'+o.atr_nombres+'"  disabled></div>';
          fila +='<div class="col-md-6 col-sm-12"><br><label for="apellidos">APELLIDOS</label><input type="text" style="color:#848484" class="form-control" id="apellidos" value="'+o.atr_apellidos+'"disabled></div>';
          fila +='<div class="col-md-12 col-sm-12"><br><label for="direccion">DIRECCIÓN</label><input type="text" style="color:#848484" class="form-control" id="direccion" value="'+o.atr_direccion+'"disabled></div><br><br>';
          fila +='<div class="col-md-12 col-sm-12"><br><label for="direccion">SUELDO</label><input type="text" style="color:#848484" class="form-control" id="sueldo" value="'+o.atr_sueldo+'"disabled></div><br><br>';
          fila +='<div class="col-md-6"><br><label for="ciudad">CIUDAD / COMUNA</label><input type="text" style="color:#848484" class="form-control" id="ciudad" value="'+o.ciudad+'"disabled></div>';
          fila +='<div class="col-md-6"><br><label for="sucursal">SUCURSAL</label><input type="text" style="color:#848484" class="form-control" id="sucursal" value="'+o.sucursal+'"disabled></div>'
          fila +='<div class="col-md-6"><br><label for="cargo">CARGO</label> <input type="text" style="color:#848484" class="form-control" id="cargo" value="'+o.cargo+'"disabled></div>'
          fila +='<div class="col-md-6"><br><label for="empresa">EMPRESA CONTRATANTE</label><input type="text" style="color:#848484" class="form-control" id="empresa" value="'+o.empresa+'"disabled></div>'
          fila +='<div class="col-md-6"><br><label for="afp">AFP</label><input type="text" style="color:#848484" class="form-control" id="afp" value="'+o.afp+'"disabled></div>'
          fila +='<div class="col-md-6"><br><label for="prevision">PREVISIÓN</label><input type="text" style="color:#848484" class="form-control" id="prevision" value="'+o.prevision+'"disabled></div>'
          fila +='<div class="col-md-6"><br><label for="contrato">ESTADO DE CONTRATACIÓN</label><input type="text" style="color:#848484" class="form-control" id="contrato" value="'+o.estado+'"disabled></div>'
          fila +='<div class="col-md-6"><br><label for="estadocivil">ESTADO CIVIL</label><input type="text" style="color:#848484" class="form-control" id="estadocivil" value="'+o.estadocivil+'"disabled></div>'
          fila +='<div class="col-md-6"><br><label for="nacionalidad">NACIONALIDAD</label><input type="text" style="color:#848484" class="form-control" id="nacionalidad" value="'+o.nacionalidad+'"disabled></div>'
          fila +='<div class="col-md-6"><br><label for="fechaNacimiento">FECHA DE NACIMIENTO</label><input type="text" style="color:#848484" class="form-control" id="fechaNacimiento" value="'+o.atr_fechaNacimiento+'"disabled></div>'

          $("#modalDetalleTrabajador").append(fila);
      });

  });
}


//SE UTILIZA CUANDO QUIERO EDITAR LA INFORMACIÓN
function getDetalleTrabajadorViewEdit(id){
  var id = id;
  $.ajax({
      url: 'getDetalleTrabajadorViewEdit',
      type: 'POST',
      dataType: 'json',
      data: {"id": id}
  }).then(function (msg) {
      $("#contenedorDetalleTrabajador").empty();

      var fila = "";
      $.each(msg.msg, function (i, o) {
        fila +='<h5 class="modal-title mx-auto">EDITAR TRABAJADOR</h5><button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>';
          fila +='<div class="col-md-12"><br><label for="rut">RUT:&nbsp;</label><label id="rutActual">'+o.atr_rut+'</label><label id="idTrabajador"  style="color:#2a3f54">'+o.cp_trabajador+'</label><input type="text" style="color:#848484" oninput="checkRutOficial(this)"  onkeyup="this.value=caracteresRUT(this.value)" class="form-control custom-input-sm" id="rutNuevo" ></div>';

          fila +='<div class="col-md-12 col-sm-12"><br><label for="nombres">NOMBRES:&nbsp;</label><label id="nombresActual">'+o.atr_nombres+'</label><input type="text" style="color:#848484" class="form-control" id="nombresNuevo" oninput="mayus(this);" onkeyup="this.value=soloLetras(this.value)"></div>';

          fila +='<div class="col-md-12 col-sm-12"><br><label for="apellidos">APELLIDOS:&nbsp;</label><label id="apellidosActual">'+o.atr_apellidos+'</label><input type="text" style="color:#848484" class="form-control" id="apellidosNuevo" oninput="mayus(this);" onkeyup="this.value=soloLetras(this.value)"></div>';

          fila +='<div class="col-md-12 col-sm-12"><br><label for="direccion">DIRECCIÓN:&nbsp;</label><label id="direccionActual">'+o.atr_direccion+'</label><input type="text" style="color:#848484" class="form-control" id="direccionNuevo" oninput="mayus(this);"></div><br><br>';

          fila +='<div class="col-md-12 col-sm-12"><br><label for="direccion">SUELDO:&nbsp;</label><label id="sueldoActual">'+o.atr_sueldo+'</label><input type="text" style="color:#848484" class="form-control" id="sueldoNuevo" oninput="mayus(this);"></div><br><br>';

          //SELECTOR DE CIUDAD
          fila +='<div class="col-md-12"><br><label for="ciudad">CIUDAD / COMUNA:&nbsp;</label><label id="ciudadActual">'+o.ciudad+'</label><select class="custom-select" id="getSelectCiudad2"> '; //<input type="text" style="color:#848484" class="form-control" id="ciudadNuevo"></div>
          url = base_url+'getCiudades';
          fila +='<option  selected>Seleccione una opción</option>';
          $.getJSON(url, function (result) {
              $.each(result, function (i, o) {
                  fila += '<option value="'+ o.cp_ciudad + '">' + o.atr_nombre + '</option>';
              });
              fila +='</select></div>'; //cerrando el select

              //SELECTOR DE SUCURSAL
              fila +='<div class="col-md-12"><br><label for="sucursal">SUCURSAL:&nbsp;</label><label id="sucursalActual">'+o.sucursal+'</label><select class="custom-select" id="getSelectSucursal2"> '; //<input type="text" style="color:#848484" class="form-control" id="sucursalNuevo"></div>
              url = base_url+'getSucursales';
              fila +='<option selected>Seleccione una opción</option>';
              $.getJSON(url, function (result) {
                $.each(result, function (i, o) {
                    fila += '<option value="'+ o.cp_sucursal + '">' + o.atr_nombre + '</option>';
                });
                fila +='</select></div>'; //cerrando el select


                //SELECTOR DE CARGO
                fila +='<div class="col-md-12"><br><label for="cargo">CARGO:&nbsp;</label><label id="cargoActual">'+o.cargo+'</label> <select class="custom-select" id="getSelectCargo2">'; //<input type="text" style="color:#848484" class="form-control" id="cargoNuevo"></div>
                url = base_url+'getCargos';
                fila +='<option  selected>Seleccione una opción</option>';
                $.getJSON(url, function (result) {
                  $.each(result, function (i, o) {
                      fila += '<option value="'+ o.cp_cargo + '">' + o.atr_nombre + '</option>';
                  });
                  fila +='</select></div>'; //cerrando el select



                  //SELECTOR DE EMPRESA CONTRATANTE
                  fila +='<div class="col-md-12"><br><label for="empresa">EMPRESA CONTRATANTE:&nbsp;</label><label id="empresaContratranteActual">'+o.empresa+'</label>  <select class="custom-select" id="getSelectEmpresa2">'; //<input type="text" style="color:#848484" class="form-control" id="empresaNuevo"></div>

                  url = base_url+'getEmpresas';
                  fila +='<option  selected>Seleccione una opción</option>';
                  $.getJSON(url, function (result) {
                    $.each(result, function (i, o) {
                        fila += '<option value="'+ o.cp_empresa + '">' + o.atr_nombre + '</option>';
                    });
                    fila +='</select></div>'; //cerrando el select

                    //SELECTOR DE AFP
                    fila +='<div class="col-md-12"><br><label for="afp">AFP:&nbsp;</label><label id="afpActual">'+o.afp+'</label>   <select class="custom-select" id="getSelectAFP2">'; //<input type="text" style="color:#848484" class="form-control" id="afpNuevo"></div>

                    url = base_url+'getAFP';
                    fila +='<option  selected>Seleccione una opción</option>';
                    $.getJSON(url, function (result) {
                      $.each(result, function (i, o) {
                          fila += '<option value="'+ o.cp_afp + '">' + o.atr_nombre + '</option>';
                      });
                      fila +='</select></div>'; //cerrando el select

                      //SELECTOR DE PREVISIÓN
                      fila +='<div class="col-md-12"><br><label for="prevision">PREVISIÓN:&nbsp;</label><label id="previsionActual">'+o.prevision+'</label> <select class="custom-select" id="getSelectPrevision2">' ; //<input type="text" style="color:#848484" class="form-control" id="previsionNuevo"></div>

                      url = base_url+'getPrevisiones';
                      fila +='<option  selected>Seleccione una opción</option>';
                      $.getJSON(url, function (result) {
                        $.each(result, function (i, o) {
                            fila += '<option value="'+ o.cp_prevision+ '">' + o.atr_nombre + '</option>';
                        });
                        fila +='</select></div>'; //cerrando el select

                        //SELECTOR DE ESTADO DE CONTRATACIÓN
                        fila +='<div class="col-md-12"><br><label for="contrato">ESTADO DE CONTRATACIÓN:&nbsp;</label><label id="estadoActual">'+o.estado+'</label> <select class="custom-select" id="getSelectEstadoContrato2">';

                        url = base_url+'getEstadosContrato';
                        fila +='<option  selected>Seleccione una opción</option>';
                        $.getJSON(url, function (result) {
                          $.each(result, function (i, o) {
                              fila += '<option value="'+ o.cp_estado + '">' + o.atr_nombre + '</option>';
                          });
                          fila +='</select></div>'; //cerrando el select

                          //SELECTOR DE ESTADO CIVIL
                          fila +='<div class="col-md-12"><br><label for="estadocivil">ESTADO CIVIL:&nbsp;</label><label id="estadoCivilActual">'+o.estadocivil+'</label> <select class="custom-select" id="getSelectEstadoCivil2">'; //<input type="text" style="color:#848484" class="form-control" id="estadoCivilNuevo"></div>

                          url = base_url+'getEstadosCiviles';
                          fila +='<option  selected>Seleccione una opción</option>';
                          $.getJSON(url, function (result) {
                            $.each(result, function (i, o) {
                                fila += '<option value="'+ o.cp_estadoCivil + '">' + o.atr_nombre + '</option>';
                            });
                            fila +='</select></div>'; //cerrando el select

                            //SELECTOR DE NACIONALIDAD
                            fila +='<div class="col-md-12"><br><label for="nacionalidad">NACIONALIDAD:&nbsp;</label><label id="nacionalidadActual">'+o.nacionalidad+'</label> <select class="custom-select" id="getSelectNacionalidad2">' ; //<input type="text" style="color:#848484" class="form-control" id="nacionalidadNuevo"></div>

                            url = base_url+'getNacionalidades';
                            fila +='<option  selected>Seleccione una opción</option>';
                            $.getJSON(url, function (result) {
                              $.each(result, function (i, o) {
                                  fila += '<option value="'+ o.cp_nacionalidad + '">' + o.atr_nombre + '</option>';
                              });
                              fila +='</select></div>'; //cerrando el select

                              fila +='<div class="col-md-12"><br><label for="fechaNacimiento">FECHA DE NACIMIENTO:&nbsp;</label><label id="fechaNacimientoActual">'+o.atr_fechaNacimiento+'</label><input type="date" class="form-control" id="fechaNacimiento2" required>';





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
  var ciudad = $("#getSelectCiudad2").val();
  var sucursal = $("#getSelectSucursal2").val();
  var cargo =  $("#getSelectCargo2").val();
  var empresa = $("#getSelectEmpresa2").val();
  var afp = $("#getSelectAFP2").val();
  var prevision = $("#getSelectPrevision2").val();
  var estadoContrato = $("#getSelectEstadoContrato2").val();
  var estadoCivil = $("#getSelectEstadoCivil2").val();
  var nacionalidad = $("#getSelectNacionalidad2").val();
  var fechaNacimiento =  $("#fechaNacimiento2").val();

  if( rut == "" && nombres == "" && apellidos == "" && direccion == "" && sueldo == "" &&  ciudad == null && sucursal == null && cargo == null && empresa == null && afp == null && prevision == null && estadoContrato == null && estadoCivil == null && nacionalidad == null && fechaNacimiento == ""){
    toastr.error("No se ha modificado información.");
    $('#modalEditarTrabajador').modal('hide');
  }else{
    if( rut == ""){
      rut = $("#rutActual").text();
    }
    if( sueldo == ""){
      sueldo = $("#sueldoActual").text();
    }
    if( nombres == ""){
      nombres = $("#nombresActual").text();
    }
    if(apellidos == ""){
      apellidos = $("#apellidosActual").text();
    }
    if( direccion == ""){
      direccion = $("#direccionActual").text();
    }
    if( ciudad == null || ciudad == "Seleccione una opción"){
      ciudad = $("#ciudadActual").text();
    }
    if( sucursal == null || sucursal == "Seleccione una opción"){
      sucursal = $("#sucursalActual").text();
    }
    if( cargo == null || cargo == "Seleccione una opción"){
      cargo = $("#cargoActual").text();
    }
    if( empresa == null || empresa == "Seleccione una opción"){
      empresa = $("#empresaContratranteActual").text();
    }
    if( afp == null || afp == "Seleccione una opción" ){
      afp = $("#afpActual").text();
    }
    if( prevision == null || prevision == "Seleccione una opción"){
      prevision = $("#previsionActual").text();
    }
    if( estadoContrato == null || estadoContrato == "Seleccione una opción"){
      estadoContrato = $("#estadoActual").text();
    }
    if( estadoCivil == null || estadoCivil == "Seleccione una opción"){
      estadoCivil = $("#estadoCivilActual").text();
    }
    if( nacionalidad == null || nacionalidad == "Seleccione una opción"){
      nacionalidad = $("#nacionalidadActual").text();
    }
    if( fechaNacimiento == ""){
      fechaNacimiento = $("#fechaNacimientoActual").text();
    }




  }

  $.ajax({
      url: 'updateTrabajador',
      type: 'POST',
      dataType: 'json',
      data: { "idTrabajador": idTrabajador, "sueldo":sueldo,  "rut":rut, "nombres":nombres, "apellidos":apellidos, "direccion":direccion, "ciudad":ciudad, "sucursal":sucursal, "cargo":cargo, "empresa":empresa, "afp":afp, "prevision":prevision, "estadoContrato":estadoContrato, "estadoCivil":estadoCivil, "nacionalidad":nacionalidad, "fechaNacimiento":fechaNacimiento }
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
