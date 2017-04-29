<?php
class Controlador1 extends CI_Controller {
//Clase pensada para usar con views/plantillas/[header, footer].php
        public function ver($pagina = 'inicio'){
            //Un solo parametro, la pagina a cargar

            //Verifica si existe la pagina a cargar
            if (!file_exists(APPPATH.'views/paginas/'.$pagina.'.php')){
                //Si no existe, muestra error 404
                show_404();
            }

            //titulo sera una variable llamada en header
            //Pone la primera letra de $pagina en mayuscula
            $data['titulo'] = ucfirst($pagina);
            $this->load->view('plantillas/header', $data);
            $this->load->view('paginas/'.$pagina, $data);
            $this->load->view('plantillas/footer', $data);
        }
}
