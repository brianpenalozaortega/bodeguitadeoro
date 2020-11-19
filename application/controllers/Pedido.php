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

        #Llamar al model Pedido
        $this->load->model("Pedido_model");
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
            'pedido' => $this->Pedido_model->getPedido($id)
        );
		$this->load->view('layouts/header');
		$this->load->view('layouts/aside');
		$this->load->view('pedido/edit', $data);
		$this->load->view('layouts/footer');
    }
	public function update(){
        $id = $this->input->post("id");
        $nombre = $this->input->post("nombre");

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
                'nombre' => $nombre
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

    // Hay 2 maneras, esta es la otra manera
	public function view($id){
        $data = array(
            'pedido' => $this->Pedido_model->getPedido($id),
            'detalles' => $this->Pedido_model->getDetallePedido($id)
        );
		$this->load->view('pedido/view', $data);
    }

}
