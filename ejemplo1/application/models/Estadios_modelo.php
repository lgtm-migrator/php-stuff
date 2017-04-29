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
}
