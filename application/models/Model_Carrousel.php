<?php

if (!defined('BASEPATH'))
    exit('No direct script access allowed');

class Model_Carrousel extends CI_Model {

    /*public function info_photo() {
        $this->db->order_by('id_galeria', 'desc');
        $this->db->where('estado', 'Activo');
        $this->db->where('prioridad', 'Inicio');
        $this->db->limit(4);
        $galeria1 = $this->db->get('galeria');

        $resultado = $galeria1->result();
        return $resultado;
    }*/

    /*public function photo() {
        $this->db->where('estado', 'Activo');
        $this->db->order_by('id_galeria', 'desc');
        $galeria = $this->db->get('galeria');

        $resultado = $galeria->result();
        return $resultado;
    }*/

    public function info_carrousel() {
        $this->db->order_by('idcarrousel', 'asc');
        $photo = $this->db->get('carrousel');

        $resultado = $photo->result();
        return $resultado;
    }

    public function eliminar_carrousel($table, $delteBtnId) {
        $this->db->where('idcarrousel', $delteBtnId);
        $result = $this->db->delete($table);
        return $result;
    }

    public function crear_carrousel($table, $data) {
        $result = $this->db->insert($table, $data);
        return $result;
    }

    public function listar_carrousel($buscar, $inicio = FALSE, $cantidadregistro = FALSE) {
        $this->db->like("titulo", $buscar);
        if ($inicio !== FALSE && $cantidadregistro !== FALSE) {
            $this->db->limit($cantidadregistro, $inicio);
        }
        $this->db->order_by("idcarrousel desc");
        $consulta = $this->db->get("carrousel");
        return $consulta->result();
    }

    public function linea_actualizar($table, $editBtnId) {
        $this->db->where('idcarrousel', $editBtnId);
        $result = $this->db->get($table);
        return $result->result();
    }

    public function actualizar_carrousel($table, $data, $updateId) {
        $this->db->where('idcarrousel', $updateId);
        $result = $this->db->update($table, $data);
        return $result;
    }

}
