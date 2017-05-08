<?php
defined('BASEPATH') OR exit('No direct script access allowed');
class MAdmin extends CI_Model {
    public function __construct(){
        //Carga la base de datos y la hace accesible por el objeto $this->db
        $this->load->database();
    }

    public function verificar_usuario($correo, $contra){
        $this->db->where('Correo', $correo);
        $this->db->where('Contra', sha1($contra));
        $this->db->limit(1);
        $query = $this->db->get('usuarios');

        if ($query->num_rows() > 0){
            return $query->row();
        }
        return false;
    }

    public function buscar_jugador($idBusqueda){
        $this->db->like('Identificador', intval($idBusqueda));
        $this->db->or_like('Nombre', $idBusqueda);
        $query = $this->db->get('jugadores');
        if ($query->num_rows() > 0){
            return $query->result_array();
        }
        return false;
    }
}
