<?php

defined('BASEPATH') or exit('No direct script access allowed');

$_CI;

if (!function_exists('inicioContrato')) {

    function inicioContrato($idTrabajador, $mesConsulta)
    {
        $_CI = &get_instance();
        $_CI->load->model('ContratosModel', 'contratosModel');
	    $rs = $_CI->contratosModel->getContratosTrabajador($idTrabajador);
		
		foreach ($rs as $key => $r) {
			$rfecha = $r->atr_fechaInicio;
		}
		$fechaOrd = explode('-', $r);
		if ($fechaOrd[1]==$mesConsulta) {
			return TRUE;
		}
        return FALSE;
    }
}
