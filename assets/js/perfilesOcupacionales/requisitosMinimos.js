var base_url = 'http://localhost/FA_RECURSOS-HUMANOS/';
var constante = 0;


function cargarRequisitosMinimos(){

  const selectCargo = document.querySelector('#getSelectCargo');


  var cargo = $("#getSelectCargo").val();
  $.ajax({
      url: 'getListadoRequisitosMinimos',
      type: 'POST',
      dataType: 'json',
      data: { "id": cargo}
  }).then(function (msg) {
      if(msg == ""){
        toastr.error("No tiene requisitos asociados");
      }else{
        $("#requisitosMinimosIngresados").empty();
        var fila = "";
        $.each(msg, function (i, o) {

            fila +='<div class="col-md-12" style="margin-top:10px"><input type="text" class="form-control custom-input-sm " disabled value="'+o.atr_descripcion+'"></div>';
        });
        $("#requisitosMinimosIngresados").append(fila);
      }
      document.getElementById('btnAgregarRequisitoMinimo').removeAttribute("style");  //ESTE SIRVE PARA MOSTRAR EL BOTON
  });
}


//Aquí realizamos el comienzo del proceso para guardar todas las tareas que fueron ingresadas con un determinado cargo.
function agregarListaDeRequisitosMinimos(){
  // Valor del cargo seleccionado
  var cargo = $("#getSelectCargo").val();

  var identificadorInput = "";
  var requisito = "", cnt = 0;
  var cantidadIngresoExitoso = 0;

  // Recorrer eL listado de tareas creadas
  for (var i = 0; i < constante; i++) {
      //controlo el autoincrementable del id de los inputs generados
      cnt = i+1;
      //genero el id del input
      identificadorInput = "input_tarea"+cnt;
      //obtengo el valor del input de id generado en el paso anterior
      requisito = $('#'+identificadorInput).val();
      //Agrego la tarea
      if(requisito != ""){
        $.ajax({
            url: 'addRequisitoMinimo',
            type: 'POST',
            dataType: 'json',
            data: {"requisitoMinimo":requisito,
                   "cargo":cargo}
        }).then(function (msg) {
            toastr.success("Requisitos mínimos actualizados");
        });
      }
  }
  //Se inicializa en 0 para que al cambiar de cargo los inputs nuevamente comiencen desde 0
  constante = 0;

  $("#requisitosMinimosIngresados").empty();
  $("#requisitosMinimos").empty();
  cargarRequisitosMinimos();
  document.getElementById('btnAgregarListaDeRequisitosMinimos').style.display = 'none';

}

function bloquearBoton(){
    //oculto boton de agregar inputs
    document.getElementById('btnAgregarRequisitoMinimo').style.display = 'none';
    //muestro el boton de guardar
    document.getElementById('btnAgregarListaDeRequisitosMinimos').removeAttribute("style");
}

function autocompleteTareas() {
  var url = base_url+'getListadoRequisitosMinimos';
  var requisitos = [];
  $.getJSON(url, function (result) {
      $.each(result, function (i, o) {
          requisitos.push(o.atr_descripcion);
      });
  });
  $( ".autocompleteTareas" ).autocomplete({
    source: requisitos
  });
}

// Agrega un input cada vez que es llamada la función 'agregarTarea()'
// Llama a la función contar para saber qué id es el siguiente en ser concatenado al id
function agregarRequisitoMinimo() {
   constante = constante+1;
   var fila = document.getElementById("requisitosMinimos");
   var count = contar();
   fila.innerHTML += '<div class="col-md-12" style="margin-top:10px"><input type="text" class="form-control custom-input-sm " onkeypress="bloquearBoton()" id="input_tarea'+count+'"></div>';
}

// la función contar me devuelve la cantidad de inputs que comienzen con id='input_tarea'
function contar (){
  var inputs = $('input[id^=input_tarea]');
  var count = inputs.length+1;
  return count;
}
