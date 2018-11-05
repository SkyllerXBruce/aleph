<?php
// Modelo Auth para la autenticacion de datos
class Auth extends CI_Model{
	
	// Constructor delModelo Auth
	function __construct(){
		// Cargamos la Base de Datos
		$this->load->database();
	}

	// Método login para verificar los datos
	public function login($user, $pass){
		// Buscamos los datos en la base de datos
		$data = $this->db->get_where('USUARIOS',array('Correo' => $user,'Contrasena' => $pass));
		// Si encontramos los datos regresamos un falso 
        if(!$data->result()){
            return false;
        }
        return $data->row(); // se regresa la tupla de los datos encontrados 
	}
}
