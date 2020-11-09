<?php

if (!defined('BASEPATH'))
    exit('No direct script access allowed');

class Controller_notphoto extends CI_Controller {

    public function __construct() {
        parent::__construct();
        $this->load->model('Usuarios');
        $this->load->model('Model_bitacora');
        $this->load->model('Model_photo');
        $this->load->model('Model_Notice');
        $this->load->model('Model_notphoto');
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

    public function vista_notphoto() {
        if (!isset($_SESSION['usuario']))
            redirect('Controller_home/index');
        $roles = $this->Usuarios->obtener_roles();
        $menuss = $this->Usuarios->listar_menu();
        $foto = $this->Model_photo->info_photo();
        $noticia = $this->Model_Notice->info_notice();
        $data['menus'] = $menuss;
        $data['roles'] = $roles;
        $data['photo'] = $foto;
        $data['notice'] = $noticia;
        $idrol = $this->session->userdata('idrol');
        $vista = "config/View_notphoto";
        $this->cargar_plantilla($idrol, $vista, $data);
    }
    
#-----------------------------------------------------------------------
  public function linea_actualizar() {
        if ($_POST['action'] == 'fetchSingleRow') {
            $output[] = '';
            $table = 'noticia_foto';
            $editBtnId = $_POST['editBtnId'];
            $result = $this->Model_notphoto->linea_actualizar($table, $editBtnId);
            foreach ($result as $value) {
                $output['id_noticia'] = $value->id_noticia;
                $output['id_foto'] = $value->id_foto;
                $output['principal'] = $value->principal;
            }
            echo json_encode($output);
        }
    }

    public function actualizar_crear_notphoto() {
        if (isset($_POST['action'])) {
            if ($_POST['action'] == 'create') {
                $table = 'noticia_foto';

                $data = array(
                    'id_noticia' => $_POST['id_noticia'],
                    'id_foto' => $_POST['id_foto'],
                    'principal' => $_POST['principal']
                );
                $result = $this->Model_notphoto->crear_notphoto($table, $data);
                if ($result) {
                    echo 'created';
                }
            }

            if ($_POST['action'] == 'update') {
                $table = 'noticia_foto';
                $updateId = $_POST['updateId'];

                $data = array(
                    'id_noticia' => $_POST['id_noticia'],
                    'id_foto' => $_POST['id_foto'],
                    'principal' => $_POST['principal']
                );
                $result = $this->Model_notphoto->actualizar_notphoto($table, $data, $updateId);
                if ($result) {
                    echo 'update';
                }
            }
        }
    }

    public function listar_notphoto() {
        //valor a Buscar
        $buscar = $this->input->post("buscar");
        $numeropagina = $this->input->post("nropagina");
        $cantidad = $this->input->post("cantidad");

        $inicio = ($numeropagina - 1) * $cantidad;
        $data = array(
            "not_photo" => $this->Model_notphoto->listar_notphoto($buscar, $inicio, $cantidad),
            "totalregistros" => count($this->Model_notphoto->listar_notphoto($buscar)),
            "cantidad" => $cantidad
        );
        echo json_encode($data);
    }

    public function eliminar_notphoto() {
        if ($_POST['action'] == 'delete') {
            $table = "noticia_foto";
            $delteBtnId = $_POST['delteBtnId'];
            $result = $this->Model_notphoto->eliminar_notphoto($table, $delteBtnId);
            if ($result) {

                echo 'deleted';
            }
        }
    }

}