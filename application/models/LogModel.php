<?php

defined('BASEPATH') || exit('No direct script access allowed');

class LogModel extends CI_Model
{
    function
    addLog($usuario)
    {

        $query = $this->db->last_query();
        $sesion = (string)($query);
        $data = array(
            "atr_usuario"   => $usuario,
            "atr_sesion"    => $sesion

        );


        if ($this->db->insert("fa_log_sesion", $data)) {
            return "ok";
        } else {
            return "fallo el log de actividad";
        }
    }
}
