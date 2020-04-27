<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class SesionesController extends CI_Controller {

	public function __construct()
	{
		parent::__construct();
		$this->load->model("SesionesModel");
		$this->load->library('encryption');
	}

	// CARGAR MANTENEDOR DE USUARIOS
	public function inicioUsuarios()
	{
		$this->load->view("template/menu");
		$this->load->view("mantenedores/usuarios");
	}

	public function agregarUsuario(){
		$nombre = $this->input->post("nombre");
		$perfil = $this->input->post("perfil");
		$correo = $this->input->post("correo");
		$clave = "grupofirma";

		$resultado = $this->SesionesModel->agregarUsuario($nombre, $correo, $clave, $perfil);
		echo json_encode($resultado);
	}

	public function getDetalleUsuario(){
		$idUsuario = $this->input->post("id");

		$resultado = $this->SesionesModel->getDetalleUsuario($idUsuario);
		echo json_encode($resultado);
	}

	public function cambiarEstado(){
		$valorEstado = $this->input->post("valorEstado");
		$usuario = $this->input->post("usuario");

		$resultado = $this->SesionesModel->cambiarEstado($valorEstado, $usuario);
		echo json_encode($resultado);
	}

	public function getListadoUsuarios(){
		$draw = intval($this->input->get("draw"));
		$start = intval($this->input->get("start"));
		$length = intval($this->input->get("length"));
		$books = $this->SesionesModel->getListadoUsuarios();
		$data = array();
		foreach ($books->result() as $r) {
				if ($r->atr_activo == "1") {
					$estado = "Activo";
				}else {
					$estado = 'Bloqueado';
				}
				$data[] = array(
					$r->cp_usuario,
					$r->atr_nombre,
					$r->atr_correo,
					$r->perfil,
					$estado
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


	// ESTE MÉTODO RECOLECTA TODOS LOS DATOS NECESARIOS PARA VALIDAR LA VISUALIZACION DE CADA VISTA Y
	// FUNCIONALIDAD EN CADA UNO.
	public function iniciarSesion() {
		$correo = $this->input->post("correo");
		$clave = $this->input->post("clave");

		$idUsuario = 0;

		$usuario = $this->SesionesModel->buscarUsuario($correo);
		 if (count($usuario) > 0) {
				foreach ($usuario as $u) {
	 				$idUsuario = $u->cp_usuario;
	 				$claveBD = $u->atr_clave;
					$idPerfil = $u->cf_perfil;
	 			}


	 			if ($claveBD == $clave ) {
	 				$permisos = $this->SesionesModel->listadoPermisos($idUsuario, $idPerfil);
					$menu = $this->SesionesModel->listadoModulos($idUsuario, $idPerfil);

	 				$data = array(
	 					"permisos"			=> $permisos,
	 					"usuario" 			=> $usuario,
						"menu"				  => $menu
	 				);

	 				$this->session->set_userdata("datos", $data);
	 				echo json_encode('ok');

	 			}else{
	 				echo json_encode("error cuek");
	 			}
		 }else{
			 echo json_encode("error");
		 }

	}

	// ESTE MÉTODO ENTREGA EL LISTADO DE PERMISOS QUE TIENE UN DETERMINADO USUARIO
	public function listadoPermisos($usuario){
		$resultado = $this->SesionesModel->listadoPermisos($usuario);
		echo json_encode($resultado);
	}


	// MÉTODO QUE LLENA SELECT DE PERFILES PARA CREAR USUARIO
	public function getSelectPerfiles(){
		$resultado = $this->SesionesModel->getSelectPerfiles();
		echo json_encode($resultado);
	}



	// MÉTODO QUE SE ACTIVA CADA VEZ QUE PRESIONAMOS CERRAR SESIÓN EN EL MENÚ
	public function cerrarSesion(){
			$this->session->sess_destroy();
			$this->index();
	}











}
