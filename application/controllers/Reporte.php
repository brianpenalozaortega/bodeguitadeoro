<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Reporte extends CI_Controller {

    #Constructor
    public function __construct(){
        #Voy a heredar lo que contenga la clase CI_Controller
        parent::__construct();

        if(!$this->session->userdata("auth")){
            redirect(base_url()."index.php/Auth");
        }

        $this->load->model("Pedido_model");
    }

	public function index(){
        // $fechainicio = $this->input->post("fechainicio");
        // $fechafin = $this->input->post("fechafin");

        // if($this->input->post("buscar")){
        //     $pedidos = $this->Pedido_model->getPedidosByDate($fechainicio, $fechafin);
        // }
        // else{
        //     $pedidos = $this->Pedido_model->getPedidos();
        // }

        // $data = array(
        //     'pedidos' => $pedidos,
        //     'fechainicio' => $fechainicio,
        //     'fechafin' => $fechafin
        // );

		// $this->load->view('layouts/header');
		// $this->load->view('layouts/aside');
		// $this->load->view('reporte/pedido', $data);
		// $this->load->view('layouts/footer');
    }

	public function pedidos(){
        $fechainicio = $this->input->post("fechainicio");
        $fechafin = $this->input->post("fechafin");

        if($this->input->post("buscar")){
            $pedidos = $this->Pedido_model->getPedidosByDate($fechainicio, $fechafin);
        }
        else{
            $pedidos = $this->Pedido_model->getPedidos();
        }

        $data = array(
            'pedidos' => $pedidos,
            'fechainicio' => $fechainicio,
            'fechafin' => $fechafin
        );

		$this->load->view('layouts/header');
		$this->load->view('layouts/aside');
		$this->load->view('reporte/pedido', $data);
		$this->load->view('layouts/footer');
    }
}
