<?php
defined('BASEPATH') || exit('No direct script access allowed');

class BancoController extends CI_Controller
{

    public function __construct()
    {
        parent::__construct();
        $this->load->model("LogModel");
    }

    public function capturarActividad()
    {

        $datos = $this->session->userdata("datos");
        $usuario =  $datos['usuario'];

        $query = $this->db->last_query();
        $sesion = (string)($query);

        $resultado = $this->LogModel->addLog($usuario, $sesion);
        echo json_encode(array("msg" => $resultado));
    }
}
