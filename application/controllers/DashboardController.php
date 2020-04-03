<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class DashboardController extends CI_Controller {

	public function __construct()
	{
		parent::__construct();
		$this->load->model("DashboardModel");
	}

	public function index()
	{
		$this->load->view('template/menu');
		$this->load->view('dashboard');
	}

	public function buscarContratosPorVencer(){
		$resultado = $this->DashboardModel->buscarContratosPorVencer();
		echo json_encode(array("msg" => $resultado));
	}










}
