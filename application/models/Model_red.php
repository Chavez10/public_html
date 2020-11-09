<?php

if (!defined('BASEPATH'))
    exit('No direct script access allowed');

class Model_red extends CI_Model {

    public function info_red() {
        $this->db->order_by('id_redes', 'asc');
        $this->db->where('estado', 'Activo');
        $red = $this->db->get('redes');

        $resultado = $red->result();
        return $resultado;
    }


    public function eliminar_red($table, $delteBtnId) {
        $this->db->where('id_redes', $delteBtnId);
        $result = $this->db->delete($table);
        return $result;
    }

    public function crear_red($table, $data) {
        $result = $this->db->insert($table, $data);
        return $result;
    }

    public function listar_red($buscar, $inicio = FALSE, $cantidadregistro = FALSE) {
        $this->db->like("red_social", $buscar);
        if ($inicio !== FALSE && $cantidadregistro !== FALSE) {
            $this->db->limit($cantidadregistro, $inicio);
        }
        $consulta = $this->db->get("redes");
        return $consulta->result();
    }

    public function linea_actualizar($table, $editBtnId) {
        $this->db->where('id_redes', $editBtnId);
        $result = $this->db->get($table);
        return $result->result();
    }

    public function actualizar_red($table, $data, $updateId) {
        $this->db->where('id_redes', $updateId);
        $result = $this->db->update($table, $data);
        return $result;
    }

}
