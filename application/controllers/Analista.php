<?php 
defined('BASEPATH') OR exit('No direct script access allowed');

// Controlador User para creacion, eliminacion y modificacion de usuarios
class Analista extends CI_Controller {
  // Constructor de User
	public function __construct(){
		parent::__construct(); // Constructor padre de CI_Controller
		// Cargamos Bibliotecas, Helpers y Modelos a Usar
		$this->load->library(array('form_validation'));
		$this->load->model(array('Encuestados','Analiza'));
	}

	// Método index para Cagar vista de Show Users
	public function index(){
		$data = $this->getListQuest();
		$vista = $this->load->view('analista/show_encuestas',array('data' => $data),TRUE);
		$links = $this->load->view('layout/aside_analista','',TRUE); // Barra lateral de navegacion
		$this->getTemplate($vista,$links); // Carga el Template con la vista correspondiente
	}

	public function detalles($idquest)	{
		$data = $this->getDetalleStudy($idquest);
		$questdone = $this->Encuestados->buscarQuestDonePorIdcuestionario($idquest);
		$vista = $this->load->view('analista/detalles_encuesta',array('data' => $data,'questdone' => $questdone),TRUE);
		$links = $this->load->view('layout/aside_analista','',TRUE); // Barra lateral de navegacion
		$this->getTemplate($vista,$links); // Carga el Template con la vista correspondiente
	}

	public function encuesta($idquestdone,$encuesta,$idquest){
		$encuesta = str_replace("%20", " ", $encuesta);
		$dataencuesta = $this->getEncuesta($idquestdone);
		$vista = $this->load->view('analista/analiza_encuesta',array(
			'data' => $dataencuesta, 'encuesta' => $encuesta, 'idquest' => $idquest),TRUE);
		$links = $this->load->view('layout/aside_analista','',TRUE); // Barra lateral de navegacion
		$this->getTemplate($vista,$links); // Carga el Template con la vista correspondiente
	}

	public function download(){
		$vista = $this->load->view('analista/download_encuesta','',TRUE);
		$links = $this->load->view('layout/aside_analista','',TRUE); // Barra lateral de navegacion
		$this->getTemplate($vista,$links); // Carga el Template con la vista correspondiente
	}

	public function getListQuest(){
		$idstudy = $this->Encuestados->buscarIdStudyPorIdUser($this->session->userdata('id'));
		$data = array();
		foreach ($idstudy as $i) {
			$quest = $this->Encuestados->buscarQuestPorIdEstudio($i->IdEstudio);
			$study = $this->Encuestados->buscarStudyPorId($i->IdEstudio);
			foreach ($quest as $j) {
				array_push($data,array(
					'study' => $study[0]->Estudio,
					'asignadoe' => $study[0]->Encuestador,
          'asignadoa' => $study[0]->Analista,
          'idquest' => $j->IdCuestionario,
					'quest' => $j->Nombre_Cuestionario)
				);
			}
		}
		return $data;
	}

	public function getDetalleStudy($idquest){
		$quest = $this->Encuestados->buscarQuestPorIdcuestionario($idquest);
		$study = $this->Encuestados->buscarStudyPorId($quest[0]->IdEstudio);
		$data = array(
			'user' => $this->session->userdata('nombre_usuario'),
			'study' => $study[0]->Estudio,
			'typestudy' => $study[0]->Tipo,
			'asignadoe' => $study[0]->Encuestador,
			'asignadoa' => $study[0]->Analista,
			'idquest' => $quest[0]->IdCuestionario,
			'quest' => $quest[0]->Nombre_Cuestionario,
			'desc' => $quest[0]->Descripcion
		);
		return $data;
	}

	public function getEncuesta($idquestdone){
		$data = array();
		$idrespcampo = $this->Analiza->buscarRespuestaCampoPorIdQuestDone($idquestdone);
		foreach ($idrespcampo as $i) {
			$resp = $this->Analiza->buscarRespuestaPorId($i->IdRespuesta);
			$reagent = $this->Analiza->buscarReagentsPorId($resp[0]->IdReactivo);
			array_push($data,array(
				'reagent' => $reagent[0]->Nombre_Reactivo,
				'respuesta' => $resp[0]->Respuesta
				)
			);
		}
		return $data;
	}

	// Método Template que Carga todos los elemento de las Vistas
	public function getTemplate($view,$links){
		$data['title'] = 'Analista'; // titulo del Encabezado
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