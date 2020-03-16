<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class OtrosController extends CI_Controller {

	public function __construct()
	{
		parent::__construct();
		$this->load->model("OtrosModel");
	}

	public function index()
	{
		$this->load->view('template/menu');
		$this->load->view('perfilOcupacional/otros');
	}

	public function getListadoOtros(){
		$cargo = $this->input->post("id");
		$titulo = $this->input->post("titulo");

		$books = $this->OtrosModel->getListadoOtrosAntecedentes($cargo, $titulo);
		echo json_encode($books);
	}

	public function addAntecedente(){
		$cargo = $this->input->post("cargo");
		$titulo = $this->input->post("titulo");
		$antecedente = $this->input->post("antecedente");

		$result = $this->OtrosModel->addAntecedente($cargo, $titulo,$antecedente);
		echo json_encode($result);

	}








}
