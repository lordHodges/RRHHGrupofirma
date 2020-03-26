<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class ContratosController extends CI_Controller {

	public function __construct()
	{
		parent::__construct();
		$this->load->model("ContratosModel");
	}

	public function index()
	{
		$this->load->view('template/menu');
		$this->load->view('contratos');
	}

	public function getContratosTrabajador()
	{
		$idTrabajador = $this->input->post("idTrabajador");

		$resultado = $this->ContratosModel->getContratosTrabajador( $idTrabajador );
		echo json_encode( array("msg" => $resultado) );
	}

	public function getListadoTrabajadoresContrato()
	{
		$draw = intval($this->input->get("draw"));
		$start = intval($this->input->get("start"));
		$length = intval($this->input->get("length"));

		$books = $this->ContratosModel->getListadoTrabajadoresContrato();
		$data = array();
		foreach ($books->result() as $r) {
				$nombreCompleto = $r->atr_nombres." ".$r->atr_apellidos;
				$data[] = array(
					$r->cp_trabajador,
					$r->atr_rut,
					$nombreCompleto,
					$r->estado,
					$r->empresa
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








}
