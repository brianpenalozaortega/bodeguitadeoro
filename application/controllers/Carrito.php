<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Carrito extends CI_Controller {

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

    // Metodo que permite visualizar el carrito de compras del cliente
	public function index(){
        $data = array(
            'productos' => $this->Producto_model->getProductos()
        );

		$this->load->view('clientelayouts/clienteheader');
		$this->load->view('carrito/list', $data);
		$this->load->view('clientelayouts/clientefooter');
    }

	public function delete($id){
        // unset($_SESSION['CARRITO'][0]);
        foreach($_SESSION['CARRITO'] as $indice=>$producto){
            if($producto['idtb_producto'] == $id){
                unset($_SESSION['CARRITO'][$indice]);
                // echo "<script>alert('Elemento borrado ...');</script>";
            }
        }
        echo "index.php/Carrito";
    }

	public function aumentar($idproducto){
        foreach($_SESSION['CARRITO'] as $indice=>$producto){
            if($producto['idtb_producto'] == $idproducto){

                // No es persistente
                // $producto['cantidad'] = $producto['cantidad'] + 1;

                // Esto si
                $_SESSION['CARRITO'][$indice]['cantidad'] = $producto['cantidad'] + 1;
                // print_r($_SESSION['CARRITO'][11]['categoria']);

                // echo "<script>alert('Aumentando');</script>".$producto['cantidad'];
            }
        }
        echo "index.php/Carrito";
    }

	public function disminuir($id){
        foreach($_SESSION['CARRITO'] as $indice=>$producto){
            if($producto['idtb_producto'] == $id){

                // No es persistente
                // $producto['cantidad'] = $producto['cantidad'] - 1;

                // Esto si
                $_SESSION['CARRITO'][$indice]['cantidad'] = $producto['cantidad'] - 1;
                // print_r($_SESSION['CARRITO'][11]['categoria']);

                // echo "<script>alert('Aumentando');</script>".$producto['cantidad'];
            }
        }
        echo "index.php/Carrito";
    }
}
