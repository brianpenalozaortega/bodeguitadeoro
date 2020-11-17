<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Pedido extends CI_Controller {

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
            'pedidos' => $this->Pedido_model->getPedidos()
        );
		$this->load->view('layouts/header');
		$this->load->view('layouts/aside');
		$this->load->view('pedido/list', $data);
		$this->load->view('layouts/footer');
    }

	public function view($id){
        $data = array(
            'pedido' => $this->Pedido_model->getPedido($id)
        );
		$this->load->view('pedido/view', $data);
    }

}
