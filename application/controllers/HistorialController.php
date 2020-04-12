<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class HistorialController extends CI_Controller {

	public function __construct()
	{
		parent::__construct();
		$this->load->model("HistorialModel");
	}

	public function index()
	{
		$this->load->view('template/menu');
		$this->load->view('historialTrabajador');
	}

	public function vistaCronologica(){
		$idTrabajador = $this->input->post("idTrabajador");
		$resultado = $this->HistorialModel->vistaCronologica($idTrabajador);
		echo json_encode( array("msg" => $resultado) );
	}

	public function vistaContratos(){
		$idTrabajador = $this->input->post("idTrabajador");
		$resultado = $this->HistorialModel->vistaContratos($idTrabajador);
		echo json_encode( array("msg" => $resultado) );
	}

	public function vistaTransferencias(){
		$idTrabajador = $this->input->post("idTrabajador");
		$resultado = $this->HistorialModel->vistaTransferencias($idTrabajador);
		echo json_encode( array("msg" => $resultado) );
	}

	public function vistaCartasAmonestacion(){
		$idTrabajador = $this->input->post("idTrabajador");
		$resultado = $this->HistorialModel->vistaCartasAmonestacion($idTrabajador);
		echo json_encode( array("msg" => $resultado) );
	}







}
