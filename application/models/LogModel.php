<?php

defined('BASEPATH') || exit('No direct script access allowed');

class LogModel extends CI_Model
{
    function
    addLog($usuario, $data_sesion)
    {
        $data = array(
            "atr_usuario"   => $usuario,
            "atr_sesion"    => $data_sesion

        );
        $this->db->insert("fa_log_sesion", $data);
    }
}
