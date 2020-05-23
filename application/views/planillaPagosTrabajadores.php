<?php
$data = $this->session->userdata("datos");
$usuario =  $data['usuario'];
$permisos =  $data['permisos'];
?>

<?php
$view_verPlanillaPagos = 0;
foreach ($permisos as $key => $value) {
  if ($value->cf_existencia_permiso == "111") { $view_verPlanillaPagos = "1"; }
}

if($usuario[0]->atr_activo == "1" ) { ?>
<div class="right_col" role="main">
    <!-- Contenedor principal -->
    <div class="x_content">

    </div>

    <div class="row">
        <div class="x_panel">
            <div class="x_content">
              <h3 class="text-center">PLANILLA DE PAGOS</h3><br>


              <!-- <ul class="nav nav-tabs bar_tabs" id="myTab" role="tablist">

                  <li class="nav-item">
                    <a class="nav-link" id="perfiles-tab" data-toggle="tab" href="#perfiles" role="tab" aria-controls="perfiles" aria-selected="false">Perfiles</a>
                  </li>

                  <li class="nav-item">
                    <a class="nav-link" id="usuarios-tab" data-toggle="tab" href="#usuarios" role="tab" aria-controls="usuarios" aria-selected="false">Usuarios</a>
                  </li>

              </ul> -->





              <?php if ($view_verPlanillaPagos == "1") {  ?>
                <div class="row">

                  <div class="col-md-3" style="margin-bottom:20px;">
                      <br>
                      <label for="getSelectMes">MES</label><br>
                      <select class="custom-select" id="getSelectMes">
                        <option value="00">Seleccionar opción</option>
                        <option value="01">Enero</option>
                        <option value="02">Febrero</option>
                        <option value="03">Marzo</option>
                        <option value="04">Abril</option>
                        <option value="05">Mayo</option>
                        <option value="06">Junio</option>
                        <option value="07">Julio</option>
                        <option value="08">Agosto</option>
                        <option value="09">Septiembre</option>
                        <option value="10">Octubre</option>
                        <option value="11">Noviembre</option>
                        <option value="12">Diciembre</option>
                      </select>
                  </div>

                  <div class="col-md-3" style="margin-bottom:20px;">
                    <br>
                    <label for="getSelectAno">Año</label>
                    <select class="custom-select" id="getSelectAno">
                      <?php
                        $ahora = date("Y");
                        for ( $i=$ahora; $i >= 2020  ; $i--) { ?>
                          <option value="<?php echo $i ?>"><?php echo $i ?></option>
                      <?php } ?>
                    </select>
                  </div>


                </div>

                <table id="tabla_pagos5" class="table table-striped table-bordered table-hover dataTables-tabla_pagos5" style="margin-top:20px;">
                    <thead >
                        <tr style="width:100%;">
                            <th class="text-center">ID</th>
                            <th class="text-center">RUT</th>
                            <th class="text-center">TRABAJADOR</th>
                            <th class="text-center">SUELDO</th>
                            <th class="text-center">BONOS</th>
                            <th class="text-center">ADELANTO</th>
                            <th class="text-center">PRÉSTAMOS</th>
                            <th class="text-center">INASISTENCIA</th>
                            <th class="text-center">TOTAL A PAGAR</th>
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


    <!-- Modal ver detalle de pago -->
    <div id="modalDetallePago" class="modal fade bd-example-modal-lg" tabindex="-1" role="dialog"  aria-hidden="true" >
        <div class="modal-dialog modal-lg">
            <div class="modal-content" style="padding:20px; background: #2a3f54" >
                <div class="form-row">
                  <h5 class="modal-title mx-auto">DETALLE DEL PAGO</h5>
                  <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                      <span aria-hidden="true">&times;</span>
                  </button>

                  <div class="col-md-12 " id="contenedorDetallePago">

                  </div>

                </div>
                <br>
            </div>
        </div>
    </div>
    <!-- Fin Modal ver detalle de pago -->

    <!-- Modal ver cargar archivo -->
    <div id="modalCargarArchivo" class="modal fade" tabindex="-1" role="dialog"  aria-hidden="true" >
        <div class="modal-dialog modal-lg">
            <div class="modal-content" style="padding:20px; background: #2a3f54" >
                <div class="form-row">
                  <div class="col-md-12">
                    <h5 class="modal-title mx-auto" style="margin-left:50px;">CARGAR COMPROBANTE</h5><br>
                  </div>
                  <div class="col-md-12" id="detalleCargaArchivo">
                      <form id="uploader" method="post" enctype="multipart/form-data" action="cargar_comprobante">
                        <div class="col-md-6">
                            <br>
                            <label for="getSelectBanco">BANCO</label><br>
                            <select class="custom-select" id="getSelectBanco" name="getSelectBanco">

                            </select>
                        </div>
                        <div class="col-md-6">
                          <br>
                          <label for="fechaTransferencia">FECHA DE TRANSFERENCIA</label>
                          <input type="date" class="form-control" name="fechaTransferencia" required style="border-radius:5px;">
                        </div>

                        <div class="col-md-6">
                            <br>
                            <label for="getSelectMotivo">MOTIVO</label><br>
                            <select class="custom-select" id="getSelectMotivo" name="getSelectMotivo">
                              <option value="">Seleccionar opción</option>
                              <option value="Adelanto">Adelanto</option>
                              <option value="Pago mensual">Pago mensual</option>
                              <option value="Préstamo">Préstamo</option>
                              <option value="Otro">Otro</option>
                            </select>
                        </div>
                        <div class="col-md-6" id="contenedorOtroMotivo" style="display:none">
                          <br>
                          <label for="otroMotivo">OTRO MOTIVO</label>
                          <input type="text" class="form-control"  name="otroMotivo" style="border-radius:5px; padding:8px;">
                        </div>

                        <div class="col-md-12">
                          <br>
                          <label for="monto">MONTO</label>
                          <input type="text" class="form-control" onkeyup="soloNumeros(this.value);formatoMiles(this)" name="monto"  style="border-radius:5px; padding:7px;" required>
                        </div>
                        <input type="text" name="labelTrabajador" id="labelTrabajador" style="color:#2a3f54;border:none;border-color:#2a3f54">
                        <div class="col-md-12" >
                          <br>
                          <input lang="es" type="file" name="file" id="file">
                        </div>
                        <br>
                        <div class="col-md-12" style="margin-top:20px; margin-bottom:-20px;">
                          <button type="submit" class="btn btn-success btn-sm" id="btnCargar" style="width:100%;" >GUARDAR</button>
                        </div>
                    </form>
                  </div>

                </div>
                <br>
            </div>
        </div>
    </div>
    <!-- /Modal de cargar archivo -->

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
    <script src="<?php echo base_url() ?>assets/js/planillaPagos.js"></script>
    <script src="<?php echo base_url() ?>assets/js/validaciones.js"></script>
    <!-- Toast -->
    <script src="<?php echo base_url() ?>assets/js/toastr.min.js" type="text/javascript"></script>

    <script src="<?php echo base_url() ?>assets/js/dashboard.js"></script>


    <script>
      $(document).ready(function() {
        cargarBancos();
      });


      $("#getSelectMes").change(function (e){
         cargarTablaPagosFinDeMes();
      });

      $("#getSelectAno").change(function (e){
        if (  $('#getSelectMes') == '00'  ) {

        }else{
          cargarTablaPagosFinDeMes();
        }
      });



      $("body").on("click", "#btnVerDetallePago", function(e) {
          e.preventDefault();
          var id = $(this).parent().parent().children()[0];
          getDetallePagoTrabajador($(id).text());
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

    <?php } else{ header("Location: http://10.10.10.1/GRUPOFIRMA/"); } ?>

    </body>
</html>
