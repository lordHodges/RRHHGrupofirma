var base_url = 'http://localhost/FA_RECURSOS-HUMANOS/';
var constante = 0;


function cargarCompetencias(){

  const selectCargo = document.querySelector('#getSelectCargo');


  var cargo = $("#getSelectCargo").val();
  $.ajax({
      url: 'getListadoCompetencias',
      type: 'POST',
      dataType: 'json',
      data: { "id": cargo}
  }).then(function (msg) {
      if(msg == ""){
        toastr.error("No tiene competencias asociadas");
      }else{
        $("#competenciasIngresadas").empty();
        var fila = "";
        $.each(msg, function (i, o) {

            fila +='<div class="col-md-12" style="margin-top:10px"><input type="text" class="form-control custom-input-sm" disabled value="'+o.atr_descripcion+'"></div>';
        });
        $("#competenciasIngresadas").append(fila);
      }
      document.getElementById('btnAgregarCompetencia').removeAttribute("style");  //ESTE SIRVE PARA MOSTRAR EL BOTON
  });
}


//Aquí realizamos el comienzo del proceso para guardar todas las tareas que fueron ingresadas con un determinado cargo.
function agregarListaDeCompetencias(){
  // Valor del cargo seleccionado
  var cargo = $("#getSelectCargo").val();

  var identificadorInput = "";
  var competencia = "", cnt = 0;
  var cantidadIngresoExitoso = 0;

  // Recorrer eL listado de tareas creadas
  for (var i = 0; i < constante; i++) {
      //controlo el autoincrementable del id de los inputs generados
      cnt = i+1;
      //genero el id del input
      identificadorInput = "input_tarea"+cnt;
      //obtengo el valor del input de id generado en el paso anterior
      competencia = $('#'+identificadorInput).val();
      //Agrego la tarea
      if(competencia != ""){
        $.ajax({
            url: 'addCompetencia',
            type: 'POST',
            dataType: 'json',
            data: {"competencia":competencia,
                   "cargo":cargo}
        }).then(function (msg) {
            toastr.success("Competencias actualizadas");
        });
      }
  }
  //Se inicializa en 0 para que al cambiar de cargo los inputs nuevamente comiencen desde 0
  constante = 0;

  $("#competenciasIngresadas").empty();
  $("#competencias").empty();
  cargarCompetencias();
  document.getElementById('btnAgregarListaDeCompetencias').style.display = 'none';

}

function bloquearBoton(){
    //oculto boton de agregar inputs
    document.getElementById('btnAgregarCompetencia').style.display = 'none';
    //muestro el boton de guardar
    document.getElementById('btnAgregarListaDeCompetencias').removeAttribute("style");
}

function autocompleteCompetencias() {
  var url = base_url+'getListadoCompetencias';
  var competencias = [];
  $.getJSON(url, function (result) {
      $.each(result, function (i, o) {
          competencias.push(o.atr_descripcion);
      });
  });
  $( ".autocompleteCompetencias" ).autocomplete({
    source: competencias
  });
}

// Agrega un input cada vez que es llamada la función 'agregarTarea()'
// Llama a la función contar para saber qué id es el siguiente en ser concatenado al id
function agregarCompetencia() {
   constante = constante+1;
   var fila = document.getElementById("competencias");
   var count = contar();
   fila.innerHTML += '<div class="col-md-12" style="margin-top:10px"><input type="text" class="form-control custom-input-sm " onkeypress="bloquearBoton()" id="input_tarea'+count+'"></div>';
}

// la función contar me devuelve la cantidad de inputs que comienzen con id='input_tarea'
function contar (){
  var inputs = $('input[id^=input_tarea]');
  var count = inputs.length+1;
  return count;
}
