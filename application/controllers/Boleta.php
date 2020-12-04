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
        $nombre = $this->input->post("nombre");

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
                'nombre' => $nombre
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

	public function view($id){
        $data = array(
            'boleta' => $this->Boleta_model->getBoleta($id)
        );
		$this->load->view('boleta/view', $data);
    }
}
