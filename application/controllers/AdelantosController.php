<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class AdelantosController extends CI_Controller {

	public function __construct(){
		parent::__construct();
		$this->load->model("AdelantosModel");
	}

	public function inicioAdelantos(){
		$this->load->view('template/menu');
		$this->load->view('adelantos');
	}

	public function getListadoAdelantos(){
		$draw = intval($this->input->get("draw"));
		$start = intval($this->input->get("start"));
		$length = intval($this->input->get("length"));
		$books = $this->AdelantosModel->getListadoAdelantos();
		$data = array();
		foreach ($books->result() as $r) {
				$nombreFinal = $r->nombres."".$r->apellidos;
				$data[] = array(
					$r->cp_adelanto,
					$r->rutTrabajador,
					$r->nombres." ".$r->apellidos,
					$r->banco,
					$r->atr_tipoCuenta,
					$r->atr_numCuenta,
					"$".$r->atr_monto,
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

		 // $output = $this->AdelantosModel->getListadoAdelantos();
		 // echo json_encode( $output );
	}


	public function getDetalleAdelanto(){
		$id = $this->input->post("idAdelanto");
		$resultado = $this->AdelantosModel->getDetalleAdelanto($id);
		echo json_encode($resultado);
	}
















	public function editarMarca(){
		$nombre = $this->input->post("nombre");
		$idMarca = $this->input->post("idMarca");

		$resultado = $this->MarcasModel->editarMarca($nombre,$idMarca);
		echo json_encode(array("msg" => $resultado));
	}

	public function getDetalleMarca(){
		$idMarca = $this->input->post("idMarca");

		$resultado = $this->MarcasModel->getDetalleMarca($idMarca);
		echo json_encode(array("msg" => $resultado));
	}

	public function getMarcas(){
		$resultado = $this->MarcasModel->getMarcas();
		echo json_encode($resultado);
	}










































}
