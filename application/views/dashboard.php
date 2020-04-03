<div class="right_col" role="main">

            <div class="col-md-6 col-sm-12 " id="contenedorDeContratosPorCaducar">
              <div class="x_panel tile fixed_height_320">
                <div class="x_title">
                  <h2>CONTRATOS PRÓXIMOS A VENCER</h2>
                  <ul class="nav navbar-right panel_toolbox">
                    <li><a class="collapse-link"><i class="fa fa-chevron-up"></i></a>
                    </li>
                    <li><a class="close-link"><i class="fa fa-close"></i></a>
                    </li>
                  </ul>
                  <div class="clearfix"></div>
                </div>


                <div class="x_content">
                  <ul class="list-unstyled msg_list" id="contenedorTrabajadores">
                    
                  </ul>
                </div>


              </div>
            </div>









            <div class="col-md-6 col-sm-6  ">
              <div class="x_panel">
                <div class="x_title">
                  <h2>Pie Graph Chart <small>Sessions</small></h2>
                  <ul class="nav navbar-right panel_toolbox">
                    <li><a class="collapse-link"><i class="fa fa-chevron-up"></i></a>
                    </li>
                    <li class="dropdown">
                      <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-expanded="false"><i class="fa fa-wrench"></i></a>
                      <div class="dropdown-menu" aria-labelledby="dropdownMenuButton">
                          <a class="dropdown-item" href="#">Settings 1</a>
                          <a class="dropdown-item" href="#">Settings 2</a>
                        </div>
                    </li>
                    <li><a class="close-link"><i class="fa fa-close"></i></a>
                    </li>
                  </ul>
                  <div class="clearfix"></div>
                </div>
                <div class="x_content">
                  <canvas id="pieChart"></canvas>
                </div>
              </div>
            </div>


</div>

<!-- footer content -->
<footer>
  <div class="pull-right">

  </div>
  <div class="clearfix"></div>
</footer>
<!-- /footer content -->
</div>
</div>


<!-- jQuery -->
<script src="<?php echo base_url() ?>assets/vendors/jquery/dist/jquery.min.js"></script>
<!-- Bootstrap -->
<script src="<?php echo base_url() ?>assets/vendors/bootstrap/dist/js/bootstrap.bundle.min.js"></script>
<!-- Chart.js -->
<script src="<?php echo base_url() ?>assets/vendors/Chart.js/dist/Chart.min.js"></script>
<!-- DateJS -->
<script src="<?php echo base_url() ?>assets/vendors/DateJS/build/date.js"></script>
<!-- Moment.js -->
<script src="http://momentjs.com/downloads/moment.min.js"></script>
<!-- Custom Theme Scripts -->
<script src="<?php echo base_url() ?>assets/build/js/custom.min.js"></script>
<!-- MIS SCRIPTS -->
<script src="<?php echo base_url() ?>assets/js/dashboard.js"></script>






<script>
  $(document).ready(function() {

    $.ajax({
        url: 'buscarContratosPorVencer',
        type: 'GET',
        dataType: 'json',
        data: {}
    }).then(function (msg) {
      // Obtener y convertir fecha actual
      var fecha = new Date();
      var dia = fecha.getDate(); var mes = fecha.getMonth()+1; var ano = fecha.getFullYear();

      // if( dia.length == 1){
      //   dia = "0"+dia;
      // }
      // if( mes.length == 1){
      //   mes = "0"+mes;
      // }
      var fechaActual = dia+"-"+mes+"-"+ano;


      $("#contenedorTrabajadores").empty();
      var fila = "", tiempo = 0;

      $.each(msg.msg, function (i, o) {
        // Obtengo fecha desde la base de datos
        var fechaTermino = o.atr_fechaTermino;
        // calculo diferencia de fechas para saber cuántos días quedan antes de caducar el contrato.
        tiempo = calcularDias(fechaActual,fechaTermino);
        tiempo = Math.round(tiempo);
        if( tiempo <= 5){
          fila = '<li style="background-color:#cb3234; color:#fff"><a><span><span>'+o.atr_nombres+" "+o.atr_apellidos+'</span><span class="time">'+tiempo+' días para caducar</span></span>';
          fila += '<span class="message">El trabajador desempeña el cargo de '+o.cargo+'. <br> El contrato comenzo el '+o.atr_fechaInicio+'</span></a></li>';
      
          $("#contenedorTrabajadores").append(fila);
        }
        });
      

      if( $("#contenedorTrabajadores").html()=="" ){
        $("#contenedorDeContratosPorCaducar").css({ display: "none" });
      }

    });

  });
</script>
