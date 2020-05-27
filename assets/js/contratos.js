var base_url = 'https://imlchile.cl/ grupofirma/index.php/';

/*************************** CONTRATO ****************************/

function cargarTabla(permisoSubir){
  var table = $('#tabla_trabajador').DataTable();
  table.destroy();

  var btnAcciones = "";

  // DESCARGAR CONTRATOS


    btnAcciones += '<button style="display:inline" type="button" id="btnVerListaContratos" class="btn btn-info btn-sm" data-toggle="modal" data-target="#modalVerListaContratos"><i class="glyphicon glyphicon-folder-open"></i></button>';

  // VER CONTRATOS
  if (permisoSubir == "si") {
      btnAcciones += '<button style="display:inline" type="button" id="btnModalCargarArchivo" class="btn btn-info btn-sm" data-toggle="modal" data-target="#modalCargarArchivo"><i class="glyphicon glyphicon-open"></i></button>';
  }else{
    btnAcciones += '<button style="display:inline" type="button" id="btnModalCargarArchivo" class="btn btn-default btn-sm" disabled data-toggle="modal" data-target="#modalCargarArchivo"><i class="glyphicon glyphicon-open"></i></button>';
  }

  $('.dataTables-trabajadores').DataTable({
    "autoWidth": false,
    "sInfo": false,
    "sInfoEmpty": false,
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
            "buttons": {
                "copy": "Copiar",
                "colvis": "Visibilidad"
            }
        },
        "ajax": {
            url: "https://imlchile.cl/ grupofirma/index.php/getListadoTrabajadoresContrato",
            type: 'GET'
        },
        "columnDefs": [{
                "targets": 5,
                "data": null,
                "defaultContent": btnAcciones
            }

        ],dom: '<"html5buttons"B>lTfgitp',
        buttons: [
        ]
    });
}

function getContratosTrabajador(idTrabajador){
  var permisoDescargar = $("#permisoDescargar").text();
  $.ajax({
      url: 'getContratosTrabajador',
      type: 'POST',
      dataType: 'json',
      data: {"idTrabajador": idTrabajador}
  }).then(function (response) {
      var fila = "";
      var download = "";

      $("#modalDetalleTrabajador").empty();

      fila +='<h5 class="modal-title mx-auto">LISTADO DE CONTRATOS</h5><button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>';
      fila +='<table class="table table-bordered tableInModal" style="margin-top:20px;"> <thead> <tr> <td class="text-center">Contrato</td> <td class="text-center">Fecha de inicio</td> <td class="text-center">Fecha de termino</td> <td class="text-center">Cargo</td> <td class="text-center">Descargar</td> </tr> </thead> <tbody>';
      $.each(response.msg, function (i, o) {

        fila +='<tr>';
        fila +='<td>'+o.cp_contrato+'</td>';
        fila +='<td>'+o.atr_fechaInicio+'</td>';
        fila +='<td>'+o.atr_fechaTermino+'</td>';
        fila +='<td>'+o.atr_nombre+'</td>';

        if(o.atr_ruta == "vacio"){
          if (permisoDescargar == "si") {
            fila += '<td> <a class="btn btn-default btn-sm" href="#"><i class="glyphicon glyphicon-download-alt"></i></a> </td>';
          }else{
            fila += '<td> <a class="btn btn-default btn-sm" href="#"><i class="glyphicon glyphicon-download-alt"></i></a> </td>';
          }
        }else{
          download = "https://imlchile.cl/ grupofirma/index.php/ContratosController/descargarContrato/"+o.cp_contrato;
          if (permisoDescargar == "si") {
            fila +='<td> <a class="btn btn-info btn-sm" href="'+download+'" download><i class="glyphicon glyphicon-download-alt"></i></a> </td>';
          }else{
            fila += '<td><a class="btn btn-default btn-sm" href="#"><i class="glyphicon glyphicon-download-alt"></i></a> </td>';
          }
        }

        fila +='</tr>';
      });
      fila +='</body> </table>';
      $("#modalDetalleTrabajador").append(fila);

  });
}

function seleccionTabs(nombre){
  cargarElementosDeContrato();
  var elemento = document.getElementById(nombre);
  elemento.style.color = "#fafafa";
  elemento.style.backgroundColor  = "#2a3f54";
  if(nombre == "estandar"){
    document.getElementById('personalizado').style = "";
  }else{
    document.getElementById('estandar').style = "";
  }
}

function cargarElementosDeContrato(){
  var url = base_url+'getTrabajadores';
  $("#selectTrabajador1").empty();
  $("#selectTrabajador2").empty();
  var fila = "<option disabled selected>Seleccione una opción</option>";
  $.getJSON(url, function (result) {
      $.each(result, function (i, o) {
          fila += "<option value='" + o.cp_trabajador + "'>" + o.atr_nombres +" "+o.atr_apellidos+ "</option>";
      });
      $("#selectTrabajador1").append(fila);
      $("#selectTrabajador2").append(fila);
  });
}

