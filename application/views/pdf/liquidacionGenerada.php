<?php
$data = $this->session->userdata("datos");
$usuario =  $data['usuario'];
$permisos =  $data['permisos'];
?>

<?php
$view_contratoEstadar = 0;
foreach ($permisos as $key => $value) {
  if ($value->cf_existencia_permiso == "68") { $view_contratoEstadar = "1"; }
}

if($usuario[0]->atr_activo == "1" && $view_contratoEstadar == "1") { ?>
<!DOCTYPE html>
    <html lang="en" dir="ltr">
    <head>

        <meta charset="utf-8">
        <title>liquidacion</title>
       
        <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.0/css/bootstrap.min.css" integrity="sha384-9aIt2nRpC12Uk9gS9baDl411NQApFmC26EwAOH8WgZl5MYYxFfc+NcPb1dKGj7Sk" crossorigin="anonymous">
        <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js" integrity="sha384-DfXdz2htPH0lsSSs5nCTpuj/zy4C+OGpamoFVy38MVBnE+IbbVYUew+OrCXaRkfj" crossorigin="anonymous"></script>
        <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.0/dist/umd/popper.min.js" integrity="sha384-Q6E9RHvbIyZFJoft+2mJbHaEWldlvI9IOYy5n3zV9zzTtmI3UksdQRVvoxMfooAo" crossorigin="anonymous"></script>
        <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.0/js/bootstrap.min.js" integrity="sha384-OgVRvuATP1z7JjHLkuOU7Xw704+h835Lr+6QL9UvYjZE3Ipu6Tp75j7Bh/kR0JKI" crossorigin="anonymous"></script>
       
</head>


  <body>
      <div class="container-xl">
        <h5 style="text-decoration:underline; text-align:center;">  <?php echo($tituloCabecera); ?> </h5>

    <br>
    
        <table class="table table-borderless text-left"  style="font-size: 12px;">
            <tbody> 
                <tr style="padding-top:-20px;padding-bottom: -20px;">
                    <td>Remuneraciones Mes :</td>
                    <td><?php echo($mesCorriente); ?></td>
                </tr>
                <tr style="padding-top:-20px;padding-bottom: -20px;">
                    <td>Razon Social:</td>
                    <td><?php echo($razonSocial); ?></td>
                    <td>RUT:</td>
                    <td><?php echo($rutEmpresa); ?></td>
                </tr>
            </tbody>
        </table>
   

    <hr>
    <div class="row">
        <div class="col col-sm-12">
            <h6>INFORMACION TRABAJADOR</h6>
            <table class="table table-borderless"  style="font-size: 12px; padding-bottom: -30px;">
            
                <tbody>
                <tr>
                    <th>Nombre :</th>
                    <td><?php echo($nombreTrabajador); ?></td>
                    
                </tr>
                <tr>
                    <th>RUN :</th>
                    <td><?php echo($rutTrabajador); ?></td>
                </tr>
                <tr>
                    <th>CC :</th>
                    <td><?php echo($centralCosto); ?></td>
                </tr>
            </tbody>
            </table>
            
        </div>
    </div>

   <hr> 
    <div class="row" >
        <div class="col col-sm-12 text-center" >
            <table class="table table-bordered" style="font-size: 12px;">
                <thead>
                    <tr>
                        <th>AFP</th>
                        <th>SALUD</th>
                        <th>CARGAS FAMILIARES</th>
                        
                    </tr>
                </thead>
                <tbody>
                    <tr>
                        <td><?php echo($afpTrabajador); ?></td>
                        <td><?php echo($saludTrabajador); ?></td>
                        <td><?php echo($cargasFamiliares); ?></td>                    
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
                        <th>Dias Trabajados</th>
                        <th>Horas Extra</th>
                        <th>Valor Imponible</th>
                        <th>Valor Tributable</th>
                    </tr>
                </thead>
                <tbody>
                    <tr>
                        <td><?php echo($diasTrabajados); ?></td>
                        <td><?php echo($horasExtras); ?></td>
                        <td><?php echo($totalImponible); ?></td>
                        <td><?php echo($totalImponible); ?></td>
                    </tr>
                </tbody>
            </table>
        </div>
    </div>
    <hr class="dark">
    <div class="row">
        <div class="col col-sm-12">
            <table class="table text-center" style="font-size: 12px;">
                <thead>
                    <tr>
                        <th>HABERES</th>
                        <th>DESCUENTOS</th>
                    </tr>
                </thead>
            </table>
        </div>  
    </div>
    <div class="row">
         <div class="col col-sm-6 ">
            <table class="table text-left" style="font-size: 12px;">
                <tbody>
                    <tr>
                        <td>Sueldo Base</td>
                        <td><?php echo($sueldoBase) ?></td>
                    </tr>
                    <tr>
                        <td>Gratificacion Legal</td>
                        <td><?php echo($gratificacionLegal); ?></td>
                    </tr>
                    <tr>
                        <th>Total Imponible</th>
                        <th><?php echo($totalImponible); ?></th>
                    </tr>
                    <?php if ($bonoColacion) {?>
                    <tr>
                        <td>Asigancion Colacion</td>
                        <td><?php echo($bonoColacion); ?></td>
                    </tr>   
                    <?php }?>
                    <?php if ($bonoMobilizacion) {?>
                    <tr>
                        <td>Asignacion Mobilizacion</td>
                        <td><?php echo($bonoMobilizacion); ?></td>
                    </tr>
                    <?php } ?>

                    <?php if ($bonoAsistenciaAPagar) {?>
                        <tr>
                            <td>Bono Asistencia</td>
                            <td><?php echo($bonoAsistenciaAPagar); ?></td>
                        </tr>
                    <?php } ?>
                    <tr>
                        <th>Total No Imponible</th>
                        <th><?php echo($totalNoImponible) ?></th>
                    </tr>
                </tbody>
            </table>
        </div>
    </div>    










            <?php } else{ header("Location: http://127.0.0.1/grupofirma/"); } ?>


      </div>
    <!-- PUESTO DE TRABAJO -->
    
</body>
</html>
