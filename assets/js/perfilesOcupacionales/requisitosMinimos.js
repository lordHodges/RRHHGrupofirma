var base_url = 'http://localhost/RRHH-FIRMA/index.php/';
var constante = 0;

function cargarTabla(cargo, permisoEliminar){
  //destuir datatable actual
  var table = $('#tabla_requerimientosMinimos').DataTable();
  table.destroy();

  var btnAcciones = "";

  if (permisoEliminar == "si") {
    btnAcciones = '<button type="button" id="btnEliminarRequisitoMínimo" class="btn btn-danger btn-sm" data-toggle="modal" data-target="#modalEliminarRequisitoMinimo"><i class="glyphicon glyphicon-trash"></i></button>';
  }

  $('.dataTables-requerimientosMinimos').DataTable({
        "info":false,
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
        },
        "ajax": {
            url: 'http://localhost/RRHH-FIRMA/index.php/getListadoRequisitosMinimosDataTable?id='+cargo,
            type: 'GET',
        },
        "columnDefs": [{
          "targets": 2,
          "defaultContent": btnAcciones
        }]
        ,dom: '<"html5buttons"B>lTfgitp',
        buttons: [
        ]

    });
}

function eliminarRequisitoMinimo(idRequisitoMinimo){
  var cargo =  $("#getSelectCargo").val();
  $.ajax({
      url: 'deleteRequisitoMinimo',
      type: 'POST',
      dataType: 'json',
      data: {"idRequisitoMinimo":idRequisitoMinimo,
             "cargo":cargo}
  }).then(function (msg) {
      toastr.success("Requisitos mínimo eliminado");

      var permisoEliminar = $("#permisoEliminar").text();
      //recargar el datatable
      cargarTabla(cargo,permisoEliminar);
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
          if(msg.msg == "ok"){
            toastr.success("Requisito mínimo agregado");
            var permisoEliminar = $("#permisoEliminar").text();
            //recargar el datatable
            cargarTabla(cargo,permisoEliminar);
          }else{
            toastr.warning("Requisito mínimo ya existe");
          }
        });
      }
  }
  //Se inicializa en 0 para que al cambiar de cargo los inputs nuevamente comiencen desde 0
  constante = 0;

  $("#requisitosMinimos").empty();

  document.getElementById('btnAgregarListaDeRequisitosMinimos').style.display = 'none';
  document.getElementById('btnAgregarRequisitoMinimo').removeAttribute("style");
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
   fila.innerHTML += '<div class="col-md-12 perfilOcupacional"><input type="text" style="margin-bottom:15px;" class="form-control custom-input-sm " onkeypress="bloquearBoton()" id="input_tarea'+count+'"></div>';
}

// la función contar me devuelve la cantidad de inputs que comienzen con id='input_tarea'
function contar (){
  var inputs = $('input[id^=input_tarea]');
  var count = inputs.length+1;
  return count;
}
