var base_url = 'http://localhost/FA_RECURSOS-HUMANOS/';




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

function getDetallePrevision(idPrevision){
    var id = idPrevision;
    $.ajax({
        url: 'getDetallePrevision',
        type: 'POST',
        dataType: 'json',
        data: {"idPrevision": id}
    }).then(function (msg) {
        $("#contenedorDetallePrevision").empty();

        var fila = "";
        $.each(msg.msg, function (i, o) {
          fila +='<h5 class="modal-title mx-auto">PREVISIÓN</h5><button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>';
          fila +='<div class="col-md-12"><br><label for="nombre">NOMBRE:&nbsp; </label><label id="nombreActual">'+o.atr_nombre+'</label><label id="idPrevision" style="color:#2A3F54;">'+o.cp_prevision+'</label><input type="text" class="form-control custom-input-sm" id="nombreNuevo"></div>';
          $("#contenedorDetallePrevision").append(fila);
        });

    });
}

function updatePrevision(){
    var idPrevision = $("#idPrevision").text();
    var nombre = $("#nombreNuevo").val();

    if( nombre == ""){
      nombre = $("#nombreActual").text();
    }

    $.ajax({
        url: 'updatePrevision',
        type: 'POST',
        dataType: 'json',
        data: {"idPrevision": idPrevision, "nombre":nombre}
    }).then(function (msg) {
        if(msg.msg == "ok"){
          toastr.success('Información actualizada');
          $('#modalEditarPrevision').modal('hide');
        }else{
          toastr.error('No se ha actualizado la información');
          $('#modalEditarPrevision').modal('hide');
        }
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

function getDetalleEstadosContrato(idEstadoContrato){
    var id = idEstadoContrato;
    $.ajax({
        url: 'getDetalleEstadosContrato',
        type: 'POST',
        dataType: 'json',
        data: {"idEstadoContrato": id}
    }).then(function (msg) {
        $("#contenedorDetalleEstadoContrato").empty();

        var fila = "";
        $.each(msg.msg, function (i, o) {
          fila +='<h5 class="modal-title mx-auto">ESTADO CONTRATO</h5><button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>';
          fila +='<div class="col-md-12"><br><label for="nombre">NOMBRE:&nbsp; </label><label id="nombreActual">'+o.atr_nombre+'</label><label id="idEstadoContrato" style="color:#2A3F54;">'+o.cp_estado+'</label><input type="text" class="form-control custom-input-sm" id="nombreNuevo"></div>';
          $("#contenedorDetalleEstadoContrato").append(fila);
        });

    });
}

function updateEstadoContrato(){
    var idEstadoContrato = $("#idEstadoContrato").text();
    var nombre = $("#nombreNuevo").val();

    if( nombre == ""){
      nombre = $("#nombreActual").text();
    }

    $.ajax({
        url: 'updateEstadoContrato',
        type: 'POST',
        dataType: 'json',
        data: {"idEstadoContrato": idEstadoContrato, "nombre":nombre}
    }).then(function (msg) {
        if(msg.msg == "ok"){
          toastr.success('Información actualizada');
          $('#modalEditarEstadosContrato').modal('hide');
        }else{
          toastr.error('No se ha actualizado la información');
          $('#modalEditarEstadosContrato').modal('hide');
        }
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

function getDetalleNacionalidad(idNacionalidad){
    var id = idNacionalidad;
    $.ajax({
        url: 'getDetalleNacionalidad',
        type: 'POST',
        dataType: 'json',
        data: {"idNacionalidad": id}
    }).then(function (msg) {
        $("#contenedorDetalleNacionalidad").empty();

        var fila = "";
        $.each(msg.msg, function (i, o) {
          fila +='<h5 class="modal-title mx-auto">NACIONALIDAD</h5><button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>';
          fila +='<div class="col-md-12"><br><label for="nombre">NOMBRE:&nbsp; </label><label id="nombreActual">'+o.atr_nombre+'</label><label id="idNacionalidad" style="color:#2A3F54;">'+o.cp_nacionalidad+'</label><input type="text" class="form-control custom-input-sm" id="nombreNuevo"></div>';
          $("#contenedorDetalleNacionalidad").append(fila);
        });

    });
}

function updateNacionalidad(){
    var idNacionalidad = $("#idNacionalidad").text();
    var nombre = $("#nombreNuevo").val();

    if( nombre == ""){
      nombre = $("#nombreActual").text();
    }

    $.ajax({
        url: 'updateNacionalidad',
        type: 'POST',
        dataType: 'json',
        data: {"idNacionalidad": idNacionalidad, "nombre":nombre}
    }).then(function (msg) {
        if(msg.msg == "ok"){
          toastr.success('Información actualizada');
          $('#modalEditarNacionalidad').modal('hide');
        }else{
          toastr.error('No se ha actualizado la información');
          $('#modalEditarNacionalidad').modal('hide');
        }
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
    
    if (nombre == "" || nombre == null ) {
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
            data: { "nombre":nombre, "rut":rut, "domicilio":domicilio, "representante":representante, "cedula_representante":cedula_representante, "ciudad":ciudad },
        }).then(function (msg) {
            if (msg.msg == "ok") {
               toastr.success('Empresa ingresada');
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

function getDetalleEmpresa(idEmpresa){
  var id = idEmpresa;
  $.ajax({
      url: 'getDetalleEmpresa',
      type: 'POST',
      dataType: 'json',
      data: {"idEmpresa": id}
  }).then(function (msg) {
      $("#contenedorDetalleEmpresa").empty();
      var fila = "";
      $.each(msg.msg, function (i, o) {
          fila +='<h5 class="modal-title mx-auto">EMPRESA</h5><button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>';
          fila +='<div class="col-md-12"><br><label for="nombre">NOMBRE:&nbsp; </label><label id="nombreActual">'+o.atr_nombre+'</label><label id="idEmpresa" style="color:#2A3F54;">'+o.cp_empresa+'</label><input type="text" class="form-control custom-input-sm" id="nombreNuevo" oninput="mayus(this);"></div>';
          fila +='<div class="col-md-12"><br><label for="rut">ROL UNICO TRIBUTARIO:&nbsp;</label><label id="rutActual">'+o.atr_run+'</label><input type="text" class="form-control custom-input-sm" id="rutNuevo" onkeyup="this.value=caracteresRUT(this.value)" oninput="checkRutOficial(this)"></div>';
          fila +='<div class="col-md-12"><br><label for="ubicacion">UBICACIÓN:&nbsp;</label><label id="ubicacionActual">'+o.atr_domicilio+'</label><input type="text" class="form-control custom-input-sm" id="ubicacionNuevo" oninput="mayus(this);"></div>';
          fila +='<div class="col-md-12"><br><label for="nombreRepre">NOMBRE DE REPRESENTANTE:&nbsp;</label><label id="nombreRepreActual">'+o.atr_representante+'</label><input type="text" class="form-control custom-input-sm" id="nombreRepreNuevo" oninput="mayus(this);" onkeyup="this.value=soloLetras(this.value)" ></div>';
          fila +='<div class="col-md-12"><br><label for="cedulaRepre">CÉLUDA DE REPRESENTANTE:&nbsp;</label><label id="cedulaRepreActual">'+o.atr_cedula_representante+'</label><input type="text" class="form-control custom-input-sm" id="cedulaRepreNuevo" onkeyup="this.value=caracteresRUT(this.value)" oninput="checkRutOficial(this)"></div>';

          fila +='<div class="col-md-12"><br> <label for="getSelectCiudad">CIUDAD:&nbsp;</label><label id="ciudadActual">'+o.nombreCiudad+'</label><br> <select class="custom-select" id="getSelectCiudad2"> ';

          var url = base_url+'getCiudades';
          fila +='<option disabled selected>Seleccione una opción</option>';
          $.getJSON(url, function (result) {
              $.each(result, function (i, o) {
                  fila += '<option value="'+ o.cp_ciudad + '">' + o.atr_nombre + '</option>';
              });
              fila +='</select></div>'; //cerrando el select
              $("#contenedorDetalleEmpresa").append(fila);
          });


      });
  });
}

function editarEmpresa() {
    var idEmpresa = $("#idEmpresa").text();
    var nombre = $("#nombreNuevo").val();
    var rut = $("#rutNuevo").val();
    var domicilio = $("#ubicacionNuevo").val();
    var representante = $("#nombreRepreNuevo").val();
    var cedula_representante = $("#cedulaRepreNuevo").val();
    var ciudad = $("#getSelectCiudad2").val();
    var esNuevo = true;


    // alert("la ciudad nueva es: "+ciudad);

    if (nombre == "" && rut == "" && domicilio == "" && representante == "" && cedula_representante == "" && ciudad == "" ) {
        toastr.error("No se ha moficiado ningún registro");
    } else {
        if(nombre == ""){
          nombre = $("#nombreActual").text();
        }
        if(rut == ""){
          rut = $("#rutActual").text();
        }
        if(domicilio == ""){
          domicilio = $("#ubicacionActual").text();
        }
        if(representante == ""){
          representante = $("#nombreRepreActual").text();
        }
        if(cedula_representante == ""){
          cedula_representante = $("#cedulaRepreActual").text();
        }
        if(ciudad == null || ciudad == ""){
          ciudad = $("#ciudadActual").text();
          esNuevo = false;
        }
        $.ajax({
            url: 'updateEmpresa',
            type: 'POST',
            dataType: 'json',
            data: { "esNuevo":esNuevo, "idEmpresa":idEmpresa, "nombre":nombre, "rut":rut, "domicilio":domicilio, "representante":representante, "cedula_representante":cedula_representante, "ciudad":ciudad },
        }).then(function (msg) {

        });
        toastr.success('Información actualizada')
        $('#modalEditarEmpresa').modal('hide');
    }
}
