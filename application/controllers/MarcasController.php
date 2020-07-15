<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class MarcasController extends CI_Controller {

	public function __construct(){
		parent::__construct();
		$this->load->model("MarcasModel");
	}

	public function inicioMarcas(){
		$this->load->view('template/menu');
		$this->load->view('mantenedores/marcas');
	}

	public function getListadoMarcas(){
		$draw = intval($this->input->get("draw"));
		$start = intval($this->input->get("start"));
		$length = intval($this->input->get("length"));
		$books = $this->MarcasModel->getListadoMarcas();
		$data = array();
		foreach ($books->result() as $r) {
				$data[] = array(
					$r->cp_marca,
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

	public function addMarca(){
		$nombre = $this->input->post("nombre");
		$resultado = $this->MarcasModel->addMarca($nombre);
		echo json_encode(array("msg" => $resultado));
	}

	public function editarMarca(){
		$nombre = $this->input->post("nombre");
		$idMarca = $this->input->post("idMarca");

		$resultado = $this->MarcasModel->editarMarca($nombre,$idMarca);
		echo json_encode(array("msg" => $resultado));
	}

	public function getDetalleMarca(){
		$idMarca = $this->input->post("idMarca");

		$resultado = $this->MarcasModel->getDetalleMarca($idMarca);
		echo json_encode(array("msg" => $resultado));
	}

	public function getMarcas(){
		$resultado = $this->MarcasModel->getMarcas();
		echo json_encode($resultado);
	}










































}
