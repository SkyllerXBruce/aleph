<?php 
defined('BASEPATH') OR exit('No direct script access allowed');

// Controlador User para creacion, eliminacion y modificacion de usuarios
class Studies extends CI_Controller {
    // Constructor de User
    public function __construct(){
        parent::__construct(); // Constructor padre de CI_Controller
    }

    // Método index para Cagar vista de Show Users
    public function index(){
        $vista = $this->load->view('admin_estudio/estudio','',TRUE);
        $links = $this->load->view('layout/aside_estudio','',TRUE); // Barra lateral de navegacion
        $this->getTemplate($vista,$links); // Carga el Template con la vista correspondiente
    }

    // Método create que Carga la Vista para la Creacion de Usuarios  
    public function create(){
        
    }

    // Método Template que Carga todos los elemento de las Vistas
    public function getTemplate($view,$links){
        $data['title'] = 'Administardor del Sistema'; // titulo del Encabezado
        // Partes de la vista 
        $data = array(
            'head' => $this->load->view('layout/head',$data,TRUE), // Encabezado
            'nav' => $this->load->view('layout/nav','',TRUE), // Barra superior de navegacion
            'aside' => $links, // Barra lateral de navegacion
            'content' => $view, // Contenido de la pagina
            'footer' => $this->load->view('layout/footer','',TRUE), // Pie de pagina
        );
        $this->load->view('dashboard',$data); // mandamos todo al Dashboard
    }
}