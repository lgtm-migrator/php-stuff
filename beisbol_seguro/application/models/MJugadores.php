<?php
class MJugadores extends CI_Model {
        public function __construct(){
                //Carga la base de datos y la hace accesible por el objeto $this->db
                $this->load->database();
        }

        public function get_lanzadores(){
            $this->db->where('Lanzador', 1);
            $query = $this->db->get('jugadores');
            return $query->result_array();
        }

        public function get_bateadores(){
            $this->db->where('Lanzador', 0);
            $query = $this->db->get('jugadores');
            return $query->result_array();
        }

        //Para un solo jugador
        // public function get_jugadores($id = FALSE){
        //     if ($id === FALSE){
        //         //Devuelve todos los jugadores
        //         $query = $this->db->get('equipos');
        //         //Retorna los resultados como un array
        //         return $query->result_array();
        //     }
        //     //Devuelve solo 1 jugador
        //     $this->db->where('Identificador', $id);
        //     $query = $this->db->get('equipos');
        //     return $query->result_array();
        // }
}
