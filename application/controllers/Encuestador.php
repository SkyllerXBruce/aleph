<?php 
defined('BASEPATH') OR exit('No direct script access allowed');

// Controlador User para creacion, eliminacion y modificacion de usuarios
class Encuestador extends CI_Controller {
  // Constructor de User
	public function __construct(){
		parent::__construct(); // Constructor padre de CI_Controller
		// Cargamos Bibliotecas, Helpers y Modelos a Usar
    $this->load->library(array('form_validation'));
	}

	// Método index para Cagar vista de Show Users
	public function index(){
		$vista = $this->load->view('encuestador/show_encuestador','',TRUE);
		$links = $this->load->view('layout/aside_encuestador','',TRUE); // Barra lateral de navegacion
		$this->getTemplate($vista,$links); // Carga el Template con la vista correspondiente
	}

	public function create(){
		$vista = $this->load->view('encuestador/create_encuestado','',TRUE);
		$links = $this->load->view('layout/aside_encuestador','',TRUE); // Barra lateral de navegacion
		$this->getTemplate($vista,$links); // Carga el Template con la vista correspondiente
	}

	public function addEncuestado()	{
		$vista = $this->load->view('encuestador/create_encuestado','',TRUE);
		$links = $this->load->view('layout/aside_encuestador','',TRUE); // Barra lateral de navegacion
		$this->getTemplate($vista,$links); // Carga el Template con la vista correspondiente
	}

	// Método Template que Carga todos los elemento de las Vistas
	public function getTemplate($view,$links){
		$data['title'] = 'Encuestador'; // titulo del Encabezado
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