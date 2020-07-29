<?php

defined('BASEPATH') or exit('No direct script access allowed');

class ModelosModel extends CI_Model
{

    public function __construct()
    {
        parent::__construct();
    }

    function getListadoModelos()
    {
        $this->db->select(" m.cp_modelo, m.atr_descripcion, ma.atr_descripcion as marca ");
        $this->db->from("fa_modelo m");
        $this->db->join("fa_marca ma", "ma.cp_marca = m.cf_marca");

        $resultado =  $this->db->get();
        return $resultado;
    }

    function addModelo($nombre, $marca)
    {
        $data = array(
            "atr_descripcion" => $nombre,
            "cf_marca"        => $marca
        );
        $this->db->insert("fa_modelo", $data);
        registrarActividad();
        return "ok";
    }

    function getDetalleModelo($idModelo)
    {
        $this->db->select(" m.cp_modelo, m.atr_descripcion , m.cf_marca");
        $this->db->from("fa_modelo m");
        $this->db->where("m.cp_modelo", $idModelo);

        $resultado =  $this->db->get()->result();
        return $resultado;
    }

    function editarModelo($idModelo, $nombre, $marca)
    {
        $data = array(
            "atr_descripcion" => $nombre,
            "cf_marca"        => $marca
        );

        $this->db->where('m.cp_modelo', $idModelo);
        $resultado =  $this->db->update("fa_modelo m", $data);
        if ($resultado) {
            registrarActividad();
            return "ok";
        } else {
            return "error";
        }
    }
}
