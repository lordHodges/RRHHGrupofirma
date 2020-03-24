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

	public function deleteCompetencia(){
			$idCompetencia = $this->input->post("idCompetencia");
			echo json_encode($this->CompetenciasModel->deleteCompetencia($idCompetencia));
	}


	public function getListadoCompetencias(){
			$id = $this->input->post("id");
			echo json_encode($this->CompetenciasModel->getListadoCompetencias($id));
	}

	public function getListadoCompetenciasDataTable(){
		$id = $this->input->get("id");

		$draw = intval($this->input->get("draw"));
		$start = intval($this->input->get("start"));
		$length = intval($this->input->get("length"));

		$books = $this->CompetenciasModel->getListadoCompetenciasDataTable($id);
		$data = array();
		foreach ($books->result() as $r) {
				$data[] = array(
					$r->cp_competencia_cargo,
					$r->atr_descripcion,
				);
		}
		$output = array(
				"draw" => $draw,
				"recordsTotal" => $books->num_rows(),
				"recordsFiltered" => $books->num_rows(),
				"data" => $data
		);
		echo json_encode($output);
		exit();
	}

	public function addCompetencia(){
		$competencia = $this->input->post("competencia");
		$cargo = $this->input->post("cargo");

		$resultado = $this->CompetenciasModel->addCompetencia($competencia, $cargo);
		echo json_encode(array("msg" => $resultado));
	}







}
