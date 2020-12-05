<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class DetalleBoleta_model extends CI_Model {

    public function getDetalleBoleta($id){
        $this->db->select("db.*, p.*, c.nombre as categoria");
        $this->db->from("tb_detalle_boleta db");
        $this->db->join("tb_producto p", "db.idtb_producto = p.idtb_producto");
        $this->db->join("tb_categoria c", "p.idtb_categoria = c.idtb_categoria");
        $this->db->where("db.idtb_boleta", $id);
        $resultados = $this->db->get();
        return $resultados->result();
    }

    public function saveDetalleBoleta($data){
        return $this->db->insert("tb_detalle_boleta", $data);
    }
}