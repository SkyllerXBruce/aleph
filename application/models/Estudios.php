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

	// Método para agregar los datos del estudio
	public function saveReagents($data){
		return !$this->db->insert('REACTIVOS',$data) ? false : true; 
	}

	// Método para agregar los datos del estudio
	public function saveQuest($data){
		return !$this->db->insert('CUESTIONARIOS',$data) ? false : true; 
	}

	// Métodos para obtener todos los datos de la tabla estudios
	public function getStudies(){
		$sql = $this->db->get('ESTUDIOS'); 
		return $sql->result(); // regresa todos los datos 
	}

		// Métodos para obtener todos los datos de la tabla estudios
		public function getReagents(){
			$sql = $this->db->get('CUESTIONARIOS'); 
			return $sql->result(); // regresa todos los datos 
		}

	// Métodos para obtener todos los datos de la tabla Reactivos
	public function getQuest(){
		$sql = $this->db->get('REACTIVOS');
		return $sql->result();
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

	public function buscaUsuario($user){
		// Buscamos los datos en la base de datos
		$data = $this->db->get_where('USUARIOS',array('Nombre_Usuario' => $user));
		// Si encontramos los datos regresamos un falso 
    if(!$data->result()){
      return false;
    }
    return $data->row()->Id;
	}

	public function buscaStudio($study){
		// Buscamos los datos en la base de datos
		$data = $this->db->get_where('ESTUDIOS',array('Estudio' => $study));
		// Si encontramos los datos regresamos un falso 
    if(!$data->result()){
      return false;
    }
    return $data->row()->idEstudio;
	}

	public function saveAsignados($dataasignados){
		return !$this->db->insert('ASIGNADOS',$dataasignados) ? false : true;
	}	
}