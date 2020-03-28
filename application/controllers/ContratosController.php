<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class ContratosController extends CI_Controller {

	public function __construct()
	{
		parent::__construct();
		$this->load->model("ContratosModel");
		$this->folder = 'uploads/';
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
				if ( ! $this->upload->do_upload('file'))
        {
                $out = array('error' => $this->upload->display_errors());
        }
        else
        {
                $out = array('upload_data' => $this->upload->data());
        }
				
				echo json_encode($out);
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
