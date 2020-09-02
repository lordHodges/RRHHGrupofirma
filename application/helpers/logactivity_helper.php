<?php

defined('BASEPATH') or exit('No direct script access allowed');

$_CI;

if (!function_exists('registrarActividad')) {

    function registrarActividad()
    {
        $datos = $_SESSION['datos'];
        $usuario = $datos['usuario'];
        $rs = $usuario[0]->atr_nombre;
        $_CI = &get_instance();
        $_CI->load->model('LogModel', 'logModel');
        $_CI->logModel->addLog($rs);

        return $rs;
    }
}
