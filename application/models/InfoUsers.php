<?php
class InfoUsers extends CI_Model{

    public function __construct(){
        $this->load->database();
    }
    public function save($user,$user_info){
        $this->db->trans_start();
            $this->db->insert('USUARIOS',$user); 
            $user_info['id_usuario'] = $this->db->insert_id();   
            $this->db->insert('INFO_USUARIOS',$user_info);
        $this->db->trans_complete();
        return !$this->db->trans_status() ? false : true;
    }
}