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







}
