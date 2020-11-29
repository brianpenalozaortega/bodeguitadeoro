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

	// public function detalle(){
    //     $data = array(
    //         'productos' => $this->Producto_model->getProductos(),
    //         'categorias' => $this->Categoria_model->getCategorias()
    //     );

	// 	$this->load->view('clientelayouts/clienteheader');
	// 	$this->load->view('pago/detalle');
	// 	$this->load->view('clientelayouts/clientefooter');
    // }
    
	public function store(){
        $idtb_persona = $this->session->userdata("id");
        date_default_timezone_set("America/Lima");
        $fecha = date("c");
        $num_pedido = date("Y").date("m").date("d").date("H").date("i").date("s");
        $pago = $this->input->post("pago");
        
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
            'idtb_tipo_pago' => $pago
        );

        if($this->Pedido_model->save($data)){
            $id = $this->Pedido_model->getLastID();
            $this->store_detalle($id);

            unset($_SESSION['CARRITO']);

            redirect(base_url()."index.php/Compra");
        }
        else{
            redirect(base_url()."index.php/Pago");
        }
    }
    protected function store_detalle($id){
        foreach($_SESSION['CARRITO'] as $indice=>$producto){
            $datadetalle = array(
                'cantidad' => $producto['cantidad'],
                'precio' => $producto['precio'],
                'idtb_producto' => $producto['idtb_producto'],
                'idtb_pedido' => $id
            );                

            $this->Pedido_model->saveDetallePedido($datadetalle);
            $this->updateProducto($producto['idtb_producto'], $producto['cantidad']);
        }
    }
    protected function updateProducto($id, $cantidad){
        $productoActual = $this->Producto_model->getProducto($id);

        $data = array(
            'stock' => $productoActual->stock - $cantidad
        );

        $this->Producto_model->updateProducto($id, $data);
    }

}
