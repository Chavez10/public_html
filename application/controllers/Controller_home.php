<?php

if (!defined('BASEPATH'))
    exit('No direct script access allowed');

class Controller_home extends CI_Controller {

    public function __construct() {
        parent::__construct();
        $this->load->model('Usuarios');
        $this->load->model('Model_bitacora');
        $this->load->model('Model_tema');
        $this->load->model('Model_red');
        $this->load->model('Model_NoticeView');
        $this->load->model('Model_edition');
        $this->load->model('Model_visitas');
        $this->load->library('session');
    }

    //Puto el que lo lea xD
    public function index() {
        if (isset($_SESSION['idusuario'])) {
            redirect('Controller_home/principal', 'refresh');
        } else {
            $edit = $this->Model_edition->info_edition_ini();
            foreach ($edit as $e) {
                $xd = $e['id_edicion'];
            }
            redirect('Controller_periodico/edition/'.$xd, 'refresh');
        }
    }


    public function c_login(){
        $data['titulo'] = "Inicio";
        $vista = 'admin/View_login';
        $this->cargar_plantilla_login($vista,$data);
    }

    public function cargar_plantilla_login($vista, $data) {
        $data['main_content'] = $vista;
        $edit = $this->Model_edition->info_edition_ini();
        foreach ($edit as $e) {
            $xd = $e['id_edicion'];
        }
        $this->load->view('template_web/login/View_template', $data);
    }

    public function cargar_plantilla_web($vista, $data) {
        $data['main_content'] = $vista;
        $data['tema'] = $this->Model_tema->info_tema();
        $data['red'] = $this->Model_red->info_red();
        $this->load->view('template_web/principal/View_template', $data);
    }

    public function index_web() {
        $data['titulo'] = "Inicio";
        $data['id'] = "1";
        $data['tema'] = $this->Model_tema->info_tema();
        $data['edit'] = $this->Model_edition->info_edition();
        $data['res'] = $this->Model_visitas->visitas();
        $vista = "admin/View_inicio_web";
        $this->cargar_plantilla_web($vista, $data);
    }

