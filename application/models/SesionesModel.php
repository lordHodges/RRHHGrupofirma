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

    public function cambiarPass($usuario,$pass){
      $pass = md5($pass);
      $data = array(
          "atr_clave" => $pass
      );
      $this->db->where('cp_usuario', $usuario);
      $resultado =  $this->db->update("fa_usuario", $data);

      if($resultado){
        return "ok";
      }else{
        return "error";
      }
    }

    public function editarUsuario($nombre, $correo, $perfil, $idUsuario){

      if ($perfil == "vacio") {
        $data = array(
            "atr_nombre" => $nombre,
            "atr_correo" => $correo
        );
      }else{
        // eliminar todos los permisos especiales como usuario
        $this->db->where('cf_usuario', $idUsuario);
        $this->db->delete('fa_permiso_usuario');

        $data = array(
            "atr_nombre" => $nombre,
            "atr_correo" => $correo,
            "cf_perfil"  => $perfil
        );
      }

      // siempre se actualiza, pero no se sabe si el perfil esta o no siendo actualizado.
      $this->db->where('cp_usuario', $idUsuario);
      $resultado =  $this->db->update("fa_usuario", $data);

      if($resultado){
        return "ok";
      }else{
        return "error";
      }
    }



    public function editarMiPerfil($nombre, $correo, $clave, $idUsuario){

      if ($clave == "vacio") {
        $data = array(
            "atr_nombre" => $nombre,
            "atr_correo" => $correo
        );
      }else{
        $data = array(
            "atr_nombre" => $nombre,
            "atr_correo" => $correo,
            "atr_clave"  => $clave
        );
      }

      // siempre se actualiza, pero no se sabe si el perfil esta o no siendo actualizado.
      $this->db->where('cp_usuario', $idUsuario);
      $resultado =  $this->db->update("fa_usuario", $data);

      if($resultado){
        return "ok";
      }else{
        return "error";
      }
    }

















    // ¡ ¡ ¡ ESTO ESTA EN EDICIÓN ! ! !
    public function detallePermisosUsuario(){
      $this->db->select('m.cp_modulo, m.atr_nombre');
      $this->db->from('fa_modulo m');
      $modulos =  $this->db->get()->result();

      foreach ($modulos as $key => $m) {
        $this->db->select('p.atr_descripcion');
        $this->db->from('fa_existencia_permiso ep');
        $this->db->join('fa_permiso p','p.cp_permiso = ep.cf_permiso');
        $this->db->where('ep.cf_modulo',$m);
        return  $this->db->get()->result();
      }
    }































    public function getPermisosUsuario(){
      // $this->db->select('pu.cf_existencia_permiso, p.atr_descripcion as permiso');
      // $this->db->from('fa_permiso_usuario pu');
      // $this->db->join('fa_existencia_permiso ep','ep.cp_existencia_permiso = pu.cf_existencia_permiso');
      // $this->db->join('fa_modulo m','m.cp_modulo = ep.cf_modulo');
      // $this->db->join('fa_permiso p','p.cp_permiso = ep.cf_permiso');
      // // $this->db->where('');
      // $this->db->group_by("m.atr_nombre");



      $this->db->select('p.atr_descripcion as permiso, m.atr_nombre as modulo');
      $this->db->from('fa_existencia_permiso ep');
      $this->db->join('fa_modulo m','m.cp_modulo = ep.cf_modulo');
      $this->db->join('fa_permiso p','p.cp_permiso = ep.cf_permiso');
      // $this->db->where('');
      $this->db->group_by("p.atr_nombre");
      return $this->db->get()->result();
    }

    public function getListadoPermisosExistentes(){
      $this->db->select('ep.cp_existencia_permiso, m.atr_nombre as modulo, p.atr_descripcion as permiso');
      $this->db->from('fa_existencia_permiso ep');
      $this->db->join('fa_modulo m','m.cp_modulo = ep.cf_modulo');
      $this->db->join('fa_permiso p','p.cp_permiso = ep.cf_permiso');
      // $this->db->where('');
      // $this->db->group_by("p.atr_nombre");
      return $this->db->get()->result();
    }



    public function cargarUsuariosConPerfil(){
      $this->db->select('u.atr_nombre, pu.cf_existencia_permiso, u.cp_usuario');
      $this->db->from('fa_permiso_usuario pu');
      $this->db->join('fa_usuario u','u.cp_usuario = pu.cf_usuario');
      $this->db->group_by("pu.cf_usuario");
      return $this->db->get()->result();
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

    public function getPerfiles(){
      $this->db->select('p.cp_perfil, p.atr_nombre');
      $this->db->from('fa_perfil p');
      return $this->db->get();
    }

    public function buscarUsuario($correo) {
      $this->load->database('firmaAbogados');

      $this->db->select("u.cp_usuario, u.atr_nombre, u.cf_perfil, u.atr_clave, u.atr_activo, u.atr_correo");
      $this->db->from("fa_usuario u");
      $this->db->where("u.atr_correo", $correo);
      return $this->db->get()->result();
    }

    public function buscarUsuarioPorID($id) {
      $this->db->select("u.cp_usuario, u.atr_nombre, u.cf_perfil, u.atr_clave, u.atr_activo, u.atr_correo");
      $this->db->from("fa_usuario u");
      $this->db->where("u.cp_usuario", $id);
      return $this->db->get()->result();
    }

    public function buscarPerfil($idPerfil) {
      $this->db->select("p.atr_nombre");
      $this->db->from("fa_perfil p");
      $this->db->where("p.cp_perfil", $idPerfil);
      return $this->db->get()->result();
    }

    public function listadoPermisos($usuario, $perfil) {
      $this->db->select("pu.cf_existencia_permiso, ep.cf_modulo");
      $this->db->from('fa_permiso_usuario pu');
      $this->db->join('fa_existencia_permiso ep', 'ep.cp_existencia_permiso = pu.cf_existencia_permiso');
      $this->db->join('fa_modulo m', 'm.cp_modulo = ep.cf_modulo');
      $this->db->where('pu.cf_usuario',$usuario);
      $resultado =  $this->db->get()->result();


      if (count($resultado) == 0) {
        $this->db->select("pp.cf_existencia_permiso");
        $this->db->from('fa_permiso_perfil pp');
        $this->db->join('fa_existencia_permiso ep', 'ep.cp_existencia_permiso = pp.cf_existencia_permiso');
        $this->db->join('fa_modulo m', 'm.cp_modulo = ep.cf_modulo');
        $this->db->where('pp.cf_perfil',$perfil);
        $resultado =  $this->db->get()->result();
      }
      return $resultado;
    }

    public function listadoModulos($usuario, $perfil) {
      $this->db->select("mu.cf_menu");
      $this->db->from('fa_menu_usuario mu');
      $this->db->where('mu.cf_usuario',$usuario);
      $resultado =  $this->db->get()->result();


      if (count($resultado) == 0) {
        $this->db->select("mp.cf_menu");
        $this->db->from('fa_menu_perfil mp');
        $this->db->where('mp.cf_perfil',$perfil);
        $resultado =  $this->db->get()->result();
      }
      return $resultado;
    }










}
