<?php 
defined('BASEPATH') OR exit('No direct script access allowed');

// Controlador del DashBoard
class Dashboard extends CI_Controller {

    // Constructor del Dasboard
    public function __construct(){
        parent::__construct(); // Constructor padre de CI_Controller
        // Corgamos el Modelo Info Users
        $this->load->model(array('InfoUsers','Estudios'));
    }

    // Método index para Cagar vista del Dasboard
    public function index(){
        // verifica si el usuario esta logueado, si no manda error 404 de Codeigniter
        if($this->session->userdata('is_logged')){
            // Dependiendo el Rol muestra su vista correspondiente
            switch ($this->session->userdata('rol')) {
                case "Administrador de Sistema":
                    // Cargamos a todos los Usuarios en una variable
                    $data = $this->InfoUsers->getUsers();
                    $vista = $this->load->view('admin_sistema/show_users',array('data' => $data),TRUE);
                    $links = $this->load->view('layout/aside_sistema','',TRUE); // Barra lateral de navegacion
					break;
				case "Administrador de Estudio":
                    $dataestudios = $this->Estudios->getStudies();
                    $vista = $this->load->view('admin_estudio/show_studies',array('data' => $dataestudios),TRUE);
                    $links = $this->load->view('layout/aside_estudio','',TRUE); // Barra lateral de navegacion
					break;
                case "Encuestador":
                    $iduser = $this->session->userdata('id');
                    $vista = $this->load->view('encuestador/show_encuestas',array('idencuestador' => $iduser),TRUE);
                    $links = $this->load->view('layout/aside_encuestador','',TRUE); // Barra lateral de navegacion
					break;
				case "Analista":
                    $vista = $this->load->view('analista/show_analista','',TRUE);
                    $links = $this->load->view('layout/aside_analista','',TRUE); // Barra lateral de navegacion
					break;
            }
            // Carga el Template con la vista correspondiente
            $this->getTemplate($vista,$links);
        }else{
            show_404(); // Error 404 de Codeigniter
        }
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
