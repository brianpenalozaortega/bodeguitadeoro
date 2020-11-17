<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Backend_model extends CI_Model {

    // public function getPermisos($idmenu, $idrol){
    //     $this->db->where("idtb_menu", $idmenu);
    //     $this->db->where("idtb_rol", $idrol);
    //     $resultado = $this->db->get("tb_permiso");
    //     return $resultado->row();
    // }

    // public function getID($url){
    //     $this->db->like("url", $url);
    //     $resultado = $this->db->get("tb_menu");
    //     return $resultado->row();
    // }

    public function contador($estado){
        $this->db->where("idtb_estado", $estado);        
        $resultados = $this->db->get("tb_pedido");
        return $resultados->num_rows();
    }
}