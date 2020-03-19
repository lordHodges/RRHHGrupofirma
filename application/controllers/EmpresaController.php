<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class EmpresaController extends CI_Controller {

	public function __construct()
	{
		parent::__construct();
		$this->load->model("MantenedoresModel");
	}

	public function index()
	{
		$this->load->view('template/menu');
		$this->load->view('mantenedores/empresa');
	}

	public function getListadoEmpresas(){
		$draw = intval($this->input->get("draw"));
		$start = intval($this->input->get("start"));
		$length = intval($this->input->get("length"));
		$books = $this->MantenedoresModel->getListadoEmpresas();
		$data = array();
		foreach ($books->result() as $r) {
				$data[] = array(
					$r->cp_empresa,
					$r->atr_nombre,
					$r->atr_run,
					$r->atr_domicilio,
					$r->ciudad,
					$r->atr_representante,
					$r->atr_cedula_representante
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

	public function addEmpresa(){
		$nombre = $this->input->post("nombre");
		$rut = $this->input->post("rut");
		$representante = $this->input->post("representante");
		$cedula_representante = $this->input->post("cedula_representante");
		$domicilio = $this->input->post("domicilio");
		$ciudad = $this->input->post("ciudad");

		$resultado = $this->MantenedoresModel->addEmpresa($nombre,$rut,$representante,$cedula_representante,$domicilio,$ciudad);
		echo json_encode(array("msg" => $resultado));
	}

	public function getDetalleEmpresa(){
		$idEmpresa = $this->input->post("idEmpresa");

		$resultado = $this->MantenedoresModel->getDetalleEmpresa($idEmpresa);
		echo json_encode(array("msg" => $resultado));
	}

	public function updateEmpresa(){
		$esNuevo = $this->input->post("esNuevo");
		$idEmpresa = $this->input->post("idEmpresa");
		$nombre = $this->input->post("nombre");
		$rut = $this->input->post("rut");
		$representante = $this->input->post("representante");
		$cedula_representante = $this->input->post("cedula_representante");
		$domicilio = $this->input->post("domicilio");
		$ciudad = $this->input->post("ciudad");

		$resultado = $this->MantenedoresModel->updateEmpresa($esNuevo,$idEmpresa,$nombre,$rut,$representante,$cedula_representante,$domicilio,$ciudad);
		echo json_encode(array("msg" => $resultado));
	}



}
