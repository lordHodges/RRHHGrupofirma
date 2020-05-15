var base_url = 'http://10.10.11.240/GRUPOFIRMA/index.php/';

var constante = 0;
var constanteResponsabilidades = 0;


//Aquí realizamos el comienzo del proceso para guardar todas las tareas que fueron ingresadas con un determinado cargo.
function agregarCargo(){
  var nombre = $("#nombre").val();
  var sucursal = $("#getSelectSucursal").val();
  var jefeDirecto = $("#jefeDirecto").val();
  var lugarTrabajo = $("#lugarTrabajo").val();
  var jornadaTrabajo = $("#jornadaTrabajo").val();
  var diasTrabajo = $("#diasTrabajo").val();
  // Valor del cargo seleccionado
  if(nombre == "" || jefeDirecto == ""){
    toastr.error("Complete todos los campos");
  }
  else{
    $.ajax({
        url: 'addCargo',
        type: 'POST',
        dataType: 'json',
        data: { "nombre":nombre,
                "jefeDirecto" : jefeDirecto,
                "lugarTrabajo" : lugarTrabajo,
                "jornadaTrabajo" : jornadaTrabajo,
                "diasTrabajo" : diasTrabajo,
                "sucursal":sucursal}
    }).then(function (msg) {
        if (msg.msg == "ok") {
          var cargo = $("#nombre").val();

          var identificadorInput = "";
          var responsabilidad = "", cnt = 0;
          var cantidadIngresoExitoso = 0;

          // Recorrer eL listado de tareas creadas
          for (var i = 0; i < constante; i++) {
              //controlo el autoincrementable del id de los inputs generados
              cnt = i+1;
              //genero el id del input
              identificadorInput = "input_tarea"+cnt;
              //obtengo el valor del input de id generado en el paso anterior
              responsabilidad = $('#'+identificadorInput).val();
              //Agrego la tarea
              if(responsabilidad != ""){
                $.ajax({
                    url: 'addResponsabilidades',
                    type: 'POST',
                    dataType: 'json',
                    data: {"responsabilidad":responsabilidad,
                           "cargo":cargo}
                }).then(function (msg) {

                });
            }
          }

          constante = 0;
          $("#containerResponsabilidades").empty();
          document.getElementById('btnAgregarInputResponsabilidad').removeAttribute("style");


          document.getElementById("nombre").value = "";
          document.getElementById("jefeDirecto").value = "";
          document.getElementById("lugarTrabajo").value = "";
          document.getElementById("jornadaTrabajo").value = "";
          document.getElementById("diasTrabajo").value = "";
          $('#myModal').modal('hide');
          toastr.success('Cargo ingresado');
        } else {
            toastr.error("Error en el ingreso.");
        }
    });
  }
}

