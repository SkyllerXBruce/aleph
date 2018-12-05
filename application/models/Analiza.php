<?php
// Modelo Auth para la autenticacion de datos
class Analiza extends CI_Model{
	
	// Constructor delModelo Auth
	function __construct(){
		// Cargamos la Base de Datos
		$this->load->database();
	}

	public function buscarRespuestaCampoPorIdQuestDone($idquestdone){
		// Buscamos los datos en la base de datos
		$this->db->where('IdCuestionarioContestado',$idquestdone);
		$data = $this->db->get('RESPUESTA_CAMPO');
    return $data->result(); // se regresa la tupla de los datos encontrados
  }
  
  public function buscarRespuestaPorId($idresp){
		// Buscamos los datos en la base de datos
		$this->db->where('IdRespuesta',$idresp);
		$data = $this->db->get('RESPUESTAS');
    return $data->result(); // se regresa la tupla de los datos encontrados
  }
  
  public function buscarReagentsPorId($idreagents){
		// Buscamos los datos en la base de datos
		$this->db->where('IdReactivo',$idreagents);
		$data = $this->db->get('REACTIVOS');
    return $data->result(); // se regresa la tupla de los datos encontrados
	}

}
