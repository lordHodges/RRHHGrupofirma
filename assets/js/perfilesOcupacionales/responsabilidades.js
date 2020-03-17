var base_url = 'http://localhost/FA_RECURSOS-HUMANOS/';
var constante = 0;


//Aquí realizamos el comienzo del proceso para guardar todas las tareas que fueron ingresadas con un determinado cargo.
function agregarCargo(){
  var nombre = $("#nombre").val();
  var jefeDirecto = $("#jefeDirecto").val();
  var lugarTrabajo = $("#lugarTrabajo").val();
  var jornadaTrabajo = $("#jornadaTrabajo").val();
  var diasTrabajo = $("#diasTrabajo").val();
  var sueldo = $("#sueldo").val();
  // Valor del cargo seleccionado
  if(nombre == "" || jefeDirecto == "" || lugarTrabajo == "" || jornadaTrabajo == "" || sueldo == "" || diasTrabajo == ""){
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
                "sueldo" : sueldo}
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
          document.getElementById("sueldo").value = "";
          $('#myModal').modal('hide');
          toastr.success('Cargo ingresado');
        } else {
            toastr.error("Error en el ingreso.");
        }
    });



  }
}

function bloquearBoton(){
    //oculto boton de agregar inputs
    document.getElementById('btnAgregarInputResponsabilidad').style.display = 'none';
    //muestro el boton de guardar
    document.getElementById('btnAgregarCargo').removeAttribute("style");
}


// Agrega un input cada vez que es llamada la función 'agregarTarea()'
// Llama a la función contar para saber qué id es el siguiente en ser concatenado al id
function agregaInputResponsabilidad() {
   constante = constante+1;
   var fila = document.getElementById("containerResponsabilidades");
   var count = contar();
   fila.innerHTML += '<div class="col-md-12" style="margin-top:10px"><input type="text" class="form-control custom-input-sm " onkeypress="bloquearBoton()" id="input_tarea'+count+'" required></div>';
}

// la función contar me devuelve la cantidad de inputs que comienzen con id='input_tarea'
function contar (){
  var inputs = $('input[id^=input_tarea]');
  var count = inputs.length+1;
  return count;
}
