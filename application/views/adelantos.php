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
                                    <th class="text-center">EMPRESA</th>
                                    <th class="text-center">BANCO</th>
                                    <th class="text-center">TIPO</th>
                                    <th class="text-center">N° CUENTA</th>
                                    <th class="text-center">MONTO</th>
                                    <th class="text-center">TRANSFERENCIA</th>
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

    <!-- Modal ver cargar archivo -->
    <div id="modalCargarArchivo" class="modal fade" tabindex="-1" role="dialog"  aria-hidden="true" >
        <div class="modal-dialog modal-lg">
            <div class="modal-content" style="padding:20px; background: #2a3f54" >
                <div class="form-row">
                  <div class="col-md-12">
                    <!-- <h5 class="modal-title mx-auto text-center" style="margin-left:50px;">CARGAR COMPROBANTE</h5><br> -->
                  </div>
                  <h5 class="text-center mx-auto" style="color:#fff">INFORMACIÓN PARA TRANSFERIR</h5>
                  <div class="col-md-12">
                    <div class="col-md-6">
                      <br>
                      <label for="bancoTrabajador">BANCO</label>
                      <input type="text" class="form-control" id="bancoTrabajador" disabled required style="border-radius:5px; color:#000;">
                    </div>

                    <div class="col-md-6">
                      <br>
                      <label for="tipoCuentaTrabajador">TIPO DE CUENTA</label>
                      <input type="text" class="form-control" id="tipoCuentaTrabajador" disabled required style="border-radius:5px; color:#000;">
                    </div>

                    <div class="col-md-6">
                      <br>
                      <label for="numCuentaTrabajador">NÚMERO DE CUENTA</label>
                      <input type="text" class="form-control" id="numCuentaTrabajador" disabled required style="border-radius:5px; color:#000;">
                    </div>

                    <div class="col-md-6">
                      <br>
                      <label for="montoTransferenciaTrabajador">MONTO SOLICITADO</label>
                      <input type="text" class="form-control" id="montoTransferenciaTrabajador" onkeyup="soloNumeros(this.value);formatoMiles(this)" disabled required style="border-radius:5px; color:#000;">
                    </div>
                  </div>


                  <h5 class="text-center mx-auto" style="color:#fff; margin-top:40px">INFORMACIÓN DE COMPROBANTE</h5>
                  <div class="col-md-12" id="detalleCargaArchivo">
                      <form id="uploader" method="post" enctype="multipart/form-data" action="cargar_comprobante">
                        <div class="col-md-12">
                            <br>
                            <label for="getSelectBanco">BANCO</label><br>
                            <select class="custom-select" id="getSelectBanco" name="getSelectBanco">

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
                            <select class="custom-select" id="getSelectMotivo"  name="getSelectMotivo">
                              <option value="Adelanto">Adelanto</option>
                            </select>
                        </div>


                        <div class="col-md-12">
                          <br>
                          <label for="monto">MONTO DE LA TRANSFERENCIA</label>
                          <input type="text" class="form-control" id="monto" name="monto" onkeyup="soloNumeros(this.value);formatoMiles(this)"  style="border-radius:5px; padding:7px; " required>
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
    <script src="<?php echo base_url() ?>assets/js/modidev.js"></script>
    <script src="<?php echo base_url() ?>assets/js/adelantos.js"></script>
    <script src="<?php echo base_url() ?>assets/js/validaciones.js"></script>
    <!-- Toast -->
    <script src="<?php echo base_url() ?>assets/js/toastr.min.js" type="text/javascript"></script>

    <script src="<?php echo base_url() ?>assets/js/dashboard.js"></script>


    <script>
      $(document).ready(function() {
          cargarBancos();
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

      // $("#getSelectBanco").change(function (e){
      //   $.ajax({
      //       url: 'getBancos',
      //       type: 'GET',
      //       dataType: 'json'
      //   }).then(function (response) {
      //       $.each(response, function (i, o) {
      //         if( $("#getSelectBanco").val()  == o.cp_banco ){
      //           if(!o.atr_sitio == ""){
      //             window.open(o.atr_sitio);
      //           }
      //         }
      //       });
      //   });
      // });

      $('#uploader').submit(function(e){
       e.preventDefault();
          $.ajax({
              url:$('#uploader').attr('action'),
              type:"post",
              data:new FormData(this), // form
              processData:false,
              contentType:false,
              cache:false,
              async:false,
              success: function(data){
                if (data == "" || data == null) {
                  toastr.error("Error al guardar");
                }else{
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
              url: 'addHistorialAdelanto',
              type: 'POST',
              dataType: 'json',
              data: {"monto": monto, "idTrabajador":idTrabajador, "banco":banco, "fecha":fecha}
          }).then(function (msg) {

          });
      });




      $("body").on("click", "#btnCargarComprobante", function(e) {
          e.preventDefault();
          var id = $(this).parent().parent().children()[0];
          var idTrabajador = $(id).text();
          $("#labelTrabajador").val(idTrabajador);

          var id = $(this).parent().parent().children()[0];
          var idAdelanto = $(id).text();

          var banco = $(this).parent().parent().children()[3];
          var bancoTrabajador = $(banco).text();
          $("#bancoTrabajador").val(bancoTrabajador);

          var tipo = $(this).parent().parent().children()[4];
          var tipoCuentaTrabajador = $(tipo).text();
          $("#tipoCuentaTrabajador").val(tipoCuentaTrabajador);

          var num = $(this).parent().parent().children()[5];
          var numCuentaTrabajador = $(num).text();
          $("#numCuentaTrabajador").val(numCuentaTrabajador);

          var monto = $(this).parent().parent().children()[6];
          var montoTrabajador = $(monto).text();
          $("#montoTransferenciaTrabajador").val(montoTrabajador);

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
  <?php } else{ header("Location: https://imlchile.cl/ grupofirma/"); } ?>

</body>
</html>
