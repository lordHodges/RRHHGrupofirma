<?php
$data = $this->session->userdata("datos");
$usuario =  $data['usuario'];
$permisos =  $data['permisos'];
?>

<?php
$view_verCalendario = 0;
foreach ($permisos as $key => $value) {
  if ($value->cf_existencia_permiso == "110") {
    $view_verCalendario = "1";
  }
}

if ($usuario[0]->atr_activo == "1") { ?>
  <div class="right_col" role="main">
    <!-- Contenedor principal -->
    <div class="x_content">

      <div class="row">
        <div class="x_panel">
          <div class="x_content">
            <h3 class="text-center">GESTOR DE ASISTENCIA</h3><br>



            <ul class="nav nav-tabs bar_tabs" id="myTab" role="tablist">

              <li class="nav-item">
                <a class="nav-link active" id="trabajadores-tab" onclick="seleccionTabs('trabajadores-tab')" data-toggle="tab" href="#TrabajadoresContent" role="tab" aria-controls="trabajadores" aria-selected="false">INASISTENCIAS</a>
              </li>

              <!-- <li class="nav-item">
                        <a class="nav-link" id="empresas-tab" onclick="seleccionTabs('empresas-tab')" data-toggle="tab" href="#empresasContent" role="tab" aria-controls="empresas" aria-selected="false">Entre empresas</a>
                      </li> -->

            </ul>



            <div class="tab-content" id="trabajadores">


              <!-- INICIO TAB INASISTENCIAS -->
              <div class="tab-panel fade show active" id="TrabajadoresContent" role="tabpanel" aria-labelledby="trabajadores-tab">



                <div class="row">
                  <div class="col-md-12">
                    <div class="x_panel">

                      <div class="x_content">

                        <!-- <div id='loading'>loading...</div> -->

                        <div id='calendar'></div>

                      </div>
                    </div>
                  </div>
                </div>



              </div>
              <!-- FIN TAB INASISTENCIASS -->




            </div>


          </div>



        </div>
      </div>

    </div>


  </div>

  <!-- /Contenedor principal-->

  <!-- footer content -->
  <footer>
    <div class="clearfix"></div>
  </footer>
  <!-- /footer content -->


  <!-- Modal crear -->
  <div id="addInasistencia" class="modal fade bd-example-modal-lg" tabindex="-1" role="dialog" aria-hidden="true">
    <div class="modal-dialog modal-lg">
      <div class="modal-content" style="padding:20px; background: #2a3f54">
        <div class="form-row">
          <h5 class="modal-title mx-auto">INRESAR INASISTENCIA</h5>
          <button type="button" class="close" data-dismiss="modal" aria-label="Close">
            <span aria-hidden="true">&times;</span>
          </button>
          <div class="col-md-12">
            <br>
            <label for="fechaInasistencia">FECHA</label>
            <input type="text" class="form-control custom-input-sm" id="fechaInasistencia">
          </div>

          <div class="col-md-12 col-sm-12">
            <br><label for="selectTrabajador1">TRABAJADOR</label><br>
            <select class="custom-select" id="selectTrabajador1">
              <!-- se cargan los trabajadores -->
            </select>
          </div>

          <div class="col-md-12">
            <br>
            <label for="motivo">MOTIVO</label>
            <textarea type="text" rows="4" class="form-control custom-input-sm" id="motivo"></textarea>
          </div>

        </div>
        <br>
        <button type="submit" class="btn btn-success btn-sm" id="btnAgregarInasistencia">Guardar</button>
      </div>
    </div>
  </div>
  <!-- /Modal de crear -->






  <label id="permisoExportarTrabajadores" style="display:none">no</label>
  <label id="permisoEditarTrabajadores" style="display:none">no</label>








  <!-- jQuery -->
  <script src="<?php echo base_url();   ?>assets/vendors/jquery/dist/jquery.min.js"></script>
  <!-- Bootstrap -->
  <script src="<?php echo base_url();   ?>assets/vendors/bootstrap/dist/js/bootstrap.bundle.min.js"></script>
  <script src="<?php echo base_url();   ?>assets/vendors/DateJS/build/date.js"></script>
  <!-- Datatables -->
  <script src="<?php echo base_url();   ?>assets/js/datatables.min.js" type="text/javascript"></script>
  <!-- Custom Theme Scripts -->
  <script src="<?php echo base_url();   ?>assets/build/js/custom.min.js"></script>
  <!-- MODIDEV -->
  <script src="<?php echo base_url();   ?>assets/js/asistencia.js"></script>
  <script src="<?php echo base_url();   ?>assets/js/validaciones.js"></script>
  <!-- iCheck -->
  <script src="<?php echo base_url();   ?>assets/vendors/iCheck/icheck.min.js"></script>
  <!-- Switchery -->
  <script src="<?php echo base_url();   ?>assets/vendors/switchery/dist/switchery.min.js"></script>
  <!-- Toast -->
  <script src="<?php echo base_url();   ?>assets/js/toastr.min.js" type="text/javascript"></script>


  <!-- FullCalendar -->
  <script src="<?php echo base_url();   ?>assets/vendors/moment/min/moment.min.js"></script>
  <script src="<?php echo base_url();   ?>assets/vendors/fullcalendar/packages/core/main.js" rel="stylesheet"></script>
  <script src="<?php echo base_url();   ?>assets/vendors/fullcalendar/packages/interaction/main.js" rel="stylesheet"></script>
  <script src="<?php echo base_url();   ?>assets/vendors/fullcalendar/packages/daygrid/main.js" rel="stylesheet"></script>
  <script src="<?php echo base_url();   ?>assets/vendors/fullcalendar/packages/list/main.js" rel="stylesheet"></script>
  <script src="<?php echo base_url();   ?>assets/vendors/fullcalendar/packages/google-calendar/main.js" rel="stylesheet"></script>



  <script src="<?php echo base_url();   ?>assets/js/dashboard.js"></script>


  <script>
    $(document).ready(function() {
      inicializarCalendario();
      cargarTrabajadores();
    });

    $("body").on("click", "#btnAgregarInasistencia", function(e) {
      e.preventDefault();
      agregarInasistencia();
    });
  </script>


<?php } else {
  header("Location: http://www.imlchile.cl/grupofirma/");
} ?>

</body>

</html>