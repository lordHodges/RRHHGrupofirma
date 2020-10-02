<?php

defined('BASEPATH') or exit('No direct script access allowed');

class PagosModel extends CI_Model
{
	/* $decodeUF = json_decode(file_get_contents("https://mindicador.cl/api/uf/$fechaOrd[2]-$fechaOrd[1]-$fechaOrd[0]"));
  $valorUF = $decodeUF->serie[0]->valor;
  $decodeUTM = json_decode(file_get_contents("https://mindicador.cl/api/utm/$fechaOrd[2]-$fechaOrd[1]-$fechaOrd[0]"));
  $valorUTM = $decodeUTM->serie[0]->valor;  */

	public function __construct()
	{
		parent::__construct();
	}

	function getHistorialPagosMensuales($ano, $mes)
	{
		$this->db->select("pm.cf_trabajador");
		$this->db->from("fa_historial_pagos_mensuales pm");
		$this->db->where("pm.atr_mes", $mes);
		$this->db->where("pm.atr_ano", $ano);
		return $this->db->get()->result();
	}

	function addHistorialPagosMensuales($monto, $idTrabajador, $fecha, $banco)
	{
		$fechaActual = date("Y-m-d");

		$mes = date("m");
		$ano = date("Y");

		$monto = str_replace(".", "", $monto);

		$this->db->select(" t.cp_transferencia ");
		$this->db->from("fa_transferencia t");
		$this->db->where("t.atr_fecha", $fecha);
		$this->db->where("t.cf_banco", $banco);
		$this->db->where("t.cf_trabajador", $idTrabajador);
		$this->db->where("t.atr_monto", $monto);
		$transferencias = $this->db->get()->result();

		foreach ($transferencias as $key => $t) {
			$idTransferencia = $t->cp_transferencia;
		}

		$this->db->select("doc.cp_documento ");
		$this->db->from("fa_documento doc");
		$this->db->where("doc.cf_transferencia", $idTransferencia);
		$documento = $this->db->get()->result();

		foreach ($documento as $key => $doc) {
			$idDocumento = $doc->cp_documento;
		}

		$data = array(
			"atr_mes"             => $mes,
			"atr_ano"             => $ano,
			"atr_monto"           => $monto,
			"cf_transferencia"    => $idTransferencia,
			"cf_documento"        => $idDocumento,
			"cf_trabajador"       => $idTrabajador
		);

		$resultado =  $this->db->insert("fa_historial_pagos_mensuales", $data);
		if ($resultado) {
			registrarActividad();
			return 'ok';
		} else {
			return 'error';
		}
	}



