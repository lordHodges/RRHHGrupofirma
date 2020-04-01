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

    <h4 style="display:inline">I. &nbsp;&nbsp; <h4 style="text-decoration: underline;display:inline">Partes</h4></h4>

    <?php foreach ($arrayTrabajador as $key => $t){ ?>

    <p style="text-align:justify; line-height:25px;"> En <?php echo($ciudadFirma); ?>, a  <?php echo $fechaDeHoy ?>, entre <b><?php echo $t->empresa ?></b>, Rol Único Tributario <b><?php echo 'N°'.$t->runEmpresa ?></b>,
       representada legalmente por <b><?php echo $t->repre_legal ?></b>, cédula de Identidad N° <b><?php echo $t->repre_rut ?></b>, ambos con domicilio en <?php echo $t->direccionEmpresa ?> , comuna
       y ciudad de <?php echo $t->ciudadEmpresa ?>, en adelante <b>"el empleador"</b> y don <b><?php echo $t->atr_nombres." ".$t->atr_apellidos ?></b>, cédula de identidad N°<b><?php echo $t->atr_rut ?></b> domiciliado en
       <b><?php echo $t->atr_direccion ?> </b>,de nacionalidad <?php echo $t->nacionalidad ?>  nacido el <?php echo $t->atr_fechaNacimiento ?>, afiliado a AFP <?php echo $t->afp ?>  y Sistema de Salud <?php echo $t->prevision ?>, en adelante <b>"el trabajador",</b>
       se ha convenido el siguiente contrato de trabajo:</p>
    <?php } ?>




    <br><br><br><br><br><br><br>

    <!-- Firma trabajador -->
    <!-- <div class="linea"></div> -->



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






</body>
</html>
