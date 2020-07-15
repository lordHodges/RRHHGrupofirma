<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class  NacionalidadController extends CI_Controller {

	public function __construct()
	{
		parent::__construct();
		$this->load->model("MantenedoresModel");
	}

	public function index()
	{
		$this->load->view('template/menu');
		$this->load->view('mantenedores/nacionalidades');
	}


	public function getListadoNacionalidades(){
		$draw = intval($this->input->get("draw"));
		$start = intval($this->input->get("start"));
		$length = intval($this->input->get("length"));
		$books = $this->MantenedoresModel->getListadoNacionalidades();
		$data = array();
		foreach ($books->result() as $r) {
				$data[] = array(
					$r->cp_nacionalidad,
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

	public function addNacionalidad(){
		$nombre = $this->input->post("nombre");

		$resultado = $this->MantenedoresModel->addNacionalidad($nombre);
		echo json_encode(array("msg" => $resultado));

	}

	public function getDetalleNacionalidad(){
			$idNacionalidad = $this->input->post("idNacionalidad");

			$resultado = $this->MantenedoresModel->getDetalleNacionalidad($idNacionalidad);
			echo json_encode(array("msg" => $resultado));
		}

		public function updateNacionalidad(){
			$idNacionalidad = $this->input->post("idNacionalidad");
			$nombre = $this->input->post("nombre");

			$resultado = $this->MantenedoresModel->updateNacionalidad($idNacionalidad, $nombre);
			echo json_encode(array("msg" => $resultado));
		}






}
