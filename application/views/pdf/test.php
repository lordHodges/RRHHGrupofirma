<!DOCTYPE html>
<html lang="en" dir="ltr">
  <head>
    <meta charset="utf-8">
    <title></title>
    <style media="screen">

    </style>
  </head>
  <body>

    <?php
      echo("hola mundo");
    ?>

    <table>
      <?php foreach($competencias as $key=>$c){ ?>
      <tr>
          <td style="color:#00992E"><?php echo $c->atr_descripcion ?></td>
      </tr>
      <?php } ?>
    </table>
  </body>
</html>
