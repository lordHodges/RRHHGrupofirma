var base_url = 'http://localhost/FA_RECURSOS-HUMANOS/';

/*************************** TRABAJADOR ****************************/

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

    if (rut == "" || nombres == "" || apellidos == "" || direccion == "" || ciudad == null || cargo == null || fechaNacimiento == null ||sucursal == null || empresa == null || afp == null || prevision == null || estadoContrato == null || estadoCivil == null || nacionalidad == null) {
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
            if (msg.msg == "ok") {
               toastr.success('Trabajador ingresado')
               document.getElementById("rut").value = "";
               document.getElementById("nombres").value = "";
               document.getElementById("apellidos").value = "";
               document.getElementById("direccion").value = "";
               document.getElementById("getSelectCiudad").value = "";
               document.getElementById("getSelectCargo").value = "";
               document.getElementById("getSelectSucursal").value = "";
               document.getElementById("fechaNacimiento").value = "";
               document.getElementById("empresa").value = "";
               document.getElementById("prevision").value = "";
               document.getElementById("estadoContrato").value = "";
               document.getElementById("estadoCivil").value = "";
               document.getElementById("nacionalidad").value = "";
               $('#myModal').modal('hide');
            } else {
                toastr.error("Error en el ingreso.");
            }
        });
    }
}


function editarTrabajador(rut) {
  var id = id;
  if (id == "") {
      toastr.error("Verifique todos los campos")
  } else {
      $.ajax({
          url: 'editarTrabajador',
          type: 'POST',
          dataType: 'json',
          data: { "id": id }
      }).then(function (msg) {
          if (msg.msg == "ok") {
              toastr.success("Trabajador actualizado.");
          } else {
              toastr.error("", "Error al actualizar trabajador.")
              // toastr.options = { "closeButton": true, "debug": false, "progressBar": true, "preventDuplicates": false, "positionClass": "toast-top-right", "onclick": null, "showDuration": "400", "hideDuration": "1000", "timeOut": "4000", "extendedTimeOut": "1000", "showEasing": "swing", "hideEasing": "swing", "showMethod": "show", "hideMethod": "fadeOut" }
          }
      });
  }
}

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
          fila +='<div class="col-md-6 col-sm-12"><br><label for="nombres">NOMBRES</label><input type="text" style="color:#848484" class="form-control" id="nombres" value="'+o.atr_nombres+'" disabled></div>';
          fila +='<div class="col-md-6 col-sm-12"><br><label for="apellidos">APELLIDOS</label><input type="text" style="color:#848484" class="form-control" id="apellidos" value="'+o.atr_apellidos+'"disabled></div>';
          fila +='<div class="col-md-12 col-sm-12"><br><label for="direccion">DIRECCIÓN</label><input type="text" style="color:#848484" class="form-control" id="direccion" value="'+o.atr_direccion+'"disabled></div><br><br>';
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



/*************************** RELLENO DE SELECTS ****************************/


function getSelectCiudad(){

    var url = base_url+'getCiudades';
    $("#getSelectCiudad").empty();
    var fila = "<option disabled selected>Seleccione una opción</option>";
    $.getJSON(url, function (result) {
        $.each(result, function (i, o) {
            fila += "<option value='" + o.cp_ciudad + "'>" + o.atr_nombre + "</option>";
        });
        $("#getSelectCiudad").append(fila);
    });
}

function getSelectCargos(){

    var url = base_url+'getCargos';
    $("#getSelectCargo").empty();
    var fila = "<option disabled selected>Seleccione una opción</option>";
    $.getJSON(url, function (result) {
        $.each(result, function (i, o) {
            fila += "<option value='" + o.cp_cargo + "'>" + o.atr_nombre + "</option>";
        });
        $("#getSelectCargo").append(fila);
    });
}

function getSucursales(){

    var url = base_url+'getSucursales';
    $("#getSelectSucursal").empty();
    var fila = "<option disabled selected>Seleccione una opción</option>";
    $.getJSON(url, function (result) {
        $.each(result, function (i, o) {
            fila += "<option value='" + o.cp_sucursal + "'>" + o.atr_nombre + "</option>";
        });
        $("#getSelectSucursal").append(fila);
    });
}

function getEmpresas(){

    var url = base_url+'getEmpresas';
    $("#getSelectEmpresa").empty();
    var fila = "<option disabled selected>Seleccione una opción</option>";
    $.getJSON(url, function (result) {
        $.each(result, function (i, o) {
            fila += "<option value='" + o.cp_empresa + "'>" + o.atr_nombre + "</option>";
        });
        $("#getSelectEmpresa").append(fila);
    });
}

