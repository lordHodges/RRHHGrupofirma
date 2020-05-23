<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class PagosController extends CI_Controller {

	public function __construct()
	{
		parent::__construct();
		$this->load->model("PagosModel");
	}

	public function inicioPlanillaPagos()
	{
		$this->load->view('template/menu');
		$this->load->view('planillaPagosTrabajadores');
	}

	public function getListadoPlanillaPagoMes(){
		$ano = $this->input->get("year");
		$mes = $this->input->get("mes");
		$diaTermino = $this->input->get("diaTermino");
		$empresa = $this->input->get("empresa");

		$draw = intval($this->input->get("draw"));
		$start = intval($this->input->get("start"));
		$length = intval($this->input->get("length"));

		$books = $this->PagosModel->getListadoPlanillaPagoMes($ano, $mes, $diaTermino, $empresa);

		$data = array();
		foreach ($books as $r) {
				$data[] = array(
					$r->rutBeneficiario,
					$r->nombreBeneficiario,
					$r->monto,
					"Abono en cuenta",
					$r->banco,
					$r->tipoDeCuenta,
					$r->numeroDeCuenta,
					"FINANZAS@GRUPOFIRMA.CL",
					$r->nombreBeneficiario,
					"PAGO MENSUAL MAYO 2020",
					"PAGO MENSUAL MAYO 2020",
					"PAGO MENSUAL MAYO 2020"
				);
		}

		$output = array(
			"draw" => $draw,
			"recordsTotal" => sizeof($data),
			"recordsFiltered" => sizeof($data),
			"data" => $data
		);
		echo json_encode($output);
		exit();
}


	public function getListadoPagosFinDeMes(){
		$ano = $this->input->get("year");
		$mes = $this->input->get("mes");
		$diaTermino = $this->input->get("diaTermino");
		$empresa = $this->input->get("empresa");

		$draw = intval($this->input->get("draw"));
		$start = intval($this->input->get("start"));
		$length = intval($this->input->get("length"));

		$books = $this->PagosModel->getListadoPagosFinDeMes( $ano, $mes, $diaTermino, $empresa);

		$data = array();
		foreach ($books as $r) {
				$data[] = array(
					$r->id,
					$r->rut,
					$r->trabajador,
					$r->sueldo,
					$r->bonos,
					$r->adelanto,
					$r->prestamos,
					$r->inasistencia,
					$r->total
				);
		}

		$output = array(
			"draw" => $draw,
			"recordsTotal" => sizeof($data),
			"recordsFiltered" => sizeof($data),
			"data" => $data
		);
		echo json_encode($output);
		exit();
}



	public function getDetallePagoTrabajador(){
		$idTrabajador = $this->input->post("idTrabajador");
		$ano = $this->input->post("year");
		$mes = $this->input->post("mes");
		$diaTermino = $this->input->post("diaTermino");


		$resultado = $this->PagosModel->getDetallePagoTrabajador($idTrabajador,$ano,$mes,$diaTermino);
		echo json_encode( array( "msg" => $resultado)) ;
	}


	public function addHistorialPagosMensuales(){
		$monto = $this->input->post("monto");
		$idTrabajador = $this->input->post("idTrabajador");
		$banco = $this->input->post("banco");
		$fecha = $this->input->post("fecha");
		$resultado = $this->PagosModel->addHistorialPagosMensuales($monto, $idTrabajador,$fecha,$banco);
		echo json_encode($resultado);
	}


	public function cargarEmpresas(){
		$resultado = $this->PagosModel->cargarEmpresas($id);
		echo json_encode($resultado);
	}















































































}
