<?php
$data = $this->session->userdata("datos");
$usuario =  $data['usuario'];
$permisos =  $data['permisos'];
?>

<?php
$view_verEstadoCivil = 0; $view_crearEstadoCIvil = 0; $view_exportarEstadoCivil = 0;
foreach ($permisos as $key => $value) {
  if ($value->cf_existencia_permiso == "13") { $view_verEstadoCivil = "1"; } else
  if ($value->cf_existencia_permiso == "14") { $view_crearEstadoCIvil = "1"; } else
  if ($value->cf_existencia_permiso == "15") { $view_exportarEstadoCivil = "1"; }
}

if($usuario[0]->atr_activo == "1" ) { ?>

<div class="right_col" role="main">
    <!-- Contenedor principal -->
    <div class="x_content">

    </div>

    <div class="row">
        <div class="x_panel">
            <div class="x_content">
              <h3 class="text-center">ESTADOS CIVILES</h3><br>
              <?php if ( $view_crearEstadoCIvil == 1 ) {  ?>
                <button type="button" class="btn modidev-btn btn-sm" data-toggle="modal" data-target=".bd-example-modal-lg" style="margin-bottom:20px;">INGRESAR ESTADO CIVIL</button>
              <?php } ?>

              <?php if ($view_verEstadoCivil == "1") {  ?>
                <table id="tabla_estadoCivil" class="table table-striped table-bordered table-hover dataTables-estadoCivil" style="margin-top:20px;">
                    <thead >
                        <tr style="width:100%;">
                            <th class="text-center">ID</th>
                            <th class="text-center">ESTADO CIVIL</th>
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
    <div id="myModal" class="modal fade bd-example-modal-lg" tabindex="-1" role="dialog" aria-labelledby="crearTrabajador"  aria-hidden="true" >
        <div class="modal-dialog modal-lg">
            <div class="modal-content" style="padding:20px; background: #2a3f54" >
                <div class="form-row">
                    <h5 class="modal-title mx-auto">INGRESAR ESTADO CIVIL</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                    <div class="col-md-12">
                        <br>
                        <label for="nombre">NOMBRE</label>
                        <input type="text" class="form-control custom-input-sm" id="nombre" required oninput="mayus(this)">
                    </div>

                </div>
                <br>
                <button type="submit" class="btn btn-success btn-sm" id="btnAgregarEstadoCivil">Guardar</button>
            </div>
        </div>
    </div>
    <!-- /Modal de crear -->

    <label id="permisoExportar" style="display:none">no</label>




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

    <script src="<?php echo base_url() ?>assets/js/dashboard.js"></script>


    <script>
      $(document).ready(function() {
        var permisoExportar = "no";
        <?php if( $view_exportarEstadoCivil == 1){  ?>
            permisoExportar = "si";
            $("#permisoExportar").text("si");
        <?php } ?>
        cargarTablaEstadosCiviles(permisoExportar);
      });

      $("#btnAgregarEstadoCivil").click(function (e){
          e.preventDefault();
          agregarEstadoCivil();
          var table = $('#tabla_estadoCivil').DataTable();
          table.ajax.reload(function(json) {
            $('#btnAgregarEstadoCivil').val(json.lastInput);
          });
          cargarTablaEstadosCiviles(permisoExportar);
      });
  </script>
<<<<<<< HEAD
    <?php } else{ header("Location: http://localhost/GRUPOFIRMA/"); } ?>
=======
    <?php } else{ header("Location: http://10.10.11.240/GRUPOFIRMA/"); } ?>
>>>>>>> 6d452e33e03ff9b08367071c515f6627be833f1a

  </body>
</html>
