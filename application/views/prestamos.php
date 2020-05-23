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
                        <a class="nav-link active" id="trabajadores-tab" onclick="seleccionTabs('trabajadores-tab')" data-toggle="tab" href="#TrabajadoresContent" role="tab" aria-controls="trabajadores" aria-selected="false">Trabajadores</a>
                      </li>

                      <!-- <li class="nav-item">
                        <a class="nav-link" id="empresas-tab" onclick="seleccionTabs('empresas-tab')" data-toggle="tab" href="#empresasContent" role="tab" aria-controls="empresas" aria-selected="false">Entre empresas</a>
                      </li> -->

                  </ul>



                  <div class="tab-content" id="trabajadores">


                      <!-- INICIO TAB PERFILES -->
                      <div class="tab-panel fade show active" id="TrabajadoresContent" role="tabpanel" aria-labelledby="trabajadores-tab">

                        <?php if ( $view_crearPrestamo == 1 ) {  ?>
                          <button type="button" class="btn modidev-btn btn-sm" data-toggle="modal" data-target="#modalCrearPrestamo" style="margin-bottom:20px; margin-top:20px;">INGRESAR PRÉSTAMO</button>
                        <?php } ?>

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
                      <div class="tab-panel fade" id="empresasContent" role="tabpanel" aria-labelledby="empresas-tab">

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


    <!-- Modal crear préstamo -->
    <div id="modalCrearPrestamo" class="modal fade bd-example-modal-xl" tabindex="-1" style="width:100%" role="dialog" aria-labelledby=""  aria-hidden="true" >
        <div class="modal-dialog modal-lg">
            <div class="modal-content" style="padding:20px; background: #2a3f54" >
                <div class="form-row">
                    <h5 class="modal-title mx-auto">INGRESAR PRÉSTAMO</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>

                    <div class="col-md-12 ">
                        <br>
                        <label for="getSelectTrabajador">TRABAJADORES</label><br>
                        <select class="custom-select" id="getSelectTrabajador">

                        </select>
                    </div>

                    <div class="col-md-12">
                        <br>
                        <label for="rutTrabajador">RUT</label>
                        <input type="text" class="form-control custom-input-sm" id="rutTrabajador">
                    </div>

                    <div class="col-md-6">
                        <br>
                        <label for="cuotas">MONTO</label>
                        <input type="number" class="form-control custom-input-sm"  this.value="generarCuotas(this.value);mayus(this.value)" id="monto">
                    </div>

                    <div class="col-md-6">
                        <br>
                        <label for="cuotas">CUOTAS</label>
                        <input type="number" class="form-control custom-input-sm" onkeyup="this.value=generarCuotas(this.value)" id="cuotas">
                    </div>

                    <br>
                    <div id="contenedorCuotasPrestamo">

                    </div>



                </div>
                <br>
                <button type="submit" class="btn btn-success btn-sm" id="btnAgregarPrestamo">Guardar</button>
            </div>
        </div>
    </div>
    <!-- Modal de crear préstamo -->










    <!-- Modal editar préstamo -->
    <div id="modalEditarPrestamoTrabajador" class="modal fade bd-example-modal-xl" tabindex="-1" style="width:100%" role="dialog" aria-labelledby=""  aria-hidden="true" >
        <div class="modal-dialog modal-lg">
            <div class="modal-content" style="padding:20px; background: #2a3f54" >
                <div class="form-row">
                    <h5 class="modal-title mx-auto">PRÉSTAMO</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>

                    <div class="col-md-12 ">
                        <br>
                        <label for="idTrabajador2">TRABAJADOR</label><br>
                        <input type="text" class="form-control custom-input-sm" id="idTrabajador2" disabled style="color:#000">
                    </div>

                    <div class="col-md-12">
                        <br>
                        <label for="rutTrabajador2">RUT</label>
                        <input type="text" class="form-control custom-input-sm" id="rutTrabajador2" disabled style="color:#000">
                    </div>

                    <div class="col-md-6">
                        <br>
                        <label for="monto2">MONTO</label>
                        <input type="text" class="form-control custom-input-sm"  this.value="generarCuotas(this.value);mayus(this.value)" id="monto2" disabled style="color:#000">
                    </div>

                    <div class="col-md-6">
                        <br>
                        <label for="cuotas2">CUOTAS</label>
                        <input type="number" class="form-control custom-input-sm" onkeyup="this.value=generarCuotas(this.value)" id="cuotas2" disabled style="color:#000">
                    </div>
                    <label id="labelPrestamo" style="display:none"></label>

                    <br>
                    <div id="contenedorCuotasPrestamoEditar">

                    </div>



                </div>
                <br>
                <button type="submit" class="btn btn-success btn-sm" id="btnEditarPrestamo">Guardar</button>
            </div>
        </div>
    </div>
    <!-- Modal de editar préstamo -->

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
          var elemento = document.getElementById('trabajadores-tab');
          elemento.style.color = "#fafafa";
          elemento.style.backgroundColor  = "#2a3f54";

          getSelectTrabajador();
          var exportarTrabajador = "no", editarTrabajador = "no";
          <?php if( $view_exportarPrestamo == 1 ){  ?>
              exportarTrabajador = "si";
              $("#permisoExportarTrabajadores").text("si");
          <?php } ?>
          <?php if( $view_editarPrestamo == 1 ){  ?>
              editarTrabajador = "si";
              $("#permisoEditarTrabajadores").text("si");
          <?php } ?>
          cargarTablaPrestamoTrabajadores(editarTrabajador,exportarTrabajador);
        });

        $("#getSelectTrabajador").change(function (e){
          completarRUT();
        });

        $("body").on("click", "#btnAgregarPrestamo", function(e) {
             e.preventDefault();
             agregarPrestamo();
         });

         $("body").on("click", "#btnGetModalDetallePrestamoTrabajador", function(e) {
              e.preventDefault();
              var id = $(this).parent().parent().children()[0];
              var rut = $(this).parent().parent().children()[1];
              var nombre = $(this).parent().parent().children()[2];
              var cuotas = $(this).parent().parent().children()[4];
              var montoTotal = $(this).parent().parent().children()[5];
              
              getDetallePrestamo(  $(id).text() , $(rut).text(), $(nombre).text(), $(cuotas).text(), $(montoTotal).text()  );
          });



          $("body").on("click", "#btnEditarPrestamo", function(e) {
               e.preventDefault();
               editarDetallePrestamo();
           });


    </script>

<<<<<<< HEAD
  <?php } else{ header("Location: http://localhost/GRUPOFIRMA/"); } ?>
=======
  <?php } else{ header("Location: https://imlchile.cl/grupofirma/"); } ?>
>>>>>>> 6d452e33e03ff9b08367071c515f6627be833f1a

    </body>
  </html>
