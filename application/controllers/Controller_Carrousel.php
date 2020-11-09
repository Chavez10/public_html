<?php

if (!defined('BASEPATH'))
    exit('No direct script access allowed');

class Controller_Carrousel extends CI_Controller {

    public function __construct() {
        parent::__construct();
        $this->load->model('Usuarios');
        $this->load->model('Model_bitacora');
        $this->load->model('Model_Carrousel');
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

public function vista_carrousel() {
        if (!isset($_SESSION['usuario']))
            redirect('Controller_home/index');
        $roles = $this->Usuarios->obtener_roles();
        $menuss = $this->Usuarios->listar_menu();
        $data['menus'] = $menuss;
        $data['roles'] = $roles;
        $idrol = $this->session->userdata('idrol');
        $vista = "config/View_Carrousel";
        $this->cargar_plantilla($idrol, $vista, $data);
    }
#----------------------------------------------------------------------
 public function eliminar_carrousel() {
        if ($_POST['action'] == 'delete') {
            $table = "carrousel";
            $deleteImg = $_POST['deleteImg'];
            $delteBtnId = $_POST['delteBtnId'];
            $result = $this->Model_Carrousel->eliminar_carrousel($table, $delteBtnId);
            if ($result) {
                unlink('./assets/upload/' . $deleteImg);
                echo 'deleted';
            }
        }
    }

    public function linea_actualizar() {
        if ($_POST['action'] == 'fetchSingleRow') {
            $output[] = '';
            $table = 'carrousel';
            $editBtnId = $_POST['editBtnId'];
            $result = $this->Model_Carrousel->linea_actualizar($table, $editBtnId);
            foreach ($result as $value) {
                $output['titulo'] = $value->titulo;
                $output['url'] = $value->url;
                $output['estado'] = $value->estado;
                $output['foto'] = $value->foto;
                $output['uploaded_hidden_image'] = '<img width="25%" height="25%" src="' . base_url() . 'assets/upload/' . $value->foto . '">';
              
            }
            echo json_encode($output);
        }
    }

    public function listar_carrousel() {
        //valor a Buscar
        $buscar = $this->input->post("buscar");
        $numeropagina = $this->input->post("nropagina");
        $cantidad = $this->input->post("cantidad");

        $inicio = ($numeropagina - 1) * $cantidad;
        $data = array(
            "carrousel" => $this->Model_Carrousel->listar_carrousel($buscar, $inicio, $cantidad),
            "totalregistros" => count($this->Model_Carrousel->listar_carrousel($buscar)),
            "cantidad" => $cantidad
        );
        echo json_encode($data);
    }

    public function actualizar_crear_carrousel() {

        if (isset($_POST['action'])) {
            if ($_POST['action'] == 'create') {
                $table = 'carrousel';
                $img = '';
                if ($_FILES['foto']['name'] != '') {

                    $img = $this->upload_img($_FILES['foto']);
                } else {
                    $img = '';
                }


                $data = array(
                    'foto' => $img,
                    'titulo' => $_POST['titulo'],
                    'url' => $_POST['url'],
                    'estado' => $_POST['estado'],
                );
                $result = $this->Model_Carrousel->crear_carrousel($table, $data);
                if ($result) {
                    echo 'created';
                }
            }


            if ($_POST['action'] == 'update') {
                $table = 'carrousel';
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
                    'titulo' => $_POST['titulo'],
                    'url' => $_POST['url'],
                    'estado' => $_POST['estado'],
                );
                $result = $this->Model_Carrousel->actualizar_carrousel($table, $data, $updateId);
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
