<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class TransferenciasController extends CI_Controller {

	public function __construct()
	{
		parent::__construct();
		$this->load->model("TransferenciasModel");
	}

	public function index()
	{
		$this->load->view('template/menu');
		$this->load->view('transferencias');
	}

	public function cargar_comprobante(){
		 $config['upload_path']="./uploads/transferencias/";
		 $config['allowed_types']='pdf|jpg|jpeg|png';
		 $config['encrypt_name'] = TRUE;
		 $config['max_size'] = "50000";
		 $config['max_width'] = "2000";
		 $config['max_height'] = "2000";

		 $this->load->library('upload',$config);

		 if ( ! $this->upload->do_upload('file')){
			 $out = array('error' => $this->upload->display_errors());
			 exit();
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
		 }
		 else{
				 $out = array('upload_data' => $this->upload->data());
				 $cargaExitosa = true;

				 //CAPTURA DE DATOS

				 $nombreReal  =  	$out['upload_data']['orig_name'];
				 $nombreFinal =   $out['upload_data']['file_name'];
				 $ruta        =  	$out['upload_data']['file_path'];


				 date_default_timezone_set("America/Santiago");
				 $fechaActual = date("d-m-Y G:i:s");

				 //Obtengo y transformo fecha a formato dia-mes-año
				 $fechaTransferencia = date('d-m-Y',strtotime($this->input->post('fechaTransferencia')));
				 $monto = $this->input->post('monto');


				 //este valor esta insertado de forma oculta en el formulario
				 $idTrabajador = $this->input->post('labelTrabajador');
				 $banco = $this->input->post('getSelectBanco');
				 

				 $motivo = $this->input->post('getSelectMotivo');
				 if($motivo == ""){
					 $motivo = $this->input->post('otroMotivo');
				 }

				 //AQUI COMIENZO ENVIO DE DATOS PARA EL MODELO Y PROCEDER EL INGRESO A BASE DE DATOS
				 $resultado = $this->TransferenciasModel->cargar_comprobante( $motivo, $banco, $nombreReal, $nombreFinal, $ruta, $fechaTransferencia, $monto, $fechaActual, $idTrabajador );

				 //REGRESO RESULTADO POSITIVO PARA DESPLEGAR MENSAJE DE EXITO
				 echo json_encode("ok");
				 exit();

		 }
	}

	public function getBancos(){
		$resultado = $this->TransferenciasModel->getBancos();
		echo json_encode($resultado);
	}

	public function getURLTransferencia(){
		$idTrabajador = $this->input->post("idTrabajador");

		$resultado = $this->TransferenciasModel->getTransferenciasTrabajador( $idTrabajador );
		echo json_encode( array("msg" => $resultado) );
	}



	public function getTransferenciasTrabajador(){
		$idTrabajador = $this->input->post("idTrabajador");


		$resultado = $this->TransferenciasModel->getTransferenciasTrabajador( $idTrabajador );
		echo json_encode( array("msg" => $resultado) );
	}

	public function descargarComprobante($idTransferencia){
	// importo libreria helper download
		$this->load->helper('download');

		// Solicito al modelo registro de la transferencia
		$transferencia = $this->TransferenciasModel->getURLTransferencia($idTransferencia);

		foreach ($transferencia as $key => $value) {
			 $nombre = $value->atr_nombreDoc;
			 $nombreReal = $value->atr_nombreReal;
		}

		// uploads/transferencias = ruta de la carpeta que contiene los documentos
		// $nombre = nombre asignado al documento en bd
		$file = 'uploads/transferencias/'.$nombre;


		//si quiero el nombre por defecto al descargar -->  force_download($file, NULL);

		force_download($file, NULL);
  }






}
