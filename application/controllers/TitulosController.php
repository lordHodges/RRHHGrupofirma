<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class TitulosController extends CI_Controller {

	public function __construct()
	{
		parent::__construct();
		$this->load->model("MantenedoresModel");
	}

	public function index()
	{
		$this->load->view('template/menu');
		$this->load->view('mantenedores/titulos');
	}

	function getTitulos(){
		$cargo = $this->input->post("cargo");
		$resultado = $this->MantenedoresModel->getListadoTitulos($cargo);
		echo json_encode(array("msg" => $resultado));
	}


	public function addTitulo(){
		$descripcion = $this->input->post("descripcion");
		$cargo = $this->input->post("cargo");
		$resultado = $this->MantenedoresModel->addTitulo($descripcion, $cargo);
		echo json_encode(array("msg" => $resultado));
	}







}
