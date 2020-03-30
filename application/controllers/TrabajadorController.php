<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class TrabajadorController extends CI_Controller {

	public function __construct()
	{
		parent::__construct();
		$this->load->model("TrabajadorModel");
	}

	public function index()
	{
		$this->load->view('template/menu');
		$this->load->view('trabajadores');

	}

	public function getTrabajadores(){
		$resultado = $this->TrabajadorModel->getTrabajadores();
		if ($resultado == []) {
			echo json_encode(array("msg" => "No se encuentran trabajadores en la base de datos"));
		} else {
			echo json_encode($resultado);
		}
	}

	public function addTrabajador(){
		$rut = $this->input->post("rut");
		$nombres = $this->input->post("nombres");
	 	$apellidos= $this->input->post("apellidos");
		$direccion = $this->input->post("direccion");
		$fecha = $this->input->post("fecha");
		$ciudad = $this->input->post("ciudad");
		$sucursal = $this->input->post("sucursal");
		$cargo = $this->input->post("cargo");

		$empresa= $this->input->post("empresa");
		$afp = $this->input->post("afp");
		$prevision = $this->input->post("prevision");
		$estadoContrato = $this->input->post("estadoContrato");
		$estadoCivil = $this->input->post("estadoCivil");
		$nacionalidad = $this->input->post("nacionalidad");


		$time = strtotime($fecha);
		$fechaNacimiento = date('d-m-Y', $time); //formateo de fecha

		$resultado = $this->TrabajadorModel->addTrabajador($rut,$nombres,$apellidos,$direccion,$fechaNacimiento,$ciudad,$sucursal,$cargo,$empresa,$afp, $prevision, $estadoContrato, $estadoCivil, $nacionalidad);
		echo json_encode(array("msg" => $resultado));

	}

	public function getCiudades(){
		$resultado = $this->TrabajadorModel->getCiudades();
		if ($resultado == []) {
			echo json_encode(array("msg" => "No se encuentran ciudades en la base de datos"));
		} else {
			echo json_encode($resultado);
		}
	}

	public function getCargos(){
		$resultado = $this->TrabajadorModel->getCargos();
		if ($resultado == []) {
			echo json_encode(array("msg" => "No se encuentran cargos en la base de datos"));
		} else {
			echo json_encode($resultado);
		}
	}

	public function getSucursales(){
		$resultado = $this->TrabajadorModel->getSucursales();
		if ($resultado == []) {
			echo json_encode(array("msg" => "No se encuentran cargos en la base de datos"));
		} else {
			echo json_encode($resultado);
		}
	}

	public function getEmpresas(){
		$resultado = $this->TrabajadorModel->getEmpresas();
		if ($resultado == []) {
			echo json_encode(array("msg" => "No se encuentran cargos en la base de datos"));
		} else {
			echo json_encode($resultado);
		}
	}

	public function getAFP(){
		$resultado = $this->TrabajadorModel->getAFP();
		if ($resultado == []) {
			echo json_encode(array("msg" => "No se encuentran cargos en la base de datos"));
		} else {
			echo json_encode($resultado);
		}
	}

	public function getPrevisiones(){
		$resultado = $this->TrabajadorModel->getPrevisiones();
		if ($resultado == []) {
			echo json_encode(array("msg" => "No se encuentran cargos en la base de datos"));
		} else {
			echo json_encode($resultado);
		}
	}

	public function getEstadosContrato(){
		$resultado = $this->TrabajadorModel->getEstadosContrato();
		if ($resultado == []) {
			echo json_encode(array("msg" => "No se encuentran cargos en la base de datos"));
		} else {
			echo json_encode($resultado);
		}
	}

	public function getEstadosCiviles(){
		$resultado = $this->TrabajadorModel->getEstadosCiviles();
		if ($resultado == []) {
			echo json_encode(array("msg" => "No se encuentran cargos en la base de datos"));
		} else {
			echo json_encode($resultado);
		}
	}

	public function getNacionalidades(){
		$resultado = $this->TrabajadorModel->getNacionalidades();
		if ($resultado == []) {
			echo json_encode(array("msg" => "No se encuentran cargos en la base de datos"));
		} else {
			echo json_encode($resultado);
		}
	}



	public function getListadoTrabajadores(){
    $draw = intval($this->input->get("draw"));
    $start = intval($this->input->get("start"));
    $length = intval($this->input->get("length"));
    $books = $this->TrabajadorModel->getListadoTrabajadores();
    $data = array();
    foreach ($books->result() as $r) {
        $data[] = array(
						$r->cp_trabajador,
            $r->atr_rut,
						// $r->atr_nombres.concat( $r->atr_apellidos ),
            $r->atr_nombres,
            $r->atr_apellidos,
						$r->empresa,
						$r->sucursal,
						$r->direccion,
  					$r->cargo,

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


	public function getDetalleTrabajador(){
		$idTrabajador = $this->input->post("id");

		$resultado = $this->TrabajadorModel->getDetalleTrabajador($idTrabajador);
		echo json_encode(array("msg" => $resultado));
	}

	public function getDetalleTrabajadorViewEdit(){
		$idTrabajador = $this->input->post("id");

		$resultado = $this->TrabajadorModel->getDetalleTrabajador($idTrabajador);
		echo json_encode(array("msg" => $resultado));
	}



	public function updateTrabajador(){
		$idTrabajador = $this->input->post("idTrabajador");
		$rut = $this->input->post("rut");
		$nombres = $this->input->post("nombres");
		$apellidos = $this->input->post("apellidos");
		$direccion = $this->input->post("direccion");
		$ciudad = $this->input->post("ciudad");
		$sucursal = $this->input->post("sucursal");
		$cargo = $this->input->post("cargo");
		$empresa = $this->input->post("empresa");
		$afp = $this->input->post("afp");
		$prevision = $this->input->post("prevision");
		$estadoContrato = $this->input->post("estadoContrato");
		$estadoCivil = $this->input->post("estadoCivil");
		$nacionalidad = $this->input->post("nacionalidad");
		$fechaNacimiento = $this->input->post("fechaNacimiento");



		$resultado = $this->TrabajadorModel->updateTrabajador( $idTrabajador,$rut, $nombres,$apellidos,$direccion,$ciudad,$sucursal,$cargo,$empresa,$afp,$prevision,$estadoContrato,$estadoCivil,$nacionalidad,$fechaNacimiento);
		echo json_encode(array("msg" => $resultado));
	}




}
