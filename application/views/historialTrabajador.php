<div class="right_col" role="main">
  <div class="col-md-12 col-sm-12  ">
      <div class="x_panel">
      <h2 class="text-center">HISTORIAL</h2>
          <div class="x_title">


          <div class="clearfix"></div>
          </div>
          <div class="x_content">

          <div class="row">
            <div class="col-md-12" style="margin-bottom:30px;">
                <br>
                <label for="getSelectTrabajadores">TRABAJADOR</label><br>
                <select class="custom-select" id="getSelectTrabajadores">

                </select>
            </div>
          </div>

          <ul class="nav nav-tabs bar_tabs" id="myTab" role="tablist">
              <li class="nav-item">
              <a class="nav-link active" id="home-tab" data-toggle="tab" href="#home" role="tab" aria-controls="home" aria-selected="true">Cronológico</a>
              </li>

              <li class="nav-item">
              <a class="nav-link" id="contrato-tab" data-toggle="tab" href="#contratos" role="tab" aria-controls="profile" aria-selected="false">Contratos</a>
              </li>

              <li class="nav-item">
              <a class="nav-link" id="anexo-tab" data-toggle="tab" href="#anexos" role="tab" aria-controls="anexos" aria-selected="false">Anexos</a>
              </li>

              <li class="nav-item">
              <a class="nav-link" id="transferencias-tab" data-toggle="tab" href="#transferencias" role="tab" aria-controls="transferencias" aria-selected="false">Transferencias</a>
              </li>

              <li class="nav-item">
              <a class="nav-link" id="cartas-tab" data-toggle="tab" href="#cartasAmonestacion" role="tab" aria-controls="contact" aria-selected="false">Cartas de amonestación</a>
              </li>

          </ul>
          <div class="tab-content" id="myTabContent">

              <div class="tab-pane fade show active" id="home" role="tabpanel" aria-labelledby="home-tab">

                <div class="col-md-12 col-sm-12" id="contenedorCronologico">

                </div>

              </div>









              <div class="tab-pane fade" id="contratos" role="tabpanel" aria-labelledby="contrato-tab">

              </div>






              <div class="tab-pane fade" id="anexos" role="tabpanel" aria-labelledby="anexo-tab">

              </div>













              <div class="tab-pane fade-" id="cartasAmonestacion" role="tabpanel" aria-labelledby="cartas-tab">

              </div>















              <div class="tab-pane fade" id="transferencias" role="tabpanel" aria-labelledby="contact-tab">

              </div>


          </div>
          </div>
      </div>
      </div>
</div>



<!-- footer content -->
<footer>
    <div class="clearfix"></div>
</footer>
<!-- /footer content -->







<!-- jQuery -->
<script src="<?php echo base_url() ?>assets/vendors/jquery/dist/jquery.min.js"></script>
<!-- Bootstrap -->
<script src="<?php echo base_url() ?>assets/vendors/bootstrap/dist/js/bootstrap.bundle.min.js"></script>
<script src="<?php echo base_url() ?>assets/vendors/DateJS/build/date.js"></script>
 <!-- Datatables -->
<script src="<?php echo base_url() ?>assets/js/datatables.min.js" type="text/javascript"></script>
<!-- Custom Theme Scripts -->
<script src="<?php echo base_url() ?>assets/build/js/custom.min.js"></script>
<!-- MODIDEV -->
<script src="<?php echo base_url() ?>assets/js/modidev.js"></script>
<script src="<?php echo base_url() ?>assets/js/trabajador.js"></script>
<script src="<?php echo base_url() ?>assets/js/historial.js"></script>
<script src="<?php echo base_url() ?>assets/js/validaciones.js"></script>
<!-- Toast -->
<script src="<?php echo base_url() ?>assets/js/toastr.min.js" type="text/javascript"></script>

<script src="<?php echo base_url() ?>assets/js/dashboard.js"></script>


<script>
    $(document).ready(function() {
        cargarTrabajadores();
        cargarTablaTrabajadorHistorial();
    });

    $("#getSelectTrabajadores").change(function (e){
        e.preventDefault();
        var idTrabajador = $("#getSelectTrabajadores").val();
        cargarDetalleHistorial(idTrabajador);
        cargarDetalleContratos(idTrabajador);
        cargarDetalleAnexos(idTrabajador);
        cargarDetalleTransferencias(idTrabajador);
        cargarDetalleCartasDeAmonestación(idTrabajador);
    });
</script>
