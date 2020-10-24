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

        #Llamar al model Producto
        $this->load->model("Producto_model");
        $this->load->model("Categoria_model");
        $this->load->model("Pedido_model");
    }

	public function index(){
        $data = array(
            'productos' => $this->Producto_model->getProductos(),
            'categorias' => $this->Categoria_model->getCategorias()
        );

		$this->load->view('clientelayouts/clienteheader');
		$this->load->view('carrito/list');
		$this->load->view('clientelayouts/clientefooter');
    }
    
	public function add(){
		$this->load->view('layouts/header');
		$this->load->view('layouts/aside');
		$this->load->view('categoria/add');
		$this->load->view('layouts/footer');
    }
	public function store(){
        $idtb_persona = $this->session->userdata("id");
        date_default_timezone_set("America/Lima");
        $fecha = date("c");
        $monto = $this->input->post("total");
        $num_pedido = date("Y").date("m").date("d").date("H").date("i").date("s");

        $data = array(
            'fecha' => $fecha,
            'monto' => $monto,
            'num_pedido' => $num_pedido,
            'idtb_cliente' => $idtb_persona
        );

        if($this->Pedido_model->save($data)){
            redirect(base_url()."index.php/Compra");
        }
        else{
            redirect(base_url()."index.php/Carrito");
        }
    }

	public function edit($id){
        $data = array(
            'categoria' => $this->Categoria_model->getCategoria($id)
        );
		$this->load->view('layouts/header');
		$this->load->view('layouts/aside');
		$this->load->view('categoria/edit', $data);
		$this->load->view('layouts/footer');
    }
	public function update(){
        $id = $this->input->post("id");
        $nombre = $this->input->post("nombre");
        $descripcion = $this->input->post("descripcion");

        // Al modificar, se puede editar otro valor que no sea el que tenga con la restriccion de unico
        $categoriaActual = $this->Categoria_model->getCategoria($id);
        if($nombre == $categoriaActual->nombre){
            $unique =  '';
        }
        else{
            $unique =  '|is_unique[tb_categoria.nombre]';
        }

        // Para establecer una regla de validacion se tiene que ejecutar el metodo set_rules
        // Este metodo recibe 3 parametros
        // 1) Nombre del campo => NOMBRE DE LA VARIABLE
        // 2) Alias del campo => NOMBRE DE LO QUE SE VA A MOSTRAR QUE ESTA MAL
        // 3) Regla de validacion "requerido|unico[NombreDeLaTabla.Atributo]"
        $this->form_validation->set_rules("nombre", "Nombre", "required".$unique);

        // Para ejecutar esta regla de validacion se debe llamar al metodo "RUN" de la libreria "form_validation"
        // Devuelve valor booleano
        if($this->form_validation->run()){
            $data = array(
                'nombre' => $nombre,
                'descripcion' => $descripcion
            );
    
            if($this->Categoria_model->updateCategoria($id, $data)){
                redirect(base_url()."index.php/Categoria");
            }
            else{
                $this->session->set_flashdata("error", "No se pudo editar la categoria");
                redirect(base_url()."index.php/Categoria/edit".$id);
            }
        }
        else{
            // Se va a mostrar el formulario de Editar nuevamente
            $this->edit($id);
        }
    }

	public function view($id){
        $data = array(
            'categoria' => $this->Categoria_model->getCategoria($id)
        );
		$this->load->view('categoria/view', $data);
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
}
