<?php
defined('BASEPATH') or exit('No direct script access allowed');

class AdelantosController extends CI_Controller
{

	public function __construct()
	{
		parent::__construct();
		$this->load->model("AdelantosModel");
		$this->load->model("TrabajadorModel");
	}

	public function inicioAdelantos()
	{
		$this->load->view('template/menu');
		$this->load->view('adelantos');
	}

	public function addAdelanto()
	{
		$id = $this->input->post("idTrabajador");
		$banco = $this->input->post("banco");
		$tipoCuenta = $this->input->post("tipoCuenta");
		$numCuenta = $this->input->post("numCuenta");
		$monto = $this->input->post("monto");

		$ingreso = $this->AdelantosModel->addAdelanto($id, $banco, $tipoCuenta, $numCuenta, $monto);
		echo json_encode($ingreso);
	}

	public function getTrabajadoresSinAdelanto()
	{
		$trabajadores = $this->TrabajadorModel->getTrabajadores();
		$adelantos =  $this->AdelantosModel->getListadoAdelantos();

		$tieneAdelanto = false;

		foreach ($trabajadores as $key => $t) {
			foreach ($adelantos->result() as $key => $a) {
				if ($t->cp_trabajador == $a->cf_trabajador) {
					$tieneAdelanto = true;
				}
			}
			if ($tieneAdelanto == false) {
				$data[] = array(
					"cp_trabajador"         => $t->cp_trabajador,
					"nombre"             		=> $t->atr_nombres . " " . $t->atr_apellidos,
					"empresa"								=> $a->empresa,
					"id_empresa"						=> $a->id_empresa
				);
			} else {
				$tieneAdelanto = false;
			}
		}
		echo json_encode($data);
		exit();
	}

	public function getListadoAdelantos()
	{
		$estado = 'Pendiente';
		$historial = $this->AdelantosModel->getHistorialAdelantos();

		$draw = intval($this->input->get("draw"));
		$start = intval($this->input->get("start"));
		$length = intval($this->input->get("length"));
		$books = $this->AdelantosModel->getListadoAdelantos();

		$data = array();
		foreach ($books->result() as $r) {
			$nombreFinal = $r->nombres . "" . $r->apellidos;
			foreach ($historial->result() as $key => $h) {
				if ($h->cf_trabajador == $r->cp_trabajador) {
					$estado = 'Transferido';
				}
			}
			$monto = number_format($r->atr_monto, 0, ",", ".");
			$monto = '$' . $monto;
			$data[] = array(
				$r->cp_trabajador,
				$r->rutTrabajador,
				$r->nombres . " " . $r->apellidos,
				$r->empresa,
				$r->banco,
				$r->atr_tipoCuenta,
				$r->atr_numCuenta,
				$monto,
				$estado,
			);
			$estado = 'Pendiente';
		};
		$output = array(
			"draw" => $draw,
			"recordsTotal" => $books->num_rows(),
			"recordsFiltered" => $books->num_rows(),
			"data" => $data
		);
		echo json_encode($output);
		exit();
	}


	public function getDetalleAdelanto()
	{
		$id = $this->input->post("idAdelanto");
		$resultado = $this->AdelantosModel->getDetalleAdelanto($id);
		echo json_encode($resultado);
	}


	public function addHistorialAdelanto()
	{
		$monto = $this->input->post("monto");
		$idTrabajador = $this->input->post("idTrabajador");
		$banco = $this->input->post("banco");
		$fecha = $this->input->post("fecha");

		// var_dump($monto);
		// var_dump($idTrabajador);
		// var_dump($banco);
		// var_dump($fecha);
		// exit();

		$resultado = $this->AdelantosModel->addHistorialAdelanto($monto, $idTrabajador, $fecha, $banco);
		echo json_encode($resultado);
	}

	public function updateAdelanto()
	{
		$idTrabajador = $this->input->post("idTrabajador");
		$banco = $this->input->post("banco");
		$tipoCuenta = $this->input->post("tipoCuenta");
		$numeroCuenta = $this->input->post("numeroCuenta");
		$monto = $this->input->post("monto");

		str_replace(".", "", $monto);



		$resultado = $this->AdelantosModel->updateAdelanto($idTrabajador, $banco, $tipoCuenta, $numeroCuenta, $monto);
		echo json_encode(array("msg" => $resultado));
	}


	public function buscarBanco()
	{
		$nombre = $this->input->post("nombre");
		$resultado = $this->AdelantosModel->buscarBanco($nombre);
		echo json_encode($resultado);
	}
















	public function editarMarca()
	{
		$nombre = $this->input->post("nombre");
		$idMarca = $this->input->post("idMarca");

		$resultado = $this->MarcasModel->editarMarca($nombre, $idMarca);
		echo json_encode(array("msg" => $resultado));
	}

	public function getDetalleMarca()
	{
		$idMarca = $this->input->post("idMarca");

		$resultado = $this->MarcasModel->getDetalleMarca($idMarca);
		echo json_encode(array("msg" => $resultado));
	}

	public function getMarcas()
	{
		$resultado = $this->MarcasModel->getMarcas();
		echo json_encode($resultado);
	}
}
