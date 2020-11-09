<?php

if (!defined('BASEPATH'))
    exit('No direct script access allowed');

class Controller_usuarios extends CI_Controller {

    public function __construct() {
        parent::__construct();
        $this->load->model('Usuarios');
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

    public function vista_usuario() {
        if (!isset($_SESSION['usuario']))
            redirect('Controller_home/index');
        $roles = $this->Usuarios->obtener_roles();
        $menuss = $this->Usuarios->listar_menu();
        $data['menus'] = $menuss;
        $data['roles'] = $roles;
        $idrol = $this->session->userdata('idrol');
        $vista = "menu/View_usuarios";
        $this->cargar_plantilla($idrol, $vista, $data);
    }

    public function linea_actualizar() {
        if ($_POST['action'] == 'fetchSingleRow') {
            $output[] = '';
            $table = 'usuarios';
            $editBtnId = $_POST['editBtnId'];
            $result = $this->Usuarios->linea_actualizar_user($table, $editBtnId);
            foreach ($result as $key => $value) {
                $output['nombre'] =  $value->nombre; #$value['nombre'];
                $output['clave'] =  $value->clave; #$value['clave'];
                $output['id_rol'] =  $value->id_rol; #$value['id_rol'];
                $output['nombre_completo'] =  $value->nombre_completo; #$value['nombre_completo'];
                $output['estado'] =  $value->estado; #$value['estado'];
            }
            echo json_encode($output);
        }
    }

    public function actualizar_crear_usuario() {
        if (isset($_POST['action'])) {
            if ($_POST['action'] == 'create') {
                $table = 'usuarios';

                $pwd = strtoupper($_POST['clave']);

                $data = array(
                    'nombre' => $_POST['nombre'],
                    'clave' => md5($pwd),
                    'id_rol' => $_POST['id_rol'],
                    'nombre_completo' => $_POST['nombre_completo'],
                    'estado' => $_POST['estado'],
                );
                $result = $this->Usuarios->crear_user($table, $data);
                if ($result) {
                    echo 'created';
                }
            }

            if ($_POST['action'] == 'update') {
                $table = 'usuarios';
                $updateId = $_POST['updateId'];
                $pwd = strtoupper($_POST['clave']);

                $data = array(
                    'nombre' => $_POST['nombre'],
                    'clave' => md5($pwd),
                    'id_rol' => $_POST['id_rol'],
                    'nombre_completo' => $_POST['nombre_completo'],
                    'estado' => $_POST['estado'],
                );
                $result = $this->Usuarios->actualizar_user($table, $data, $updateId);
                if ($result) {
                    echo 'update';
                }
            }
        }
    }

    public function listar_usuario() {
        //valor a Buscar
        $buscar = $this->input->post("buscar");
        $numeropagina = $this->input->post("nropagina");
        $cantidad = $this->input->post("cantidad");

        $inicio = ($numeropagina - 1) * $cantidad;
        $data = array(
            "usuario" => $this->Usuarios->listar_user($buscar, $inicio, $cantidad),
            "totalregistros" => count($this->Usuarios->listar_user($buscar)),
            "cantidad" => $cantidad
        );
        echo json_encode($data);
    }

    public function eliminar_usuario() {
        if ($_POST['action'] == 'delete') {
            $table = "usuarios";
            $delteBtnId = $_POST['delteBtnId'];
            $result = $this->Usuarios->eliminar_user($table, $delteBtnId);
            if ($result) {

                echo 'deleted';
            }
        }
    }

}
