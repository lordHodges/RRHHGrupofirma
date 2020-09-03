<?php

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
		p.tasa as tasaPrevision");
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
						$bonoAsistencia = 0;

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
				//
				$gratificacion = round(($sueldo + $bonoAsistencia) * 0.25);
				if ($gratificacion >= 126865) {
					$gratificacion = 126865;
				}
				$totalImponible = $sueldo + $gratificacion + $bonoAsistencia;
				$totalImponible2 = $totalImponible;
				if ($t->estado == 2) {
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
				$sueldo = number_format($sueldo, 0, ",", ".");
				$bonos = '' . $bonos;
				$bonos = number_format($bonos, 0, ",", ".");
				$montoAdelanto = number_format($montoAdelanto, 0, ",", ".");
				$montoPrestamo = number_format($montoPrestamo, 0, ",", ".");

				$montoTotalPagar = number_format($montoTotalPagar, 0, ",", ".");




				$data = (object) array(
					"id"              => $t->cp_trabajador,
					"rut"             => $t->atr_rut,
					"trabajador"      => $t->atr_nombres . ' ' . $t->atr_apellidos,
					"sueldo"          => $sueldo,
					"bonos"           => $bonos,
					"adelanto"        => $montoAdelanto,
					"prestamos"       => $montoPrestamo,
					"inasistencia"    => $cont,
					"total"           => $montoTotalPagar
				);

				// echo json_encode($data);

				//agregar nuevo elemento al array fina
				$dataFinal[] = $data;
			} //fin de for para trabajadores contratados activos.
			return $dataFinal;
		}
	}
