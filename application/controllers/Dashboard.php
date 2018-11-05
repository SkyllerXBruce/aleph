<?php 
defined('BASEPATH') OR exit('No direct script access allowed');

// Controlador del DashBoard
class Dashboard extends CI_Controller {

    // Constructor del Dasboard
    public function __construct(){
        parent::__construct(); // Constructor padre de CI_Controller
    }

    // Método index para Cagar vista del Dasboard
    public function index(){
        // verifica si el usuario esta logueado, si no manda error 404 de Codeigniter
        if($this->session->userdata('is_logged')){
            // Dependiendo el Rol muestra su vista correspondiente
            switch ($this->session->userdata('rol')) {
				case "Administrador de Sistema":
                    $vista = $this->load->view('admin_sistema/show_users','',TRUE);
					break;
				case "Administrador de Estudio":
                    $vista = $this->load->view('admin_estudio/estudio','',TRUE);
					break;
				case "Encuestador":
                    $vista = $this->load->view('encuestador/encuestador','',TRUE);
					break;
				case "Analista":
                    $vista = $this->load->view('analista/analista','',TRUE);
					break;
            }
            // Carga el Template con la vista correspondiente
            $this->getTemplate($vista);
        }else{
            show_404(); // Error 404 de Codeigniter
        }
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
