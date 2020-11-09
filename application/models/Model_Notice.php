<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Model_Notice extends CI_Model {

	function __construct() {
		parent:: __construct();
		$this->load->database();
	}

    public function info_notice() {
        $this->db->order_by('id_noticia', 'asc');
        $edition = $this->db->get('noticias');

        $resultado = $edition->result();
        return $resultado;
    }

    public function modificar_textarea( $id, $update ){
        $this->db->where('id_noticia', $id);
        $this->db->limit(1);
        $this->db->update('noticias', $update);
        return  $this->db->affected_rows() == '1' ? TRUE : FALSE ;
      }

    public function textarea($id) {
        $this->db->where('id_noticia', $id);
        $textarea = $this->db->get('noticias');

        $resultado = $textarea->result();
        return $resultado;
    }

	public function listar_notice($buscar, $inicio = FALSE, $cantidadregistro = FALSE) {
        $this->db->like("Titular", $buscar);
        if ($inicio !== FALSE && $cantidadregistro !== FALSE) {
            $this->db->limit($cantidadregistro, $inicio);
        }
        $this->db->order_by("Fecha desc");
        $consulta = $this->db->get("noticias");
        return $consulta->result();
    }

    public function notice($buscar) {
        $this->db->where("Codigo", $buscar);
        $consulta = $this->db->get("Noti_Principal");
        return $consulta->result();
    }

    public function eliminar_notice($table, $delteBtnId) {
        $this->db->where('id_noticia', $delteBtnId);
        $result = $this->db->delete($table);
        return $result;
    }

    public function crear_notice($table, $data) {
        $result = $this->db->insert($table, $data);
        return $result;
    }


    public function linea_actualizar($table, $editBtnId) {
        $this->db->where('id_noticia', $editBtnId);
        $result = $this->db->get($table);
        return $result->result();
    }

    public function actualizar_notice($table, $data, $updateId) {
        $this->db->where('id_noticia', $updateId);
        $result = $this->db->update($table, $data);
        return $result;
    }

}