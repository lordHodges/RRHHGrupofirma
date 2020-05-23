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
      .caja2 { float:right;;margin-right: :5px;}



    </style>
  </head>
  <body>
    <!-- PUESTO DE TRABAJO -->
    <h3 style="text-decoration:none; text-align:center;">  <?php echo($titulo); ?> </h3>

    <br>

    <h4 style="display:inline">I. &nbsp;&nbsp; <h4 style="text-decoration: underline;display:inline">Partes</h4></h4>

    <?php foreach ($arrayTrabajador as $key => $t){ ?>


       <?php if( $t->repre_rut == "" || $t->repre_legal == "" ){ ?>
         <p style="text-align:justify; line-height:25px;"> En <?php echo($ciudadFirma); ?>, a  <?php echo $fechaDeHoy ?>, entre <b><?php echo $t->empresa ?></b>, RUT <b><?php echo 'N°'.$t->runEmpresa ?></b>,
          con domicilio en <?php echo $t->direccionEmpresa ?>, comuna
          y ciudad de <?php echo $t->ciudadEmpresa ?>, en adelante <b>"el empleador"</b> y don <b><?php echo $t->atr_nombres." ".$t->atr_apellidos ?></b>, cédula de identidad N°<b><?php echo $t->atr_rut ?></b> domiciliado en
          <b><?php echo $t->atr_direccion ?> </b>,de nacionalidad <?php echo $t->nacionalidad ?>  nacido el <?php echo $t->atr_fechaNacimiento ?>, afiliado a AFP <?php echo $t->afp ?>  y sistema de salud <?php echo $t->prevision ?>, en adelante <b>"el trabajador",</b>
          se ha convenido el siguiente contrato de trabajo:</p>
       <?php } ?>

       <?php if( $t->repre_rut != "" || $t->repre_legal != "" ){ ?>
         <p style="text-align:justify; line-height:25px;"> En <?php echo($ciudadFirma); ?>, a  <?php echo $fechaDeHoy ?>, entre <b><?php echo $t->empresa ?></b>, Rol Único Tributario <b><?php echo 'N°'.$t->runEmpresa ?></b>,
            representada legalmente por <b><?php echo $t->repre_legal ?></b>, cédula de Identidad N° <b><?php echo $t->repre_rut ?></b>, ambos con domicilio en <?php echo $t->direccionEmpresa ?> , comuna
            y ciudad de <?php echo $t->ciudadEmpresa ?>, en adelante <b>"el empleador"</b> y don <b><?php echo $t->atr_nombres." ".$t->atr_apellidos ?></b>, cédula de identidad N°<b><?php echo $t->atr_rut ?></b> domiciliado en
            <b><?php echo $t->atr_direccion ?> </b>,de nacionalidad <?php echo $t->nacionalidad ?>  nacido el <?php echo $t->atr_fechaNacimiento ?>, afiliado a AFP <?php echo $t->afp ?>  y Sistema de Salud <?php echo $t->prevision ?>, en adelante <b>"el trabajador",</b>
            se ha convenido el siguiente contrato de trabajo:</p>
       <?php } ?>


    <?php } ?>










    <br>
    <h4 style="display:inline">II.&nbsp;&nbsp; <h4 style="text-decoration: underline;display:inline">Naturaleza de los servicios</h4></h4>

    <p style="text-align:justify; line-height:25px;">El trabajador se compromete y obliga a ejecutar el trabajo de <b><?php echo $t->cargo ?></b>, debiendo realizar las actividades que se le sean encomendadas, entre ellas: </p>
    <ul>
      <?php foreach ($arrayFunciones as $key => $f){ ?>
        <li> <?php echo $f->atr_descripcion ?> </li>
      <?php } ?>
    </ul>









    <br>
    <h4 style="display:inline">III.&nbsp;&nbsp; <h4 style="text-decoration: underline;display:inline">Lugar de la prestación de servicios</h4></h4>

    <?php foreach ($arrayTrabajador as $key => $t){ ?>
      <p style="text-align:justify; line-height:25px;">  <?php echo $t->atr_lugarTrabajo ?></p>
    <?php } ?>

    <!-- <p style="text-align:justify; line-height:25px;">Sin perjuicio de la facultad del empleador de alterar, por causa
    justificada, la naturaleza de los servicios o el sitio o recinto en que ellos han de prestarse, con la sola limitación
    de que se trate de labores similares y que el nuevo sitio o recinto que dentro de la misma localidad o ciudad. </p> -->









    <h4 style="display:inline">IV.&nbsp;&nbsp; <h4 style="text-decoration: underline;display:inline">Jornada de trabajo</h4></h4>

    <?php foreach ($arrayTrabajador as $key => $f){ ?>
      <p style="text-align:justify; line-height:25px;"> <?php echo $f->atr_jornadaTrabajo ?> </p>
    <?php } ?>









    <h4 style="display:inline">V.&nbsp;&nbsp; <h4 style="text-decoration: underline;display:inline">Remuneraciones</h4></h4>

    <?php foreach ($arrayRemuneracion as $key => $r){ ?>
      <p style="text-align:justify; line-height:25px;"> El empleador se compromete a remunerar los servicios del trabajador
      con un sueldo mensual de <b>$<?php echo $sueldo ?>(<?php echo $letrasSueldo ?>pesos).</b></p>
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


        <?php if($r->atr_colacion > 0 && $r->atr_movilizacion > 0){ ?>
          <p style="text-align:justify; line-height:25px;">De igual forma se hace presente que, el bono de colación y el bono de movilización se descontará
          proporcionalmente al trabajador por los días en que se ausente de prestar servicios, sea o no por una causa
          atribuible a este.</p>
        <?php } ?>

        <?php if($r->atr_colacion > 0 && $r->atr_movilizacion == 0 ){ ?>
          <p style="text-align:justify; line-height:25px;">De igual forma se hace presente que, el bono de colación se descontará
          proporcionalmente al trabajador por los días en que se ausente de prestar servicios, sea o no por una causa
          atribuible a este.</p>
        <?php } ?>

        <?php if($r->atr_colacion == 0 && $r->atr_movilizacion > 0 ){ ?>
          <p style="text-align:justify; line-height:25px;">De igual forma se hace presente que, el bono de movilización se descontará
          proporcionalmente al trabajador por los días en que se ausente de prestar servicios, sea o no por una causa
          atribuible a este.</p>
        <?php } ?>

        <?php if($r->atr_asistencia > 0  ){ ?>
          <p style="text-align:justify; line-height:25px;"></p>
        <?php } ?>






      <?php } ?>

    <?php } ?>
    <p style="text-align:justify; line-height:25px;">La remuneración será líquida y pagada el día 05 de cada mes calendario. Asimismo, se podrá
    otorgar un anticipo de sueldo el día 20 de cada mes calendario, a solicitud del trabajador y en proporción a los días trabajados hasta el
    día quince del respectivo mes. La solicitud de anticipo de sueldo deberá ser solicitada por el trabajador, por escrito, con 2 días
    de anticipación. En el caso de que el día 20 sea inhábil el anticipo de sueldo se otorgará el hábil siguiente.</p>
    <br>









    <h4 style="display:inline">VI.&nbsp;&nbsp; <h4 style="text-decoration: underline;display:inline">Duración de la relación jurídica laboral</h4></h4>

    <p style="text-align:justify; line-height:25px;">El presente contrato tendrá una duración hasta el <?php echo $fechaTerminoContrato ?>, en caso contrario,
      terminará por alguna de las causales de la legislación vigente.</p>









    <h4 style="display:inline">VII.&nbsp;&nbsp; <h4 style="text-decoration: underline;display:inline">Cláusula de la vigencia</h4></h4>

    <p style="text-align:justify; line-height:25px;">Se deja constancia que el trabajador ingreso el <?php echo $fechaInicioContrato ?> a prestar servicios.</p>











    <h4 style="display:inline">VIII.&nbsp;&nbsp; <h4 style="text-decoration: underline;display:inline">A tener en cuenta</h4></h4>

    <p style="text-align:justify; line-height:25px;">Para todos los efectos derivados del presente contrato las partes fijan domicilio en la ciudad de <?php echo($ciudadFirma)?> y se someten
      someten a la jurisdicción de sus tribunales.</p>

    <p style="text-align:justify; line-height:25px;">El presente contrato se firma en 2 ejemplares, declarando el trabajador haber recibido en este acto un ejemplar de dicho instrumento,
    que es el fiel reflejo de la relación laboral convenida entre las partes.</p>


    <br><br><br><br><br><br><br>


    <!-- Firma Trabajador -->
     <div class="caja1">
        <p>__________________________________</p>
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
        <p>__________________________________</p>
        <?php foreach ($arrayTrabajador as $key => $t){ ?>
          <div style="display:inline-block">

            <h5 style="margin-top:-12px;"><strong> <?php echo $t->empresa ?> </strong></h5>
        		<h5 style="margin-top:-12px;">R.U.T N° <?php echo $t->runEmpresa?></h5>
            <h5 style="margin-top:-12px;">EMPLEADOR.</h5>
        	</div>
        <?php } ?>
     </div>





<<<<<<< HEAD
   <?php } else{ header("Location: http://localhost/GRUPOFIRMA/"); } ?>
=======
   <?php } else{ header("Location: http://10.10.10.1/grupofirma/"); } ?>
>>>>>>> 6d452e33e03ff9b08367071c515f6627be833f1a

</body>
</html>
