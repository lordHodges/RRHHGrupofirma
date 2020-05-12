<?php
$data = $this->session->userdata("datos");
$usuario =  $data['usuario'];
$permisos =  $data['permisos'];
?>

<?php
$view_verModelos = 0; $view_crearModelo = 0; $view_exportarModelos = 0; $view_editarModelo = 0;
foreach ($permisos as $key => $value) {
  if ($value->cf_existencia_permiso == "98") { $view_verModelos = "1"; } else
  if ($value->cf_existencia_permiso == "100") { $view_crearModelo = "1"; } else
  if ($value->cf_existencia_permiso == "101") { $view_exportarModelos = "1"; } else
  if ($value->cf_existencia_permiso == "99") { $view_editarModelo = "1"; }
}

if($usuario[0]->atr_activo == "1" ) { ?>
<div class="right_col" role="main">
    <!-- Contenedor principal -->
    <div class="x_content">

    </div>

    <div class="row">
        <div class="x_panel">
            <div class="x_content">
              <h3 class="text-center">MODELOS</h3><br>
              <?php if ( $view_crearModelo == 1 ) {  ?>
                <button type="button" class="btn modidev-btn btn-sm" data-toggle="modal" data-target=".bd-example-modal-lg" style="margin-bottom:20px;">INGRESAR MODELO</button>
              <?php } ?>

              <?php if ($view_verModelos == "1") {  ?>
                <table id="tabla_modelo" class="table table-striped table-bordered table-hover dataTables-modelos" style="margin-top:20px;">
                    <thead >
                        <tr style="width:100%;">
                            <th class="text-center" style="width:10%;">ID</th>
                            <th class="text-center">MODELO</th>
                            <th class="text-center">MARCA</th>
                            <th class="text-center"style="width:10%;">ACCIONES</th>
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
                  <h5 class="modal-title mx-auto">INGRESAR MODELO</h5>
                  <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                      <span aria-hidden="true">&times;</span>
                  </button>
                  <div class="col-md-12">
                      <br>
                      <label for="nombre">MARCA</label>
                      <select class="custom-select"  id="getSelectMarca">

                      </select>
                  </div>
                  <div class="col-md-12">
                      <br>
                      <label for="nombre">NOMBRE</label>
                      <input type="text" class="form-control custom-input-sm" id="nombre" oninput="mayus(this)" required>
                  </div>
              </div>
              <br>
              <button type="submit" class="btn btn-success btn-sm" id="btnAgregarModelo">Guardar</button>
          </div>





        </div>
    </div>
    <!-- /Modal de crear -->

    <!-- Modal editar -->
    <div id="modalEditarModelo" class="modal fade bd-example-modal-lg" tabindex="-1" role="dialog"  aria-hidden="true" >
        <div class="modal-dialog modal-lg">
            <div class="modal-content" style="padding:20px; background: #2a3f54" >
                <div class="form-row" id="contenedorDetalleModelo">


                </div>
                <br>
                <button type="submit" class="btn btn-success btn-sm" id="btnEditarModelo">Guardar</button>
            </div>
        </div>
    </div>
    <!-- /Modal de editar -->

    <label id="permisoExportar" style="display:none">no</label>
    <label id="permisoEditar" style="display:none">no</label>

    <!-- jQuery -->
    <script src="<?php echo base_url() ?>assets/vendors/jquery/dist/jquery.min.js"></script>
    <!-- Bootstrap -->
    <script src="<?php echo base_url() ?>assets/vendors/bootstrap/dist/js/bootstrap.bundle.min.js"></script>
     <!-- Datatables -->
    <script src="<?php echo base_url() ?>assets/js/datatables.min.js" type="text/javascript"></script>
    <!-- Custom Theme Scripts -->
    <script src="<?php echo base_url() ?>assets/build/js/custom.min.js"></script>
    <!-- MODIDEV -->
    <script src="<?php echo base_url() ?>assets/js/modelos.js"></script>
    <script src="<?php echo base_url() ?>assets/js/marcas.js"></script>
    <script src="<?php echo base_url() ?>assets/js/validaciones.js"></script>
    <!-- Toast -->
    <script src="<?php echo base_url() ?>assets/js/toastr.min.js" type="text/javascript"></script>

    <script src="<?php echo base_url() ?>assets/js/dashboard.js"></script>


    <script>
      $(document).ready(function() {
          var permisoEditar = 'no';
          var permisoExportar = "no";
          <?php if( $view_editarModelo == 1 ){  ?>
            permisoEditar = "si";
            $("#permisoEditar").text("si");
          <?php } ?>
          <?php if( $view_exportarModelos == 1 ){  ?>
              permisoExportar = "si";
              $("#permisoExportar").text("si");
          <?php } ?>
          cargarTablaModelos(permisoEditar,permisoExportar);
          getSelectMarcas();
      });

      $("body").on("click", "#btnAgregarModelo", function(e) {
          e.preventDefault();
          agregarModelo();
      });

      $("body").on("click", "#getDetalleModelo", function(e) {
          e.preventDefault();
          var id = $(this).parent().parent().children()[0];
          getDetalleModelo($(id).text());
      });

      $("body").on("click", "#btnEditarModelo", function(e) {
          e.preventDefault();
          var id = $(this).parent().parent().children()[0];
          editarModelo( $(id).text() );
      });























      $("body").on("click", "#getDetalleEstadosContrato", function(e) {
          e.preventDefault();
          var id = $(this).parent().parent().children()[0];
          getDetalleEstadosContrato($(id).text());
      });

      $("body").on("click", "#btnEditarEstadoContrato", function(e) {
          e.preventDefault();
          updateEstadoContrato();
          var table = $('#tabla_estadoContrato').DataTable();
          table.ajax.reload(function(json) {
            $('#btnEditarEstadoContrato').val(json.lastInput);
          });
      });

  </script>

    <?php } else{ header("Location: http://localhost/GRUPOFIRMA/"); } ?>

    </body>
</html>
