<?php
$data = $this->session->userdata("datos");
$usuario =  $data['usuario'];
$permisos =  $data['permisos'];
?>

<?php
$view_contratoEstadar = 0;
foreach ($permisos as $key => $value) {
    if ($value->cf_existencia_permiso == "68") {
        $view_contratoEstadar = "1";
    }
}

if ($usuario[0]->atr_activo == "1" && $view_contratoEstadar == "1") { ?>
    <!DOCTYPE html>
    <html lang="en" dir="ltr">

    <head>

        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <title>liquidacion</title>

        <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.0/css/bootstrap.min.css" integrity="sha384-9aIt2nRpC12Uk9gS9baDl411NQApFmC26EwAOH8WgZl5MYYxFfc+NcPb1dKGj7Sk" crossorigin="anonymous">
        <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js" integrity="sha384-DfXdz2htPH0lsSSs5nCTpuj/zy4C+OGpamoFVy38MVBnE+IbbVYUew+OrCXaRkfj" crossorigin="anonymous"></script>
        <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.0/dist/umd/popper.min.js" integrity="sha384-Q6E9RHvbIyZFJoft+2mJbHaEWldlvI9IOYy5n3zV9zzTtmI3UksdQRVvoxMfooAo" crossorigin="anonymous"></script>
        <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.0/js/bootstrap.min.js" integrity="sha384-OgVRvuATP1z7JjHLkuOU7Xw704+h835Lr+6QL9UvYjZE3Ipu6Tp75j7Bh/kR0JKI" crossorigin="anonymous"></script>

    </head>


    <body>
        <div class="container-xl">
            <h5 style="text-decoration:underline; text-align:center;"> <?php echo ($tituloCabecera); ?> </h5>

            <br>

            <table class="table table-borderless text-left" style="font-size: 12px;">
                <tbody>
                    <tr style="padding-top:-20px;padding-bottom: -20px;">
                        <td style="padding-top: 0px;padding-bottom: 0px;">Remuneraciones Mes :</td>
                        <td style="padding-top: 0px;padding-bottom: 0px;"><?php echo ($mesCorriente); ?></td>
                    </tr>
                    <tr style="padding-top:-20px;padding-bottom: -20px;">
                        <td style="padding-top: 0px;padding-bottom: 0px;">Razon Social:</td>
                        <td style="padding-top: 0px;padding-bottom: 0px;"><?php echo ($razonSocial); ?></td>
                        <td style="padding-top: 0px;padding-bottom: 0px;">RUT:</td>
                        <td style="padding-top: 0px;padding-bottom: 0px;"><?php echo ($rutEmpresa); ?></td>
                    </tr>
                </tbody>
            </table>



            <div class="row">
                <div class="col col-sm-12">
                    <h6>INFORMACION TRABAJADOR</h6>
                    <table class="table table-borderless" style="font-size: 12px;">

                        <tbody>
                            <tr>
                                <th style="padding-top: 0px;padding-bottom: 0px;">Nombre :</th>
                                <td style="padding-top: 0px;padding-bottom: 0px;"><?php echo ($nombreTrabajador); ?></td>

                            </tr>
                            <tr>
                                <th style="padding-top: 0px;padding-bottom: 0px;">RUN :</th>
                                <td style="padding-top: 0px;padding-bottom: 0px;"><?php echo ($rutTrabajador); ?></td>
                            </tr>
                            <tr>
                                <th style="padding-top: 0px;padding-bottom: 0px;">CC :</th>
                                <td style="padding-top: 0px;padding-bottom: 0px;"><?php echo ($centralCosto); ?></td>
                            </tr>
                        </tbody>
                    </table>

                </div>
            </div>


            <div class="row">
                <div class="col col-sm-12 text-center">
                    <table class="table table-bordered" style="font-size: 12px;">
                        <thead>
                            <tr>
                                <th style="padding-top: 0px;padding-bottom: 0px;">AFP</th>
                                <th style="padding-top: 0px;padding-bottom: 0px;">SALUD</th>
                                <th style="padding-top: 0px;padding-bottom: 0px;">CARGAS FAMILIARES</th>

                            </tr>
                        </thead>
                        <tbody>
                            <tr>
                                <td style="padding-top: 0px;padding-bottom: 0px;"><?php echo ($afpTrabajador); ?></td>
                                <td style="padding-top: 0px;padding-bottom: 0px;"><?php echo ($saludTrabajador); ?><?php if ($valorSaludAdicional > 0) { ?>
                                    Valor Plan UF :<?php echo ($plan); ?>
                                <?php } ?> </td>
                                <?php if ($cargas == "undefined") {
                                    $cargas = 0;
                                } ?>
                                <td style="padding-top: 0px;padding-bottom: 0px;"><?php echo ($cargas); ?></td>
                            </tr>
                        </tbody>
                    </table>
                </div>



            </div>

            <div class="row">
                <div class="col col-sm-12 text-center">
                    <table class="table table-bordered" style="font-size: 12px; margin-top: -10px;">
                        <thead>
                            <tr>
                                <th style="padding-top: 0px;padding-bottom: 0px;">Dias</th>
                                <th style="padding-top: 0px;padding-bottom: 0px;">Horas Extras</th>
                                <th style="padding-top: 0px;padding-bottom: 0px;">Valor Imponible</th>
                                <th style="padding-top: 0px;padding-bottom: 0px;">Valor Tributable</th>
                            </tr>
                        </thead>
                        <tbody>
                            <tr>
                                <td style="padding-top: 0px;padding-bottom: 0px;"><?php echo ($diasTrabajados); ?></td>
                                <td style="padding-top: 0px;padding-bottom: 0px;"><?php echo ($horasExtras); ?></td>
                                <td style="padding-top: 0px;padding-bottom: 0px;"><?php echo ($valorImponible); ?></td>
                                <td style="padding-top: 0px;padding-bottom: 0px;"><?php echo ($totalTributable); ?></td>
                            </tr>
                        </tbody>
                    </table>
                </div>
            </div>
            <div class="row">
                <div class="col col-sm-12">
                    <table class="table text-center" style="font-size: 12px;">
                        <thead>
                            <tr>
                                <th style="padding-top: 0px;padding-bottom: 0px;">HABERES</th>

                            </tr>
                        </thead>
                    </table>
                </div>
            </div>
            <div class="row">
                <div class="col col-sm-6 ">
                    <table class="table table-borderless" id="2" style="font-size: 12px;">
                        <tbody>
                            <tr style="padding-top: 0px;padding-bottom: 0px;">
                                <td style="padding-top: 0px;padding-bottom: 0px;">Sueldo Base</td>
                                <td style="padding-top: 0px;padding-bottom: 0px;"><?php echo ($sueldoBase) ?></td>
                            </tr>
                            <tr>
                                <td style="padding-top: 0px;padding-bottom: 0px;">Gratificacion Legal</td>
                                <td style="padding-top: 0px;padding-bottom: 0px;"><?php echo ($gratificacionLegal); ?></td>
                            </tr>
                            <?php if ($bonoAsistenciaAPagar) { ?>
                                <tr>
                                    <td style="padding-top: 0px;padding-bottom: 0px;">Bono Asistencia</td>
                                    <td style="padding-top: 0px;padding-bottom: 0px;"><?php echo ($bonoAsistenciaAPagar); ?></td>
                                </tr>
                            <?php } ?>
                            <tr>
                                <th style="padding-top: 0px;padding-bottom: 0px;">Total Imponible</th>
                                <th style="padding-top: 0px;padding-bottom: 0px;"><?php echo ($totalImponible); ?></th>
                            </tr>
                             <?php if ( $cargasFamiliaresMonto != "undefined") { ?>
                                <tr>
                                    <td style="padding-top: 0px;padding-bottom: 0px;">Asigancion Familiar</td>
                                    <td style="padding-top: 0px;padding-bottom: 0px;"><?php echo ($cargasFamiliaresMonto); ?></td>
                                </tr>
                            <?php } ?>
                            <?php if ( $bonoColacion != "undefined") { ?>
                                <tr>
                                    <td style="padding-top: 0px;padding-bottom: 0px;">Asigancion Colacion</td>
                                    <td style="padding-top: 0px;padding-bottom: 0px;"><?php echo ($bonoColacion); ?></td>
                                </tr>
                            <?php } ?>

                            <?php if ( $bonoMovilizacion != "undefined") { ?>
                           
                                <tr>
                                    <td style="padding-top: 0px;padding-bottom: 0px;">Asignacion Movilizacion</td>
                                    <td style="padding-top: 0px;padding-bottom: 0px;"><?php echo ($bonoMovilizacion); ?></td>
                                </tr>
                            <?php } ?>


                            <tr>
                                <th style="padding-top: 0px;padding-bottom: 0px;">Total No Imponible</th>
                                <th style="padding-top: 0px;padding-bottom: 0px;"><?php echo ($totalNoImponible) ?></th>
                            </tr>
                            <tr>
                                <th style="padding-top: 0px;padding-bottom: 0px;">Total Haberes</th>
                                <th style="padding-top: 0px;padding-bottom: 0px;"><?php echo ($totalHaberes) ?></th>
                            </tr>
                        </tbody>
                    </table>
                </div>

            </div>
            <div class="row">
                <div class="col sm-12">
                    <table class="table text-center" style="font-size: 12px;">
                        <thead>
                            <tr>
                                <th style="padding-top: 0px;padding-bottom: 0px;">DESCUENTOS</th>
                            </tr>
                        </thead>
                    </table>

                </div>

            </div>
            <div class="row">
                <div class="col col-sm-6">
                    <table class="table table-borderless" style="font-size: 12px;">
                        <tbody>
                            <tr style="padding-top: 0px;padding-bottom: 0px;">
                                <td style="padding-top: 0px;padding-bottom: 0px;">AFP</td>
                                <td style="padding-top: 0px;padding-bottom: 0px;"><?php echo ($valorPrevision) ?></td>
                            </tr>
                            <tr style="padding-top: 0px;padding-bottom: 0px;">
                                <td style="padding-top: 0px;padding-bottom: 0px;">Salud</td>
                                <td style="padding-top: 0px;padding-bottom: 0px;"><?php echo ($valorSalud) ?></td>
                            </tr>

                            <?php if ($valorSaludAdicional > 0 && $valorSaludAdicional != "undefined") { ?>
                                <tr>
                                    <td style="padding-top: 0px;padding-bottom: 0px;">Adicional Isapre</td>
                                    <td style="padding-top: 0px;padding-bottom: 0px;"><?php echo ($valorSaludAdicional); ?></td>
                                </tr>
                            <?php } ?>
                            <?php if ($valorCesantia > 0 && $valorCesantia != "undefined") { ?>
                                <tr>
                                    <td style="padding-top: 0px;padding-bottom: 0px;">Seguro Cesantía</td>
                                    <td style="padding-top: 0px;padding-bottom: 0px;"><?php echo ($valorCesantia); ?></td>
                                </tr>
                            <?php } ?>
                            <?php if ($valorImpuestoUnico != "undefined" && $valorImpuestoUnico > 0) { ?>
                                <tr>
                                    <td style="padding-top: 0px;padding-bottom: 0px;">Impuesto Unico</td>
                                    <td style="padding-top: 0px;padding-bottom: 0px;"><?php echo ($valorImpuestoUnico); ?></td>
                                </tr>
                            <?php } ?>

                            <tr style="padding-top: 0px;padding-bottom: 0px;">
                                <th style="padding-top: 0px;padding-bottom: 0px;">Total Desc. Legales</th>
                                <th style="padding-top: 0px;padding-bottom: 0px;"><?php echo ($totalDescuentosLegales) ?></th>
                            </tr>

                            <?php if ($atr_monto != "undefined") { ?>
                                <tr>
                                    <td style="padding-top: 0px;padding-bottom: 0px;">Adelanto</td>
                                    <td style="padding-top: 0px;padding-bottom: 0px;"><?php echo ($atr_monto); ?></td>
                                </tr>

                            <?php } ?>
                            <?php if ($montoPrestamo) { ?>
                                <tr>
                                    <td style="padding-top: 0px;padding-bottom: 0px;">Prestamo </td>
                                    <td style="padding-top: 0px;padding-bottom: 0px;"><?php echo ($montoPrestamo); ?></td>
                                </tr>

                            <?php } ?>

                            <?php if ($totalOtrosDescuentos) { ?>
                                <tr>
                                    <th style="padding-top: 0px;padding-bottom: 0px;">Total Otros Desc.</th>
                                    <th style="padding-top: 0px;padding-bottom: 0px;"><?php echo ($totalOtrosDescuentos); ?></th>
                                </tr>

                            <?php } ?>
                            <tr>
                                <th style="padding-top: 0px;padding-bottom: 0px;">Total Descuentos</th>
                                <th style="padding-top: 0px;padding-bottom: 0px;"><?php echo ($totalDescuentos) ?></th>
                            </tr>
                        </tbody>

                    </table>
                </div>

            </div>
            <div class="row">
                <div class="col sm-12">
                    <table class="table text-center" style="font-size: 12px;">
                        <thead class="thead-light">
                            <tr>
                                <th style="padding-top: 0px;padding-bottom: 0px;">TOTAL HABERES</th>
                                <th style="padding-top: 0px;padding-bottom: 0px;">TOTAL DESCUENTOS</th>
                                <th style="padding-top: 0px;padding-bottom: 0px;">ALCANCE LIQUIDO</th>
                            </tr>
                        </thead>
                        <tbody>
                            <tr>
                                <td style="padding-top: 0px;padding-bottom: 0px;"><?php echo ($totalHaberes) ?></td>
                                <td style="padding-top: 0px;padding-bottom: 0px;"><?php echo ($totalDescuentos) ?></td>
                                <th style="padding-top: 0px;padding-bottom: 0px;"><?php echo ($valorAlcanceLiquido) ?></th>
                            </tr>
                        </tbody>
                    </table>

                </div>

            </div>

            <div class="row">
                <div class="col col-sm-6">
                    <table class="table text-left" style="font-size: 12px;margin-top: -10px;">

                        <tr>
                            <th style="padding-top: 0px;padding-bottom: 0px;">Fecha Emision:</th>
                            <td style="padding-top: 0px;padding-bottom: 0px;"><?php echo ($fechaTermino) ?></td>

                        </tr>




                    </table>

                </div>
            </div>


            <div class="row">
                <div class="col col-sm-12">
                    <p style="padding-top: 0px;padding-bottom: 0px;">Declaro que he leído detenida y detalladamente la liquidación y el monto contenido en ella, encontrándome absolutamete conforme, no teniendo reclamo alguno que formular al respecto.<br>Recibí conforme &nbsp;<strong> <?php echo ($letrasValorAlcanceLiquido) ?>&nbsp; pesos.</strong></p>
                </div>
            </div>
            <br><br><br>
            <div class="row">
                <div class="col col-sm-12">
                    <table class="table table-borderless text-center" style="font-size: 12px;">
                        <thead>
                            <tr>
                                <th style="padding-top: 0px;padding-bottom: 0px;">_____________________________</th>
                                <th style="padding-top: 0px;padding-bottom: 0px;">_____________________________</th>

                            </tr>
                        </thead>
                        <tbody>
                            <tr>
                                <th style="padding-top: 0px;padding-bottom: 0px;">FIRMA EMPLEADOR</th>
                                <td style="padding-top: 0px;padding-bottom: 0px;">FIRMA TRABAJADOR</td>

                            </tr>
                            <tr>
                                <th style="padding-top: 0px;padding-bottom: 0px;"><?php echo ($razonSocial) ?></th>
                                <td style="padding-top: 0px;padding-bottom: 0px;"><?php echo ($nombreTrabajador) ?></td>

                            </tr>
                            <tr>
                                <th style="padding-top: 0px;padding-bottom: 0px;"><?php echo ($rutEmpresa) ?></th>
                                <td style="padding-top: 0px;padding-bottom: 0px;"><?php echo ($rutTrabajador) ?></td>

                            </tr>
                        </tbody>
                    </table>

                </div>
            </div>













        <?php } else {
        header("Location: https://www.imlchile.cl/grupofirma/");
    } ?>


        </div>
        <!-- PUESTO DE TRABAJO -->

    </body>

    </html>