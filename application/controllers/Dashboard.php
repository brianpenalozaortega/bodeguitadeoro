<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Dashboard extends CI_Controller {

    #Constructor
    public function __construct(){
        #Voy a heredar lo que contenga la clase CI_Controller
        parent::__construct();

        if(!$this->session->userdata("auth")){
            redirect(base_url()."index.php/Auth");
        }        

        #Llamar al model Persona
        $this->load->model("Persona_model");
    }

	public function index(){
		$this->load->view('layouts/header');
		$this->load->view('layouts/aside');
		$this->load->view('dashboard');
		$this->load->view('layouts/footer');
    }
    
    public function indexz(){
        $correo = $this->input->post("correo");
        $clave = $this->input->post("clave");

        $res = $this->Persona_model->login($correo, sha1($clave));

        if(!$res){
            $this->session->set_flashdata("error", "El correo y/o la clave son incorrectos");
            redirect(base_url().'index.php/Auth');
        }
        else{
            $data = array(
                'id' => $res->idtb_persona,
                'nombre' => $res->nombre,
                'rol' => $res->idtb_tipo_persona,
                'auth' => TRUE
            );
            $this->session->set_userdata($data);
            redirect(base_url()."index.php/Dashboard");
        }
    }
}