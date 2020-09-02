<?php

defined('BASEPATH') or exit('No direct script access allowed');

$_CI;

if (!function_exists('inicioContrato')) {

    function inicioContrato($idTrabajador, $mesConsulta)
    {
        $_CI = &get_instance();
        $_CI->load->model('ContratosModel', 'contratosModel');
	    $rs = $_CI->contratosModel-> getContratosTrabajador($idTrabajador);
		$fechaContrato= $rs->atr_fechaInicio;
		
		$fechaOrd = explode('-', $fechaContrato);
		if ($fechaOrd[1]==$mesConsulta) {
			return TRUE;
		}
        return FALSE;
    }
}
