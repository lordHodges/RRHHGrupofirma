

<!DOCTYPE html>
<html lang="en" dir="ltr">
  <head>
    <meta charset="utf-8">
    <title></title>
    <style media="screen">
      h2{ text-align: center;}
      h3{ text-align: left; text-decoration: underline;}
      .puesto-trabajo{white-space:nowrap;}
      ul {  list-style-type: disc; }
      ul li{ margin-top:10px; }

      table,tr,td {
      	border: 0.5px solid;
        border-spacing: 0px;
      }

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
    <h2>  <?php echo($titulo); ?> </h2>
    <br>
    <h3>Solicitante</h3>


    <table style="width:100%">
      <tr>
        <td>Nombre Completo</td>
        <td><?php echo $nombre_trabajador ?></td>
      </tr>
      <tr>
        <td>RUT</td>
        <td><?php echo $rut ?></td>
      </tr>
      <tr>
        <td>Cargo</td>
        <td><?php echo $cargo ?></td>
      </tr>
    </table>

    <br>

    <p><b><?php echo $empresa ?>, RUT N° <?php echo $rut_empresa ?></b> otorga al trabajador antes individualizado en el siguiente préstamo empresarial.</p>

    <br>

    <table style="width:100%">
      <tr>
        <td>Fecha de solicitud del préstamo</td>
        <td><?php echo $fecha_prestamo ?></td>
      </tr>
      <tr>
        <td>Monto solicitado</td>
        <td><?php echo $monto_solicitado ?></td>
      </tr>
      <tr>
        <td>Tipo de préstamo</td>
        <td>Transferencia</td>
      </tr>
      <tr>
        <td>Cantidad de cuotas</td>
        <td><?php echo $cant_cuotas ?></td>
      </tr>
      <tr>
        <td>Descuento de cuota(s)</td>
        <td>
          <?php
          // for ($i = 1; $i <= $cant_cuotas; $i++) {
            foreach ($detalle_prestamo as $key => $dp){ ?>
            <?php
                $ArrayfechaCuota = explode("-", $dp->atr_fechaDescuento);
          		  $fechaCuota = $ArrayfechaCuota[2]."-".$ArrayfechaCuota[1]."-".$ArrayfechaCuota[0];
                echo $fechaCuota;
            ?>
              =
              <?php echo "$".number_format($dp->atr_montoDescontar, 0, ",", "."); ?>
              <br>

          <?php
              }
          ?>
        </td>
      </tr>
    </table>

    <br>

    <p>Se entrega en este acto, el día <b><?php echo $fecha_hoy ?></b>, la cantidad de <?php echo $monto_solicitado ?> (<?php echo $letras_monto ?>) los cuales se descontarán de su sueldo en
    <?php echo $cant_cuotas; if ($cant_cuotas == 1) { echo 'cuota';}else{ echo ' cuotas';}?> <b>a partir de la remuneración del mes de

    <!-- Foreach para conocer cuál es el primer mes de sueldo que se le descontará, si la primera fecha es en junio, entonces se descuenta del mes de mayo -->
    <?php foreach ($detalle_prestamo as $key => $dp){ ?>
      <?php
        if($dp->atr_numCuota == 1){
          $ArrayfechaCuota = explode("-", $dp->atr_fechaDescuento);
          switch ($ArrayfechaCuota[1]) {
              case '01':
                  echo "diciembre ";
                  break;
              case '02':
                  echo "enero ";
                  break;
              case '03':
                  echo "febrero ";
                  break;
              case '04':
                  echo "marzo ";
                  break;
              case '05':
                  echo "abril ";
                  break;
              case '06':
                  echo "mayo ";
                  break;
              case '07':
                  echo "junio ";
                  break;
              case '08':
                  echo "julio ";
                  break;
              case '09':
                  echo "agosto ";
                  break;
              case '10':
                  echo "septiembre ";
                  break;
              case '11':
                  echo "octubre ";
                  break;
              case '12':
                  echo "noviembre ";
                  break;
          }
        }
      ?>
    <?php } ?>

  </b>quien lo recibe firmando de conformidad todos los involucrados.</p>
    <div class="caja1">
        <p>__________________________________</p>
          <div style="display:inline-block">

            <h5 style="margin-top:-12px;"><strong> <?php echo $nombre_trabajador ?> </strong></h5>
            <h5 style="margin-top:-12px;">R.U.T N° <?php echo $rut ?></h5>
            <h5 style="margin-top:-12px;">TRABAJADOR.</h5>
          </div>
    </div>

    <!-- Firma empleador -->
    <div class="caja2">
        <p>__________________________________</p>
          <div style="display:inline-block">

            <h5 style="margin-top:-12px;"><strong> <?php echo $empresa ?> </strong></h5>
            <h5 style="margin-top:-12px;">R.U.T N° <?php echo $rut_empresa?></h5>
            <h5 style="margin-top:-12px;">EMPLEADOR.</h5>
          </div>
    </div>




  </body>
</html>
