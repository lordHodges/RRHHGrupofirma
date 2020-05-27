<?php
$data = $this->session->userdata("datos");
$usuario =  $data['usuario'];
$permisos =  $data['permisos'];
?>

<?php
$view_verContrato = 0; $view_subirContrato = 0; $view_descargarContrato = 0;
foreach ($permisos as $key => $value) {
  if ($value->cf_existencia_permiso == "55") { $view_verContrato = "1"; } else
  if ($value->cf_existencia_permiso == "56") { $view_subirContrato  = "1"; } else
  if ($value->cf_existencia_permiso == "57") { $view_descargarContrato  = "1" ; }
}

if($usuario[0]->atr_activo == "1") { ?>
<div class="right_col" role="main">
    <!-- Contenedor principal -->
    <!-- <div class="x_content">

    </div> -->

    <div class="row">
        <div class="x_panel">

            <div class="x_content">
              <h3 class="text-center">CONTRATOS</h3><br>

                <?php if ( $view_verContrato == 1 ) {  ?>
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
                <?php } ?>

            </div>
        </div>
    </div>
</div>


    <!-- Modal ver lista de contratos -->
    <div id="modalVerListaContratos" class="modal fade" tabindex="-1" role="dialog"  aria-hidden="true" >
        <div class="modal-dialog modal-lg">
            <div class="modal-content" style="padding:20px; background: #2a3f54" >
                <div class="form-row">
                    <!-- <h5 class="modal-title mx-auto">Listado de contratos</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button> -->
                    <div class="modal-body">
                      <div class="row" id="modalDetalleTrabajador">


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
                    <h5 class="modal-title mx-auto">CARGAR CONTRATO</h5><br>
                    <!-- <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button> -->
                  </div>
                  <div class="col-md-12" id="detalleCargaArchivo">
                      <form id="uploader" method="post" enctype="multipart/form-data" action="cargar_archivo">

                        <div class="col-md-12">
                            <br>
                            <label for="getSelectTipoDocumento">TIPO</label><br>
                            <select class="custom-select"  id="getSelectTipoDocumento" name="getSelectTipoDocumento">
                              <option value="contrato">Contrato</option>
                              <option value="anexo">Anexo</option>
                            </select>
                        </div>

                        <div class="siEsContrato">
                          <div class="col-md-6">
                            <br>
                            <label for="fechaInicio">COMIENZO DE CONTRATO</label>
                            <input type="date" class="form-control" name="fechaInicio" >
                          </div>
                          <div class="col-md-6">
                            <br>
                            <label for="fechaTermino">TERMINO DE CONTRATO</label>
                            <input type="date" class="form-control" name="fechaTermino">
                          </div>
                          <div class="col-md-12">
                              <br>
                              <label for="getSelectEstadoContrato">ESTADO DE CONTRATO</label><br>
                              <select class="custom-select"  id="getSelectEstadoContrato" name="getSelectEstadoContrato">

                              </select>
                          </div>
                        </div>

                        <div class="siEsAnexo" style="display:none">
                          <div class="col-md-6">
                              <br>
                              <label for="getSelectMotivo">TIPO</label><br>
                              <select class="custom-select"  id="getSelectMotivo" name="getSelectMotivo">
                                <option value="Prórroga">Prórroga</option>
                                <option value="Modificación de cláusula">Modificación de cláusula</option>
                                <option value="Pacto temporal">Pacto temporal</option>
                              </select>
                          </div>
                          <div class="col-md-6">
                            <br>
                            <label for="fechaFirma">FECHA DE FIRMA</label>
                            <input type="date" class="form-control" name="fechaFirma" >
                          </div>
                          <div class="col-md-6">
                            <br>
                            <label for="fechaDesde">DESDE</label>
                            <input type="date" class="form-control" name="fechaDesde" >
                          </div>
                          <div class="col-md-6">
                            <br>
                            <label for="fechaHasta">HASTA</label>
                            <input type="date" class="form-control" name="fechaHasta">
                          </div>
                        </div><br>


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
    <script src="<?php echo base_url() ?>assets/js/contratos.js"></script>
    <script src="<?php echo base_url() ?>assets/js/validaciones.js"></script>
    <!-- Toast -->
    <script src="<?php echo base_url() ?>assets/js/toastr.min.js" type="text/javascript"></script>

    <script src="<?php echo base_url() ?>assets/js/dashboard.js"></script>


    <script>
        $(document).ready(function() {
            getSelectCargos();
            cargarTabla();
            getEstadosContrato();

            <?php if( $view_subirContrato == 1){  ?>
                $("#permisoSubir").text("si");
            <?php } ?>

            <?php if( $view_descargarContrato == 1){  ?>
                $("#permisoDescargar").text("si");
            <?php } ?>
            var permisoSubir = $("#permisoSubir").text();
            cargarTabla(permisoSubir);
        })

        $("#getSelectTipoDocumento").change(function (e){
            e.preventDefault();
            var tipo = $("#getSelectTipoDocumento").val();
            if(tipo == "contrato"){
              $(".siEsContrato").removeAttr("style");
              $(".siEsAnexo").css("display","none");
            }else{
              $(".siEsAnexo").removeAttr("style");
              $(".siEsContrato").css("display","none");
            }
        });

        $("body").on("click", "#btnVerListaContratos", function(e) {
             e.preventDefault();
             var id = $(this).parent().parent().children()[0];
             var idTrabajador = $(id).text();
             getContratosTrabajador(idTrabajador);
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


       $("body").on("click", "#btnDescargarContrato", function(e) {
            e.preventDefault();
            var id = $(this).parent().parent().children()[0];
            var idContrato = $(id).text();
            descargarContrato(idContrato);
        });

    </script>

      <?php } else{ header("Location: https://imlchile.cl/grupofirma/"); } ?>

  </body>
</html>