function getAFP(){

    var url = base_url+'getAFP';
    $("#getSelectAFP").empty();
    var fila = "<option disabled selected>Seleccione una opción</option>";
    $.getJSON(url, function (result) {
        $.each(result, function (i, o) {
            fila += "<option value='" + o.cp_afp + "'>" + o.atr_nombre + "</option>";
        });
        $("#getSelectAFP").append(fila);
    });
}

function getPrevisiones(){

    var url = base_url+'getPrevisiones';
    $("#getSelectPrevision").empty();
    var fila = "<option disabled selected>Seleccione una opción</option>";
    $.getJSON(url, function (result) {
        $.each(result, function (i, o) {
            fila += "<option value='" + o.cp_prevision + "'>" + o.atr_nombre + "</option>";
        });
        $("#getSelectPrevision").append(fila);
    });
}

function getEstadosContrato(){

    var url = base_url+'getEstadosContrato';
    $("#getSelectEstadoContrato").empty();
    var fila = "<option disabled selected>Seleccione una opción</option>";
    $.getJSON(url, function (result) {
        $.each(result, function (i, o) {
            fila += "<option value='" + o.cp_estado + "'>" + o.atr_nombre + "</option>";
        });
        $("#getSelectEstadoContrato").append(fila);
    });
}

function getEstadosCiviles(){

    var url = base_url+'getEstadosCiviles';
    $("#getSelectCivil").empty();
    var fila = "<option disabled selected>Seleccione una opción</option>";
    $.getJSON(url, function (result) {
        $.each(result, function (i, o) {
            fila += "<option value='" + o.cp_estadoCivil+ "'>" + o.atr_nombre + "</option>";
        });
        $("#getSelectCivil").append(fila);
    });
}

function getNacionalidades(){

    var url = base_url+'getNacionalidades';
    $("#getSelectNacionalidad").empty();
    var fila = "<option disabled selected>Seleccione una opción</option>";
    $.getJSON(url, function (result) {
        $.each(result, function (i, o) {
            fila += "<option value='" + o.cp_nacionalidad+ "'>" + o.atr_nombre + "</option>";
        });
        $("#getSelectNacionalidad").append(fila);
    });
}



/*************************** MANTENEDORES ****************************/


function agregarCiudad() {
    var nombre = $("#nombre").val();
    if (nombre == "" ) {
        toastr.error("Rellene todos los campos");
    } else {
        $.ajax({
            url: 'addCiudad',
            type: 'POST',
            dataType: 'json',
            data: { "nombre":nombre }
        }).then(function (msg) {
            if (msg.msg == "ok") {
               toastr.success('Ciudad ingresada')
               document.getElementById("nombre").value = "";
               $('#myModal').modal('hide');
            } else {
                toastr.error("Error en el ingreso.");
            }
        });
    }
}

function agregarSucursal() {
    var nombre = $("#nombre").val();
    if (nombre == "" ) {
        toastr.error("Rellene todos los campos");
    } else {
        $.ajax({
            url: 'addSucursal',
            type: 'POST',
            dataType: 'json',
            data: { "nombre":nombre }
        }).then(function (msg) {
            if (msg.msg == "ok") {
               toastr.success('Sucursal ingresada')
               document.getElementById("nombre").value = "";
               $('#myModal').modal('hide');
            } else {
                toastr.error("Error en el ingreso.");
            }
        });
    }
}



function agregarEstadoCivil() {
    var nombre = $("#nombre").val();
    if (nombre == "" ) {
        toastr.error("Rellene todos los campos");
    } else {
        $.ajax({
            url: 'addEstadoCivil',
            type: 'POST',
            dataType: 'json',
            data: { "nombre":nombre }
        }).then(function (msg) {
            if (msg.msg == "ok") {
               toastr.success('Estado Civil ingresado')
               document.getElementById("nombre").value = "";
               $('#myModal').modal('hide');
            } else {
                toastr.error("Error en el ingreso.");
            }
        });
    }
}


function agregarAFP() {
    var nombre = $("#nombre").val();
    if (nombre == "" ) {
        toastr.error("Rellene todos los campos");
    } else {
        $.ajax({
            url: 'addAFP',
            type: 'POST',
            dataType: 'json',
            data: { "nombre":nombre }
        }).then(function (msg) {
            if (msg.msg == "ok") {
               toastr.success('AFP ingresada')
               document.getElementById("nombre").value = "";
               $('#myModal').modal('hide');
            } else {
                toastr.error("Error en el ingreso.");
            }
        });
    }
}

