<?php
defined('BASEPATH') or exit('No direct script access allowed');

class AFPController extends CI_Controller
{

	public function __construct()
	{
		parent::__construct();
		$this->load->model("MantenedoresModel");
	}

	public function index()
	{
		$this->load->view('template/menu');
		$this->load->view('mantenedores/afp');
	}


	public function getListadoAFP()
	{
		$draw = intval($this->input->get("draw"));
		$start = intval($this->input->get("start"));
		$length = intval($this->input->get("length"));
		$books = $this->MantenedoresModel->getListadoAFP();
		$data = array();
		foreach ($books->result() as $r) {
			$data[] = array(
				$r->cp_afp,
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

	public function addAFP()
	{
		$nombre = $this->input->post("nombre", TRUE);

		if (substr($nombre, 0, 9) === "[removed]") {
			echo json_encode(array("msg" => "No se pueden ingresar determinados caracteres"));
			exit();
		}

		$resultado = $this->MantenedoresModel->addAFP($nombre);
		echo json_encode(array("msg" => $resultado));
	}

	public function getDetalleAFP()
	{
		$afp = $this->input->post("afp");

		$resultado = $this->MantenedoresModel->getDetalleAFP($afp);
		echo json_encode(array("msg" => $resultado));
	}

	public function updateAFP()
	{
		$id = $this->input->post("idAFP", TRUE);
		$afpNuevo = $this->input->post("nombreNuevo", TRUE);

		if (substr($nombre, 0, 9) === "[removed]" || substr($afpNuevo, 0, 9) === "[removed]") {
			echo json_encode(array("msg" => "No se pueden ingresar determinados caracteres"));
			exit();
		}

		$resultado = $this->MantenedoresModel->updateAFP($afpNuevo, $id);
		echo json_encode(array("msg" => $resultado));
	}
}
