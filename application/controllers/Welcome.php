<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Welcome extends CI_Controller {

	public function __construct()
	{
		parent::__construct();
		$this->load->model("CompetenciasModel");
		$this->load->model("MantenedoresModel");
		$this->load->model("ConocimientosModel");
		$this->load->model("RequisitosMinimosModel");
		$this->load->model("FuncionesModel");
		$this->load->model("OtrosModel");
		$this->load->model("RemuneracionesModel");

	}

	public function index()
	{
		$this->session->sess_destroy();
		$this->load->view('template/login');
	}

	function testpdf(){
		$html = $this->load->view('Pdf/test', $viewdata, TRUE);
		// Cargamos la librería
		$this->load->library('Pdfgenerator');
		// definamos un nombre para el archivo. No es necesario agregar la extension .pdf
		$filename = 'test';
		// generamos el PDF. Pasemos por encima de la configuración general y definamos otro tipo de papel
		$this->pdfgenerator->generate($html, $filename, true, 'Letter', 'portrait');
	}

	function testDoc(){

	}
}
