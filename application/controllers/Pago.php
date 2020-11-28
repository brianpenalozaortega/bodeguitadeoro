<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Pago extends CI_Controller {

    #Constructor
    public function __construct(){
        #Voy a heredar lo que contenga la clase CI_Controller
        parent::__construct();

        if(!$this->session->userdata("login")){
            redirect(base_url()."index.php/Login");
        }

        $this->load->model("Producto_model");
        $this->load->model("Categoria_model");
        $this->load->model("Pedido_model");
    }

	public function index(){
		$this->load->view('clientelayouts/clienteheader');
		$this->load->view('pago/list');
		$this->load->view('clientelayouts/clientefooter');
    }

	public function detalle(){
        $data = array(
            'productos' => $this->Producto_model->getProductos(),
            'categorias' => $this->Categoria_model->getCategorias()
        );

		$this->load->view('clientelayouts/clienteheader');
		$this->load->view('pago/detalle');
		$this->load->view('clientelayouts/clientefooter');
    }
    
	public function store(){
        $idtb_persona = $this->session->userdata("id");
        date_default_timezone_set("America/Lima");
        $fecha = date("c");
        $num_pedido = date("Y").date("m").date("d").date("H").date("i").date("s");
        
        $total = 0;
        foreach($_SESSION['CARRITO'] as $indice=>$producto){
            $total = $total + ($producto['precio'] * $producto['cantidad']);
        }

        $data = array(
            'fecha' => $fecha,
            'monto' => $total,
            'num_pedido' => $num_pedido,
            'idtb_persona' => $idtb_persona,
            'idtb_estado' => 1,
            'idtb_tipo_pago' => 1
        );

        if($this->Pedido_model->save($data)){
            $idpedido = $this->Pedido_model->getLastID();
            foreach($_SESSION['CARRITO'] as $indice=>$producto){
                $datadetalle = array(
                    'cantidad' => $producto['cantidad'],
                    'subtotal' => $producto['precio'] * $producto['cantidad'],
                    'idtb_producto' => $producto['idtb_producto'],
                    'idtb_pedido' => $idpedido
                );                

                $this->Pedido_model->saveDetallePedido($datadetalle);
            }

            unset($_SESSION['CARRITO']);

            redirect(base_url()."index.php/Compra");
        }
        else{
            redirect(base_url()."index.php/Pago");
        }
    }

}
