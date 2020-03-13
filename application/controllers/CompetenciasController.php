<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class CompetenciasController extends CI_Controller {

	public function __construct()
	{
		parent::__construct();
		$this->load->model("CompetenciasModel");
	}

	public function index()
	{
		$this->load->view('template/menu');
		$this->load->view('perfilOcupacional/competencias');
	}

	public function getListadoCompetencias(){
			$id = $this->input->post("id");
			echo json_encode($this->CompetenciasModel->getListadoCompetencias($id));
	}

	public function addCompetencia(){
		$competencia = $this->input->post("competencia");
		$cargo = $this->input->post("cargo");

		$resultado = $this->CompetenciasModel->addCompetencia($competencia, $cargo);
		echo json_encode(array("msg" => $resultado));
	}







}
