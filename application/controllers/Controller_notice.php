<?php

if (!defined('BASEPATH'))
    exit('No direct script access allowed');

class Controller_notice extends CI_Controller {

    public function __construct() {
        parent::__construct();
        $this->load->model('Usuarios');
        $this->load->model('Model_bitacora');
        $this->load->model('Model_Notice');
        $this->load->model('Model_C_Notice');
        $this->load->model('Model_catnivel');
    }

    public function cargar_plantilla($idrol, $vista, $data = '') {
        $data['usuario'] = $this->session->userdata('usuario');
        $menu_rol = $this->Usuarios->menu_principal($idrol);
        $data['rol'] = $idrol;
        if ($menu_rol) {
            $data['menu_principal'] = $menu_rol;
        }
        $data['main_content'] = $vista;
        $data['Categoria'] = $this->Model_C_Notice->info_C_Notice();
        $data['Nivel'] = $this->Model_catnivel->info_catnivel();
        $this->load->view('template/template', $data);
    }

    
    public function vista_oferta() {
        if (!isset($_SESSION['usuario']))
            redirect('Controller_home/index');
        $roles = $this->Usuarios->obtener_roles();
        $menuss = $this->Usuarios->listar_menu();
        $data['menus'] = $menuss;
        $data['roles'] = $roles;
        $idrol = $this->session->userdata('idrol');
        $vista = "config/View_fnotice";
        $this->cargar_plantilla($idrol, $vista, $data);
    }
public function vista_textarea($id) {
        if (!isset($_SESSION['usuario']))
            redirect('Controller_home/index');
        $data['id'] = $id;
        $data['textarea'] = $this->Model_Notice->textarea($id);
        $roles = $this->Usuarios->obtener_roles();
        $menuss = $this->Usuarios->listar_menu();
        $data['menus'] = $menuss;
        $data['roles'] = $roles;
        $idrol = $this->session->userdata('idrol');
        $vista = "config/View_textarea_notice";
        $this->cargar_plantilla($idrol, $vista, $data);
    }

public function rellena_textarea($id)
    {
        if ($this->input->post()) {
            $update = array(
                'Nota' =>$this->input->post('Nota')
            );
        $response = $this->Model_Notice->modificar_textarea($id,$update);

        redirect('Controller_notice/vista_oferta');
    }else{
        echo ':c';
    }
}
#-----------------------------------------------------------------------
  public function linea_actualizar() {
        if ($_POST['action'] == 'fetchSingleRow') {
            $output[] = '';
            $table = 'noticias';
            $editBtnId = $_POST['editBtnId'];
            $result = $this->Model_Notice->linea_actualizar($table, $editBtnId);
            foreach ($result as $value) {
                $output['id_cat_noticia'] = $value->id_cat_noticia;
                $output['id_cat_nivel'] = $value->id_cat_nivel;
                $output['Titular'] = $value->Titular;
                $output['Subtitulo'] = $value->Subtitulo;
                $output['Nota'] = $value->Nota;
                $output['Fecha'] = $value->Fecha;
                $output['Editor'] = $value->Editor;
                $output['Reportero'] = $value->Reportero;
            }
            echo json_encode($output);
        }
    }

    public function actualizar_crear_notice() {
        if (isset($_POST['action'])) {
            if ($_POST['action'] == 'create') {
                $table = 'noticias';

                $data = array(
                    'id_cat_noticia' => $_POST['id_cat_noticia'],
                    'id_cat_nivel' => $_POST['id_cat_nivel'],
                    'Titular' => $_POST['Titular'],
                    'Subtitulo' => $_POST['Subtitulo'],
                    'Fecha' => $_POST['Fecha'],
                    'Editor' => $_POST['Editor'],
                    'Reportero' => $_POST['Reportero']
                );
                $result = $this->Model_Notice->crear_notice($table, $data);
                if ($result) {
                    echo 'created';
                }
            }

            if ($_POST['action'] == 'update') {
                $table = 'noticias';
                $updateId = $_POST['updateId'];

                $data = array(
                    'id_cat_noticia' => $_POST['id_cat_noticia'],
                    'id_cat_nivel' => $_POST['id_cat_nivel'],
                    'Titular' => $_POST['Titular'],
                    'Subtitulo' => $_POST['Subtitulo'],
                    'Fecha' => $_POST['Fecha'],
                    'Editor' => $_POST['Editor'],
                    'Reportero' => $_POST['Reportero']
                );
                $result = $this->Model_Notice->actualizar_notice($table, $data, $updateId);
                if ($result) {
                    echo 'update';
                }
            }
        }
    }

    public function listar_notice() {
        //valor a Buscar
        $buscar = $this->input->post("buscar");
        $numeropagina = $this->input->post("nropagina");
        $cantidad = $this->input->post("cantidad");

        $inicio = ($numeropagina - 1) * $cantidad;
        $data = array(
            "notice" => $this->Model_Notice->listar_notice($buscar, $inicio, $cantidad),
            "totalregistros" => count($this->Model_Notice->listar_notice($buscar)),
            "cantidad" => $cantidad
        );
        echo json_encode($data);
    }

    public function eliminar_notice() {
        if ($_POST['action'] == 'delete') {
            $table = "noticias";
            $delteBtnId = $_POST['delteBtnId'];
            $result = $this->Model_Notice->eliminar_notice($table, $delteBtnId);
            if ($result) {

                echo 'deleted';
            }
        }
    }

}