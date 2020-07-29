<?php

defined('BASEPATH') or exit('No direct script access allowed');

class FiniquitosModel extends CI_Model
{

  public function __construct()
  {
    parent::__construct();
  }

  function getFiniquitosTrabajador($idTrabajador)
  {
    $this->db->select("f.cp_finiquito, f.atr_fecha, f.atr_total  ");
    $this->db->from("fa_documento doc");
    $this->db->join("fa_finiquito f", "f.cp_finiquito = doc.cf_finiquito ");
    $this->db->order_by('f.atr_fecha', 'DESC');
    $this->db->where("doc.cf_trabajador", $idTrabajador);

    $resultado =  $this->db->get()->result();
    return $resultado;
  }


  function getURLFiniquito($idFiniquito)
  {
    $this->db->select("doc.atr_nombreDoc, doc.atr_nombreReal");
    $this->db->from("fa_documento doc");
    $this->db->where("doc.cf_finiquito", $idFiniquito);
    $resultado =  $this->db->get()->result();
    return $resultado;
  }


  function cargar_finiquito($fecha, $fechaCarga, $total, $nombreReal, $nombreFinal, $ruta, $monto, $idTrabajador)
  {
    // 1: Buscar trabajador y obtener id del cargo
    $this->db->select("t.cf_cargo");
    $this->db->from("fa_trabajador t");
    $this->db->where("t.cp_trabajador", $idTrabajador);
    $resultado =  $this->db->get()->result();

    foreach ($resultado as $key => $t) {
      $cargo = $t->cf_cargo;
    }

    // 2: Obtener total de transferencias + 1
    $this->db->select('count(*)');
    $this->db->from("fa_finiquito f");
    $cantidad_finiquitos = $this->db->count_all_results();

    // 3: Generar clave de atr_documento
    $arraykey = array("NR70RG0", "LSL74T0", "42IIQW0", "VH6MPA0", "Z_0RTN0", "VF88JP00", "WT96QF0", "E077ES0", "IF72LE0", "DG62XK0", "VP59FY0", "TJ12BX0", "TD13MX0");
    $arrayN = rand(0, 12);
    $key = rand(1, 999999);
    $atr_documento = $arraykey[$arrayN] . "" . $key . "" . $cantidad_finiquitos;

    // 3: Crear finiquito con atr_documento = codigo generado
    $data = array(
      "cp_finiquito" => $atr_documento,
      "atr_fecha" => $fecha,
      "atr_total" => $total,
      "cf_trabajador" => $idTrabajador
    );
    $insert = $this->db->insert("fa_finiquito", $data);
    registrarActividad();

    if ($insert) {
      // 4: Crear doumento con clave primeria = atr_documento descrito en contrato
      $this->db->select('count(*)');
      $this->db->from("fa_finiquito f");
      $cantidad_finiquitos = $this->db->count_all_results();

      $data = array(
        "atr_nombreReal" => $nombreReal,
        "atr_nombreDoc" => $nombreFinal,
        "cf_finiquito" => $atr_documento,
        "atr_ruta" => $ruta,
        "atr_fechaCarga" => $fechaCarga,
        "atr_fechacronologica" => $fecha,
        "cf_trabajador" => $idTrabajador
      );
      $insert = $this->db->insert("fa_documento", $data);
      if ($insert) {
        registrarActividad();
        return "ok";
      } else {
        return "error";
      }
    } else {
      return "error";
    }
  }
}
