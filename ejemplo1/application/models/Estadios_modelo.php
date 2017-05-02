<?php
class Estadios_modelo extends CI_Model {
        //Constructor, aqui se carga la base de datos para que un controlador
        //pueda invocar Estadios_modelo y usar sus metodos
        public function __construct(){
                //Carga la base de datos y la hace accesible por el objeto $this->db
                $this->load->database();
        }

        public function get_estadios($nombre = FALSE){
            //Query Builder se encarga de verificar $nombre
            if($nombre === FALSE){
                //Nombre de la tabla a obtener
                $query = $this->db->get('estadios');
                //Retorna los resultados como un array
                return $query->result_array();
            }

            $query = $this->db->get_where('estadios', array('Nombre' => $nombre));
            return $query->row_array();
        }

        public function agregarEstadio(){
            //Carga el helpet url
            $this->load->helper('url');
            $this->load->helper('security');

            //url_title recibe 3 Parametros
            //1. String a transformar
            //2. separador que reemplaza los espacios del primer Parametros
            //3. TRUE si se quiere convertir todo a minuscula

            //El metodo post de la libreria input cargada por defecto, saca los valores mandados por POST de forma segura
            $stringPrueba = url_title($this->input->post('Nombre', TRUE), 'dash', TRUE);
            $stringPrueba = xss_clean($stringPrueba);

            $data = array(
                'Identificador' => $this->input->post('Identificador', TRUE),
                'Nombre' => $stringPrueba
            );

            //Produce: INSERT INTO estadios (Identificador, Nombre) VALUES ('My title', 'My name')
            return $this->db->insert('estadios', $data);
        }
}
