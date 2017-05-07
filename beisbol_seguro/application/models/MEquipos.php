<?php
class MEquipos extends CI_Model {
        public function __construct(){
                //Carga la base de datos y la hace accesible por el objeto $this->db
                $this->load->database();
        }

        public function get_equipos($division = FALSE){
            if ($division === FALSE){
                //Nombre de la tabla a obtener
                $this->db->order_by('N_Partidos_Ganados', 'DESC');
                $query = $this->db->get('equipos');
                //Retorna los resultados como un array
                return $query->result_array();
            }
            $this->db->order_by('N_Partidos_Ganados', 'DESC');
            $this->db->where('Division', $division);
            $query = $this->db->get('equipos');
            return $query->result_array();
        }
}
