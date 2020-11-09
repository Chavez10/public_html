<?php

if (!defined('BASEPATH'))
    exit('No direct script access allowed');

class Controller_c_notice extends CI_Controller {

    public function __construct() {
        parent::__construct();
        $this->load->model('Usuarios');
        $this->load->model('Model_bitacora');
        $this->load->model('Model_C_Notice');
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


        public function vista_c_notice() {
        if (!isset($_SESSION['usuario']))
            redirect('Controller_home/index');
        $roles = $this->Usuarios->obtener_roles();
        $menuss = $this->Usuarios->listar_menu();
        $data['menus'] = $menuss;
        $data['roles'] = $roles;
        $idrol = $this->session->userdata('idrol');
        $vista = "config/View_cnotice";
        $this->cargar_plantilla($idrol, $vista, $data);
    }


    public function linea_actualizar() {
        if ($_POST['action'] == 'fetchSingleRow') {
            $output[] = '';
            $table = 'cat_noticia';
            $editBtnId = $_POST['editBtnId'];
            $result = $this->Model_C_Notice->linea_actualizar($table, $editBtnId);
            foreach ($result as $value) {
                $output['nc_noticia'] = $value->nc_noticia;
                $output['nc_icono'] = $value->nc_icono;
            }
            echo json_encode($output);
        }
    }

    
    public function actualizar_crear_c_notice() {
        if (isset($_POST['action'])) {
            if ($_POST['action'] == 'create') {
                $table = 'cat_noticia';

                $data = array(
                    'nc_noticia' => $_POST['nc_noticia'],
                    'nc_icono' => $_POST['nc_icono'],

                );
                $result = $this->Model_C_Notice->crear_c_notice($table, $data);
                if ($result) {
                    echo 'created';
                }
            }

            if ($_POST['action'] == 'update') {
                $table = 'cat_noticia';
                $updateId = $_POST['updateId'];

                $data = array(
                    'nc_noticia' => $_POST['nc_noticia'],
                    'nc_icono' => $_POST['nc_icono'],
                );
                $result = $this->Model_C_Notice->actualizar_c_notice($table, $data, $updateId);
                if ($result) {
                    echo 'update';
                }
            }
        }
    }
    public function listar_c_notice() {
        //valor a Buscar
        $buscar = $this->input->post("buscar");
        $numeropagina = $this->input->post("nropagina");
        $cantidad = $this->input->post("cantidad");

        $inicio = ($numeropagina - 1) * $cantidad;
        $data = array(
            "cat_noticia" => $this->Model_C_Notice->listar_c_notice($buscar, $inicio, $cantidad),
            "totalregistros" => count($this->Model_C_Notice->listar_c_notice($buscar)),
            "cantidad" => $cantidad
        );
        echo json_encode($data);
    }

    public function eliminar_c_notice() {
        if ($_POST['action'] == 'delete') {
            $table = "cat_noticia";
            $delteBtnId = $_POST['delteBtnId'];
            $result = $this->Model_C_Notice->eliminar_c_notice($table, $delteBtnId);
            if ($result) {

                echo 'deleted';
            }
        }
    }

}
