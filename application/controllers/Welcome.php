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
		$cargo = $this->input->GET("cargo");
		$titulo = "PERFIL OCUPACIONAL DEL PUESTO O VACANTE";
		// $cargo = 2;

		//datos que se enviaran a la Vista
		$data = array(
			'titulo'								=> $titulo,
			'cargo'									=> $this->MantenedoresModel->buscarCargo($cargo),
			'competencias'					=> $this->CompetenciasModel->getListadoCompetencias($cargo),
			'conocimientos'					=> $this->ConocimientosModel->getListadoConocimientos($cargo),
			'requisitosMinimos'			=> $this->RequisitosMinimosModel->getListadoRequisitosMinimos($cargo),
			'funciones'							=> $this->FuncionesModel->getListadoTareas($cargo),
			'titulos'								=> $this->MantenedoresModel->getListadoTitulos($cargo),
			'antecedentes'					=> $this->OtrosModel->getAntecedentes(),
			'responsablidades'			=> $this->MantenedoresModel->getListadoResponsabilidades($cargo),
		);

		$html = $this->load->view('pdf/test', $data, TRUE);
		// Cargamos la librería
		$this->load->library('Pdfgenerator');
		// definamos un nombre para el archivo. No es necesario agregar la extension .pdf
		$filename = 'perfilOcupacional_';
		// generamos el PDF. Pasemos por encima de la configuración general y definamos otro tipo de papel
		$this->pdfgenerator->generate($html, $filename, TRUE, 'Letter', 'portrait', 0);
	}


}
