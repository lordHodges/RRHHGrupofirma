<?php
$data = $this->session->userdata("datos");
$usuario =  $data['usuario'];
$permisos =  $data['permisos'];
$URI = 'http://www.imlchilel.cl/grupofirma/';
?>

<?php
$view_verTrabajador = 0;
$view_crearTrabajador = 0;
$view_exportarTrabajador = 0;
$view_editarTrabajador = 0;
foreach ($permisos as $key => $value) {
    if ($value->cf_existencia_permiso == "35") {
        $view_verTrabajador = "1";
    } else
  if ($value->cf_existencia_permiso == "37") {
        $view_crearTrabajador = "1";
    } else
  if ($value->cf_existencia_permiso == "36") {
        $view_editarTrabajador = "1";
    } else
  if ($value->cf_existencia_permiso == "38") {
        $view_exportarTrabajador = "1";
    }
}

if ($usuario[0]->atr_activo == "1") { ?>
    <div class="right_col" role="main">
        <!-- Contenedor principal -->
        <div class="x_content">

            <div class="row">
                <div class="x_panel">
                    <div class="x_content">
                        <h3 class="text-center">TRABAJADORES</h3><br>
                        <?php if ($view_crearTrabajador == 1) {  ?>
                            <button type="button" id="abrirModalCrear" class="btn modidev-btn btn-sm" data-toggle="modal" data-target=".bd-example-modal-lg" style="margin-bottom:20px;">INGRESAR TRABAJADOR</button>
                        <?php } ?>

                        <?php if ($view_verTrabajador == "1") {  ?>
                            <table id="tabla_trabajador" class="table table-striped table-bordered table-hover dataTables-trabajadores" style="margin-top:20px;">
                                <thead>
                                    <tr>
                                        <th class="text-center">ID</th>
                                        <th class="text-center">RUT</th>
                                        <th class="text-center">NOMBRES</th>
                                        <th class="text-center">APELLIDOS</th>
                                        <th class="text-center">DIRECCIÓN</th>
                                        <th class="text-center">EMPRESA</th>
                                        <th class="text-center">SUCURSAL</th>
                                        <th class="text-center">CARGO</th>
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

    <!-- /Contenedor principal-->

    <!-- footer content -->
    <footer>
        <div class="clearfix"></div>
    </footer>
    <!-- /footer content -->

    <!-- Modal crear -->
    <div id="myModal" class="modal fade bd-example-modal-lg" tabindex="-1" role="dialog" aria-hidden="true">
        <div class="modal-dialog modal-lg">
            <div class="modal-content" style="padding:20px; background: #2a3f54">
                <div class="form-row">
                    <h5 class="modal-title mx-auto">INGRESAR TRABAJADOR</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                    <div class="col-md-12">
                        <br>
                        <label for="rut">RUT</label>
                        <input type="text" class="form-control custom-input-sm" id="rut" required onkeyup="this.value=caracteresRUT(this.value)" oninput="checkRutOficial(this)">
                    </div>

                    <div class="col-md-6 col-sm-12">
                        <br>
                        <label for="nombres">NOMBRES</label>
                        <input type="text" class="form-control" id="nombres" oninput="mayus(this);" onkeyup="this.value=soloLetras(this.value)" required>
                    </div>

                    <div class="col-md-6 col-sm-12">
                        <br>
                        <label for="apellidos">APELLIDOS</label>
                        <input type="text" class="form-control" id="apellidos" oninput="mayus(this);" onkeyup="this.value=soloLetras(this.value)" required>
                    </div>

                    <div class="col-md-12 col-sm-12">
                        <br>
                        <label for="direccion">DIRECCIÓN </label>
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
                        <label for="getSelectPrevision">PREVISIÓN DE SALUD</label><br>
                        <select class="custom-select" id="getSelectPrevision">

                        </select>
                    </div>

                    <div class="col-md-6">
                        <br>
                        <label for="getSelectEstadoContrato">ESTADO DE CONTRATO</label><br>
                        <select class="custom-select" id="getSelectEstadoContrato">

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
                <button type="submit" class="btn btn-success btn-sm" id="btnAgregarTrabajador">Guardar</button>
            </div>
        </div>
    </div>
    <!-- /Modal de crear -->



    <!-- Modal ver -->
    <div id="modalVerTrabajador" class="modal fade" tabindex="-1" role="dialog" aria-hidden="true">
        <div class="modal-dialog modal-lg">
            <div class="modal-content" style="padding:20px; background: #2a3f54">
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
    <div id="modalEditarTrabajador" class="modal fade bd-example-modal-lg" tabindex="-1" role="dialog" aria-labelledby="crearTrabajador" aria-hidden="true">
        <div class="modal-dialog modal-lg">
            <div class="modal-content" style="padding:20px; background: #2a3f54">
                <div class="form-row" id="contenedorDetalleTrabajador">


                </div>
                <br><button type="submit" class="btn btn-success btn-sm" id="btnEditarTrabajador">Guardar</button>
            </div>
        </div>
    </div>
    <div id="modalEditarRemuneracionTrabajador" class="modal fade bd-example-modal-lg" tabindex="-1" role="dialog" aria-labelledby="crearTrabajador" aria-hidden="true">
        <div class="modal-dialog modal-lg">
            <div class="modal-content" style="padding:20px; background: #2a3f54">
                <div class="form-row" id="contenedorDetalleRemuneracionTrabajador">


                </div>
                <br><button type="submit" class="btn btn-success btn-sm" id="btnEditarRemuneracion">Guardar</button>
            </div>
        </div>
    </div>

    <!-- /Modal de editar -->

    <label id="permisoExportar" style="display:none">no</label>
    <label id="permisoEditar" style="display:none">no</label>




    <!-- jQuery -->
    <script src="<?php echo base_url();   ?>assets/vendors/jquery/dist/jquery.min.js"></script>
    <!-- Bootstrap -->
    <script src="<?php echo base_url();   ?>assets/vendors/bootstrap/dist/js/bootstrap.bundle.min.js"></script>
    <script src="<?php echo base_url();   ?>assets/vendors/DateJS/build/date.js"></script>
    <!-- Datatables -->
    <script src="<?php echo base_url();   ?>assets/js/datatables.min.js" type="text/javascript"></script>
    <!-- Custom Theme Scripts -->
    <script src="<?php echo base_url();   ?>assets/build/js/custom.min.js"></script>
    <!-- MODIDEV -->
    <script src="<?php echo base_url();   ?>assets/js/modidev.js"></script>
    <script src="<?php echo base_url();   ?>assets/js/trabajador.js"></script>
    <script src="<?php echo base_url();   ?>assets/js/validaciones.js"></script>
    <!-- Toast -->
    <script src="<?php echo base_url();   ?>assets/js/toastr.min.js" type="text/javascript"></script>

    <script src="<?php echo base_url();   ?>assets/js/dashboard.js"></script>


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


            var permisoEditar = 'no';
            var permisoExportar = "no";
            <?php if ($view_editarTrabajador == 1) {  ?>
                permisoEditar = "si";
                $("#permisoEditar").text("si");
            <?php } ?>
            <?php if ($view_exportarTrabajador == 1) {  ?>
                permisoExportar = "si";
                $("#permisoExportar").text("si");
            <?php } ?>

            cargarTablaTrabajador(permisoEditar, permisoExportar);
        });




        $("body").on("click", "#abrirModalCrear", function(e) {
            e.preventDefault();
            //Limpio campo rut despues de las validaciones en donde se bloquea y cambia de color el campo.
            document.getElementById('rut').disabled = false;
            document.getElementById('rut').style.color = '#000';
            document.getElementById("rut").value = "";
        });

        $("#btnAgregarTrabajador").click(function(e) {
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
        $("body").on("click", "#getRemuneracionTrabajadorViewEdit", function(e) {
            e.preventDefault();
            var id = $(this).parent().parent().children()[0];
            getRemuneracionTrabajadorViewEdit($(id).text());
        });

        $("body").on("click", "#btnEditarTrabajador", function(e) {
            e.preventDefault();
            updateTrabajador();
            $('#modalEditarTrabajador').modal('hide');
            cargarTablaTrabajador();
        });
        $("body").on("click", "#btnEditarRemuneracion", function(e) {
            e.preventDefault();
            updateRemuneracionTrabajador();
            $('#modalEditarRemuneracionTrabajador').modal('hide');
            cargarTablaTrabajador();
        });
    </script>






<?php } else {
    header("Location:http://www.imlchilel.cl/grupofirma/ ");
} ?>

</body>

</html>