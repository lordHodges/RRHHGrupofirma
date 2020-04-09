<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class CargoController extends CI_Controller {

	public function __construct()
	{
		parent::__construct();
		$this->load->model("MantenedoresModel");
	}

	public function index()
	{
		$this->load->view('template/menu');
		$this->load->view('mantenedores/cargos');
	}

	public function deleteResponsabilidad(){
		$idCargo = $this->input->post("idCargo");
		$detalle = $this->input->post("descripcionResponsabilidad");

		$resultado = $this->MantenedoresModel->deleteResponsabilidad($idCargo,$detalle);
		echo json_encode(array("msg" => $resultado));
	}

	public function addResponsabilidades(){
		$responsabilidad = $this->input->post("responsabilidad");
		$cargo = $this->input->post("cargo");

		$resultado = $this->MantenedoresModel->addResponsabilidades($cargo, $responsabilidad);
		echo json_encode(array("msg" => $resultado));
	}

	public function addResponsabilidadesPorIDCargo(){
		$responsabilidad = $this->input->post("responsabilidad");
		$cargo = $this->input->post("cargo");

		$resultado = $this->MantenedoresModel->addResponsabilidadesPorIDCargo($cargo, $responsabilidad);
		echo json_encode(array("msg" => $resultado));
	}

	public function getListadoCargos(){
		$draw = intval($this->input->get("draw"));
		$start = intval($this->input->get("start"));
		$length = intval($this->input->get("length"));
		$books = $this->MantenedoresModel->getListadoCargos();
		$data = array();
		foreach ($books->result() as $r) {
			if( $r->atr_lugarTrabajo == "" || $r->atr_lugarTrabajo == " " ) { $lugarTrabajo = "-"; } else { $lugarTrabajo = $r->atr_lugarTrabajo;  }
			if( $r->atr_jornadaTrabajo == "" || $r->atr_jornadaTrabajo == " " ) { $jornadaTrabajo = "-"; } else{ $jornadaTrabajo = $r->atr_jornadaTrabajo; }

			$data[] = array(
				$r->cp_cargo,
				$r->atr_nombre,
				$r->atr_jefeDirecto,
				$lugarTrabajo,
				$jornadaTrabajo
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

	public function addCargo(){
		$nombre = $this->input->post("nombre");
		$jefeDirecto = $this->input->post("jefeDirecto");
		$lugarTrabajo = $this->input->post("lugarTrabajo");
		$jornadaTrabajo = $this->input->post("jornadaTrabajo");
		$diasTrabajo = $this->input->post("diasTrabajo");

		$resultado = $this->MantenedoresModel->addCargo($nombre, $jefeDirecto,$lugarTrabajo,$jornadaTrabajo,$diasTrabajo);
		echo json_encode(array("msg" => $resultado));

	}


	public function getDetalleCargo(){
		$cargo = $this->input->post("cargo");

		$resultado = $this->MantenedoresModel->getDetalleCargo($cargo);

		echo json_encode(array("msg" => $resultado));
	}


	public function updateCargo(){
		$id = $this->input->post("id");
		$nombre = $this->input->post("nombre");
		$jefeDirecto = $this->input->post("jefeDirecto");
		$lugarTrabajo = $this->input->post("lugarTrabajo");
		$jornadaTrabajo = $this->input->post("jornadaTrabajo");
		$diasTrabajo = $this->input->post("diasTrabajo");

		$resultado = $this->MantenedoresModel->updateCargo($id, $nombre, $jefeDirecto, $lugarTrabajo, $jornadaTrabajo, $diasTrabajo);
		echo json_encode(array("msg" => $resultado));
	}

	public function updateResponsabilidad(){
		$descripcionActual = $this->input->post("descripcionActual");
		$descripcionNueva = $this->input->post("descripcionNueva");
		$idCargo = $this->input->post("idCargo");
		var_dump("nueva: ",$descripcionNueva);
		var_dump("actual: ",$descripcionActual);
		var_dump("idCargo: ",$idCargo);

		$resultado = $this->MantenedoresModel->updateResponsabilidad($descripcionActual,$descripcionNueva,$idCargo);
		echo json_encode(array("msg" => $resultado));
	}








}
