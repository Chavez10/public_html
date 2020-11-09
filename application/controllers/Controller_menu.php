<?php

if (!defined('BASEPATH'))
    exit('No direct script access allowed');

class Controller_menu extends CI_Controller {

    public function __construct() {
        parent::__construct();
        $this->load->model('Usuarios');
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

public function vista_menu() {
        if (!isset($_SESSION['usuario']))
            redirect('Controller_home/index');
        $roles = $this->Usuarios->obtener_roles();
        $menuss = $this->Usuarios->listar_menu();
        $data['menus'] = $menuss;
        $data['roles'] = $roles;
        $idrol = $this->session->userdata('idrol');
        $vista = "menu/View_menu";
        $this->cargar_plantilla($idrol, $vista, $data);
    }
    
    public function linea_actualizar() {
        if ($_POST['action'] == 'fetchSingleRow') {
            $output[] = '';
            $table = 'gu_menu';
            $editBtnId = $_POST['editBtnId'];
            $result = $this->Usuarios->linea_actualizar($table, $editBtnId);
            foreach ($result as $value) {
                $output['menu'] = $value->menu;
                $output['icono'] = $value->icono;
            }
            echo json_encode($output);
        }
    }

    public function actualizar_crear_menu() {
        if (isset($_POST['action'])) {
            if ($_POST['action'] == 'create') {
                $table = 'gu_menu';

                $data = array(
                    'menu' => $_POST['menu'],
                    'icono' => $_POST['icono'],
                );
                $result = $this->Usuarios->crear_menum($table, $data);
                if ($result) {
                    echo 'created';
                }
            }

            if ($_POST['action'] == 'update') {
                $table = 'gu_menu';
                $updateId = $_POST['updateId'];

                $data = array(
                    'menu' => $_POST['menu'],
                    'icono' => $_POST['icono'],
                );
                $result = $this->Usuarios->actualizar_menum($table, $data, $updateId);
                if ($result) {
                    echo 'update';
                }
            }
        }
    }

    public function listar_menu() {
        //valor a Buscar
        $buscar = $this->input->post("buscar");
        $numeropagina = $this->input->post("nropagina");
        $cantidad = $this->input->post("cantidad");

        $inicio = ($numeropagina - 1) * $cantidad;
        $data = array(
            "menu" => $this->Usuarios->listar_menum($buscar, $inicio, $cantidad),
            "totalregistros" => count($this->Usuarios->listar_menum($buscar)),
            "cantidad" => $cantidad
        );
        echo json_encode($data);
    }

    public function eliminar_menu() {
        if ($_POST['action'] == 'delete') {
            $table = "gu_menu";
            $delteBtnId = $_POST['delteBtnId'];
            $result = $this->Usuarios->eliminar_menum($table, $delteBtnId);
            if ($result) {

                echo 'deleted';
            }
        }
    }

}
