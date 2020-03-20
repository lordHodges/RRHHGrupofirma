<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class RemuneracionController extends CI_Controller {

	public function __construct()
	{
		parent::__construct();
		$this->load->model("RemuneracionesModel");
	}

	public function index()
	{

	}

	public function getDetalleRemuneracion(){
		$idCargo = $this->input->post("idCargo");

		$resultado = $this->RemuneracionesModel->getDetalleRemuneracion($idCargo);
		echo json_encode(array("msg" => $resultado));
	}

	public function updateRemuneracion(){
		$idCargo = $this->input->post("idCargo");
		$sueldoMensual = $this->input->post("sueldoMensual");
		$colacion = $this->input->post("colacion");
		$movilizacion = $this->input->post("movilizacion");

		$resultado = $this->RemuneracionesModel->updateRemuneracion($idCargo,$sueldoMensual,$colacion,$movilizacion);
		echo json_encode(array("msg" => $resultado));
	}

	public function updateRemuneracionExtra(){
		$idCargo = $this->input->post("idCargo");
		$descripcionActual = $this->input->post("descripcionActual");
		$descripcionNueva = $this->input->post("descripcionNueva");

		$resultado = $this->RemuneracionesModel->updateRemuneracionExtra($idCargo,$descripcionActual,$descripcionNueva);
		echo json_encode(array("msg" => $resultado));
	}

	public function addRemuneracionPorIDCargo(){
		$idCargo = $this->input->post("cargo");
		$descripcion = $this->input->post("remuneracion");

		$resultado = $this->RemuneracionesModel->addRemuneracionPorIDCargo($idCargo,$descripcion);
		echo json_encode(array("msg" => $resultado));
	}










}
