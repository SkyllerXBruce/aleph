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
	public function getQuest(){
		$sql = $this->db->get('CUESTIONARIOS');
		return $sql->result();
	}

	// Métodos para obtener todos los encuestadores de la tabla usuarios
	public function buscarStudiesporEncuestador($id){
		$this->db->where('IdUsuarios',$id);
		$sql = $this->db->get('ASIGNADOS');
		return $sql->result();
	}

	public function buscarQuest($quest){
		// Buscamos los datos en la base de datos
		$data = $this->db->get_where('CUESTIONARIOS',array('Nombre_Cuestionario' => $quest));
		// Si encontramos los datos regresamos un falso 
        if(!$data->result()){
            return false;
        }
        return $data->row(); // se regresa la tupla de los datos encontrados 
	}

	public function buscarQuestPorIdEstudio($idestudio){
		// Buscamos los datos en la base de datos
		$data = $this->db->get_where('CUESTIONARIOS',array('IdEstudio' => $idestudio));
		// Si encontramos los datos regresamos un falso 
        if(!$data->result()){
            return false;
        }
        return $data->result(); // se regresa la tupla de los datos encontrados 
	}
}