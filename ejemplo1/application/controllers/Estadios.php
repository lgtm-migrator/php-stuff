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

    public function crear(){
        //Se cargan las librerias
        $this->load->helper('form');
        $this->load->library('form_validation');

        //Se haran 2 cosas en este metodos
        //1. Verificar si el form fue activado con submit
        //2. Verificar si la informacion pasada por el form cumple con las validaciones

        $data['titulo'] = 'Agregar nuevo estadio';

        //Parametros:
        //1. Nombre del field del form a Verificar
        //2. Nombre del field descriptivo para el usuario, aparece en el mensaje de error
        //3. Regla de validacion
        //4. (Opcional) Mensaje de error personalizado
        $this->form_validation->set_rules('Identificador', 'ID', 'required');
        $this->form_validation->set_rules('Nombre', 'Nombre', 'required');

        if ($this->form_validation->run() === FALSE){
            //Si no cumple
            $this->load->view('plantillas/header', $data);
            $this->load->view('estadios/agregar');
            $this->load->view('plantillas/footer');
        }else{
            //Si cumple
            //Usa el metodo agregarEstadio del modelo Estadios_modelo
            $this->Estadios_modelo->agregarEstadio();
            //Muestra una vista exitosa
            $this->load->view('estadios/exito');
        }
    }
}
