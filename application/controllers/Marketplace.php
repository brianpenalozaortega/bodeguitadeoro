<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Marketplace extends CI_Controller {

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
    }

    // Metodo donde se muestran los productos en venta
    // para que el cliente los pueda agregar al carrito
	public function index(){
        $data = array(
            'productos' => $this->Producto_model->getProductos(),
            'categorias' => $this->Categoria_model->getCategorias()
        );
		$this->load->view('clientelayouts/clienteheader');
		$this->load->view('marketplace/list', $data);
		$this->load->view('clientelayouts/clientefooter');
    }

	public function agregarproducto($id){
        $producto = $this->Producto_model->getProducto($id);
        $data = array(
            'idtb_producto' => $producto->idtb_producto,
            'nombre' => $producto->nombre,
            'imagen' => $producto->imagen,
            'categoria' => $producto->categoria,
            'precio' => $producto->precio,
            // SOLO ESTO EN CANTIDAD
            'cantidad' => 1
            // SOLO ESTO EN CANTIDAD
        );

        if(!isset($_SESSION['CARRITO'])){
            $_SESSION['CARRITO'][0] = $data;
            // $_SESSION['CARRITO'][0] = $producto;
        }
        else{
            $cantidadcarrito = count($_SESSION['CARRITO']);
            // $ultimoelemento = end($_SESSION['CARRITO']);
            // $indiceultimoelemento = key();

            $idproducto = array_column($_SESSION['CARRITO'],"idtb_producto");
            if(in_array($id, $idproducto)){

            }
            else{
                //$_SESSION['CARRITO'][$cantidadcarrito] = $data;
                array_push($_SESSION['CARRITO'], $data);
                // $_SESSION['CARRITO'][$cantidadcarrito] = $producto;
            }
        }

        $data = array(
            'productos' => $this->Producto_model->getProductos(),
            'categorias' => $this->Categoria_model->getCategorias()
        );
		$this->load->view('clientelayouts/clienteheader');
		$this->load->view('marketplace/list', $data);
		$this->load->view('clientelayouts/clientefooter');
    }
    
	public function add(){
		$this->load->view('layouts/header');
		$this->load->view('layouts/aside');
		$this->load->view('categoria/add');
		$this->load->view('layouts/footer');
    }
	public function store(){
        $nombre = $this->input->post("nombre");
        $descripcion = $this->input->post("descripcion");

        // Para establecer una regla de validacion se tiene que ejecutar el metodo set_rules
        // Este metodo recibe 3 parametros
        // 1) Nombre del campo => NOMBRE DE LA VARIABLE
        // 2) Alias del campo => NOMBRE DE LO QUE SE VA A MOSTRAR QUE ESTA MAL
        // 3) Regla de validacion "requerido|unico[NombreDeLaTabla.Atributo]"
        $this->form_validation->set_rules("nombre", "Nombre", "required|is_unique[tb_categoria.nombre]");

        // Para ejecutar esta regla de validacion se debe llamar al metodo "RUN" de la libreria "form_validation"
        // Devuelve valor booleano
        if($this->form_validation->run()){
            $data = array(
                'nombre' => $nombre,
                'descripcion' => $descripcion,
                'estado' => "1"
            );
    
            if($this->Categoria_model->saveCategoria($data)){
                redirect(base_url()."index.php/Categoria");
            }
            else{
                $this->session->set_flashdata("error", "No se pudo guardar la nueva categoria");
                redirect(base_url()."index.php/Categoria/add");
            }
        }
        else{
            // Se va a mostrar el formulario de Agregar nuevamente
            $this->add();
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
        $data = array(
            'estado' => "0"
        );
        $this->Categoria_model->updateCategoria($id, $data);
        echo "index.php/Categoria";
    }
}