function getDetalleCargo(id){
  var cargo = id;
  $.ajax({
      url: 'getDetalleCargo',
      type: 'POST',
      dataType: 'json',
      data: {"cargo": cargo},
    }).then(function (response) {
      // alert(response.msg.array_cargo);
      var fila = "";
      $("#modalDetalleCargo").empty();
      var contadorResponsabilidades = 1;
      $.each(response.msg.array_cargo, function (i, o) {
          fila +='<div class="col-md-12"><br>  <label for="nombreNuevo">NOMBRE:  &nbsp;</label> <label id="idCargo" style="color:#2a3f54">'+o.cp_cargo+'</label> <input type="text" style="color:#848484" class="form-control  custom-input-sm" id="nombreNuevo"></div>';


          var url = base_url+'getSucursales';
          fila +='<div class="col-md-12"><br><label for="sucursal">SUCURSAL:&nbsp;</label><label id="sucursalActual">'+o.sucursal+'</label><select class="custom-select" id="getSelectSucursal2"> ';
          fila +='<option  selected value="">Seleccione una opción</option>';
          $.getJSON(url, function (result) {
            $.each(result, function (i, o) {
                fila += '<option value="'+ o.cp_sucursal + '">' + o.atr_nombre + '</option>';
            });
            fila +='</select></div>'; //cerrando el select

            fila +='<div class="col-md-10"><br><label >RESPONSABILIDADES PRINCIPALES &nbsp</label><button type="button" class="btn btn-success btn-sm center"  id="btnAgregarInputResponsabilidadEditar" ><i class="glyphicon glyphicon-plus"></i></button></div>';
            fila +='<div id="contenedorDeResponsabilidades"></div>';

            fila += '<div id="responsabilidadesActuales"></div>'
            $.each(response.msg.array_responsabilidades, function (i, r) {

              fila += '<div class="col-md-12"><br><button type="button" class="btn btn-danger btn-sm center"  value="'+r.atr_descripcion+'" onclick="deleteResponsabilidad(this)"><i class="glyphicon glyphicon-minus"></i></button>&nbsp;<label id="responsabilidadActual_'+contadorResponsabilidades+'">'+r.atr_descripcion+'</label><input type="text" id="responsabilidadNuevo_'+contadorResponsabilidades+'"  class="form-control custom-input-sm" id="responsabilidadNuevo_'+r.cp_responsabilidad+'"></div>';
              contadorResponsabilidades = contadorResponsabilidades+1;
              constanteResponsabilidades = constanteResponsabilidades +1;
              // var idResposabilidadParaEach = "responsabilidadNuevo_"+r.cp_responsabilidad;

              // $("#"+idResposabilidadParaEach).val() = "hola";
            });

            fila +='<div class="col-md-12"><br><label for="jefeDirectoNuevo">JEFE DIRECTO:  &nbsp;</label>  <input type="text" style="color:#848484" class="form-control custom-input-sm" id="jefeDirectoNuevo"></div>';
            fila +='<div class="col-md-12"><br><label for="lugarTrabajoNuevo">LUGAR DE PRESTACIÓN DE SERVICIOS:  &nbsp;</label>  <textarea type="text"  style="color:#848484" class="form-control" rows="5" id="lugarTrabajoNuevo"></textarea></div>';
            fila +='<div class="col-md-12"><br><label for="jornadaTrabajoNuevo">JORNADA DE TRABAJO:  &nbsp;</label>  <textarea type="text" style="color:#848484" class="form-control" rows="5" id="jornadaTrabajoNuevo"></textarea></div>';
            fila +='<div class="col-md-12"><br><label for="diasTrabajoNuevo">DÍAS DE TRABAJO:  &nbsp;</label>  <input type="text" style="color:#848484" class="form-control custom-input-sm" id="diasTrabajoNuevo"></div>';

            $("#modalDetalleCargo").append(fila);

            document.getElementById("nombreNuevo").value = o.atr_nombre;
            document.getElementById("jefeDirectoNuevo").value = o.atr_jefeDirecto;
            document.getElementById("lugarTrabajoNuevo").value = o.atr_lugarTrabajo;
            document.getElementById("jornadaTrabajoNuevo").value = o.atr_jornadaTrabajo;
            document.getElementById("diasTrabajoNuevo").value = o.atr_diasTrabajo;
          });
      });
    });
}

function deleteResponsabilidad(boton){
  var descripcionResponsabilidad = boton.value;
  var idCargo = $("#idCargo").text();

  $.ajax({
      url: 'deleteResponsabilidad',
      type: 'POST',
      dataType: 'json',
      data: {"idCargo": idCargo, "descripcionResponsabilidad": descripcionResponsabilidad}
  }).then(function (response) {
    if(response.msg == "ok"){
      toastr.success('Responsabilidad eliminada');
      getDetalleCargo( $("#idCargo").text() );
    }else{

    }
  });
}

