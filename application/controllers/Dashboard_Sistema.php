<?php 
defined('BASEPATH') OR exit('No direct script access allowed');

// Controlador del DashBoard_Sistema
class Dashboard_Sistema extends CI_Controller {
    public function __construct(){
        parent::__construct();
    }
    public function index(){
        if($this->session->userdata('is_logged')){
            $vista = $this->load->view('admin/show_users','',TRUE);
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
        $this->load->view('dashboard_sistema',$data);
    }
}
