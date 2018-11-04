<?php
defined('BASEPATH') OR exit('No direct script access allowed');

// Controlador del Login
class Login extends CI_Controller {

	// Constructor de Login
	public function __construct(){
		parent::__construct(); // Constructor padre de CI_Controller
		// Cargamos Bibliotecas, Helpers y Modelos a Usar
		$this->load->library(array('form_validation'));
		$this->load->helper(array('auth/login_rules'));
		$this->load->model('Auth');
	}

	// Método index para Cagar vista de Login
	public function index(){
		// Ponemos titulo al Encabezado y Cargamos Vistas de Encabezado y Login
		$data['title'] = 'Login';
		$this->load->view('layout/head',$data);
		$this->load->view('login');
	}

	// Método para la Validacion
	public function validate(){
		// Elimina delimitadores < > </ > del formulario
		$this->form_validation->set_error_delimiters('','');
		$rules = getLoginRules(); // Carga las Reglas del helper login_rules en una variable
		$this->form_validation->set_rules($rules); // Se agregan las Reglas al Formulario
		// Validacion, si hay un problema de entrada manda error correspondiente, si no da acceso al Dashboard correspondiente
		if ($this->form_validation->run() == FALSE){
			// Muestra error 400 de Ajax en assets/js/auth/login.js
			$errors = array(
				'email' => form_error('email'),
				'password' => form_error('password')
			);
			echo json_encode($errors);
			$this->output->	set_status_header(400);
		}else{
			// Toma la informacion de los campos corespondientes y la guarda en variables
			$usr = $this->input->post('email');
			$pass = $this->input->post('password');
			// Verifica los Datos, si el Usuario es incorrecto
			if(!$res = $this->Auth->login($usr,$pass)){
				// Muestra error 401 de Ajax en assets/js/auth/login.js
				echo json_encode(array('msg' => 'Verifique sus credenciales'));
				$this->output->set_status_header(401);
				exit; // Termina el Método
			}
			// Obtiene los datos de la Base de Datos y los guarda en un array
			$datos = array(
				'id' => $res->Id,
				'rol' => $res->Rol,
				'status' => $res->Status,
				'nombre_usuario' => $res->Nombre_Usuario,
				'is_logged' => TRUE,
			);
			// Permite mantener los datos del usuario mientras navegan por su sitio
			$this->session->set_userdata($datos);
			// Mensaje Temporal de Bienvenida
			$this->session->set_flashdata('msg','Bienvenido '.$datos['rol'].' '.$datos['nombre_usuario']);
			// Redirecciona al Dashboard
			echo json_encode(array("url" => base_url('dashboard')));
		}
	}

	// Método de Logout que destruye los datos del usuario y regresa al login
	public function logout(){
		$vars = array('id','rol','status','nombre_usuario','is_logged');
		$this->session->unset_userdata($vars);
		$this->session->sess_destroy();
		redirect('login');
	}
}			