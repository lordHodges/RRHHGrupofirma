<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Welcome extends CI_Controller {

	public function __construct()
	{
		parent::__construct();
		$this->load->model("CompetenciasModel");
	}

	public function index()
	{
		$this->load->view('template/menu');
		$this->load->view('dashboard');
		$this->load->view('template/footer');
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
		$titulo = "Contrato laboral";
		$cargo = 2;



		//datos que se enviaran a la Vista
		$data = array(
			'titulo'								=> $titulo,
			'competencias'						=> $this->CompetenciasModel->getListadoCompetencias($cargo)
		);

		var_dump( $this->CompetenciasModel->getListadoCompetencias($cargo) );


		$html = $this->load->view('pdf/test', $data, TRUE);
		// Cargamos la librería
		$this->load->library('Pdfgenerator');
		// definamos un nombre para el archivo. No es necesario agregar la extension .pdf
		$filename = 'test';
		// generamos el PDF. Pasemos por encima de la configuración general y definamos otro tipo de papel
		$this->pdfgenerator->generate($html, $filename, true, 'Letter', 'portrait');
	}
}
