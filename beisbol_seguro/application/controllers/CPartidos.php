<?php
defined('BASEPATH') OR exit('No direct script access allowed');
class CPartidos extends CI_Controller {

    //Constructor
    public function __construct(){
        //Llama el constructor de la clase padre
        parent::__construct();
        //Carga el modelo para poder usar sus metodos
        $this->load->model('MPartidos');
    }

	public function index(){
		$this->load->view('plantillas/header');

        //Obtencion de partidos
        $data['partidos'] = $this->MPartidos->get_partidos();

        $this->load->view('partidos/index', $data);
		$this->load->view('plantillas/footer');
	}
}
