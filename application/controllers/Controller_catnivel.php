<?php

if (!defined('BASEPATH'))
    exit('No direct script access allowed');

class Controller_catnivel extends CI_Controller {

    public function __construct() {
        parent::__construct();
        $this->load->model('Usuarios');
        $this->load->model('Model_bitacora');
        $this->load->model('Model_catnivel');
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

    public function vista_catnivel() {
        if (!isset($_SESSION['usuario']))
            redirect('Controller_home/index');
        $roles = $this->Usuarios->obtener_roles();
        $menuss = $this->Usuarios->listar_menu();
        $data['menus'] = $menuss;
        $data['roles'] = $roles;
        $idrol = $this->session->userdata('idrol');
        $vista = "config/View_nivel";
        $this->cargar_plantilla($idrol, $vista, $data);
    }
#-----------------------------------------------------------------------
  public function linea_actualizar() {
        if ($_POST['action'] == 'fetchSingleRow') {
            $output[] = '';
            $table = 'cat_nivel';
            $editBtnId = $_POST['editBtnId'];
            $result = $this->Model_catnivel->linea_actualizar($table, $editBtnId);
            foreach ($result as $value) {
                $output['id_cat_nivel'] = $value->id_cat_nivel;
                $output['nc_nivel'] = $value->nc_nivel;
            }
            echo json_encode($output);
        }
    }

    public function actualizar_crear_catnivel() {
        if (isset($_POST['action'])) {
            if ($_POST['action'] == 'create') {
                $table = 'cat_nivel';

                $data = array(
                    'nc_nivel' => $_POST['nc_nivel']
                );
                $result = $this->Model_catnivel->crear_catnivel($table, $data);
                if ($result) {
                    echo 'created';
                }
            }

            if ($_POST['action'] == 'update') {
                $table = 'cat_nivel';
                $updateId = $_POST['updateId'];

                $data = array(
                    'nc_nivel' => $_POST['nc_nivel']
                );
                $result = $this->Model_catnivel->actualizar_catnivel($table, $data, $updateId);
                if ($result) {
                    echo 'update';
                }
            }
        }
    }

    public function listar_cat_nivel() {
        //valor a Buscar
        $buscar = $this->input->post("buscar");
        $numeropagina = $this->input->post("nropagina");
        $cantidad = $this->input->post("cantidad");

        $inicio = ($numeropagina - 1) * $cantidad;
        $data = array(
            "catnivel" => $this->Model_catnivel->listar_catnivel($buscar, $inicio, $cantidad),
            "totalregistros" => count($this->Model_catnivel->listar_catnivel($buscar)),
            "cantidad" => $cantidad
        );
        echo json_encode($data);
    }

    public function eliminar_catnivel() {
        if ($_POST['action'] == 'delete') {
            $table = "cat_nivel";
            $delteBtnId = $_POST['delteBtnId'];
            $result = $this->Model_catnivel->eliminar_catnivel($table, $delteBtnId);
            if ($result) {

                echo 'deleted';
            }
        }
    }

}