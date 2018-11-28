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
		return !$this->db->insert('CUESTIONARIO_CONTESTADO',$data) ? false : true; 
	}

	// Métodos para obtener todos los datos de la tabla Cuestionarios
	public function getStudies(){
		$sql = $this->db->get('ESTUDIOS');
		return $sql->result();
	}

	public function buscarQuestPorIdEstudio($idestudio){
		// Buscamos los datos en la base de datos
		$this->db->where('IdEstudio',$idestudio);
		$data = $this->db->get('CUESTIONARIOS');
        return $data->result(); // se regresa la tupla de los datos encontrados 
	}
}