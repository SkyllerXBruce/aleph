<?php 
defined('BASEPATH') OR exit('No direct script access allowed');
class Users extends CI_Controller {
    public function __construct(){
        parent::__construct();
        $this->load->library(array('form_validation','email'));
        $this->load->helper(array('users/users_rules','string'));
        $this->load->model('InfoUsers');

    }

    public function index(){
    	echo "Todo bien";
    }

    public function create(){
        $vista = $this->load->view('admin_sistema/create_user','',true);
        $this->getTemplate($vista);
    }

    public function store(){
        $user = $this->input->post('user');
        $correo = $this->input->post('correo');
        $rol = $this->input->post('rol');
        $name = $this->input->post('name');
        $lastname = $this->input->post('lastname');
        $esp = $this->input->post('esp');
        $edad = $this->input->post('edad');
        $matricula = $this->input->post('matricula');

        $this->form_validation->set_rules(getCreateUserRules());

        if($this->form_validation->run() == FALSE){
            $this->output->set_status_header(400);
        }else{
        	$user = array(
                'nombre_usuario' => $user,
                'contrasena' => random_string('alnum',8),
                'correo' => $correo,
                'rol' => $rol,
                'status' => 1,
            );
            $user_info = array(
                'nombres' => $name,
                'apellidos' => $lastname,
                'matricula' => $matricula,
                'edad' =>  $edad,
                'especialidad' => $esp,
            );
            
			if(!$this->InfoUsers->save($user,$user_info)){
                $this->output->set_status_header(500);
            }else{
                $this->sendEmail($user);
                $this->session->set_flashdata('msg','El usuario a sido registrado'); 
                redirect(base_url('users'));
            }

        }

        $vista = $this->load->view('admin_sistema/create_user','',true);
        $this->getTemplate($vista); 
    }

    public function sendEmail($data){
        $this->email->from('sistema@aleph.com', 'Aleph Corp');
        $this->email->to($data['correo']);

        $this->email->subject('Información de la Cuenta');
        $vista = $this->load->view('email/welcome',$data,TRUE);

        $this->email->message($vista);

        $this->email->send();
    }

    public function getTemplate($view){
        $data['title'] = 'Admin Sistema';
        $data = array(
            'head' => $this->load->view('layout/head',$data,TRUE),
            'nav' => $this->load->view('layout/nav','',TRUE),
            'aside' => $this->load->view('layout/aside','',TRUE),
            'content' => $view,
            'footer' => $this->load->view('layout/footer','',TRUE),
        );
        $this->load->view('dashboard',$data);
    }

}