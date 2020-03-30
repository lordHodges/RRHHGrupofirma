<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class ContratosController extends CI_Controller {

	public function __construct()
	{
		parent::__construct();
		$this->load->model("ContratosModel");
		// $this->folder = 'uploads/';
	}

	public function index()
	{
		$this->load->view('template/menu');
		$this->load->view('contratos');
	}

	public function getContratosTrabajador()
	{
		$idTrabajador = $this->input->post("idTrabajador");

		$resultado = $this->ContratosModel->getContratosTrabajador( $idTrabajador );
		echo json_encode( array("msg" => $resultado) );
	}

	public function getListadoTrabajadoresContrato()
	{
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
			$config['upload_path']="./uploads/";
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

	public function cargar_archivo_(){
		 $arraykey = array("NR70RG", "LSL74T", "42IIQW", "VH6MPA","Z_0RTN","VF88JP0","WT96QF", "E077ES","IF72LE","DG62XK","VP59FY","TJ12BX","TD13MX");

		 $variable = $this->input->post('file');
		 echo '<pre>';
		 var_dump($variable);
		 // echo json_encode($arraykey);

		 // exit;
		 // GENERAR KEY
		 $arrayN=rand(0,12);
		 $key=rand(1,999999);

		 $nombreDoc = $arraykey[$arrayN]."".$key;

		 //INSERTAR DATOS EN FA_CONTRATO

		 // $mi_archivo = 'mi_archivo';
		 $mi_archivo = 'file';
		 $config['upload_path'] = "uploads/";
		 $config['file_name'] = $nombreDoc;
		 $config['allowed_types'] = "pdf";
		 $config['max_size'] = "50000"; //kb
		 $config['max_width'] = "2000";
		 $config['max_height'] = "2000";

		 $this->load->library('upload', $config);

		 //do_upload es para cargar el archivo, regresa true o false.
		 if (!$this->upload->do_upload('file')) {
				 //*** ocurrio un error
				 echo json_encode( array("msg" => $this->upload->display_errors() ) );
		 }else{
			 $this->upload->data();
			 echo json_encode( array("msg" => "ok") );
		 }


		 // echo "<script languaje='javascript' type='text/javascript'> window.close(); </script";
		 // echo "ok";
		 // print_r($result['file_name']);
	}

	public function descargarContrato($id){
				// importo libreria helper download
				$this->load->helper('download');

				// Solicito al modelo registro del contrato
				$contrato = $this->ContratosModel->getURLContrato($id);
				foreach ($contrato as $key => $value) {
					 $nombre = $value->atr_documento;
				}

				// armo la ubicación en que se encuentra el archivo junto con su nombre
				// uploads = nombre de la carpeta
				// $nombre = nombre asignado al documento en bd
				$file = 'uploads/'.$nombre;


				//si quiero el nombre por defecto al descargar
				// force_download($file, NULL);

				//si quiero asignar el nombre manualmente
				$name = "".$nombre;
				force_download($name, $file);

    }








}
