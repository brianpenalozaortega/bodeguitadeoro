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

        #Llamar al model Pedido
        $this->load->model("Pedido_model");
    }

	public function index(){
        $data = array(
            "registrados" => $this->Backend_model->contador(1),
            "listos" => $this->Backend_model->contador(2),
            "delivery" => $this->Backend_model->contador(3),
            "completados" => $this->Backend_model->contador(4),
            "years" => $this->Pedido_model->anhos()
        );
		$this->load->view('layouts/header');
		$this->load->view('layouts/aside');
		$this->load->view('dashboard', $data);
		$this->load->view('layouts/footer');
    }
    
}