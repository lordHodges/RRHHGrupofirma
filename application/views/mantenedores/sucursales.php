<?php
$data = $this->session->userdata("datos");
$usuario =  $data['usuario'];
$permisos =  $data['permisos'];
?>

<?php
$view_verSucursal = 0;
$view_crearSucursal = 0;
$view_exportarSucursal = 0;
foreach ($permisos as $key => $value) {
    if ($value->cf_existencia_permiso == "32") {
        $view_verSucursal = "1";
    } else
  if ($value->cf_existencia_permiso == "33") {
        $view_crearSucursal = "1";
    } else
  if ($value->cf_existencia_permiso == "34") {
        $view_exportarSucursal = "1";
    }
}

if ($usuario[0]->atr_activo == "1") { ?>
    <div class="right_col" role="main">
        <!-- Contenedor principal -->
        <div class="x_content">

        </div>

        <div class="row">
            <div class="x_panel">
                <div class="x_content">
                    <h3 class="text-center">SUCURSAL</h3><br>
                    <?php if ($view_crearSucursal == 1) {  ?>
                        <button type="button" class="btn modidev-btn btn-sm" data-toggle="modal" data-target=".bd-example-modal-lg" style="margin-bottom:20px;">INGRESAR SUCURSAL</button>
                    <?php } ?>

                    <?php if ($view_verSucursal == "1") {  ?>
                        <table id="tabla_sucursal" class="table table-striped table-bordered table-hover dataTables-sucursales" style="margin-top:20px;">
                            <thead>
                                <tr style="width:100%;">
                                    <th class="text-center">ID</th>
                                    <th class="text-center">SUCURSAL</th>
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
                <div class="form-row">
                    <h5 class="modal-title mx-auto">INGRESAR SUCURSAL</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                    <div class="col-md-12">
                        <br>
                        <label for="nombre">NOMBRE</label>
                        <input type="text" class="form-control custom-input-sm" id="nombre" required oninput="checkRutOficial(this)">
                    </div>

                </div>
                <br>
                <button type="submit" class="btn btn-success btn-sm" id="btnAgregarSucursal">Guardar</button>
            </div>
        </div>
    </div>
    <!-- /Modal de crear -->

    <label id="permisoExportar" style="display:none">no</label>




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
    <!-- Toast -->
    <script src="<?php echo base_url();   ?>assets/js/toastr.min.js" type="text/javascript"></script>

    <script src="<?php echo base_url();   ?>assets/js/dashboard.js"></script>


    <script>
        $(document).ready(function() {
            getSelectCiudad();
            getSelectCargos();
            getSucursales();

            var permisoExportar = "no";
            <?php if ($view_exportarSucursal == 1) {  ?>
                permisoExportar = "si";
                $("#permisoExportar").text("si");
            <?php } ?>
            cargarTablaSucursales(permisoExportar);
        });

        $("#btnAgregarSucursal").click(function(e) {
            e.preventDefault();
            agregarSucursal();
        });
    </script>

<?php } else {
    header("Location: http://www.imlchile.cl/dev_test/grupofirma");
} ?>

</body>

</html>