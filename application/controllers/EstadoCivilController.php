<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class EstadoCivilController extends CI_Controller {

	public function __construct()
	{
		parent::__construct();
		$this->load->model("MantenedoresModel");
	}

	public function index()
	{
		$this->load->view('template/menu');
		$this->load->view('mantenedores/estadosciviles');
	}


	public function getListadoEstadosCiviles(){
		$draw = intval($this->input->get("draw"));
		$start = intval($this->input->get("start"));
		$length = intval($this->input->get("length"));
		$books = $this->MantenedoresModel->getListadoEstadosCiviles();
		$data = array();
		foreach ($books->result() as $r) {
				$data[] = array(
					$r->cp_estadoCivil,
					$r->atr_nombre,
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

	public function addEstadoCivil(){
		$nombre = $this->input->post("nombre");

		$resultado = $this->MantenedoresModel->addEstadoCivil($nombre);
		echo json_encode(array("msg" => $resultado));

	}







}
