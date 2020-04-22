<?php

defined('BASEPATH') OR exit('No direct script access allowed');

class SesionesModel extends CI_Model {

    public function __construct() {
      parent::__construct();
    }

    public function buscarUsuario($correo, $clave) {
      $this->db->select("u.cp_usuario, u.atr_nombre, u.cf_perfil");
      $this->db->from("fa_usuario u");
      $this->db->where("u.atr_correo", $correo);
      $this->db->where("u.atr_clave", $clave);
      return $this->db->get()->result();
    }









}
