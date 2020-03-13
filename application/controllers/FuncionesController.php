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
