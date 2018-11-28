<?php 
defined('BASEPATH') OR exit('No direct script access allowed');

// Controlador User para creacion, eliminacion y modificacion de usuarios
class Encuestador extends CI_Controller {
  // Constructor de User
	public function __construct(){
		parent::__construct(); // Constructor padre de CI_Controller
		// Cargamos Bibliotecas, Helpers y Modelos a Usar
		$this->load->library(array('form_validation'));
		$this->load->helper('encuesta/encuestado_rules');
		$this->load->model('Encuestados');
	}

	// Método index para Cagar vista de Show Users
	public function index(){
    $vista = $this->load->view('encuestador/show_encuestas','',TRUE);
		$links = $this->load->view('layout/aside_encuestador','',TRUE); // Barra lateral de navegacion
		$this->getTemplate($vista,$links); // Carga el Template con la vista correspondiente
	}

	public function create(){
		$study = $this->Encuestados->getStudies();
		$vista = $this->load->view('encuestador/create_encuestado',array('datastudy' => $study),TRUE);
		$links = $this->load->view('layout/aside_encuestador','',TRUE); // Barra lateral de navegacion
		$this->getTemplate($vista,$links); // Carga el Template con la vista correspondiente
	}

	public function addEncuestado()	{
		// Toma la informacion de los campos y la guarda en las variables corespondientes
		$iduser = $this->session->userdata('id');
		$name = $this->input->post('name');
		$edad = $this->input->post('edad');
		$gen = $this->input->post('gen');
		$local = $this->input->post('local');
		$school = $this->input->post('school');
		$money = $this->input->post('money');
		$adicional = $this->input->post('adicional');
		$idstudy = $this->input->post('study');
		$idquest = $this->input->post('quest');
		// Carga las Reglas del helper users_rules y las agrega al Formulario
		$this->form_validation->set_rules(getEncuestadoRules());
		// Validacion del Formulario, si hay un problema de sintaxis manda el error, si no registra el Usuario y retorna a la vista del controlador user
		if($this->form_validation->run() == FALSE){
			$this->output->set_status_header(400);
		} else {
			date_default_timezone_set('America/Mexico_City');
			$hoy = date('Y-m-d G:i:s');
			$data = array(
				'IdEstudio' => $idstudy,
				'IdCuestionario' => $idquest,
				'IdUsuarios' => $iduser,
				'Nombre_Encuestado' => $name,
				'Localidad' => $local,
				'Rango_Edad' => $edad,
				'Escolaridad' => $school,
				'Genero' => $gen,
				'Rango_Ingresos' => $money,
				'Info_Adicional' => $adicional,
				'Fecha_Relizado' => $hoy,			 
			);
			// Verifica si los datos fueron agregados Correctamente, si no manda error 500 de Codeigniter 
			if(!$this->Encuestados->save($data)){
				$this->output->set_status_header(500);
			}else{
				// Mensaje temporal de que el usuario fue registrado
				$this->session->set_flashdata('msg','Registro Exitoso, Empieza el Cuestionario'); 
				redirect(base_url('encuestador/inicia')); // redirige a la vista del controlador user
			}
		}
		$study = $this->Encuestados->getStudies();
		$vista = $this->load->view('encuestador/create_encuestado',array('datastudy' => $study),TRUE);
		$links = $this->load->view('layout/aside_encuestador','',TRUE); // Barra lateral de navegacion
		$this->getTemplate($vista,$links); // Carga el Template con la vista correspondiente
	}

	public function inicia(){
		$vista = $this->load->view('encuestador/inicia_encuesta','',TRUE);
		$links = ''; // Barra lateral de navegacion
		$this->getTemplate($vista,$links); // Carga el Template con la vista correspondiente
	}

	public function getQuest(){
		$idstudy = $this->input->post('study');
		if ($idstudy){
			$quest = $this->Encuestados->buscarQuestPorIdEstudio($idstudy);
			echo '<option value="">Selecciona Cuestionario</option>';
			foreach ($quest as $item) {
				echo '<option value="'.$item->IdCuestionario.'">'.$item->Nombre_Cuestionario.'</option>';
			}
		}else{
			echo '<option value="">Selecciona Cuestionario</option>';
		}
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