	function getListadoPlanillaPagoMes($ano, $mes, $diaTermino, $empresa, $valorUF, $valorUTM)
	{

		$fechaInicio = $ano . '-' . $mes . '-01';
		$fechaTermino = $ano . '-' . $mes . '-' . $diaTermino;

		$anoPrestamo = $ano;

		if ($mes == '12') {
			$mesPrestamo = '01';
			$anoPrestamo = $ano + 1;
		} else {
			if ($mes == '01') {
				$mesPrestamo = '12';
				$anoPrestamo = $ano - 1;
			} else {
				$arrayMes = substr($mes, 0);
				$mesPrestamo = $arrayMes + 1;
				$mesPrestamo = '0' . $mesPrestamo;
			}
		}


		if ($mesPrestamo == '04' || $mesPrestamo == '06' || $mesPrestamo == '09' || $mesPrestamo == '11') {
			$diaTerminoPrestamo = 30;
		} else {
			if ($mesPrestamo == '01' || $mesPrestamo == '03' || $mesPrestamo == '05' || $mesPrestamo == '07' || $mesPrestamo == '08' || $mesPrestamo == '10' || $mesPrestamo == '12') {
				$diaTerminoPrestamo = 31;
			}
		}


		$fechaInicioPrestamo = $anoPrestamo . '-' . $mesPrestamo . '-01';
		$fechaTerminoPrestamo = $anoPrestamo . '-' . $mesPrestamo . '-' . $diaTerminoPrestamo;


		$this->db->select(" t.cp_trabajador, t.atr_nombres, t.atr_apellidos, t.atr_rut, t.cf_cargo,r.atr_sueldoMensual,
		t.atr_plan,
		t.atr_cargas,
		e.cp_estado as estado,
		a.atr_nombre as afp,
		a.tasa as tasaAfp,
		p.atr_nombre as prevision,
		p.tasa as tasaPrevision,
		");
		$this->db->from("fa_trabajador t");
		$this->db->join("fa_estado e", "t.cf_estado = e.cp_estado");
		$this->db->join("fa_afp a", "t.cf_afp = a.cp_afp");
		$this->db->join("fa_prevision p", "t.cf_prevision = p.cp_prevision");
		$this->db->join("fa_remuneracion r", "r.cf_trabajador = t.cp_trabajador");
		$this->db->where('t.cf_estado != 6');
		$this->db->where('t.cf_empresa', $empresa);
		$arrayTrabajadores = $this->db->get()->result();


		// comienzo de for al arreglo de trabajadores contratados activos.
		foreach ($arrayTrabajadores as $key => $t) {

			$idTrabajador = $t->cp_trabajador;


			// CONSULTA DE LAS REMUNERACIONES QUE TIENE DETERMINADO CARGO
			$this->db->select("r.atr_sueldoMensual, r.atr_colacion, r.atr_movilizacion, r.atr_asistencia");
			$this->db->from("fa_remuneracion r");
			$this->db->where("r.cf_trabajador", $t->cp_trabajador);

			$remuneracionTrabajador = $this->db->get()->result();

			$sueldo = $t->atr_sueldoMensual;


			// CONSULTAR SI EL TRABAJADOR FALTO O NO PARA DESCONTAR EL BONO DE ASISTENCIA Y PUNTUALIDAD
			$this->db->select(" i.atr_motivo ");
			$this->db->from("fa_inasistencia i");
			$this->db->where("i.cf_trabajador", $t->cp_trabajador);
			$this->db->where('i.atr_start >= ', $fechaInicio);
			$this->db->where('i.atr_start <= ', $fechaTermino);
			$diasInsistencia = $this->db->get()->result();

			$this->db->select(" co.atr_fechaInicio as fechaIngreso ");
			$this->db->from("fa_contrato co");
			$this->db->where("co.cf_trabajador", $t->cp_trabajador);
			$contratoTrabajador = $this->db->get()->result();

			foreach ($contratoTrabajador as $key => $co) {
				$fechaIngreso = $co->fechaIngreso;
			}

			// CONSULTA DE LAS REMUNERACIONES EN EL MES SOLICITADO
			foreach ($remuneracionTrabajador as $key => $r) {

				$colacion = str_replace(".", "", $r->atr_colacion);
				$movilizacion = str_replace(".", "", $r->atr_movilizacion);




				$bonoBaseColacion = $r->atr_colacion;
				$bonoBaseMovilizacion = $r->atr_movilizacion;
				$bonoBaseAsistencia = $r->atr_asistencia;

				$bonoAsistencia = $r->atr_asistencia;

				$cont = 0;

				foreach ($diasInsistencia as $key => $dias) {
					$cont = $cont + 1;
				}

				$colacionDiaria = $colacion / 30;
				$movilizacionDiaria = $movilizacion / 30;
				$diasPago = 30 - $cont;

				$fechaConsulta = $fechaTermino;
				$comprobacion = descuentaAsistencia($fechaIngreso, $fechaConsulta);

				if ($cont > 0) {
					if ($comprobacion) {
						$bonoAsistencia = round(($bonoAsistencia / 30) * $diasPago);
					} else {
						$bonoAsistencia = 0;
					}

					$colacion = $colacionDiaria * $diasPago;
					$movilizacion = $movilizacionDiaria * $diasPago;

					$bonos = $colacion + $movilizacion;
				} else {

					$bonos = $colacion + $movilizacion;
				}
			}


			// CONSULTA DE LOS ADELANTOS EN EL MES CONSULTADO
			$this->db->select("t.atr_monto");
			$this->db->from("fa_documento d");
			$this->db->join("fa_transferencia t ", "d.cf_transferencia = t.cp_transferencia");
			$this->db->where("d.atr_tipo", 'Adelanto');
			$this->db->where("d.cf_trabajador", $t->cp_trabajador);
			$this->db->where('d.atr_fechacronologica >= ', $fechaInicio);
			$this->db->where('d.atr_fechacronologica <= ', $fechaTermino);
			$adelantos = $this->db->get()->result();

			$montoAdelanto = 0;
			foreach ($adelantos as $key => $a) {
				$montoAdelanto = $montoAdelanto + $a->atr_monto;
			}


			// CONSULTA DE LOS ADELANTOS EN EL MES CONSULTADO
			$this->db->select("");
			$this->db->from("fa_prestamo p");
			$this->db->join("fa_detalle_prestamo dp", "dp.cf_prestamo = p.cp_prestamo");
			$this->db->where("p.cf_trabajador", $t->cp_trabajador);
			$this->db->where("dp.atr_estado", '0');
			$this->db->where('dp.atr_fechaDescuento >= ', $fechaInicioPrestamo);
			$this->db->where('dp.atr_fechaDescuento <= ', $fechaTerminoPrestamo);
			$prestamos = $this->db->get()->result();

			$montoPrestamo = 0;
			foreach ($prestamos as $key => $p) {
				$montoPrestamo = $montoPrestamo + $p->atr_montoDescontar;
			}


			// Calcular sueldo si el trabajador falto
			$sueldo = $t->atr_sueldoMensual;


			if ($cont > 0) {
				$sueldo = $sueldo / 30;
				$sueldo = $sueldo * $diasPago;
			}
			$gratificacion = round(($sueldo + $bonoAsistencia) * 0.25);
			if ($gratificacion >= 126865) {
				$gratificacion = 126865;
			}
			$totalImponible = $sueldo + $gratificacion + $bonoAsistencia;
			$totalImponible2 = $totalImponible;
			if ($t->estado == 2 && $t->prevision != "DIPRECA") {
				$valorCesantia = round($totalImponible * 0.006);
			} else {
				$valorCesantia = 0;
			}
			if ($totalImponible >= 2299129) {
				$totalImponible = 2299129;
			}
			$valorAfp = round($totalImponible * $t->tasaAfp);
			$valorSalud = round($totalImponible * $t->tasaPrevision);


			if ($t->prevision != "Fonasa") {

				$adicionalPlan = round($t->atr_plan * $valorUF);
				if ($valorSalud < $adicionalPlan) {
					$adicionalPlan = $adicionalPlan - $valorSalud;
				} else {
					$adicionalPlan = 0;
				}
			} else {
				$adicionalPlan = 0;
			}
			$totalTributable = ($totalImponible2) - ($valorSalud + $valorAfp + $valorCesantia);

			if ($totalImponible <= 336055) {
				$cargasFamiliaresMonto = 13155 * $t->atr_cargas;
			} else if ($totalImponible > 336055 && $totalImponible <= 490844) {
				$cargasFamiliaresMonto = 8073 * $t->atr_cargas;
			} else if ($totalImponible > 490844 && $totalImponible <= 765550) {
				$cargasFamiliaresMonto = 2551 * $t->atr_cargas;
			} else if ($totalImponible > 765550) {
				$cargasFamiliaresMonto = 0 * $t->atr_cargas;
			}
			$tr_UTM = $totalTributable / $valorUTM;
			if ($totalTributable >= ($valorUTM * 13.5) && $totalTributable < ($valorUTM * 30)) {


				$valorImpuestoUnico = round((($tr_UTM * 0.04) -  0.54) * $valorUTM);
			}
			if ($totalTributable >= ($valorUTM * 30) && $totalTributable < ($valorUTM * 50)) {

				$valorImpuestoUnico = round((($tr_UTM * 0.08) - 1.74) * $valorUTM);
			}
			if ($totalTributable > ($valorUTM * 50) && $totalTributable < ($valorUTM * 70)) {
				$valorImpuestoUnico = round((($tr_UTM * 0.135) - 4.49) * $valorUTM);
			}
			if ($totalTributable > ($valorUTM * 70) && $totalTributable < ($valorUTM * 90)) {
				$valorImpuestoUnico = round((($tr_UTM * 0.23) - 11.14) * $valorUTM);
			}
			if ($totalTributable > ($valorUTM * 90) && $totalTributable < ($valorUTM * 120)) {
				$valorImpuestoUnico = round((($tr_UTM * 0.304) - 17.8) * $valorUTM);
			}
			if ($totalTributable >= ($valorUTM * 120)) {
				$valorImpuestoUnico = round((($tr_UTM * 0.35) - 23.32) * $valorUTM);
			}
			if ($totalTributable < ($valorUTM * 13.05)) {
				$valorImpuestoUnico = 0;
			}
			$totalDescuentosLegales = ($valorAfp + $valorSalud + $valorCesantia + $adicionalPlan + $valorImpuestoUnico);

			$totalOtrosDescuentos = $montoAdelanto + $montoPrestamo;
			$totalDescuentos = $totalOtrosDescuentos + $totalDescuentosLegales;
			$totalNoImponible = $cargasFamiliaresMonto + $colacion + $movilizacion;
			$totalHaberes = ($totalNoImponible + $totalImponible2);
			$valorAlcanceLiquido = $totalHaberes - $totalDescuentos;
			//CALCULAR EL MONTO TOTAL A PAGAR

			$montoTotalPagar = $valorAlcanceLiquido;



			// CONSULTA DE LOS ADELANTOS
			$this->db->select("a.atr_tipoCuenta, a.atr_numCuenta, b.atr_nombre as banco");
			$this->db->from("fa_adelanto a");
			$this->db->join("fa_banco b", "b.cp_banco = a.cf_banco");
			$this->db->where("a.cf_trabajador", $idTrabajador);
			$infoAdelanto = $this->db->get()->result();

			foreach ($infoAdelanto as $key => $value) {
				$tipoDeCuenta           = $value->atr_tipoCuenta;
				$banco                  = $value->banco;
				$numeroDeCuenta         = $value->atr_numCuenta;
			}

			// TRANSFORMAR LOS NUMEROS A FORMATO MILES
			$sueldo = number_format($sueldo, 0, ",", ".");
			$bonos = '' . $bonos;
			$bonos = number_format($bonos, 0, ",", ".");
			$montoAdelanto = number_format($montoAdelanto, 0, ",", ".");
			$montoPrestamo = number_format($montoPrestamo, 0, ",", ".");

			$nombres = explode(' ', $t->atr_nombres);
			$apellidos = explode(' ', $t->atr_apellidos);
			$rutFormateado = str_replace(".", "", $t->atr_rut);
			$rutFormateado = str_replace("-", "", $rutFormateado);


			//$montoTotalPagar = number_format($montoTotalPagar, 0, ",", ".");



			$data = (object) array(
				"rutBeneficiario"             => $rutFormateado,
				"nombreBeneficiario"          => $nombres[0] . " " . $apellidos[0],
				"monto"                       => round($montoTotalPagar),
				"banco"                       => $banco,
				"tipoDeCuenta"                => $tipoDeCuenta,
				"numeroDeCuenta"              => $numeroDeCuenta
			);

			//agregar nuevo elemento al array final
			$dataFinal[] = $data;
		} //fin de for para trabajadores contratados activos.

		return $dataFinal;
	}


	function getListadoPagosFinDeMes($ano, $mes, $diaTermino, $empresa, $valorUF, $valorUTM)
	{
		$fechaInicio = $ano . '-' . $mes . '-01';
		$fechaTermino = $ano . '-' . $mes . '-' . $diaTermino;

		$anoPrestamo = $ano;

		if ($mes == '12') {
			$mesPrestamo = '01';
			$anoPrestamo = $ano + 1;
		} else {
			if ($mes == '01') {
				$mesPrestamo = '12';
				$anoPrestamo = $ano - 1;
			} else {
				$arrayMes = substr($mes, 0);
				$mesPrestamo = $arrayMes + 1;
				$mesPrestamo = '0' . $mesPrestamo;
			}
		}


		if ($mesPrestamo == '04' || $mesPrestamo == '06' || $mesPrestamo == '09' || $mesPrestamo == '11') {
			$diaTerminoPrestamo = 30;
		} else {
			if ($mesPrestamo == '01' || $mesPrestamo == '03' || $mesPrestamo == '05' || $mesPrestamo == '07' || $mesPrestamo == '08' || $mesPrestamo == '10' || $mesPrestamo == '12') {
				$diaTerminoPrestamo = 31;
			}
		}


		$fechaInicioPrestamo = $anoPrestamo . '-' . $mesPrestamo . '-01';
		$fechaTerminoPrestamo = $anoPrestamo . '-' . $mesPrestamo . '-' . $diaTerminoPrestamo;


		$this->db->select(" t.cp_trabajador, t.atr_nombres, t.atr_sueldo ,t.atr_apellidos, t.atr_rut, t.cf_cargo, r.atr_sueldoMensual,
		t.atr_plan,
		t.atr_cargas,
		e.cp_estado as estado,
		a.atr_nombre as afp,
		a.tasa as tasaAfp,
		
		p.atr_nombre as prevision,
		p.tasa as tasaPrevision
		");
		$this->db->from("fa_trabajador t");

		$this->db->join("fa_estado e", "t.cf_estado = e.cp_estado");
		$this->db->join("fa_afp a", "t.cf_afp = a.cp_afp");
		$this->db->join("fa_prevision p", "t.cf_prevision = p.cp_prevision");
		$this->db->join("fa_remuneracion r", "r.cf_trabajador = t.cp_trabajador");
		$this->db->where('t.cf_estado != 6');
		$this->db->where('t.cf_empresa', $empresa);
		$arrayTrabajadores = $this->db->get()->result();

		if ($arrayTrabajadores == null) {
			return "vacio";
		} else {
			// comienzo de for al arreglo de trabajadores contratados activos.
			foreach ($arrayTrabajadores as $key => $t) {

				// CONSULTA DE LAS REMUNERACIONES QUE TIENE DETERMINADO CARGO
				$this->db->select(" r.atr_colacion, r.atr_movilizacion, r.atr_asistencia");
				$this->db->from("fa_remuneracion r");
				$this->db->where("r.cf_trabajador", $t->cp_trabajador);
				$remuneracionTrabajador = $this->db->get()->result();

				$sueldo = $t->atr_sueldoMensual;





				// CONSULTAR SI EL TRABAJADOR FALTO O NO PARA DESCONTAR EL BONO DE ASISTENCIA Y PUNTUALIDAD
				$this->db->select(" i.atr_motivo ");
				$this->db->from("fa_inasistencia i");
				$this->db->where("i.cf_trabajador", $t->cp_trabajador);
				$this->db->where('i.atr_start >= ', $fechaInicio);
				$this->db->where('i.atr_start <= ', $fechaTermino);
				$diasInsistencia = $this->db->get()->result();


				//consulta contrato trabajador
				$this->db->select(" co.atr_fechaInicio as fechaIngreso ");
				$this->db->from("fa_contrato co");
				$this->db->where("co.cf_trabajador", $t->cp_trabajador);
				$contratoTrabajador = $this->db->get()->result();

				foreach ($contratoTrabajador as $key => $co) {
					$fechaIngreso = $co->fechaIngreso;
				}

				$fechaConsulta = $fechaTermino;
				$comprobacion = descuentaAsistencia($fechaIngreso, $fechaConsulta);

				// CONSULTA DE LAS REMUNERACIONES EN EL MES SOLICITADO
				foreach ($remuneracionTrabajador as $key => $r) {
					$colacion = str_replace(".", "", $r->atr_colacion);
					$movilizacion = str_replace(".", "", $r->atr_movilizacion);



					$bonoBaseColacion = $r->atr_colacion;
					$bonoBaseMovilizacion = $r->atr_movilizacion;
					$bonoBaseAsistencia = $r->atr_asistencia;

					$bonoAsistencia = $r->atr_asistencia;

					$cont = 0;

					foreach ($diasInsistencia as $key => $dias) {
						$cont = $cont + 1;
					}

					$colacionDiaria = $colacion / 30;
					$movilizacionDiaria = $movilizacion / 30;
					$diasPago = 30 - $cont;



					if ($cont > 0) {
						if ($comprobacion) {
							$bonoAsistencia = round(($bonoAsistencia / 30) * $diasPago);
						} else {
							$bonoAsistencia = 0;
						}


						$colacion = $colacionDiaria * $diasPago;
						$movilizacion = $movilizacionDiaria * $diasPago;

						$bonos = $colacion + $movilizacion;
					} else {

						$bonos = $colacion + $movilizacion + $bonoAsistencia;
					}
				}


				// CONSULTA DE LOS ADELANTOS EN EL MES CONSULTADO
				$this->db->select("t.atr_monto");
				$this->db->from("fa_documento d");
				$this->db->join("fa_transferencia t ", "d.cf_transferencia = t.cp_transferencia");
				$this->db->where("d.atr_tipo", 'Adelanto');
				$this->db->where("d.cf_trabajador", $t->cp_trabajador);
				$this->db->where('d.atr_fechacronologica >= ', $fechaInicio);
				$this->db->where('d.atr_fechacronologica <= ', $fechaTermino);
				$adelantos = $this->db->get()->result();

				$montoAdelanto = 0;
				foreach ($adelantos as $key => $a) {
					$montoAdelanto = $montoAdelanto + $a->atr_monto;
				}


				// CONSULTA DE LOS Prestamos EN EL MES CONSULTADO
				$this->db->select("*");
				$this->db->from("fa_prestamo p");
				$this->db->join("fa_detalle_prestamo dp", "dp.cf_prestamo = p.cp_prestamo");
				$this->db->where("p.cf_trabajador", $t->cp_trabajador);
				$this->db->where("dp.atr_estado", '0');
				$this->db->where('dp.atr_fechaDescuento >= ', $fechaInicioPrestamo);
				$this->db->where('dp.atr_fechaDescuento <= ', $fechaTerminoPrestamo);
				$prestamos = $this->db->get()->result();

				$montoPrestamo = 0;
				foreach ($prestamos as $key => $p) {
					$montoPrestamo = $montoPrestamo + $p->atr_montoDescontar;
				}


				// Calcular sueldo si el trabajador falto
				$sueldo = $t->atr_sueldoMensual;
				if ($cont > 0) {
					$sueldo = $sueldo / 30;
					$sueldo = $sueldo * $diasPago;
				}
				//
				$gratificacion = round(($sueldo + $bonoAsistencia) * 0.25);
				if ($gratificacion >= 126865) {
					$gratificacion = 126865;
				}
				$totalImponible = $sueldo + $gratificacion + $bonoAsistencia;
				$totalImponible2 = $totalImponible;
				if ($t->estado == 2 && $t->prevision != "DIPRECA") {
					$valorCesantia = round($totalImponible * 0.006);
				} else {
					$valorCesantia = 0;
				}
				if ($totalImponible >= 2299129) {
					$totalImponible = 2299129;
				}
				$valorAfp = round($totalImponible * $t->tasaAfp);
				$valorSalud = round($totalImponible * $t->tasaPrevision);
				//consulta los valores de uf y utm
				$fechaOrd = explode('-', $fechaTermino);


				if ($t->prevision != "FONASA" && $t->prevision != "DIPRECA") {


					$adicionalPlan = round($t->atr_plan * $valorUF);
					if ($valorSalud < $adicionalPlan) {
						$adicionalPlan = $adicionalPlan - $valorSalud;
					} else {
						$adicionalPlan = 0;
					}
				} else {
					$adicionalPlan = 0;
				}
				$totalTributable = ($totalImponible2) - ($valorSalud + $valorAfp + $valorCesantia);
				if ($totalImponible <= 336055) {
					$cargasFamiliaresMonto = 13155 * $t->atr_cargas;
				} else if ($totalImponible > 336055 && $totalImponible <= 490844) {
					$cargasFamiliaresMonto = 8073 * $t->atr_cargas;
				} else if ($totalImponible > 490844 && $totalImponible <= 765550) {
					$cargasFamiliaresMonto = 2551 * $t->atr_cargas;
				} else if ($totalImponible > 765550) {
					$cargasFamiliaresMonto = 0 * $t->atr_cargas;
				}
				$tr_UTM = $totalTributable / $valorUTM;
				if ($totalTributable >= ($valorUTM * 13.5) && $totalTributable < ($valorUTM * 30)) {


					$valorImpuestoUnico = round((($tr_UTM * 0.04) -  0.54) * $valorUTM);
				}
				if ($totalTributable >= ($valorUTM * 30) && $totalTributable < ($valorUTM * 50)) {

					$valorImpuestoUnico = round((($tr_UTM * 0.08) - 1.74) * $valorUTM);
				}
				if ($totalTributable > ($valorUTM * 50) && $totalTributable < ($valorUTM * 70)) {
					$valorImpuestoUnico = round((($tr_UTM * 0.135) - 4.49) * $valorUTM);
				}
				if ($totalTributable > ($valorUTM * 70) && $totalTributable < ($valorUTM * 90)) {
					$valorImpuestoUnico = round((($tr_UTM * 0.23) - 11.14) * $valorUTM);
				}
				if ($totalTributable > ($valorUTM * 90) && $totalTributable < ($valorUTM * 120)) {
					$valorImpuestoUnico = round((($tr_UTM * 0.304) - 17.8) * $valorUTM);
				}
				if ($totalTributable >= ($valorUTM * 120)) {
					$valorImpuestoUnico = round((($tr_UTM * 0.35) - 23.32) * $valorUTM);
				}
				if ($totalTributable < ($valorUTM * 13.05)) {
					$valorImpuestoUnico = 0;
				}
				$totalDescuentosLegales = ($valorAfp + $valorSalud + $valorCesantia + $adicionalPlan + $valorImpuestoUnico);

				$totalOtrosDescuentos = $montoAdelanto + $montoPrestamo;
				$totalDescuentos = $totalOtrosDescuentos + $totalDescuentosLegales;
				$totalNoImponible = $cargasFamiliaresMonto + $colacion + $movilizacion;
				$totalHaberes = ($totalNoImponible + $totalImponible2);
				$valorAlcanceLiquido = $totalHaberes - $totalDescuentos;

				//CALCULAR EL MONTO TOTAL A PAGAR

				$montoTotalPagar = $valorAlcanceLiquido;


				// TRANSFORMAR LOS NUMEROS A FORMATO MILES



				$data = (object) array(
					"id"              => $t->cp_trabajador,
					"fechaIngreso"	  => $fechaIngreso,
					"rut"             => $t->atr_rut,
					"trabajador"      => $t->atr_nombres . ' ' . $t->atr_apellidos,
					"sueldo"          => round($sueldo),
					"bonos"           => round($bonos),
					"adelanto"        => round($montoAdelanto),
					"prestamos"       => round($montoPrestamo),
					"inasistencia"    => round($cont),
					"total"           => round($montoTotalPagar)
				);


				//agregar nuevo elemento al array fina
				$dataFinal[] = $data;
			} //fin de for para trabajadores contratados activos.
			return $dataFinal;
		}
	}



	function getDetallePagoTrabajador($idTrabajador, $ano, $mes, $diaTermino, $valorUF, $valorUTM)
	{
		$fechaInicio = $ano . '-' . $mes . '-01';
		$fechaTermino = $ano . '-' . $mes . '-' . $diaTermino;

		$anoPrestamo = $ano;

		if ($mes == '12') {
			$mesPrestamo = '01';
			$anoPrestamo = $ano + 1;
		} else {
			if ($mes == '01') {
				$mesPrestamo = '12';
				$anoPrestamo = $ano - 1;
			} else {
				$arrayMes = substr($mes, 0);
				$mesPrestamo = $arrayMes + 1;
				$mesPrestamo = '0' . $mesPrestamo;
			}
		}

		if ($mesPrestamo == '04' || $mesPrestamo == '06' || $mesPrestamo == '09' || $mesPrestamo == '11') {
			$diaTerminoPrestamo = 30;
		} else {
			if ($mesPrestamo == '01' || $mesPrestamo == '03' || $mesPrestamo == '05' || $mesPrestamo == '07' || $mesPrestamo == '08' || $mesPrestamo == '10' || $mesPrestamo == '12') {
				$diaTerminoPrestamo = 31;
			}
		}


		$fechaInicioPrestamo = $anoPrestamo . '-' . $mesPrestamo . '-01';
		$fechaTerminoPrestamo = $anoPrestamo . '-' . $mesPrestamo . '-' . "30";


		$this->db->select(" t.cp_trabajador, t.atr_nombres, t.atr_apellidos, t.atr_rut, t.cf_cargo,r.atr_sueldoMensual,
		t.atr_plan,
		t.atr_cargas,
		e.cp_estado as estado,
		a.atr_nombre as afp,
		a.tasa as tasaAfp,
		p.atr_nombre as prevision,
		p.tasa as tasaPrevision,
		");
		$this->db->from("fa_trabajador t");
		$this->db->join("fa_estado e", "t.cf_estado = e.cp_estado");
		$this->db->join("fa_afp a", "t.cf_afp = a.cp_afp");
		$this->db->join("fa_prevision p", "t.cf_prevision = p.cp_prevision");
		$this->db->join("fa_remuneracion r", "r.cf_trabajador = t.cp_trabajador");
		$this->db->where('t.cf_estado != 6');
		$this->db->where('t.cp_trabajador', $idTrabajador);
		$infoTrabajador = $this->db->get()->result();





		// comienzo de for al arreglo de trabajadores contratados activos.
		foreach ($infoTrabajador as $key => $t) {
			// CONSULTAR SI EL TRABAJADOR FALTO O NO PARA DESCONTAR EL BONO DE ASISTENCIA Y PUNTUALIDAD
			$this->db->select("i.atr_motivo");
			$this->db->from("fa_inasistencia i");
			$this->db->where("i.cf_trabajador", $t->cp_trabajador);
			$this->db->where('i.atr_start >= ', $fechaInicio);
			$this->db->where('i.atr_start <= ', $fechaTermino);
			$diasInsistencia = $this->db->get()->result();


			// CONSULTA DE LAS REMUNERACIONES QUE TIENE DETERMINADO CARGO
			$this->db->select(" r.atr_colacion, r.atr_movilizacion, r.atr_asistencia");
			$this->db->from("fa_remuneracion r");
			$this->db->where("r.cf_trabajador", $t->cp_trabajador);
			$remuneracionTrabajador = $this->db->get()->result();

			$this->db->select(" co.atr_fechaInicio as fechaIngreso ");
			$this->db->from("fa_contrato co");
			$this->db->where("co.cf_trabajador", $t->cp_trabajador);
			$contratoTrabajador = $this->db->get()->result();

			foreach ($contratoTrabajador as $key => $co) {
				$fechaIngreso = $co->fechaIngreso;
			}


			// CONSULTA DE LAS REMUNERACIONES EN EL MES SOLICITADO
			foreach ($remuneracionTrabajador as $key => $r) {
				$colacion = str_replace(".", "", $r->atr_colacion);
				$movilizacion = str_replace(".", "", $r->atr_movilizacion);
				$bonoBaseColacion = $r->atr_colacion;
				$bonoBaseMovilizacion = $r->atr_movilizacion;
				$bonoBaseAsistencia = $r->atr_asistencia;
				$bonoAsistencia = $r->atr_asistencia;
				$cont = 0;

				foreach ($diasInsistencia as $key => $dias) {
					$cont = $cont + 1;
				}

				$colacionDiaria = $colacion / 30;
				$movilizacionDiaria = $movilizacion / 30;
				$diasPago = 30 - $cont;
				//vht
				$fechaConsulta = $fechaTermino;
				$comprobacion = descuentaAsistencia($fechaIngreso, $fechaConsulta);

				if ($cont > 0) {
					if ($comprobacion) {
						$bonoAsistencia = round(($bonoAsistencia / 30) * $diasPago);
					} else {
						$bonoAsistencia = 0;
					}

					$colacion = $colacionDiaria * $diasPago;
					$movilizacion = $movilizacionDiaria * $diasPago;

					$bonos = $colacion + $movilizacion;
				} else {

					$bonos = $colacion + $movilizacion;
				}
			}



			// CONSULTA DE LOS ADELANTOS EN EL MES CONSULTADO
			$this->db->select("t.atr_monto, t.atr_fecha");
			$this->db->from("fa_documento d");
			$this->db->join("fa_transferencia t ", "d.cf_transferencia = t.cp_transferencia");
			$this->db->where("d.atr_tipo", 'Adelanto');
			$this->db->where("d.cf_trabajador", $t->cp_trabajador);
			$this->db->where('d.atr_fechacronologica >= ', $fechaInicio);
			$this->db->where('d.atr_fechacronologica <= ', $fechaTermino);
			$adelantos = $this->db->get()->result();

			$montoAdelanto = 0;
			foreach ($adelantos as $key => $a) {
				$montoAdelanto = $montoAdelanto + $a->atr_monto;
			}


			// CONSULTA DE LOS PRESTAMOS EN EL MES CONSULTADO
			$this->db->select("p.atr_montoTotal, p.atr_cantidadCuotas, dp.atr_numCuota, dp.atr_montoDescontar");
			$this->db->from("fa_prestamo p");
			$this->db->join("fa_detalle_prestamo dp", "dp.cf_prestamo = p.cp_prestamo");
			$this->db->where("p.cf_trabajador", $t->cp_trabajador);
			$this->db->where("dp.atr_estado", '0');
			$this->db->where('dp.atr_fechaDescuento >= ', $fechaInicioPrestamo);
			$this->db->where('dp.atr_fechaDescuento <= ', $fechaTerminoPrestamo);
			$prestamos = $this->db->get()->result();

			$montoPrestamo = 0;
			foreach ($prestamos as $key => $p) {
				$montoPrestamo = $montoPrestamo + $p->atr_montoDescontar;
			}

			// Calcular sueldo si el trabajador falto
			$sueldo = $t->atr_sueldoMensual;
			if ($cont > 0) {
				$sueldo = $sueldo / 30;
				$sueldo = $sueldo * $diasPago;
			}

			//CALCULAR EL MONTO TOTAL A PAGAR
			$gratificacion = round(($sueldo + $bonoAsistencia) * 0.25);
			if ($gratificacion >= 126865) {
				$gratificacion = 126865;
			}
			$totalImponible = $sueldo + $gratificacion + $bonoAsistencia;
			$totalImponible2 = $totalImponible;
			if ($t->estado == 2 && $t->prevision != "DIPRECA") {
				$valorCesantia = round($totalImponible * 0.006);
			} else {
				$valorCesantia = 0;
			}
			if ($totalImponible >= 2299129) {
				$totalImponible = 2299129;
			}
			$valorAfp = round($totalImponible * $t->tasaAfp);
			$valorSalud = round($totalImponible * $t->tasaPrevision);


			if ($t->prevision != "Fonasa") {

				$adicionalPlan = round($t->atr_plan * $valorUF);
				if ($valorSalud < $adicionalPlan) {
					$adicionalPlan = $adicionalPlan - $valorSalud;
				} else {
					$adicionalPlan = 0;
				}
			} else {
				$adicionalPlan = 0;
			}
			$totalTributable = ($totalImponible2) - ($valorSalud + $valorAfp + $valorCesantia);

			if ($totalImponible <= 336055) {
				$cargasFamiliaresMonto = 13155 * $t->atr_cargas;
			} else if ($totalImponible > 336055 && $totalImponible <= 490844) {
				$cargasFamiliaresMonto = 8073 * $t->atr_cargas;
			} else if ($totalImponible > 490844 && $totalImponible <= 765550) {
				$cargasFamiliaresMonto = 2551 * $t->atr_cargas;
			} else if ($totalImponible > 765550) {
				$cargasFamiliaresMonto = 0 * $t->atr_cargas;
			}
			$tr_UTM = $totalTributable / $valorUTM;
			if ($totalTributable >= ($valorUTM * 13.5) && $totalTributable < ($valorUTM * 30)) {


				$valorImpuestoUnico = round((($tr_UTM * 0.04) -  0.54) * $valorUTM);
			}
			if ($totalTributable >= ($valorUTM * 30) && $totalTributable < ($valorUTM * 50)) {

				$valorImpuestoUnico = round((($tr_UTM * 0.08) - 1.74) * $valorUTM);
			}
			if ($totalTributable > ($valorUTM * 50) && $totalTributable < ($valorUTM * 70)) {
				$valorImpuestoUnico = round((($tr_UTM * 0.135) - 4.49) * $valorUTM);
			}
			if ($totalTributable > ($valorUTM * 70) && $totalTributable < ($valorUTM * 90)) {
				$valorImpuestoUnico = round((($tr_UTM * 0.23) - 11.14) * $valorUTM);
			}
			if ($totalTributable > ($valorUTM * 90) && $totalTributable < ($valorUTM * 120)) {
				$valorImpuestoUnico = round((($tr_UTM * 0.304) - 17.8) * $valorUTM);
			}
			if ($totalTributable >= ($valorUTM * 120)) {
				$valorImpuestoUnico = round((($tr_UTM * 0.35) - 23.32) * $valorUTM);
			}
			if ($totalTributable < ($valorUTM * 13.05)) {
				$valorImpuestoUnico = 0;
			}
			$totalDescuentosLegales = ($valorAfp + $valorSalud + $valorCesantia + $adicionalPlan + $valorImpuestoUnico);

			$totalOtrosDescuentos = $montoAdelanto + $montoPrestamo;
			$totalDescuentos = $totalOtrosDescuentos + $totalDescuentosLegales;
			$totalNoImponible = $cargasFamiliaresMonto + $colacion + $movilizacion;
			$totalHaberes = ($totalNoImponible + $totalImponible2);
			$valorAlcanceLiquido = $totalHaberes - $totalDescuentos;
			//CALCULAR EL MONTO TOTAL A PAGAR

			$montoTotalPagar = $valorAlcanceLiquido;





			// TRANSFORMAR LOS NUMEROS A FORMATO MILES


			$sueldo = number_format($sueldo, 0, ",", ".");
			$bonos = '' . $bonos;
			$bonos = number_format($bonos, 0, ",", ".");
			$montoAdelanto = number_format($montoAdelanto, 0, ",", ".");
			$montoPrestamo = number_format($montoPrestamo, 0, ",", ".");

			$sueldoBaseParaMandar = number_format($t->atr_sueldoMensual, 0, ",", ".");

			$montoTotalPagar = number_format($montoTotalPagar, 0, ",", ".");

			$bonoBaseColacion = number_format($bonoBaseColacion, 0, ",", ".");
			$colacionDiaria = number_format($colacionDiaria, 0, ",", ".");


			$bonoBaseAsistencia = number_format($bonoBaseAsistencia, 0, ",", ".");

			$bonoBaseMovilizacion = number_format($bonoBaseMovilizacion, 0, ",", ".");
			$movilizacionDiaria = number_format($movilizacionDiaria, 0, ",", ".");

			$data = array(

				"sueldoBaseParaMandar"              => $sueldoBaseParaMandar,
				"sueldoAPago"             => $montoTotalPagar,
				"inasistencias"           => $cont,
				"diasAPagar"              => $diasPago,
				"bonoColacionBase"        => $bonoBaseColacion,
				"bonoColacionDiario"      => $colacionDiaria,
				"bonoColacionAPagar"      => $colacion,
				"bonoAsistenciaAPagar"    => $bonoAsistencia,
				"bonoBaseAsistencia"      => $bonoBaseAsistencia,
				"bonoMovilizacionDiaria"  => $movilizacionDiaria,
				"bonoBaseMovilizacion"    => $bonoBaseMovilizacion,
				"bonoMovilizacionAPagar"  => $movilizacion,
				"arrayPrestamos"          => $prestamos,
				"arrayAdelantos"          => $adelantos
			);

			return $data;
		}
	}
	/* VHT */
	function getGenerarLiquidacion($idTrabajador, $ano, $mes, $diaTermino, $valorUF, $valorUTM)
	{
		$fechaInicio = $ano . '-' . $mes . '-01';
		$fechaTermino = $ano . '-' . $mes . '-' . $diaTermino;

		$anoPrestamo = $ano;

		if ($mes == '12') {
			$mesPrestamo = '01';
			$anoPrestamo = $ano + 1;
		} else {
			if ($mes == '01') {
				$mesPrestamo = '12';
				$anoPrestamo = $ano - 1;
			} else {
				$arrayMes = substr($mes, 0);
				$mesPrestamo = $arrayMes + 1;
				$mesPrestamo = '0' . $mesPrestamo;
			}
		}

		if ($mesPrestamo == '04' || $mesPrestamo == '06' || $mesPrestamo == '09' || $mesPrestamo == '11') {
			$diaTerminoPrestamo = 30;
		} else {
			if ($mesPrestamo == '01' || $mesPrestamo == '03' || $mesPrestamo == '05' || $mesPrestamo == '07' || $mesPrestamo == '08' || $mesPrestamo == '10' || $mesPrestamo == '12') {
				$diaTerminoPrestamo = 31;
			}
		}


		$fechaInicioPrestamo = $anoPrestamo . '-' . $mesPrestamo . '-01';
		$fechaTerminoPrestamo = $anoPrestamo . '-' . $mesPrestamo . '-' . $diaTerminoPrestamo;

		//consultar datos completos trabajador
		$this->db->select("t.cp_trabajador, t.atr_rut, t.atr_nombres, t.atr_apellidos,
			t.atr_direccion, t.atr_fechaNacimiento,
			t.atr_sueldo,
			t.atr_plan,
			t.atr_cargas,
			e.atr_nombre as estado,
			t.cf_cargo,
			ci.atr_nombre as ciudad,
			ca.atr_nombre as cargo,
			su.atr_nombre as sucursal,
			n.atr_nombre as nacionalidad,
			ec.atr_nombre as estadocivil,
			a.atr_nombre as afp,
			a.tasa as tasaAfp,
			p.atr_nombre as prevision,
			p.tasa as tasaPrevision,
			em.atr_nombre as empresa,
			em.atr_run as rutEmpresa, 
			r.atr_sueldoMensual,
			co.atr_fechaInicio as fechaIngreso");
		$this->db->from("fa_trabajador t");
		$this->db->join("fa_estado e", "t.cf_estado = e.cp_estado");
		$this->db->join("fa_ciudad ci", "t.cf_ciudad = ci.cp_ciudad");
		$this->db->join("fa_cargo ca", "t.cf_cargo = ca.cp_cargo");
		$this->db->join("fa_sucursal su", "t.cf_sucursal = su.cp_sucursal");
		$this->db->join("fa_nacionalidad n", "t.cf_nacionalidad = n.cp_nacionalidad");
		$this->db->join("fa_estadoCivil ec", "t.cf_estadoCivil = ec.cp_estadoCivil");
		$this->db->join("fa_afp a", "t.cf_afp = a.cp_afp");
		$this->db->join("fa_prevision p", "t.cf_prevision = p.cp_prevision");
		$this->db->join("fa_empresa em ", "t.cf_empresa = em.cp_empresa");
		$this->db->join("fa_remuneracion r", "r.cf_trabajador = t.cp_trabajador");
		$this->db->join("fa_contrato co", "co.cf_trabajador = t.cp_trabajador");
		$this->db->where('t.cp_trabajador', $idTrabajador);
		$infoTrabajador = $this->db->get()->result();
		// comienzo de for al arreglo de trabajadores contratados activos.
		foreach ($infoTrabajador as $key => $t) {
			// CONSULTAR SI EL TRABAJADOR FALTO O NO PARA DESCONTAR EL BONO DE ASISTENCIA Y PUNTUALIDAD
			$this->db->select("i.atr_motivo");
			$this->db->from("fa_inasistencia i");
			$this->db->where("i.cf_trabajador", $t->cp_trabajador);
			$this->db->where('i.atr_start >= ', $fechaInicio);
			$this->db->where('i.atr_start <= ', $fechaTermino);
			$diasInsistencia = $this->db->get()->result();


			// CONSULTA DE LAS REMUNERACIONES QUE TIENE DETERMINADO CARGO
			$this->db->select(" r.atr_colacion, r.atr_movilizacion, r.atr_asistencia");
			$this->db->from("fa_remuneracion r");
			$this->db->where("r.cf_trabajador", $t->cp_trabajador);
			$remuneracionTrabajador = $this->db->get()->result();

			// CONSULTA DE LAS REMUNERACIONES EN EL MES SOLICITADO
			foreach ($remuneracionTrabajador as $key => $r) {

				$colacion = str_replace(".", "", $r->atr_colacion);
				$movilizacion = str_replace(".", "", $r->atr_movilizacion);
				$bonoBaseColacion = $r->atr_colacion;
				$bonoBaseMovilizacion = $r->atr_movilizacion;
				$bonoBaseAsistencia = $r->atr_asistencia;
				$bonoAsistencia = $r->atr_asistencia;

				$cont = 0;


				foreach ($diasInsistencia as $key => $dias) {
					$cont = $cont + 1;
				}

				$colacionDiaria = $colacion / 30;
				$movilizacionDiaria = $movilizacion / 30;
				$diasPago = 30 - $cont;

				$fechaIngreso = $t->fechaIngreso;
				$fechaConsulta = $fechaTermino;
				$comprobacion = descuentaAsistencia($fechaIngreso, $fechaConsulta);

				if ($cont > 0) {
					if ($comprobacion) {
						$bonoAsistencia = round(($bonoAsistencia / 30) * $diasPago);
					} else {
						$bonoAsistencia = 0;
					}

					$colacion = round($colacionDiaria * $diasPago);
					$movilizacion = round($movilizacionDiaria * $diasPago);
					$bonos = $colacion + $movilizacion;
				} else {

					$bonos = $colacion + $movilizacion + $bonoAsistencia;
				}
			}


			// CONSULTA DE LOS ADELANTOS EN EL MES CONSULTADO
			$this->db->select("t.atr_monto, t.atr_fecha");
			$this->db->from("fa_documento d");
			$this->db->join("fa_transferencia t ", "d.cf_transferencia = t.cp_transferencia");
			$this->db->where("d.atr_tipo", 'Adelanto');
			$this->db->where("d.cf_trabajador", $t->cp_trabajador);
			$this->db->where('d.atr_fechacronologica >= ', $fechaInicio);
			$this->db->where('d.atr_fechacronologica <= ', $fechaTermino);
			$adelantos = $this->db->get()->result();

			$montoAdelanto = 0;
			foreach ($adelantos as $key => $a) {
				$montoAdelanto = $montoAdelanto + $a->atr_monto;
			}


			// CONSULTA DE LOS PRESTAMOS EN EL MES CONSULTADO
			$this->db->select("p.atr_montoTotal, p.atr_cantidadCuotas, dp.atr_numCuota, dp.atr_montoDescontar");
			$this->db->from("fa_prestamo p");
			$this->db->join("fa_detalle_prestamo dp", "dp.cf_prestamo = p.cp_prestamo");
			$this->db->where("p.cf_trabajador", $t->cp_trabajador);
			$this->db->where("dp.atr_estado", '0');
			$this->db->where('dp.atr_fechaDescuento >= ', $fechaInicioPrestamo);
			$this->db->where('dp.atr_fechaDescuento <= ', $fechaTerminoPrestamo);
			$prestamos = $this->db->get()->result();

			$montoPrestamo = 0;
			foreach ($prestamos as $key => $p) {
				$montoPrestamo = $montoPrestamo + $p->atr_montoDescontar;
			}

			// Calcular sueldo si el trabajador falto
			$sueldo = $t->atr_sueldoMensual;


			//CALCULAR EL MONTO TOTAL A PAGAR
			// $montoTotalPagar = ($sueldo + $bonos) - ($montoAdelanto + $montoPrestamo);

			// $sumaBonos = $bonoBaseColacion + $bonoBaseAsistencia + $bonoBaseMovilizacion;


			//=SI(D17*0,25>=Datos!C2;Datos!C2;D17*0,25)

			$sueldoBaseLiquidacion = $t->atr_sueldoMensual;
			if ($cont > 0) {
				$sueldoBaseLiquidacion = $sueldoBaseLiquidacion / 30;
				$sueldoBaseLiquidacion = round($sueldoBaseLiquidacion * $diasPago);
			}

			$gratificacion = round(($sueldoBaseLiquidacion + $bonoAsistencia) * 0.25); //bonoAsistenciaGratificable
			if ($gratificacion >= 126865) {
				$gratificacion = 126865;
			}
			$totalImponible = $sueldoBaseLiquidacion + $gratificacion + $bonoAsistencia; //bonoAsistenciaImponible
			$totalImponible2 = $totalImponible;
			if ($t->estado == "Contrato indefinido" && $t->prevision != "DIPRECA") {

				$valorCesantia = round($totalImponible * 0.006);
			} else {
				$valorCesantia = 0;
			}
			if ($totalImponible >= 2299129) {
				$totalImponible = 2299129;
			}




			/* https://mindicador.cl/api/{tipo_indicador}/{dd-mm-yyyy} */
			$fechaOrd = explode('-', $fechaTermino);




			//se debe calcularsuma bonificaciones no imponibles

			$valorPrevision = round($totalImponible * (float) $t->tasaAfp); //se debe calcular desde valor en base de datos que no existe

			$valorSalud = 0;
			$valorSaludAdicional = 0;


			if ($t->prevision != "FONASA" && $t->prevision != "DIPRECA") {
				$valorSaludAdicional = round($t->atr_plan * $valorUF);
				$valorSalud = round($totalImponible * (float) $t->tasaPrevision);
				if ($valorSalud < $valorSaludAdicional) {
					$valorSaludAdicional =  round(($valorUF * $t->atr_plan) - $valorSalud);
				} else {
					$valorSaludAdicional = 0;
				}
			} else {
				$valorSalud = round($totalImponible * (float) $t->tasaPrevision);
			}



			$totalTributable = ($totalImponible2) - ($valorSalud + $valorPrevision + $valorCesantia);




			$tr_UTM = $totalTributable / $valorUTM;
			if ($totalTributable >= ($valorUTM * 13.5) && $totalTributable < ($valorUTM * 30)) {


				$valorImpuestoUnico = round((($tr_UTM * 0.04) -  0.54) * $valorUTM);
			}
			if ($totalTributable >= ($valorUTM * 30) && $totalTributable < ($valorUTM * 50)) {

				$valorImpuestoUnico = round((($tr_UTM * 0.08) - 1.74) * $valorUTM);
			}
			if ($totalTributable > ($valorUTM * 50) && $totalTributable < ($valorUTM * 70)) {
				$valorImpuestoUnico = round((($tr_UTM * 0.135) - 4.49) * $valorUTM);
			}
			if ($totalTributable > ($valorUTM * 70) && $totalTributable < ($valorUTM * 90)) {
				$valorImpuestoUnico = round((($tr_UTM * 0.23) - 11.14) * $valorUTM);
			}
			if ($totalTributable > ($valorUTM * 90) && $totalTributable < ($valorUTM * 120)) {
				$valorImpuestoUnico = round((($tr_UTM * 0.304) - 17.8) * $valorUTM);
			}
			if ($totalTributable >= ($valorUTM * 120)) {
				$valorImpuestoUnico = round((($tr_UTM * 0.35) - 23.32) * $valorUTM);
			}
			if ($totalTributable < ($valorUTM * 13.05)) {
				$valorImpuestoUnico = 0;
			}
			$totalDescuentosLegales = ($valorPrevision + $valorSalud + $valorCesantia + $valorSaludAdicional + $valorImpuestoUnico);

			$totalOtrosDescuentos = $montoAdelanto + $montoPrestamo;

			$totalDescuentos = $totalOtrosDescuentos + $totalDescuentosLegales;
			$cargasFamiliaresMonto = 0;
			if ($totalImponible <= 336055) {
				$cargasFamiliaresMonto = 13155 * $t->atr_cargas;
			} else if ($totalImponible > 336055 && $totalImponible <= 490844) {
				$cargasFamiliaresMonto = 8073 * $t->atr_cargas;
			} else if ($totalImponible > 490844 && $totalImponible <= 765550) {
				$cargasFamiliaresMonto = 2551 * $t->atr_cargas;
			} else if ($totalImponible > 765550) {
				$cargasFamiliaresMonto = 0 * $t->atr_cargas;
			}

			$totalNoImponible = $cargasFamiliaresMonto + $colacion + $movilizacion;

			$totalHaberes = ($totalNoImponible + $totalImponible2);
			$valorAlcanceLiquido = $totalHaberes - $totalDescuentos;
			$mesCorriente = $mes;
			switch ($mesCorriente) {
				case '01':
					$mesCorriente = "Enero";
					# code...
					break;
				case '02':
					$mesCorriente = "Febrero";
					# code...
					break;
				case '03':
					$mesCorriente = "Marzo";
					# code...
					break;

				case '04':
					$mesCorriente = "Abril";
					break;
				case '05':
					$mesCorriente = "Mayo";
					# code...
					break;
				case '06':
					$mesCorriente = "Junio";
					# code...
					break;
				case '07':
					$mesCorriente = "Julio";
					# code...
					break;
				case '08':
					$mesCorriente = "Agosto";
					# code...
					break;
				case '09':
					$mesCorriente = "Septiembre";
					# code...
					break;
				case '10':
					$mesCorriente = "Octubre";
					# code...
					break;
				case '11':
					$mesCorriente = "Noviembre";
					# code...
					break;
				case '12':
					$mesCorriente = "Diciembre";
					# code...
					break;
				default:
					# code...
					break;
			}

			// TRANSFORMAR LOS NUMEROS A FORMATO MILES


			$sueldo = number_format($sueldo, 0, ",", ".");
			$bonos = '' . $bonos;
			$bonos = number_format($bonos, 0, ",", ".");
			$montoAdelanto = number_format($montoAdelanto, 0, ",", ".");
			$montoPrestamo = number_format($montoPrestamo, 0, ",", ".");
			$gratificacion = number_format($gratificacion, 0, ",", ".");
			$sueldoBaseLiquidacion = number_format($sueldoBaseLiquidacion, 0, ",", ".");
			$totalImponible = number_format($totalImponible, 0, ",", ".");
			$totalNoImponible = number_format($totalNoImponible, 0, ",", ".");
			$totalHaberes = number_format($totalHaberes, 0, ",", ".");
			$valorPrevision = number_format($valorPrevision, 0, ",", ".");
			$valorSalud = number_format($valorSalud, 0, ",", ".");
			$totalDescuentosLegales = number_format($totalDescuentosLegales, 0, ",", ".");
			$totalOtrosDescuentos = number_format($totalOtrosDescuentos, 0, ",", ".");
			$totalDescuentos = number_format($totalDescuentos, 0, ",", ".");
			$valorAlcanceLiquido = number_format($valorAlcanceLiquido, 0, ",", ".");
			/*  $montoTotalPagar = number_format($montoTotalPagar, 0, ",", "."); */
			$totalTributable = number_format($totalTributable, 0, ",", ".");
			$bonoBaseColacion = number_format($bonoBaseColacion, 0, ",", ".");
			$colacionDiaria = number_format($colacionDiaria, 0, ",", ".");


			$bonoBaseAsistencia = number_format($bonoBaseAsistencia, 0, ",", ".");

			$bonoBaseMovilizacion = number_format($bonoBaseMovilizacion, 0, ",", ".");
			$movilizacionDiaria = number_format($movilizacionDiaria, 0, ",", ".");

			$data = array(
				"valorUF"                 => $valorUF,
				"valorUTM"                => $valorUTM,
				"valorImpuestoUnico"      => $valorImpuestoUnico,
				"totalTributable"         => $totalTributable,
				"mesCorriente"            => $mesCorriente,
				"razonSocial"             => $t->empresa,
				"rutEmpresa"              => $t->rutEmpresa,
				"nombres"                 => $t->atr_nombres,
				"apellidos"               => $t->atr_apellidos,
				"rutTrabajador"           => $t->atr_rut,
				"afpTrabajador"           => $t->afp,
				"saludTrabajador"         => $t->prevision,
				"cargas"                  => $t->atr_cargas,
				"plan"                    => $t->atr_plan,
				"sueldoBaseLiquidacion"              => $sueldoBaseLiquidacion,
				"gratificacionLegal"      => $gratificacion,
				"inasistencias"           => $cont,
				"diasTrabajados"          => $diasPago,
				"totalImponible"          => $totalImponible2,
				"cargasFamiliaresMonto"   => $cargasFamiliaresMonto,

				"valorPrevision"          => $valorPrevision,
				"valorSalud"              => $valorSalud,
				"valorCesantia"           => $valorCesantia,
				"valorImpuestoUnico"      => $valorImpuestoUnico,
				"totalDescuentosLegales"  => $totalDescuentosLegales,
				"totalOtrosDescuentos"    => $totalOtrosDescuentos,
				"totalDescuentos"         => $totalDescuentos,
				"totalHaberes"            => $totalHaberes,
				"totalNoImponible"        => $totalNoImponible,
				"valorAlcanceLiquido"     => $valorAlcanceLiquido,
				"montoPrestamo"           => $montoPrestamo,
				"bonoColacionBase"        => $bonoBaseColacion,
				"bonoColacionDiario"      => $colacionDiaria,
				"bonoColacionAPagar"      => $colacion,
				"bonoAsistenciaAPagar"    => $bonoAsistencia,
				"bonoBaseAsistencia"      => $bonoBaseAsistencia,
				"bonoMovilizacionDiaria"  => $movilizacionDiaria,
				"bonoBaseMovilizacion"    => $bonoBaseMovilizacion,
				"bonoMovilizacionAPagar"  => $movilizacion,
				"arrayPrestamos"          => $prestamos,
				"arrayAdelantos"          => $adelantos,
				"fechaTermino"            => $fechaTermino,
				"valorSaludAdicional"     => $valorSaludAdicional,
				"valorImponible"          => $totalImponible,
				"añoLiquidacion"          => $fechaOrd[0],
				"comprobacion" => $comprobacion
			);

			return $data;
		}
	}
	/* VHT fin */
	function cargarEmpresas()
	{
		$this->db->select("e.cp_empresa, e.atr_nombre ");
		$this->db->from("fa_empresa e");
		$documento = $this->db->get()->result();
	}
}
