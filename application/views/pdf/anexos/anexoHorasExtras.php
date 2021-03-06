<?php
$data = $this->session->userdata("datos");
$usuario =  $data['usuario'];
$permisos =  $data['permisos'];
?>

<?php
$view_anexoHorasExtras = 0;
foreach ($permisos as $key => $value) {
  if ($value->cf_existencia_permiso == "67") {
    $view_anexoHorasExtras = "1";
  }
}

if ($usuario[0]->atr_activo == "1" &&  $view_anexoHorasExtras == "1") { ?>

  <!DOCTYPE html>
  <html lang="en" dir="ltr">

  <head>
    <meta charset="utf-8">
    <title>Anexo</title>
    <style media="screen">
      body {
        margin-left: 40px;
        margin-right: 40px
      }

      h2 {
        text-align: center;
        text-decoration: underline;
      }

      h3 {
        text-align: left;
      }

      .puesto-trabajo {
        white-space: nowrap;
      }

      ul {
        list-style-type: disc;
      }

      ul li {
        margin-top: 10px;
      }

      .padre {
        border: 1px;
        display: inline-block;
        width: auto;
        margin: auto;
        text-align: left;
      }

      .caja1 {
        float: left;
        margin-left: 5px;
      }

      .caja2 {
        float: right;
        ;
        margin-right: 5px;
      }
    </style>
  </head>

  <body>
    <!-- PUESTO DE TRABAJO -->
    <h3 style="text-decoration:none; text-align:center;"> <?php echo ($titulo); ?> </h3>

    <br>

    <h4 style="display:inline">I. &nbsp;&nbsp; <h4 style="text-decoration: underline;display:inline">Partes</h4>
    </h4>

    <?php foreach ($arrayTrabajador as $key => $t) { ?>

      <?php if ($t->repre_rut == "" || $t->repre_legal == "") { ?>
        <p style="text-align:justify; line-height:25px;">
          En <b><?php echo $ciudadFirma ?></b>, a <?php echo $fechaDeHoy ?> entre <b><?php echo $t->empresa ?></b>, cédula de identidad <?php echo 'N°' . $t->runEmpresa ?>,
          con domicilio en <?php echo $t->direccionEmpresa ?>, comuna y ciudad de <?php echo $t->ciudadEmpresa ?>, en adelante <b>"el empleador"</b>
          y <b><?php echo $t->atr_nombres . " " . $t->atr_apellidos ?></b>, cédula de identidad N° <?php echo $t->atr_rut ?>, con domicilio en <?php echo $t->atr_direccion ?>, en adelante
          <b>"el trabajador"</b>, se ha convenido el siguiente anexo de contrato de trabajo:
        </p>
      <?php } ?>

      <?php if ($t->repre_rut != "" || $t->repre_legal != "") { ?>
        <p style="text-align:justify; line-height:25px;">
          En <b><?php echo $ciudadFirma ?></b>, a <?php echo $fechaDeHoy ?> entre <b><?php echo $t->empresa ?></b>, Rol único Tributario <?php echo 'N°' . $t->runEmpresa ?> siendo su representante legal <b><?php echo $t->repre_legal ?></b> cédula nacional de identidad <?php echo $t->repre_rut ?>,
          con domicilio en <?php echo $t->direccionEmpresa ?>, comuna y ciudad de <?php echo $t->ciudadEmpresa ?>, en adelante <b>"el empleador"</b>
          y <b><?php echo $t->atr_nombres . " " . $t->atr_apellidos ?></b>, cédula de identidad N° <?php echo $t->atr_rut ?>, con domicilio en <?php echo $t->atr_direccion ?>, en adelante
          <b>"el trabajador"</b>, se ha convenido el siguiente anexo de contrato de trabajo:
        </p>
      <?php } ?>

    <?php } ?>


    <h4 style="display:inline;"><b>PRIMERO:</b></h4>
    <p style="display:inline; text-align:justify; line-height:25px;">
      Que, en virtud de <?php echo $motivo ?> y de la necesaria extensión diaria de los servicios prestados por el
      trabajador y conforme lo autoriza el artículo 32 del código del trabajo, es que las partes de este anexo
      de contrato de trabajo han convenido un pacto temporal de horas extras, conforme al tenor de las cláusulas
      siguientes.
    </p>

    <br><br>

    <h4 style="display:inline;"><b>SEGUNDO:</b></h4>
    <p style="display:inline; text-align:justify; line-height:25px;">
      El trabajador se compromete y obliga a desarrollar una vez finalizada su jornada
      ordinaria de trabajo semanal, un total de <?php echo $horasextras ?>, lo que no podrá ser superior a 12 horas
      semanales en conformidad a la legislación vigente.
    </p>

    <br><br>

    <h4 style="display:inline;"><b>TERCERO:</b></h4>
    <p style="display:inline; text-align:justify; line-height:25px;">
      Las partes concuerdan que esta situación no es permanente en la actividad y se deriva de la importancia
      de las labores desarrolladas por el trabajador en la empresa, las cuales no pueden interrumpirse.
    </p>

    <br><br>

    <h4 style="display:inline;"><b>CUARTO:</b></h4>
    <p style="display:inline; text-align:justify; line-height:25px;">
      El presente pacto de horas extras tiene una duración hasta el día <?php echo $fechaTermino ?>, pudiendo el empleador
      solicitar extensión de este al término de la fecha estipulada.
    </p>

    <br><br>

    <h4 style="display:inline;"><b>QUINTO:</b></h4>
    <p style="display:inline; text-align:justify; line-height:25px;">
      El presente pacto se firma en dos ejemplares, quedando una en poder de cada parte.
    </p>


    <br><br><br><br><br><br><br>

    <!-- Firma trabajador -->
    <!-- <div class="linea"></div> -->



    <div style="position:absolute">
      <!-- Firma Trabajador -->
      <div class="caja1">
        <p>__________________________________</p>
        <?php foreach ($arrayTrabajador as $key => $t) { ?>
          <div style="display:inline-block">

            <h5 style="margin-top:-12px;"><strong> <?php echo $t->atr_nombres . " " . $t->atr_apellidos ?> </strong></h5>
            <h5 style="margin-top:-12px;">R.U.T N° <?php echo $t->atr_rut ?></h5>
            <h5 style="margin-top:-12px;">TRABAJADOR.</h5>
          </div>
        <?php } ?>
      </div>

      <!-- Firma empleador -->
      <div class="caja2">
        <p>__________________________________</p>
        <?php foreach ($arrayTrabajador as $key => $t) { ?>
          <div style="display:inline-block">

            <h5 style="margin-top:-12px;"><strong> <?php echo $t->empresa ?> </strong></h5>
            <h5 style="margin-top:-12px;">R.U.T N° <?php echo $t->runEmpresa ?></h5>
            <h5 style="margin-top:-12px;">EMPLEADOR.</h5>
          </div>
        <?php } ?>
      </div>
    </div>






  <?php } else {
  header("Location: http://www.imlchilelocal.cl/");
} ?>

  </body>

  </html>