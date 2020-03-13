<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class TrabajadorController extends CI_Controller {

	public function __construct()
	{
		parent::__construct();
		$this->load->model("trabajadorModel");
	}

	public function index()
	{
		$this->load->view('template/menu');
		$this->load->view('trabajadores');

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

		$resultado = $this->trabajadorModel->addTrabajador($rut,$nombres,$apellidos,$direccion,$fechaNacimiento,$ciudad,$sucursal,$cargo,$empresa,$afp, $prevision, $estadoContrato, $estadoCivil, $nacionalidad);
		echo json_encode(array("msg" => $resultado));

	}

	public function getCiudades(){
		$resultado = $this->trabajadorModel->getCiudades();
		if ($resultado == []) {
			echo json_encode(array("msg" => "No se encuentran ciudades en la base de datos"));
		} else {
			echo json_encode($resultado);
		}
	}

	public function getCargos(){
		$resultado = $this->trabajadorModel->getCargos();
		if ($resultado == []) {
			echo json_encode(array("msg" => "No se encuentran cargos en la base de datos"));
		} else {
			echo json_encode($resultado);
		}
	}

	public function getSucursales(){
		$resultado = $this->trabajadorModel->getSucursales();
		if ($resultado == []) {
			echo json_encode(array("msg" => "No se encuentran cargos en la base de datos"));
		} else {
			echo json_encode($resultado);
		}
	}

	public function getEmpresas(){
		$resultado = $this->trabajadorModel->getEmpresas();
		if ($resultado == []) {
			echo json_encode(array("msg" => "No se encuentran cargos en la base de datos"));
		} else {
			echo json_encode($resultado);
		}
	}

	public function getAFP(){
		$resultado = $this->trabajadorModel->getAFP();
		if ($resultado == []) {
			echo json_encode(array("msg" => "No se encuentran cargos en la base de datos"));
		} else {
			echo json_encode($resultado);
		}
	}

	public function getPrevisiones(){
		$resultado = $this->trabajadorModel->getPrevisiones();
		if ($resultado == []) {
			echo json_encode(array("msg" => "No se encuentran cargos en la base de datos"));
		} else {
			echo json_encode($resultado);
		}
	}

	public function getEstadosContrato(){
		$resultado = $this->trabajadorModel->getEstadosContrato();
		if ($resultado == []) {
			echo json_encode(array("msg" => "No se encuentran cargos en la base de datos"));
		} else {
			echo json_encode($resultado);
		}
	}

	public function getEstadosCiviles(){
		$resultado = $this->trabajadorModel->getEstadosCiviles();
		if ($resultado == []) {
			echo json_encode(array("msg" => "No se encuentran cargos en la base de datos"));
		} else {
			echo json_encode($resultado);
		}
	}

	public function getNacionalidades(){
		$resultado = $this->trabajadorModel->getNacionalidades();
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
    $books = $this->trabajadorModel->getListadoTrabajadores();
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
		$id = $this->input->post("id");
		$resultado = $this->trabajadorModel->getDetalleTrabajador($id);
		echo json_encode(array("msg" => $resultado));
	}




}
