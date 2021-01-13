<?php
$data = $this->session->userdata("datos");
$usuario = $data['usuario'];
$permisos = $data['permisos'];

?>

<?php
$view_verHaberDescuento = 0;
$view_crearHaberDescuento = 0;
$view_exportarHaberDescuento = 0;

foreach ($permisos as $key => $value) {
    if ($value->cf_existencia_permiso == "119"){
        $view_verHaberDescuento = "1";
    } else
    if ($value->cf_existencia_permiso == "120"){
        $view_crearHaberDescuento = "1";
    } else
    if ($value->cf_existencia_permiso == "121"){
        $view_exportarHaberDescuento = "1";
    }
}

if ($usuario[0]->atr_activo == "1") {?>
    <div class="right_col" role="main">
        <!-- Contenedor Principal -->
        <div class="x_content">

        </div>

        <div class="row">
            <div class="x_panel">
                <div class="x_content">
                    <h3 class="text-center">HABERES O DESCUENTOS</h3><br>
                    <div class="container-fluid">
                        <?php if ($view_crearHaberDescuento == 1) {  ?>
                            <button type="button" class="btn modidev-btn btn-sm" data-toggle="modal" data-target=".bd-example-modal-lg" style="margin-bottom:20px;">INGRESAR HABER O DESCUENTO</button>
                        <?php } ?>


                        <div class="row">
                            <div class="col-md-12">

                                <?php if ($view_verHaberDescuento == "1") {  ?>
                                    <table id="tabla_haberDescuento" class="table table-striped table-bordered table-hover dataTables-haberDescuento" style="margin-top:20px;">
                                        <thead>
                                            <tr style="width:100%;">
                                                <th class="text-center">CÓDIGO</th>
                                                <th class="text-center">DESCRIPCION</th>
                                                <th class="text-center">TIPO</th>
                                                <th class="text-center">IMP.</th>
                                                <th class="text-center">TRIB.</th>
                                                <th class="text-center">GRAT.</th>
                                                <th class="text-center">FIJO.</th>
                                                <th class="text-center">VAR.</th>
                                                <th class="text-center">SEM.</th>
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
        </div>
    </div>
    <!-- /Contenedor principal-->

    <!-- footer content -->
    <footer>
        <div class="clearfix"></div>
    </footer>
    <!-- /footer content -->

    <!-- Modal crear -->
    <div id="myModal" class="modal fade bd-example-modal-lg" tabindex="-1" role="dialog" aria-labelledby="crearHaberDescuento" aria-hidden="true">
        <div class="modal-dialog modal-lg">
            <div class="modal-content" style="padding:20px; background: #2a3f54">
                <div class="form-row">
                    <h5 class="modal-title mx-auto">INGRESAR HABERES O DESCUENTOS</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                    <div class="col-md-12">
                        <br>
                        <label for="dhdescuentos">DESCRIPCION</label>
                        <input type="text" class="form-control custom-input-sm" id="dhdescuentos">
                    </div>
                    <div class="col-md-12">
                        <br>
                        <label for="tipo">TIPO</label>
                        <br>
                        <select id="tipo" name="tipo" size="1">
                            <option value="HABER">HABER</option>
                            <option value="DESCUENTO">DESCUENTO</option>
                        </select>
                    </div>
                    <div class="col-md-12"> 
                        <br>
                        <label for="imponible">IMPONIBLE</label>
                        <br>
                        <select id="imponible" name="imponible" size="1">
                            <option value="SI">SI</option>
                            <option value="NO">NO</option>
                        </select>
                    </div>
                    <div class="col-md-12">
                        <br>
                        <label for="tributable">TRIBUTABLE</label>
                        <br>
                        <select id="tributable" name="tributable" size="1">
                            <option value="SI">SI</option>
                            <option value="NO">NO</option>
                        </select>
                    </div>
                    <div class="col-md-12">
                        <br>
                        <label for="gratificable">GRATIFICACIÓN</label>
                        <br>
                        <select id="gratificable" name="gratificable" size="1">
                            <option value="SI">SI</option>
                            <option value="NO">NO</option>
                        </select>
                    </div>
                    <div class="col-md-12">
                        <br>
                        <label for="fijo">REMUN. DE CARÁCTER FIJA (1)</label>
                        <br>
                        <select id="fijo" name="fijo" size="1">
                            <option value="SI">SI</option>
                            <option value="NO">NO</option>
                        </select>
                    </div>
                    <div class="col-md-12">
                        <br>
                        <label for="variable">REMUN. DE CARÁCTER VARIABLE (2)</label>
                        <br>
                        <select id="variable" name="variable" size="1">
                            <option value="SI">SI</option>
                            <option value="NO">NO</option>
                        </select>
                    </div>
                    <div class="col-md-12">
                        <br>
                        <label for="semcorrida">BENEFICIO SEMANA CORRIDA (3)</label>
                        <br>
                        <select id="semcorrida" name="semcorrida" size="1">
                            <option value="SI">SI</option>
                            <option value="NO">NO</option>
                        </select>  
                        <br>      
                    </div>
                    <br>
                    <div class="col-md-12">
                    <br>
                        <label>OBS: (1) Remuneración que forma parte del sueldo base, uutilizada para el cálculo de H. Extras y Ley 20.281</label>
                        <br>
                        <label>OBS: (2) Se usa para el ajuste del Sueldo Base Ley 20.281</label>
                        <br>
                        <label>OBS: (3) Nuevo concepto Ley 20.281.</label>
                        <br>
                    </div>  
                </div>
                <br>
                <button type="submit" class="btn btn-success btn-sm" id="btnAgregarHaberDescuento">Guardar</button>
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
    <!-- Haber Descuento -->
    <script src="<?php echo base_url();   ?>assets/js/haberDescuento.js"></script>                                
    <!-- Toast -->
    <script src="<?php echo base_url();   ?>assets/js/toastr.min.js" type="text/javascript"></script>

    <script src="<?php echo base_url();   ?>assets/js/dashboard.js"></script>


    <script>
        $(document).ready(function() {
            var exportar = "no";
            <?php if ($view_exportarHaberDescuento == 1) {  ?>
                exportar = "si";
                $("#permisoExportar").text("si");
            <?php } ?>

            getSelectHaberDescuento();
            cargarTablaHaberDescuento(permisoExportar);
        });

        $("#btnAgregarHaberDescuento").click(function(e) {
            e.preventDefault();
            agregarHaberDescuento();
            var table = $('#tabla_haberDescuento').DataTable();
            table.ajax.reload(function(json) {
                $('#btnAgregarHaberDescuento').val(json.lastInput);
            });
            cargarTablaHaberDescuento(permisoExportar);
        });
    </script>
<?php } else {
    header("Location: https://www.imlchile.cl/grupofirma/");
} ?>

</body>

</html>
