<?php
// Modelo Estudios para la Ingresar datos de los estudios
class Encuestados extends CI_Model{
	// Constructor del Modelo InfoUsers
	public function __construct(){
		// Cargamos la Base de Datos
		$this->load->database();
	}

	// Método para agregar los datos del estudio
	public function save($data){
		return !$this->db->insert('ESTUDIOS',$data) ? false : true; 
	}
}