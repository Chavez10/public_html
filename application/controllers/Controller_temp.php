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
        $this->load->library('session');
    }

    public function cargar_plantilla_web($vista, $data) {
        $data['main_content'] = $vista;
        $data['tema'] = $this->Model_tema->info_tema();
        $data['red'] = $this->Model_red->info_red();
        $this->load->view('template_web/temp/View_template', $data);
    }

    function prueba() {
        $data['titulo'] = "Inicio";
        $vista = "template_web/temp/prueba";
        $this->cargar_plantilla_web($vista, $data);
    }

    function listaNoticias() {
        $data['titulo'] = "Noticias";
        $vista = "template_web/patria/ViewlistNoticias";
        $this->cargar_plantilla_web($vista, $data);
    }
}
