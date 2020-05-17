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

		$ano = $this->input->get("year");
		$mes = $this->input->get("mes");
		$diaTermino = $this->input->get("diaTermino");

		// var_dump('$año'.$ano);
		// var_dump('$mes'.$mes);
		// var_dump('$diaTermino'.$diaTermino);
		// exit();

		$draw = intval($this->input->get("draw"));
		$start = intval($this->input->get("start"));
		$length = intval($this->input->get("length"));

		$books = $this->PagosModel->getListadoPagosFinDeMes($ano, $mes, $diaTermino);
		// var_dump($books);
		// exit();
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
