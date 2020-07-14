<?php
defined('BASEPATH') or exit('No direct script access allowed');

class CiudadController extends CI_Controller
{

	public function __construct()
	{
		parent::__construct();
		$this->load->model("MantenedoresModel");
	}

	public function index()
	{
		$this->load->view('template/menu');
		$this->load->view('mantenedores/ciudades');
	}

	public function getListadoCiudades()
	{
		$draw = intval($this->input->get("draw"));
		$start = intval($this->input->get("start"));
		$length = intval($this->input->get("length"));
		$books = $this->MantenedoresModel->getListadoCiudades();
		$data = array();
		foreach ($books->result() as $r) {
			$data[] = array(
				$r->cp_ciudad,
				$r->atr_nombre,
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

	public function addCiudad()
	{
		$nombre = $this->input->post("nombre");

		$resultado = $this->MantenedoresModel->addCiudad($nombre);
		echo json_encode(array("msg" => $resultado));
	}
}
