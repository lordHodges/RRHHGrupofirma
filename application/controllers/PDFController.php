<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class  PDFController extends CI_Controller {

	public function __construct()
	{
		parent::__construct();
		$this->load->model("MantenedoresModel");
		$this->load->model("CompetenciasModel");
	}

	public function index()
	{
		// $this->load->view('template/menu');
		// $this->load->view('mantenedores/nacionalidades');
	}

	function cargarPerfilesOcupacionales(){
		$this->load->view('template/menu');
		$this->load->view('perfilOcupacional/perfilOcupacionalCargos');
	}

  function view_perfilesOcupacionales(){
		$titulo = "PERFIL OCUPACIONAL DEL PUESTO O VACANTE";
		$cargo = 2;

		//datos que se enviaran a la Vista
		$data = array(
			'titulo'										=> $titulo,
			'competencias'							=> $this->CompetenciasModel->getListadoCompetencias($cargo),

		);

		var_dump( $this->CompetenciasModel->getListadoCompetencias($cargo) );


		$html = $this->load->view('pdf/perfilOcupacional', $data, TRUE);
		// Cargamos la librería
		$this->load->library('Pdfgenerator');
		// definamos un nombre para el archivo. No es necesario agregar la extension .pdf
		$filename = 'perfil_ocupacional';
		// generamos el PDF. Pasemos por encima de la configuración general y definamos otro tipo de papel
		$this->pdfgenerator->generate($html, $filename, true, 'Letter', 'portrait');
	}








}
