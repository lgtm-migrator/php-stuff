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

    public function crearPartido($data){
	    $this->db->insert('partidos',array(
		'Identificador' => NULL,
		'Equipo1' => $data['equipo1'],
		'Equipo2' => $data['equipo2'],
		'Puntos_Equipo1' => $data['puntos_Equipo1'],
		'Puntos_Equipo2' => $data['puntos_Equipo2'],
		'Estadio' => $data['estadio'],
		));
	$this->db->set('N_Partidos_Jugados','N_Partidos_Jugados+1',FALSE);
	$this->db->where('Nombre',$data['equipo1']);
	$this->db->update('equipos');
	$this->db->set('N_Partidos_Jugados','N_Partidos_Jugados+1',FALSE);
	$this->db->where('Nombre',$data['equipo2']);
	$this->db->update('equipos');
		if($data['puntos_Equipo1']>$data['puntos_Equipo2']){
			$this->db->set('N_Partidos_Ganados','N_Partidos_Ganados+1',FALSE);
			$this->db->where('Nombre',$data['equipo1']);
			$this->db->update('equipos');
			$this->db->set('N_Partidos_Perdidos','N_Partidos_Perdidos+1',FALSE);
			$this->db->where('Nombre',$data['equipo2']);
			$this->db->update('equipos');
		}else{
			if($data['puntos_Equipo1']<$data['puntos_Equipo2']){
				$this->db->set('N_Partidos_Ganados','N_Partidos_Ganados+1',FALSE);
				$this->db->where('Nombre',$data['equipo2']);
				$this->db->update('equipos');
				$this->db->set('N_Partidos_Perdidos','N_Partidos_Perdidos+1',FALSE);
				$this->db->where('Nombre',$data['equipo1']);
				$this->db->update('equipos');
			}
		}
	}

	public function listaEstadios(){
		$this->db->select('Estadio');
		$this->db->distinct();
		$query = $this->db->get('partidos');
		return $query->result_array();
	}

}
