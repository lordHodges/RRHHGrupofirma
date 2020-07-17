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

	public function deleteOtroAntecedente(){
		$idOtroAntecedente = $this->input->post("idOtroAntecedente");
		echo json_encode($this->OtrosModel->deleteOtroAntecedente($idOtroAntecedente));
	}

	public function getListadoOtros(){
		$cargo = $this->input->post("id");
		$titulo = $this->input->post("titulo");

		$books = $this->OtrosModel->getListadoOtrosAntecedentes($cargo, $titulo);
		echo json_encode($books);
	}

	public function getListadoOtrosAntecedentesDataTable(){
	$idCargo = $this->input->get("idCargo");
	$idAntecedente = $this->input->get("idAntecedente");

	$draw = intval($this->input->get("draw"));
	$start = intval($this->input->get("start"));
	$length = intval($this->input->get("length"));

	$books = $this->OtrosModel->getListadoOtrosAntecedentesDataTable($idCargo,$idAntecedente);
	$data = array();
	foreach ($books->result() as $r) {
			$data[] = array(
				$r->cp_otrosantecedentes,
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

	public function addAntecedente(){
		$cargo = $this->input->post("cargo");
		$titulo = $this->input->post("titulo");
		$antecedente = $this->input->post("antecedente");

		$resultado = $this->OtrosModel->addAntecedente($cargo, $titulo,$antecedente);
		echo json_encode(array("msg" => $resultado));

	}








}
