<div class="right_col" role="main">
    <!-- Contenedor principal -->
    <div class="x_content">

    </div>

    <div class="row">
        <div class="x_panel">
            <div class="x_content">
                <button type="button" class="btn modidev-btn" data-toggle="modal" data-target="#modalCrearAFP" style="margin-bottom:20px;">INGRESAR AFP</button>

                <table id="tabla_AFP" class="table table-striped table-bordered table-hover dataTables-AFP" style="margin-top:20px;">
                    <thead >
                        <tr style="width:100%;">
                            <th class="text-center" style="width:10%">ID</th>
                            <th class="text-center">AFP</th>
                            <th class="text-center" style="width:10%">ACCIONES</th>
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
    <div id="modalCrearAFP" class="modal fade bd-example-modal-lg" tabindex="-1" role="dialog"  aria-hidden="true" >
        <div class="modal-dialog modal-lg">
            <div class="modal-content" style="padding:20px; background: #2a3f54" >
                <div class="form-row">
                    <h5 class="modal-title mx-auto">INGRESAR AFP</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                    <div class="col-md-12">
                        <br>
                        <label for="nombre">NOMBRE</label>
                        <input type="text" class="form-control custom-input-sm" id="nombre" >
                    </div>
                </div>
                <br>
                <button type="submit" class="btn btn-success" id="btnAgregarAFP">Guardar</button>
            </div>
        </div>
    </div>
    <!-- /Modal de crear -->

    <!-- Modal editar -->
    <div id="modaleditarAFP" class="modal fade" tabindex="-1" role="dialog"  aria-hidden="true" >
        <div class="modal-dialog modal-lg">
            <div class="modal-content" style="padding:20px; background: #2a3f54" >
                <div class="row">
                    <div class="col-md-12">
                      <h5 class="modal-title text-center">AFP</h5>
                      <button type="button" class="close" style="margin-top:-27px;"  data-dismiss="modal" aria-label="Close">
                          <span aria-hidden="true">&times;</span>
                      </button>
                    </div>
                    <div class="modal-body">
                      <div id="modalDetalleAFP">

                      </div>
                      <div class="col-md-12">
                        <br>
                        <button type="submit" class="btn btn-success" style="width:100%"  id="btnUpdateAFP">Guardar cambios</button>
                      </div>
                    </div>
                </div>
                <br>
            </div>
        </div>
    </div>
    <!-- /Modal de editar -->




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
    <!-- Toast -->
    <script src="<?php echo base_url() ?>assets/js/toastr.min.js" type="text/javascript"></script>


    <script>
      $(document).ready(function() {

          $('.dataTables-AFP').DataTable({
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
                    url: "http://localhost/RRHH-FIRMA/index.php/getListadoAFP",
                    type: 'GET'
                },
                "columnDefs": [{
                  "targets": 2,
                  "data": null,
                  "defaultContent": '<button type="button" id="btnVerAFP" class="btn btn-info" data-toggle="modal" data-target="#modaleditarAFP"><i class="glyphicon glyphicon-pencil"></i></button>'
                }
              ],dom: '<"html5buttons"B>lTfgitp',
                  buttons: [{
                          extend: 'copy'
                      },
                      {
                          extend: 'csv'
                      },
                      {
                          extend: 'excel',
                          title: 'Listado de AFP',

                      },
                      {
                          extend: 'pdf',
                          title: 'Listado de AFP'

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
                          }
                      }
                  ]
            });
      });

      $("#btnAgregarAFP").click(function (e){
          e.preventDefault();
          agregarAFP();
          var table = $('#tabla_AFP').DataTable();
          table.ajax.reload(function(json) {
            $('#btnAgregarAFP').val(json.lastInput);
          });
      });

      $("body").on("click", "#btnVerAFP", function(e) {
           e.preventDefault();
           var id = $(this).parent().parent().children()[0];
           getDetalleAFP($(id).text());
       });

       $("#btnUpdateAFP").click(function (e){
           e.preventDefault();
           editarAFP();
           var table = $('#tabla_AFP').DataTable();
           table.ajax.reload(function(json) {
             $('#btnAgregarAFP').val(json.lastInput);
           });
       });

       $("#modalCrearAFP").click(function (e){
           $('#modalCrearAFP').modal('show');
       });

  </script>

  </body>
</html>
