<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Pedido_model extends CI_Model {

    public function getVentas(){
        $this->db->select("v.*, c.nombre, tc.nombre as tipocomprobante");
        $this->db->from("tb_venta v");
        $this->db->join("tb_cliente c", "v.idtb_cliente = c.idtb_cliente");
        $this->db->join("tb_tipo_comprobante tc", "v.idtb_tipo_comprobante = tc.idtb_tipo_comprobante");
        $resultados = $this->db->get();
        if($resultados->num_rows() > 0){
            return $resultados->result();
        }
        else{
            return false;
        }
    }
    // public function getVentas(){
    //     $this->db->select("c.*, tc.nombre as tipocliente, td.nombre as tipodocumento");
    //     $this->db->from("tb_cliente c");
    //     $this->db->join("tb_tipo_cliente tc", "c.idtb_tipo_cliente = tc.idtb_tipo_cliente");
    //     $this->db->join("tb_tipo_documento td", "c.idtb_tipo_documento = td.idtb_tipo_documento");
    //     $this->db->where("c.estado", "1");
    //     $resultados = $this->db->get();
    //     return $resultados->result();
    // }

    public function getVenta($id){
        $this->db->select("v.*, c.nombre, c.direccion, c.telefono, c.documento, tc.nombre as tipocomprobante");
        $this->db->from("tb_venta v");
        $this->db->join("tb_cliente c", "v.idtb_cliente = c.idtb_cliente");
        $this->db->join("tb_tipo_comprobante tc", "v.idtb_tipo_comprobante = tc.idtb_tipo_comprobante");
        $this->db->where("v.idtb_venta", $id);
        $resultado = $this->db->get();
        return $resultado->row();
    }

    public function getVentasByDate($fechainicio, $fechafin){
        $this->db->select("v.*, c.nombre, tc.nombre as tipocomprobante");
        $this->db->from("tb_venta v");
        $this->db->join("tb_cliente c", "v.idtb_cliente = c.idtb_cliente");
        $this->db->join("tb_tipo_comprobante tc", "v.idtb_tipo_comprobante = tc.idtb_tipo_comprobante");
        $this->db->where("v.fecha >= ", $fechainicio);
        $this->db->where("v.fecha <= ", $fechafin);
        $resultados = $this->db->get();
        if($resultados->num_rows() > 0){
            return $resultados->result();
        }
        else{
            return false;
        }
    }

    public function getProductosAutocomplete($valor){
        $this->db->select("idtb_producto, codigo, nombre as label, precio, stock");
        $this->db->from("tb_producto");
        $this->db->like("nombre", $valor);
        $resultados = $this->db->get();
        return $resultados->result_array();
    }

    public function save($data){
        //Devuelve valor booleano
        return $this->db->insert("tb_pedido", $data);
    }

    // Asi es, esta bien ... sin tabla
    // Capturar ID de ultima venta creada
    public function getLastID(){
        return $this->db->insert_id();
    }

    public function anhos(){
        $this->db->select("YEAR(fecha) as year");
        $this->db->from("tb_venta");
        $this->db->group_by("year");
        $this->db->order_by("year desc");
        $resultados = $this->db->get();
        return $resultados->result();
    }

    // SELECT MONTH(fecha) as mes, SUM(total) as monto FROM `tb_venta` WHERE YEAR(fecha) in (2015)
    public function montos($year){
        $this->db->select("MONTH(fecha) as mes, SUM(total) as monto");
        $this->db->from("tb_venta");
        $this->db->where("fecha >=", $year."-01-01");
        $this->db->where("fecha <=", $year."-12-31");
        $this->db->group_by("mes");
        $this->db->order_by("mes");
        $resultados = $this->db->get();
        return $resultados->result();
    }

    public function getCliente($id){
        $this->db->where("idtb_cliente", $id);
        $resultado = $this->db->get("tb_cliente");
        return $resultado->row();
    }

    public function updateCliente($id, $data){
        $this->db->where("idtb_cliente", $id);
        return $this->db->update("tb_cliente", $data);
    }
}