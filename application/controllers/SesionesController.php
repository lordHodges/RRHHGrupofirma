<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class SesionesController extends CI_Controller {

	public function __construct()
	{
		parent::__construct();
		$this->load->model("SesionesModel");
	}

	public function iniciarSesion() {
		$correo = $this->input->post("correo");
		$clave = $this->input->post("clave");

		$usuario = $this->SesionesModel->buscarUsuario($correo, $clave);

		if (count($usuario) > 0) {
			$this->session->set_userdata("usuario", $usuario);
			echo json_encode($usuario);
			
		} else {
			echo json_encode("no existe, humano mentiroso");
		}
	}











}
