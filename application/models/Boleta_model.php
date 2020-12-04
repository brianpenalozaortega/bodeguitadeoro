<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Boleta_model extends CI_Model {

    public function getBoletas(){
        $resultados = $this->db->get("tb_boleta");
        return $resultados->result();
    }

    public function saveBoleta($data){
        return $this->db->insert("tb_boleta", $data);
    }

    public function getBoleta($id){
        $this->db->where("idtb_boleta", $id);
        $resultado = $this->db->get("tb_boleta");
        return $resultado->row();
    }

    public function getProductosAutocomplete($valor){
        $this->db->select("p.idtb_producto, p.nombre as label, p.stock, p.precio, c.nombre as categoria");
        $this->db->from("tb_producto p");
        $this->db->join("tb_categoria c", "p.idtb_categoria = c.idtb_categoria");
        $this->db->like("p.nombre", $valor);
        $resultados = $this->db->get();
        return $resultados->result_array();
    }
}