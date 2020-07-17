<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class RequisitosMinimosController extends CI_Controller {

	public function __construct()
	{
		parent::__construct();
		$this->load->model("RequisitosMinimosModel");
	}

	public function index()
	{
		$this->load->view('template/menu');
		$this->load->view('perfilOcupacional/requisitosMinimos');
	}

	public function deleteRequisitoMinimo(){
			$idRequisitoMinimo = $this->input->post("idRequisitoMinimo");
			echo json_encode($this->RequisitosMinimosModel->deleteRequisitoMinimo($idRequisitoMinimo));
	}


	public function getListadoRequisitosMinimos(){
			$id = $this->input->post("id");
			echo json_encode($this->RequisitosMinimosModel->getListadoRequisitosMinimos($id));
	}

	public function getListadoRequisitosMinimosDataTable(){
		$id = $this->input->get("id");

		$draw = intval($this->input->get("draw"));
		$start = intval($this->input->get("start"));
		$length = intval($this->input->get("length"));

		$books = $this->RequisitosMinimosModel->getListadoRequisitosMinimosDataTable($id);
		$data = array();
		foreach ($books->result() as $r) {
				$data[] = array(
					$r->cp_requisitominimo_cargo,
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

	public function addRequisitoMinimo(){
		$requisitoMinimo = $this->input->post("requisitoMinimo");
		$cargo = $this->input->post("cargo");

		$resultado = $this->RequisitosMinimosModel->addRequisitoMinimo($requisitoMinimo, $cargo);
		echo json_encode(array("msg" => $resultado));
	}







}
