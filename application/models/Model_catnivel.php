<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Model_catnivel extends CI_Model {

	function __construct() {
		parent:: __construct();
		$this->load->database();
	}

    public function info_catnivel() {
        $this->db->order_by('id_cat_nivel', 'asc');
        $cat_nivel = $this->db->get('cat_nivel');

        $resultado = $cat_nivel->result();
        return $resultado;
    }

	public function listar_catnivel($buscar, $inicio = FALSE, $cantidadregistro = FALSE) {
        $this->db->like("id_cat_nivel", $buscar);
        if ($inicio !== FALSE && $cantidadregistro !== FALSE) {
            $this->db->limit($cantidadregistro, $inicio);
        }
        $consulta = $this->db->get("cat_nivel");
        return $consulta->result();
    }

    public function eliminar_catnivel($table, $delteBtnId) {
        $this->db->where('id_cat_nivel', $delteBtnId);
        $result = $this->db->delete($table);
        return $result;
    }

    public function crear_catnivel($table, $data) {
        $result = $this->db->insert($table, $data);
        return $result;
    }


    public function linea_actualizar($table, $editBtnId) {
        $this->db->where('id_cat_nivel', $editBtnId);
        $result = $this->db->get($table);
        return $result->result();
    }

    public function actualizar_catnivel($table, $data, $updateId) {
        $this->db->where('id_cat_nivel', $updateId);
        $result = $this->db->update($table, $data);
        return $result;
    }

}