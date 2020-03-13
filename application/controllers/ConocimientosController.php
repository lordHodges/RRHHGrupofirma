<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class ConocimientosController extends CI_Controller {

	public function __construct()
	{
		parent::__construct();
		$this->load->model("ConocimientosModel");
	}

	public function index()
	{
		$this->load->view('template/menu');
		$this->load->view('perfilOcupacional/conocimientos');
	}

	public function getListadoConocimientos(){
			$id = $this->input->post("id");
			echo json_encode($this->ConocimientosModel->getListadoConocimientos($id));
	}

	public function addConocimiento(){
		$conocimiento = $this->input->post("conocimiento");
		$cargo = $this->input->post("cargo");

		$resultado = $this->ConocimientosModel->addConocimiento($conocimiento, $cargo);
		echo json_encode(array("msg" => $resultado));
	}







}