function getDetalleAFP(id){
  var afp = id;
  $.ajax({
      url: 'getDetalleAFP',
      type: 'POST',
      dataType: 'json',
      data: {"afp": afp}
  }).then(function (msg) {
      $("#modalDetalleAFP").empty();
      var fila = "";
      $.each(msg.msg, function (i, o) {
        fila += '<label value="'+o.cp_afp+'"></label>'
        fila += '<div class="col-md-12"><br><label for="nombre">NOMBRE: &nbsp;&nbsp;</label><label id="nombreAntiguo"> '+o.atr_nombre+' </label> <label id="idAFP" style="color:#2a3f54">'+o.cp_afp+'</label> <input type="text" placeholder="Ingrese nuevo nombre" style="color:#848484" class="form-control custom-input-sm" id="nombreNuevo"></div>';
        $("#modalDetalleAFP").append(fila);
      });
  });
}


function editarAFP(id) {
    var idAFP = $("#idAFP").text();
    var nombreNuevo = $("#nombreNuevo").val();

    if (nombreNuevo == "" ) {
        toastr.error("Rellene todos los campos");
    } else {
        $.ajax({
            url: 'updateAFP',
            type: 'POST',
            dataType: 'json',
            data: { "nombreNuevo":nombreNuevo,
                    "idAFP":idAFP}
        }).then(function (msg) {
            if (msg.msg == "ok") {
               toastr.success('AFP modificada')
               document.getElementById("nombreNuevo").value = "";
               document.getElementById("nombreAntiguo").value = "";
               $('#modaleditarAFP').modal('hide');
            } else {
                toastr.error("Error en el ingreso.");
            }
        });
    }

}



function agregarNacionalidad() {
    var nombre = $("#nombre").val();
    if (nombre == "" ) {
        toastr.error("Rellene todos los campos");
    } else {
        $.ajax({
            url: 'addNacionalidad',
            type: 'POST',
            dataType: 'json',
            data: { "nombre":nombre }
        }).then(function (msg) {
            if (msg.msg == "ok") {
               toastr.success('Nacionalidad ingresada')
               document.getElementById("nombre").value = "";
               $('#myModal').modal('hide');
            } else {
                toastr.error("Error en el ingreso.");
            }
        });
    }
}

function agregarEstadoContrato() {
    var nombre = $("#nombre").val();
    if (nombre == "" ) {
        toastr.error("Rellene todos los campos");
    } else {
        $.ajax({
            url: 'addEstadoContrato',
            type: 'POST',
            dataType: 'json',
            data: { "nombre":nombre }
        }).then(function (msg) {
            if (msg.msg == "ok") {
               toastr.success('Estado ingresado')
               document.getElementById("nombre").value = "";
               $('#myModal').modal('hide');
            } else {
                toastr.error("Error en el ingreso.");
            }
        });
    }
}

function agregarPrevision() {
    var nombre = $("#nombre").val();
    if (nombre == "" ) {
        toastr.error("Rellene todos los campos");
    } else {
        $.ajax({
            url: 'addPrevision',
            type: 'POST',
            dataType: 'json',
            data: { "nombre":nombre }
        }).then(function (msg) {
            if (msg.msg == "ok") {
               toastr.success('Previsión ingresada')
               document.getElementById("nombre").value = "";
               $('#myModal').modal('hide');
            } else {
                toastr.error("Error en el ingreso.");
            }
        });
    }
}



function agregarEmpresa() {
    var nombre = $("#nombre").val();
    var rut = $("#RUT").val();
    var domicilio = $("#ubicacion").val();
    var representante = $("#nombreRepre").val();
    var cedula_representante = $("#cedulaRepre").val();
    var ciudad = $("#getSelectCiudad").val();
    if (nombre == "" || rut == "" || domicilio == "" || representante == "" || cedula_representante == "" || ciudad == "" ) {
        toastr.error("Rellene todos los campos");
    } else {
        $.ajax({
            url: 'addEmpresa',
            type: 'POST',
            dataType: 'json',
            data: { "nombre":nombre, "rut":RUT, "domicilio":domicilio, "representante":representante, "cedula_representante":cedula_representante, "ciudad":ciudad }
        }).then(function (msg) {
            if (msg.msg == "ok") {
               toastr.success('Empresa ingresada')
               document.getElementById("nombre").value = "";
               document.getElementById("RUT").value = "";
               document.getElementById("ubicacion").value = "";
               document.getElementById("nombreRepre").value = "";
               document.getElementById("cedulaRepre").value = "";
               document.getElementById("getSelectCiudad").value = "";
               $('#myModal').modal('hide');
            } else {
                toastr.error("Error en el ingreso.");
            }
        });
    }
}
