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

	public function getListadoPagosFinDeMes(){
		$draw = intval($this->input->get("draw"));
		$start = intval($this->input->get("start"));
		$length = intval($this->input->get("length"));
		$books = $this->PagosModel->getListadoPagosFinDeMes();
		$data = array();
		foreach ($books as $r) {
				$data[] = array(
					// '19.105.191-2',
					// 'Caterin Morales Diaz',
					// '500.000',
					// '74.000',
					// '35.000',
					// '539.000'
					$r->rut,
					$r->trabajador,
					$r->sueldo,
					$r->bonos,
					$r->prestamos,
					$r->total
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

































	public function addInasistencia(){
		$fecha = $this->input->post("fecha");
		$motivo = $this->input->post("motivo");
		$idTrabajador = $this->input->post("idTrabajador");

		$fecha = explode('-',$fecha);
		$fecha = $fecha[2].'-'.$fecha[1].'-'.$fecha[0];

		$resultado = $this->AsistenciaModel->addInasistencia($fecha, $motivo, $idTrabajador);
		echo json_encode( $resultado) ;
	}

	public function getInasistencias(){
		$resultado = $this->AsistenciaModel->getInasistencias();
		echo json_encode( $resultado) ;
	}


























	public function getListadoPrestamosTrabajador(){
		$draw = intval($this->input->get("draw"));
		$start = intval($this->input->get("start"));
		$length = intval($this->input->get("length"));
		$books = $this->PrestamosModel->getListadoPrestamosTrabajador();
		$data = array();
		foreach ($books->result() as $r) {
			$montoTotal = "$".$r->atr_montoTotal;
				$data[] = array(
					$r->cp_prestamo,
					$r->atr_rut,
					$r->atr_nombres." ".$r->atr_apellidos,
					$r->atr_fechaPrestamo,
					$r->atr_cantidadCuotas,
					$montoTotal
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


	public function obtenerRutTrabajador(){

		$idTrabajador = $this->input->post("idTrabajador");

		$resultado = $this->PrestamosModel->obtenerRutTrabajador($idTrabajador);
		echo json_encode( $resultado) ;
	}


	public function addPrestamo(){
		$montoTotal = $this->input->post("montoTotal");
		$totalCuotas = $this->input->post("totalCuotas");
		$idTrabajador = $this->input->post("idTrabajador");

		$resultado = $this->PrestamosModel->addPrestamo($montoTotal,$totalCuotas,$idTrabajador);
		echo json_encode( $resultado) ;
	}

	public function addDetallePrestamo(){
		$idTrabajador = $this->input->post("idTrabajador");
		$numCuota = $this->input->post("numCuota");
		$montoDetalle = $this->input->post("montoDetalle");
		$fechaDetalle = $this->input->post("fechaDetalle");
		$cfPrestamo = $this->input->post("cfPrestamo");



		$resultado = $this->PrestamosModel->addDetallePrestamo($idTrabajador,$numCuota,$montoDetalle,$fechaDetalle,$cfPrestamo);
		echo json_encode( $resultado) ;
	}


	public function getDetallePrestamo(){
		$idPrestamo = $this->input->post("idPrestamo");

		$resultado = $this->PrestamosModel->getDetallePrestamo($idPrestamo);
		echo json_encode( $resultado) ;
	}


	public function editarDetalleDePrestamo(){
		$idPrestamo = $this->input->post("idPrestamo");
		$numCuota = $this->input->post("numCuota");
		$montoCuota = $this->input->post("montoCuota");
		$fechaPago = $this->input->post("fechaPago");

		$resultado = $this->PrestamosModel->editarDetalleDePrestamo($idPrestamo,$numCuota,$montoCuota,$fechaPago);
		echo json_encode( $resultado) ;
	}


































}
