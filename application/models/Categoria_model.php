<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Categoria_model extends CI_Model {

    public function getCategorias(){
        $resultados = $this->db->get("tb_categoria");
        return $resultados->result();
    }

    public function saveCategoria($data){
        return $this->db->insert("tb_categoria", $data);
    }

    public function getCategoria($id){
        $this->db->where("idtb_categoria", $id);
        $resultado = $this->db->get("tb_categoria");
        return $resultado->row();
    }

    public function updateCategoria($id, $data){
        $this->db->where("idtb_categoria", $id);
        return $this->db->update("tb_categoria", $data);
    }
}