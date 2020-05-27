var base_url = 'https://imlchile.cl/ grupofirma/index.php/';
var constante = 0;

function cargarTabla(cargo, permisoEliminar){
  var table = $('#tabla_conocimientos').DataTable();
  table.destroy();

  var btnAcciones = "";

  if (permisoEliminar == "si") {
    btnAcciones = '<button type="button" id="btnEliminarConocimiento" class="btn btn-danger btn-sm"><i class="glyphicon glyphicon-trash"></i></button>';
  }

  $('.dataTables-conocimientos').DataTable({
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
            url: 'https://imlchile.cl/ grupofirma/index.php/getListadoConocimientosDataTable?id='+cargo,
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

function eliminarConocimiento(id_conocimiento){
  var cargo =  $("#getSelectCargo").val();
  $.ajax({
      url: 'deleteConocimiento',
      type: 'POST',
      dataType: 'json',
      data: {"id_conocimiento":id_conocimiento}
  }).then(function (msg) {
      toastr.success("Conocimiento eliminado");
      var permisoEliminar = $("#permisoEliminar").text();
      //recargar el datatable
      cargarTabla(cargo,permisoEliminar);
  });
}


//Aquí realizamos el comienzo del proceso para guardar todas las tareas que fueron ingresadas con un determinado cargo.
function agregarListaDeConocimientos(){
  // Valor del cargo seleccionado
  var cargo = $("#getSelectCargo").val();

  var identificadorInput = "";
  var conocimiento = "", cnt = 0;
  var cantidadIngresoExitoso = 0;

  // Recorrer eL listado de tareas creadas
  for (var i = 0; i < constante; i++) {
      //controlo el autoincrementable del id de los inputs generados
      cnt = i+1;
      //genero el id del input
      identificadorInput = "input_tarea"+cnt;
      //obtengo el valor del input de id generado en el paso anterior
      conocimiento = $('#'+identificadorInput).val();
      //Agrego la tarea
      if(conocimiento != ""){
        $.ajax({
            url: 'addConocimiento',
            type: 'POST',
            dataType: 'json',
            data: {"conocimiento":conocimiento,
                   "cargo":cargo}
        }).then(function (msg) {
            if( msg.msg == "ok"){
              toastr.success("Conocimientos actualizados");
              var permisoEliminar = $("#permisoEliminar").text();
              //recargar el datatable
              cargarTabla(cargo,permisoEliminar);
            }else{
              toastr.warning("Conocimiento ya existe");
            }
        });
      }

  }
  //Se inicializa en 0 para que al cambiar de cargo los inputs nuevamente comiencen desde 0
  constante = 0;
  $("#conocimientos").empty();
  document.getElementById('btnAgregarListaDeConocimientos').style.display = 'none';
  document.getElementById('btnAgregarConocimiento').removeAttribute("style");
}

function bloquearBoton(){
    //oculto boton de agregar inputs
    document.getElementById('btnAgregarConocimiento').style.display = 'none';
    //muestro el boton de guardar
    document.getElementById('btnAgregarListaDeConocimientos').removeAttribute("style");
}

function autocompleteConocimientos() {
  var url = base_url+'getListadoConocimientos';
  var conocimiento = [];
  $.getJSON(url, function (result) {
      $.each(result, function (i, o) {
          conocimiento.push(o.atr_descripcion);
      });
  });
  $( ".autocompleteConocimientos" ).autocomplete({
    source: conocimiento
  });
}

// Agrega un input cada vez que es llamada la función 'agregarTarea()'
// Llama a la función contar para saber qué id es el siguiente en ser concatenado al id
function agregarConocimiento() {
   constante = constante+1;
   var fila = document.getElementById("conocimientos");
   var count = contar();
   fila.innerHTML += '<div class="col-md-12 perfilOcupacional" ><input type="text" style="margin-bottom:15px;" class="form-control custom-input-sm " onkeypress="bloquearBoton()" id="input_tarea'+count+'"></div>';
}

// la función contar me devuelve la cantidad de inputs que comienzen con id='input_tarea'
function contar (){
  var inputs = $('input[id^=input_tarea]');
  var count = inputs.length+1;
  return count;
}
