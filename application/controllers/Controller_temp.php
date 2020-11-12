<?php

if (!defined('BASEPATH'))
    exit('No direct script access allowed');

class Controller_temp extends CI_Controller {

    public function __construct() {
        parent::__construct();
        $this->load->model('Usuarios');
        $this->load->model('Model_bitacora');
        $this->load->model('Model_tema');
        $this->load->model('Model_red');
        $this->load->model('Model_NoticeView');
        $this->load->model('Model_edition');
        $this->load->model('Model_visitas');
        $this->load->library('session');
    }

    public function index() {
        
    }

    // public function index() {
    //     $data['titulo'] = "Inicio";
    //     $data['id'] = "1";
    //     $data['tema'] = $this->Model_tema->info_tema();
    //     $data['edit'] = $this->Model_edition->info_edition();
    //     $data['res'] = $this->Model_visitas->visitas();
    //     $vista = "template_web/temp/prueba.php";
    //     $this->cargar_plantilla_web($vista, $data);
    // }

    
    public function cargar_plantilla_web($vista, $data) {
        $data['main_content'] = $vista;
        $data['tema'] = $this->Model_tema->info_tema();
        $data['red'] = $this->Model_red->info_red();
        $this->load->view('template_web/temp/View_template', $data);
    }
}