function updateCargo(){
  var id = $("#idCargo").text();
  var sucursal = $("#getSelectSucursal2").val();
  var nombre = $("#nombreNuevo").val();
  var jefeDirecto = $("#jefeDirectoNuevo").val();
  var lugarTrabajo = $("#lugarTrabajoNuevo").val();
  var jornadaTrabajo = $("#jornadaTrabajoNuevo").val();
  var diasTrabajo = $("#diasTrabajoNuevo").val();

  if (sucursal == null || sucursal == "") {
    sucursal = $("#sucursalActual").text();
  }

  // ACTUALIZACION DE CARGOS
  $.ajax({
      url: 'updateCargo',
      type: 'POST',
      dataType: 'json',
      data: { "id": id,
              "sucursal":sucursal,
              "nombre": nombre,
              "jefeDirecto": jefeDirecto,
              "lugarTrabajo":lugarTrabajo,
              "jornadaTrabajo":jornadaTrabajo,
              "diasTrabajo":diasTrabajo},
    }).then(function (msg) {
      if(msg.msg == "ok"){
        toastr.success('Cargo actualizado');
      }else{
        toastr.error('Por favor revise la actualización en el listado');
      }
    });



  // ACTUALIZACION DE RESPONSABILIDADES EXISTENTES

  var identificadorInput = "";
  var responsabilidad = "", cnt = 1;
  var cantidadIngresoExitoso = 0;

  // Recorrer eL listado de tareas creadas
  for (var i = 0; i < constanteResponsabilidades; i++) {
      //genero el id del input
      identificadorInputActual = "responsabilidadActual_"+cnt;

      identificadorInputNuevo = "responsabilidadNuevo_"+cnt;
      //controlo el autoincrementable del id de los inputs generados
      cnt = cnt+1;

      var descripcionNueva = $("#"+identificadorInputNuevo).val();

      if( descripcionNueva == ""){

      }else{
        var descripcionActual = $("#"+identificadorInputActual).text();


        $.ajax({
          url: 'updateResponsabilidad',
          type: 'POST',
          dataType: 'json',
          data: { "descripcionActual": descripcionActual,
                  "descripcionNueva": descripcionNueva,
                  "idCargo": id},
        }).then(function (msg) {
          toastr.success('Responsabilidades actualizadas');
        });
      }
    }


    // ADICIÓN DE NUEVAS RESPONSABILIDADES

    identificadorInput = "";
    responsabilidad = "", cnt = 1;
    cantidadIngresoExitoso = 0;

    // Recorrer eL listado de tareas creadas
    for (var i = 0; i < constante; i++) {
        //genero el id del input
        identificadorInput = "input_tarea"+cnt;
        //controlo el autoincrementable del id de los inputs generados
        cnt = cnt+1;

        var responsabilidad = $("#"+identificadorInput).val();
        // alert("responsabilidad: "+responsabilidad);
        if( responsabilidad != ""){
          $.ajax({
            url: 'addResponsabilidadesPorIDCargo',
            type: 'POST',
            dataType: 'json',
            data: { "responsabilidad": responsabilidad,
                    "cargo": id},
          }).then(function (msg) {
            // toastr.success('Nuevas responsabilidades agregadas');
          });
        }
      }

    constanteResponsabilidades = 0;
    getDetalleCargo(id);
    // $('#modaleditarCargo').modal('hide');
}

function bloquearBoton(){
    //oculto boton de agregar inputs
    document.getElementById('btnAgregarInputResponsabilidad').style.display = 'none';
    //muestro el boton de guardar
    document.getElementById('btnAgregarCargo').removeAttribute("style");
}

function bloquearBotonEditar(){
    //oculto boton de agregar inputs
    document.getElementById('btnAgregarInputResponsabilidadEditar').style.display = 'none';
}


// Agrega un input cada vez que es llamada la función 'agregarTarea()'
// Llama a la función contar para saber qué id es el siguiente en ser concatenado al id
function agregaInputResponsabilidad() {
   constante = constante+1;
   var fila = document.getElementById("containerResponsabilidades");
   var count = contar();
   fila.innerHTML += '<div class="col-md-12" style="margin-top:10px; color:#848484;"><input type="text" class="form-control custom-input-sm " style="color:#848484" nkeypress="bloquearBoton()" id="input_tarea'+count+'" required></div>';
}

function agregaInputResponsabilidadEditar() {
   constante = constante+1;
   var fila = document.getElementById("contenedorDeResponsabilidades");
   var count = contar();
   fila.innerHTML += '<div class="col-md-12" style="margin-top:10px; color:#848484"><input type="text" class="form-control custom-input-sm " onkeypress="bloquearBotonEditar()"  style="color:#848484" id="input_tarea'+count+'" required></div>';
}

// la función contar me devuelve la cantidad de inputs que comienzen con id='input_tarea'
function contar (){
  var inputs = $('input[id^=input_tarea]');
  var count = inputs.length+1;
  return count;
}
