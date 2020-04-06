<div class="right_col" role="main">

  <div class="col-md-4">
    <div class="x_panel" style="background-color:#f7f7f7; border:none">
      <div class="row card-group">
        <div class="card text-white bg-primary">
          <div class="card-header" style="padding:7px;">
            <h4 class="text-center">Trabajadores totales</h4>
          </div>
          <div class="card-body" style="padding:10px; background-color:#fff; color:#000">
            <h4 class="card-text text-center">150</h4>
          </div>
        </div>
      </div>
    </div>
  </div>



  <div class="col-md-4">
    <div class="x_panel" style="background-color:#f7f7f7; border:none">
      <div class="row card-group">
        <div class="card text-white bg-primary">
          <div class="card-header"  style="padding:7px;">
            <h4 class="text-center">Contratos totales</h4>
          </div>
          <div class="card-body"  style="padding:10px; background-color:#fff; color:#000">
            <h4 class="card-text text-center">150</h4>
          </div>
        </div>
      </div>
    </div>
  </div>

  <div class="col-md-4">
    <div class="x_panel" style="background-color:#f7f7f7; border:none">
      <div class="row card-group">
        <div class="card text-white bg-primary">
          <div class="card-header"  style="padding:7px;">
            <h4 class="text-center">Cargos totales</h4>
          </div>
          <div class="card-body"  style="padding:10px; background-color:#fff; color:#000">
            <h4 class="card-text text-center">150</h4>
          </div>
        </div>
      </div>
    </div>
  </div>



<!--


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
  </div> -->

  <div class="col-md-6" id="contenedorDeContratosPorCaducar">
    <div class="x_panel">
      <div class="x_title">
        <h2 style="margin-left:12px;"><b>Contratos por vencer</b></h2>
        <ul class="nav navbar-right panel_toolbox" >
          <li><a class="collapse-link"><i class="fa fa-chevron-up"></i></a>
          </li>
        </ul>
        <div class="clearfix"></div>
      </div>
      <div class="x_content">
        <ul class="list-unstyled msg_list" style="display:inline;" id="contenedorNotificaciones">

        </ul>
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

<!-- Custom Theme Scripts -->
<script src="<?php echo base_url() ?>assets/build/js/custom.min.js"></script>
<!-- Mis JS -->
<script src="<?php echo base_url() ?>assets/js/dashboard.js"></script>


<script>
  $(document).ready(function() {
    cargarNotificaciones();
  });
</script>
