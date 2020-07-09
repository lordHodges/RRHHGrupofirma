<?php
$data = $this->session->userdata("datos");
$usuario =  $data['usuario'];
$permisos =  $data['permisos'];
?>
<?php if ($usuario[0]->atr_activo == "1") { ?>
  <div class="right_col" role="main">
    <!-- Contenedor principal -->
    <div class="x_content">

      <div class="row">
        <div class="x_panel">
          <div class="x_content">
            <h3 class="text-center">Permisos de perfil</h3><br>
            <div id="contenerdorParaPermisos">

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
  <script src="<?php echo base_url();   ?>assets/js/permisos.js"></script>
  <!-- iCheck -->
  <script src="<?php echo base_url();   ?>assets/vendors/iCheck/icheck.min.js"></script>
  <!-- Switchery -->
  <script src="<?php echo base_url();   ?>assets/vendors/switchery/dist/switchery.min.js"></script>
  <!-- Toast -->
  <script src="<?php echo base_url();   ?>assets/js/toastr.min.js" type="text/javascript"></script>

  <!-- <script src="<?php echo base_url();   ?>assets/js/dashboard.js"></script> -->


  <script>
    $(document).ready(function() {
      getExistenciasPorModulo();
    });
  </script>

<?php } else {
  header("Location: http://www.imlchile.cl/dev_test/grupofirma");
} ?>

</body>

</html>