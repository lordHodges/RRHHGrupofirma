<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class PermisosController extends CI_Controller {

	public function __construct(){
		parent::__construct();
		$this->load->model("PermisosModel");
	}

	public function getModulos(){
		$resultado = $this->PermisosModel->getModulos();
		echo json_encode( $resultado );
	}

	public function getExistenciasPorModulo(){

		$modulo = $this->input->post("modulo");

		$resultado = $this->PermisosModel->getExistenciasPorModulo($modulo);
		echo json_encode( array("msg" => $resultado) );
	}
































}
