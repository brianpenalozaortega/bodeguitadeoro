<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Producto extends CI_Controller {

    #Constructor
    public function __construct(){
        #Voy a heredar lo que contenga la clase CI_Controller
        parent::__construct();

        if(!$this->session->userdata("auth")){
            redirect(base_url()."index.php/Auth");
        }

        $this->load->model("Producto_model");
        $this->load->model("Categoria_model");
    }

	public function index(){
        $data = array(
            'productos' => $this->Producto_model->getProductos()
        );
		$this->load->view('layouts/header');
		$this->load->view('layouts/aside');
		$this->load->view('producto/list', $data);
		$this->load->view('layouts/footer');
    }
    
	public function add(){
        $data = array(
            'categorias' => $this->Categoria_model->getCategorias()
        );
		$this->load->view('layouts/header');
		$this->load->view('layouts/aside');
		$this->load->view('producto/add', $data);
		$this->load->view('layouts/footer');
    }
	public function store(){
        $nombre = $this->input->post("nombre");
        $precio = $this->input->post("precio");
        $stock = $this->input->post("stock");
        $imagen = $this->input->post("imagen");
        $categoria = $this->input->post("categoria");

        // Para establecer una regla de validacion se tiene que ejecutar el metodo set_rules
        // Este metodo recibe 3 parametros
        // 1) Nombre del campo => NOMBRE DE LA VARIABLE
        // 2) Alias del campo => NOMBRE DE LO QUE SE VA A MOSTRAR QUE ESTA MAL
        // 3) Regla de validacion "requerido|unico[NombreDeLaTabla.Atributo]"
        $this->form_validation->set_rules("nombre", "Nombre", "required|is_unique[tb_producto.nombre]");
        $this->form_validation->set_rules("precio", "Precio", "required");
        $this->form_validation->set_rules("stock", "Stock", "required");

        // Para ejecutar esta regla de validacion se debe llamar al metodo "RUN" de la libreria "form_validation"
        // Devuelve valor booleano
        if($this->form_validation->run()){
            $data = array(
                'nombre' => $nombre,
                'precio' => $precio,
                'stock' => $stock,
                'imagen' => $imagen,
                'idtb_categoria' => $categoria
            );
    
            if($this->Producto_model->saveProducto($data)){
                redirect(base_url()."Producto");
            }
            else{
                $this->session->set_flashdata("error", "No se pudo guardar el nuevo producto");
                redirect(base_url()."Producto/add");
            }            
        }
        else{
            // Se va a mostrar el formulario de Agregar nuevamente
            $this->add();
        }
    }

	public function edit($id){
        $data = array(
            'categorias' => $this->Categoria_model->getCategorias(),
            'producto' => $this->Producto_model->getProducto($id)
        );
		$this->load->view('layouts/header');
		$this->load->view('layouts/aside');
		$this->load->view('producto/edit', $data);
		$this->load->view('layouts/footer');
    }
	public function update(){
        $id = $this->input->post("id");
        $codigo = $this->input->post("codigo");
        $nombre = $this->input->post("nombre");
        $descripcion = $this->input->post("descripcion");
        $precio = $this->input->post("precio");
        $stock = $this->input->post("stock");
        $categoria = $this->input->post("categoria");

        // Al modificar, se puede editar otro valor que no sea el que tenga con la restriccion de unico
        $productoActual = $this->Producto_model->getProducto($id);
        if($codigo == $productoActual->codigo){
            $unique =  '';
        }
        else{
            $unique =  '|is_unique[tb_producto.codigo]';
        }

        // Para establecer una regla de validacion se tiene que ejecutar el metodo set_rules
        // Este metodo recibe 3 parametros
        // 1) Nombre del campo => NOMBRE DE LA VARIABLE
        // 2) Alias del campo => NOMBRE DE LO QUE SE VA A MOSTRAR QUE ESTA MAL
        // 3) Regla de validacion "requerido|unico[NombreDeLaTabla.Atributo]"
        $this->form_validation->set_rules("codigo", "Codigo", "required".$unique);
        $this->form_validation->set_rules("nombre", "Nombre", "required");
        $this->form_validation->set_rules("precio", "Precio", "required");
        $this->form_validation->set_rules("stock", "Stock", "required");

        // Para ejecutar esta regla de validacion se debe llamar al metodo "RUN" de la libreria "form_validation"
        // Devuelve valor booleano
        if($this->form_validation->run()){
            $data = array(
                'codigo' => $codigo,
                'nombre' => $nombre,
                'descripcion' => $descripcion,
                'precio' => $precio,
                'stock' => $stock,
                'idtb_categoria' => $categoria
            );
    
            if($this->Producto_model->updateProducto($id, $data)){
                redirect(base_url()."Producto");
            }
            else{
                $this->session->set_flashdata("error", "No se pudo editar el producto");
                redirect(base_url()."Producto/edit".$id);
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
        $this->Producto_model->updateProducto($id, $data);
        echo "Producto";
    }
}
