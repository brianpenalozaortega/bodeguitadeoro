<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Register extends CI_Controller {

    #Constructor
    public function __construct(){
        #Voy a heredar lo que contenga la clase CI_Controller
        parent::__construct();
        
        #Llamar al model Cliente
        $this->load->model("Cliente_model");
    }

	public function index(){
		if($this->session->userdata("login")){
            redirect(base_url().'index.php/Marketplace');
        }
        else{
            $this->load->view('register');
        }
    }
    
    public function savecliente(){
        $nombre = $this->input->post("nombre");
        $apellido = $this->input->post("apellido");
        $correo = $this->input->post("correo");
        $celular = $this->input->post("celular");
        $direccion = $this->input->post("direccion");
        $referencia = $this->input->post("referencia");
        $clave = $this->input->post("clave");
        $repetirclave = $this->input->post("repetirclave");

        $this->form_validation->set_rules("nombre", "Nombre", "required");
        $this->form_validation->set_rules("apellido", "Apellido", "required");
        $this->form_validation->set_rules("correo", "Correo", "required");
        $this->form_validation->set_rules("celular", "Celular", "required");
        $this->form_validation->set_rules("direccion", "Direccion", "required");
        $this->form_validation->set_rules("referencia", "Referencia", "required");
        $this->form_validation->set_rules("clave", "Clave", "required");


        // Para ejecutar esta regla de validacion se debe llamar al metodo "RUN" de la libreria "form_validation"
        // Devuelve valor booleano
        if($this->form_validation->run()){
            if($clave != $repetirclave){
                $this->session->set_flashdata("error", "Las claves no coinciden");
                redirect(base_url().'index.php/Register');
            }
            else{
                $data = array(
                    'nombre' => $nombre,
                    'apellido' => $apellido,
                    'correo' => $correo,
                    'clave' => sha1($clave),
                    'idtb_tipo_persona' => 2
                );

                $res = $this->Cliente_model->savepersona($data);

                if(!$res){
                    $this->session->set_flashdata("error", "No se pudo registrar correctamente. Por favor intentar nuevamente.");
                    redirect(base_url().'index.php/Register');
                }
                else{
                    $id = $this->Cliente_model->getLastID();

                    $datacliente = array(
                        'celular' => $celular,
                        'direccion' => $direccion,
                        'referencia' => $referencia,
                        'idtb_persona' => $id
                    );

                    $rescliente = $this->Cliente_model->savecliente($datacliente);

                    if(!$rescliente){
                        $this->session->set_flashdata("error", "No se pudo registrar correctamente. Por favor intentar nuevamente.");
                        redirect(base_url().'index.php/Register');
                    }
                    else{
                        $datasession = array(
                            'id' => $id,
                            'nombre' => $nombre,
                            'rol' => "cliente",
                            'login' => TRUE
                        );
                        $this->session->set_userdata($datasession);
                        redirect(base_url()."index.php/Marketplace");
                    }
                }
            }
        }
        else{
            // Se va a mostrar el formulario de Agregar nuevamente
            $this->index();
        }
    }

    public function logout(){
        $this->session->sess_destroy();
        redirect(base_url()."index.php/");
    }
}