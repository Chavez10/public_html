<?php

if (!defined('BASEPATH'))
    exit('No direct script access allowed');

class Model_edition extends CI_Model {

    public function info_edition() {
        $this->db->limit(1);
        $this->db->where('estado','Activo');
        $this->db->order_by('fecha_publicacion', 'desc');
        $edition = $this->db->get('edicion');

        $resultado = $edition->result();
        return $resultado;
    }

    public function info_edition_ini() {
        $this->db->limit(1);
        $this->db->where('estado','Activo');
        $this->db->order_by('fecha_publicacion', 'desc');
        $edition = $this->db->get('edicion');

        $resultado = $edition->result_array();
        return $resultado;
    }

    public function eliminar_edition($table, $delteBtnId) {
        $this->db->where('id_edicion', $delteBtnId);
        $result = $this->db->delete($table);
        return $result;
    }

    public function crear_edition($table, $data) {
        $result = $this->db->insert($table, $data);
        return $result;
    }

    public function listar_edition($buscar, $inicio = FALSE, $cantidadregistro = FALSE) {
        $this->db->like("fecha_publicacion", $buscar);
        if ($inicio !== FALSE && $cantidadregistro !== FALSE) {
            $this->db->limit($cantidadregistro, $inicio);
        }
        $this->db->order_by("fecha_publicacion desc");
        $consulta = $this->db->get("edicion");
        return $consulta->result();
    }

    public function linea_actualizar($table, $editBtnId) {
        $this->db->where('id_edicion', $editBtnId);
        $result = $this->db->get($table);
        return $result->result();
    }

    public function actualizar_edition($table, $data, $updateId) {
        $this->db->where('id_edicion', $updateId);
        $result = $this->db->update($table, $data);
        return $result;
    }

}
