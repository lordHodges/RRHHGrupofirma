<?php

defined('BASEPATH') OR exit('No direct script access allowed');

class TransferenciasModel extends CI_Model {

    public function __construct() {
        parent::__construct();
    }

    function cargar_comprobante( $motivo, $banco, $nombreReal, $nombreFinal, $ruta, $fechaTransferencia, $monto, $fechaActual, $idTrabajador ){
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
      $this->db->from("fa_transferencia t");
      $cantidad_transferencias = $this->db->count_all_results();

      // 3: Generar clave de atr_documento
      $arraykey = array("NR70RG0", "LSL74T0", "42IIQW0", "VH6MPA0","Z_0RTN0","VF88JP00","WT96QF0", "E077ES0","IF72LE0","DG62XK0","VP59FY0","TJ12BX0","TD13MX0");
      $arrayN=rand(0,12);
      $key=rand(1,999999);
      $atr_documento = $arraykey[$arrayN]."".$key."".$cantidad_transferencias;

      // 3: Crear transferencia con atr_documento = codigo generado
      $data = array(
          "cp_transferencia" => $atr_documento,
          "atr_fecha" => $fechaTransferencia,
          "atr_monto" => $monto,
          "cf_trabajador" => $idTrabajador,
          "cf_banco" => $banco,
      );
      $insert = $this->db->insert("fa_transferencia", $data);

      if($insert){
        // 4: Crear doumento con clave primeria = atr_documento descrito en contrato
        $this->db->select('count(*)');
        $this->db->from("fa_transferencia t");
        $cantidad_transferencias = $this->db->count_all_results();

        $data = array(
            "atr_nombreReal" => $nombreReal,
            "atr_nombreDoc" => $nombreFinal,
            "cf_transferencia" => $atr_documento,
            "atr_ruta" => $ruta,
            "atr_fechaCarga" => $fechaActual,
            "atr_tipo" => $motivo,
            "atr_fechacronologica" => $fechaTransferencia,
            "cf_trabajador" => $idTrabajador,
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

    function getBancos(){
      $this->db->select("b.cp_banco, b.atr_nombre, b.atr_sitio");
      $this->db->from("fa_banco b");
      $resultado =  $this->db->get()->result();
      return $resultado;
    }

    function getTransferenciasTrabajador($idTrabajador){
      $this->db->select("tr.cp_transferencia, tr.atr_fecha, tr.atr_monto, doc.atr_tipo");
      $this->db->from("fa_transferencia tr");
      $this->db->join("fa_documento doc","tr.cp_transferencia = doc.cf_transferencia ");
      $this->db->join("fa_trabajador t","t.cp_trabajador = tr.cf_trabajador");
      $this->db->order_by('tr.atr_fecha', 'DESC');
      $this->db->where("tr.cf_trabajador", $idTrabajador);
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
