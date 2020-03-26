var base_url = 'http://localhost/RRHH-FIRMA/';
var constante = 0;


function cargarTabla(cargo){
  var table = $('#tabla_competencias').DataTable();
  table.destroy();
  $('.dataTables-competencias').DataTable({
      "info":false,
      language: {
          "sProcessing": "Procesando...",
          "sLengthMenu": "Registros _MENU_ ",
          "sZeroRecords": "No se encontraron resultados",
          "sEmptyTable": "Ningún dato disponible en esta tabla",
          // "sInfo": "Mostrando registros del _START_ al _END_ de un total de _TOTAL_ registros",
          "sInfoEmpty": "Mostrando registros del 0 al 0 de un total de 0 registros",
          "sInfoFiltered": "(filtrado de un total de _MAX_ registros)",
          "sInfoPostFix": "",
          "sSearch": "Buscar:",
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
      },
      "ajax": {
          url: 'http://localhost/RRHH-FIRMA/index.php/getListadoCompetenciasDataTable?id='+cargo,
          type: 'GET',
      },
      "columnDefs": [{
        "targets": 2,
        "defaultContent": '<button type="button" id="btnEliminarCompetencias" class="btn btn-danger" data-toggle="modal" data-target="#modalEliminarRequisitoMinimo"><i class="glyphicon glyphicon-trash"></i></button>'
      }]
      ,dom: '<"html5buttons"B>lTfgitp',
      buttons: [
      ]

  });
}

function eliminarCompetencia(idCompetencia){
  var cargo =  $("#getSelectCargo").val();
  $.ajax({
      url: 'deleteCompetencia',
      type: 'POST',
      dataType: 'json',
      data: {"idCompetencia":idCompetencia}
  }).then(function (msg) {
      toastr.success("Eliminado con éxito");
      //recargar el datatable
      cargarTabla(cargo);
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
            if(msg.msg == "ok"){
              toastr.success("Competencias y características actualizadas");
              cargarTabla(cargo);
            }else{
              toastr.warning("Competencia o Característica ya existe");
            }
        });
      }

      //Se inicializa en 0 para que al cambiar de cargo los inputs nuevamente comiencen desde 0
      constante = 0;

      $("#competencias").empty();
      cargarTabla(cargo);
      document.getElementById('btnAgregarCompetencia').removeAttribute("style");
  }

  cargarTabla(cargo);
  //Se inicializa en 0 para que al cambiar de cargo los inputs nuevamente comiencen desde 0
  constante = 0;
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
   fila.innerHTML += '<div class="col-md-12 perfilOcupacional"><input type="text" style="margin-bottom:15px;"  class="form-control custom-input-sm " onkeypress="bloquearBoton()" id="input_tarea'+count+'"></div>';
}

// la función contar me devuelve la cantidad de inputs que comienzen con id='input_tarea'
function contar (){
  var inputs = $('input[id^=input_tarea]');
  var count = inputs.length+1;
  return count;
}
