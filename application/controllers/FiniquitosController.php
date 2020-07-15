<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class FiniquitosController extends CI_Controller {

	public function __construct()
	{
		parent::__construct();
		$this->load->model("FiniquitosModel");
	}

	public function inicioFiniquitos(){
		$this->load->view('template/menu');
		$this->load->view('finiquitos');
	}

	public function getFiniquitosTrabajador(){
		$idTrabajador = $this->input->post("idTrabajador");

		$resultado = $this->FiniquitosModel->getFiniquitosTrabajador( $idTrabajador );
		echo json_encode( array("msg" => $resultado) );
	}

	public function descargarFiniquito($id){
		// importo libreria helper download
			$this->load->helper('download');

		// Solicito al modelo registro del contrato
		$finiquito = $this->FiniquitosModel->getURLFiniquito($id);
		foreach ($finiquito as $key => $value) {
				$nombre = $value->atr_nombreDoc;
				$nombreReal = $value->atr_nombreReal;
		}

		// uploads/contratos = ruta de la carpeta que contiene los documentos
		// $nombre = nombre asignado al documento en bd
		$file = 'uploads/finiquitos/'.$nombre;

		//si quiero el nombre por defecto al descargar -->  force_download($file, NULL);
		force_download($file, NULL);
	}


	public function cargar_finiquito(){
		$config['upload_path']="./uploads/finiquitos/";
		$config['allowed_types']='pdf|jpg|jpeg|png';
		$config['encrypt_name'] = TRUE;
		$config['max_size'] = "200000";
		$config['max_width'] = "2000";
		$config['max_height'] = "2000";

		$this->load->library('upload',$config);

		if ( ! $this->upload->do_upload('file')){
			$out = array('error' => $this->upload->display_errors());
			// var_dump("algun error: ",$out);
			exit();
			//LA VARIABLE $OUT TRAE LOS SIGUIENTES DATOS
				// file_name   => contrato_wom9.pdf
				// file_type   => application/pdf
				// file_path   => C:/xampp/htdocs/GRUPOFIRMA/uploads/
				// full_path  => C:/xampp/htdocs/GRUPOFIRMA/uploads/contrato_wom9.pdf
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
		}
		else{
				$out = array('upload_data' => $this->upload->data());
				$cargaExitosa = true;

				//CAPTURA DE DATOS

				$nombreReal  =  	$out['upload_data']['orig_name'];
				$nombreFinal =   $out['upload_data']['file_name'];
				$ruta        =  	$out['upload_data']['file_path'];


				date_default_timezone_set("America/Santiago");
				$fechaCarga = date("d-m-Y G:i:s");

				//Obtengo y transformo fecha a formato dia-mes-año
				$fecha = date('Y-m-d',strtotime($this->input->post('fecha')));
				$total = $this->input->post('total');

				// valor a buscar - valor por el que se reemplazara - string sobre el que se hará todo.
				$total = str_replace(".", "", $total);


				//este valor esta insertado de forma oculta en el formulario
				$idTrabajador = $this->input->post('labelTrabajador');


				//AQUI COMIENZO ENVIO DE DATOS PARA EL MODELO Y PROCEDER EL INGRESO A BASE DE DATOS
				$resultado = $this->FiniquitosModel->cargar_finiquito( $fecha, $fechaCarga, $total, $nombreReal, $nombreFinal, $ruta, $monto, $idTrabajador );

				//REGRESO RESULTADO POSITIVO PARA DESPLEGAR MENSAJE DE EXITO
				echo json_encode( $resultado );
				exit();
		}
   }





































	public function getListadoAFP(){
		$draw = intval($this->input->get("draw"));
		$start = intval($this->input->get("start"));
		$length = intval($this->input->get("length"));
		$books = $this->MantenedoresModel->getListadoAFP();
		$data = array();
		foreach ($books->result() as $r) {
				$data[] = array(
					$r->cp_afp,
					$r->atr_nombre,
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

	public function addAFP(){
		$nombre = $this->input->post("nombre");

		$resultado = $this->MantenedoresModel->addAFP($nombre);
		echo json_encode(array("msg" => $resultado));
	}

	public function getDetalleAFP(){
		$afp = $this->input->post("afp");

		$resultado = $this->MantenedoresModel->getDetalleAFP($afp);
		echo json_encode(array("msg" => $resultado));
	}

	public function updateAFP(){
		$id = $this->input->post("idAFP");
		$afpNuevo = $this->input->post("nombreNuevo");
		$resultado = $this->MantenedoresModel->updateAFP($afpNuevo, $id);
		echo json_encode(array("msg" => $resultado));
	}







}
