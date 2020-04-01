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

	public function indexGestorContratos(){
		$this->load->view('template/menu');
		$this->load->view('gestorContratos');
	}

	public function getDetalleTrabajadorContrato(){
		$idTrabajador = $this->input->post("id");
		$resultado = $this->ContratosModel->getDetalleTrabajadorContrato($idTrabajador);
		echo json_encode( $resultado );
	}


	public function getContratosTrabajador(){
		$idTrabajador = $this->input->post("idTrabajador");

		$resultado = $this->ContratosModel->getContratosTrabajador( $idTrabajador );
		echo json_encode( array("msg" => $resultado) );
	}

	public function getListadoTrabajadoresContrato(){
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

	public function cargar_archivo(){
		 $config['upload_path']="index.php/uploads/contratos/";
		 $config['allowed_types']='pdf';
		 $config['encrypt_name'] = TRUE;

		 $this->load->library('upload',$config);

		 if ( ! $this->upload->do_upload('file')){
			 $out = array('error' => $this->upload->display_errors());
			 exit();
		 }
		 else{
			 //LA VARIABLE $OUT TRAE LOS SIGUIENTES DATOS
				 // file_name   => contrato_wom9.pdf
				 // file_type   => application/pdf
				 // file_path   => C:/xampp/htdocs/RRHH-FIRMA/uploads/
				 // full_path  => C:/xampp/htdocs/RRHH-FIRMA/uploads/contrato_wom9.pdf
				 // raw_name   => contrato_wom9
				 // orig_name   => contrato_wom.pdf
				 // client_name   => contrato wom.pdf
				 // file_ext   => .pdf
				 // file_size   => 76.42
				 // is_image   => false
				 // image_width   => no se
				 // image_height   => no se
				 // image_type   => no se
				 // image_size_str => no se

			 $out = array('upload_data' => $this->upload->data());
			 $cargaExitosa = true;

			 //CAPTURA DE DATOS

			 $nombreReal  =  	$out['upload_data']['orig_name'];
			 $nombreFinal =    $out['upload_data']['file_name'];
			 $ruta        =  	$out['upload_data']['file_path'];


			 date_default_timezone_set("America/Santiago");
			 $fechaActual = date("d-m-Y G:i:s");

			 //Obtengo y transformo fecha a formato dia-mes-año
			 $fechaInicio = date('d-m-Y',strtotime($this->input->post('fechaInicio')));
			 $fechaTermino = date('d-m-Y',strtotime($this->input->post('fechaTermino')));

			 //este valor esta insertado de forma oculta en el formulario
			 $idTrabajador = $this->input->post('labelTrabajador');


			 //AQUI COMIENZO ENVIO DE DATOS PARA EL MODELO Y PROCEDER EL INGRESO A BASE DE DATOS
			 $resultado = $this->ContratosModel->cargar_archivo( $nombreReal, $nombreFinal, $ruta, $fechaInicio, $fechaTermino, $fechaActual, $idTrabajador );


			 //REGRESO RESULTADO POSITIVO PARA DESPLEGAR MENSAJE DE EXITO
			 echo json_encode("ok");
			 exit();
		 }
	}

	public function descargarContrato($id){
		// importo libreria helper download
			$this->load->helper('download');

			// Solicito al modelo registro del contrato
			$contrato = $this->ContratosModel->getURLContrato($id);
			foreach ($contrato as $key => $value) {
				 $nombre = $value->atr_nombreDoc;
				 $nombreReal = $value->atr_nombreReal;
			}

			// uploads/contratos = ruta de la carpeta que contiene los documentos
			// $nombre = nombre asignado al documento en bd
			$file = 'uploads/contratos/'.$nombre;


			//si quiero el nombre por defecto al descargar -->  force_download($file, NULL);

			force_download($file, NULL);
    }


		public function getItemsContrato(){
				// Solicito al modelo registro del contrato
				$items = $this->ContratosModel->getItemsContrato();

				echo json_encode($items);
	    }









}
