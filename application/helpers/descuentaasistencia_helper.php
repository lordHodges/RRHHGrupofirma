<?php

defined('BASEPATH') or exit('No direct script access allowed');

$_CI;

if (!function_exists('descuentaAsistencia')) {

    function descuentaAsistencia($fechaIngreso, $fechaConsulta)
    {
	  $fechaIngresoSplit = explode('-',$fechaIngreso);
	  $fechaConsultaSplit = explode('-', $fechaConsulta);

	  if ($fechaIngresoSplit[0]==$fechaConsultaSplit[0] && $fechaIngresoSplit[1]==$fechaConsultaSplit[1]) {
		  return 'True';
	  } else {
		  return 'False';
	  }
	  
	  
	  

    }
}
/* $fechaIngresoSplit[2]==$fechaConsultaSplit[2] && */
