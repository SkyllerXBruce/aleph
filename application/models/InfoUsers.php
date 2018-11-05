<?php
// Modelo InfoUsers para la Ingrsar datos de Usuario
class InfoUsers extends CI_Model{

    // Constructor del Modelo InfoUsers
    public function __construct(){
        // Cargamos la Base de Datos
        $this->load->database();
    }

    // Método para agregar los datos
    public function save($user,$user_info){
        // Se inicia una transaccion de tal forma que verifica que se realice correctamente lo contenido dentro, si falla cualquier cosa, se revierte todas las acciones realizadas para evitar corrupciones en los datos 
        $this->db->trans_start();
            // incerta los datos del usuario a la tabla 
            $this->db->insert('USUARIOS',$user); 
            // obtiene el identificador del usuario y lo guarda en la columna id_usuario de la tabla
            $user_info['id_usuario'] = $this->db->insert_id();   
            // incerta los datos de la Informacion del usuario a la tabla 
            $this->db->insert('INFO_USUARIOS',$user_info);
        $this->db->trans_complete(); // Termina la transaccion
        // regresa verdadero o falso dependiendo si la tansaccion fue ejecutada correctamente o fallo
        return !$this->db->trans_status() ? false : true; 
    }

    // Métodos para obtener todos los datos de la tabla usuarios
    public function getUsers(){
        $sql = $this->db->get('USUARIOS'); 
        return $sql->result(); // regresa todos los datos 
    }
}