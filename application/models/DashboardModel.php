<?php

defined('BASEPATH') OR exit('No direct script access allowed');

class DashboardModel extends CI_Model {

    public function __construct() {
        parent::__construct();
    }

    function totalContratosPlazo(){
      $this->db->select('count(*) as total');
      $this->db->from('fa_trabajador t');
      $this->db->where('t.cf_estado',1);
      return  $this->db->get()->result();
    }

    function totalContratosIndefinidos(){
      $this->db->select('count(*) as total');
      $this->db->from('fa_trabajador t');
      $this->db->where('t.cf_estado',2);
      return  $this->db->get()->result();
    }

    function totalContratosPorProyecto(){
      $this->db->select('count(*) as total');
      $this->db->from('fa_trabajador t');
      $this->db->where('t.cf_estado',3);
      return  $this->db->get()->result();
    }



    function buscarContratosPorVencer(){
      $this->db->select(" c.atr_fechaTermino, c.atr_fechaInicio, t.atr_nombres, t.atr_apellidos, ca.atr_nombre as cargo");
      $this->db->from("fa_contrato c");
      $this->db->join("fa_trabajador t", " t.cp_trabajador = c.cf_trabajador");
      $this->db->join("fa_cargo ca", "ca.cp_cargo = c.cf_cargo");
      $this->db->order_by('c.atr_fechaTermino', 'ASC');
      return $this->db->get()->result();
    }

    // transferencias en el dia de hoy
    function transferenciasPorEmpresaHoy(){
      date_default_timezone_set("America/Santiago");
      $fechaActual = date("Y-m-d");

      $dia = date("d");
      $mes = date("m");
      $ano = date("Y");


      $fechaBusqueda = $ano."-".$mes."-".$dia;

      // var_dump($fechaBusqueda);

      $this->db->select("e.atr_nombre, SUM(tr.atr_monto) as totalTransferencias");
      $this->db->from("fa_transferencia tr");
      $this->db->join("fa_trabajador t", " t.cp_trabajador = tr.cf_trabajador");
      $this->db->join("fa_empresa e", "t.cf_empresa = e.cp_empresa");
      $this->db->where("tr.atr_fecha",$fechaBusqueda);
      $this->db->group_by("e.atr_nombre");

      $resultado = $this->db->get()->result();
      return $resultado;
    }


    // transferencias en el último mes
    function transferenciasPorEmpresaMes(){
      date_default_timezone_set("America/Santiago");
      $fechaActual = date("Y-m-d");

      $dia = date("d");
      $mes = date("m");
      $ano = date("Y");


      if( $mes == "04" || $mes == "06" || $mes == "09" || $mes == "11" ){
        $fechaBusquedaInicio = $ano."-".$mes."-01";
        $fechaBusquedaFinal = $ano."-".$mes."-30";
      }else if(  $mes == "01" || $mes == "03" || $mes == "05" || $mes == "07" || $mes == "08" || $mes == "10" || $mes == "12"  ){
        $fechaBusquedaInicio = $ano."-".$mes."-01";
        $fechaBusquedaFinal = $ano."-".$mes."-31";
      }else{
        $bisiesto = $ano/4;
        if( $bisiesto == 0){
          $fechaBusquedaInicio = $ano."-".$mes."-01";
          $fechaBusquedaFinal = $ano."-".$mes."-29";
        }else{
          $fechaBusquedaInicio = $ano."-".$mes."-01";
          $fechaBusquedaFinal = $ano."-".$mes."-28";
        }
      }


      $condiciones =  array('tr.atr_fecha >=' => $fechaBusquedaInicio, 'tr.atr_fecha <=' => $fechaBusquedaFinal);

      $this->db->select("e.atr_nombre, SUM(tr.atr_monto) as totalTransferencias");
      $this->db->from("fa_transferencia tr");
      $this->db->join("fa_trabajador t", " t.cp_trabajador = tr.cf_trabajador");
      $this->db->join("fa_empresa e", "t.cf_empresa = e.cp_empresa");
      $this->db->where($condiciones);
      $this->db->group_by("e.atr_nombre");

      $resultado = $this->db->get()->result();
      return $resultado;
    }



    // transferencias en el último año
    function transferenciasPorEmpresaAno(){
      date_default_timezone_set("America/Santiago");
      $fechaActual = date("Y-m-d");

      $ano = date("Y");
      // var_dump($ano);
      $fechaBusquedaInicio = $ano.'-01-01';
      $fechaBusquedaFinal =  $ano.'-12-31';

      // var_dump($fechaBusquedaInicio);


      $condiciones =  array('tr.atr_fecha >=' => $fechaBusquedaInicio, 'tr.atr_fecha <=' => $fechaBusquedaFinal);

      $this->db->select("e.atr_nombre, SUM(tr.atr_monto) as totalTransferencias");
      $this->db->from("fa_transferencia tr");
      $this->db->join("fa_trabajador t", " t.cp_trabajador = tr.cf_trabajador");
      $this->db->join("fa_empresa e", "t.cf_empresa = e.cp_empresa");
      $this->db->where($condiciones);
      $this->db->group_by("e.atr_nombre");

      $resultado = $this->db->get()->result();
      return $resultado;
    }





}
