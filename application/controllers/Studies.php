<?php 
defined('BASEPATH') OR exit('No direct script access allowed');

// Controlador User para creacion, eliminacion y modificacion de usuarios
class Studies extends CI_Controller {
    // Constructor de User
    public function __construct(){
        parent::__construct(); // Constructor padre de CI_Controller
        // Cargamos Bibliotecas, Helpers y Modelos a Usar
        $this->load->library(array('form_validation'));
        $this->load->helper(array('studies/study_rules','studies/quest_rules'));
        $this->load->model('Estudios');
    }

    // Método index para Cagar vista de Show Users
    public function index(){
        $dataestudios = $this->Estudios->getStudies();
        $vista = $this->load->view('admin_estudio/show_studies',array('data' => $dataestudios),TRUE);
        $links = $this->load->view('layout/aside_estudio','',TRUE); // Barra lateral de navegacion
        $this->getTemplate($vista,$links); // Carga el Template con la vista correspondiente
    }

    // Método create que Carga la Vista para la Creacion de Usuarios  
    public function create(){
        $dataencuesta = $this->Estudios->getEncuestador();
        $dataanalista = $this->Estudios->getAnalista();
        $vista = $this->load->view('admin_estudio/create_study',array(
            'dataencuestador' => $dataencuesta,
            'dataanalista' => $dataanalista),TRUE);
        $links = $this->load->view('layout/aside_estudio','',TRUE); // Barra lateral de navegacion
        $links = $this->load->view('layout/aside_estudio','',TRUE); // Barra lateral de navegacion
        $this->getTemplate($vista,$links); // Carga el Template con la vista correspondiente
    }

    public function addStudy(){
        // Toma la informacion de los campos y la guarda en las variables corespondientes
        $estudio = $this->input->post('nombre_estudio');
        $tipo = $this->input->post('tipo');
        $encuestador = $this->input->post('encuestador');
        $analista = $this->input->post('analista');
        // Carga las Reglas del helper users_rules y las agrega al Formulario
        $this->form_validation->set_rules(getStudyRules());
        if($this->form_validation->run() == FALSE){
            $this->output->set_status_header(400);
        }else{
            // Datos para la tabla Estudios
            $data = array(
                'Estudio' => $estudio,
                'Tipo' => $tipo,
                'Encuestador' => $encuestador,
                'Analista' => $analista
            );
            // Verifica si los datos fueron agregados Correctamente, si no manda error 500 de Codeigniter 
			if(!$this->Estudios->save($data)){
                $this->output->set_status_header(500);
            }else{
                // Mensaje temporal de que el Estudio fue Añadido
                $this->session->set_flashdata('msg','El Estudio a sido Añadido'); 
                redirect(base_url('studies')); // redirige a la vista del controlador Studies
            }
        }
        // Si hay un error se mantiene en la vista de Alta de Estudiosser para que los datos no se borren
        $dataencuesta = $this->Estudios->getEncuestador();
        $dataanalista = $this->Estudios->getAnalista();
        $vista = $this->load->view('admin_estudio/create_study',array(
            'dataencuestador' => $dataencuesta,
            'dataanalista' => $dataanalista),TRUE);
        $links = $this->load->view('layout/aside_estudio','',TRUE); // Barra lateral de navegacion
        $this->getTemplate($vista,$links); // Carga el Template con la vista correspondiente
    }

    public function createQuest(){
        $dataquest = $this->Estudios->getQuest();
        $vista = $this->load->view('admin_estudio/create_quest',array('data' => $dataquest),TRUE);
        $links = $this->load->view('layout/aside_estudio','',TRUE); // Barra lateral de navegacion
        $this->getTemplate($vista,$links); // Carga el Template con la vista correspondiente
    }

    public function addQuest(){
        // Toma la informacion de los campos y la guarda en las variables corespondientes
        $quest = $this->input->post('quest');
        $desc = $this->input->post('desc');
        // Convertimos las opciones de array en texto ()
        if (isset($_POST['opcion'])) {
            $opcion = implode(', ',$_POST['opcion']);
        }
        // Carga las Reglas del helper users_rules y las agrega al Formulario
        $this->form_validation->set_rules(getQuestRules());
        if($this->form_validation->run() == FALSE){
            $this->output->set_status_header(400);
        }else{
            echo "INSERT INTO TABLA SET Cuestionario='$quest', Descripcion='$desc', Opcion='$opcion'";
        }
        // Si hay un error se mantiene en la vista de Alta de Estudiosser para que los datos no se borren
        $dataquest = $this->Estudios->getQuest();
        $vista = $this->load->view('admin_estudio/create_quest',array('data' => $dataquest),TRUE);
        $links = $this->load->view('layout/aside_estudio','',TRUE); // Barra lateral de navegacion
        $this->getTemplate($vista,$links); // Carga el Template con la vista correspondiente
    }

    public function createReagents(){
        $vista = $this->load->view('admin_estudio/create_reagents','',TRUE);
        $links = $this->load->view('layout/aside_estudio','',TRUE); // Barra lateral de navegacion
        $this->getTemplate($vista,$links); // Carga el Template con la vista correspondiente
    }

    public function addReagents(){
        $vista = $this->load->view('admin_estudio/create_reagents','',TRUE);
        $links = $this->load->view('layout/aside_estudio','',TRUE); // Barra lateral de navegacion
        $this->getTemplate($vista,$links); // Carga el Template con la vista correspondiente
    }

    // Método Template que Carga todos los elemento de las Vistas
    public function getTemplate($view,$links){
        $data['title'] = 'Administardor de Estudio'; // titulo del Encabezado
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