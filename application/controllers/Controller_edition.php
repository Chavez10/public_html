<?php

if (!defined('BASEPATH'))
    exit('No direct script access allowed');

class Controller_edition extends CI_Controller {

    public function __construct() {
        parent::__construct();
        $this->load->model('Usuarios');
        $this->load->model('Model_bitacora');
        $this->load->model('Model_edition');
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

        public function vista_edition() {
        if (!isset($_SESSION['usuario']))
            redirect('Controller_home/index');
        $roles = $this->Usuarios->obtener_roles();
        $menuss = $this->Usuarios->listar_menu();
        $data['menus'] = $menuss;
        $data['roles'] = $roles;
        $idrol = $this->session->userdata('idrol');
        $vista = "config/View_edition";
        $this->cargar_plantilla($idrol, $vista, $data);
    }

    public function linea_actualizar() {
        if ($_POST['action'] == 'fetchSingleRow') {
            $output[] = '';
            $table = 'edicion';
            $editBtnId = $_POST['editBtnId'];
            $result = $this->Model_edition->linea_actualizar($table, $editBtnId);
            foreach ($result as $value) {
                $output['id_edicion'] = $value->id_edicion;
                $output['fecha_publicacion'] = $value->fecha_publicacion;
                $output['num_edicion'] = $value->num_edicion;
                $output['estado'] = $value->estado;
            }
            echo json_encode($output);
        }
    }

    
    public function actualizar_crear_edition() {
        if (isset($_POST['action'])) {
            if ($_POST['action'] == 'create') {
                $table = 'edicion';

                $data = array(
                    'fecha_publicacion' => $_POST['fecha_publicacion'],
                    'num_edicion' => $_POST['num_edicion'],
                    'estado' => $_POST['estado'],

                );
                $result = $this->Model_edition->crear_edition($table, $data);
                if ($result) {
                    echo 'created';
                }
            }

            if ($_POST['action'] == 'update') {
                $table = 'edicion';
                $updateId = $_POST['updateId'];

                $data = array(
                    'fecha_publicacion' => $_POST['fecha_publicacion'],
                    'num_edicion' => $_POST['num_edicion'],
                    'estado' => $_POST['estado'],
                );
                $result = $this->Model_edition->actualizar_edition($table, $data, $updateId);
                if ($result) {
                    echo 'update';
                }
            }
        }
    }
    public function listar_edition() {
        //valor a Buscar
        $buscar = $this->input->post("buscar");
        $numeropagina = $this->input->post("nropagina");
        $cantidad = $this->input->post("cantidad");

        $inicio = ($numeropagina - 1) * $cantidad;
        $data = array(
            "edition" => $this->Model_edition->listar_edition($buscar, $inicio, $cantidad),
            "totalregistros" => count($this->Model_edition->listar_edition($buscar)),
            "cantidad" => $cantidad
        );
        echo json_encode($data);
    }

    public function eliminar_edition() {
        if ($_POST['action'] == 'delete') {
            $table = "edicion";
            $delteBtnId = $_POST['delteBtnId'];
            $result = $this->Model_edition->eliminar_edition($table, $delteBtnId);
            if ($result) {

                echo 'deleted';
            }
        }
    }

}
