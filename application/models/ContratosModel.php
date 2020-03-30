<?php

defined('BASEPATH') OR exit('No direct script access allowed');

class ContratosModel extends CI_Model {

    public function __construct() {
        parent::__construct();
    }

    function getListadoTrabajadoresContrato(){
      $this->db->select("t.cp_trabajador,t.atr_rut, t.atr_nombres, t.atr_apellidos, e.atr_nombre as empresa, es.atr_nombre as estado ");
      $this->db->from("fa_trabajador t");
      $this->db->join("fa_empresa e", "t.cf_empresa = e.cp_empresa");
      $this->db->join("fa_estado es", "t.cf_estado = es.cp_estado");
      return $this->db->get();
    }

    function getContratosTrabajador($idTrabajador){
      $this->db->select("c.cp_contrato, c.atr_fechaInicio, c.atr_fechaTermino, ca.atr_nombre,  ");
      $this->db->from("fa_contrato c");
      $this->db->join("fa_cargo ca","ca.cp_cargo = c.cf_cargo");
      $this->db->join("fa_documento doc","c.cp_contrato = doc.cf_contrato ");
      $this->db->where("c.cf_trabajador", $idTrabajador);
      $resultado =  $this->db->get()->result();
      return $resultado;
    }

    function getURLContrato($idContrato){
      $this->db->select("doc.atr_nombreDoc, doc.atr_nombreReal");
      $this->db->from("fa_documento doc");
      $this->db->where("doc.cf_contrato", $idContrato);
      $resultado =  $this->db->get()->result();
      return $resultado;
    }

    function cargar_archivo( $nombreReal, $nombreFinal, $ruta, $fechaInicio, $fechaTermino, $fechaActual, $idTrabajador ){
      // 1: Buscar trabajador y obtener id del cargo
      $this->db->select("t.cf_cargo");
      $this->db->from("fa_trabajador t");
      $this->db->where("t.cp_trabajador", $idTrabajador);
      $resultado =  $this->db->get()->result();

      foreach ($resultado as $key=>$t){
        $cargo = $t->cf_cargo;
      }

      // 2: Obtener total de contratos + 1
      $this->db->select('count(*)');
      $this->db->from("fa_contrato c");
      $cantidad_contratos = $this->db->count_all_results();

      // 3: Generar clave de atr_documento
      $arraykey = array("NR70RG", "LSL74T", "42IIQW", "VH6MPA","Z_0RTN","VF88JP0","WT96QF", "E077ES","IF72LE","DG62XK","VP59FY","TJ12BX","TD13MX");
      $arrayN=rand(0,12);
      $key=rand(1,999999);
      $atr_documento = $arraykey[$arrayN]."".$key."".$cantidad_contratos;

      // 3: Crear contrato con atr_documento = codigo generado
      $data = array(
          "cp_contrato" => $atr_documento,
          "atr_fechaInicio" => $fechaInicio,
          "atr_fechaTermino" => $fechaTermino,
          "cf_cargo" => $cargo,
          "cf_trabajador" => $idTrabajador,
      );
      $insert = $this->db->insert("fa_contrato", $data);
      if($insert){
        // 4: Crear doumento con clave primeria = atr_documento descrito en contrato
        $this->db->select('count(*)');
        $this->db->from("fa_contrato c");
        $cantidad_contratos = $this->db->count_all_results();

        $data = array(
            "atr_nombreReal" => $nombreReal,
            "atr_nombreDoc" => $nombreFinal,
            "cf_contrato" => $atr_documento,
            "atr_ruta" => $ruta,
            "atr_fechaCarga" => $fechaActual
        );
        $insert = $this->db->insert("fa_documento", $data);
        if($insert){
          return "ok";
        }else{
          return "error";
        }
      }else{
        return "error";
      }
    }






}
