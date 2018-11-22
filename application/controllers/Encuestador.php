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
		
		//$idestudios = $this->Encuestados->buscarStudiesporEncuestador($this->session->userdata('id'));
		//echo "iduser=".$this->session->userdata('id').'<br>';

		//echo $idestudios[0]->IdEstudio;
		//$id = $this->Encuestados->buscarQuestPorIdEstudio($idestudios[0]->IdEstudio);

		//foreach ($id as $quest) {
		//	echo $quest->Nombre_Cuestionario;
		//	$data = $quest->Nombre_Cuestionario;
		//}
		//echo $data;
    $vista = $this->load->view('encuestador/show_encuestas','',TRUE);
		$links = $this->load->view('layout/aside_encuestador','',TRUE); // Barra lateral de navegacion
		$this->getTemplate($vista,$links); // Carga el Template con la vista correspondiente
	}

	public function create(){
		$quest = $this->Encuestados->getQuest();
		$vista = $this->load->view('encuestador/create_encuestado',array(
			'dataedad' => array(
				'1 - 3 años','3 - 5 años','5 - 10 años','10 - 15 años','15 - 20 años','20 - 30 años',
				'30 - 40 años','50 - 60 años','60 - 70 años','70 - 80 años','Mas de 80 años'),
			'dataschool' => array(
				'Primaria','Secundaria','Preparatoria','Licenciatura',
				'Maestría','Doctorado','Posgrado','Ingeniería'),
			'datamoney' => array(
				'2,000-7,999','8,000-15,999','16,000-24,999',
				'25,000-34,999','35,000-49,999','Mas de 50,000'),
			'dataquest' => $quest),TRUE);
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
		$quest = $this->input->post('quest');
		// Carga las Reglas del helper users_rules y las agrega al Formulario
		$this->form_validation->set_rules(getEncuestadoRules());
		// Validacion del Formulario, si hay un problema de sintaxis manda el error, si no registra el Usuario y retorna a la vista del controlador user
		if($this->form_validation->run() == FALSE){
			$this->output->set_status_header(400);
		} else {
			$dataquest = $this->Encuestados->buscarQuest($quest);
			date_default_timezone_set('America/Mexico_City');
			$hoy = date('Y-m-d G:i:s');
			$data = array(
				'IdEstudio' => $dataquest->IdEstudio,
				'IdCuestionario' => $dataquest->IdCuestionario,
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
		$quest = $this->Encuestados->getQuest();
		$vista = $this->load->view('encuestador/create_encuestado',array(
			'dataedad' => array(
				'1 - 3 años','3 - 5 años','5 - 10 años','10 - 15 años','15 - 20 años','20 - 30 años',
				'30 - 40 años','50 - 60 años','60 - 70 años','70 - 80 años','Mas de 80 años'),
			'dataschool' => array(
				'Primaria','Secundaria','Preparatoria','Licenciatura',
				'Maestría','Doctorado','Posgrado','Ingeniería'),
			'datamoney' => array(
				'2,000-7,999','8,000-15,999','16,000-24,999',
				'25,000-34,999','35,000-49,999','Mas de 50,000'),
			'dataquest' => $quest),TRUE);
		$links = $this->load->view('layout/aside_encuestador','',TRUE); // Barra lateral de navegacion
		$this->getTemplate($vista,$links); // Carga el Template con la vista correspondiente
	}

	public function inicia(){
		$vista = $this->load->view('encuestador/inicia_encuesta','',TRUE);
		$links = ''; // Barra lateral de navegacion
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