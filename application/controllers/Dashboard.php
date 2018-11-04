<?php 
defined('BASEPATH') OR exit('No direct script access allowed');

// Controlador del DashBoard
class Dashboard extends CI_Controller {
    public function __construct(){
        parent::__construct();
    }
    public function index(){
        if($this->session->userdata('is_logged')){
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
            $this->getTemplate($vista);
        }else{
            show_404();
        }
    }

    public function getTemplate($view){
        $data['title'] = 'Administardor del Sistema';
        $data = array(
            'head' => $this->load->view('layout/head',$data,TRUE),
            'nav' => $this->load->view('layout/nav','',TRUE),
            'aside' => $this->load->view('layout/aside','',TRUE),
            'content' => $view,
            'footer' => $this->load->view('layout/footer','',TRUE),
        );
        $this->load->view('dashboard',$data);
    }
}
