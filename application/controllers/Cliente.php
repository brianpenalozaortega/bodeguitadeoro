<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Cliente extends CI_Controller {

    #Constructor
    public function __construct(){
        #Voy a heredar lo que contenga la clase CI_Controller
        parent::__construct();

        if(!$this->session->userdata("auth")){
            redirect(base_url()."index.php/Auth");
        }

        #Llamar al model Cliente
        $this->load->model("Cliente_model");
    }

	public function index(){
        $data = array(
            'clientes' => $this->Cliente_model->getClientes()
        );
		$this->load->view('layouts/header');
		$this->load->view('layouts/aside');
		$this->load->view('cliente/list', $data);
		$this->load->view('layouts/footer');
    }

	public function view($id){
        $data = array(
            'categoria' => $this->Categoria_model->getCategoria($id)
        );
		$this->load->view('categoria/view', $data);
    }

}
