<div class="right_col" role="main">
    <!-- Contenedor principal -->
    <div class="x_content">

    </div>

    <div class="row">
        <div class="x_panel">
            <div class="x_content">
                <button type="button" id="abrirModalCrear" class="btn modidev-btn" data-toggle="modal" data-target=".bd-example-modal-lg" style="margin-bottom:20px;">CREAR CONTRATO</button>
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
                  <div class="col-md-12">
                    <!-- <form action="cargar_archivo" method="post" enctype="multipart/form-data" target="_blank"> -->
                      <form id="uploader" method="post" enctype="multipart/form-data" action="cargar_archivo"  >
                      <div class="col-md-12">
                        <input type="file" name="file" id="file">
                      </div>
                      <br>
                      <!-- <input type="submit" value="GUARDAR"class="btn btn-success" class="btn btn-success btn-sm" style="width:100%" > -->
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
    <script src="<?php echo base_url() ?>assets/build/js/custom.min.js"></script>
    <!-- MODIDEV -->
    <script src="<?php echo base_url() ?>assets/js/modidev.js"></script>
    <script src="<?php echo base_url() ?>assets/js/contratos.js"></script>
    <script src="<?php echo base_url() ?>assets/js/validaciones.js"></script>
    <!-- Toast -->
    <script src="<?php echo base_url() ?>assets/js/toastr.min.js" type="text/javascript"></script>


    <script>
        $(document).ready(function() {
            getSelectCargos();
            cargarTabla();
        })

        $("body").on("click", "#btnVerListaContratos", function(e) {
             e.preventDefault();
             var id = $(this).parent().parent().children()[0];
             var idTrabajador = $(id).text();
             getContratosTrabajador(idTrabajador);
         });

         // $("body").on("click", "#btnCargar", function(e) {
         //      // e.preventDefault();
         //      // cargar_archivo();
         //  });

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
                         console.log('success');
                         $('#modalCargarArchivo').modal('hide');
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
