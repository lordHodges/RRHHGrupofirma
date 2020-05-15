<?php

defined('BASEPATH') OR exit('No direct script access allowed');

class PagosModel extends CI_Model {


    public function __construct() {
        parent::__construct();
    }

    function getListadoPagosFinDeMes($ano, $mes, $diaTermino){

        $fechaInicio = $ano.'-'.$mes.'-01';
        $fechaTermino = $ano.'-'.$mes.'-'.$diaTermino;

        $anoPrestamo = $ano;

        if ($mes == '12') {
          $mesPrestamo = '01';
          $anoPrestamo = $ano+1;
        }else{
          $arrayMes = substr($mes, 0);
          $mesPrestamo = $arrayMes+1;
          $mesPrestamo = '0'.$mesPrestamo;
        }

        if ($mesPrestamo == '04' || $mesPrestamo == '06' || $mesPrestamo == '09' || $mesPrestamo == '11') {
          $diaTerminoPrestamo = 30;
        }else{
          if ($mesPrestamo == '01' || $mesPrestamo == '03' || $mesPrestamo == '05' || $mesPrestamo == '07' || $mesPrestamo == '08' || $mesPrestamo == '10' || $mesPrestamo == '12' ) {
            $diaTerminoPrestamo = 31;
          }
        }


        $fechaInicioPrestamo = $anoPrestamo.'-'.$mesPrestamo.'-01';
        $fechaTerminoPrestamo = $anoPrestamo.'-'.$mesPrestamo.'-'.$diaTerminoPrestamo;


        $this->db->select(" t.cp_trabajador, t.atr_nombres, t.atr_apellidos, t.atr_rut, t.atr_sueldo, t.cf_cargo");
        $this->db->from("fa_trabajador t");
        $this->db->where('t.cf_estado != 6');
        $arrayTrabajadores = $this->db->get()->result();


        // comienzo de for al arreglo de trabajadores contratados activos.
        foreach ($arrayTrabajadores as $key => $t) {

          // CONSULTA DE LOS TRABAJADORES QUE SE ENCUENTRAN CONTRATADOS Y SIN FINIQUITAR
          $this->db->select(" r.atr_colacion, r.atr_movilizacion, r.atr_asistencia");
          $this->db->from("fa_remuneracion r");
          $this->db->where("r.cf_cargo", $t->cf_cargo);
          $remuneracionTrabajador = $this->db->get()->result();

          $sueldo = $t->atr_sueldo;



          // CONSULTAR SI EL TRABAJADOR FALTO O NO PARA DESCONTAR EL BONO DE ASISTENCIA Y PUNTUALIDAD
          $this->db->select(" i.atr_motivo ");
          $this->db->from("fa_inasistencia i");
          $this->db->where("i.cf_trabajador", $t->cp_trabajador);
          $this->db->where('i.atr_start >= ',$fechaInicio);
          $this->db->where('i.atr_start <= ',$fechaTermino);
          $diasInsistencia = $this->db->get()->result();

          // CONSULTA DE LAS REMUNERACIONES EN EL MES SOLICITADO
          foreach ($remuneracionTrabajador as $key => $r) {
            $colacion = str_replace ( "." , "" , $r->atr_colacion  );
            $movilizacion = str_replace ( "." , "" , $r->atr_movilizacion  );

            $bonoAsistencia = $r->atr_asistencia;



            if ( $diasInsistencia > 0) {
              $colacionDiaria = $colacion / 30;
              $movilizacionDiaria = $movilizacion / 30;

              $cont = 0;
              foreach ($diasInsistencia as $key => $dias) {
                $cont = $cont +1;
              }
              $diasPago = 30 - $cont;

              $colacion = $colacionDiaria * $diasPago;
              $movilizacion = $movilizacionDiaria * $diasPago;


              $bonos = $colacion + $movilizacion;
            }else{
              $bonos = $colacion + $movilizacion + $bonoAsistencia;
            }
          }


          // CONSULTA DE LOS ADELANTOS EN EL MES CONSULTADO
          $this->db->select("t.atr_monto");
          $this->db->from("fa_documento d");
          $this->db->join("fa_transferencia t ","d.cf_transferencia = t.cp_transferencia");
          $this->db->where("d.atr_tipo", 'Adelanto');
          $this->db->where("d.cf_trabajador", $t->cp_trabajador);
          $this->db->where('d.atr_fechacronologica >= ',$fechaInicio);
          $this->db->where('d.atr_fechacronologica <= ',$fechaTermino);
          $adelantos = $this->db->get()->result();

          $montoAdelanto = 0;
          foreach ($adelantos as $key => $a) {
            $montoAdelanto = $montoAdelanto + $a->atr_monto ;
          }


          // CONSULTA DE LOS ADELANTOS EN EL MES CONSULTADO
          $this->db->select("");
          $this->db->from("fa_prestamo p");
          $this->db->join("fa_detalle_prestamo dp","dp.cf_prestamo = p.cp_prestamo");
          $this->db->where("p.cf_trabajador", $t->cp_trabajador);
          $this->db->where("dp.atr_estado", '0');
          $this->db->where('dp.atr_fechaDescuento >= ',$fechaInicioPrestamo);
          $this->db->where('dp.atr_fechaDescuento <= ',$fechaTerminoPrestamo);
          $prestamos = $this->db->get()->result();

          $montoPrestamo = 0;
          foreach ($prestamos as $key => $p) {
            $montoPrestamo = $montoPrestamo + $p->atr_montoDescontar ;
          }




          // Calcular sueldo si el trabajador falto
          $sueldo = $t->atr_sueldo;
          if ($cont > 0) {
            $sueldo = $sueldo / 30;
            $sueldo = $sueldo * $diasPago;
          }

          //CALCULAR EL MONTO TOTAL A PAGAR

          $montoTotalPagar = ($sueldo + $bonos) - ($montoAdelanto + $montoPrestamo);



          // TRANSFORMAR LOS NUMEROS A FORMATO MILES
          $sueldo = number_format($sueldo, 0, ",", ".");
          $bonos = ''.$bonos;
          $bonos = number_format($bonos, 0, ",", ".");
          $montoAdelanto = number_format($montoAdelanto, 0, ",", ".");
          $montoPrestamo = number_format($montoPrestamo, 0, ",", ".");

          $montoTotalPagar = number_format($montoTotalPagar, 0, ",", ".");


          $data = (object) array(
              "rut"             => $t->atr_rut,
              "trabajador"      => $t->atr_nombres.' '.$t->atr_apellidos,
              "sueldo"          => $sueldo,
              "bonos"           => $bonos,
              "adelanto"        => $montoAdelanto,
              "prestamos"       => $montoPrestamo,
              "inasistencia"    => $cont,
              "total"           => $montoTotalPagar
          );



          //agregar nuevo elemento al array fina
          $dataFinal[] = $data;



        } //fin de for para trabajadores contratados activos.
        return $dataFinal;
    }


































































}