function cargarDatosEsenciales(idTrabajador){
  $.ajax({
      url: 'getDetalleTrabajadorContrato',
      type: 'POST',
      dataType: 'json',
      data: {"id": idTrabajador}
  }).then(function (msg) {
      // información del trabajador
      $.each(msg.arrayTrabajador, function (i, p) {


        $("#rut").val(p.atr_rut);
        $("#direccion").val(p.atr_direccion);
        $("#cargo").val(p.cargo);
        $("#empresa").val(p.empresa);
        $("#jefeDirecto").val(p.atr_jefeDirecto);
        $("#afp").val(p.afp);
        $("#prevision").val(p.prevision);
        $("#nacionalidad").val(p.nacionalidad);
        $("#fechaNacimiento").val(p.atr_fechaNacimiento);
        $("#ciudad").val(p.ciudadEmpresa);
        $("#estadoCivil").val(p.estadocivil);
        $("#repre_legal").val(p.repre_legal);
        $("#repre_rut").val(p.repre_rut);



        // informacion de remuneración
        var filaRemuneracion = "";
        $("#getDetalleRemuneracion").empty();

        $.each(msg.arrayRemuneracion, function (i, o) {
          filaRemuneracion += '<ul>';
          filaRemuneracion += '<li><h6 style="color:#49505c;">Sueldo: $'+p.atr_sueldo+'</h6></li>';
          if(o.atr_cotizaciones == 1){
            filaRemuneracion += '<li><h6 style="color:#49505c;">+Imposiciones</h6></li>';
          }
          if(o.atr_colacion > 0){
            filaRemuneracion += '<li><h6 style="color:#49505c;">Colación: $'+o.atr_colacion+' </h6></li>';
          }
          if(o.atr_movilizacion > 0){
            filaRemuneracion += '<li><h6 style="color:#49505c;">Movilización: $'+o.atr_colacion+' </h6></li>';
          }
          $.each(msg.arrayRemuneracionExtra, function (i, o) {
            filaRemuneracion += '<li><h6 style="color:#49505c;">'+o.atr_descripcion+' </h6></li>';
          });
          filaRemuneracion += '</ul>';
          $("#getDetalleRemuneracion").append(filaRemuneracion);
        });

      });
  });
}










function cargarDatosEsenciales2(idTrabajador){
  $.ajax({
      url: 'getDetalleTrabajadorContrato',
      type: 'POST',
      dataType: 'json',
      data: {"id": idTrabajador}
  }).then(function (msg) {
      // información del trabajador
      $.each(msg.arrayTrabajador, function (i, p) {

        $("#rut2").val(p.atr_rut);
        $("#direccion2").val(p.atr_direccion);
        $("#cargo2").val(p.cargo);
        $("#empresa2").val(p.empresa);
        $("#jefeDirecto2").val(p.atr_jefeDirecto);
        $("#afp2").val(p.afp);
        $("#prevision2").val(p.prevision);
        $("#nacionalidad2").val(p.nacionalidad);
        $("#fechaNacimiento2").val(p.atr_fechaNacimiento);
        $("#ciudad2").val(p.ciudadEmpresa);
        $("#estadoCivil2").val(p.estadocivil);
        $("#repre_legal2").val(p.repre_legal);
        $("#repre_rut2").val(p.repre_rut);


        // informacion de remuneración
        var filaRemuneracion = "";
        $("#getDetalleRemuneracion2").empty();
        $.each(msg.arrayRemuneracion, function (i, o) {
          filaRemuneracion += '<ul>';
          filaRemuneracion += '<li><h6 style="color:#49505c;">Sueldo: $'+p.atr_sueldo+'</h6></li>';
          if(o.atr_cotizaciones == 1){
            filaRemuneracion += '<li><h6 style="color:#49505c;">+Imposiciones</h6></li>';
          }
          if(o.atr_colacion > 0){
            filaRemuneracion += '<li><h6 style="color:#49505c;">Colación: $'+o.atr_colacion+' </h6></li>';
          }
          if(o.atr_movilizacion > 0){
            filaRemuneracion += '<li><h6 style="color:#49505c;">Movilización: $'+o.atr_colacion+' </h6></li>';
          }
          $.each(msg.arrayRemuneracionExtra, function (i, o) {
            filaRemuneracion += '<li><h6 style="color:#49505c;">'+o.atr_descripcion+' </h6></li>';
          });
          filaRemuneracion += '</ul>';
          $("#getDetalleRemuneracion2").append(filaRemuneracion);
        });
      });
  });
}



function getItemsContrato(){
    var url = base_url+'getItemsContrato';
    $("#ordenable").empty();
    var fila = '';
    var contadorItems = 0;
    $.getJSON(url, function (result) {
        $.each(result, function (i, o) {
            fila += '<li class="form-control itemContrato" id="'+contadorItems+'" style="margin-bottom:10px;" ondblclick="alertDobleClick('+contadorItems+')">'+o.atr_nombre+'</li>';
            contadorItems = contadorItems + 1;
        });
        $("#ordenable").append(fila);
    });
}

function alertDobleClick(numeroItem){
  numeroItem = "#"+numeroItem;
  $(numeroItem).remove();
}
