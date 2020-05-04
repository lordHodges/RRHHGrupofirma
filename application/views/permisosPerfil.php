<?php
$data = $this->session->userdata("datos");
$usuario =  $data['usuario'];
$permisos =  $data['permisos'];
?>

<?php
$view_verUsuario = 0; $view_crearUsuario = 0; $view_cambiarEstadoUsuario = 0; $view_editarUsuario = 0; $view_exportarUsuario = 0;
foreach ($permisos as $key => $value) {
  if ($value->cf_existencia_permiso == "79") { $view_verUsuario = "1"; } else
  if ($value->cf_existencia_permiso == "80") { $view_crearUsuario = "1"; } else
  if ($value->cf_existencia_permiso == "81") { $view_cambiarEstadoUsuario = "1"; } else
  if ($value->cf_existencia_permiso == "82") { $view_editarUsuario = "1"; } else
  if ($value->cf_existencia_permiso == "83") { $view_exportarUsuario = "1"; }
}

if($usuario[0]->atr_activo == "1") { ?>
<div class="right_col" role="main">
    <!-- Contenedor principal -->
    <div class="x_content">

      <div class="row">
          <div class="x_panel">
              <div class="x_content">
                <h3 class="text-center">Permisos de perfil</h3><br>



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
    <script src="<?php echo base_url() ?>assets/js/validaciones.js"></script>
    <script src="<?php echo base_url() ?>assets/js/permisos.js"></script>
    <!-- iCheck -->
    <script src="<?php echo base_url() ?>assets/vendors/iCheck/icheck.min.js"></script>
    <!-- Switchery -->
    <script src="<?php echo base_url() ?>assets/vendors/switchery/dist/switchery.min.js"></script>
    <!-- Toast -->
    <script src="<?php echo base_url() ?>assets/js/toastr.min.js" type="text/javascript"></script>

    <script src="<?php echo base_url() ?>assets/js/dashboard.js"></script>


    <script>
        $(document).ready(function() {
            getSelectPerfiles();
            cargarTablaPerfiles();
            cargarTablaUsuarios();
        });
    </script>

  <?php } else{ header("Location: http://localhost/RRHH-FIRMA/"); } ?>

    </body>
  </html>
