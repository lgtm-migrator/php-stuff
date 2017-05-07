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
}
