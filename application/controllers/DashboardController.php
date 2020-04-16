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

	public function totalContratosPlazo(){
		$resultado = $this->DashboardModel->totalContratosPlazo();
		echo json_encode($resultado);
	}

	public function totalContratosIndefinidos(){
		$resultado = $this->DashboardModel->totalContratosIndefinidos();
		echo json_encode($resultado);
	}

	public function totalContratosPorProyecto(){
		$resultado = $this->DashboardModel->totalContratosPorProyecto();
		echo json_encode($resultado);
	}



	public function buscarContratosPorVencer(){
		$resultado = $this->DashboardModel->buscarContratosPorVencer();
		echo json_encode(array("msg" => $resultado));
	}




	public function transferenciasPorEmpresaHoy(){
		$resultado = $this->DashboardModel->transferenciasPorEmpresaHoy();
		echo json_encode($resultado);
	}

	public function transferenciasPorEmpresaMes(){
		$resultado = $this->DashboardModel->transferenciasPorEmpresaMes();
		echo json_encode($resultado);
	}



	public function transferenciasPorEmpresaAno(){
		$resultado = $this->DashboardModel->transferenciasPorEmpresaAno();
		echo json_encode($resultado);
	}

	public function transferenciasPorEmpresaPrimerSemestre(){
		$resultado = $this->DashboardModel->transferenciasPorEmpresaPrimerSemestre();
		echo json_encode($resultado);
	}

	public function transferenciasPorEmpresaSegundoSemestre(){
		$resultado = $this->DashboardModel->transferenciasPorEmpresaSegundoSemestre();
		echo json_encode($resultado);
	}













}
