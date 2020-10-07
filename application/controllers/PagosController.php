<?php
defined('BASEPATH') or exit('No direct script access allowed');

class PagosController extends CI_Controller
{

	public function __construct()
	{
		parent::__construct();
		$this->load->model("PagosModel");
	}

	public function inicioPlanillaPagos()
	{
		$this->load->view('template/menu');
		$this->load->view('planillaPagosTrabajadores');
	}

	public function getListadoPlanillaPagoMes()
	{
		$ano = $this->input->get("year");
		$mes = $this->input->get("mes");
		$diaTermino = $this->input->get("diaTermino");
		$empresa = $this->input->get("empresa");

		if ($mes == '01') {
			$detalle = 'PAGO ENERO ' . $ano;
		}

		switch ($mes) {
			case '01':
				$detalle = 'PAGO ENERO ' . $ano;
				break;
			case '02':
				$detalle = 'PAGO FEBRERO ' . $ano;
				break;
			case '03':
				$detalle = 'PAGO MARZO ' . $ano;
				break;
			case '04':
				$detalle = 'PAGO ABRIL ' . $ano;
				break;
			case '05':
				$detalle = 'PAGO MAYO ' . $ano;
				break;
			case '06':
				$detalle = 'PAGO JUNIO ' . $ano;
				break;
			case '07':
				$detalle = 'PAGO JULIO ' . $ano;
				break;
			case '08':
				$detalle = 'PAGO AGOSTO ' . $ano;
				break;
			case '09':
				$detalle = 'PAGO SEPTIEMBRE ' . $ano;
				break;
			case '10':
				$detalle = 'PAGO OCTUBRE ' . $ano;
				break;
			case '11':
				$detalle = 'PAGO NOVIEMBRE ' . $ano;
				break;
			case '12':
				$detalle = 'PAGO DICIEMBRE ' . $ano;
				break;
		}

		$draw = intval($this->input->get("draw"));
		$start = intval($this->input->get("start"));
		$length = intval($this->input->get("length"));

		//requiriendo valores de UF y UTM
		$decodeUF = json_decode(file_get_contents("https://mindicador.cl/api/uf/$diaTermino-$mes-$ano"));
		$valorUF = $decodeUF->serie[0]->valor;
		$decodeUTM = json_decode(file_get_contents("https://mindicador.cl/api/utm/$diaTermino-$mes-$ano"));
		$valorUTM = $decodeUTM->serie[0]->valor;



		$books = $this->PagosModel->getListadoPlanillaPagoMes($ano, $mes, $diaTermino, $empresa, $valorUF, $valorUTM);

		$data = array();
		foreach ($books as $r) {
			$data[] = array(
				$r->rutBeneficiario,
				$r->nombreBeneficiario,
				$r->monto,
				"Abono en cuenta",
				$r->banco,
				$r->tipoDeCuenta,
				$r->numeroDeCuenta,
				"FINANZAS@GRUPOFIRMA.CL",
				$r->nombreBeneficiario,
				$detalle,
				$detalle,
				$detalle
			);
		}

		$output = array(
			"draw" => $draw,
			"recordsTotal" => sizeof($data),
			"recordsFiltered" => sizeof($data),
			"data" => $data
		);
		echo json_encode($output);
		exit();
	}


	public function getListadoPagosFinDeMes()
	{
		$ano = $this->input->get("year");
		$mes = $this->input->get("mes");
		$diaTermino = $this->input->get("diaTermino");
		$empresa = $this->input->get("empresa");

		$historial = $this->PagosModel->getHistorialPagosMensuales($ano, $mes);

		//requiriendo valores de UF y UTM
		$decodeUF = json_decode(file_get_contents("	$diaTermino-$mes-$ano"));
		$valorUF = $decodeUF->serie[0]->valor;
		$decodeUTM = json_decode(file_get_contents("https://mindicador.cl/api/utm/$diaTermino-$mes-$ano"));
		$valorUTM = $decodeUTM->serie[0]->valor;

		$books = $this->PagosModel->getListadoPagosFinDeMes($ano, $mes, $diaTermino, $empresa, $valorUF, $valorUTM);

		if ($books == 'vacio') {
			exit();
		}

		$draw = intval($this->input->get("draw"));
		$start = intval($this->input->get("start"));
		$length = intval($this->input->get("length"));

		$data = array();
		foreach ($books as $r) {
			$estado = 'Pendiente';
			foreach ($historial as $h) {
				if ($h->cf_trabajador == $r->id) {
					$estado = 'Transferido';
				}
			}
			$data[] = array(
				$r->id,
				$r->fechaIngreso,
				$r->rut,
				$r->trabajador,
				$r->sueldo,
				$r->bonos,
				$r->adelanto,
				$r->prestamos,
				$r->inasistencia,
				$r->total,
				$estado
			);
		}

		$output = array(
			"draw" => $draw,
			"recordsTotal" => sizeof($data),
			"recordsFiltered" => sizeof($data),
			"data" => $data
		);
		echo json_encode($output);
		exit();
	}



	public function getDetallePagoTrabajador()
	{
		$idTrabajador = $this->input->post("idTrabajador");
		$ano = $this->input->post("year");
		$mes = $this->input->post("mes");
		$diaTermino = $this->input->post("diaTermino");
		//vht
		$decodeUF = json_decode(file_get_contents("https://mindicador.cl/api/uf/$diaTermino-$mes-$ano"));
		$valorUF = $decodeUF->serie[0]->valor;
		$decodeUTM = json_decode(file_get_contents("https://mindicador.cl/api/utm/$diaTermino-$mes-$ano"));
		$valorUTM = $decodeUTM->serie[0]->valor;

		$resultado = $this->PagosModel->getDetallePagoTrabajador($idTrabajador, $ano, $mes, $diaTermino, $valorUF, $valorUTM);
		echo json_encode(array("msg" => $resultado));
	}
	/* VHT */
	public function getGenerarLiquidacion()
	{
		$idTrabajador = $this->input->post("idTrabajador");
		$ano = $this->input->post("year");
		$mes = $this->input->post("mes");
		$diaTermino = $this->input->post("diaTermino");
		//requiriendo valores de UF y UTM
		$decodeUF = json_decode(file_get_contents("https://mindicador.cl/api/uf/$diaTermino-$mes-$ano"));
		$valorUF = $decodeUF->serie[0]->valor;
		$decodeUTM = json_decode(file_get_contents("https://mindicador.cl/api/utm/$diaTermino-$mes-$ano"));
		$valorUTM = $decodeUTM->serie[0]->valor;

		$resultado = $this->PagosModel->getGenerarLiquidacion($idTrabajador, $ano, $mes, $diaTermino, $valorUF, $valorUTM);
		echo json_encode(array("msg" => $resultado));
	}

	public function addHistorialPagosMensuales()
	{
		$monto = $this->input->post("monto");
		$idTrabajador = $this->input->post("idTrabajador");
		$banco = $this->input->post("banco");
		$fecha = $this->input->post("fecha");
		$resultado = $this->PagosModel->addHistorialPagosMensuales($monto, $idTrabajador, $fecha, $banco);
		echo json_encode($resultado);
	}


	public function cargarEmpresas()
	{
		$resultado = $this->PagosModel->cargarEmpresas();
		echo json_encode($resultado);
	}
}
