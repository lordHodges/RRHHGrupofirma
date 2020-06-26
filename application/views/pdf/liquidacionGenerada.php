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
        <title>Contrato</title>
        <style media="screen">
        body{ margin-left: 40px; margin-right: 40px}
        h2{ text-align: center; text-decoration:underline;}
        h3{ text-align: left;}
        .puesto-trabajo{white-space:nowrap;}
        ul {  list-style-type: disc; }
        ul li{ margin-top:10px; }

        .padre{
            border: 1px;
            display: inline-block;
            width: auto;
            margin: auto;
            text-align: left;
        }

        .caja1 { float:left;margin-left:5px; }
        .caja2 { float:right;;margin-right:5px;}



        </style>
    </head>
  <body>
    <!-- PUESTO DE TRABAJO -->
    <h3 style="text-decoration:underline; text-align:center;">  <?php echo($tituloCabecera); ?> </h3>

    <br>
    

    <h4 style="display:inline"><h4 style="display:inline;">Remuneraciones Mes de <?php echo($mesCorriente); ?> </h4></h4>

    <h5>Razon Social: <?php echo($razonSocial); ?> </h5>
    <h5>R.U.T.: <?php echo($rutEmpresa); ?> </h5>
    <p style="margin-top: -20px;">________________________________________________________________________________</p>
    <h5 style="margin-top: -10px;">Nombre Trabajador: <?php echo($nombreTrabajador); ?>&nbsp;&nbsp; </h5>
    <h5 > R.U.N.: <?php echo($rutTrabajador); ?> </h5>
    <h5 > C.C.: <?php echo($centralCosto); ?> </h5>
    
    <p style="margin-top: -40px;">________________________________________________________________________________</p> <p style="margin-top: -40px;">________________________________________________________________________________</p> <p style="margin-top: -40px;">________________________________________________________________________________</p>
<br>
    <div style="display:inline-block">
        <h5 style="margin-top:-12px;">Dias Trabajados</h5>
        <h5 style="margin-top:-12px; text-align: left;"><?php echo($diasTrabajados)?></h5>

    </div>&nbsp;&nbsp;

    <div style="display:inline-block">
        <h5 style="margin-top:-12px;">Cargas Familiares</h5>
        <h5 style="margin-top:-12px;text-align: left;"><?php echo($cargasFamiliares)?></h5>

    </div>
    <div style="display:inline-block; margin-left: 10rem;">
        <h5 style="margin-top:-12px;">AFP</h5>
        <h5 style="margin-top:-12px;text-align: left;"><?php echo($afpTrabajador)?></h5>

    </div>&nbsp;&nbsp;
    <div style="display:inline-block">
        <h5 style="margin-top:-12px;">SALUD</h5>
        <h5 style="margin-top:-12px;text-align: left;"><?php echo($saludTrabajador)?></h5>

    </div>
    <p style="margin-top: -40px;">________________________________________________________________________________</p>
        <!-- ---------------------------- -->
            <h4 style="margin-top:-60px;">DESCUENTOS</h5>
            <p style="margin-top:-12px;text-align: left;">Prevision :&nbsp;<?php echo($valorPrevision)?></p>
            <p style="margin-top:-12px;text-align: left;">Salud: &nbsp;<?php echo($valorSalud)?></p>
            <p style="margin-top:-12px;text-align: left;">Seg, Cesantia:&nbsp; <?php echo($valorCesantia)?></p>
            <p style="margin-top:-12px;text-align: left;">Impuesto Unico :&nbsp; <?php echo($valorImpuestoUnico)?></p>
            <p style="margin-top:-12px;text-align: left;">Seg, Cesantia:&nbsp; <?php echo($valorCesantia)?></p>
            <h4 style="margin-top:-12px;text-align: left;text-decoration: underline;">Total desc. Legales:&nbsp; <?php echo($totalDescuentosLegales)?></h4>
            <p style="margin-top:-12px;text-align: left;">Prestamos :&nbsp; <?php echo($montoPrestamo)?></p>
            <p style="margin-top:-12px;text-align: left;">Adelanto :&nbsp; <?php echo($atr_monto)?></p>
            <h4 style="margin-top:-12px;text-align: left;text-decoration: underline;">Total Descuentos:&nbsp; <?php echo($totalDescuentos)?></h4>
            <p style="margin-top: -20px;">________________________________________________________________________________</p>
            <h4 style="margin-top:-12px;text-decoration: underline;">HABERES</h5>
            
            <p style="margin-top:-12px;text-align: left;">Sueldo Base:&nbsp;<?php echo($sueldoBase)?></p>
            <p style="margin-top:-12px;text-align: left;">Gratificacion Legal: &nbsp;<?php echo($gratificacionLegal)?></p>
            <h4 style="margin-top:-12px;text-align: left;">Total Imponible:&nbsp; <?php echo($totalImponible)?></h4>
            <h4 style="margin-top:-12px;text-align: left;">Total no Imponible:&nbsp; <?php echo($totalNoImponible)?></h4>

<h4 style="margin-top:-12px;text-align: right;">Alcance Liquido:&nbsp; <?php echo($valorAlcanceLiquido)?></h4>
    <!-- Firma Trabajador -->
     <div class="caja1">
        <p>__________________________________</p>
        <div style="display:inline-block">
            <h5 style="margin-top:-12px;"><strong> <?php echo $nombreTrabajador ?> </strong></h5>
        	<h5 style="margin-top:-12px;">R.U.N N° <?php echo $rutTrabajador ?></h5>
            <h5 style="margin-top:-12px;">TRABAJADOR.</h5>
        </div>
        
     </div>

     <!-- Firma empleador -->
     <div class="caja2">
        <p>__________________________________</p>
          <div style="display:inline-block">

            <h5 style="margin-top:-12px;"><strong> <?php echo $razonSocial ?> </strong></h5>
        		<h5 style="margin-top:-12px;">R.U.T N° <?php echo $rutEmpresa?></h5>
            <h5 style="margin-top:-12px;">EMPLEADOR.</h5>
        	</div>
     </div>





   <?php } else{ header("Location: http://127.0.0.1/grupofirma/"); } ?>

</body>
</html>
