<?php

if (!defined('BASEPATH'))
    exit('No direct script access allowed');

class Controller_ednot extends CI_Controller {

    public function __construct() {
        parent::__construct();
        $this->load->model('Usuarios');
        $this->load->model('Model_bitacora');
        $this->load->model('Model_Notice');
        $this->load->model('Model_edition');
        $this->load->model('Model_ednot');
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

    public function vista_ednot() {
        if (!isset($_SESSION['usuario']))
            redirect('Controller_home/index');
        $roles = $this->Usuarios->obtener_roles();
        $menuss = $this->Usuarios->listar_menu();
        $noticia = $this->Model_Notice->info_notice();
        $edicion = $this->Model_edition->info_edition();
        $data['menus'] = $menuss;
        $data['roles'] = $roles;
        $data['notice'] = $noticia;
        $data['edition'] = $edicion;
        $idrol = $this->session->userdata('idrol');
        $vista = "config/View_ednot";
        $this->cargar_plantilla($idrol, $vista, $data);
    }
    
#-----------------------------------------------------------------------
  public function linea_actualizar() {
        if ($_POST['action'] == 'fetchSingleRow') {
            $output[] = '';
            $table = 'edicion_noticia';
            $editBtnId = $_POST['editBtnId'];
            $result = $this->Model_ednot->linea_actualizar($table, $editBtnId);
            foreach ($result as $value) {
                $output['id_noticia'] = $value->id_noticia;
                $output['id_edicion'] = $value->id_edicion;
            }
            echo json_encode($output);
        }
    }

    public function actualizar_crear_ednot() {
        if (isset($_POST['action'])) {
            if ($_POST['action'] == 'create') {
                $table = 'edicion_noticia';

                $data = array(
                    'id_noticia' => $_POST['id_noticia'],
                    'id_edicion' => $_POST['id_edicion']
                );
                $result = $this->Model_ednot->crear_ednot($table, $data);
                if ($result) {
                    echo 'created';
                }
            }

            if ($_POST['action'] == 'update') {
                $table = 'edicion_noticia';
                $updateId = $_POST['updateId'];

                $data = array(
                    'id_noticia' => $_POST['id_noticia'],
                    'id_edicion' => $_POST['id_edicion']
                );
                $result = $this->Model_ednot->actualizar_ednot($table, $data, $updateId);
                if ($result) {
                    echo 'update';
                }
            }
        }
    }

    public function listar_ednot() {
        //valor a Buscar
        $buscar = $this->input->post("buscar");
        $numeropagina = $this->input->post("nropagina");
        $cantidad = $this->input->post("cantidad");

        $inicio = ($numeropagina - 1) * $cantidad;
        $data = array(
            "ed_notice" => $this->Model_ednot->listar_ednot($buscar, $inicio, $cantidad),
            "totalregistros" => count($this->Model_ednot->listar_ednot($buscar)),
            "cantidad" => $cantidad
        );
        echo json_encode($data);
    }

    public function eliminar_ednot() {
        if ($_POST['action'] == 'delete') {
            $table = "edicion_noticia";
            $delteBtnId = $_POST['delteBtnId'];
            $result = $this->Model_ednot->eliminar_ednot($table, $delteBtnId);
            if ($result) {

                echo 'deleted';
            }
        }
    }

}