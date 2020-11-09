<?php

if (!defined('BASEPATH'))
    exit('No direct script access allowed');

class Controller_tema extends CI_Controller {

    public function __construct() {
        parent::__construct();
        $this->load->model('Usuarios');
        $this->load->model('Model_bitacora');
        $this->load->model('Model_tema');
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
public function vista_tema() {
        if (!isset($_SESSION['usuario']))
            redirect('Controller_home/index');
        $roles = $this->Usuarios->obtener_roles();
        $menuss = $this->Usuarios->listar_menu();
        $data['menus'] = $menuss;
        $data['roles'] = $roles;
        $idrol = $this->session->userdata('idrol');
        $vista = "config/View_tema";
        $this->cargar_plantilla($idrol, $vista, $data);
    }
#----------------------------------------------------------------------
 public function eliminar_tema() {
        if ($_POST['action'] == 'delete') {
            $table = "tema";
            $deleteImg = $_POST['deleteImg'];
            $delteBtnId = $_POST['delteBtnId'];
            $result = $this->Model_tema->eliminar_tema($table, $delteBtnId);
            if ($result == TRUE) {
                unlink('./assets/upload/' . $deleteImg);
                echo 'deleted';
            }
        }
    }

    public function linea_actualizar() {
        if ($_POST['action'] == 'fetchSingleRow') {
            $output[] = '';
            $table = 'tema';
            $editBtnId = $_POST['editBtnId'];
            $result = $this->Model_tema->linea_actualizar($table, $editBtnId);
            foreach ($result as $value) {
                $output['tema'] = $value->tema;
                $output['texto'] = $value->texto;
                $output['foto'] = $value->foto;
                $output['uploaded_hidden_image'] = '<img width="25%" height="25%" src="' . base_url() . 'assets/upload/' . $value->foto . '">';
                $output['color'] = $value->color;
                $output['headder'] = $value->headder;
                $output['resaltado'] = $value->resaltado;
                $output['footer'] = $value->footer;
                $output['estado'] = $value->estado;
            }
            echo json_encode($output);
        }
    }

    public function listar_tema() {
        //valor a Buscar
        $buscar = $this->input->post("buscar");
        $numeropagina = $this->input->post("nropagina");
        $cantidad = $this->input->post("cantidad");

        $inicio = ($numeropagina - 1) * $cantidad;
        $data = array(
            "tema" => $this->Model_tema->listar_tema($buscar, $inicio, $cantidad),
            "totalregistros" => count($this->Model_tema->listar_tema($buscar)),
            "cantidad" => $cantidad
        );
        echo json_encode($data);
    }

    public function actualizar_crear_tema() {

        if (isset($_POST['action'])) {
            if ($_POST['action'] == 'create') {
                $table = 'tema';
                $img = '';
                if ($_FILES['foto']['name'] != '') {

                    $img = $this->upload_img($_FILES['foto']);
                } else {
                    $img = '';
                }


                $data = array(
                    'foto' => $img,
                    'tema' => $_POST['tema'],
                    'texto' => $_POST['texto'],
                    'color' => $_POST['color'],
                    'headder' => $_POST['headder'],
                    'resaltado' => $_POST['resaltado'],
                    'footer' => $_POST['footer'],
                    'estado' => $_POST['estado'],
                );
                $result = $this->Model_tema->crear_tema($table, $data);
                if ($result) {
                    echo 'created';
                }
            }


            if ($_POST['action'] == 'update') {
                $table = 'tema';
                $updateId = $_POST['updateId'];
                $uploaded_image = $_POST['uploaded_image'];

                $img = '';
                if ($_FILES['foto']['name'] != '') {
                    $img = $this->upload_img($_FILES['foto']);
                    unlink('./assets/upload/' . $uploaded_image);
                } else {
                    $img = $uploaded_image;
                }


                $data = array(
                    'foto' => $img,
                    'tema' => $_POST['tema'],
                    'texto' => $_POST['texto'],
                    'color' => $_POST['color'],
                    'headder' => $_POST['headder'],
                    'resaltado' => $_POST['resaltado'],
                    'footer' => $_POST['footer'],
                    'estado' => $_POST['estado'],
                );
                $result = $this->Model_tema->actualizar_tema($table, $data, $updateId);
                if ($result) {
                    echo 'update';
                }
            }
        }
    }

    public function upload_img($file) {
        $extention = explode('.', $file['name']);
        $newName = rand() . '.' . $extention[1];
        $destination = './assets/upload/' . $newName;
        move_uploaded_file($file['tmp_name'], $destination);
        return $newName;
    }

}
