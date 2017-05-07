<?php

class CJugadores extends CI_Controller {

    //Constructor
    public function __construct(){
        //Llama el constructor de la clase padre
        parent::__construct();
        //Carga el modelo para poder usar sus metodos
        $this->load->model('MJugadores');
    }

	public function index(){
		$this->load->view('plantillas/header');

        //Obtencion de jugadores
        $this->load->view('jugadores/index');

        $this->load->view('plantillas/footer');
	}

    public function bateadores(){
		$this->load->view('plantillas/header');

        //Obtencion de jugadores
        $this->load->view('jugadores/index');
        $data['jugadores'] = $this->MJugadores->get_bateadores();
        $this->load->view('jugadores/bateadores', $data);

        $this->load->view('plantillas/footer');
	}

    public function lanzadores(){
		$this->load->view('plantillas/header');

        //Obtencion de jugadores
        $this->load->view('jugadores/index');
        $data['jugadores'] = $this->MJugadores->get_lanzadores();
        $this->load->view('jugadores/lanzadores', $data);

        $this->load->view('plantillas/footer');
	}
}
