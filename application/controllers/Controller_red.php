<?php

if (!defined('BASEPATH'))
    exit('No direct script access allowed');

class Controller_red extends CI_Controller {

    public function __construct() {
        parent::__construct();
        $this->load->model('Usuarios');
        $this->load->model('Model_bitacora');
        $this->load->model('Model_red');
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


public function vista_red() {
        if (!isset($_SESSION['usuario']))
            redirect('Controller_home/index');
        $roles = $this->Usuarios->obtener_roles();
        $menuss = $this->Usuarios->listar_menu();
        $data['menus'] = $menuss;
        $data['roles'] = $roles;
        $idrol = $this->session->userdata('idrol');
        $vista = "web/View_red_social";
        $this->cargar_plantilla($idrol, $vista, $data);
    }
    public function linea_actualizar() {
        if ($_POST['action'] == 'fetchSingleRow') {
            $output[] = '';
            $table = 'redes';
            $editBtnId = $_POST['editBtnId'];
            $result = $this->Model_red->linea_actualizar($table, $editBtnId);
            foreach ($result as $value) {
                $output['id_redes'] = $value->id_redes;
                $output['red_social'] = $value->red_social;
                $output['url'] = $value->url;
                $output['icono'] = $value->icono;
                $output['entidad'] = $value->entidad;
                $output['estado'] = $value->estado;
            }
            echo json_encode($output);
        }
    }

    
    public function actualizar_crear_red() {
        if (isset($_POST['action'])) {
            if ($_POST['action'] == 'create') {
                $table = 'redes';

                $data = array(
                    'red_social' => $_POST['red_social'],
                    'url' => $_POST['url'],
                    'icono' => $_POST['icono'],
                    'entidad' => $_POST['entidad'],
                    'estado' => $_POST['estado'],

                );
                $result = $this->Model_red->crear_red($table, $data);
                if ($result) {
                    echo 'created';
                }
            }

            if ($_POST['action'] == 'update') {
                $table = 'redes';
                $updateId = $_POST['updateId'];

                $data = array(
                    'red_social' => $_POST['red_social'],
                    'url' => $_POST['url'],
                    'icono' => $_POST['icono'],
                    'entidad' => $_POST['entidad'],
                    'estado' => $_POST['estado'],
                );
                $result = $this->Model_red->actualizar_red($table, $data, $updateId);
                if ($result) {
                    echo 'update';
                }
            }
        }
    }
    public function listar_red() {
        //valor a Buscar
        $buscar = $this->input->post("buscar");
        $numeropagina = $this->input->post("nropagina");
        $cantidad = $this->input->post("cantidad");

        $inicio = ($numeropagina - 1) * $cantidad;
        $data = array(
            "redes" => $this->Model_red->listar_red($buscar, $inicio, $cantidad),
            "totalregistros" => count($this->Model_red->listar_red($buscar)),
            "cantidad" => $cantidad
        );
        echo json_encode($data);
    }

    public function eliminar_red() {
        if ($_POST['action'] == 'delete') {
            $table = "redes";
            $delteBtnId = $_POST['delteBtnId'];
            $result = $this->Model_red->eliminar_red($table, $delteBtnId);
            if ($result) {

                echo 'deleted';
            }
        }
    }

}
