var base_url = 'http://localhost/FA_RECURSOS-HUMANOS/';
var constante = 0;


function getSelectTitulos(){
  var cargo = $("#getSelectCargo").val();
  var url = base_url+'getTitulos';
  var data = {"cargo":cargo}
  document.getElementById("getSelectTitulos").innerHTML = "";
  var fila = "<option disabled selected>Seleccione una opción</option>";
  $.post(url, data, function(msg) {
    $.each(msg.msg, function (i, o) {
        fila += "<option value='" + o.cp_titulo + "'>" + o.atr_descripcion + "</option>";
    });
    $("#getSelectTitulos").append(fila);
  }, 'json');
}


function cargarOtrosAntecedentes(){

  const selectCargo = document.querySelector('#getSelectCargo');

  var cargo = $("#getSelectCargo").val();
  var titulo = $("#getSelectTitulos").val();

  $.ajax({
      url: 'getListadoOtros',
      type: 'POST',
      dataType: 'json',
      data: { "id": cargo,
              "titulo": titulo}
  }).then(function (msg) {
      if(msg == ""){
        toastr.error("Listado vacío");
      }else{
        document.getElementById("otrosIngresados").innerHTML = "";
        document.getElementById("otros").innerHTML = "";
        var fila = "";
        $.each(msg, function (i, o) {
            fila +='<div class="col-md-12" style="margin-top:10px"><textarea type="text" class="form-control custom-input-sm" disabled>'+o.atr_descripcion+'</textarea></div>';
        });
        $("#otrosIngresados").append(fila);
      }
      document.getElementById('btnAgregarOtrosAntecedentes').removeAttribute("style");  //ESTE SIRVE PARA MOSTRAR EL BOTON

  });
}


//Aquí realizamos el comienzo del proceso para guardar todas las tareas que fueron ingresadas con un determinado cargo.
function agregarListaDeOtrosAntecedentes(){
  // Valor del cargo seleccionado
  var cargo = $("#getSelectCargo").val();
  var titulo = $("#getSelectTitulos").val();

  var identificadorInput = "";
  var antecedente = "", cnt = 0;
  var cantidadIngresoExitoso = 0;

  // Recorrer eL listado de tareas creadas
  for (var i = 0; i < constante; i++) {
      //controlo el autoincrementable del id de los inputs generados
      cnt = i+1;
      //genero el id del input
      identificadorInput = "textarea"+cnt;
      //obtengo el valor del input de id generado en el paso anterior
      antecedente = $('#'+identificadorInput).val();
      //Agrego la tarea
      if(antecedente != ""){
        $.ajax({
            url: 'addAntecedente',
            type: 'POST',
            dataType: 'json',
            data: {"antecedente":antecedente,
                   "cargo":cargo,
                    "titulo":titulo}
        }).then(function (msg) {
            toastr.success("Listado actualizado");
        });
      }
  }
  cargarOtrosAntecedentes();
  //Se inicializa en 0 para que al cambiar de cargo los inputs nuevamente comiencen desde 0
  constante = 0;
  document.getElementById('btnAgregarListaDeOtrosAntecedentes').style.display = 'none';

}

function bloquearBoton(){
    //oculto boton de agregar inputs
    document.getElementById('btnAgregarOtrosAntecedentes').style.display = 'none';
    //muestro el boton de guardar
    document.getElementById('btnAgregarListaDeOtrosAntecedentes').removeAttribute("style");
}



// Agrega un input cada vez que es llamada la función 'agregarTarea()'
// Llama a la función contar para saber qué id es el siguiente en ser concatenado al id
function agregarOtroAntecedente() {
   constante = constante+1;
   var fila = document.getElementById("otros");
   var count = contar();
   fila.innerHTML += '<div class="col-md-12" style="margin-top:10px"><textarea type="text" class="form-control custom-input-sm " onkeypress="bloquearBoton()" id="textarea'+count+'"></textarea></div>';
}

// la función contar me devuelve la cantidad de inputs que comienzen con id='input_tarea'
function contar (){
  var inputs = $('textarea[id^=textarea]');
  var count = inputs.length+1;
  return count;
}
