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

	public function getListadoRequisitosMinimos(){
			$id = $this->input->post("id");
			echo json_encode($this->RequisitosMinimosModel->getListadoRequisitosMinimos($id));
	}

	public function addRequisitoMinimo(){
		$requisitoMinimo = $this->input->post("requisitoMinimo");
		$cargo = $this->input->post("cargo");

		$resultado = $this->RequisitosMinimosModel->addRequisitoMinimo($requisitoMinimo, $cargo);
		echo json_encode(array("msg" => $resultado));
	}







}
