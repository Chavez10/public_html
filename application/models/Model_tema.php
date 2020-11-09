<?php

if (!defined('BASEPATH'))
    exit('No direct script access allowed');

class Model_tema extends CI_Model {

    public function info_tema() {
        $this->db->order_by('id_tema', 'desc');
        $this->db->where('estado', 'Activo');
        $this->db->limit(1);
        $tema = $this->db->get('tema');

        $resultado = $tema->result();
        return $resultado;
    }


    public function eliminar_tema($table, $delteBtnId) {;
        $query = "
            SELECT estado
            from tema
            where id_tema =
        ".$delteBtnId;
        $sql = $this->db->query($query);
        $tema = $sql->result();

        foreach ($tema as $key => $value) {
            $estado = $value->estado;
        }

        if ($estado != 'Activo') {
            $this->db->where('id_tema', $delteBtnId);
            $result = $this->db->delete($table);
        } else {
            $result = false;
        }
        
        return $result;
    }

    public function crear_tema($table, $data) {
        if ($data['estado'] == 'Activo') {
            $this->db->set('estado','Inactivo');
            $this->db->update('tema');
        }
        $result = $this->db->insert($table, $data);
        return $result;
    }

    public function listar_tema($buscar, $inicio = FALSE, $cantidadregistro = FALSE) {
        $this->db->like("tema", $buscar);
        if ($inicio !== FALSE && $cantidadregistro !== FALSE) {
            $this->db->limit($cantidadregistro, $inicio);
        }
        $consulta = $this->db->get("tema");
        return $consulta->result();
    }

    public function linea_actualizar($table, $editBtnId) {
        $this->db->where('id_tema', $editBtnId);
        $result = $this->db->get($table);
        return $result->result();
    }

    public function actualizar_tema($table, $data, $updateId) {
        if ($data['estado'] == 'Activo') {
            $this->db->set('estado','Inactivo');
            $this->db->update('tema');
        }
        $this->db->where('id_tema', $updateId);
        $result = $this->db->update($table, $data);
        return $result;
    }

}
