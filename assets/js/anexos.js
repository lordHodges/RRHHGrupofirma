var base_url = 'http://imlchile.cl/grupofirma/index.php/';
var numID = 0;
var contador = 0;

/*************************** CONTRATO ****************************/

function cargarTabla(){
  var table = $('#tabla_trabajador').DataTable();
  table.destroy();

  $('.dataTables-trabajadores').DataTable({
    "autoWidth": false,
    "sInfo": false,
    "sInfoEmpty": false,
        language: {
            "sProcessing": "Procesando...",
            "sLengthMenu": "Registros _MENU_ ",
            "sZeroRecords": "No se encontraron resultados",
            "sEmptyTable": "Ningún dato disponible en esta tabla",
            "sInfo": "",
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
            "buttons": {
                "copy": "Copiar",
                "colvis": "Visibilidad"
            }
        },
        "ajax": {
            url: "http://imlchile.cl/grupofirma/index.php/getListadoTrabajadoresContrato",
            type: 'GET'
        },
        "columnDefs": [{
                "targets": 5,
                "data": null,
                "defaultContent": '<button style="display:inline" type="button" id="btnVerListaContratos" class="btn btn-info btn-sm" data-toggle="modal" data-target="#modalVerListaContratos"><i class="glyphicon glyphicon-folder-open"></i></button>   <button style="display:inline" type="button" id="btnModalCargarArchivo" class="btn btn-info btn-sm" data-toggle="modal" data-target="#modalCargarArchivo"><i class="glyphicon glyphicon-open"></i></button>'
            }

        ],dom: '<"html5buttons"B>lTfgitp',
        buttons: [
        ]
    });
}

function getContratosTrabajador(idTrabajador){
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
          fila +='<td> <a class="btn btn-ded btn-sm" class="isDisabled" href="#"><i class="glyphicon glyphicon-download-alt"></i></a> </td>';
        }else{
          download = "http://imlchile.cl/grupofirma/index.php/ContratosController/descargarContrato/"+o.cp_contrato;
          fila +='<td> <a class="btn btn-info btn-sm" href="'+download+'" download><i class="glyphicon glyphicon-download-alt"></i></a> </td>';
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
    document.getElementById('modificacionCualquierClausula').style = "";
    document.getElementById('horasExtras').style = "";
  }else{
    if ( nombre == 'modificacionCualquierClausula') {
      document.getElementById('estandar').style = "";
      document.getElementById('horasExtras').style = "";
    }else{
      if ( nombre == 'horasExtras') {
        document.getElementById('estandar').style = "";
        document.getElementById('modificacionCualquierClausula').style = "";
      }
    }
  }
}

function cargarElementosDeContrato(){
  var url = base_url+'getTrabajadores';
  $("#selectTrabajador1").empty();
  $("#selectTrabajador2").empty();
  $("#selectTrabajador3").empty();
  var fila = "<option disabled selected>Seleccione una opción</option>";
  $.getJSON(url, function (result) {
      $.each(result, function (i, o) {
          fila += "<option value='" + o.cp_trabajador + "'>" + o.atr_nombres +" "+o.atr_apellidos+ "</option>";
      });
      $("#selectTrabajador1").append(fila);
      $("#selectTrabajador2").append(fila);
      $("#selectTrabajador3").append(fila);
  });
}

