<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Pedido_model extends CI_Model {

    public function getPedidos(){
        $this->db->select("p.*, e.nombre as estado");
        $this->db->from("tb_pedido p");
        $this->db->join("tb_estado e", "p.idtb_estado = e.idtb_estado");
        $resultados = $this->db->get();
        if($resultados->num_rows() > 0){
            return $resultados->result();
        }
        else{
            return false;
        }
    }

    public function getPedido($idpedido){
        $this->db->select("ped.*, per.*");
        // , per.nombre, c.direccion, c.telefono, c.documento, tc.nombre as tipocomprobante
        $this->db->from("tb_pedido ped");
        $this->db->join("tb_persona per", "ped.idtb_persona = per.idtb_persona");
        // $this->db->join("tb_tipo_comprobante tc", "v.idtb_tipo_comprobante = tc.idtb_tipo_comprobante");
        $this->db->where("ped.idtb_pedido", $idpedido);
        $resultado = $this->db->get();
        return $resultado->row();
    }
    public function getDetallePedido($idpedido){
        $this->db->select("dp.*, p.*, c.nombre as categoria");
        $this->db->from("tb_detalle_pedido dp");
        $this->db->join("tb_producto p", "dp.idtb_producto = p.idtb_producto");
        $this->db->join("tb_categoria c", "p.idtb_categoria = c.idtb_categoria");
        $this->db->where("dp.idtb_pedido", $idpedido);
        $resultados = $this->db->get();
        return $resultados->result();
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

    public function getPedidosByCliente(){
        $this->db->select("p.*, e.nombre as estado");
        $this->db->from("tb_pedido p");
        // $this->db->join("tb_detalle_pedido pd", "pd.idtb_pedido = pd.idtb_pedido");
        $this->db->join("tb_estado e", "p.idtb_estado = e.idtb_estado");
        $this->db->where("p.idtb_persona = ", $this->session->userdata("id"));
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
    public function saveDetallePedido($data){
        //Devuelve valor booleano
        return $this->db->insert("tb_detalle_pedido", $data);
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