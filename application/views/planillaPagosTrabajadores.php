<?php
$data = $this->session->userdata("datos");
$usuario =  $data['usuario'];
$permisos =  $data['permisos'];
?>

<?php
$view_verPlanillaPagos = 0;
foreach ($permisos as $key => $value) {
  if ($value->cf_existencia_permiso == "111") {
    $view_verPlanillaPagos = "1";
  }
}

if ($usuario[0]->atr_activo == "1") { ?>
  <div class="right_col" role="main">
    <!-- Contenedor principal -->
    <div class="x_content">

    </div>

    <div class="row">
      <div class="x_panel">
        <div class="x_content" style="margin-bottom:20px;">
          <h3 class="text-center">PLANILLA DE PAGOS</h3><br>

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
              for ($i = $ahora; $i >= 2020; $i--) { ?>
                <option value="<?php echo $i ?>"><?php echo $i ?></option>
              <?php } ?>
            </select>
          </div>

          <div class="col-md-3" style="margin-bottom:20px;">
            <br>
            <label for="getSelectEmpresa">EMPRESA</label><br>
            <select class="custom-select" id="getSelectEmpresa">

            </select>
          </div>


        </div>


        <ul class="nav nav-tabs bar_tabs" id="myTab" role="tablist">

          <li class="nav-item">
            <a class="nav-link" id="detalle-tab" data-toggle="tab" href="#detallePagos" role="tab" aria-controls="perfiles" aria-selected="false">Detalle de pagos</a>
          </li>

          <li class="nav-item">
            <a class="nav-link" id="transferir-tab" data-toggle="tab" href="#paraTransferir" role="tab" aria-controls="usuarios" aria-selected="false">Planillas para transferir</a>
          </li>

        </ul>


        <div class="tab-content" id="myTabContent">

          <div class="tab-pane fade show active" id="detallePagos" role="tabpanel" aria-labelledby="home-tab">

            <?php if ($view_verPlanillaPagos == "1") {  ?>
              <div class="row">

                <table id="tabla_pagos5" class="table table-striped table-bordered table-hover dataTables-tabla_pagos5" style="margin-top:20px;">
                  <thead>
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
                      <th class="text-center">TRANSFERENCIA</th>
                      <th class="text-center" style="width:10%;">ACCIONES</th>
                    </tr>
                  </thead>
                  <tbody id="tbodyDetalle">

                  </tbody>
                </table>
              <?php } ?>

              </div>
          </div><!-- FIN TABLA DETALLE PAGOS  -->




          <div class="tab-pane fade" id="paraTransferir" role="tabpanel" aria-labelledby="contrato-tab">
            <?php if ($view_verPlanillaPagos == "1") {  ?>
              <div class="row">

                <table id="tabla_planillaBanco" class="table table-striped table-bordered table-hover dataTables-planillaBanco" style="margin-top:20px;">
                  <thead>
                    <tr style="width:100%;">
                      <th class="text-center">RUT BENEFICIARIO</th>
                      <th class="text-center">NOMBRE BENEFICIARIO</th>
                      <th class="text-center">MONTO</th>
                      <th class="text-center">MEDIO DE PAGO</th>
                      <th class="text-center">BANCO</th>
                      <th class="text-center">TIPO DE CUENTA</th>
                      <th class="text-center">NÚMERO DE CUENTA</th>
                      <th class="text-center">EMAIL</th>
                      <th class="text-center">REFERENCIA CLIENTE</th>
                      <th class="text-center">GLOSA CARTOLA ORIGEN</th>
                      <th class="text-center">GLOSA CARTOLA DESTINO</th>
                      <th class="text-center">DETALLE DE PAGO</th>
                    </tr>
                  </thead>
                  <tbody id="tbodyDetalle2">

                  </tbody>
                </table>
              <?php } ?>

              </div>
          </div><!-- FIN TABLA PLANILLAS PARA TRANSFERIR  -->

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
  <div id="modalDetallePago" class="modal fade bd-example-modal-lg" tabindex="-1" role="dialog" aria-hidden="true">
    <div class="modal-dialog modal-lg">
      <div class="modal-content" style="padding:20px; background: #2a3f54">
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
  <!-- modal generar liquidacion VHT-->
  <div id="modalGenerarLiquidacion" class="modal fade bd-example-modal-lg" tabindex="-1" role="dialog" aria-hidden="true">
    <div class="modal-dialog modal-lg">
      <div class="modal-content" style="padding:20px; background: #2a3f54">
        <div class="form-row">
          <h5 class="modal-title mx-auto">Generar Liquidacion</h5>
          <p>revisar correcciones antes de generar</p>
          <button type="button" class="close" data-dismiss="modal" aria-label="Close">
            <span aria-hidden="true">&times;</span>
          </button>

          <div class="col-md-12 " id="contenedorGenerarLiquidacion">

          </div>

        </div>

        <br>

        <button type="submit" class="btn btn-success btn-sm" id="btnGenerarLiquidacion">Guardar</button>
      </div>
    </div>
  </div>
  <!-- fin modal generar liquidacion -->
  <!-- Modal ver cargar archivo -->
  <div id="modalCargarArchivo" class="modal fade" tabindex="-1" role="dialog" aria-hidden="true">
    <div class="modal-dialog modal-lg">
      <div class="modal-content" style="padding:20px; background: #2a3f54">
        <div class="form-row">
          <div class="col-md-12">
            <h5 class="modal-title mx-auto" style="margin-left:50px;">CARGAR COMPROBANTE</h5><br>
          </div>
          <div class="col-md-12" id="detalleCargaArchivo">
            <form id="uploader" method="post" enctype="multipart/form-data" action="cargar_comprobante">
              <div class="col-md-6">
                <br>
                <label for="getSelectBanco">BANCO</label><br>
                <select class="custom-select" id="getSelectBanco" name="getSelectBanco" required>

                </select>
              </div>
              <div class="col-md-6">
                <br>
                <label for="fechaTransferencia">FECHA DE TRANSFERENCIA</label>
                <input type="date" class="form-control" name="fechaTransferencia" id="fechaTransferencia" required style="border-radius:5px;">
              </div>

              <div class="col-md-6">
                <br>
                <label for="getSelectMotivo">MOTIVO</label><br>
                <select class="custom-select" id="getSelectMotivo" name="getSelectMotivo">
                  <option value="Pago mensual">Pago mensual</option>
                </select>
              </div>
              <div class="col-md-6" id="contenedorOtroMotivo" style="display:none">
                <br>
                <label for="otroMotivo">OTRO MOTIVO</label>
                <input type="text" class="form-control" name="otroMotivo" style="border-radius:5px; padding:8px;">
              </div>

              <div class="col-md-6">
                <br>
                <label for="monto">MONTO</label>
                <input type="text" class="form-control" onkeyup="soloNumeros(this.value);formatoMiles(this)" name="monto" id="monto" style="border-radius:5px; padding:7px;" required>
              </div>
              <input type="text" name="labelTrabajador" id="labelTrabajador" style="color:#2a3f54;border:none;border-color:#2a3f54">
              <div class="col-md-12">
                <br>
                <input lang="es" type="file" name="file" id="file">
              </div>
              <br>
              <div class="col-md-12" style="margin-top:20px; margin-bottom:-20px;">
                <button type="submit" class="btn btn-success btn-sm" id="btnCargar" style="width:100%;">GUARDAR</button>
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
  <script src="<?php echo base_url();   ?>assets/vendors/jquery/dist/jquery.min.js"></script>
  <!-- Bootstrap -->
  <script src="<?php echo base_url();   ?>assets/vendors/bootstrap/dist/js/bootstrap.bundle.min.js"></script>
  <!-- Datatables -->
  <script src="<?php echo base_url();   ?>assets/js/datatables.min.js" type="text/javascript"></script>
  <!-- Custom Theme Scripts -->
  <script src="<?php echo base_url();   ?>assets/build/js/custom.min.js"></script>
  <!-- MODIDEV -->
  <script src="<?php echo base_url();   ?>assets/js/modelos.js"></script>
  <script src="<?php echo base_url();   ?>assets/js/planillaPagos.js"></script>
  <script src="<?php echo base_url();   ?>assets/js/validaciones.js"></script>
  <!-- Toast -->
  <script src="<?php echo base_url();   ?>assets/js/toastr.min.js" type="text/javascript"></script>

  <script src="<?php echo base_url();   ?>assets/js/dashboard.js"></script>


  <script>
    $(document).ready(function() {
      cargarBancos();
      cargarEmpresas();
    });


    $("#getSelectMes").change(function(e) {
      cargarTablaPagosFinDeMes();
      cargarTablaPlanillaPagoMes();
    });

    $("#getSelectAno").change(function(e) {
      if ($('#getSelectMes') == '00') {

      } else {
        cargarTablaPagosFinDeMes();
        cargarTablaPlanillaPagoMes();
      }
    });

    $("#getSelectEmpresa").change(function(e) {
      if ($('#getSelectMes') == '00') {

      } else {
        cargarTablaPagosFinDeMes();
        cargarTablaPlanillaPagoMes();
      }
    });



    $("body").on("click", "#btnVerDetallePago", function(e) {
      e.preventDefault();
      var id = $(this).parent().parent().children()[0];
      getDetallePagoTrabajador($(id).text());
    });
    /* modificaciones generarLiquidacion VHT */

    $("body").on("click", "#btnVerLiquidacion", function(e) {
      e.preventDefault();
      var id = $(this).parent().parent().children()[0];
      getGenerarLiquidacion($(id).text());
    });
    /* capturar funcion del bioton generarliquidacion */
    $("body").on("click", "#btnGenerarLiquidacion", function(e) {
      e.preventDefault();
      /*  var idTrabajador = $("#selectTrabajador1").val();
       var fechaInicio = $("#fechaInicio").val();
       var fechaTermino = $("#terminoContrato").val();
       var ciudadFirma = $("#ciudad").val(); */
      var mesCorriente = $("#mesCorriente").val();
      var razonSocial = $("#razonSocial").val();
      var rutEmpresa = $("#rutEmpresa").val();
      var nombreTrabajador = $("#nombreTrabajador").val();
      var rutTrabajador = $("#rutTrabajador").val();
      var centralCosto = $("#centralCosto").val();
      var afpTrabajador = $("#afpTrabajador").val();
      var saludTrabajador = $("#saludTrabajador").val();
      var diasTrabajados = $("#diasTrabajados").val();
      var horasExtras = $("#horasExtras").val();
      var cargas = $("#cargas").val();
      var sueldoBase = $("#sueldoBase").val();
      var gratificacionLegal = $("#gratificacionLegal").val();
      var totalImponible = $("#totalImponible").val();
      var cargasFamiliaresMonto = $("#cargasFamiliaresMonto").val();
      var montoBono = $("#montoBono").val();
      var totalNoImponible = $("#totalNoImponible").val();
      var valorPrevision = $("#valorPrevision").val();
      var valorSalud = $("#valorSalud").val();
      var valorCesantia = $("#valorCesantia").val();
      var valorImpuestoUnico = $("#valorImpuestoUnico").val();
      var totalDescuentosLegales = $("#totalDescuentosLegales").val();
      var fechaOrdenadaAdelanto = $("#fechaOrdenadaAdelanto").val();
      var atr_monto = $("#atr_monto").val();
      var totalPrestamo = $("#totalPrestamo").val();
      var cantidadCuotas = $("#cantidadCuotas").val();
      var montoDescuento = $("#montoDescuento").val();
      var totalOtrosDescuentos = $("#totalOtrosDescuentos").val();
      var totalDescuentos = $("#totalDescuentos").val();
      var totalHaberes = $("#totalHaberes").val();
      var valorAlcanceLiquido = $("#valorAlcanceLiquido").val();
      var montoPrestamo = $("#montoPrestamo").val();
      var bonoAsistenciaAPagar = $("#bonoAsistenciaAPagar").val();
      var fechaTernmino = $("#fechaTermino").val();
      var totalTributable = $("#totalTributable").val();
      var valorImpuestoUnico = $("#valorImpuestoUnico").val();
      var valorUF = $("#valorUF").val();
      var valorUTM = $("#valorUTM").val();
      var plan = $("#plan").val();
      var valorSaludAdicional = $("#valorSaludAdicional").val();
      var valorImponible = $("#valorImponible").val();




      var url = 'https://www.imlchile.cl/grupofirma/index.php/docGenerarLiquidacion?'

        +
        'mesCorriente=' + mesCorriente +
        '&&valorImpuestoUnico=' + valorImpuestoUnico +
        '&&valorUF=' + valorUF +
        '&&valorUTM=' + valorUTM +
        '&&totalTributable=' + totalTributable +
        '&&razonSocial=' + razonSocial +
        '&&rutEmpresa=' + rutEmpresa +
        '&&nombreTrabajador=' + nombreTrabajador +
        '&&rutTrabajador=' + rutTrabajador +
        '&&centralCosto=' + centralCosto +
        '&&afpTrabajador=' + afpTrabajador +
        '&&saludTrabajador=' + saludTrabajador +
        '&&diasTrabajados=' + diasTrabajados +
        '&&horasExtras=' + horasExtras +
        '&&cargas=' + cargas +
        '&&plan=' + plan +
        '&&sueldoBase=' + sueldoBase +
        '&&gratificacionLegal=' + gratificacionLegal +
        '&&totalImponible=' + totalImponible +
        '&&cargasFamiliaresMonto=' + cargasFamiliaresMonto +
        '&&montoBono=' + montoBono +
        '&&totalNoImponible=' + totalNoImponible +
        '&&valorPrevision=' + valorPrevision +
        '&&valorSalud=' + valorSalud +
        '&&valorCesantia=' + valorCesantia +
        '&&valorImpuestoUnico=' + valorImpuestoUnico +
        '&&totalDescuentosLegales=' + totalDescuentosLegales +
        '&&fechaOrdenadaAdelanto=' + fechaOrdenadaAdelanto +
        '&&atr_monto=' + atr_monto +
        '&&totalPrestamo=' + totalPrestamo +
        '&&cantidadCuotas=' + cantidadCuotas +
        '&&montoDescuento=' + montoDescuento +
        '&&totalOtrosDescuentos=' + totalOtrosDescuentos +
        '&&totalDescuentos=' + totalDescuentos +
        '&&totalHaberes=' + totalHaberes +
        '&&valorAlcanceLiquido=' + valorAlcanceLiquido +
        '&&montoPrestamo=' + montoPrestamo +
        '&&bonoAsistenciaAPagar=' + bonoAsistenciaAPagar +
        '&&fechaTermino=' + fechaTernmino +
        '&&valorImponible=' + valorImponible +
        '&&valorSaludAdicional=' + valorSaludAdicional
      window.open(url, '_blank');


    });





    /* fin modificaiones generar contrato */

    $("body").on("click", "#btnCargarComprobante", function(e) {
      e.preventDefault();
      var id = $(this).parent().parent().children()[0];
      var idTrabajador = $(id).text();
      document.getElementById("labelTrabajador").value = idTrabajador;
    });

    $('#uploader').submit(function(e) {
      e.preventDefault();
      $.ajax({
        url: $('#uploader').attr('action'),
        type: "post",
        data: new FormData(this), // form
        processData: false,
        contentType: false,
        cache: false,
        async: false,
        success: function(data) {
          if (data == "" || data == null) {
            toastr.error("Error al guardar");
          } else {
            $('#modalCargarArchivo').modal('hide');
            toastr.success('Comprobante guardado')
          }
        }
      });

      var monto = $("#monto").val();
      var idTrabajador = $("#labelTrabajador").val();
      var fecha = $("#fechaTransferencia").val();
      var banco = $("#getSelectBanco").val();


      $.ajax({
        url: 'addHistorialPagosMensuales',
        type: 'POST',
        dataType: 'json',
        data: {
          "monto": monto,
          "idTrabajador": idTrabajador,
          "banco": banco,
          "fecha": fecha
        }
      }).then(function(msg) {

      });
    });
  </script>

<?php } else {
  header("Location: https://www.imlchile.cl/grupofirma/");
} ?>

</body>

</html>