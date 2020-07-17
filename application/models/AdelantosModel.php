<?php

defined('BASEPATH') or exit('No direct script access allowed');

class AdelantosModel extends CI_Model
{

  public function __construct()
  {
    parent::__construct();
  }

  function getListadoAdelantos()
  {
    $this->db->select(" a.cp_adelanto, a.cf_trabajador, a.atr_tipoCuenta, a.atr_numCuenta, a.atr_monto, b.atr_nombre as banco, t.atr_nombres as nombres, t.atr_apellidos as apellidos, t.atr_rut rutTrabajador, t.cp_trabajador, e.atr_nombre as empresa, e.cp_empresa as id_empresa ");
    $this->db->from("fa_adelanto a");
    $this->db->join("fa_banco b", "b.cp_banco = a.cf_banco");
    $this->db->join("fa_trabajador t", "t.cp_trabajador = a.cf_trabajador");
    $this->db->join("fa_empresa e", "t.cf_empresa = e.cp_empresa");
    $this->db->where("t.cf_estado <> 6");
    return $this->db->get();
  }

  function getHistorialAdelantos()
  {
    $fechaActual = date("Y-m-d");

    $mes = date("m");
    $ano = date("Y");

    $this->db->select("ha.cf_trabajador");
    $this->db->from("fa_historial_adelantos ha");
    $this->db->where("ha.atr_mes", $mes);
    $this->db->where("ha.atr_ano", $ano);
    return $this->db->get();
  }

  function addHistorialAdelanto($monto, $idTrabajador, $fecha, $banco)
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

    $resultado =  $this->db->insert("fa_historial_adelantos", $data);
    return $resultado;
  }

  function getDetalleAdelanto($idAdelanto)
  {
    $this->db->select(" a.cp_adelanto, a.atr_tipoCuenta, a.atr_numCuenta, a.atr_monto, b.atr_nombre as banco, t.atr_nombres as nombres, t.atr_apellidos as apellidos, t.atr_rut rutTrabajador ");
    $this->db->from("fa_adelanto a");
    $this->db->join("fa_banco b", "b.cp_banco = a.cf_banco");
    $this->db->join("fa_trabajador t", "t.cp_trabajador = a.cf_trabajador");
    $this->db->where("a.cf_trabajador", $idAdelanto);
    return $this->db->get()->result();
  }


  function updateAdelanto($idAdelanto, $banco, $tipoCuenta, $numeroCuenta, $monto)
  {

    if (!is_numeric($banco)) {
      $this->db->select(" b.cp_banco ");
      $this->db->from("fa_banco b");
      $this->db->where("b.atr_nombre", $banco);
      $arrayBanco = $this->db->get()->result();

      foreach ($arrayBanco as $key => $value) {
        $banco = $value->cp_banco;
      }
    }

    $data = array(
      "atr_tipoCuenta"       => $tipoCuenta,
      "atr_numCuenta"        => $numeroCuenta,
      "atr_monto"            => $monto,
      "cf_banco"             => $banco
    );

    $this->db->where('cp_adelanto', $idAdelanto);
    $resultado =  $this->db->update("fa_adelanto", $data);

    if ($resultado) {
      return "ok";
    } else {
      return "error";
    }
  }

  function buscarBanco($nombre)
  {
    $this->db->select(" b.cp_banco");
    $this->db->from("fa_banco b");
    $this->db->where("b.atr_nombre", $nombre);
    return $this->db->get()->result();
  }

  function addAdelanto($id, $banco, $tipoCuenta, $numCuenta, $monto)
  {

    // var_dump($id);
    // var_dump($banco);
    // var_dump($tipoCuenta);
    // var_dump($numCuenta);
    // var_dump($monto);
    // exit();

    $data = array(
      "cp_adelanto"       => $id,
      "atr_tipoCuenta"    => $tipoCuenta,
      "atr_numCuenta"     => $numCuenta,
      "atr_monto"         => $monto,
      "cf_banco"          => $banco,
      "cf_trabajador"     => $id
    );
    $result = $this->db->insert("fa_adelanto", $data);

    // var_dump($result);
    // exit();
    return $result;
  }
}
