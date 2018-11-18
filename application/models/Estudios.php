<?php
// Modelo Estudios para la Ingresar datos de los estudios
class Estudios extends CI_Model{
	// Constructor del Modelo InfoUsers
	public function __construct(){
		// Cargamos la Base de Datos
		$this->load->database();
	}

	// Método para agregar los datos del estudio
	public function save($data){
		return !$this->db->insert('ESTUDIOS',$data) ? false : true; 
	}

	// Métodos para obtener todos los datos de la tabla estudios
	public function getStudies(){
		$sql = $this->db->get('ESTUDIOS'); 
		return $sql->result(); // regresa todos los datos 
	}
	
	// Métodos para obtener todos los encuestadores de la tabla usuarios
	public function getEncuestador(){
		$this->db->where('Rol','Encuestador');
		$sql = $this->db->get('USUARIOS');
		return $sql->result();
	}

	// Métodos para obtener todos los encuestadores de la tabla usuarios
	public function getAnalista(){
		$this->db->where('Rol','Analista');
		$sql = $this->db->get('USUARIOS');
		return $sql->result();
	}
}