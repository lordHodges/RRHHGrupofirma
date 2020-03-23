var base_url = 'http://localhost/FA_RECURSOS-HUMANOS/';
var constante = 0;


function cargarTareas(){

  const selectCargo = document.querySelector('#getSelectCargo');


  var cargo = $("#getSelectCargo").val();
  $.ajax({
      url: 'getListadoTareas',
      type: 'POST',
      dataType: 'json',
      data: { "id": cargo}
  }).then(function (msg) {
      if(msg == ""){
        toastr.error("No tiene funcionalidades asociadas");
      }else{
        // $("#tareasIngresadas").empty();
        document.getElementById("tareasIngresadas").innerHTML = "";
        document.getElementById("tareas").innerHTML = "";
        var fila = "";
        $.each(msg, function (i, o) {

            fila +='<div class="col-md-12" style="margin-top:10px"><input type="text" class="form-control custom-input-sm autocompleteTareas" disabled value="'+o.atr_descripcion+'"></div>';
        });
        $("#tareasIngresadas").append(fila);
      }
      document.getElementById('btnAgregarTarea').removeAttribute("style");  //ESTE SIRVE PARA MOSTRAR EL BOTON
  });
}


//Aquí realizamos el comienzo del proceso para guardar todas las tareas que fueron ingresadas con un determinado cargo.
function agregarListaDeTareas(){
  // Valor del cargo seleccionado
  var cargo = $("#getSelectCargo").val();

  var identificadorInput = "";
  var tarea = "", cnt = 0;
  var cantidadIngresoExitoso = 0;

  // Recorrer eL listado de tareas creadas
  for (var i = 0; i < constante; i++) {
      //controlo el autoincrementable del id de los inputs generados
      cnt = i+1;
      //genero el id del input
      identificadorInput = "input_tarea"+cnt;
      //obtengo el valor del input de id generado en el paso anterior
      tarea = $('#'+identificadorInput).val();
      //Agrego la tarea
      if(tarea != ""){
        $.ajax({
            url: 'addTarea',
            type: 'POST',
            dataType: 'json',
            data: {"tarea":tarea,
                   "cargo":cargo}
        }).then(function (msg) {

        });
      }
      toastr.success("Funciones actualizadas");

  }
  //Se inicializa en 0 para que al cambiar de cargo los inputs nuevamente comiencen desde 0
  constante = 0;

  $("#tareasIngresadas").empty();
  $("#tareas").empty();
  cargarTareas();
  document.getElementById('btnAgregarListaDeTareas').style.display = 'none';

}

function bloquearBoton(){
    //oculto boton de agregar inputs
    document.getElementById('btnAgregarTarea').style.display = 'none';
    //muestro el boton de guardar
    document.getElementById('btnAgregarListaDeTareas').removeAttribute("style");
}

function autocompleteTareas() {
  var url = base_url+'getListadoTareas';
  var tareas = [];
  $.getJSON(url, function (result) {
      $.each(result, function (i, o) {
          tareas.push(o.atr_descripcion);
      });
  });
  $( ".autocompleteTareas" ).autocomplete({
    source: tareas
  });
}

// Agrega un input cada vez que es llamada la función 'agregarTarea()'
// Llama a la función contar para saber qué id es el siguiente en ser concatenado al id
function agregarTarea() {
   constante = constante+1;
   var fila = document.getElementById("tareas");
   var count = contar();
   fila.innerHTML += '<div class="col-md-12" style="margin-top:10px"><input type="text" class="form-control custom-input-sm " onkeypress="bloquearBoton()" id="input_tarea'+count+'"></div>';
}s

// la función contar me devuelve la cantidad de inputs que comienzen con id='input_tarea'
function contar (){
  var inputs = $('input[id^=input_tarea]');
  var count = inputs.length+1;
  return count;
}
