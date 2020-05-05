<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class ModelosController extends CI_Controller {

	public function __construct(){
		parent::__construct();
		$this->load->model("ModelosModel");
	}

	public function inicioModelos(){
		$this->load->view('template/menu');
		$this->load->view('mantenedores/modelos');
	}


	public function getListadoModelos(){
		$draw = intval($this->input->get("draw"));
		$start = intval($this->input->get("start"));
		$length = intval($this->input->get("length"));
		$books = $this->ModelosModel->getListadoModelos();
		$data = array();
		foreach ($books->result() as $r) {
				$data[] = array(
					$r->cp_modelo,
					$r->atr_descripcion,
					$r->marca
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

	public function addModelo(){
		$nombre = $this->input->post("nombre");

		$resultado = $this->ModelosModel->addModelo($nombre);
		echo json_encode(array("msg" => $resultado));
	}

	public function getDetalleModelo(){
		$idModelo = $this->input->post("idModelo");

		$resultado = $this->ModelosModel->getDetalleModelo($idModelo);
		echo json_encode(array("msg" => $resultado));
	}














}
