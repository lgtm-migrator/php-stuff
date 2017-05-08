<?php
defined('BASEPATH') OR exit('No direct script access allowed');
class CEquipos extends CI_Controller {

    //Constructor
    public function __construct(){
        //Llama el constructor de la clase padre
        parent::__construct();
        //Carga el modelo para poder usar sus metodos
        $this->load->model('MEquipos');
    }

	public function index(){
		$this->load->view('plantillas/header');

        //Obtencion de equipos
        $data['equipos'] = $this->MEquipos->get_equipos();
        $this->load->view('equipos/index', $data);

        $this->load->view('plantillas/footer');
	}

    public function division($num = 1){
        if($num != 1 and $num != 2 and $num != 3 and $num != 4){
            //Se intenta pasar de listo
            redirect('equipos');
        }
        $this->load->view('plantillas/header');
        $data['division'] = $num;
        $data['equipos'] = $this->MEquipos->get_equipos($num);
        $this->load->view('equipos/division', $data);
        $this->load->view('plantillas/footer');
    }
}
