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

	public function deleteConocimiento(){
		$id_conocimiento = $this->input->post("id_conocimiento");
		echo json_encode($this->ConocimientosModel->deleteConocimiento($id_conocimiento));
	}

	public function getListadoConocimientosDataTable(){
		$id = $this->input->get("id");

		$draw = intval($this->input->get("draw"));
		$start = intval($this->input->get("start"));
		$length = intval($this->input->get("length"));

		$books = $this->ConocimientosModel->getListadoConocimientosDataTable($id);
		$data = array();
		foreach ($books->result() as $r) {
				$data[] = array(
					$r->cp_conocimiento_cargo,
					$r->atr_descripcion
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
