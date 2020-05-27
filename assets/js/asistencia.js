var base_url = 'https://imlchile.cl/ grupofirma/index.php/';


function inicializarCalendario(){
    var initialLocaleCode = 'es';
    var calendarEl = document.getElementById('calendar');

      var calendar = new FullCalendar.Calendar(calendarEl, {

        plugins: [ 'interaction', 'dayGrid','timeGrid' ],

        header: {
          left: 'prev,next ',
          center: 'title',
          right: ''
        },
        locale: initialLocaleCode,
        buttonIcons: true, // show the prev/next text
        weekNumbers: false,
        navLinks: false, // can click day/week names to navigate views
        selectable: true,
        selectMirror: true,
        select: function(arg) {
          var mes, dia;



            // Abre el modal de insertar inasistencia
            $('#addInasistencia').modal({
                show: true
            });

            mes = arg.start.getMonth();
            mes = mes + 1;
            dia = arg.start.getDate();

            if (mes < 10) {
              mes = '0'+mes;
            }

            if (dia < 10) {
              dia = '0'+dia;
            }


            var fechaSeleccionada = dia+"-"+mes+"-"+arg.start.getFullYear();

            $("#fechaInasistencia").val(fechaSeleccionada);
          calendar.unselect()
        },
        editable: true,
        eventLimit: true, // allow "more" link when too many events
        eventSources: [
          {
            url : 'https://imlchile.cl/ grupofirma/index.php/getInasistencias',
            color: 'red',
            textColor: 'white'
          }
        ],
        // events: 'myfeed.php?start=2013-12-01T00:00:00-05:00&end=2014-01-12T00:00:00-05:00',
        // eventTextColor: '#fff',  //color del texto
        // eventBackgroundColor: '#1ABB9C', //color de fondo del evento
        // eventBorderColor: '#1ABB9C', // color de borde del evento
      });

      calendar.render();

}


function cargarTrabajadores(){
    var url = base_url+'getTrabajadores';
    $("#selectTrabajador1").empty();
    var fila = "<option disabled selected>Seleccione una opción</option>";
    $.getJSON(url, function (result) {
        $.each(result, function (i, o) {
            fila += "<option value='" + o.cp_trabajador + "'>" + o.atr_nombres +" "+o.atr_apellidos+ "</option>";
        });
        $("#selectTrabajador1").append(fila);
    });
}

function agregarInasistencia(){
    var fechaInasistencia = $("#fechaInasistencia").val();
    var motivo = $("#motivo").val();
    var idTrabajador = $("#selectTrabajador1").val();

    if ( motivo == "" || idTrabajador == null ) {
        toastr.error("Rellene todos los campos");
    } else {
        $.ajax({
            url: 'addInasistencia',
            type: 'POST',
            dataType: 'json',
            data: { "fecha":fechaInasistencia, "motivo":motivo, "idTrabajador":idTrabajador}
        }).then(function (msg) {
            if (msg == "ok") {
               toastr.success('Inasistencia ingresada')
               $('#addInasistencia').modal('hide');

               cargarTrabajadores();
               $("#motivo").val("");

               document.getElementById("calendar").innerHTML = "";
               inicializarCalendario();

            } else {
                toastr.error("Error en el ingreso.");
            }
        });
    }
}
