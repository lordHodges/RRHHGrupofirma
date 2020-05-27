<?php

defined('BASEPATH') OR exit('No direct script access allowed');

class PagosModel extends CI_Model {


    public function __construct() {
        parent::__construct();
    }

    function getHistorialPagosMensuales($ano, $mes){
        $this->db->select("pm.cf_trabajador");
        $this->db->from("fa_historial_pagos_mensuales pm");
        $this->db->where("pm.atr_mes",$mes);
        $this->db->where("pm.atr_ano",$ano);
        return $this->db->get()->result();
    }

    function addHistorialPagosMensuales($monto, $idTrabajador,$fecha,$banco){
        $fechaActual = date("Y-m-d");

        $mes = date("m");
        $ano = date("Y");

        $monto = str_replace ( "." , "" , $monto);

        $this->db->select(" t.cp_transferencia ");
        $this->db->from("fa_transferencia t");
        $this->db->where("t.atr_fecha",$fecha);
        $this->db->where("t.cf_banco",$banco);
        $this->db->where("t.cf_trabajador",$idTrabajador);
        $this->db->where("t.atr_monto",$monto);
        $transferencias = $this->db->get()->result();

        foreach ($transferencias as $key => $t) {
          $idTransferencia = $t->cp_transferencia;
        }

        $this->db->select("doc.cp_documento ");
        $this->db->from("fa_documento doc");
        $this->db->where("doc.cf_transferencia",$idTransferencia);
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
        return $resultado;
    }





