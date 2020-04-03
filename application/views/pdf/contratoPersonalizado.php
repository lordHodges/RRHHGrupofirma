<!DOCTYPE html>
<html lang="en" dir="ltr">
  <head>
    <meta charset="utf-8">
    <title></title>
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
      .caja2 { float:right;;margin-right: :5px;}



    </style>
  </head>
  <body>
    <!-- PUESTO DE TRABAJO -->
    <h3 style="text-decoration:none; text-align:center;">  <?php echo($titulo); ?> </h3>

    <br>

  <!-- foreach que recorrerá el arreglo de items que debe contener el contrato -->
  <?php for($i=0; $i<count($itemsContrato); $i++) { ?>

    <?php switch ($itemsContrato[$i]) {

              case "Partes": ?>
                <p>Entro en Partes</p>
            <?php break; ?>


        <?php case "Naturaleza de los servicios": ?>
            <p>Entro en naturaleza </p>
            <?php break; ?>


        <?php case "Lugar de prestación de servicios": ?>
            <p>Entro en lugar de prestación</p>
            <?php break; ?>


        <?php case "Jornada de trabajo": ?>
            <p>Entro en jornada de trabajo</p>
            <?php break; ?>


        <?php case "Remuneraciones": ?>
            <p>Entro en remuneraciones</p>
            <?php break; ?>


        <?php case "Duración de la relación jurídica laboral": ?>
            <p>Entro en duración de la relación jurídica laboral</p>
            <?php break; ?>


        <?php case "Cláusula de vigencia": ?>
            <p>Entro en cláusula de vigencia</p>
            <?php break; ?>


        <?php case "A tener en cuenta": ?>
            <p>Entro en a tener en cuenta</p>
            <?php break; ?>

        <?php case "Cláusula de confidencialidad": ?>
            <p>Entro en clausula de confidencialidad</p>
            <?php break; ?>


        <?php case "Propiedad intelectual": ?>
            <p>Entro en propiedad intelectual</p>
            <?php break; ?>
    <?php
    }
    ?>

  <?php } ?>























</body>
</html>
