<?php
defined('BASEPATH') OR exit('No direct script access allowed');
class CAdmin extends CI_Controller {
    //Constructor
    public function __construct(){
        //Llama el constructor de la clase padre
        parent::__construct();
        //Carga el modelo para poder usar sus metodos
        $this->load->model('MAdmin');
        $this->load->model('MJugadores');
        $this->load->model('MEquipos');
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
        $this->form_validation->set_rules('correo', 'Correo', 'required|valid_email', array('required' => '"El campo {field} esta vacio."','valid_email' => '"Solo se aceptan correos"'));
        $this->form_validation->set_rules('contra', 'Contraseña', 'required|min_length[4]', array('required' => '"El campo {field} esta vacio."','min_length' => '"El campo {field} requiere minimo 2 caracteres"'));

        if ($this->form_validation->run() !== false) {
            //Valido correctamente. Obtener de la BD los credenciales
            $respuesta = $this->MAdmin->verificar_usuario(
                $this->security->xss_clean($this->input->post('correo')),
                $this->security->xss_clean($this->input->post('contra'))
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

    public function crearPartidos($num = 1){
        //Si ya esta logeado
        if (!isset($_SESSION['username'])){
            //de regreso a login
            redirect('admin');
        }else {
            if($num != 1 and $num != 2 and $num != 3 and $num != 4){
                //Se intenta pasar de listo
                redirect('admin/crear-partidos');
            }
            $data['error']='';
            $data['error1']='';
            $this->load->library('form_validation');
            $this->form_validation->set_rules('puntos_Equipo1', 'Puntos Equipo 1', 'required|max_length[2]|is_natural', array('required' => '"El campo {field} esta vacio."','max_length' => '"El campo {field} acepta maximo 2 caracteres"','is_natural' => '"El campo {field} acepta solo numeros naturales"'));
            $this->form_validation->set_rules('puntos_Equipo2', 'Puntos Equipo 2', 'required|max_length[2]|is_natural', array('required' => '"El campo {field} esta vacio."','max_length' => '"El campo {field} acepta maximo 2 caracteres"','is_natural' => '"El campo {field} acepta solo numeros naturales"'));

            if ($this->form_validation->run() !== false) {
                //Valido correctamente. Obtener de la BD los credenciales
                if($this->input->post('equipo1')===$this->input->post('equipo2')){
                    $data['error'] = 'No puede jugar un equipo contra el mismo.';
                }else{
                    $limitePartido = $this->MAdmin->validarCinco($this->input->post('equipo1'),$this->input->post('equipo2'));
                    if($limitePartido !== NULL){
                        $data['error1'] = 'El equipo '.$limitePartido.' ha llegado al limite de partidos jugados.';
                    }else{
                        $data = array(
                        'equipo1' => $this->security->xss_clean($this->input->post('equipo1')),
                        'equipo2' => $this->security->xss_clean($this->input->post('equipo2')),
                        'puntos_Equipo1' => $this->security->xss_clean($this->input->post('puntos_Equipo1')),
                        'puntos_Equipo2' => $this->security->xss_clean($this->input->post('puntos_Equipo2')),
                        'estadio' => $this->security->xss_clean($this->input->post('estadio')),
                        );
                        $this->MAdmin->crearPartido($data);
                        redirect('admin/crear-partidos');
                    }
                }
            }

            $data['division'] = $num;
            $data['equipos'] = $this->MEquipos->listaEquipos($num);
            $data['estadios'] = $this->MAdmin->listaEstadios();
            $this->load->view('admin/header');
            $this->load->view('admin/crearPartido',$data);
            $this->load->view('plantillas/footer');
        }
    }

    public function editarJugador(){
        //Si ya esta logeado
        if (isset($_SESSION['username'])){
            //header
            $this->load->view('admin/header');
            //Pagina principal para buscar
            $this->load->view('admin/editarJugadorPrincipal');

            //Han enviado informacion?
            $this->load->library('form_validation');
            $this->form_validation->set_rules('idBusqueda', 'Campo anterior', 'required', array('required' => '{field} debe ser llenado'));
            if ($this->form_validation->run() !== false) {
                //Valido correctamente. Obtengo de la base de datos
                $respuesta = $this->MAdmin->buscar_jugador(
                    $this->security->xss_clean($this->input->post('idBusqueda'))
                );

                $data['jugadores'] = $respuesta;

                if ($respuesta !== FALSE){
                    //Existen jugdadores con ese nombre o ID
                    $this->load->view('admin/editarJugadorBusqueda', $data);
                }else{
                    $this->load->view('admin/mensaje');
                }
            }
            //footer
            $this->load->view('plantillas/footer');
        }else {
            //No se ha logeado
            redirect('admin/login');
        }
    }

    public function editarJugadorSegundo($id){
        //Si ya esta logeado
        if (isset($_SESSION['username'])){
            //Pagina principal para buscar

            if($id > $this->MAdmin->ultimoID()->result()[0]->Identificador or $id < $this->MAdmin->primerID()->result()[0]->Identificador){
                //Se pasa de listo
                redirect('admin/editar-jugador');
            }

            $this->load->library('form_validation');
            $this->form_validation->set_rules('n_hits', 'Numero de Hits', 'required|max_length[3]|is_natural', array('required' => '"El campo {field} esta vacio."','max_length' => '"El campo {field} acepta maximo 2 caracteres"','is_natural' => '"El campo {field} acepta solo numeros naturales"'));
            $this->form_validation->set_rules('veces_plato', 'Turnos al Bate', 'required|max_length[3]|is_natural', array('required' => '"El campo {field} esta vacio."','max_length' => '"El campo {field} acepta maximo 2 caracteres"','is_natural' => '"El campo {field} acepta solo numeros naturales"'));
            if($this->MJugadores->esLanzador($id)){
                $this->form_validation->set_rules('carreras_limpias', 'Carreras Limpias', 'required|max_length[3]|is_natural', array('required' => '"El campo {field} esta vacio."','max_length' => '"El campo {field} acepta maximo 2 caracteres"','is_natural' => '"El campo {field} acepta solo numeros naturales"'));
                $this->form_validation->set_rules('n_innings', 'Innings Lanzados', 'required|max_length[3]|is_natural', array('required' => '"El campo {field} esta vacio."','max_length' => '"El campo {field} acepta maximo 2 caracteres"','is_natural' => '"El campo {field} acepta solo numeros naturales"'));
            }

            if ($this->form_validation->run() !== false) {
                //Valido correctamente. Obtener de la BD los credenciales
                    $data = array(
                    'n_hits' => $this->security->xss_clean($this->input->post('n_hits')),
                    'veces_plato' => $this->security->xss_clean($this->input->post('veces_plato')),
                    'carreras_limpias' => $this->security->xss_clean($this->input->post('carreras_limpias')),
                    'n_innings' => $this->security->xss_clean($this->input->post('n_innings')),
                    );
                    $this->MJugadores->updateJugador($id,$data);
                    //redirect('admin/editar-jugador');
                }

            $this->load->view('admin/header');
            $data['id'] = $id;
            $data['jugador'] = $this->MJugadores->get_jugadoresQuery($id);
            $this->load->view('admin/editarJugador',$data);
            $this->load->view('plantillas/footer');
        }else {
            //No se ha logeado
            redirect('admin/login');
        }
    }
}
