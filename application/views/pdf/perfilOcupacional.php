<?php
$data = $this->session->userdata("datos");
$usuario =  $data['usuario'];
$permisos =  $data['permisos'];
?>

<?php
$view_docPerfilesOcupacionales = 0;
foreach ($permisos as $key => $value) {
  if ($value->cf_existencia_permiso == "64") { $view_docPerfilesOcupacionales = "1"; }
}

if($usuario[0]->atr_activo == "1" && $view_docPerfilesOcupacionales == "1") { ?>

<!DOCTYPE html>
<html lang="en" dir="ltr">
  <head>
    <meta charset="utf-8">
    <title></title>
    <style media="screen">
      h2{ text-align: center; text-decoration:underline;}
      h3{ text-align: left; text-decoration: underline;}
      .puesto-trabajo{white-space:nowrap;}
      ul {  list-style-type: disc; }
      ul li{ margin-top:10px; }
    </style>
  </head>
  <body>

    <!-- PUESTO DE TRABAJO -->
    <h2>  <?php echo($titulo); ?> </h2>
    <br>
    <h3>  Puesto de trabajo </h3>
    <?php foreach($cargo as $key=>$c){ ?>
      <ul>
        <li><h4 style="display:inline;">  Jefe Directo:</h4> <p style="display:inline;"><?php  echo(" ".$c->atr_jefeDirecto)?> </p><br><br></li>
        <li><h4 style="display:inline;">  Nombre del cargo:</h4><p style="display:inline;"><?php  echo(" ".$c->atr_nombre)?> </p><br><br></li>
        <li><h4 style="display:inline;">  Jornada de trabajo: </h4><p style="display:inline;"><?php  echo($c->atr_jornadaTrabajo)?> </p><br><br></li>

        <?php if( !$c->atr_diasTrabajo == "" && !$c->atr_diasTrabajo == null){ ?>
          <li><h4 style="display:inline;">  Días de trabajo: </h4><p style="display:inline;"><?php  echo(" ".$c->atr_diasTrabajo)?> </p><br><br></li>
        <?php } ?>

        <li><h4 style="display:inline;">  Principales responsabilidades:</h4>
            <?php foreach($responsablidades as $key=>$r){ ?>
              <p>-<?php echo $r->atr_descripcion ?><p>
            <?php } ?>
        </li>
      </ul>
    <?php } ?>



    <!-- SUELDO A PAGAR -->
    <h3>  Remuneración:</h3>
    <?php foreach($remuneracion as $key=>$r){ ?>
      <ul>
        <li><p style="display:inline;">$<?php  echo($r->atr_sueldoMensual)?> ingreso mínimo mensual.</p></li>

        <?php if( $r->atr_cotizaciones == 1){ ?>
          <li><p style="display:inline;">+ Imposiciones.</p></li>
        <?php } ?>

        <?php if( !$r->atr_movilizacion == 0){ ?>
          <li><p style="display:inline;">$<?php  echo($r->atr_movilizacion)?> por bono de movilización.</p></li>
        <?php } ?>

        <?php if( !$r->atr_colacion == 0){ ?>
          <li><p style="display:inline;">$<?php  echo($r->atr_colacion)?> por bono de colación.</p></li>
        <?php } ?>

        <?php if( !$r->atr_asistencia == 0){ ?>
          <li><p style="display:inline;">$<?php  echo($r->atr_asistencia)?> por bono de asistencia.</p></li>
        <?php } ?>

    <?php } ?>
    <?php foreach($remuneracionesExtras as $key=>$r){ ?>
        <li><p style="display:inline;"><?php  echo($r->atr_descripcion)?> </p><br></li>
    <?php } ?>
    </ul>


    <?php if( !$requisitosMinimos == null ){?>
      <h3>Requisitos mínimos</h3>
      <ul>
      <?php foreach($requisitosMinimos as $key=>$rm){ ?>
          <li><p style="display:inline;"><?php  echo($rm->atr_descripcion)?> </p><br></li>
      <?php } ?>
      </ul>
      <br>
    <?php } ?>


    <!-- ASPECTOS QUE LOS COLABORADORES DEBEN SABER -->
    <h2>  ASPECTOS QUE LOS COLABORADORES DEBEN SABER </h2>
    <br>

    <?php if( !$funciones == null) {?>
      <h3>Funciones:</h3>
      <ul>
      <?php foreach($funciones as $key=>$fu){ ?>
          <li><p style="display:inline;"><?php  echo($fu->atr_descripcion)?> </p></li>
      <?php } ?>
      </ul>
    <?php } ?>

    <?php if( !$competencias == null ){ ?>
      <h3>Competencias y características:</h3>
      <ul>
      <?php foreach($competencias as $key=>$co){ ?>
          <li><p style="display:inline;"><?php  echo($co->atr_descripcion)?> </p></li>
      <?php } ?>
      </ul>
    <?php } ?>


    <?php if( !$conocimientos == null ){ ?>
      <h3>Conocimientos básicos:</h3>
      <ul>
      <?php foreach($conocimientos as $key=>$con){ ?>
          <li><p style="display:inline;"><?php  echo($con->atr_descripcion)?> </p></li>
      <?php } ?>
      </ul>
    <?php } ?>

    <?php foreach($titulos as $key=>$t){ ?>

      <h3><?php echo($t->atr_descripcion)?></h3>

      <ul>
      <?php foreach($antecedentes as $key=>$an){ ?>
          <?php if($t->cp_titulo == $an->cf_titulo){ ?>
            <li><?php echo($an->atr_descripcion)?></li>
          <?php } ?>
      <?php } ?>
      </ul>

    <?php } ?>

<<<<<<< HEAD
   <?php } else{ header("Location: http://localhost/GRUPOFIRMA/"); } ?>
=======
   <?php } else{ header("Location: https://imlchile.cl/grupofirma/"); } ?>
>>>>>>> 6d452e33e03ff9b08367071c515f6627be833f1a

  </body>
</html>
