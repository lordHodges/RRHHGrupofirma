<?php
$data = $this->session->userdata("datos");
$usuario =  $data['usuario'];
$permisos =  $data['permisos'];
?>

<?php
$view_cantidadContrato = 0; $view_transferenciasEmpresa = 0; $view_contratosPorVencer = 0;
foreach ($permisos as $key => $value) {
  if ($value->cf_existencia_permiso == "76") { $view_cantidadContrato = "1"; } else
  if ($value->cf_existencia_permiso == "77") { $view_transferenciasEmpresa = "1"; } else
  if ($value->cf_existencia_permiso == "78") { $view_contratosPorVencer = "1"; }
}
if($usuario[0]->atr_activo == "1") { ?>

<div class="right_col" role="main">

  <?php if ( $view_cantidadContrato == "1") { ?>

    <div class="col-md-4 col-sm-12">
      <div class="x_panel" style="background-color:#f7f7f7; border:none">
        <div class="row card-group">
          <div class="card text-white" style="background-color:#1abb9c">
            <div class="card-header" style="padding:7px;">
              <h4 class="text-center">Contrato a plazo</h4>
            </div>
            <div class="card-body" style="padding:10px; background-color:#fff; color:#000">
              <div id="contratosPlazo">

              </div>
            </div>
          </div>
        </div>
      </div>
    </div>



    <div class="col-md-4 col-sm-6">
      <div class="x_panel" style="background-color:#f7f7f7; border:none">
        <div class="row card-group">
          <div class="card text-white" style="background-color:#1abb9c">
            <div class="card-header"  style="padding:7px;">
              <h4 class="text-center">Contrato indefinido</h4>
            </div>
            <div class="card-body"  style="padding:10px; background-color:#fff; color:#000">
              <div id="contratosIndefinido">

              </div>
            </div>
          </div>
        </div>
      </div>
    </div>

    <div class="col-md-4 col-sm-6">
      <div class="x_panel" style="background-color:#f7f7f7; border:none">
        <div class="row card-group">
          <div class="card text-white" style="background-color:#1abb9c">
            <div class="card-header"  style="padding:7px;">
              <h4 class="text-center">Contrato por proyecto</h4>
            </div>
            <div class="card-body"  style="padding:10px; background-color:#fff; color:#000">
              <div id="contratosProyecto">

              </div>
            </div>
          </div>
        </div>
      </div>
    </div>

  <?php } ?>





  <?php if ( $view_transferenciasEmpresa == "1") { ?>
  <!-- TRANSFERENCIAS DE DINERO POR BANCO -->
  <div class="col-md-12 col-sm-12 ">
    <div class="x_panel">
      <div class="x_title">
        <h2>Transferencias por empresa</h2>
        <ul class="nav navbar-right panel_toolbox">
          <li><a class="collapse-link"><i class="fa fa-chevron-up"></i></a>
          </li>
          <li><a class="close-link"><i class="fa fa-close"></i></a>
          </li>
        </ul>
        <div class="clearfix"></div>
      </div>
      <div class="x_content">

          <ul class="nav nav-tabs bar_tabs" id="myTab" role="tablist">
              <li class="nav-item">
              <a class="nav-link" id="hoyTransEmpresa-tab" data-toggle="tab" href="#hoyTransEmpresa" onclick="cargarGraficoTransferenciasPorEmpresaHoy()" role="tab" aria-controls="hoy" aria-selected="true">Hoy</a>
              </li>

              <li class="nav-item">
              <a class="nav-link" id="mesTransEmpresa-tab" data-toggle="tab" href="#mesTransEmpresa" onclick="cargarGraficoTransferenciasPorEmpresaMes()"  role="tab" aria-controls="mes" aria-selected="false">Mes</a>
              </li>

              <li class="nav-item">
              <a class="nav-link" id="primerSemestreTransEmpresa-tab" data-toggle="tab" href="#primerSemestreTransEmpresa" onclick="cargarGraficoTransferenciasPorEmpresaPrimerSemestre()" role="tab" aria-controls="primer semestre" aria-selected="false">1° semestre</a>
              </li>

              <li class="nav-item">
              <a class="nav-link" id="segundoSemestreTransEmpresa-tab" data-toggle="tab" href="#segundoSemestreTransEmpresa" onclick="cargarGraficoTransferenciasPorEmpresaPrimerSemestre()" role="tab" aria-controls="segundo semestre" aria-selected="false">2° semestre</a>
              </li>

              <li class="nav-item">
              <a class="nav-link active" id="anoTransEmpresa-tab" data-toggle="tab" href="#anoTransEmpresa" onclick="cargarGraficoTransferenciasPorEmpresaAno()" role="tab" aria-controls="anual" aria-selected="false">Año</a>
              </li>
          </ul>
          <div class="tab-content" id="myTabGraficTransferContent">
              <div class="tab-pane fade" id="hoyTransEmpresa" role="tabpanel" aria-labelledby="hoyTransEmpresa-tab"><canvas id="pieChart"></canvas></div>

              <!-- <div class="tab-pane fade" id="mesTransEmpresa" role="tabpanel" aria-labelledby="mesTransEmpresa-tab"><canvas id="pieChart"></canvas></div>

              <div class="tab-pane fade" id="primerSemestreTransEmpresa" role="tabpanel" aria-labelledby="primerSemestreTransEmpresa-tab"><canvas id="pieChart"></canvas></div>

              <div class="tab-pane fade" id="segundoSemestreTransEmpresa" role="tabpanel" aria-labelledby="segundoSemestreTransEmpresa-tab"><canvas id="pieChart"></canvas></div>

              <div class="tab-pane fade-" id="anoTransEmpresa" role="tabpanel" aria-labelledby="anoTransEmpresa-tab"><canvas id="pieChart"></canvas></div> -->
          </div>

      </div>
    </div>
  </div>
  <?php } ?>






<?php if ( $view_contratosPorVencer == "1") { ?>
<!-- CONTRATO POR VENCER -->
  <div class="col-md-6" id="contenedorDeContratosPorCaducar">
    <div class="x_panel">
      <div class="x_title">
        <h2 style="margin-left:12px;">Contratos por vencer</h2>
        <ul class="nav navbar-right panel_toolbox" >
          <li><a class="collapse-link"><i class="fa fa-chevron-up"></i></a>
          </li>
        </ul>
        <div class="clearfix"></div>
      </div>
      <div class="x_content">
        <!-- <ul class="list-unstyled msg_list" style="display:inline;" id="contenedorNotificaciones"> -->
        <ul class="list-unstyled msg_list" id="contenedorNotificaciones">

        </ul>
      </div>
    </div>
  </div>
<?php } ?>






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
<script src="<?php echo base_url() ?>assets/vendors/Chart.js/dist/Chart.js"></script>

<!-- morris.js -->
<script src="<?php echo base_url() ?>assets/vendors/raphael/raphael.min.js"></script>
<script src="<?php echo base_url() ?>assets/vendors/morris.js/morris.min.js"></script>

<!-- Custom Theme Scripts -->
<script src="<?php echo base_url() ?>assets/build/js/custom.js"></script>
<!-- Mis JS -->
<script src="<?php echo base_url() ?>assets/js/dashboard.js"></script>


<script>
  $(document).ready(function() {
    cargarCantidadContratos();
    cargarNotificaciones();

    $('#hoyTransEmpresa-tab').click();


  });
</script>

  <?php } else{ header("Location: <?php echo base_url() ?>"); } ?>

</body>
</html>

