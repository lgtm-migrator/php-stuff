<?php
defined('BASEPATH') OR exit('No direct script access allowed');
class CAdmin extends CI_Controller {
    //Constructor
    public function __construct(){
        //Llama el constructor de la clase padre
        parent::__construct();
        //Carga el modelo para poder usar sus metodos
        $this->load->model('MAdmin');
        //Para guardar variables en sesion
        session_start();
    }
    public function index(){
        //Pagina de ramiro admin/index
        //Aqui verificar que tenga sesion
        if (!isset($_SESSION['username'])){
            //No se ha logeado
            redirect('admin/login');
        }else {
            $this->load->view('admin/header');
            $this->load->view('admin/index');
            $this->load->view('plantillas/footer');
        }

    }

    public function login(){
        //Si ya esta logeado
        if (isset($_SESSION['username'])){
            //Pagina index de admin
            redirect('admin');
        }
        //Han enviado informacion?
        $this->load->library('form_validation');
        $this->form_validation->set_rules('correo', 'Correo', 'required|valid_email', 'El correo ingresado no es un correo');
        $this->form_validation->set_rules('contra', 'Contraseña', 'required|min_length[4]', 'La contraseña no cumple nuestros estandares');

        if ($this->form_validation->run() !== false) {
            //Valido correctamente. Obtener de la BD los credenciales
            $respuesta = $this->MAdmin->verificar_usuario(
                $this->input->post('correo'),
                $this->input->post('contra')
            );

            if ($respuesta !== FALSE){
                //Si tiene una cuenta en el app se crea la variable username
                $_SESSION['username'] = $this->input->post('correo');
                //Metodo index donde esta la pagina secreta
                redirect('admin');
            }
        }
        //Carga el login
        $this->load->view('plantillas/header');
        $this->load->view('admin/login');
        $this->load->view('plantillas/footer');
    }

    public function logout(){
        session_destroy();
        redirect('admin');
    }
}
