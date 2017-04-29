<?php
class Estadios extends CI_Controller {
    //Constructor
    public function __construct(){
        //Llama el constructor de la clase padre
        parent::__construct();
        //Carga el modelo para poder usar sus metodos
        $this->load->model('Estadios_modelo');
        //Carga funciones para URL Helper que seran usadas en la vista
        $this->load->helper('url_helper');
    }

    public function index(){
        $data['estadios'] = $this->Estadios_modelo->get_estadios();
        $data['titulo'] = 'Estadios';

        $this->load->view('plantillas/header', $data);
        $this->load->view('estadios/index', $data);
        $this->load->view('plantillas/footer');
    }

    public function ver($nombre = NULL){
        //Busca estadios por nombre
        $data['estadios_item'] = $this->Estadios_modelo->get_estadios($nombre);
        //Si no encontro nada
        if (empty($data['estadios_item'])){
            show_404();
        }
        //Guarda como el titulo de la pagina, el Identificador del estadio obtenido de la base de datos
        $data['titulo'] = 'Estadio # '.$data['estadios_item']['Identificador'];

        $this->load->view('plantillas/header', $data);
        $this->load->view('estadios/ver', $data);
        $this->load->view('plantillas/footer');
    }
}
