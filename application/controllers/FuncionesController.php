<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class FuncionesController extends CI_Controller {

	public function __construct()
	{
		parent::__construct();
		$this->load->model("FuncionesModel");
	}

	public function index()
	{
		$this->load->view('template/menu');
		$this->load->view('perfilOcupacional/funciones');
	}

	public function deleteTarea(){
			$idTarea = $this->input->post("idTarea");
			echo json_encode($this->FuncionesModel->deleteTarea($idTarea));
	}

	public function getListadoTareasDataTable(){
		$id = $this->input->get("id");

		$draw = intval($this->input->get("draw"));
		$start = intval($this->input->get("start"));
		$length = intval($this->input->get("length"));

		$books = $this->FuncionesModel->getListadoTareasDataTable($id);
		$data = array();
		foreach ($books->result() as $r) {
				$data[] = array(
					$r->cp_tareas_cargo,
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

	public function getListadoTareas(){
			$id = $this->input->post("id");
			echo json_encode($this->FuncionesModel->getListadoTareas($id));
	}

	public function addTarea(){
		$tarea = $this->input->post("tarea");
		$cargo = $this->input->post("cargo");

		$resultado = $this->FuncionesModel->addTarea($tarea, $cargo);
		echo json_encode(array("msg" => $resultado));
	}







}
