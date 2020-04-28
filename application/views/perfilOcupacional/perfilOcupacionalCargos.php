<?php
$data = $this->session->userdata("datos");
$usuario =  $data['usuario'];
$permisos =  $data['permisos'];
?>

<?php
$view_verPerfilOcupacional = 0; $view_generarPDF = 0;
foreach ($permisos as $key => $value) {
  if ($value->cf_existencia_permiso == "64") { $view_verPerfilOcupacional = "1"; } else
  if ($value->cf_existencia_permiso == "65") { $view_generarPDF = "1" ; }
}

if($usuario[0]->atr_activo == "1") { ?>

<div class="right_col" role="main">
    <!-- Contenedor principal -->
    <div class="x_content">


    </div>

    <div class="row">
        <div class="x_panel">
            <div class="x_content">
                <!-- <button type="button" class="btn modidev-btn" data-toggle="modal" data-target=".bd-example-modal-lg" style="margin-bottom:20px;">INGRESAR CARGO</button> -->
                <h3 class="text-center">PERFILES OCUPACIONALES</h3><br>

                <?php if ( $view_verPerfilOcupacional == 1 ) {  ?>
                <table id="tabla_cargo" class="table table-striped table-bordered table-hover dataTables-cargos" style="margin-top:20px;">
                    <thead >
                        <tr style="width:100%;">
                            <th class="text-center">ID</th>
                            <th class="text-center">CARGO</th>
                            <th class="text-center">JEFE(S) DIRECTO(S)</th>
                            <th class="text-center">LUGAR DE TRABAJO</th>
                            <th class="text-center">JORNADA DE TRABAJO</th>
                            <th class="text-center">ACCIONES</th>
                        </tr>
                    </thead>
                    <tbody id="tbodyDetalle">

                    </tbody>
                </table>
              <?php }  ?>

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

    <label id="permisoGenerarPDF" style="display:none">no</label>


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
    <script src="<?php echo base_url() ?>assets/js/generarPDF.js"></script>
    <!-- Toast -->
    <script src="<?php echo base_url() ?>assets/js/toastr.min.js" type="text/javascript"></script>

    <script src="<?php echo base_url() ?>assets/js/dashboard.js"></script>


    <script>
      $(document).ready(function() {
        <?php if( $view_generarPDF == 1){  ?>
            $("#permisoGenerarPDF").text("si");
        <?php } ?>

        var btnAcciones = "";
        var permisoGenerarPDF = $("#permisoGenerarPDF").text();

        if (permisoGenerarPDF == "si") {
          btnAcciones = '<button type="button" id="btnVerDocumentoPerfilOcupacional" class="btn btn-info btn-sm"><i class="glyphicon glyphicon-file"></i></button>';
        }

          $('.dataTables-cargos').DataTable({
              "autoWidth": false,
                language: {
                    "sProcessing": "Procesando...",
                    "sLengthMenu": "Registros _MENU_ ",
                    "sZeroRecords": "No se encontraron resultados",
                    "sEmptyTable": "Ningún dato disponible en esta tabla",
                    "sInfo": "",
                    "sInfoEmpty": "Mostrando registros del 0 al 0 de un total de 0 registros",
                    "sInfoFiltered": "(filtrado de un total de _MAX_ registros)",
                    "sInfoPostFix": "",
                    "sSearch": "Buscar:",
                    "sUrl": "",
                    "sInfoThousands": ",",
                    "sLoadingRecords": "Cargando...",
                    "oPaginate": {
                        "sFirst": "Primero",
                        "sLast": "Último",
                        "sNext": "Siguiente",
                        "sPrevious": "Anterior"
                    },
                    "oAria": {
                        "sSortAscending": ": Activar para ordenar la columna de manera ascendente",
                        "sSortDescending": ": Activar para ordenar la columna de manera descendente"
                    },
                    "buttons": {
                        "copy": "Copiar",
                        "colvis": "Visibilidad"
                    }
                },
                "ajax": {
                    url: "http://10.10.11.240/RRHH-FIRMA/index.php/getlistadecargos",
                    type: 'GET'
                },
                "columnDefs": [{
                  "targets": 5,
                  "data": null,
                  "defaultContent": btnAcciones
                }
                ],dom: '<"html5buttons"B>lTfgitp',
                  buttons: [
                  ]
            });
      });

      $("#btnAgregarCargo").click(function (e){
          e.preventDefault();
          agregarCargo();
          var table = $('#tabla_cargo').DataTable();
          table.ajax.reload(function(json) {
            $('#btnAgregarCargo').val(json.lastInput);
          });
      });

      $("body").on("click", "#btnVerDocumentoPerfilOcupacional", function(e) {
           e.preventDefault();
           var cargo = $(this).parent().parent().children()[0];
           var idCargo = $(cargo).text()
           var url = 'http://10.10.11.240/RRHH-FIRMA/index.php/docPerfilesOcupacionales?cargo='+idCargo;
           window.open(url, '_blank');
       });

  </script>

<?php } else{ header("Location: http://10.10.11.240/RRHH-FIRMA/"); } ?>

</body>
</html>