    function getListadoPlanillaPagoMes($ano, $mes, $diaTermino, $empresa){

        $fechaInicio = $ano.'-'.$mes.'-01';
        $fechaTermino = $ano.'-'.$mes.'-'.$diaTermino;

        $anoPrestamo = $ano;

        if ($mes == '12') {
          $mesPrestamo = '01';
          $anoPrestamo = $ano+1;
        }else{
          if ($mes == '01') {
            $mesPrestamo = '12';
            $anoPrestamo = $ano-1;
          }else{
            $arrayMes = substr($mes, 0);
            $mesPrestamo = $arrayMes+1;
            $mesPrestamo = '0'.$mesPrestamo;
          }
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
        $this->db->where('t.cf_empresa',$empresa);
        $arrayTrabajadores = $this->db->get()->result();


        // comienzo de for al arreglo de trabajadores contratados activos.
        foreach ($arrayTrabajadores as $key => $t) {

          $idTrabajador = $t->cp_trabajador;


          // CONSULTA DE LAS REMUNERACIONES QUE TIENE DETERMINADO CARGO
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



            $bonoBaseColacion = $r->atr_colacion;
            $bonoBaseMovilizacion = $r->atr_movilizacion;
            $bonoBaseAsistencia = $r->atr_asistencia;

            $bonoAsistencia = $r->atr_asistencia;

            $cont = 0;

            foreach ($diasInsistencia as $key => $dias) {
              $cont = $cont+1;
            }

            $colacionDiaria = $colacion / 30;
            $movilizacionDiaria = $movilizacion / 30;
            $diasPago = 30 - $cont;

            if ( $cont > 0) {
              $bonoAsistencia = 0;

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


            // CONSULTA DE LOS ADELANTOS
            $this->db->select("a.atr_tipoCuenta, a.atr_numCuenta, b.atr_nombre as banco");
            $this->db->from("fa_adelanto a");
            $this->db->join("fa_banco b","b.cp_banco = a.cf_banco");
            $this->db->where("a.cf_trabajador", $idTrabajador);
            $infoAdelanto = $this->db->get()->result();

            foreach ($infoAdelanto as $key => $value) {
              $tipoDeCuenta           = $value->atr_tipoCuenta;
              $banco                  = $value->banco;
              $numeroDeCuenta         = $value->atr_numCuenta;
            }

            // TRANSFORMAR LOS NUMEROS A FORMATO MILES
            $sueldo = number_format($sueldo, 0, ",", ".");
            $bonos = ''.$bonos;
            $bonos = number_format($bonos, 0, ",", ".");
            $montoAdelanto = number_format($montoAdelanto, 0, ",", ".");
            $montoPrestamo = number_format($montoPrestamo, 0, ",", ".");

            $nombres = explode(' ',$t->atr_nombres);
            $apellidos = explode(' ',$t->atr_apellidos);
            $rutFormateado = str_replace(".","",$t->atr_rut);
            $rutFormateado = str_replace("-","",$rutFormateado);


            $montoTotalPagar = number_format($montoTotalPagar, 0, ",", ".");



            $data = (object) array(
                "rutBeneficiario"             => $rutFormateado,
                "nombreBeneficiario"          => $nombres[0]." ".$apellidos[0],
                "monto"                       => $montoTotalPagar,
                "banco"                       => $banco,
                "tipoDeCuenta"                => $tipoDeCuenta,
                "numeroDeCuenta"              => $numeroDeCuenta
            );

            //agregar nuevo elemento al array fina
            $dataFinal[] = $data;

        } //fin de for para trabajadores contratados activos.

        return $dataFinal;
    }









































    function getListadoPagosFinDeMes($ano, $mes, $diaTermino, $empresa){
      $fechaInicio = $ano.'-'.$mes.'-01';
      $fechaTermino = $ano.'-'.$mes.'-'.$diaTermino;

      $anoPrestamo = $ano;

      if ($mes == '12') {
        $mesPrestamo = '01';
        $anoPrestamo = $ano+1;
      }else{
        if ($mes == '01') {
          $mesPrestamo = '12';
          $anoPrestamo = $ano-1;
        }else{
          $arrayMes = substr($mes, 0);
          $mesPrestamo = $arrayMes+1;
          $mesPrestamo = '0'.$mesPrestamo;
        }
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
      $this->db->where('t.cf_empresa',$empresa);
      $arrayTrabajadores = $this->db->get()->result();



      // comienzo de for al arreglo de trabajadores contratados activos.
      foreach ($arrayTrabajadores as $key => $t) {

        // CONSULTA DE LAS REMUNERACIONES QUE TIENE DETERMINADO CARGO
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



          $bonoBaseColacion = $r->atr_colacion;
          $bonoBaseMovilizacion = $r->atr_movilizacion;
          $bonoBaseAsistencia = $r->atr_asistencia;

          $bonoAsistencia = $r->atr_asistencia;

          $cont = 0;

          foreach ($diasInsistencia as $key => $dias) {
            $cont = $cont+1;
          }

          $colacionDiaria = $colacion / 30;
          $movilizacionDiaria = $movilizacion / 30;
          $diasPago = 30 - $cont;

          if ( $cont > 0) {
            $bonoAsistencia = 0;

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
            "id"              => $t->cp_trabajador,
            "rut"             => $t->atr_rut,
            "trabajador"      => $t->atr_nombres.' '.$t->atr_apellidos,
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



  function getDetallePagoTrabajador($idTrabajador,$ano,$mes,$diaTermino){
    $fechaInicio = $ano.'-'.$mes.'-01';
    $fechaTermino = $ano.'-'.$mes.'-'.$diaTermino;

    $anoPrestamo = $ano;

    if ($mes == '12') {
      $mesPrestamo = '01';
      $anoPrestamo = $ano+1;
    }else{
      if ($mes == '01') {
        $mesPrestamo = '12';
        $anoPrestamo = $ano-1;
      }else{
        $arrayMes = substr($mes, 0);
        $mesPrestamo = $arrayMes+1;
        $mesPrestamo = '0'.$mesPrestamo;
      }
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
    $this->db->where('t.cp_trabajador',$idTrabajador);
    $infoTrabajador = $this->db->get()->result();

    // comienzo de for al arreglo de trabajadores contratados activos.
    foreach ($infoTrabajador as $key => $t) {
      // CONSULTAR SI EL TRABAJADOR FALTO O NO PARA DESCONTAR EL BONO DE ASISTENCIA Y PUNTUALIDAD
      $this->db->select("i.atr_motivo");
      $this->db->from("fa_inasistencia i");
      $this->db->where("i.cf_trabajador", $t->cp_trabajador);
      $this->db->where('i.atr_start >= ',$fechaInicio);
      $this->db->where('i.atr_start <= ',$fechaTermino);
      $diasInsistencia = $this->db->get()->result();


      // CONSULTA DE LAS REMUNERACIONES QUE TIENE DETERMINADO CARGO
      $this->db->select(" r.atr_colacion, r.atr_movilizacion, r.atr_asistencia");
      $this->db->from("fa_remuneracion r");
      $this->db->where("r.cf_cargo", $t->cf_cargo);
      $remuneracionTrabajador = $this->db->get()->result();

      // CONSULTA DE LAS REMUNERACIONES EN EL MES SOLICITADO
      foreach ($remuneracionTrabajador as $key => $r) {
        $colacion = str_replace ( "." , "" , $r->atr_colacion  );
        $movilizacion = str_replace ( "." , "" , $r->atr_movilizacion  );



        $bonoBaseColacion = $r->atr_colacion;
        $bonoBaseMovilizacion = $r->atr_movilizacion;
        $bonoBaseAsistencia = $r->atr_asistencia;

        $bonoAsistencia = $r->atr_asistencia;

        $cont = 0;

        foreach ($diasInsistencia as $key => $dias) {
          $cont = $cont+1;
        }

        $colacionDiaria = $colacion / 30;
        $movilizacionDiaria = $movilizacion / 30;
        $diasPago = 30 - $cont;

        if ( $cont > 0) {
          $bonoAsistencia = 0;

          $colacion = $colacionDiaria * $diasPago;
          $movilizacion = $movilizacionDiaria * $diasPago;

          $bonos = $colacion + $movilizacion;
        }else{

          $bonos = $colacion + $movilizacion + $bonoAsistencia;

        }
      }


      // CONSULTA DE LOS ADELANTOS EN EL MES CONSULTADO
      $this->db->select("t.atr_monto, t.atr_fecha");
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


      // CONSULTA DE LOS PRESTAMOS EN EL MES CONSULTADO
      $this->db->select("p.atr_montoTotal, p.atr_cantidadCuotas, dp.atr_numCuota, dp.atr_montoDescontar");
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

      $sueldoBaseParaMandar = number_format($t->atr_sueldo, 0, ",", ".");

      $montoTotalPagar = number_format($montoTotalPagar, 0, ",", ".");

      $bonoBaseColacion = number_format($bonoBaseColacion, 0, ",", ".");
      $colacionDiaria = number_format($colacionDiaria, 0, ",", ".");


      $bonoBaseAsistencia = number_format($bonoBaseAsistencia, 0, ",", ".");

      $bonoBaseMovilizacion = number_format($bonoBaseMovilizacion, 0, ",", ".");
      $movilizacionDiaria = number_format($movilizacionDiaria, 0, ",", ".");





      $data = array(
          "sueldoBase"              => $sueldoBaseParaMandar,
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


  function cargarEmpresas(){
    $this->db->select("e.cp_empresa, e.atr_nombre ");
    $this->db->from("fa_empresa e");
    $documento = $this->db->get()->result();
  }






































































}
