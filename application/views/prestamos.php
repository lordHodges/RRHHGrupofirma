<?php
$data = $this->session->userdata("datos");
$usuario =  $data['usuario'];
$permisos =  $data['permisos'];
?>

<?php
$view_verPrestamos = 0; $view_crearPrestamo = 0; $view_editarPrestamo = 0; $view_exportarPrestamo = 0;
foreach ($permisos as $key => $value) {
  if ($value->cf_existencia_permiso == "106") { $view_verPrestamos = "1"; } else
  if ($value->cf_existencia_permiso == "107") { $view_crearPrestamo = "1"; } else
  if ($value->cf_existencia_permiso == "109") { $view_editarPrestamo = "1"; } else
  if ($value->cf_existencia_permiso == "108") { $view_exportarPrestamo = "1"; }
}

if($usuario[0]->atr_activo == "1") { ?>
<div class="right_col" role="main">
    <!-- Contenedor principal -->
    <div class="x_content">

      <div class="row">
          <div class="x_panel">
              <div class="x_content">
                <h3 class="text-center">PRÉSTAMOS</h3><br>


                  <ul class="nav nav-tabs bar_tabs" id="myTab" role="tablist">

                      <li class="nav-item">
                        <a class="nav-link active" id="trabajadores-tab" data-toggle="tab" href="#trabajadores" role="tab" aria-controls="trabajadores" aria-selected="false">Trabajadores</a>
                      </li>

                      <li class="nav-item">
                        <a class="nav-link" id="empresas-tab" data-toggle="tab" href="#empresas" role="tab" aria-controls="empresas" aria-selected="false">Entre empresas</a>
                      </li>

                  </ul>



                  <div class="tab-content" id="trabajadores">


                      <!-- INICIO TAB PERFILES -->
                      <div class="tab-pane fade show active" id="perfiles" role="tabpanel" aria-labelledby="perfiles-tab">

                        <table id="tabla_prestamoTrabajadores" class="table table-striped table-bordered table-hover dataTables-prestamoTrabajadores" style="margin-top:20px;">
                          <thead>
                              <tr>
                                <th class="text-center">ID</th>
                                <th class="text-center">RUT</th>
                                <th class="text-center">NOMBRE</th>
                                <th class="text-center">FECHA DE PRÉSTAMO</th>
                                <th class="text-center">CUOTAS</th>
                                <th class="text-center">MONTO TOTAL</th>
                                <th class="text-center">ACCIONES</th>
                              </tr>
                          </thead>
                          <tbody id="tbodyDetalle">

                          </tbody>
                        </table>


                      </div>
                      <!-- FIN TAB PERFILES -->





                      <!-- INICIO TAB USUARIOS -->
                      <div class="tab-pane fade" id="empresas" role="tabpanel" aria-labelledby="usuarios-tab">

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
    <div id="modalVerPermisos" class="modal fade bd-example-modal-xl" tabindex="-1" style="width:100%" role="dialog" aria-labelledby="verPermisos"  aria-hidden="true" >
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
                <button type="submit" class="btn btn-success btn-sm" id="btnAgregarCiudad">Guardar</button>
            </div>
        </div>
    </div>
    <!-- /Modal de crear -->

    <label id="permisoExportarTrabajadores" style="display:none">no</label>
    <label id="permisoEditarTrabajadores" style="display:none">no</label>








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
    <script src="<?php echo base_url() ?>assets/js/prestamos.js"></script>
    <script src="<?php echo base_url() ?>assets/js/validaciones.js"></script>
    <!-- iCheck -->
    <script src="<?php echo base_url() ?>assets/vendors/iCheck/icheck.min.js"></script>
    <!-- Switchery -->
    <script src="<?php echo base_url() ?>assets/vendors/switchery/dist/switchery.min.js"></script>
    <!-- Toast -->
    <script src="<?php echo base_url() ?>assets/js/toastr.min.js" type="text/javascript"></script>

    <script src="<?php echo base_url() ?>assets/js/dashboard.js"></script>


    <script>
        $(document).ready(function() {
          var exportarTrabajador = "no", editarTrabajador = "no";
          <?php if( $view_exportarPrestamo == 1 ){  ?>
              exportar = "si";
              $("#permisoExportarTrabajadores").text("si");
          <?php } ?>
          <?php if( $view_editarPrestamo == 1 ){  ?>
              editar = "si";
              $("#permisoEditarTrabajadores").text("si");
          <?php } ?>
          cargarTablaPrestamoTrabajadores(editarTrabajador,exportarTrabajador);
        });
    </script>

  <?php } else{ header("Location: http://10.10.11.240/RRHH-FIRMA/"); } ?>

    </body>
  </html>
