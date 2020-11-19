<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Estado_model extends CI_Model {

    public function getEstados(){
        $resultados = $this->db->get("tb_estado");
        return $resultados->result();
    }

    public function getCategoria($id){
        $this->db->where("idtb_categoria", $id);
        $resultado = $this->db->get("tb_categoria");
        return $resultado->row();
    }
}