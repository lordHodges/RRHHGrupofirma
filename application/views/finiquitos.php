<?php
$data = $this->session->userdata("datos");
$usuario =  $data['usuario'];
$permisos =  $data['permisos'];
?>

<?php
$view_verLiquidaciones = 0; $view_subirLiquidacion = 0; $view_descargarLiquidacion = 0;
foreach ($permisos as $key => $value) {
  if ($value->cf_existencia_permiso == "87") { $view_verLiquidaciones = "1"; } else
  if ($value->cf_existencia_permiso == "88") { $view_subirLiquidacion  = "1"; } else
  if ($value->cf_existencia_permiso == "89") { $view_descargarLiquidacion  = "1" ; }
}

if($usuario[0]->atr_activo == "1") { ?>
<div class="right_col" role="main">
    <!-- Contenedor principal -->
    <!-- <div class="x_content">

    </div> -->

    <div class="row">
        <div class="x_panel">

            <div class="x_content">
              <h3 class="text-center">FINIQUITOS</h3><br>

                <?php if ( $view_verLiquidaciones == 1 ) {  ?>
                  <table id="tabla_finiquitos" class="table table-striped table-bordered table-hover dataTables-finiquitos" style="margin-top:20px;">
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
                <?php } ?>

            </div>
        </div>
    </div>
</div>


    <!-- Modal ver lista de contratos -->
    <div id="modalVerListaFiniquitos" class="modal fade" tabindex="-1" role="dialog"  aria-hidden="true" >
        <div class="modal-dialog modal-lg">
            <div class="modal-content" style="padding:20px; background: #2a3f54" >
                <div class="form-row">
                    <div class="modal-body">
                      <div class="row" id="modalDetalleFiniquitos">


                      </div>
                    </div>

                </div>
                <br>
            </div>
        </div>
    </div>
    <!-- /Modal de ver lista de contratos -->

    <!-- Modal ver cargar archivo -->
    <div id="modalCargarArchivo" class="modal fade" tabindex="-1" role="dialog"  aria-hidden="true" >
        <div class="modal-dialog modal-lg">
            <div class="modal-content" style="padding:20px; background: #2a3f54" >
                <div class="form-row">
                  <div class="col-md-12">
                    <h5 class="modal-title mx-auto">CARGAR FINIQUITO</h5><br>
                  </div>
                  <div class="col-md-12" id="detalleCargaArchivo">
                      <form id="uploader" method="post" enctype="multipart/form-data" action="cargar_finiquito">

                        <div class="col-md-12">
                          <br>
                          <label for="fecha">FECHA</label>
                          <input type="date" class="form-control" name="fecha" >
                        </div>

                        <div class="col-md-12">
                          <br>
                          <label for="total">TOTAL</label>
                          <input type="text" class="form-control" onkeyup="soloNumeros(this.value);formatoMiles(this)" name="total" >
                        </div>

                        <input type="text" name="labelTrabajador" id="labelTrabajador" style="color:#2a3f54;border:none;border-color:#2a3f54">

                        <div class="col-md-12" >
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

    <label id="permisoSubir" style="display:none">no</label>
    <label id="permisoDescargar" style="display:none">no</label>



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
    <script src="<?php echo base_url() ?>assets/js/finiquitos.js"></script>
    <script src="<?php echo base_url() ?>assets/js/validaciones.js"></script>
    <!-- Toast -->
    <script src="<?php echo base_url() ?>assets/js/toastr.min.js" type="text/javascript"></script>

    <script src="<?php echo base_url() ?>assets/js/dashboard.js"></script>


    <script>
        $(document).ready(function() {
            getEstadosContrato();

            <?php if( $view_subirLiquidacion == 1){  ?>
                $("#permisoSubir").text("si");
            <?php } ?>

            <?php if( $view_descargarLiquidacion == 1){  ?>
                $("#permisoDescargar").text("si");
            <?php } ?>
            var permisoSubir = $("#permisoSubir").text();
            cargarTabla(permisoSubir);
        })


        $("body").on("click", "#btnVerListaFiniquitos", function(e) {
             e.preventDefault();
             var id = $(this).parent().parent().children()[0];
             var idTrabajador = $(id).text();
             getFiniquitosTrabajador(idTrabajador);
         });


       $("body").on("click", "#btnModalCargarArchivo", function(e) {
            e.preventDefault();
            var id = $(this).parent().parent().children()[0];
            var idTrabajador = $(id).text();
            // $("#labelTrabajador").append(idTrabajador);
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
                   toastr.success('Documento guardado')
                 }
               }
           });
       });



    </script>

<<<<<<< HEAD
      <?php } else{ header("Location: http://localhost/GRUPOFIRMA/"); } ?>
=======
      <?php } else{ header("Location: https://imlchile.cl/grupofirma/"); } ?>
>>>>>>> 6d452e33e03ff9b08367071c515f6627be833f1a

  </body>
</html>
