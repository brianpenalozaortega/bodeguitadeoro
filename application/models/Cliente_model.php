<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Cliente_model extends CI_Model {

    public function login($correo, $clave){
        $this->db->where("correo", $correo);
        $this->db->where("clave", $clave);

        $resultados = $this->db->get("tb_persona");
        if ($resultados->num_rows() == 1) {
            return $resultados->row();
        }
        else{
            return false;
        }
    }

    public function getUsuarios(){
        $this->db->select("u.*, r.nombre as rol");
        $this->db->from("tb_usuario u");
        $this->db->join("tb_rol r", "u.idtb_rol = r.idtb_rol");
        $this->db->where("u.estado", "1");
        $resultados = $this->db->get();
        return $resultados->result();
    }

    public function saveUsuario($data){
        return $this->db->insert("tb_usuario", $data);
    }

    public function getUsuario($id){
        $this->db->select("u.*, r.nombre as rol");
        $this->db->from("tb_usuario u");
        $this->db->join("tb_rol r", "u.idtb_rol = r.idtb_rol");
        $this->db->where("u.idtb_usuario", $id);
        $this->db->where("u.estado", "1");
        $resultado = $this->db->get();
        return $resultado->row();
    }

    public function updateUsuario($id, $data){
        $this->db->where("idtb_usuario", $id);
        return $this->db->update("tb_usuario", $data);
    }
}
