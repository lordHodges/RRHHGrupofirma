<?php
$data = $this->session->userdata("datos");
$usuario =  $data['usuario'];
$permisos =  $data['permisos'];
?>

<?php
$view_verEmpresa = 0;
$view_crearEmpresa = 0;
$view_exportarEmpresa = 0;
$view_editarEmpresa = 0;
foreach ($permisos as $key => $value) {
    if ($value->cf_existencia_permiso == "9") {
        $view_verEmpresa = "1";
    } else
  if ($value->cf_existencia_permiso == "10") {
        $view_crearEmpresa = "1";
    } else
  if ($value->cf_existencia_permiso == "11") {
        $view_editarEmpresa = "1";
    } else
  if ($value->cf_existencia_permiso == "12") {
        $view_exportarEmpresa = "1";
    }
}

if ($usuario[0]->atr_activo == "1") { ?>
    <div class="right_col" role="main">
        <!-- Contenedor principal -->
        <div class="x_content">



            <div class="row">
                <div class="x_panel">
                    <div class="x_content">
                        <h3 class="text-center">EMPRESAS</h3><br>
                        <?php if ($view_crearEmpresa == 1) {  ?>
                            <button type="button" id="btnAbrirModalCrear" class="btn modidev-btn btn-sm" data-toggle="modal" data-target=".bd-example-modal-lg" style="margin-bottom:20px;">INGRESAR EMPRESA</button>
                        <?php } ?>

                        <?php if ($view_verEmpresa == "1") {  ?>
                            <table id="tabla_empresa" class="table table-striped table-bordered table-hover dataTables-prevision" style="margin-top:20px; width:100%">
                                <thead>
                                    <tr style="width:100%;">
                                        <!-- EMPRESA -->
                                        <th class="text-center">ID</th>
                                        <th class="text-center">EMPRESA</th>
                                        <th class="text-center">RUN</th>
                                        <th class="text-center">UBICACIÓN</th>
                                        <th class="text-center">CIUDAD</th>
                                        <!-- REPRESENTANTE -->
                                        <th class="text-center">REPRESENTANTE</th>
                                        <th class="text-center">CEDULA</th>
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
    <div id="myModal" class="modal fade bd-example-modal-lg" tabindex="-1" role="dialog" aria-labelledby="crearTrabajador" aria-hidden="true">
        <div class="modal-dialog modal-lg">
            <div class="modal-content" style="padding:20px; background: #2a3f54">
                <div class="">
                    <h5 class="modal-title mx-auto">INGRESAR EMPRESA</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>

                    <div class="col-md-12">
                        <br>
                        <label for="getSelectTipo">TIPO</label><br>
                        <select class="custom-select" id="getSelectTipo">
                            <option value="" disabled selected>Seleccione una opción</option>
                            <option value="empresa">Persona Jurídica</option>
                            <option value="persona">Persona natural</option>
                        </select>
                    </div>

                    <div id="siEsEmpresa" style="display:none">
                        <div class="col-md-12">
                            <br>
                            <label for="nombre">NOMBRE</label>
                            <input type="text" class="form-control custom-input-sm" id="nombre">
                        </div>

                        <div class="col-md-12">
                            <br>
                            <label for="nombre">ROL UNICO TRIBUTARIO</label>
                            <input type="text" class="form-control custom-input-sm" id="RUT" onkeyup="this.value=caracteresRUT(this.value)">
                        </div>
                    </div>

                    <div class="col-md-12">
                        <br>
                        <label for="ubicacion">UBICACIÓN</label>
                        <input type="text" class="form-control custom-input-sm" id="ubicacion">
                    </div>

                    <div class="col-md-12">
                        <br>
                        <label for="nombreRepre">NOMBRE DE REPRESENTANTE</label>
                        <input type="text" class="form-control custom-input-sm" id="nombreRepre" oninput="mayus(this);" onkeyup="this.value=soloLetras(this.value)">
                    </div>

                    <div class="col-md-12">
                        <br>
                        <label for="cedulaRepre">CÉLUDA DE REPRESENTANTE</label>
                        <input type="text" class="form-control custom-input-sm" id="cedulaRepre" onkeyup="this.value=caracteresRUT(this.value)" oninput="checkRutOficial(this)">
                    </div>

                    <div class="col-md-12">
                        <br>
                        <label for="getSelectCiudad">CIUDAD</label><br>
                        <select class="custom-select" id="getSelectCiudad">

                        </select>
                    </div>

                </div>
                <br>
                <button type="submit" class="btn btn-success btn-sm" id="btnAgregarEmpresa">Guardar</button>
            </div>
        </div>
    </div>
    <!-- /Modal de crear -->




    <!-- Modal editar -->
    <div id="modalEditarEmpresa" class="modal fade bd-example-modal-lg" tabindex="-1" role="dialog" aria-labelledby="crearTrabajador" aria-hidden="true">
        <div class="modal-dialog modal-lg">
            <div class="modal-content" style="padding:20px; background: #2a3f54">
                <div class="form-row" id="contenedorDetalleEmpresa">


                </div>
                <br>
                <button type="submit" class="btn btn-success btn-sm" id="btnEditarEmpresa">Guardar</button>
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
    <!-- Datatables -->
    <script src="<?php echo base_url();   ?>assets/js/datatables.min.js" type="text/javascript"></script>
    <!-- Custom Theme Scripts -->
    <script src="<?php echo base_url();   ?>assets/build/js/custom.min.js"></script>
    <!-- MODIDEV -->
    <script src="<?php echo base_url();   ?>assets/js/modidev.js"></script>
    <script src="<?php echo base_url();   ?>assets/js/validaciones.js"></script>
    <!-- Toast -->
    <script src="<?php echo base_url();   ?>assets/js/toastr.min.js" type="text/javascript"></script>

    <script src="<?php echo base_url();   ?>assets/js/dashboard.js"></script>


    <script>
        $(document).ready(function() {
            var permisoEditar = 'no';
            var permisoExportar = "no";
            <?php if ($view_editarEmpresa == 1) {  ?>
                permisoEditar = "si";
                $("#permisoEditar").text("si");
            <?php } ?>
            <?php if ($view_exportarEmpresa == 1) {  ?>
                permisoExportar = "si";
                $("#permisoExportar").text("si");
            <?php } ?>
            getSelectCiudad();
            cargarTablaEmpresa(permisoEditar, permisoExportar);
        });


        $("body").on("click", "#btnAgregarEmpresa", function(e) {
            e.preventDefault();
            agregarEmpresa();
            // var table = $('#tabla_empresa').DataTable();
            // table.ajax.reload(function(json) {
            //   $('#btnAgregarEmpresa').val(json.lastInput);
            // });
        });



        $("body").on("click", "#getDetalleEmpresa", function(e) {
            e.preventDefault();
            var id = $(this).parent().parent().children()[0];
            getDetalleEmpresa($(id).text());
        });

        $("body").on("click", "#btnEditarEmpresa", function(e) {
            e.preventDefault();
            var id = $(this).parent().parent().children()[0];
            editarEmpresa();
        });

        $("#getSelectTipo").change(function(e) {
            e.preventDefault();
            if ($("#getSelectTipo").val() == "empresa") {
                // $("#siEsEmpresa").css("display","block");
                $("#siEsEmpresa").removeAttr("style");
            } else {
                $("#siEsEmpresa").css("display", "none");
            }
        });
    </script>

<?php } else {
    header("Location: https://www.imlchile.cl/dev_test/grupofirma");
} ?>

</body>

</html>