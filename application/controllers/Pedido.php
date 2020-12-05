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

        #Llamar al model Pedido y Estado
        $this->load->model("Pedido_model");
        $this->load->model("Estado_model");
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

	public function edit($id){
        $data = array(
            'pedido' => $this->Pedido_model->getPedido($id),
            'estados' => $this->Estado_model->getEstados()
        );
		$this->load->view('layouts/header');
		$this->load->view('layouts/aside');
		$this->load->view('pedido/edit', $data);
		$this->load->view('layouts/footer');
    }
	public function update(){
        $id = $this->input->post("idpedido");
        $estado = $this->input->post("estado");

        $data = array(
            'idtb_estado' => $estado
        );

        if($this->Pedido_model->updatePedido($id, $data)){
            redirect(base_url()."index.php/Pedido");
        }
        else{
            $this->session->set_flashdata("error", "No se pudo editar el pedido");
            redirect(base_url()."index.php/Pedido/edit".$id);
        }
    }

    // Hay 2 maneras, esta es la otra manera - AJAX
	public function view($id){
        $data = array(
            'pedido' => $this->Pedido_model->getPedido($id),
            'detalles' => $this->Pedido_model->getDetallePedido($id)
        );
		$this->load->view('pedido/view', $data);
    }

}
