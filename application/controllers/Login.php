<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Login extends CI_Controller {

    #Constructor
    public function __construct(){
        #Voy a heredar lo que contenga la clase CI_Controller
        parent::__construct();
        #Llamar al model Cliente
        $this->load->model("Cliente_model");
    }

	public function index(){
		if($this->session->userdata("login")){
            redirect(base_url().'index.php/Marketplace');
        }
        else{
            $this->load->view('login');
        }
    }
    
    public function login(){
        $correo = $this->input->post("correo");
        $clave = $this->input->post("clave");

        $res = $this->Cliente_model->login($correo, sha1($clave));

        if(!$res){
            $this->session->set_flashdata("error", "El correo y/o la clave son incorrectos");
            redirect(base_url().'index.php/Login');
        }
        else{
            $data = array(
                'id' => $res->idtb_persona,
                'nombre' => $res->nombre,
                'rol' => $res->idtb_tipo_persona,
                'login' => TRUE
            );
            $this->session->set_userdata($data);
            redirect(base_url()."index.php/Marketplace");
        }
    }

    public function logout(){
        $this->session->sess_destroy();
        redirect(base_url()."index.php/");
    }
}