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

		$idUsuario = 0;

		$usuario = $this->SesionesModel->buscarUsuario($correo, $clave);
		foreach ($usuario as $u) {
			$idUsuario = $u->cp_usuario;
		}

		$permisos = $this->SesionesModel->listadoPermisos($idUsuario);

		$data = array(
			"permisos"			=> $permisos,
			"usuario" 			=> $usuario
		);

		if (count($usuario) > 0) {
			$this->session->set_userdata("datos", $data);
			echo json_encode('ok');
		} else {
			echo json_encode("error");
		}

	}

	public function listadoPermisos($usuario)
	{
		$resultado = $this->SesionesModel->listadoPermisos($usuario);
		echo json_encode($resultado);
	}


	public function comprobarPermiso($usuario, $existencia)
	{
		$resultado = $this->SesionesModel->comprobarPermiso($usuario, $existencia);
		echo json_encode($resultado);
	}

	public function cerrarSesion()
	{
			$this->session->sess_destroy();
			$this->index();
	}











}
