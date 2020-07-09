<?php
$data = $this->session->userdata("datos");
$usuario =  $data['usuario'];
$permisos =  $data['permisos'];
?>

<?php
$view_verUsuario = 0;
$view_crearUsuario = 0;
$view_cambiarEstadoUsuario = 0;
$view_editarUsuario = 0;
$view_exportarUsuario = 0;
foreach ($permisos as $key => $value) {
  if ($value->cf_existencia_permiso == "79") {
    $view_verUsuario = "1";
  } else
  if ($value->cf_existencia_permiso == "80") {
    $view_crearUsuario = "1";
  } else
  if ($value->cf_existencia_permiso == "81") {
    $view_cambiarEstadoUsuario = "1";
  } else
  if ($value->cf_existencia_permiso == "82") {
    $view_editarUsuario = "1";
  } else
  if ($value->cf_existencia_permiso == "83") {
    $view_exportarUsuario = "1";
  }
}

if ($usuario[0]->atr_activo == "1") { ?>
  <div class="right_col" role="main">
    <!-- Contenedor principal -->
    <div class="x_content">

      <div class="row">
        <div class="x_panel">
          <div class="x_content">
            <h3 class="text-center">PERMISOS</h3><br>


            <ul class="nav nav-tabs bar_tabs" id="myTab" role="tablist">

              <li class="nav-item">
                <a class="nav-link" id="perfiles-tab" data-toggle="tab" href="#perfiles" role="tab" aria-controls="perfiles" aria-selected="false">Perfiles</a>
              </li>

              <li class="nav-item">
                <a class="nav-link" id="usuarios-tab" data-toggle="tab" href="#usuarios" role="tab" aria-controls="usuarios" aria-selected="false">Usuarios</a>
              </li>

            </ul>



            <div class="tab-content" id="myTabContent">


              <!-- INICIO TAB PERFILES -->
              <div class="tab-pane fade show active" id="perfiles" role="tabpanel" aria-labelledby="perfiles-tab">

                <table id="tabla_perfiles" class="table table-striped table-bordered table-hover dataTables-perfiles" style="margin-top:20px;">
                  <thead>
                    <tr>
                      <th class="text-center">ID</th>
                      <th class="text-center">PERFIL</th>
                      <th class="text-center">ACCIONES</th>
                    </tr>
                  </thead>
                  <tbody id="tbodyDetalle">

                  </tbody>
                </table>


              </div>
              <!-- FIN TAB PERFILES -->





              <!-- INICIO TAB USUARIOS -->
              <div class="tab-pane fade" id="usuarios" role="tabpanel" aria-labelledby="usuarios-tab">

                <table id="tabla_usuario" class="table table-striped table-bordered table-hover dataTables-usuarios" style="margin-top:20px;">
                  <thead>
                    <tr style="width:100%;">
                      <th class="text-center" style="width:10%">ID</th>
                      <th class="text-center">NOMBRE</th>
                      <th class="text-center">CORREO</th>
                      <th class="text-center">PERFIL</th>
                      <th class="text-center">ESTADO</th>
                      <th class="text-center" style="width:10%">ACCIONES</th>
                    </tr>
                  </thead>
                  <tbody id="tbodyDetalle">

                  </tbody>
                </table>

              </div>
              <!-- FIN TAB USUARIOS -->

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


  <!-- Modal permisos -->
  <div id="modalVerPermisos" class="modal fade bd-example-modal-xl" tabindex="-1" style="width:100%" role="dialog" aria-labelledby="verPermisos" aria-hidden="true">
    <div class="modal-dialog modal-lg">
      <div class="modal-content" style="padding:20px; background: #2a3f54">
        <div class="form-row">
          <h5 class="modal-title mx-auto">INGRESAR CIUDAD</h5>
          <button type="button" class="close" data-dismiss="modal" aria-label="Close">
            <span aria-hidden="true">&times;</span>
          </button>
          <div class="col-md-12">
            <br>
            <label for="nombre">NOMBRE</label>
            <input type="text" class="form-control custom-input-sm" id="nombre">
          </div>

        </div>
        <br>
        <button type="submit" class="btn btn-success btn-sm" id="btnAgregarCiudad">Guardar</button>
      </div>
    </div>
  </div>
  <!-- /Modal de crear -->








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
  <script src="<?php echo base_url();   ?>assets/js/modidev.js"></script>
  <script src="<?php echo base_url();   ?>assets/js/trabajador.js"></script>
  <script src="<?php echo base_url();   ?>assets/js/validaciones.js"></script>
  <script src="<?php echo base_url();   ?>assets/js/permisos.js"></script>
  <!-- iCheck -->
  <script src="<?php echo base_url();   ?>assets/vendors/iCheck/icheck.min.js"></script>
  <!-- Switchery -->
  <script src="<?php echo base_url();   ?>assets/vendors/switchery/dist/switchery.min.js"></script>
  <!-- Toast -->
  <script src="<?php echo base_url();   ?>assets/js/toastr.min.js" type="text/javascript"></script>

  <script src="<?php echo base_url();   ?>assets/js/dashboard.js"></script>


  <script>
    $(document).ready(function() {
      getSelectPerfiles();
      cargarTablaPerfiles();
      cargarTablaUsuarios();
    });
  </script>

<?php } else {
  header("Location: https://www.imlchile.cl/dev_test/grupofirma");
} ?>

</body>

</html>