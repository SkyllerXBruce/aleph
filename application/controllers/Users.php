<?php 
defined('BASEPATH') OR exit('No direct script access allowed');

// Controlador User para creacion, eliminacion y modificacion de usuarios
class Users extends CI_Controller {
    // Constructor de User
    public function __construct(){
        parent::__construct(); // Constructor padre de CI_Controller
        // Cargamos Bibliotecas, Helpers y Modelos a Usar
        $this->load->library(array('form_validation','email'));
        $this->load->helper(array('users/users_rules','string'));
        $this->load->model('InfoUsers');
    }

    // Método index para Cagar vista de Show Users
    public function index(){
        // Cargamos a todos los Usuarios en una variable
        $data = $this->InfoUsers->getUsers();
        // Carga el Template con la vista Show Users y los datos de todos los usuarios 
    	$this->getTemplate($this->load->view('admin_sistema/show_users',array('dat' => $data),true)); 
    }

    // Método create que Carga la Vista para la Creacion de Usuarios  
    public function create(){
        $vista = $this->load->view('admin_sistema/create_user','',true);
        $this->getTemplate($vista); // Carga el Template con la vista correspondiente
    }

    // Método create que Carga la Vista para la Creacion de Usuarios  
    public function edit($parametro){
        $id['user'] = $parametro;
        $vista = $this->load->view('admin_sistema/edit_user',$id,true);
        $this->getTemplate($vista); // Carga el Template con la vista correspondiente
    }

    // Método create que Carga la Vista para la Creacion de Usuarios  
    public function delete($parametro){
        $id['user'] = $parametro;
        $vista = $this->load->view('admin_sistema/delete_user',$id,true);
        $this->getTemplate($vista); // Carga el Template con la vista correspondiente
    }

    // Método para registrar un Usuario
    public function registrarUsuario(){
        // Toma la informacion de los campos y la guarda en las variables corespondientes
        $user = $this->input->post('user');
        $correo = $this->input->post('correo');
        $rol = $this->input->post('rol');
        $name = $this->input->post('name');
        $lastname = $this->input->post('lastname');
        $esp = $this->input->post('esp');
        $edad = $this->input->post('edad');
        $matricula = $this->input->post('matricula');
        // Carga las Reglas del helper users_rules y las agrega al Formulario
        $this->form_validation->set_rules(getCreateUserRules());
        // Validacion del Formulario, si hay un problema de sintaxis manda el error, si no registra el Usuario y retorna a la vista del controlador user
        if($this->form_validation->run() == FALSE){
            $this->output->set_status_header(400);
        }else{
            // Datos para la tabla Usuarios
        	$user = array(
                'nombre_usuario' => $user,
                'contrasena' => random_string('alnum',8), // Crea una contraseña aleatoria alphanumerica de 8 caracteres
                'correo' => $correo,
                'rol' => $rol,
                'status' => "En linea",
            );
            // Datos para la tabla Info Usuarios
            $user_info = array(
                'nombres' => $name,
                'apellidos' => $lastname,
                'matricula' => $matricula,
                'edad' =>  $edad,
                'especialidad' => $esp,
            );
            // Verifica si los datos fueron agregados Correctamente, si no manda error 500 de Codeigniter 
			if(!$this->InfoUsers->save($user,$user_info)){
                $this->output->set_status_header(500);
            }else{
                // Manda los datos la método sendEmail para enviar un email al usuario
                $this->sendEmail($user);
                // Mensaje temporal de que el usuario fue registrado
                $this->session->set_flashdata('msg','El usuario a sido registrado'); 
                redirect(base_url('dashboard')); // redirige a la vista del controlador user
            }
        }
        // Si hay un error se mantiene en la vista Create user para que los datos no se borren
        $vista = $this->load->view('admin_sistema/create_user','',true);
        $this->getTemplate($vista); // Carga el Template con la vista correspondiente
    }

    // Método para mandar un email al usuario
    public function sendEmail($data){
        $this->email->from('aleph.sistema@alephcorp.com', 'Aleph Corp'); // Quien lo envia
        $this->email->to($data['correo']); // Destinatario
        $this->email->subject('Bienvenido al Sistema de Encuestas'); // Asunto
        $vista = $this->load->view('email/newuser',$data,TRUE); // vista del mensaje
        $this->email->message($vista); // mensaje a enviar
        $this->email->send(); // envio del correo
    }

    // Método Template que Carga todos los elemento de las Vistas
    public function getTemplate($view){
        $data['title'] = 'Administardor del Sistema'; // titulo del Encabezado
        // Partes de la vista 
        $data = array(
            'head' => $this->load->view('layout/head',$data,TRUE), // Encabezado
            'nav' => $this->load->view('layout/nav','',TRUE), // Barra superior de navegacion
            'aside' => $this->load->view('layout/aside','',TRUE), // Barra lateral de navegacion
            'content' => $view, // Contenido de la pagina
            'footer' => $this->load->view('layout/footer','',TRUE), // Pie de pagina
        );
        $this->load->view('dashboard',$data); // mandamos todo al Dashboard
    }
}