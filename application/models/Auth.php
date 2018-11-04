<?php

class Auth extends CI_Model{
	
	function __construct(){
		$this->load->database();
	}

	public function login($user, $pass){
		$data = $this->db->get_where('USUARIOS',array('Correo' => $user,'Contrasena' => $pass));
        if(!$data->result()){
            return false;
        }
        return $data->row();
	}
}
