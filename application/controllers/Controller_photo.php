<?php

if (!defined('BASEPATH'))
    exit('No direct script access allowed');

class Controller_photo extends CI_Controller {

    public function __construct() {
        parent::__construct();
        //$this->load->library(array('image_lib'));
        $this->load->model('Usuarios');
        $this->load->model('Model_bitacora');
        $this->load->model('Model_photo');
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

public function vista_photo() {
        if (!isset($_SESSION['usuario']))
            redirect('Controller_home/index');
        $roles = $this->Usuarios->obtener_roles();
        $menuss = $this->Usuarios->listar_menu();
        $data['menus'] = $menuss;
        $data['roles'] = $roles;
        $idrol = $this->session->userdata('idrol');
        $vista = "config/View_photo";
        $this->cargar_plantilla($idrol, $vista, $data);
    }
#----------------------------------------------------------------------
 public function eliminar_photo() {
        if ($_POST['action'] == 'delete') {
            $table = "fotografia";
            $deleteImg = $_POST['deleteImg'];
            $delteBtnId = $_POST['delteBtnId'];
            $result = $this->Model_photo->eliminar_photo($table, $delteBtnId);
            if ($result) {
                unlink('./assets/upload/' . $deleteImg);
                echo 'deleted';
            }
        }
    }

    public function linea_actualizar() {
        if ($_POST['action'] == 'fetchSingleRow') {
            $output[] = '';
            $table = 'fotografia';
            $editBtnId = $_POST['editBtnId'];
            $result = $this->Model_photo->linea_actualizar($table, $editBtnId);
            foreach ($result as $value) {
                $output['titulo_foto'] = $value->titulo_foto;
                $output['url'] = $value->url;
                $output['uploaded_hidden_image'] = '<img width="25%" height="25%" src="' . base_url() . 'assets/upload/' . $value->url . '">';
                $output['Fotografo'] = $value->Fotografo;
            }
            echo json_encode($output);
        }
    }

    public function listar_photo() {
        //valor a Buscar
        $buscar = $this->input->post("buscar");
        $numeropagina = $this->input->post("nropagina");
        $cantidad = $this->input->post("cantidad");

        $inicio = ($numeropagina - 1) * $cantidad;
        $data = array(
            "photo" => $this->Model_photo->listar_photo($buscar, $inicio, $cantidad),
            "totalregistros" => count($this->Model_photo->listar_photo($buscar)),
            "cantidad" => $cantidad
        );
        echo json_encode($data);
    }

    public function actualizar_crear_photo() {

        if (isset($_POST['action'])) {
            if ($_POST['action'] == 'create') {
                $table = 'fotografia';
                $img = '';
                if ($_FILES['url']['name'] != '') {

                    $img = $this->upload_img($_FILES['url']);
                    //$this->resize_image($_FILES['url']);
                } else {
                    $img = '';
                }


                $data = array(
                    'url' => $img,
                    'titulo_foto' => $_POST['titulo_foto'],
                    'Fotografo' => $_POST['Fotografo'],
                );
                $result = $this->Model_photo->crear_photo($table, $data);
                if ($result) {
                    echo 'created';
                }
            }


            if ($_POST['action'] == 'update') {
                $table = 'fotografia';
                $updateId = $_POST['updateId'];
                $uploaded_image = $_POST['uploaded_image'];

                $img = '';
                if ($_FILES['url']['name'] != '') {
                    $img = $this->upload_img($_FILES['url']);
                    unlink('./assets/upload/' . $uploaded_image);
                } else {
                    $img = $uploaded_image;
                }


                $data = array(
                    'url' => $img,
                    'titulo_foto' => $_POST['titulo_foto'],
                    'Fotografo' => $_POST['Fotografo'],
                );
                $result = $this->Model_photo->actualizar_photo($table, $data, $updateId);
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

    /*public function resize_image($image_data){
         $this->load->library('image_lib');

        $extention = explode('.', $image_data['name']);
        $newName = rand() . '.' . $extention[1];
        $destination = './assets/resize/' . $newName;

        $config['image_library'] = 'gd2';
        $config['source_image'] =  $destination;
        $config['create_thumb'] = TRUE;
        $config['maintain_ratio'] = TRUE;        
        //$config['master_fim'] = 'width';
        //upload_resize('file','settings',$imageName);
        $config['width'] = 250;
        $config['height'] = 250;

        $this->image_lib->initialize($config);
        $this->image_lib->resize();

        // $w = $image_data['image_width'];
        // $h = $image_data['image_heigth'];

        // $n_w = 273;
        // $n_h = 246;
        // $source_ratio = $w / $h;
        // $new_ratio = $n_w / $n_h;
        // if ($source_ratio != $new_ratio) {

        //     $config['image_library'] = 'gd2';
        //     $config['source_image'] =  './assets/resize/uploaded_image.jpg';
        //     $config['maintain_ratio'] = FALSE;
        //     if ($new_ratio > $source_ratio || (($new_ratio == 1) && ($source_ratio < 1))) {
        //         $config['width'] = $w;
        //         $config['height'] = round($w/$new_ratio);
        //         $config['y_axis'] = round(($h - $config['height'])/2);
        //         $config['x_axis'] = 0;
        //     } else {
        //         $config['width'] = round($h * $new_ratio);
        //         $config['height'] = $h;
        //         $config['y_axis'] = round(($w - $config['width'])/2);
        //         $config['x_axis'] = 0;
        //     }

        //     $this->image_lib->initialize($config);
        //     $this->image_lib->crop();
        //     $this->image_lib->clear();
        // }
        // $config['image_library'] = 'gd2';
        // $config['source_image'] = './assets/resize/uploaded_image.jpg';
        // $config['new_image'] = './assets/resize/new/uploaded_image.jpg';
        // $config['maintain_ratio'] = TRUE;
        // $config['width'] = $n_w;
        // $config['height'] = $n_h;
        // $this->image_lib->initialize($config);

        // if (!$this->image_lib->resize()) {
        //     echo $this->image_lib->display_error();
        // } else {
        //     echo "done";
        // }
    }*/

}
