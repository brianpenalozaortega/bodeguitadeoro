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

    public function getClientes(){
        $this->db->select("p.*, c.*");
        $this->db->from("tb_persona p");
        $this->db->join("tb_tipo_persona tp", "tp.idtb_tipo_persona = p.idtb_tipo_persona");
        $this->db->join("tb_cliente c", "c.idtb_persona = p.idtb_persona");
        $this->db->where("p.idtb_tipo_persona", "2");
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
