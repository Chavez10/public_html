<?php

defined('BASEPATH') OR exit('No direct script access allowed');

class Controller_bitacora extends CI_Controller {

    public function __construct() {
        date_default_timezone_set('America/El_Salvador');
        parent::__construct();
        @ session_start();
        $this->load->model('Usuarios');
        $this->load->model('Model_bitacora');
    }

    public function cargar_plantilla($idrol, $vista, $data = '') {
        if (!isset($_SESSION['usuario']))
            redirect('Controller_home/index');
        $data['usuario'] = $this->session->userdata('usuario');
        $menu_rol = $this->Usuarios->menu_principal($idrol);
        $data['rol'] = $idrol;
        if ($menu_rol)
            $data['menu_principal'] = $menu_rol;
        $data['main_content'] = $vista;
        $this->load->view('template/template', $data);
    }

    public function estado_actividad() {
        if (!isset($_SESSION['usuario']))
            redirect('Controller_home/index');
        $roles = $this->Usuarios->obtener_roles();
        $menuss = $this->Usuarios->listar_menu();
        $data['menus'] = $menuss;
        $data['roles'] = $roles;
        $idrol = $this->session->userdata('idrol');
        $vista = "bitacoras/view_actividad";
        $this->cargar_plantilla($idrol, $vista, $data);
    }
        public function mostrar_bitacora() {
        if (!isset($_SESSION['usuario']))
            redirect('Controller_home/index');
        $roles = $this->Usuarios->obtener_roles();
        $menuss = $this->Usuarios->listar_menu();
        $data['menus'] = $menuss;
        $data['roles'] = $roles;
        $idrol = $this->session->userdata('idrol');
        $vista = "bitacoras/View_acciones";
        $this->cargar_plantilla($idrol, $vista, $data);
    }

    public function listar_actividad() {
        //valor a Buscar
        $buscar = $this->input->post("buscar");
        $numeropagina = $this->input->post("nropagina");
        $cantidad = $this->input->post("cantidad");

        $inicio = ($numeropagina - 1) * $cantidad;
        $data = array(
            "actividad" => $this->Model_bitacora->listar_actividad($buscar, $inicio, $cantidad),
            "totalregistros" => count($this->Model_bitacora->listar_actividad($buscar)),
            "cantidad" => $cantidad
        );
        echo json_encode($data);
    }

    public function listar_acciones() {
        //valor a Buscar
        $buscar = $this->input->post("buscar");
        $numeropagina = $this->input->post("nropagina");
        $cantidad = $this->input->post("cantidad");

        $inicio = ($numeropagina - 1) * $cantidad;
        $data = array(
            "acciones" => $this->Model_bitacora->listar_acciones($buscar, $inicio, $cantidad),
            "totalregistros" => count($this->Model_bitacora->listar_acciones($buscar)),
            "cantidad" => $cantidad
        );
        echo json_encode($data);
    }

}
