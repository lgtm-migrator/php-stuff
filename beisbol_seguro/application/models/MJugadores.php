<?php
defined('BASEPATH') OR exit('No direct script access allowed');
class MJugadores extends CI_Model {
        public function __construct(){
                //Carga la base de datos y la hace accesible por el objeto $this->db
                $this->load->database();
        }

        public function get_lanzadores(){
            $this->db->where('Lanzador', 1);
            $this->db->ORDER_BY('Efectividad', 'DESC');
            $query = $this->db->get('jugadores');
            return $query->result_array();
        }

        public function get_bateadores(){
            $this->db->where('Lanzador', 0);
            $this->db->ORDER_BY('Promedio_bateo', 'DESC');
            $query = $this->db->get('jugadores');
            return $query->result_array();
        }
        
        public function get_jugadoresQuery($id = FALSE){
            if ($id === FALSE){
                //Devuelve todos los jugadores
                $query = $this->db->get('jugadores');
                //Retorna los resultados como un array
                return $query;
            }
                //Devuelve solo 1 jugador
            $this->db->where('Identificador', $id);
            $query = $this->db->get('jugadores');
            return $query;
        }

        public function updateJugador($id,$data){
            $this->db->where('Identificador',$id);
                if($data['carreras_limpias']==NULL){
                   $this->db->update('jugadores',array(
                    'N_hits'=>$data['n_hits'],
                    'Veces_plato'=>$data['veces_plato'],
                    'Carreras_limpias'=>$data['carreras_limpias'],
                    'N_Innings'=>$data['n_innings'],
                    'Promedio_bateo'=> round(intval($data['n_hits'])/intval($data['veces_plato']), 2)
                    ));  
                }else{
                    $this->db->update('jugadores',array(
                    'N_hits'=>$data['n_hits'],
                    'Veces_plato'=>$data['veces_plato'],
                    'Carreras_limpias'=>$data['carreras_limpias'],
                    'N_Innings'=>$data['n_innings'],
                    'Promedio_bateo'=> round(intval($data['n_hits'])/intval($data['veces_plato']), 2),
                    'Efectividad'=>round((intval($data['carreras_limpias'])/intval($data['n_innings']))*9, 2)
                    ));
                }
        }

        public function esLanzador($id){
            $this->db->where('Identificador', $id);
            $query = $this->db->get('jugadores');
            if($query->result()[0]->Lanzador=='1'){
                return TRUE;
            }
            return FALSE;
        }
}
