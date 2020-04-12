<div class="right_col" role="main">
    <!-- Contenedor principal -->
    <div class="x_content">

    </div>

    <div class="row">
        <div class="x_panel">
            <div class="x_content">
                <button type="button" class="btn modidev-btn" data-toggle="modal" data-target=".bd-example-modal-lg" style="margin-bottom:20px;">INGRESAR ESTADO</button>

                <table id="tabla_estadoContrato" class="table table-striped table-bordered table-hover dataTables-estadoContrato " style="margin-top:20px;">
                    <thead >
                        <tr style="width:100%;">
                            <th class="text-center" style="width:10%;">ID</th>
                            <th class="text-center">ESTADOS</th>
                            <th class="text-center"style="width:10%;">ACCIONES</th>
                        </tr>
                    </thead>
                    <tbody id="tbodyDetalle">

                    </tbody>
                </table>

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
                    <h5 class="modal-title mx-auto">INGRESAR ESTADO DE CONTRATO</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                    <div class="col-md-12">
                        <br>
                        <label for="nombre">NOMBRE</label>
                        <input type="text" class="form-control custom-input-sm" id="nombre" oninput="mayus(this)" required>
                    </div>
                </div>
                <br>
                <button type="submit" class="btn btn-success" id="btnAgregarEstado">Guardar</button>
            </div>
        </div>
    </div>
    <!-- /Modal de crear -->

    <!-- Modal editar -->
    <div id="modalEditarEstadosContrato" class="modal fade bd-example-modal-lg" tabindex="-1" role="dialog" aria-labelledby="crearTrabajador"  aria-hidden="true" >
        <div class="modal-dialog modal-lg">
            <div class="modal-content" style="padding:20px; background: #2a3f54" >
                <div class="form-row" id="contenedorDetalleEstadoContrato">


                </div>
                <br>
                <button type="submit" class="btn btn-success" id="btnEditarEstadoContrato">Guardar</button>
            </div>
        </div>
    </div>
    <!-- /Modal de editar -->


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
          cargarTablaEstadosContrato();
      });

      $("#btnAgregarEstado").click(function (e){
          e.preventDefault();
          agregarEstadoContrato();
          var table = $('#tabla_estadoContrato').DataTable();
          table.ajax.reload(function(json) {
            $('#btnAgregarEstado').val(json.lastInput);
          });
          cargarTablaEstadosContrato();
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
          cargarTablaEstadosContrato();
      });

  </script>

  </body>
</html>
