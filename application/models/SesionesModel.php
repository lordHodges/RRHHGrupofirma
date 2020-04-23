<?php

defined('BASEPATH') OR exit('No direct script access allowed');

class SesionesModel extends CI_Model {

    public function __construct() {
      parent::__construct();
    }

    public function cambiarEstado($valorEstado, $usuario){
      $data = array(
          "atr_activo" => $valorEstado
      );
      $this->db->where('cp_usuario', $usuario);
      $resultado =  $this->db->update("fa_usuario", $data);
      if($resultado){
        return "ok";
      }else{
        return "error";
      }
    }

    public function getListadoUsuarios(){
      $this->db->select('u.cp_usuario, u.atr_nombre, u.atr_correo, u.atr_activo, p.atr_nombre as perfil');
      $this->db->from('fa_usuario u');
      $this->db->join('fa_perfil p','p.cp_perfil = u.cf_perfil');
      return $this->db->get();
    }

    public function agregarUsuario($nombre, $correo, $clave, $perfil){
      $data = array(
          "atr_nombre" => $nombre,
          "atr_correo" => $correo,
          "atr_clave"  => $clave,
          "atr_activo" => "1",
          "cf_perfil"  => $perfil
      );
      $resultado =  $this->db->insert("fa_usuario", $data);
      if($resultado){
        return 'ok';
      }else{
        return 'error';
      }
    }

    public function getSelectPerfiles(){
      $this->db->select('p.cp_perfil, p.atr_nombre');
      $this->db->from('fa_perfil p');
      return $this->db->get()->result();
    }

    public function buscarUsuario($correo) {
      $this->db->select("u.cp_usuario, u.atr_nombre, u.cf_perfil, u.atr_clave, u.atr_activo");
      $this->db->from("fa_usuario u");
      $this->db->where("u.atr_correo", $correo);
      return $this->db->get()->result();
    }

    public function listadoPermisos($usuario, $perfil) {
      $this->db->select("pu.cf_existencia_permiso");
      $this->db->from('fa_permiso_usuario pu');
      $this->db->where('pu.cf_usuario',$usuario);
      $resultado =  $this->db->get()->result();

      if (count($resultado) == 0) {
        $this->db->select("pp.cf_existencia_permiso");
        $this->db->from('fa_permiso_perfil pp');
        $this->db->where('pp.cf_perfil',$perfil);
        $resultado =  $this->db->get()->result();
      }
      return $resultado;
    }










}