function cargarDatosEsenciales(idTrabajador){

  $.ajax({
      url: 'getDetalleTrabajadorContrato',
      type: 'POST',
      dataType: 'json',
      data: {"id": idTrabajador}
  }).then(function (msg) {
      $("#btnGenerarAnexoProrroga").removeAttr("style");
      // información del trabajador y empresa
      $.each(msg.arrayTrabajador, function (i, o) {
        $("#rut").val(o.atr_rut);
        $("#direccion").val(o.atr_direccion);
        $("#empresa").val(o.empresa);
        $("#jefeDirecto").val(o.atr_jefeDirecto);
        $("#ciudad").val(o.ciudadEmpresa);
        $("#estadoCivil").val(o.estadocivil);
        $("#repre_legal").val(o.repre_legal);
        $("#repre_rut").val(o.repre_rut);
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
      $.each(msg.arrayTrabajador, function (i, o) {

        $("#rut2").val(o.atr_rut);
        $("#direccion2").val(o.atr_direccion);
        $("#cargo2").val(o.cargo);
        $("#empresa2").val(o.empresa);
        $("#jefeDirecto2").val(o.atr_jefeDirecto);
        $("#afp2").val(o.afp);
        $("#prevision2").val(o.prevision);
        $("#nacionalidad2").val(o.nacionalidad);
        $("#fechaNacimiento2").val(o.atr_fechaNacimiento);
        $("#ciudad2").val(o.ciudadEmpresa);
        $("#estadoCivil2").val(o.estadocivil);
        $("#repre_legal2").val(o.repre_legal);
        $("#repre_rut2").val(o.repre_rut);
      });

      // informacion de remuneración
      var filaRemuneracion = "";
      $("#getDetalleRemuneracion2").empty();
      $.each(msg.arrayRemuneracion, function (i, o) {
        filaRemuneracion += '<ul>';
        filaRemuneracion += '<li><h6 style="color:#49505c;">Sueldo: $'+o.atr_sueldoMensual+'</h6></li>';
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
}


function cargarDatosEsenciales3(idTrabajador){
  $.ajax({
      url: 'getDetalleTrabajadorContrato',
      type: 'POST',
      dataType: 'json',
      data: {"id": idTrabajador}
  }).then(function (msg) {
      // información del trabajador
      $.each(msg.arrayTrabajador, function (i, o) {
        $("#rut3").val(o.atr_rut);
        $("#direccion3").val(o.atr_direccion);
        $("#cargo3").val(o.cargo);
        $("#empresa3").val(o.empresa);
        $("#jefeDirecto3").val(o.atr_jefeDirecto);
        $("#afp3").val(o.afp);
        $("#prevision3").val(o.prevision);
        $("#nacionalidad3").val(o.nacionalidad);
        $("#fechaNacimiento3").val(o.atr_fechaNacimiento);
        $("#ciudad3").val(o.ciudadEmpresa);
        $("#estadoCivil3").val(o.estadocivil);
        $("#repre_legal3").val(o.repre_legal);
        $("#repre_rut3").val(o.repre_rut);
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



function agregarNuevaClausulaParaModificarProrroga(){
  var url = base_url+'getItemsContrato';
  var fila = '';

  $.getJSON(url, function (result) {
      numeroRomanoID = 'idNumeroRomano_'+numID;
      clausulaID = 'idClausula_'+numID;
      textoAreaID = 'idTextoArea_'+numID;

      fila += '<div class="col-md-4 mt-4"><label for="fechaComienzoIndefinido">NÚMERO ORIGINAL DE LA CLÁUSULA</label><input type="text" onkeyup="this.value=soloLetrasRomanas(this.value)" oninput="mayus(this);" class="form-control" id="'+numeroRomanoID+'"/></div>';
      fila += '<div class="col-md-8 mt-4"><label for="getSelectClausula">CLÁUSULA A MODIFICAR</label><br><select onchange="rellenarItemsProrroga(this)" class="custom-select" id="'+clausulaID+'">';
      fila += '<option>Seleccionar una opción</option>';
      $.each(result, function (i, o) {
          fila += '<option value="'+o.atr_nombre+'">'+o.atr_nombre+'</option>';
      });
      fila += '</select></div>';
      fila += '<div class="col-md-12 mt-2"> <label for="nuevaClausula">MODIFICACIÓN</label><br> <textarea class="form-control" id="'+textoAreaID+'" rows="5"></textarea> </div>';
      $("#contenedorNuevasClausulas").append(fila);

      numID = numID + 1;
      contador = contador + 1;
  });
}



function agregarNuevaClausulaParaModificarProrrogaLicitación(){
  var url = base_url+'getItemsContrato';
  var fila = '';

  $.getJSON(url, function (result) {
      numeroRomanoID = 'idNumeroRomano_'+numID;
      clausulaID = 'idClausula_'+numID;
      textoAreaID = 'idTextoArea_'+numID;

      fila += '<div class="col-md-4 mt-4"><label for="fechaComienzoIndefinido">NÚMERO ORIGINAL DE LA CLÁUSULA</label><input type="text" onkeyup="this.value=soloLetrasRomanas(this.value)" oninput="mayus(this);" class="form-control" id="'+numeroRomanoID+'"/></div>';
      fila += '<div class="col-md-8 mt-4"><label for="getSelectClausula">CLÁUSULA A MODIFICAR</label><br><select onchange="rellenarItemsProrrogaLicitacion(this)" class="custom-select" id="'+clausulaID+'">';
      fila += '<option>Seleccionar una opción</option>';
      $.each(result, function (i, o) {
          fila += '<option value="'+o.atr_nombre+'">'+o.atr_nombre+'</option>';
      });
      fila += '</select></div>';
      fila += '<div class="col-md-12 mt-2"> <label for="nuevaClausula">MODIFICACIÓN</label><br> <textarea class="form-control" id="'+textoAreaID+'" rows="5"></textarea> </div>';
      $("#contenedorNuevasClausulas").append(fila);

      numID = numID + 1;
      contador = contador + 1;
  });
}



function cntClausulasModificadas(){
  return contador;
}

function transformarFechaLetras(fecha){

}

function rellenarItemsProrroga(select){
  var trabajador = $("#selectTrabajador1").val();

  var idSelect =  $(select).attr('id') ;
  idSelect = idSelect.split("_");
  idSelect = idSelect[1];
  var ciudadFirma = $('#getSelectCiudad option:selected').html();
  var texto = "";

  var fecha =  $("#fechaComienzoIndefinido").val();
  fecha = fecha.split("-");
  fecha = fecha[2]+"-"+fecha[1]+"-"+fecha[0];


  // OBTENER DATOS DEL TRABAJADOR ( ArrayTrabajador - ArrayRemuneracion - ArrayRemuneracionExtra )


  switch (select.value) {
  case "Partes":
    $.ajax({
        url: 'getInfoTrabajadorEmpresa',
        type: 'POST',
        dataType: 'json',
        data: {"idTrabajador": trabajador}
    }).then(function (msg) {
        var infoTrabajador = msg;
        $.ajax({
            url: 'transformarFechaLetras',
            type: 'POST',
            dataType: 'json',
            data: {"fecha": fecha}
        }).then(function (msg) {
          fecha = msg;
          $.each(infoTrabajador, function (i, o) {
            texto = "En "+ciudadFirma+", a "+fecha+" entre "+o.empresa+", Rol único tributario N°"+o.runEmpresa+", representada legalmente por "+o.repre_legal+"";
            texto += ", cédula de identidad N°"+o.repre_rut+", ambos con domicilio en "+o.direccionEmpresa+", comuna y ciudad de "+o.ciudadEmpresa+", en adelante ";
            texto += "el empleador y doña "+o.atr_nombres+" "+o.atr_apellidos+", cédula de identidad N°"+o.atr_rut+", con domicilio en "+o.atr_direccion+"";
            texto += ", ciudad de "+o.ciudadEmpresa+", en adelante la trabajadora, se ha convenido el siguiente anexo de contrato de trabajo:";
            $("#idTextoArea_"+idSelect).val(texto);
          });
        });
    });

    break;
  case "Naturaleza de los servicios":
    $.ajax({
        url: 'getInfoTrabajadorEmpresa',
        type: 'POST',
        dataType: 'json',
        data: {"idTrabajador": trabajador}
    }).then(function (msg) {
        var infoTrabajador = msg;
        $.ajax({
            url: 'transformarFechaLetras',
            type: 'POST',
            dataType: 'json',
            data: {"fecha": fecha}
        }).then(function (msg) {
          fecha = msg;
          $.each(infoTrabajador, function (i, o) {
            var cargo = o.cargo;
            var idCargo = o.idCargo;
            cargo = cargo.toUpperCase();
            texto = 'El trabajador se compromete y obliga a ejecutar el trabajo de '+cargo+', debiendo realizar las actividades que se le sean encontradas, entre ellas:\n\n';
            $.ajax({
                url: 'getListadoTareasViewContrato',
                type: 'POST',
                dataType: 'json',
                data: {"cargo": idCargo}
            }).then(function (funciones) {
              texto += '<ul style="text-align:justify; font-style: italic; margin-top:-10px">\n\n';
              $.each(funciones, function (i, o) {
                texto += '<li >'+o.atr_descripcion+'</li>\n';
              });
              texto += '\n</ul>\n\n';
              $("#idTextoArea_"+idSelect).val(texto);
            });

          });
        });
    });
    break;

  case "Lugar de prestación de servicios":
    $.ajax({
        url: 'getInfoTrabajadorEmpresa',
        type: 'POST',
        dataType: 'json',
        data: {"idTrabajador": trabajador}
    }).then(function (msg) {
        $.each(msg, function (i, o) {
          texto = o.atr_lugarTrabajo;
          $("#idTextoArea_"+idSelect).val(texto);
        });
    });
    break;

  case "Jornada de trabajo":
    $.ajax({
        url: 'getInfoTrabajadorEmpresa',
        type: 'POST',
        dataType: 'json',
        data: {"idTrabajador": trabajador}
    }).then(function (msg) {
        $.each(msg, function (i, o) {
          texto = o.atr_jornadaTrabajo;
          $("#idTextoArea_"+idSelect).val(texto);
        });
    });
    break;

  case "Remuneraciones":
    texto = "El empleador se compromete a remunerar los servicios del trabajador con un sueldo mensual de $301.000(trescientos un mil pesos).";
    // texto += " gratificación mensual equivalente al 25% del total de las remuneraciones mensuales, con tope legal de 4.75 ingresos mínimos mensuales. <br><br> La remuneración será liquidada y";
    // texto += " pagada el día 05 de cada mes calendario. Se aplicarán las deducciones de impuestos que las graven, las cotizaciones de seguridad social y otras, de conformidad a lo establecido en el artículo 58 del código del trabajo.";
      $("#idTextoArea_"+idSelect).val(texto);
    break;

  case "Duración de la relación jurídica laboral":
  $.ajax({
      url: 'transformarFechaLetras',
      type: 'POST',
      dataType: 'json',
      data: {"fecha": fecha}
  }).then(function (msg) {
    texto = "A partir de esta fecha "+msg+", de común acuerdo entre las partes, establecen que el presente contrato tendrá una duración INDEFINIDA";
    $("#idTextoArea_"+idSelect).val(texto);
  });

    break;

  case "Cláusula de vigencia":
    texto = "A partir de esta fecha "+fecha+", de común acuerdo entre las partes, establecen que el presente contrato tendrá una duración INDEFINIDA";
    $("#idTextoArea_"+idSelect).val(texto);

  case "A tener en cuenta ":
    texto = "";
    $("#idTextoArea_"+idSelect).val(texto);
    break;

  case "Cláusula de confidencialidad ":
    texto = "";
    $("#idTextoArea_"+idSelect).val(texto);
    break;

  case "Propiedad intelectual":
    texto = "El trabajador confiere los derechos de propiedad intelectual al empleador sobre todo el desarrollo, cediendo todos los derechos de explotación y propiedad de estos. En este sentido, el trabajador, garantiza al empleador que el desarrollo es absolutamente original ";
    texto += "y confidencial, como también que CEDE la totalidad de los derechos de propiedad intelectual sobre el mismo, habiendo sido completamente realizado por éste, por lo que puede garantizar que todo el software y las herramientas utilizadas no vulneran ninguna normativa, contrato, derecho, interés o propiedad de terceros.";
    $("#idTextoArea_"+idSelect).val(texto);
    break;
  }
}







function rellenarItemsProrrogaLicitacion(select){
  var trabajador = $("#selectTrabajador1").val();

  var idSelect =  $(select).attr('id') ;
  idSelect = idSelect.split("_");
  idSelect = idSelect[1];
  var ciudadFirma = $('#getSelectCiudad option:selected').html();
  var texto = "";

  var fecha =  $("#sujetoLicitacion").val();
  fecha = fecha.split("-");
  fecha = fecha[2]+"-"+fecha[1]+"-"+fecha[0];
  // OBTENER DATOS DEL TRABAJADOR ( ArrayTrabajador - ArrayRemuneracion - ArrayRemuneracionExtra )


  switch (select.value) {
  case "Partes":
    $.ajax({
        url: 'getInfoTrabajadorEmpresa',
        type: 'POST',
        dataType: 'json',
        data: {"idTrabajador": trabajador}
    }).then(function (msg) {
        var infoTrabajador = msg;
        $.ajax({
            url: 'transformarFechaLetras',
            type: 'POST',
            dataType: 'json',
            data: {"fecha": fecha}
        }).then(function (msg) {
          fecha = msg;
          $.each(infoTrabajador, function (i, o) {
            texto = "En "+ciudadFirma+", a "+fecha+" entre "+o.empresa+", Rol único tributario N°"+o.runEmpresa+", representada legalmente por "+o.repre_legal+"";
            texto += ", cédula de identidad N°"+o.repre_rut+", ambos con domicilio en "+o.direccionEmpresa+", comuna y ciudad de "+o.ciudadEmpresa+", en adelante ";
            texto += "el empleador y doña "+o.atr_nombres+" "+o.atr_apellidos+", cédula de identidad N°"+o.atr_rut+", con domicilio en "+o.atr_direccion+"";
            texto += ", ciudad de "+o.ciudadEmpresa+", en adelante la trabajadora, se ha convenido el siguiente anexo de contrato de trabajo:";
            $("#idTextoArea_"+idSelect).val(texto);
          });
        });
    });

    break;
  case "Naturaleza de los servicios":
    $.ajax({
        url: 'getInfoTrabajadorEmpresa',
        type: 'POST',
        dataType: 'json',
        data: {"idTrabajador": trabajador}
    }).then(function (msg) {
        var infoTrabajador = msg;
        $.ajax({
            url: 'transformarFechaLetras',
            type: 'POST',
            dataType: 'json',
            data: {"fecha": fecha}
        }).then(function (msg) {
          fecha = msg;
          $.each(infoTrabajador, function (i, o) {
            var cargo = o.cargo;
            var idCargo = o.idCargo;
            cargo = cargo.toUpperCase();
            texto = 'El trabajador se compromete y obliga a ejecutar el trabajo de '+cargo+', debiendo realizar las actividades que se le sean encontradas, entre ellas:\n\n';
            $.ajax({
                url: 'getListadoTareasViewContrato',
                type: 'POST',
                dataType: 'json',
                data: {"cargo": idCargo}
            }).then(function (funciones) {
              texto += '<ul style="text-align:justify; font-style: italic; margin-top:-10px">\n\n';
              $.each(funciones, function (i, o) {
                texto += '<li>'+o.atr_descripcion+'</li>\n';
              });
              texto += '</ul>\n\n';
              $("#idTextoArea_"+idSelect).val(texto);
            });

          });
        });
    });

    break;

  case "Lugar de prestación de servicios":
    $.ajax({
        url: 'getInfoTrabajadorEmpresa',
        type: 'POST',
        dataType: 'json',
        data: {"idTrabajador": trabajador}
    }).then(function (msg) {
        $.each(msg, function (i, o) {
          texto = o.atr_lugarTrabajo;
          $("#idTextoArea_"+idSelect).val(texto);
        });
    });
    break;

  case "Jornada de trabajo":
    $.ajax({
        url: 'getInfoTrabajadorEmpresa',
        type: 'POST',
        dataType: 'json',
        data: {"idTrabajador": trabajador}
    }).then(function (msg) {
        $.each(msg, function (i, o) {
          texto = o.atr_jornadaTrabajo;
          $("#idTextoArea_"+idSelect).val(texto);
        });
    });
    break;

  case "Remuneraciones":
    texto = "El empleador se compromete a remunerar los servicios del trabajador con un sueldo mensual de $301.000(trescientos un mil pesos).";
    // texto += " gratificación mensual equivalente al 25% del total de las remuneraciones mensuales, con tope legal de 4.75 ingresos mínimos mensuales. <br><br> La remuneración será liquidada y";
    // texto += " pagada el día 05 de cada mes calendario. Se aplicarán las deducciones de impuestos que las graven, las cotizaciones de seguridad social y otras, de conformidad a lo establecido en el artículo 58 del código del trabajo.";
      $("#idTextoArea_"+idSelect).val(texto);
    break;

  case "Duración de la relación jurídica laboral":
    texto = "El presente contrato tendrá una duración hasta la fecha de vencimiento de la licitación denominada .... , identificada con numero de ";
    texto += "ID: xxxx-x-xxxx , para la cual el trabajador ejerce sus funciones.";
    $("#idTextoArea_"+idSelect).val(texto);
    break;

  case "Cláusula de vigencia":
    texto = "Se deja constancia que el trabajador comenzó el "+fecha+" a prestar servicios";
    $("#idTextoArea_"+idSelect).val(texto);

  case "A tener en cuenta ":
    texto = "";
    $("#idTextoArea_"+idSelect).val(texto);
    break;

  case "Cláusula de confidencialidad ":
    texto = "";
    $("#idTextoArea_"+idSelect).val(texto);
    break;

  case "Propiedad intelectual":
    texto = "El trabajador confiere los derechos de propiedad intelectual al empleador sobre todo el desarrollo, cediendo todos los derechos de explotación y propiedad de estos. En este sentido, el trabajador, garantiza al empleador que el desarrollo es absolutamente original ";
    texto += "y confidencial, como también que CEDE la totalidad de los derechos de propiedad intelectual sobre el mismo, habiendo sido completamente realizado por éste, por lo que puede garantizar que todo el software y las herramientas utilizadas no vulneran ninguna normativa, contrato, derecho, interés o propiedad de terceros.";
    $("#idTextoArea_"+idSelect).val(texto);
    break;
  }
}


































function agregarNuevaClausulaParaModificarGeneral(){
  var url = base_url+'getItemsContrato';
  var fila = '';

  $.getJSON(url, function (result) {
      numeroRomanoID = 'idNumeroRomano_'+numID;
      clausulaID = 'idClausula_'+numID;
      textoAreaID = 'idTextoArea_'+numID;

      fila += '<div class="col-md-4 mt-4"><label for="fechaComienzoIndefinido">NÚMERO ORIGINAL DE LA CLÁUSULA</label><input type="text" onkeyup="this.value=soloLetrasRomanas(this.value)" oninput="mayus(this);" class="form-control" id="'+numeroRomanoID+'"/></div>';
      fila += '<div class="col-md-8 mt-4"><label for="getSelectClausula">CLÁUSULA A MODIFICAR</label><br><select onchange="rellenarItemsProrrogaGeneral(this)" class="custom-select" id="'+clausulaID+'">';
      fila += '<option>Seleccionar una opción</option>';
      $.each(result, function (i, o) {
          fila += '<option value="'+o.atr_nombre+'">'+o.atr_nombre+'</option>';
      });
      fila += '</select></div>';
      fila += '<div class="col-md-12 mt-2"> <label for="nuevaClausula">MODIFICACIÓN</label><br> <textarea class="form-control" id="'+textoAreaID+'" rows="5"></textarea> </div>';
      $("#contenedorNuevasClausulas2").append(fila);

      numID = numID + 1;
      contador = contador + 1;
  });
}

function rellenarItemsProrrogaGeneral(select){
  var trabajador = $("#selectTrabajador2").val();


  var idSelect =  $(select).attr('id') ;
  idSelect = idSelect.split("_");
  idSelect = idSelect[1];
  var ciudadFirma = $('#getSelectCiudad2 option:selected').html();
  var texto = "";

  var fecha =  $("#fechaTerminoExtencion2").val();

  fecha = fecha.split("-");
  fecha = fecha[2]+"-"+fecha[1]+"-"+fecha[0];



  switch (select.value) {
  case "Partes":
    $.ajax({
        url: 'getInfoTrabajadorEmpresa',
        type: 'POST',
        dataType: 'json',
        data: {"idTrabajador": trabajador}
    }).then(function (msg) {
        var infoTrabajador = msg;
        $.ajax({
            url: 'transformarFechaLetras',
            type: 'POST',
            dataType: 'json',
            data: {"fecha": fecha}
        }).then(function (msg) {
          fecha = msg;
          $.each(infoTrabajador, function (i, o) {
            texto = "En "+ciudadFirma+", a "+fecha+" entre "+o.empresa+", Rol único tributario N°"+o.runEmpresa+", representada legalmente por "+o.repre_legal+"";
            texto += ", cédula de identidad N°"+o.repre_rut+", ambos con domicilio en "+o.direccionEmpresa+", comuna y ciudad de "+o.ciudadEmpresa+", en adelante ";
            texto += "el empleador y doña "+o.atr_nombres+" "+o.atr_apellidos+", cédula de identidad N°"+o.atr_rut+", con domicilio en "+o.atr_direccion+"";
            texto += ", ciudad de "+o.ciudadEmpresa+", en adelante la trabajadora, se ha convenido el siguiente anexo de contrato de trabajo:";
            $("#idTextoArea_"+idSelect).val(texto);
          });
        });
    });

    break;
  case "Naturaleza de los servicios":
    $.ajax({
        url: 'getInfoTrabajadorEmpresa',
        type: 'POST',
        dataType: 'json',
        data: {"idTrabajador": trabajador}
    }).then(function (msg) {
        var infoTrabajador = msg;
        $.ajax({
            url: 'transformarFechaLetras',
            type: 'POST',
            dataType: 'json',
            data: {"fecha": fecha}
        }).then(function (msg) {
          fecha = msg;
          $.each(infoTrabajador, function (i, o) {
            var cargo = o.cargo;
            var idCargo = o.idCargo;
            cargo = cargo.toUpperCase();
            texto = 'El trabajador se compromete y obliga a ejecutar el trabajo de '+cargo+', debiendo realizar las actividades que se le sean encontradas, entre ellas:\n\n';
            $.ajax({
                url: 'getListadoTareasViewContrato',
                type: 'POST',
                dataType: 'json',
                data: {"cargo": idCargo}
            }).then(function (funciones) {
              texto += '<ul style="text-align:justify; font-style: italic; margin-top:-10px">\n\n';
              $.each(funciones, function (i, o) {
                texto += '<li >'+o.atr_descripcion+'</li>\n';
              });
              texto += '\n</ul>\n\n';
              $("#idTextoArea_"+idSelect).val(texto);
            });

          });
        });
    });
    break;

  case "Lugar de prestación de servicios":
    $.ajax({
        url: 'getInfoTrabajadorEmpresa',
        type: 'POST',
        dataType: 'json',
        data: {"idTrabajador": trabajador}
    }).then(function (msg) {
        $.each(msg, function (i, o) {
          texto = o.atr_lugarTrabajo;
          $("#idTextoArea_"+idSelect).val(texto);
        });
    });
    break;

  case "Jornada de trabajo":
    $.ajax({
        url: 'getInfoTrabajadorEmpresa',
        type: 'POST',
        dataType: 'json',
        data: {"idTrabajador": trabajador}
    }).then(function (msg) {
        $.each(msg, function (i, o) {
          texto = o.atr_jornadaTrabajo;
          $("#idTextoArea_"+idSelect).val(texto);
        });
    });
    break;

  case "Remuneraciones":
    texto = "El empleador se compromete a remunerar los servicios del trabajador con un sueldo mensual de $301.000(trescientos un mil pesos).";
    // texto += " gratificación mensual equivalente al 25% del total de las remuneraciones mensuales, con tope legal de 4.75 ingresos mínimos mensuales. <br><br> La remuneración será liquidada y";
    // texto += " pagada el día 05 de cada mes calendario. Se aplicarán las deducciones de impuestos que las graven, las cotizaciones de seguridad social y otras, de conformidad a lo establecido en el artículo 58 del código del trabajo.";
      $("#idTextoArea_"+idSelect).val(texto);
    break;

  case "Duración de la relación jurídica laboral":
  $.ajax({
      url: 'transformarFechaLetras',
      type: 'POST',
      dataType: 'json',
      data: {"fecha": fecha}
  }).then(function (msg) {
    texto = "A partir de esta fecha "+msg+", de común acuerdo entre las partes, establecen que el presente contrato tendrá una duración INDEFINIDA";
    $("#idTextoArea_"+idSelect).val(texto);
  });

    break;

  case "Cláusula de vigencia":
    texto = "A partir de esta fecha "+fecha+", de común acuerdo entre las partes, establecen que el presente contrato tendrá una duración INDEFINIDA";
    $("#idTextoArea_"+idSelect).val(texto);

  case "A tener en cuenta ":
    texto = "";
    $("#idTextoArea_"+idSelect).val(texto);
    break;

  case "Cláusula de confidencialidad ":
    texto = "";
    $("#idTextoArea_"+idSelect).val(texto);
    break;

  case "Propiedad intelectual":
    texto = "El trabajador confiere los derechos de propiedad intelectual al empleador sobre todo el desarrollo, cediendo todos los derechos de explotación y propiedad de estos. En este sentido, el trabajador, garantiza al empleador que el desarrollo es absolutamente original ";
    texto += "y confidencial, como también que CEDE la totalidad de los derechos de propiedad intelectual sobre el mismo, habiendo sido completamente realizado por éste, por lo que puede garantizar que todo el software y las herramientas utilizadas no vulneran ninguna normativa, contrato, derecho, interés o propiedad de terceros.";
    $("#idTextoArea_"+idSelect).val(texto);
    break;
  }
}
