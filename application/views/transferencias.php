<div class="right_col" role="main">
    <!-- Contenedor principal -->
    <!-- <div class="x_content">

    </div> -->

    <div class="row">
        <div class="x_panel">

            <div class="x_content">
              <h3 class="text-center">TRANSFERENCIAS</h3><br>
                  <table id="tabla_trabajador" class="table table-striped table-bordered table-hover dataTables-trabajadores" style="margin-top:20px;">
                    <thead>
                        <tr>
                            <th class="text-center">ID</th>
                            <th class="text-center">RUT</th>
                            <th class="text-center">NOMBRE COMPLETO</th>
                            <th class="text-center">CONTRATACIÓN</th>
                            <th class="text-center">EMPRESA</th>
                            <th class="text-center">ACCIONES</th>
                        </tr>
                    </thead>
                    <tbody id="tbodyDetalle">

                    </tbody>
                  </table>
            </div>
        </div>
    </div>
</div>


    <!-- Modal ver lista de transferencias -->
    <div id="modalVerListaTransferencias" class="modal fade" tabindex="-1" role="dialog"  aria-hidden="true" >
        <div class="modal-dialog modal-lg">
            <div class="modal-content" style="padding:20px; background: #2a3f54" >
                <div class="form-row">
                    <div class="modal-body">
                      <div class="row" id="modalDetalleTransferencias">


                      </div>
                    </div>

                </div>
                <br>
            </div>
        </div>
    </div>
    <!-- /Modal de ver lista de transferencias -->

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
                            <select class="custom-select" id="getSelectMotivo">
                              <option value="">Seleccionar opción</option>
                              <option value="Adelanto">Adelanto</option>
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

    <!-- /Contenedor principal-->

    <!-- footer content -->
    <footer>
        <div class="clearfix"></div>
    </footer>
    <!-- /footer content -->




    <!-- jQuery -->
    <script src="<?php echo base_url() ?>assets/vendors/jquery/dist/jquery.min.js"></script>
    <!-- Bootstrap -->
    <script src="<?php echo base_url() ?>assets/vendors/bootstrap/dist/js/bootstrap.bundle.min.js"></script>
    <script src="<?php echo base_url() ?>assets/vendors/DateJS/build/date.js"></script>
     <!-- Datatables -->
    <script src="<?php echo base_url() ?>assets/js/datatables.min.js" type="text/javascript"></script>
    <!-- Custom Theme Scripts -->
    <script src="<?php echo base_url() ?>assets/build/js/custom.js"></script>
    <!-- MODIDEV -->
    <script src="<?php echo base_url() ?>assets/js/modidev.js"></script>
    <script src="<?php echo base_url() ?>assets/js/transferencia.js"></script>
    <script src="<?php echo base_url() ?>assets/js/validaciones.js"></script>
    <!-- Toast -->
    <script src="<?php echo base_url() ?>assets/js/toastr.min.js" type="text/javascript"></script>

    <script src="<?php echo base_url() ?>assets/js/dashboard.js"></script>


    <script>
        $(document).ready(function() {
            cargarNotificaciones();
            cargarTabla();
            cargarBancos();
        })

        $("#getSelectBanco").change(function (e){
          $.ajax({
              url: 'getBancos',
              type: 'GET',
              dataType: 'json'
          }).then(function (response) {
              $.each(response, function (i, o) {
                if( $("#getSelectBanco").val()  == o.cp_banco ){
                  if(!o.atr_sitio == ""){
                    window.open(o.atr_sitio);
                  }
                }
              });
          });
        });

        $("#getSelectMotivo").change(function (e){
          if( $("#getSelectMotivo").val() == "Otro" ){
            document.getElementById('contenedorOtroMotivo').removeAttribute("style");
          }
        });


        $("body").on("click", "#btnVerListaTransferencias", function(e) {
             e.preventDefault();
             var id = $(this).parent().parent().children()[0];
             var idTrabajador = $(id).text();
             getTransferenciasTrabajador(idTrabajador);
         });

       $("body").on("click", "#btnModalCargarArchivo", function(e) {
            e.preventDefault();
            var id = $(this).parent().parent().children()[0];
            var idTrabajador = $(id).text();

            document.getElementById("labelTrabajador").value = idTrabajador;
        });

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
       });


       $("body").on("click", "#btnDescargarContrato", function(e) {
            e.preventDefault();
            var id = $(this).parent().parent().children()[0];
            var idContrato = $(id).text();
            descargarContrato(idContrato);
        });

    </script>


  </body>
</html>
