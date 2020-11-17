<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Persona_model extends CI_Model {

    public function auth($correo, $clave){
        $this->db->select("p.*");
        $this->db->from("tb_persona p");
        $this->db->join("tb_tipo_persona tp", "p.idtb_tipo_persona = tp.idtb_tipo_persona");
        $this->db->where("p.correo", $correo);
        $this->db->where("p.clave", $clave);
        $this->db->where("p.idtb_tipo_persona", 1);
        $resultados = $this->db->get();

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

    public function savepersona($data){
        return $this->db->insert("tb_persona", $data);
    }

    public function getLastID(){
        return $this->db->insert_id();
    }

    public function savecliente($data){
        return $this->db->insert("tb_cliente", $data);
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
