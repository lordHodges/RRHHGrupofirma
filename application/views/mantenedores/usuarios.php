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

if($usuario[0]->atr_activo == "1" ) { ?>

<div class="right_col" role="main">
    <!-- Contenedor principal -->
    <div class="x_content">

    </div>

    <div class="row">
        <div class="x_panel">
            <div class="x_content">
                <button type="button" class="btn modidev-btn btn-sm" data-toggle="modal" data-target="#modalCrearUsuario" style="margin-bottom:20px;">INGRESAR USUARIO</button>

                <?php if ( $view_verUsuario == 1 ) {  ?>
                <table id="tabla_usuario" class="table table-striped table-bordered table-hover dataTables-usuarios" style="margin-top:20px;">
                    <thead >
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
              <?php } ?>

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
    <div id="modalCrearUsuario" class="modal fade bd-example-modal-lg" tabindex="-1" role="dialog"  aria-hidden="true" >
        <div class="modal-dialog modal-lg">
            <div class="modal-content" style="padding:20px; background: #2a3f54" >
                <div class="form-row">
                    <h5 class="modal-title mx-auto">INGRESAR USUARIO</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                    <div class="col-md-12">
                        <br>
                        <label for="nombre">NOMBRE</label>
                        <input type="text" class="form-control custom-input-sm" id="nombre" >
                    </div>
                    <div class="col-md-12">
                        <br>
                        <label for="nombre">CORREO</label>
                        <input type="email" class="form-control custom-input-sm" id="correo" >
                    </div>
                    <div class="col-md-12">
                        <br>
                        <label for="getSelectPerfiles">PERFIL</label>
                        <select class="custom-select" id="getSelectPerfiles">

                        </select>
                    </div>
                </div>
                <br>
                <button type="submit" class="btn btn-success btn-sm" id="btnAgregarUsuario">Guardar</button>
            </div>
        </div>
    </div>
    <!-- /Modal de crear -->



    <!-- Modal editar -->
    <div id="modaleditarUsuario" class="modal fade" tabindex="-1" role="dialog"  aria-hidden="true" >
        <div class="modal-dialog modal-lg">
            <div class="modal-content" style="padding:20px; background: #2a3f54" >
                <div class="row">
                    <div class="col-md-12">
                      <h5 class="modal-title text-center">USUARIO</h5>
                      <button type="button" class="close" style="margin-top:-27px;"  data-dismiss="modal" aria-label="Close">
                          <span aria-hidden="true">&times;</span>
                      </button>
                    </div>
                    <div class="modal-body">
                      <div id="divDetalleUsuario">

                      </div>
                      <div class="col-md-12">
                        <br>
                        <button type="submit" class="btn btn-success btn-sm" style="width:100%"  id="btnUpdateUsuario">Guardar cambios</button>
                      </div>
                    </div>
                </div>
                <br>
            </div>
        </div>
    </div>
    <!-- /Modal de editar -->


    <label id="permisoExportar" style="display:none">no</label>
    <label id="permisoEditar" style="display:none">no</label>
    <label id="permisoCambiar" style="display:none">no</label>




    <!-- jQuery -->
    <script src="<?php echo base_url() ?>assets/vendors/jquery/dist/jquery.min.js"></script>
    <!-- Bootstrap -->
    <script src="<?php echo base_url() ?>assets/vendors/bootstrap/dist/js/bootstrap.bundle.min.js"></script>
     <!-- Datatables -->
    <script src="<?php echo base_url() ?>assets/js/datatables.min.js" type="text/javascript"></script>
    <!-- Custom Theme Scripts -->
    <script src="<?php echo base_url() ?>assets/build/js/custom.min.js"></script>
    <!-- MODIDEV -->
    <script src="<?php echo base_url() ?>assets/js/modidev.js"></script>
    <!-- Toast -->
    <script src="<?php echo base_url() ?>assets/js/toastr.min.js" type="text/javascript"></script>

    <script src="<?php echo base_url() ?>assets/js/usuarios.js"></script>


    <script>
      $(document).ready(function() {
        getSelectPerfiles();

        var permisoEditar = 'no';
        var permisoExportar = "no";
        var permisoCambiar = "no";
        <?php if( $view_editarUsuario == 1 ){  ?>
          permisoEditar = "si";
          $("#permisoEditar").text("si");
        <?php } ?>
        <?php if( $view_exportarUsuario == 1 ){  ?>
            permisoExportar = "si";
            $("#permisoExportar").text("si");
        <?php } ?>
        <?php if( $view_cambiarEstadoUsuario == 1 ){  ?>
            permisoCambiar = "si";
            $("#permisoCambiar").text("si");
        <?php } ?>
        cargarTabla(permisoEditar,permisoExportar, permisoCambiar);

      });

      $("#btnAgregarUsuario").click(function (e){
          e.preventDefault();
          agregarUsuario();
      });

      $("body").on("click", "#btnCambiarEstado", function(e) {
          e.preventDefault();
          var usuario = $(this).parent().parent().children()[0];
          var estado = $(this).parent().parent().children()[4];;
          cambiarEstado( $(usuario).text() , $(estado).text() );
      });

      $("body").on("click", "#btnEditarUsuario", function(e) {
           e.preventDefault();
           var id = $(this).parent().parent().children()[0];
           getDetalleUsuario( $(id).text() );
       });

       $("body").on("click", "#btnUpdateUsuario", function(e) {
            e.preventDefault();
            editarUsuario();
        });



  </script>

<<<<<<< HEAD
<?php } else{ header("Location: http://localhost/GRUPOFIRMA/"); } ?>
=======
<?php } else{ header("Location: http://imlchile.cl/grupofirma/"); } ?>
>>>>>>> 6d452e33e03ff9b08367071c515f6627be833f1a

  </body>
</html>
