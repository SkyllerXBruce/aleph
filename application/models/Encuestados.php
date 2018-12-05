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

	// Método para agregar las Respuestas
	public function saveRespuesta($datosresp,$datosrespcampo){
		// Se inicia una transaccion de tal forma que verifica que se realice correctamente lo contenido dentro, si falla cualquier cosa, se revierte todas las acciones realizadas para evitar corrupciones en los datos 
		$this->db->trans_start();
			// incerta los datos del usuario a la tabla 
			$this->db->insert('RESPUESTAS',$datosresp); 
			// obtiene el identificador del usuario y lo guarda en la columna id_usuario de la tabla
			$datosrespcampo['IdRespuesta'] = $this->db->insert_id();
			// incerta los datos de la Informacion del usuario a la tabla 
			$this->db->insert('RESPUESTA_CAMPO',$datosrespcampo);
		$this->db->trans_complete(); // Termina la transaccion
 		// regresa verdadero o falso dependiendo si la tansaccion fue ejecutada correctamente o fallo
 		return !$this->db->trans_status() ? false : true;  
	}

	public function getMaxIdQuestDone(){
		$this->db->select_max('IdCuestionarioContestado'); 
    $result= $this->db->get('CUESTIONARIO_CONTESTADO')->row_array(); 
    return $result['IdCuestionarioContestado'];
	}

	// Métodos para obtener todos los datos de la tabla Cuestionarios
	public function getStudies(){
		$sql = $this->db->get('ESTUDIOS');
		return $sql->result();
	}

	// Método para obtener todos los cuestionarios que coinciden con el id del estudio
	public function buscarQuestPorIdEstudio($idestudio){
		// Buscamos los datos en la base de datos
		$this->db->where('IdEstudio',$idestudio);
		$data = $this->db->get('CUESTIONARIOS');
    return $data->result(); // se regresa la tupla de los datos encontrados 
	}

	// Método para obtener todos los cuestionarios que coinciden con el id del Cuestionario
	public function buscarQuestPorIdcuestionario($idquest){
		// Buscamos los datos en la base de datos
		$this->db->where('IdCuestionario',$idquest);
		$data = $this->db->get('CUESTIONARIOS');
    return $data->result(); // se regresa la tupla de los datos encontrados 
	}

	// Método para obtener todos los cuestionarios que coinciden con el id del Cuestionario
	public function buscarQuestDonePorIdcuestionario($idquest){
		// Buscamos los datos en la base de datos
		$this->db->where('IdCuestionario',$idquest);
		$data = $this->db->get('CUESTIONARIO_CONTESTADO');
    return $data->result(); // se regresa la tupla de los datos encontrados 
	}

	// Método para obtener todos los cuestionarios que coinciden con el id del Cuestionario
	public function buscarReagentsPorIdcuestionario($idquest){
		// Buscamos los datos en la base de datos
		$this->db->where('IdCuestionario',$idquest);
		$data = $this->db->get('REACTIVOS');
    return $data->result(); // se regresa la tupla de los datos encontrados 
	}

	// Método para obtener todos los Estudios que coinciden con el id del usuario
	public function buscarIdStudyPorIdUser($iduser){
		// Buscamos los datos en la base de datos
		$this->db->where('IdUsuarios',$iduser);
		$data = $this->db->get('ASIGNADOS');
        return $data->result(); // se regresa la tupla de los datos encontrados 
	}

	// Método para obtener todos los Estudios que coinciden con el id del usuario
	public function buscarStudyPorId($idstudy){
		// Buscamos los datos en la base de datos
		$this->db->where('idEstudio',$idstudy);
		$data = $this->db->get('ESTUDIOS');
    return $data->result(); // se regresa la tupla de los datos encontrados 
	}
}