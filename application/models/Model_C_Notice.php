<?php

if (!defined('BASEPATH'))
    exit('No direct script access allowed');

class Model_C_Notice extends CI_Model {

    public function info_C_Notice() {
        $this->db->order_by('id_cat_noticia', 'asc');
        $cat_nivel = $this->db->get('cat_noticia');

        $resultado = $cat_nivel->result();
        return $resultado;
    }


    public function eliminar_c_notice($table, $delteBtnId) {
        $this->db->where('id_cat_noticia', $delteBtnId);
        $result = $this->db->delete($table);
        return $result;
    }

    public function crear_c_notice($table, $data) {
        $result = $this->db->insert($table, $data);
        return $result;
    }

    public function listar_c_notice($buscar, $inicio = FALSE, $cantidadregistro = FALSE) {
        $this->db->like("nc_noticia", $buscar);
        if ($inicio !== FALSE && $cantidadregistro !== FALSE) {
            $this->db->limit($cantidadregistro, $inicio);
        }
        $consulta = $this->db->get("cat_noticia");
        return $consulta->result();
    }

    public function linea_actualizar($table, $editBtnId) {
        $this->db->where('id_cat_noticia', $editBtnId);
        $result = $this->db->get($table);
        return $result->result();
    }

    public function actualizar_c_notice($table, $data, $updateId) {
        $this->db->where('id_cat_noticia', $updateId);
        $result = $this->db->update($table, $data);
        return $result;
    }

}
