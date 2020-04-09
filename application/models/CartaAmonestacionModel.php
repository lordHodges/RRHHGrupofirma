<?php

defined('BASEPATH') OR exit('No direct script access allowed');

class CartaAmonestacionModel extends CI_Model {

    public function __construct() {
        parent::__construct();
    }

    function cargar_comprobante( $nombreReal, $nombreFinal, $ruta, $fecha, $motivo, $grado, $fechaActual, $idTrabajador ){
      // 1: Buscar trabajador y obtener id del cargo
      $this->db->select("t.cf_cargo");
      $this->db->from("fa_trabajador t");
      $this->db->where("t.cp_trabajador", $idTrabajador);
      $resultado =  $this->db->get()->result();

      foreach ($resultado as $key=>$t){
        $cargo = $t->cf_cargo;
      }

      // 2: Obtener total de transferencias + 1
      $this->db->select('count(*)');
      $this->db->from("fa_cartaamonestacion c");
      $cantidad_cartas = $this->db->count_all_results();

      // 3: Generar clave de atr_documento
      $arraykey = array("NR70RG0", "LSL74T0", "42IIQW0", "VH6MPA0","Z_0RTN0","VF88JP00","WT96QF0", "E077ES0","IF72LE0","DG62XK0","VP59FY0","TJ12BX0","TD13MX0");
      $arrayN=rand(0,12);
      $key=rand(1,999999);
      $atr_documento = $arraykey[$arrayN]."".$key."".$cantidad_cartas;

      // 3: Crear carta de amonestación con atr_documento = codigo generado
      $data = array(
          "cp_cartaAmonestacion" => $atr_documento,
          "atr_motivo" => $motivo,
          "atr_grado" => $grado,
          "atr_fecha" => $fecha,
          "cf_trabajador" => $idTrabajador,
      );
      $insert = $this->db->insert("fa_cartaamonestacion", $data);

      if($insert){
        // 4: Crear doumento con clave primeria = atr_documento descrito en contrato
        $this->db->select('count(*)');
        $this->db->from("fa_transferencia t");
        $cantidad_transferencias = $this->db->count_all_results();

        $data = array(
            "atr_nombreReal" => $nombreReal,
            "atr_nombreDoc" => $nombreFinal,
            "cf_cartaamonestacion" => $atr_documento,
            "atr_ruta" => $ruta,
            "atr_fechaCarga" => $fechaActual,
            "atr_tipo" => 'carta de amonestación'
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

    function getTransferenciasTrabajador($idTrabajador){
      $this->db->select("ca.cp_transferencia, ca.atr_motivo, ca.atr_grado");
      $this->db->from("fa_cartaamonestacion ca");
      $this->db->join("fa_documento doc","ca.cp_transferencia = doc.cf_cartaamonestacion");
      $this->db->join("fa_trabajador t","t.cp_trabajador = tr.cf_trabajador");
      $this->db->order_by('ca.atr_fecha', 'DESC');
      $this->db->where("ca.cf_trabajador", $idTrabajador);
      $resultado =  $this->db->get()->result();
      return $resultado;
    }

    function getURLTransferencia($idTransferencia){
      $this->db->select("doc.atr_nombreDoc, doc.atr_nombreReal");
      $this->db->from("fa_documento doc");
      $this->db->where("doc.cf_transferencia", $idTransferencia);
      $resultado =  $this->db->get()->result();
      return $resultado;
    }










}
