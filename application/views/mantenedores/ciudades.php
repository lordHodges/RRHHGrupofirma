<div class="right_col" role="main">
    <!-- Contenedor principal -->
    <div class="x_content">

    </div>

    <div class="row">
        <div class="x_panel">
            <div class="x_content">
                <div class="container-fluid">
                  <button type="button" class="btn modidev-btn" data-toggle="modal" data-target=".bd-example-modal-lg" style="margin-bottom:20px;">INGRESAR CIUDAD</button>

                  <div class="row">
                    <div class="col-md-12">
                      <table id="tabla_ciudad" class="table table-striped table-bordered table-hover dataTables-ciudades" style="margin-top:20px;">
                          <thead >
                              <tr style="width:100%;">
                                  <th class="text-center">ID</th>
                                  <th class="text-center">CIUDAD</th>
                              </tr>
                          </thead>
                          <tbody id="tbodyDetalle">

                          </tbody>
                      </table>
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
                <button type="submit" class="btn btn-success" id="btnAgregarCiudad">Guardar</button>
            </div>
        </div>
    </div>
    <!-- /Modal de crear -->




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
          getSelectCiudad();
          getSelectCargos();
          getSucursales();
          cargarTablaCiudades();
      });

      $("#btnAgregarCiudad").click(function (e){
          e.preventDefault();
          agregarCiudad();
          var table = $('#tabla_ciudad').DataTable();
          table.ajax.reload(function(json) {
            $('#btnAgregarCiudad').val(json.lastInput);
          });
          cargarTablaCiudades();
      });
  </script>

  </body>
</html>
