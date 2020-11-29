<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Compra extends CI_Controller {

    #Constructor
    public function __construct(){
        #Voy a heredar lo que contenga la clase CI_Controller
        parent::__construct();

        if(!$this->session->userdata("login")){
            redirect(base_url()."index.php/Login");
        }

        $this->load->model("Pedido_model");
    }

    // Metodo que permite visualizar al cliente los pedidos realizados
    public function index(){
        $data = array(
            'clientepedidos' => $this->Pedido_model->getPedidosByCliente()
        );
		$this->load->view('clientelayouts/clienteheader');
		$this->load->view('compra/list', $data);
		$this->load->view('clientelayouts/clientefooter');
    }

    // Hay 2 maneras, esta es una de ellas
    public function view(){
        $idpedido = $this->input->post("id");

        $data = array(
            'pedido' => $this->Pedido_model->getPedido($idpedido),
            'detalles' => $this->Pedido_model->getDetallePedido($idpedido)
        );

        $this->load->view("pedido/view", $data);
    }

}
