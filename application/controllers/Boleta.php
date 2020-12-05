<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Boleta extends CI_Controller {

    #Constructor
    public function __construct(){
        #Voy a heredar lo que contenga la clase CI_Controller
        parent::__construct();

        if(!$this->session->userdata("auth")){
            redirect(base_url()."index.php/Auth");
        }

        $this->load->model("Boleta_model");
        $this->load->model("DetalleBoleta_model");
        $this->load->model("Producto_model");
    }

	public function index(){
        $data = array(
            'boletas' => $this->Boleta_model->getBoletas()
        );
		$this->load->view('layouts/header');
		$this->load->view('layouts/aside');
		$this->load->view('boleta/list', $data);
		$this->load->view('layouts/footer');
    }
    
	public function add(){
		$this->load->view('layouts/header');
		$this->load->view('layouts/aside');
		$this->load->view('boleta/add');
		$this->load->view('layouts/footer');
    }
    public function getproductosautocomplete(){
        $valor = $this->input->post("valor");
        $productos = $this->Boleta_model->getProductosAutocomplete($valor);
        echo json_encode($productos);
    }
    public function store(){
        $fecha = $this->input->post("fecha");

        $data = array(
            'fecha' => $fecha,
        );

        $idproductos = $this->input->post("idproductos");
        $cantidades = $this->input->post("cantidades");

        if($this->Boleta_model->saveBoleta($data)){
            $id = $this->Boleta_model->getLastID();
            $this->store_detalle($id, $idproductos, $cantidades);

            redirect(base_url()."index.php/Boleta");
        }
        else{
            redirect(base_url()."index.php/Boleta/add");
        }
    }
    protected function store_detalle($id, $idproductos, $cantidades){
        for($i = 0; $i < count($idproductos); $i++){
            $data = array(
                'idtb_producto' => $idproductos[$i],
                'idtb_boleta' => $id,
                'cantidad' => $cantidades[$i],
            );

            $this->DetalleBoleta_model->saveDetalleBoleta($data);
            $this->updateProducto($idproductos[$i], $cantidades[$i]);
        }
    }
    protected function updateProducto($idproducto, $cantidad){
        $productoActual = $this->Producto_model->getProducto($idproducto);

        $data = array(
            'stock' => $productoActual->stock + $cantidad
        );

        $this->Producto_model->updateProducto($idproducto, $data);
    }

    // Hay 2 maneras, esta es la otra manera - AJAX
	public function view($id){
        $data = array(
            'boleta' => $this->Boleta_model->getBoleta($id),
            'detalles' => $this->DetalleBoleta_model->getDetalleBoleta($id)
        );
		$this->load->view('boleta/view', $data);
    }
}
