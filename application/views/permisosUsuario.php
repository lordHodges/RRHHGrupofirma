<?php
$data = $this->session->userdata("datos");
$usuario =  $data['usuario'];
$permisos =  $data['permisos'];
$perfil =  $data['perfil'];
?>

<?php if($usuario[0]->atr_activo == "1" && $perfil[0]->atr_nombre == "Administrador") { ?>
<div class="right_col" role="main">
    <!-- Contenedor principal -->
    <div class="x_content">

      <div class="row">
          <div class="x_panel">
              <div class="x_content">
                <h3 class="text-center">Permisos de usuario</h3><br>

                <div class="col-md-12" style="margin-bottom:30px;">
                    <br>
                    <label for="getSelectUsuariosPorPerfil">USUARIOS</label><br>
                    <select class="custom-select" id="getSelectUsuariosPorPerfil">

                    </select>
                </div>

                <div class="contenedorPermisos">


                  <div class="col-md-4 col-sm-6 ">
                    <label class="control-label col-md-12 col-sm-12" style="margin-bottom:20px;">Nombre del módulo</label>
                    <label>
                      <input type="checkbox" class="js-switch" checked /> Ver Listado
                    </label>
                  </div>

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
            getSelectUsuariosPorPerfil();
        });

        $("#getSelectUsuariosPorPerfil").change(function (e){
            e.preventDefault();
            var id = $(this).parent().parent().children()[0];
            getDetallePermisosUsuario($(id).text());
        });

    </script>

  <?php } else{ header("Location: http://imlchile.cl/grupofirma/"); } ?>

    </body>
  </html>