    public function login() {
        if ($this->input->post()) {
            date_default_timezone_set('America/El_Salvador');
            $hora_entrada = date("Y-m-d H:i:s");
            $ip = gethostbyaddr($_SERVER['REMOTE_ADDR']);
            $hora_salida = "Sin Registrar";
            $post = $this->input->post();
            $resp = $this->Usuarios->login($post);
            if ($resp) {
                $user = $resp['nombre'];
                $id_usuario = $resp['id_usuario'];
                $esta = $this->uri->segment(3);
                $id_rol = $resp['id_rol'];
                $this->session->set_userdata('usuario', $user);
                $this->session->set_userdata($esta);
                $this->session->set_userdata('idusuario', $id_usuario);
                $this->session->set_userdata('idrol', $id_rol);
                $this->session->set_userdata('nombre_completo', $resp['nombre_completo']);
                $this->session->set_userdata('hora_entrada', $hora_entrada);
                $user_agent = $_SERVER['HTTP_USER_AGENT'];

                $query = $this->db->query("INSERT INTO `sesiones`(`ip`, `id_usuario`, `nombre`, `fecha`, salida, `estado`) 
            VALUES('$ip','$id_usuario','$user','$hora_entrada','$hora_salida','1')");

                function getPlatform($user_agent) {
                    $plataformas = array(
                        'Windows 10' => 'Windows NT 10.0+',
                        'Windows 8.1' => 'Windows NT 6.3+',
                        'Windows 8' => 'Windows NT 6.2+',
                        'Windows 7' => 'Windows NT 6.1+',
                        'Windows Vista' => 'Windows NT 6.0+',
                        'Windows XP' => 'Windows NT 5.1+',
                        'Windows 2003' => 'Windows NT 5.2+',
                        'Windows' => 'Windows otros',
                        'iPhone' => 'iPhone',
                        'iPad' => 'iPad',
                        'Mac OS X' => '(Mac OS X+)|(CFNetwork+)',
                        'Mac otros' => 'Macintosh',
                        'Android' => 'Android',
                        'BlackBerry' => 'BlackBerry',
                        'Linux' => 'Linux'
                    );
                    foreach ($plataformas as $plataforma => $pattern) {
                        if (preg_match('/'.$pattern.'/i', $user_agent))
                            return $plataforma;
                    }
                    return 'Otras';
                }

                $SOS = getPlatform($user_agent);
                $this->session->set_userdata('sistemaoperativo', $SOS);
                redirect('Controller_home/principal');
            } else {
                $this->session->set_userdata('mensaje_error', 'error');
                redirect('Controller_home/index');
            }
        } else {
            redirect('Controller_home/index');
        }
    }


public function principal() {
        if (!isset($_SESSION['usuario']))
            redirect('Controller_home/index');
        $roles = $this->Usuarios->obtener_roles();
        $menuss = $this->Usuarios->listar_menu();
        $data['menus'] = $menuss;
        $data['roles'] = $roles;
        $idrol = $this->session->userdata('idrol');
        $vista = "admin/View_inicio_admin";
        $this->cargar_plantilla($idrol, $vista, $data);
    }


    public function cerrar() {
        date_default_timezone_set('America/El_Salvador');
        $hora_salida = date("Y-m-d H:i:s");
        $id_usuario = $this->session->userdata('id_usuario');
        $hora_entrada = $this->session->userdata('hora_entrada');

        $que = $this->db->query("SELECT `id_sesion` FROM `sesiones` WHERE `estado` = '1' and id_usuario='$id_usuario' and fecha='$hora_entrada'");
        if ($que != null) {
            $this->db->where('id_sesion', $que);
            $this->db->query("UPDATE `sesiones` set `estado`='0', salida='$hora_salida'");
        }
        $this->session->unset_userdata('regenerated');
        $this->session->unset_userdata('mensaje_error');
        $this->session->unset_userdata('usuario');
        $this->session->unset_userdata('id_usuario');
        $this->session->unset_userdata('idrol');
        $this->session->unset_userdata('hora_entrada');
        unset($_SESSION);
        $this->session->sess_destroy();
        redirect('Controller_home/index');
    }

    public function submenu_rol() {
        $id_rol = $this->session->userdata('idrol');
        $id_menu = $this->input->post('id_menu');
        $submenu = $this->Usuarios->submenu($id_menu, $id_rol);
        $op = "";
        foreach ($submenu as $o) {
            $op .= "<li><a href=" . base_url() . $o['url'] . ">" . $o['opcion'] . "</a></li>";
        }
        echo $op;
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

    public function roles() {
        $idrol = $this->session->userdata('idrol');
        $roles = $this->Usuarios->obtener_roles();
        $menuss = $this->Usuarios->listar_menu();
        $data['menus'] = $menuss;
        $data['roles'] = $roles;
        $vista = "gestion_usuarios/roles";
        $this->cargar_plantilla($idrol, $vista, $data);
    }

    public function crear_rol() {

        date_default_timezone_set('America/El_Salvador');
        $fecha_hora = date("Y-m-d H:i:s");
        $id_u = $_SESSION['idusuario'];
        $ip = gethostbyaddr($_SERVER['REMOTE_ADDR']);
        $data1 = array(
            'fecha_hora' => $fecha_hora,
            'ip' => $ip,
            'accion' => "AGREGAR",
            'tabla' => "GU_MENU",
            'id_usuario' => $id_u
        );
        $this->model_bitacora->guardar_bitacora($data1) == true;
        /* para validar si fue llamada ajax o no */
        if (!$this->input->is_ajax_request()) {
            show_404();
        }
        $data['usuario'] = $this->session->userdata('usuario');
        $rol = $this->input->post('rol');
        $roles = array(
            'rol' => $rol
        );
        $insert_roles = $this->Usuarios->add_rol($roles);
    }

    public function listar_rol() {
        $roles = $this->Usuarios->listar_roles();
        $tab = "";
        $tab .= "<table class='table table-responsive'>
            <thead>
                <tr>
                    <th class='info' width='8%'><center>Rol</center></th>
                    <th class='info' width='8%'><center>Asignar permisos</center></th>
                    <th class='info' width='8%'><center>Acciones</center></th>
                </tr>
            </thead>
            <tbody>";
        foreach ($roles as $r) {
            $tab .= "<tr class='even gradeC' align=''>
                    <td align='center'>
                        <span  id='rol" . $r['id_rol'] . "'>" . $r['rol'] . "</span>
                    </td>
                    <td align='center'>
                        <a style='' class='dialog_menu btn-sm btn-info' style='margin-right:10px;color:#FF8533;' href=" . $r['id_rol'] . ">
                            <i class='fa fa-plus-square'></i>
                        </td>
                        <td align='center'>
                            <a  class='edite' href=" . $r['id_rol'] . ">
                                <i class='fa fa-pencil'></i>
                            </a>
                            <a  class='deletee' href=" . $r['id_rol'] . ">
                                <i class='fa fa-times'></i>
                            </a>
                        </td>
                    </tr>";
        }
        $tab .= "</tbody></table>";
        echo $tab;
    }

    public function editar_rol() {
        /* para validar si fue llamada ajax o no */
        if (!$this->input->is_ajax_request()) {
            show_404();
        }
        $id_rol = $this->input->post('id_rol');
        $rol = $this->input->post('rol');
        $rol_update = array(
            'rol' => $rol
        );
        $editar_rol = $this->Usuarios->editar_rol($rol_update, $id_rol);
    }

    public function eliminar_rol() {
        /* para validar si fue llamada ajax o no */
        if (!$this->input->is_ajax_request()) {
            show_404();
        }
        $id_rol = $this->input->post('id_rol');
        $comprobar_existencia_rol = $this->Usuarios->preguntar_rol($id_rol);
        $del_rol = $this->Usuarios->eliminar_rol($id_rol);
    }

    public function listar_opciones_menu() {
        if (!isset($_SESSION['usuario']))
            redirect('proyecto');


        $id_rol = $this->input->post('rol'); //capturamos el id del rol para despues comparar si este rol ya tiene asiganada alguna seleccion de menu    

        $menus = $this->Usuarios->list_menu();

        $table = "";

        $table .= "<table align='center'>";
        foreach ($menus as $m) { //foreach principal para recorrer los menus
            $lista = $this->Usuarios->listar_opciones($m['id_menu']); //para devolver las opciones segun el id de menu

            $table .= "<tr><td colspan='3' style='color:green;font-weight:bold; !important'>MENU " . strtoupper($m['menu']) . "</td></tr>";

            foreach ($lista as $l) {//recorremos las opciones
                $d=rand(1,1000);

                $id_opcion = $l['id_opcion'];

                $opcion = $this->Usuarios->comprobar_opcion($id_rol, $id_opcion); //comprobamos si ya la opcion la tiene asignada este menu

                if ($opcion) {
                    $table .= "<tr>
        <td>" . $l['opcion'] . "</td>
        <td>
        <span class='cool_checkbox'>
            <input type='checkbox' checked='checked' NAME='opt[]' value=" . $l['id_opcion'] . " id='$d'/>
            <label for='$d'>
                <span>ON</span
                    ><span><span>/
                    </span></span>
                    <span>OFF</span>
            </label>
        </span>

        </td>

        </tr>";
                } else {
                    $table .= "<tr><td align='left'>" . $l['opcion'] . "
                    </td>
                    <td>

                    <span class='cool_checkbox'>
            <input type='checkbox' NAME='opt[]' value=" . $l['id_opcion'] . " id='$d'/>
            <label for='$d'>
                <span>ON</span
                    ><span><span>/
                    </span></span>
                    <span>OFF</span>
            </label>
        </span>

                    </td>
        </tr>";
                }
            }
        }

        echo $table;
    }


//CIERRA LA FUNCION

    public function guardar_asignacion_menu() {
        /* para validar si fue llamada ajax o no */
        if (!$this->input->is_ajax_request()) {
            show_404();
        }
        $id_rol = $this->input->post('id_rol_asignar');
        $opciones_seleccionadas = $this->input->post('opt'); //recogemos las opciones que selecciono el administrador para dar los permisos
        //recorremos el array de los checbox seleccionados y convertimos a string separado por comas
        //en la consulta
        $opcion = "";
        for ($i = 0; $i < count($opciones_seleccionadas); $i++) {
            $opcion .= $opciones_seleccionadas[$i] . ",";
        }
        //quitamos la ultima coma del string
        $opciones = substr($opcion, 0, -1);
        $del_opciones_rol = $this->Usuarios->eliminar_opcion_xrol($id_rol); //eliminamos las opciones segun el rol para hacer de nuevo la asignacion de los permisos
        $asignar_menu = $this->Usuarios->asignar_menu($id_rol, $opciones);
        if ($asignar_menu) {
            echo "<p>
                    <span class='ui-icon ui-icon-alert' ></span>
                    <strong>Listo: </strong> <strong> Asignacion de menu terminada correctamente!</strong>.
                </p>";
        } else {
            echo "<p>
                    <span class='ui-icon ui-icon-alert' ></span>
                    <strong>Error: </strong> <strong> No se puedo asignar el menu consulte a TIC!</strong>.
                </p>";
        }
    }

    public function cargar_menu() {
        $idrol = $this->session->userdata('idrol');
        $menu_rol = $this->Usuarios->menu_principal($idrol);

        $cadena = '<ul id="menus" class="nav">';
        if ($idrol != '1000') {
            if (isset($menu_rol)) {
                $cadena .= '<li class="nav-item"><a class="nav-link" href="./"><i class="menu-icon mdi mdi-television"></i><span class="menu-title">Inicio</span></a></li>';
                $RR = 0;

                foreach ($menu_rol as $m) {
                    if ($RR < 99999) {
                        $submenu = $this->Usuarios->submenu($m['id_menu'], $idrol);
                        $cadena .= '<li class="nav-item">
                                <a class="nav-link main' . mb_strtolower($m['id_menu']) . '" data-toggle="collapse" href="#' . $m['id_menu'] . '" aria-expanded="false" aria-controls="' . mb_strtolower($m['id_menu']) . '" title="' . mb_strtoupper($m['menu']) . '" >
                                  <i class="menu-icon ' . $m['icono'] . '"></i>
                                  <span class="menu-title">' . mb_strtolower($m['menu']) . '</span>
                                  <i class="menu-arrow"></i>
                                </a>

                                <div class="collapse" id="' . $m['id_menu'] . '">
                                    <ul class="nav flex-column sub-menu">';
                        foreach ($submenu as $key => $o) {
                            if (($key % 3 == 0) && $key != 0) {
                                // $cadena .= '<li role="separator" class="divider"></li>';
                            }
                            if ($o['opcion'] == 'MOVIMIENTOS DE CAJA') {
                                
                            } else {
                                $cadena .= "
                                
                                <li title='" . mb_strtoupper($o['opcion']) . "' class='nav-item' ><a data-parent='" . $m['id_menu'] . "' class='nav-link' href='" . $o['url'] . "'><i class='menu-icon fa fa-circle-o'></i>" . mb_strtolower($o['opcion']) . " </a></li>";
                            }
                        }
                        $cadena .= '</ul>';
                        $cadena .= '</div>';
                        $cadena .= '</li>';
                    }
                    $RR++;
                }
            }
        }
        $cadena .= '</ul>';
        echo $cadena;
    }

}
