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
                <?php foreach ($arrayTrabajador as $key => $t){ ?>
                <br>
                <h4 style="display:inline"><?php echo( $numeroRomano[$i] ) ?>.&nbsp;&nbsp; <h4 style="text-decoration: underline;display:inline">Partes</h4></h4>

                <p style="text-align:justify; line-height:25px;"> En <?php echo($ciudadFirma); ?>, a  <?php echo $fechaDeHoy ?>, entre <b><?php echo $t->empresa ?></b>, Rol Único Tributario <b><?php echo 'N°'.$t->runEmpresa ?></b>,
                   representada legalmente por <b><?php echo $t->repre_legal ?></b>, cédula de Identidad N° <b><?php echo $t->repre_rut ?></b>, ambos con domicilio en <?php echo $t->direccionEmpresa ?> , comuna
                   y ciudad de <?php echo $t->ciudadEmpresa ?>, en adelante <b>"el empleador"</b> y don <b><?php echo $t->atr_nombres." ".$t->atr_apellidos ?></b>, cédula de identidad N°<b><?php echo $t->atr_rut ?></b> domiciliado en
                   <b><?php echo $t->atr_direccion ?> </b>,de nacionalidad <?php echo $t->nacionalidad ?>  nacido el <?php echo $t->atr_fechaNacimiento ?>, afiliado a AFP <?php echo $t->afp ?>  y Sistema de Salud <?php echo $t->prevision ?>, en adelante <b>"el trabajador",</b>
                   se ha convenido el siguiente contrato de trabajo:</p>
                <?php } ?>
            <?php break; ?>


        <?php case "Naturaleza de los servicios": ?>

                <br>
                <h4 style="display:inline"><?php  echo( $numeroRomano[$i] )  ?>.&nbsp;&nbsp; <h4 style="text-decoration: underline;display:inline">Naturaleza de los servicios</h4></h4>

                <p style="text-align:justify; line-height:25px;">El trabajador se compromete y obliga a ejecutar el trabajo de <b><?php echo $t->cargo ?></b>, debiendo realizar las actividades que se le sean encomendadas, entre ellas: </p>
                <ul>
                <?php foreach ($arrayFunciones as $key => $f){ ?>
                  <li> <?php echo $f->atr_descripcion ?> </li>
                <?php } ?>
                </ul>
            <?php break; ?>


        <?php case "Lugar de prestación de servicios": ?>
                <br>
                <h4 style="display:inline"><?php  echo( $numeroRomano[$i] )  ?>.&nbsp;&nbsp; <h4 style="text-decoration: underline;display:inline">Lugar de la prestación de servicios</h4></h4>

                <?php foreach ($arrayTrabajador as $key => $t){ ?>
                  <p style="text-align:justify; line-height:25px;">  <?php echo $t->atr_lugarTrabajo ?></p>
                <?php } ?>

                <p style="text-align:justify; line-height:25px;">Sin perjuicio de la facultad del empleador de alterar, por causa
                justificada, la naturaleza de los servicios o el sitio o recinto en que ellos han de prestarse, con la sola limitación
                de que se trate de labores similares y que el nuevo sitio o recinto que dentro de la misma localidad o ciudad. </p>

            <?php break; ?>


        <?php case "Jornada de trabajo": ?>
                <br>
                <h4 style="display:inline"><?php  echo( $numeroRomano[$i] )  ?>.&nbsp;&nbsp; <h4 style="text-decoration: underline;display:inline">Jornada de trabajo</h4></h4>

                <?php foreach ($arrayTrabajador as $key => $f){ ?>
                <p style="text-align:justify; line-height:25px;"> <?php echo $f->atr_jornadaTrabajo ?> </p>
                <?php } ?>


            <?php break; ?>


        <?php case "Remuneraciones": ?>
            <br>
            <h4 style="display:inline"><?php  echo( $numeroRomano[$i] )  ?>.&nbsp;&nbsp; <h4 style="text-decoration: underline;display:inline">Remuneraciones</h4></h4>

            <?php foreach ($arrayRemuneracion as $key => $r){ ?>
              <p style="text-align:justify; line-height:25px;"> El empleador se compromete a remunerar los servicios del trabajador
              con un sueldo mensual de <b>$<?php echo $r->atr_sueldoMensual ?>(<?php echo $letrasSueldo ?>pesos).</b></p>
            <?php } ?>

              <p style="text-align:justify; line-height:25px;">El empleador pagará al trabajador una gratificación mensual equivalente al 25% del total de las remuneraciones
              mensuales, con tope legal de 4.75 ingresos mínimos mensuales.</p>

            <?php foreach ($arrayRemuneracion as $key => $r){ ?>

              <?php if($r->atr_colacion > 0 || $r->atr_movilizacion > 0 ||  $r->atr_asistencia > 0){ ?>
                <p style="text-align:justify; line-height:25px;">Además, el empleador se compromete a pagar mensualmente los siguientes bonos no imponibles:</p>
                <ul>
                <?php if($r->atr_colacion > 0){ ?>
                  <li>Un bono de colación de <b>$<?php echo $r->atr_colacion ?> (<?php echo($letrasColacion);?>pesos).</b></li>
                <?php } ?>
                <?php if($r->atr_movilizacion > 0){ ?>
                  <li>Un bono de movilización de <b>$<?php echo $r->atr_movilizacion ?> (<?php echo($letrasMovilizacion);?>pesos).</b></li>
                <?php } ?>
                <?php if($r->atr_asistencia > 0){ ?>
                  <li>Un bono de asistencia de <b>$<?php echo $r->atr_asistencia ?> (<?php echo($letrasAsistencia);?>pesos).</b></li>
                <?php } ?>
                </ul>


                <?php if($r->atr_colacion > 0 && $r->atr_movilizacion > 0 && $r->atr_asistencia == 0){ ?>
                  <p style="text-align:justify; line-height:25px;">De igual forma se hace presente que, el bono de colación y el bono de movilización se descontará
                  proporcionalmente al trabajador por los días en que se ausente de prestar servicios, sea o no por una causa
                  atribuible a este.</p>
                <?php } ?>

                <?php if($r->atr_colacion > 0 && $r->atr_movilizacion == 0 && $r->atr_asistencia == 0){ ?>
                  <p style="text-align:justify; line-height:25px;">De igual forma se hace presente que, el bono de colación se descontará
                  proporcionalmente al trabajador por los días en que se ausente de prestar servicios, sea o no por una causa
                  atribuible a este.</p>
                <?php } ?>

                <?php if($r->atr_colacion == 0 && $r->atr_movilizacion > 0 && $r->atr_asistencia == 0){ ?>
                  <p style="text-align:justify; line-height:25px;">De igual forma se hace presente que, el bono de movilización se descontará
                  proporcionalmente al trabajador por los días en que se ausente de prestar servicios, sea o no por una causa
                  atribuible a este.</p>
                <?php } ?>


                <?php if($r->atr_colacion > 0 && $r->atr_movilizacion > 0 && $r->atr_asistencia > 0){ ?>
                  <p style="text-align:justify; line-height:25px;">De igual forma se hace presente que, el bono de colación, el bono de movilización y el bono de asistencia se descontará
                  proporcionalmente al trabajador por los días en que se ausente de prestar servicios, sea o no por una causa
                  atribuible a este.</p>
                <?php } ?>

                <?php if($r->atr_colacion > 0 && $r->atr_movilizacion == 0 && $r->atr_asistencia > 0){ ?>
                  <p style="text-align:justify; line-height:25px;">De igual forma se hace presente que, el bono de colación y el bono de asistencia se descontará
                  proporcionalmente al trabajador por los días en que se ausente de prestar servicios, sea o no por una causa
                  atribuible a este.</p>
                <?php } ?>

                <?php if($r->atr_colacion == 0 && $r->atr_movilizacion > 0 && $r->atr_asistencia  > 0){ ?>
                  <p style="text-align:justify; line-height:25px;">De igual forma se hace presente que, el bono de movilización y el bono de asistencia se descontará
                  proporcionalmente al trabajador por los días en que se ausente de prestar servicios, sea o no por una causa
                  atribuible a este.</p>
                <?php } ?>

              <?php } ?>

            <?php } ?>
            <p style="text-align:justify; line-height:25px;">La remuneración será líquida y pagada el día 05 de cada mes calendario. Asimismo, se podrá
            otorgar un anticipo de sueldo el día 20 de cada mes calendario, a solicitud del trabajador y en proporción a los días trabajados hasta el
            día quince del respectivo mes. La solicitud de anticipo de sueldo deberá ser solicitada por el trabajador, por escrito, con 2 días
            de anticipación. En el caso de que el día 20 sea inhábil el anticipo de sueldo se otorgará el hábil siguiente.</p>

            <?php break; ?>


        <?php case "Duración de la relación jurídica laboral": ?>
            <br>
            <h4 style="display:inline"><?php  echo( $numeroRomano[$i] )  ?>.&nbsp;&nbsp; <h4 style="text-decoration: underline;display:inline">Duración de la relación jurídica laboral</h4></h4>

            <p style="text-align:justify; line-height:25px;">El presente contrato tendrá una duración hasta el <?php echo $fechaTerminoContrato ?>, en caso contrario,
              terminará por alguna de las causales de la legislación vigente.</p>


            <?php break; ?>


        <?php case "Cláusula de vigencia": ?>
            <br>
            <h4 style="display:inline"><?php  echo( $numeroRomano[$i] )  ?>.&nbsp;&nbsp; <h4 style="text-decoration: underline;display:inline">Cláusula de la vigencia</h4></h4>

            <p style="text-align:justify; line-height:25px;">Se deja constancia que el trabajador ingreso el <?php echo $fechaInicioContrato ?> a prestar servicios.</p>

            <?php break; ?>


        <?php case "A tener en cuenta": ?>
            <br>
            <h4 style="display:inline"><?php  echo( $numeroRomano[$i] )  ?>.&nbsp;&nbsp; <h4 style="text-decoration: underline;display:inline">A tener en cuenta</h4></h4>

            <p style="text-align:justify; line-height:25px;">Para todos los efectos derivados del presente contrato las partes fijan domicilio en la ciudad de <?php echo($ciudadFirma)?> y se someten
              someten a la jurisdicción de sus tribunales.</p>

            <p style="text-align:justify; line-height:25px;">El presente contrato se firma en 2 ejemplares, declarando el trabajador haber recibido en este acto un ejemplar de dicho instrumento,
            que es el fiel reflejo de la relación laboral convenida entre las partes.</p>

            <?php break; ?>

        <?php case "Cláusula de confidencialidad": ?>
            <br>
            <h4 style="display:inline"><?php  echo( $numeroRomano[$i] )  ?>.&nbsp;&nbsp; <h4 style="text-decoration: underline;display:inline">Claúsula de confidencialidad</h4></h4>
            <p style="text-align:justify; line-height:25px;">Se obliga a no divulgar a teceros información considerada por el empleador como "confidencial", sin
            que este haya dado previamente su consentimiento por escrito para aquello. Será considerada como confidencial toda aquella información recabada relativo al
            proceso administrativo y modelo de negocio.
            </p>
            <p style="text-align:justify; line-height:25px;">
              A su vez, la información confidencial y todos los derecho a la misma que han sido o serán entregdos al trabajador, permanecerán como propiedad del empleador. En este sentido,
              el trabajador, no obtendrá derecho alguno, de ningún tipo sobre la información, ni tampoco ningún derecho a utilizarla, excepto para el objeto del presente contrato.
            </p>
            <p style="text-align:justify; line-height:25px;">
              Sólo a título ejemplar, y sin que la siguiente enumeración sea taxitiva ni importe una limitación, la información confidencial incluye entre otras materias:
            </p>
            <ul style="list-style:none;  margin:0px; padding:0px;" >
              <li style="margin:5px; padding:0px; text-align:justify; line-height:25px;">
                1.&nbsp;&nbsp;&nbsp;&nbsp;
                Toda información escrita, gráfica, computacional, electrónica o de cualquier otra especie referente a los contenidos
                creativos, historia, operaciones, ventas, clientes, marketing, espectos legales, situación financiera y económica de cualquiera de las Partes,
                incluyendo documentos, archivos, estados financieros, información contable, contratos, informes, correos electrónicos, memorandos, soportes audiovisuales y cualquier
                otra información relacionada con las partes u otras empresas relacionadas, esté o no especificada como confidencial;
              </li>
              <li style="margin-left: :5px; margin-top:15px; padding:0px; text-align:justify; line-height:25px;">
                2.&nbsp;&nbsp;&nbsp;&nbsp;
                Toda información comunicada oralmente por cualquier ade las partes a la otra, por cualquier representante validado de éstas;
              </li>
              <li style="margin-left: :5px; margin-top:15px; padding:0px; text-align:justify; line-height:25px;">
                3.&nbsp;&nbsp;&nbsp;&nbsp;
                El código fuente y objeto de cualquier programa computacional desarrollado, licenciado o adquirido por cualquier de las partes, así como sus manuales,
                documentación preparatoria y comentarios al código fuente;
              </li>
              <li style="margin-left: :5px; margin-top:15px; padding:0px; text-align:justify; line-height:25px;">
                4.&nbsp;&nbsp;&nbsp;&nbsp;
                Todo material, muestra, fórmula, proceso, sistema, patente de invención, modelo de utilidad, marcas, diseño, tecnología, descubrimientos, know-howm ideas de
                negocios, etc., y los derechos relacionados con lo anterior, sean o no patentables y/o registrables;y,
              </li>
              <li style="margin-left: :5px; margin-top:15px; padding:0px; text-align:justify; line-height:25px;">
                5.&nbsp;&nbsp;&nbsp;&nbsp;
                Toda otra información no contemplada en los números anteriores, y que en definitiva pueda ser útil para la competencia, ya sea directa o indirecta de cualquiera de las partes.
              </li>
            </ul>
            <?php break; ?>


        <?php case "Propiedad intelectual": ?>
            <br>
            <h4 style="display:inline"><?php  echo( $numeroRomano[$i] )  ?>.&nbsp;&nbsp; <h4 style="text-decoration: underline;display:inline">Propiedad intelectual</h4></h4>
            <p  style="text-align:justify; line-height:25px;">
              El trabajador confiere los derechos de propiedad intelectual al empleador sobre todo el desarrollo, cediendo todos los derechos de explotación y propiedad
              de estos. En este sentido, el trabajador, garantiza al empleador que el desarrollo es absolutamente original y confidencial, como también que CEDE la totalidad
              de los derechos de propiedad intelectual sobre el mismo, habiendo sido completamente realizado por éste, por lo que puede garantizar que todo el software y
              las herramientas utilizadas no vulneran ninguna normativa, contrato, derecho, interés o propiedad de teceros.
            </p>
            <?php break; ?>
    <?php
    }
    ?>

  <?php } ?>

  <br><br><br><br><br><br><br>


  <div>
    <!-- Firma Trabajador -->
     <div class="caja1">
        <p>____________</p>
        <?php foreach ($arrayTrabajador as $key => $t){ ?>
          <div style="display:inline-block">

            <h5 style="margin-top:-12px;"><strong> <?php echo $t->atr_nombres." ".$t->atr_apellidos ?> </strong></h5>
        		<h5 style="margin-top:-12px;">R.U.T N° <?php echo $t->atr_rut ?></h5>
            <h5 style="margin-top:-12px;">TRABAJADOR.</h5>
        	</div>
        <?php } ?>
     </div>

     <!-- Firma empleador -->
     <div class="caja2">
        <p>____________</p>
        <?php foreach ($arrayTrabajador as $key => $t){ ?>
          <div style="display:inline-block">

            <h5 style="margin-top:-12px;"><strong> <?php echo $t->empresa ?> </strong></h5>
        		<h5 style="margin-top:-12px;">R.U.T N° <?php echo $t->runEmpresa?></h5>
            <h5 style="margin-top:-12px;">EMPLEADOR.</h5>
        	</div>
        <?php } ?>
     </div>
  </div>























</body>
</html>