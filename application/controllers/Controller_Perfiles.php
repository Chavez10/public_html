<?php

if (!defined('BASEPATH'))
    exit('No direct script access allowed');

class Controller_Perfiles extends CI_Controller {

    public function __construct() {
        parent::__construct();
        $this->load->model('Usuarios');
        $this->load->model('Model_bitacora');
        $this->load->model('Model_Perfiles');
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

public function vista_perfiles() {
        if (!isset($_SESSION['usuario']))
            redirect('Controller_home/index');
        $roles = $this->Usuarios->obtener_roles();
        $menuss = $this->Usuarios->listar_menu();
        $data['menus'] = $menuss;
        $data['roles'] = $roles;
        $idrol = $this->session->userdata('idrol');
        $vista = "config/View_Perfiles";
        $this->cargar_plantilla($idrol, $vista, $data);
    }

    public function vista_textarea($id) {
        if (!isset($_SESSION['usuario']))
            redirect('Controller_home/index');
        $data['id'] = $id;
        $data['textarea'] = $this->Model_Perfiles->textarea($id);
        $roles = $this->Usuarios->obtener_roles();
        $menuss = $this->Usuarios->listar_menu();
        $data['menus'] = $menuss;
        $data['roles'] = $roles;
        $idrol = $this->session->userdata('idrol');
        $vista = "config/View_textarea_perfiles";
        $this->cargar_plantilla($idrol, $vista, $data);
    }

    public function rellena_textarea($id)
        {
            if ($this->input->post()) {
                $update = array(
                    'info' =>$this->input->post('info')
                );
            $response = $this->Model_Perfiles->modificar_textarea($id,$update);

            redirect('Controller_Perfiles/vista_perfiles');
        }else{
            echo ':c';
        }
    }
#----------------------------------------------------------------------
    ////paginacion allnotice
     public function listar_allnotice() {
        //valor a Buscar
        $buscar = $this->input->post("buscar");
        $numeropagina = $this->input->post("nropagina");
        $cantidad = $this->input->post("cantidad");
        $inicio = ($numeropagina - 1) * $cantidad;
        $data = array(
            "allnotice" => $this->Model_Notice->listar_allnotice($buscar, $inicio, $cantidad),
            "totalregistros" => count($this->Model_Notice->listar_allnotice($buscar)),
            "cantidad" => $cantidad
        );
        echo json_encode($data);
    }

 public function eliminar_perfiles() {
        if ($_POST['action'] == 'delete') {
            $table = "perfiles";
            $deleteImg = $_POST['deleteImg'];
            $delteBtnId = $_POST['delteBtnId'];
            $result = $this->Model_Perfiles->eliminar_perfiles($table, $delteBtnId);
            if ($result) {
                unlink('./assets/upload/' . $deleteImg);
                echo 'deleted';
            }
        }
    }

    public function linea_actualizar() {
        if ($_POST['action'] == 'fetchSingleRow') {
            $output[] = '';
            $table = 'perfiles';
            $editBtnId = $_POST['editBtnId'];
            $result = $this->Model_Perfiles->linea_actualizar($table, $editBtnId);
            foreach ($result as $value) {
                $output['nombre'] = $value->nombre;
                $output['cargo'] = $value->cargo;
                $output['estado'] = $value->estado;
                $output['info'] = $value->info;
                $output['url_foto'] = $value->url_foto;
                $output['uploaded_hidden_image'] = '<img width="25%" height="25%" src="' . base_url() . 'assets/upload/' . $value->url_foto . '">';
              
            }
            echo json_encode($output);
        }
    }

    public function listar_perfiles() {
        //valor a Buscar
        $buscar = $this->input->post("buscar");
        $numeropagina = $this->input->post("nropagina");
        $cantidad = $this->input->post("cantidad");

        $inicio = ($numeropagina - 1) * $cantidad;
        $data = array(
            "perfiles" => $this->Model_Perfiles->listar_perfiles($buscar, $inicio, $cantidad),
            "totalregistros" => count($this->Model_Perfiles->listar_perfiles($buscar)),
            "cantidad" => $cantidad
        );
        echo json_encode($data);
    }

    public function actualizar_crear_perfiles() {

        if (isset($_POST['action'])) {
            if ($_POST['action'] == 'create') {
                $table = 'perfiles';
                $img = '';
                if ($_FILES['url_foto']['name'] != '') {

                    $img = $this->upload_img($_FILES['url_foto']);
                } else {
                    $img = '';
                }


                $data = array(
                    'url_foto' => $img,
                    'nombre' => $_POST['nombre'],
                    'cargo' => $_POST['cargo'],
                    'estado' => $_POST['estado'],
                );
                $result = $this->Model_Perfiles->crear_perfiles($table, $data);
                if ($result) {
                    echo 'created';
                }
            }


            if ($_POST['action'] == 'update') {
                $table = 'perfiles';
                $updateId = $_POST['updateId'];
                $uploaded_image = $_POST['uploaded_image'];

                $img = '';
                if ($_FILES['url_foto']['name'] != '') {
                    $img = $this->upload_img($_FILES['url_foto']);
                    unlink('./assets/upload/' . $uploaded_image);
                } else {
                    $img = $uploaded_image;
                }


                $data = array(
                    'url_foto' => $img,
                    'nombre' => $_POST['nombre'],
                    'cargo' => $_POST['cargo'],
                    'estado' => $_POST['estado'],
                );
                $result = $this->Model_Perfiles->actualizar_perfiles($table, $data, $updateId);
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
