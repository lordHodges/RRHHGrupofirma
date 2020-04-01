<div class="right_col" role="main">
    <!-- Contenedor principal -->
    <div class="x_content">

    </div>

    <div class="row">
        <div class="x_panel">
            <div class="x_content">
                <!-- <button type="button" class="btn modidev-btn" data-toggle="modal" data-target=".bd-example-modal-lg" style="margin-bottom:20px;">INGRESAR CARGO</button> -->

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
                    <h5 class="modal-title mx-auto">INGRESAR CARGO</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                    <div class="col-md-12">
                        <br>
                        <label for="nombre">NOMBRE</label>
                        <input type="text" class="form-control custom-input-sm" id="nombre">
                    </div>
                    <div class="col-md-12">
                        <br>
                        <label for="jefeDirecto">JEFE DIRECTO</label>
                        <input type="text" class="form-control custom-input-sm" id="jefeDirecto">
                    </div>
                    <div class="col-md-12">
                        <br>
                        <label for="lugarTrabajo">LUGAR DE TRABAJO</label>
                        <input type="text" class="form-control custom-input-sm" id="lugarTrabajo">
                    </div>
                    <div class="col-md-12">
                        <br>
                        <label for="jornadaTrabajo">JORNADA DE TRABAJO</label>
                        <input type="text" class="form-control custom-input-sm" id="jornadaTrabajo">
                    </div>
                    <div class="col-md-12">
                        <br>
                        <label for="sueldo">SUELDO</label>
                        <input type="text" class="form-control custom-input-sm" id="sueldo">
                    </div>
                </div>
                <br>
                <button type="submit" class="btn btn-success" id="btnAgregarCargo">Guardar</button>
            </div>
        </div>
    </div>
    <!-- /Modal de crear -->




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


    <script>
      $(document).ready(function() {

          $('.dataTables-cargos').DataTable({
              "autoWidth": false,
                language: {
                    "sProcessing": "Procesando...",
                    "sLengthMenu": "Registros _MENU_ ",
                    "sZeroRecords": "No se encontraron resultados",
                    "sEmptyTable": "Ningún dato disponible en esta tabla",
                    "sInfo": "Mostrando registros del _START_ al _END_ de un total de _TOTAL_ registros",
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
                    url: "http://10.10.11.240/RRHH-FIRMA/getlistadecargos",
                    type: 'GET'
                },
                "columnDefs": [{
                  "targets": 5,
                  "data": null,
                  "defaultContent": '<button type="button" id="btnVerDocumentoPerfilOcupacional" class="btn btn-info"><i class="glyphicon glyphicon-file"></i></button>'
                }
                ],dom: '<"html5buttons"B>lTfgitp',
                  buttons: [{
                          extend: 'copy',
                          exportOptions: {
                              columns: [ 1,2,3,4,5 ]
                          }
                      },
                      {
                          extend: 'csv',
                          exportOptions: {
                              columns: [ 1,2,3,4,5 ]
                          }
                      },
                      {
                          extend: 'excel',
                          title: 'Lista de cargos',
                          exportOptions: {
                              columns: [ 1,2,3,4,5 ]
                          }
                      },
                      {
                          extend: 'pdf',
                          title: 'Lista de cargos',
                          exportOptions: {
                              columns: [ 1,2,3,4,5 ]
                          }

                      },
                      {
                          extend: 'print',
                          title: 'Firma de abogados',
                          customize: function(win) {
                              $(win.document.body).addClass('white-bg');
                              $(win.document.body).css('font-size', '10px');
                              $(win.document.body).find('table')
                                  .addClass('compact')
                                  .css('font-size', 'inherit');
                          },
                          exportOptions: {
                              columns: [ 1,2,3,4,5 ]
                          }
                      }
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
           var url = 'http://10.10.11.240/RRHH-FIRMA/docPerfilesOcupacionales?cargo='+idCargo;
           window.open(url, '_blank');
       });

  </script>

  </body>
</html>
