<?php

if (!defined('BASEPATH'))
    exit('No direct script access allowed');

class Controller_visitas extends CI_Controller {

    public function __construct() {
        parent::__construct();
        $this->load->model('Usuarios');
        $this->load->model('Model_visitas');
    }

    public function cargar_plantilla($idrol, $vista, $data = '') {
        $data['usuario'] = $this->session->userdata('usuario');
        $menu_rol = $this->Usuarios->menu_principal($idrol);
        $data['rol'] = $idrol;
        if ($menu_rol) {
            $data['menu_principal'] = $menu_rol;
        }
        $data['main_content'] = $vista;
        $this->load->view('template/template', $data);
    }

    public function vista_visitas() {
        if (!isset($_SESSION['usuario']))
            redirect('Controller_home/index');
        $roles = $this->Usuarios->obtener_roles();
        $menuss = $this->Usuarios->listar_menu();
        $data['res'] = $this->Model_visitas->vistas_view();
        $data['navegador'] = $this->Model_visitas->estadistica_navegador();
        $data['os'] = $this->Model_visitas->estadistica_os();
        $data['movil'] = $this->Model_visitas->estadistica_movil();
        $data['menus'] = $menuss;
        $data['roles'] = $roles;
        $idrol = $this->session->userdata('idrol');
        $vista = "menu/View_visitas";
        $this->cargar_plantilla($idrol, $vista, $data);
    }

    /*----------------En proceso------------------

    public function cargar_historia($fecha=null){
        $roles = $this->Usuarios->obtener_roles();
        $menuss = $this->Usuarios->listar_menu();
        $data['movil_fecha'] = $this->Model_visitas->estadistica_nav_fecha($fecha);
        $data['menus'] = $menuss;
        $data['roles'] = $roles;
        $idrol = $this->session->userdata('idrol');
        $vista = "menu/View_estadisticas";
        $this->cargar_plantilla($idrol, $vista, $data);

    }*/

}
