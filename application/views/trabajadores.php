<div class="right_col" role="main">
    <!-- Contenedor principal -->
    <div class="x_content">

    </div>

    <div class="row">
        <div class="x_panel">
            <div class="x_content">
                <button type="button" class="btn modidev-btn" data-toggle="modal" data-target=".bd-example-modal-lg" style="margin-bottom:20px;">INGRESAR TRABAJADOR</button>
                <table id="tabla_trabajador" class="table table-striped table-bordered table-hover dataTables-trabajadores" style="margin-top:20px;">
                    <thead>
                        <tr>
                          <th class="text-center">ID</th>
                            <th class="text-center">RUT</th>
                            <th class="text-center">NOMBRES</th>
                            <th class="text-center">APELLIDOS</th>
                            <th class="text-center">EMPRESA</th>
                            <th class="text-center">SUCURSAL</th>
                            <th class="text-center">DIRECCION</th>
                            <th class="text-center">CARGO</th>
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
    <div id="myModal" class="modal fade bd-example-modal-lg" tabindex="-1" role="dialog"  aria-hidden="true" >
        <div class="modal-dialog modal-lg">
            <div class="modal-content" style="padding:20px; background: #2a3f54" >
                <div class="form-row">
                    <h5 class="modal-title mx-auto">INGRESAR TRABAJADOR</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                    <div class="col-md-12">
                        <br>
                        <label for="rut">RUT</label>
                        <input type="text" class="form-control custom-input-sm" id="rut" required oninput="checkRutOficial(this)">
                    </div>

                    <div class="col-md-6 col-sm-12">
                        <br>
                        <label for="nombres">NOMBRES</label>
                        <input type="text" class="form-control" id="nombres" oninput="mayus(this);" required>
                    </div>

                    <div class="col-md-6 col-sm-12">
                        <br>
                        <label for="apellidos">APELLIDOS</label>
                        <input type="text" class="form-control" id="apellidos" oninput="mayus(this);" required>
                    </div>

                    <div class="col-md-12 col-sm-12">
                        <br>
                        <label for="direccion">DIRECCIÓN</label>
                        <input type="text" class="form-control" id="direccion" oninput="mayus(this);" required>
                    </div>

                    <br><br>

                    <div class="col-md-6">
                        <br>
                        <label for="getSelectCiudad">CIUDAD</label><br>
                        <select class="custom-select" id="getSelectCiudad">

                        </select>
                    </div>

                    <div class="col-md-6">
                        <br>
                        <label for="getSelectSucursal">SUCURSAL</label><br>
                        <select class="custom-select" id="getSelectSucursal">

                        </select>
                    </div>

                    <div class="col-md-6">
                        <br>
                        <label for="getSelectCargo">CARGO</label><br>
                        <select class="custom-select" id="getSelectCargo">

                        </select>
                    </div>

                    <div class="col-md-6">
                        <br>
                        <label for="getSelectEmpresa">EMPRESA CONTRATANTE</label><br>
                        <select class="custom-select" id="getSelectEmpresa">

                        </select>
                    </div>

                    <div class="col-md-6">
                        <br>
                        <label for="getSelectAFP">AFP</label><br>
                        <select class="custom-select" id="getSelectAFP">

                        </select>
                    </div>

                    <div class="col-md-6">
                        <br>
                        <label for="getSelectPrevision">PREVISIÓN</label><br>
                        <select class="custom-select" id="getSelectPrevision">

                        </select>
                    </div>

                    <div class="col-md-6">
                        <br>
                        <label for="getSelectEstadoContrato">ESTADO DE CONTRATO</label><br>
                        <select class="custom-select"  id="getSelectEstadoContrato">

                        </select>
                    </div>

                    <div class="col-md-6">
                        <br>
                        <label for="getSelectCivil">ESTADO CIVIL</label><br>
                        <select class="custom-select" id="getSelectCivil">

                        </select>
                    </div>

                    <div class="col-md-6">
                        <br>
                        <label for="getSelectNacionalidad">NACIONALIDAD</label><br>
                        <select class="custom-select" id="getSelectNacionalidad">

                        </select>
                    </div>


                    <div class="col-md-6">
                        <br>
                        <label for="fechaNacimiento">FECHA DE NACIMIENTO</label>
                        <input type="date" class="form-control" id="fechaNacimiento" required>
                    </div>

                </div>
                <br>
                <button type="submit" class="btn btn-success" id="btnAgregarTrabajador">Guardar</button>
            </div>
        </div>
    </div>
    <!-- /Modal de crear -->



    <!-- Modal ver -->
    <div id="modalVerTrabajador" class="modal fade" tabindex="-1" role="dialog"  aria-hidden="true" >
        <div class="modal-dialog modal-lg">
            <div class="modal-content" style="padding:20px; background: #2a3f54" >
                <div class="form-row">
                    <h5 class="modal-title mx-auto">TRABAJADOR</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                    <div class="modal-body">
                      <div class="row" id="modalDetalleTrabajador">


                      </div>
                    </div>

                </div>
                <br>
            </div>
        </div>
    </div>
    <!-- /Modal de ver -->

    <!-- Modal editar -->
    <div id="modalEditarTrabajador" class="modal fade bd-example-modal-lg" tabindex="-1" role="dialog" aria-labelledby="crearTrabajador"  aria-hidden="true" >
        <div class="modal-dialog modal-lg">
            <div class="modal-content" style="padding:20px; background: #2a3f54" >
                <div class="form-row" id="contenedorDetalleTrabajador">


                </div>
                <br><button type="submit" class="btn btn-success" id="btnEditarTrabajador">Guardar</button>
            </div>
        </div>
    </div>
    <!-- /Modal de editar -->



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
    <script src="<?php echo base_url() ?>assets/js/trabajador.js"></script>
    <script src="<?php echo base_url() ?>assets/js/validaciones.js"></script>
    <!-- Toast -->
    <script src="<?php echo base_url() ?>assets/js/toastr.min.js" type="text/javascript"></script>


    <script>
        $(document).ready(function() {
            getSelectCiudad();
            getSelectCargos();
            getSucursales();
            getEmpresas();
            getAFP();
            getPrevisiones();
            getEstadosContrato();
            getEstadosCiviles();
            getNacionalidades();


            $('.dataTables-trabajadores').DataTable({
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
                      url: "http://localhost/FA_RECURSOS-HUMANOS/getListadoTrabajadores",
                      type: 'GET'
                  },
                  "columnDefs": [{
                          "targets": 8,
                          "data": null,
                          "defaultContent": '<button style="display:inline" type="button" id="btnVerTrabajador" class="btn btn-info" data-toggle="modal" data-target="#modalVerTrabajador"><i class="glyphicon glyphicon-eye-open"></i></button> <button style="display:inline" type="button" id="getDetalleTrabajadorViewEdit" class="btn btn-info" data-toggle="modal" data-target="#modalEditarTrabajador"><i class="glyphicon glyphicon-pencil"></i></button>'
                      }

                  ],dom: '<"html5buttons"B>lTfgitp',
                    buttons: [{
                            extend: 'copy',
                            exportOptions: {
                                columns: [ 1,2,3,4,5,6,7 ]
                            },
                        },
                        {
                            extend: 'csv',
                            exportOptions: {
                                columns: [ 1,2,3,4,5,6,7 ]
                            },
                        },
                        {
                            extend: 'excel',
                            title: 'Lista de Trabajadores',
                            exportOptions: {
                                columns: [ 1,2,3,4,5,6,7 ]
                            },
                        },
                        {
                            extend: 'pdf',
                            title: 'Lista de Trabajadores',
                            exportOptions: {
                                columns: [ 1,2,3,4,5,6,7 ]
                            },
                            customize:function(doc) {
                                doc.styles.title = {
                                    fontSize: '25',
                                    alignment: 'center'
                                }
                                doc.styles['td:nth-child(2)'] = {
                                    'padding': '100px'
                                }
                            }
                        },
                        {
                            extend: 'print',
                            title: 'Firma de abogados',
                            exportOptions: {
                                columns: [ 1,2,3,4,5,6,7 ]
                            },
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

        $("#btnAgregarTrabajador").click(function (e){
            e.preventDefault();
            agregarTrabajador();
            var table = $('#tabla_trabajador').DataTable();
               table.ajax.reload(function(json) {
                   $('#btnAgregarTrabajador').val(json.lastInput);
               });
        });

        $("body").on("click", "#btnVerTrabajador", function(e) {
             e.preventDefault();
             var id = $(this).parent().parent().children()[0];
             getDetalleTrabajador($(id).text());
         });

         $("body").on("click", "#getDetalleTrabajadorViewEdit", function(e) {
              e.preventDefault();
              var id = $(this).parent().parent().children()[0];
              getDetalleTrabajadorViewEdit($(id).text());
          });

          $("body").on("click", "#btnEditarTrabajador", function(e) {
               e.preventDefault();
               updateTrabajador();
           });


    </script>







  </body>
</html>
