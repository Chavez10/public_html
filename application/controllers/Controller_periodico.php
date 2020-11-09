<?php

if (!defined('BASEPATH'))
    exit('No direct script access allowed');

class Controller_periodico extends CI_Controller {

    public function __construct() {
        parent::__construct();
        $this->load->model('Usuarios');
        $this->load->model('Model_bitacora');
        $this->load->model('Model_tema');
        $this->load->model('Model_red');
        $this->load->model('Model_NoticeView');
        $this->load->model('Model_Perfiles');
        $this->load->model('Model_Notice');
    }



    public function cargar_plantilla_web($vista, $data) {
        $data['main_content'] = $vista;
        $data['tema'] = $this->Model_tema->info_tema();
        $data['red'] = $this->Model_red->info_red();
        $this->load->view('template_web/principal/View_template', $data);
    }


	function lastNews($f,$l)
    {
        $data['titulo'] = "Noticia";
        $data['notice'] = $this->Model_NoticeView->Notic($f);
        $data['sql'] = $this->Model_NoticeView->list_notice($f,3);
        $vista = "periodico/view_lastnews";
        $this->cargar_plantilla_web($vista, $data);
    }

	function News($f,$l){
        $data['titulo'] = "Reciente";
        $data['notice'] = $this->Model_NoticeView->Notic($f);
        $data['sql'] = $this->Model_NoticeView->list_notice($f,3);
        $data['carou']=$this->Model_NoticeView->NoticCarrousel();
        $data['perf'] = $this->Model_NoticeView->NotPerfiles(); 
        $vista = "periodico/view_principal";
        $this->cargar_plantilla_web($vista, $data);
    }

    function galeria($id){
        $data['titulo'] = "Reciente";
        $data['fot_sec'] = $this->Model_NoticeView->visor();
        $vista = "periodico/View_galeria";
        $this->cargar_plantilla_web($vista, $data);
    }

	function all_News($id)
	{
		$data['titulo'] = "Reciente";
        $data['id'] = $id;
        $data['sec'] = $this->Model_NoticeView->head($id);
        $vista = "periodico/view_allNews";
        $this->cargar_plantilla_web($vista, $data);
	}
    public function list_ediciones()
    {
        $data['titulo'] = "Ediciones";
        $vista = "periodico/view_alleditions";
        $this->cargar_plantilla_web($vista, $data);
    }

	function edition($id)
	{
		$data['titulo'] = "Ediciones";
        $data['id'] = $id;
        $data['sec'] = $this->Model_NoticeView->head_edit($id);
        //$data['sql'] = $this->Model_NoticeView->Not_edit();
        $vista = "periodico/View_editions";
        $this->cargar_plantilla_web($vista, $data);
	}

    function perfiles(){
        $data['titulo'] = "Perfiles";
        $data['perf'] = $this->Model_Perfiles->info_perfiles();
        $vista = "periodico/View_Perfiles";
        $this->cargar_plantilla_web($vista, $data);
    }

	public function acercade()
	{
		$data['titulo'] = "Acerca de";
		$vista = "periodico/acercade";
		$this->cargar_plantilla_web($vista, $data);
	}

	/*Funciones para Busqueda y Paginacion*/
	public function all_notice() {
        //valor a Buscar
        $buscar = $this->input->post("buscar");
        $numeropagina = $this->input->post("nropagina");
        $cantidad = $this->input->post("cantidad");

        $inicio = ($numeropagina - 1) * $cantidad;
        $data = array(
            "noticia" => $this->Model_NoticeView->noti($buscar, $inicio, $cantidad),
            "totalregistros" => count($this->Model_NoticeView->noti($buscar)),
            "cantidad" => $cantidad
        );
        echo json_encode($data);
    }

    public function all_notice_ed() {
        //valor a Buscar
        $buscar = $this->input->post("buscar");
        $numeropagina = $this->input->post("nropagina");
        $cantidad = $this->input->post("cantidad");

        $inicio = ($numeropagina - 1) * $cantidad;
        $data = array(
            "noticia" => $this->Model_NoticeView->Not_edit($buscar, $inicio, $cantidad),
            "totalregistros" => count($this->Model_NoticeView->Not_edit($buscar)),
            "cantidad" => $cantidad
        );
        echo json_encode($data);
    }

    public function all_editions() {
        //valor a Buscar
        $buscar = $this->input->post("buscar");
        $numeropagina = $this->input->post("nropagina");
        $cantidad = $this->input->post("cantidad");

        $inicio = ($numeropagina - 1) * $cantidad;
        $data = array(
            "noticia" => $this->Model_NoticeView->Editions($buscar, $inicio, $cantidad),
            "totalregistros" => count($this->Model_NoticeView->Editions($buscar)),
            "cantidad" => $cantidad
        );
        echo json_encode($data);
    }

    public function all_perfiles() {
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

    public function pef_ajax() {
        //valor a Buscar
        $buscar = $this->input->post("buscar");
        $numeropagina = $this->input->post("nropagina");
        $cantidad = $this->input->post("cantidad");

        $inicio = ($numeropagina - 1) * $cantidad;
        $data = array(
            "perfiles" => $this->Model_Perfiles->pef_ajax($buscar, $inicio, $cantidad),
            "totalregistros" => count($this->Model_Perfiles->pef_ajax($buscar)),
            "cantidad" => $cantidad
        );
        echo json_encode($data);
    }
    public function perfil() {
        
            $output[] = '';
            $table = 'perfiles';
            $perf = $_POST['perf'];
            $result = $this->Model_Perfiles->perfil($table, $perf);
            foreach ($result as $value) {
                $output['nombre'] = $value->nombre;
                $output['info'] = $value->info;
                $output['url_foto'] = $value->url_foto;
                $output['cargo'] = $value->cargo;
              
            }
            echo json_encode($output);
        
    }

    public function linea_actualizar() {
        if ($_POST['action'] == 'fetchSingleRow') {
            $output[] = '';
            $table = 'perfiles';
            $infoBtnId = $_POST['infoBtnId'];
            $result = $this->Model_Perfiles->linea_actualizar($table, $infoBtnId);
            foreach ($result as $value) {
                $output['nombre'] = $value->nombre;
                $output['cargo'] = $value->cargo;
                $output['info'] = $value->info;
                $output['estado'] = $value->estado;
                $output['uploaded_hidden_image'] = "<img src='assets/upload/".$value->url_foto."' class='img-circle imga' height='50' id='img'>";
              
            }
            echo json_encode($output);
        }
    }
}