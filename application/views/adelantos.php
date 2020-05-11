<?php
$data = $this->session->userdata("datos");
$usuario =  $data['usuario'];
$permisos =  $data['permisos'];
?>

<?php
$view_verAdelantos = 0; $view_editarAdelanto = 0; $view_exportarAdelanto = 0;
foreach ($permisos as $key => $value) {
  if ($value->cf_existencia_permiso == "102") { $view_verAdelantos = "1"; } else
  if ($value->cf_existencia_permiso == "103") { $view_editarAdelanto = "1"; } else
  if ($value->cf_existencia_permiso == "104") { $view_exportarAdelanto = "1"; }
}

if($usuario[0]->atr_activo == "1" ) { ?>
<div class="right_col" role="main">
    <!-- Contenedor principal -->
    <div class="x_content">

    </div>

    <div class="row">
        <div class="x_panel">
            <div class="x_content">
              <h3 class="text-center">ADELANTOS</h3><br>
                <div class="container-fluid">

                  <div class="row">
                    <div class="col-md-12">

                      <?php if ($view_verAdelantos == "1") {  ?>
                        <table id="tabla_adelantos" class="table table-striped table-bordered table-hover dataTables-adelantos" style="margin-top:20px;">
                            <thead >
                                <tr style="width:100%;">
                                    <th class="text-center">ID</th>
                                    <th class="text-center">RUT</th>
                                    <th class="text-center">TRABAJADOR</th>
                                    <th class="text-center">BANCO</th>
                                    <th class="text-center">TIPO</th>
                                    <th class="text-center">N° CUENTA</th>
                                    <th class="text-center">MONTO</th>
                                    <th class="text-center">ACCIONES</th>
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
                    <h5 class="modal-title mx-auto">INGRESAR ADELANTO</h5>
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


    <!-- Modal editar -->
    <div id="modalEditarAdelanto" class="modal fade bd-example-modal-lg" tabindex="-1" role="dialog" aria-labelledby=""  aria-hidden="true" >
        <div class="modal-dialog modal-lg">
            <div class="modal-content" style="padding:20px; background: #2a3f54" >
                <div class="form-row" id="contenedorDetalleAdelanto">


                </div>
                <br>
                <button type="submit" class="btn btn-success btn-sm col-md-12 custom-input-sm" id="btnEditarAdelanto">Guardar</button>
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
    <script src="<?php echo base_url() ?>assets/js/adelantos.js"></script>
    <!-- Toast -->
    <script src="<?php echo base_url() ?>assets/js/toastr.min.js" type="text/javascript"></script>

    <script src="<?php echo base_url() ?>assets/js/dashboard.js"></script>


    <script>
      $(document).ready(function() {
          var exportar = "no", editar = "no";
          <?php if( $view_exportarAdelanto == 1 ){  ?>
              exportar = "si";
              $("#permisoExportar").text("si");
          <?php } ?>
          <?php if( $view_editarAdelanto == 1 ){  ?>
              editar = "si";
              $("#permisoEditar").text("si");
          <?php } ?>
          cargarTablaAdelantos(editar,exportar);
      });


      $("body").on("click", "#getDetalleAdelanto", function(e) {
          e.preventDefault();
          var id = $(this).parent().parent().children()[0];
          var idAdelanto = $(id).text();
          getDetalleAdelanto(idAdelanto);
      });


      $("#btnEditarAdelanto").click(function (e){
          e.preventDefault();
          updateAdelanto();
      });
  </script>
  <?php } else{ header("Location: http://localhost/RRHH-FIRMA/"); } ?>

</body>
</html>
