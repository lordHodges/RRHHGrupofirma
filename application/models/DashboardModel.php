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
      return $this->db->get();
    }

    // Suma los montos transferidos por banco
    function transferenciasPorBancoMes(){

      date_default_timezone_set("America/Santiago");
      $fechaActual = date("Y-m-d");

      $dia = date("d");
      $mes = date("m");
      $ano = date("Y");

      if( $mes == "01"){
        $mes = "12";
        $ano = $ano - 1;
        $fechaBusquedaInicio = $ano."-".$mes."-".$dia;
      }else{
        $mes = $mes - 1;
        if( $mes < 10){
          $mes = "0".$mes;
        }
        $fechaBusquedaInicio = $ano."-".$mes."-".$dia;
      }

      $condiciones =  array('t.atr_fecha >=' => $fechaBusquedaInicio, 't.atr_fecha <=' => $fechaActual);

      $this->db->select("b.atr_nombre, SUM(t.atr_monto) as totalTransferencias");
      $this->db->from("fa_transferencia t");
      $this->db->join("fa_banco b", " b.cp_banco = t.cf_banco");
      $this->db->where($condiciones);
      $this->db->group_by("b.atr_nombre");

      $resultado = $this->db->get()->result();
      return $resultado;
    }
}
