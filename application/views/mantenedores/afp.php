<?php
$data = $this->session->userdata("datos");
$usuario =  $data['usuario'];
$permisos =  $data['permisos'];
?>

<?php
$view_verPrevision = 0; $view_crearPrevision = 0; $view_exportarPrevision = 0; $view_editarPrevision =  0;
foreach ($permisos as $key => $value) {
  if ($value->cf_existencia_permiso == "28") { $view_verPrevision = "1"; } else
  if ($value->cf_existencia_permiso == "30") { $view_crearPrevision = "1"; } else
  if ($value->cf_existencia_permiso == "29") { $view_editarPrevision = "1"; } else
  if ($value->cf_existencia_permiso == "31") { $view_exportarPrevision = "1"; }
}

if($usuario[0]->atr_activo == "1" ) { ?>

<div class="right_col" role="main">
    <!-- Contenedor principal -->
    <div class="x_content">

    </div>

    <div class="row">
        <div class="x_panel">
            <div class="x_content">
              <h3 class="text-center">PREVISIONES DE SALUD</h3><br>
              <?php if ( $view_crearPrevision == 1 ) {  ?>
                <button type="button" class="btn modidev-btn" data-toggle="modal" data-target="#modalCrearAFP" style="margin-bottom:20px;">INGRESAR PREVISIÓN</button>
              <?php } ?>

              <?php if ($view_verPrevision == "1") {  ?>
                <table id="tabla_AFP" class="table table-striped table-bordered table-hover dataTables-AFP" style="margin-top:20px;">
                    <thead >
                        <tr style="width:100%;">
                            <th class="text-center" style="width:10%">ID</th>
                            <th class="text-center">PREVISIÓN</th>
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
    <div id="modalCrearAFP" class="modal fade bd-example-modal-lg" tabindex="-1" role="dialog"  aria-hidden="true" >
        <div class="modal-dialog modal-lg">
            <div class="modal-content" style="padding:20px; background: #2a3f54" >
                <div class="form-row">
                    <h5 class="modal-title mx-auto">INGRESAR AFP</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                    <div class="col-md-12">
                        <br>
                        <label for="nombre">NOMBRE</label>
                        <input type="text" class="form-control custom-input-sm" id="nombre" >
                    </div>
                </div>
                <br>
                <button type="submit" class="btn btn-success" id="btnAgregarAFP">Guardar</button>
            </div>
        </div>
    </div>
    <!-- /Modal de crear -->

    <!-- Modal editar -->
    <div id="modaleditarAFP" class="modal fade" tabindex="-1" role="dialog"  aria-hidden="true" >
        <div class="modal-dialog modal-lg">
            <div class="modal-content" style="padding:20px; background: #2a3f54" >
                <div class="row">
                    <div class="col-md-12">
                      <h5 class="modal-title text-center">AFP</h5>
                      <button type="button" class="close" style="margin-top:-27px;"  data-dismiss="modal" aria-label="Close">
                          <span aria-hidden="true">&times;</span>
                      </button>
                    </div>
                    <div class="modal-body">
                      <div id="modalDetalleAFP">

                      </div>
                      <div class="col-md-12">
                        <br>
                        <button type="submit" class="btn btn-success" style="width:100%"  id="btnUpdateAFP">Guardar cambios</button>
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

        // COMPROBAR PERMISOS
        var permisoEditar = 'no';
        var permisoExportar = "no";
        <?php if( $view_editarPrevision == 1 ){  ?>
          permisoEditar = "si";
          $("#permisoEditar").text("si");
        <?php } ?>
        <?php if( $view_exportarPrevision == 1 ){  ?>
            permisoExportar = "si";
            $("#permisoExportar").text("si");
        <?php } ?>
        cargarTablaAFP(permisoEditar, permisoExportar);
      });

      $("#btnAgregarAFP").click(function (e){
          e.preventDefault();
          agregarAFP();
          var table = $('#tabla_AFP').DataTable();
          table.ajax.reload(function(json) {
            $('#btnAgregarAFP').val(json.lastInput);
          });
      });

      $("body").on("click", "#btnVerAFP", function(e) {
           e.preventDefault();
           var id = $(this).parent().parent().children()[0];
           getDetalleAFP($(id).text());
       });

       $("#btnUpdateAFP").click(function (e){
           e.preventDefault();
           editarAFP();
           var table = $('#tabla_AFP').DataTable();
           table.ajax.reload(function(json) {
             $('#btnAgregarAFP').val(json.lastInput);
           });
       });

       $("#modalCrearAFP").click(function (e){
           $('#modalCrearAFP').modal('show');
       });

  </script>

<?php } else{ header("Location: http://localhost/RRHH-FIRMA/"); } ?>

</body>
</html>
