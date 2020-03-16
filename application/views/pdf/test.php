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
    </style>
  </head>
  <body>

    <!-- PUESTO DE TRABAJO -->
    <h2>  <?php echo($titulo); ?> </h2>
    <br>
    <h3>  PUESTO DE TRABAJO </h3>
    <?php foreach($cargo as $key=>$c){ ?>
      <ul>
        <li><h4 style="display:inline;">  Jefe Directo:</h4> <p style="display:inline;"><?php  echo(" ".$c->atr_jefeDirecto)?> </p><br><br></li>
        <li><h4 style="display:inline;">  Nombre del cargo:</h4><p style="display:inline;"><?php  echo(" ".$c->atr_nombre)?> </p><br><br></li>
        <li><h4 style="display:inline;">  Jornada de trabajo: </h4><p style="display:inline;"><?php  echo(" ".$c->atr_jornadaTrabajo)?> </p><br><br></li>
        <li><h4 style="display:inline;">  Días de trabajo: </h4><p style="display:inline;"><?php  echo("")?> </p><br><br></li>
        <li><h4 style="display:inline;">  Principales responsabilidades:</h4><p style="display:inline;"><?php  echo(" ".$titulo)?> </p><br><br></li>
      </ul>
    <?php } ?>
    <!-- SUELDO A PAGAR -->

    <h3>  Sueldo a pagar:</h3>

    <h3>Requisitos mínimos</h3>
    <?php foreach($requisitosMinimos as $key=>$rm){ ?>
      <ul>
        <li><p style="display:inline;"><?php  echo($rm->atr_descripcion)?> </p><br></li>
      </ul>
    <?php } ?>
    <br>


    <!-- ASPECTOS QUE LOS COLABORADORES DEBEN SABER -->
    <h2>  ASPECTOS QUE LOS COLABORADORES DEBEN SABER </h2>
    <br>
    <h3>Funciones:</h3>
    <?php foreach($funciones as $key=>$fu){ ?>
      <ul>
        <li><p style="display:inline;"><?php  echo($fu->atr_descripcion)?> </p><br></li>
      </ul>
    <?php } ?>

    <h3>Competencias y características:</h3>
    <?php foreach($competencias as $key=>$co){ ?>
      <ul>
        <li><p style="display:inline;"><?php  echo($co->atr_descripcion)?> </p><br></li>
      </ul>
    <?php } ?>

    <h3>Conocimientos básicos:</h3>
    <?php foreach($conocimientos as $key=>$con){ ?>
      <ul>
        <li><p style="display:inline;"><?php  echo($con->atr_descripcion)?> </p><br></li>
      </ul>
    <?php } ?>

    <?php foreach($titulos as $key=>$t){ ?>

      <h3><?php echo($t->atr_descripcion)?></h3>

      <?php foreach($antecedentes as $key=>$an){ ?>
        <ul>
          <?php if($t->cp_titulo == $an->cf_titulo){ ?>
            <li><?php echo($an->atr_descripcion)?></li>
          <?php } ?>
        </ul>
      <?php } ?>

    <?php } ?>




  </body>
</html>
