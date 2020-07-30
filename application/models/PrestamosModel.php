<?php

defined('BASEPATH') or exit('No direct script access allowed');

class PrestamosModel extends CI_Model
{

    public function __construct()
    {
        parent::__construct();
    }


    function getListadoPrestamosTrabajador()
    {
        $this->db->select(" p.cp_prestamo, p.atr_fechaPrestamo, p.atr_montoTotal, p.atr_cantidadCuotas, t.atr_rut, t.atr_nombres, t.atr_apellidos ");
        $this->db->from("fa_prestamo p");
        $this->db->join("fa_trabajador t", "t.cp_trabajador = p.cf_trabajador ");
        $this->db->order_by('p.atr_fechaPrestamo', 'DESC');
        $resultado =  $this->db->get();
        return $resultado;
    }


    function obtenerRutTrabajador($idTrabajador)
    {
        $this->db->select(" t.atr_rut ");
        $this->db->from("fa_trabajador t");
        $this->db->where('t.cp_trabajador', $idTrabajador);
        $resultado =  $this->db->get()->result();
        return $resultado;
    }


    function addPrestamo($montoTotal, $totalCuotas, $idTrabajador, $autoriza, $observacion)
    {
        $fechaActual = date("Y-m-d");

        $dia = date("d");
        $mes = date("m");
        $ano = date("Y");

        $fechaActual = $ano . "-" . $mes . "-" . $dia;

        $data = array(
            "atr_montoTotal"      => $montoTotal,
            "atr_fechaPrestamo"   => $fechaActual,
            "atr_cantidadCuotas"  => $totalCuotas,
            "atr_autoriza"        => $autoriza,
            "atr_observacion"     => $observacion,
            "cf_trabajador"       => $idTrabajador
        );

        $this->db->insert("fa_prestamo", $data);
        $ultimoId = $this->db->insert_id();
        return $ultimoId;
    }

    function addDetallePrestamo($idTrabajador, $numCuota, $montoDetalle, $fechaDetalle, $cfPrestamo)
    {

        $data = array(
            "atr_numCuota"      => $numCuota,
            "atr_montoDescontar"   => $montoDetalle,
            "atr_fechaDescuento"  => $fechaDetalle,
            "atr_estado"       => '0',
            "cf_prestamo"       => $cfPrestamo
        );
        $resultado = $this->db->insert("fa_detalle_prestamo", $data);
        registrarActividad();
        return $resultado;
    }


    function getDetallePrestamo($idPrestamo)
    {
        $this->db->select(" dp.atr_numCuota, dp.atr_montoDescontar, dp.atr_fechaDescuento, dp.atr_estado ");
        $this->db->from("fa_detalle_prestamo dp");
        $this->db->where('dp.cf_prestamo', $idPrestamo);
        $this->db->order_by('dp.atr_numCuota', 'ASC');
        $resultado =  $this->db->get()->result();
        return $resultado;
    }

    function getPrestamo($idPrestamo)
    {
        $this->db->select(" p.cp_prestamo, p.atr_montoTotal, p.atr_fechaPrestamo, p.atr_cantidadCuotas, t.atr_nombres, t.atr_apellidos, t.atr_rut, c.atr_nombre as cargo, e.atr_run as rut_empresa, e.atr_nombre as empresa");
        $this->db->from("fa_prestamo p");
        $this->db->join('fa_trabajador t', 't.cp_trabajador = p.cf_trabajador');
        $this->db->join('fa_cargo c', 't.cf_cargo = c.cp_cargo');
        $this->db->join('fa_empresa e', 't.cf_empresa = e.cp_empresa');
        $this->db->where('p.cp_prestamo', $idPrestamo);
        $resultado =  $this->db->get()->result();
        return $resultado;
    }


    function editarDetalleDePrestamo($idPrestamo, $numCuota, $montoCuota, $fechaPago)
    {
        $data = array(
            "atr_montoDescontar"    => $montoCuota,
            "atr_fechaDescuento"    => $fechaPago
        );
        $this->db->where('cf_prestamo', $idPrestamo);
        $this->db->where('atr_numCuota', $numCuota);
        $resultado =  $this->db->update("fa_detalle_prestamo", $data);
        if ($resultado) {
            registrarActividad();
            return "ok";
        } else {
            return "error";
        }
    }

    function getURLPrestamo($idPrestamo)
    {
        $this->db->select("doc.atr_nombreDoc, doc.atr_nombreReal");
        $this->db->from("fa_documento doc");
        $this->db->where("doc.cf_prestamo", $idPrestamo);
        $resultado =  $this->db->get()->result();
        return $resultado;
    }

    function cargar_prestamo($nombreReal, $nombreFinal, $ruta, $fecha, $fechaActual, $idTrabajador)
    {

        $this->db->select(" p.cp_prestamo ");
        $this->db->from("fa_prestamo p");
        $this->db->where('p.atr_fechaPrestamo', $fecha);
        $this->db->where('p.cf_trabajador', $idTrabajador);
        $resultado =  $this->db->get()->result();

        foreach ($resultado as $key => $p) {
            $idPrestamo = $p->cp_prestamo;
        }


        $data = array(
            "atr_nombreReal" => $nombreReal,
            "atr_nombreDoc" => $nombreFinal,
            "cf_prestamo" => $idPrestamo,
            "atr_ruta" => $ruta,
            "atr_fechaCarga" => $fechaActual,
            "atr_tipo" => 'Préstamo',
            "atr_fechacronologica" => $fecha,
            "cf_trabajador" => $idTrabajador,
        );
        $insert = $this->db->insert("fa_documento", $data);
        if ($insert) {
            registrarActividad();
            return "ok";
        } else {
            return "error";
        }
    }
}
