<?php
defined('BASEPATH') || exit('No direct script access allowed');

class BancoController extends CI_Controller
{

    public function __construct()
    {
        parent::__construct();
        $this->load->model("");
    }

    public function capturarActividad($data)
    {
        $data_sesion = $this->session->userdata("datos");
        $usuario =  $data_sesion['usuario'];

        $this->LogModel->addLog($usuario, $data_sesion);
    }
}
