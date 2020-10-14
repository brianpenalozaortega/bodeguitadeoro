<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Producto_model extends CI_Model {

    public function getProductos(){
        $this->db->select("p.*, c.nombre as categoria");
        $this->db->from("tb_producto p");
        $this->db->join("tb_categoria c", "p.idtb_categoria = c.idtb_categoria");
        $resultados = $this->db->get();
        return $resultados->result();
    }

    public function saveProducto($data){
        //Devuelve valor booleano
        return $this->db->insert("tb_producto", $data);
    }

    public function getProducto($id){
        $this->db->where("idtb_producto", $id);
        $resultado = $this->db->get("tb_producto");
        return $resultado->row();
    }

    public function updateProducto($id, $data){
        $this->db->where("idtb_producto", $id);
        return $this->db->update("tb_producto", $data);
    }
}