<?php

if (!defined('BASEPATH'))
    exit('No direct script access allowed');

class Model_ednot extends CI_Model {

    public function eliminar_ednot($table, $delteBtnId) {
        $this->db->where('id_edicion_noticia', $delteBtnId);
        $result = $this->db->delete($table);
        return $result;
    }

    public function crear_ednot($table, $data) {
        $result = $this->db->insert($table, $data);
        return $result;
    }

    public function listar_ednot($buscar, $inicio = FALSE, $cantidadregistro = FALSE) {
        $this->db->like("Titular", $buscar);
        if ($inicio !== FALSE && $cantidadregistro !== FALSE) {
            $this->db->limit($cantidadregistro, $inicio);
        }
        $this->db->select("en.id_edicion_noticia,
                            cn.Titular,cn.Reportero,
                            ed.num_edicion,
                            ed.estado
                            ");
        $this->db->from('edicion_noticia en');
        $this->db->join('noticias cn','cn.id_noticia = en.id_noticia');
        $this->db->join('edicion ed','ed.id_edicion = en.id_edicion');
        $this->db->order_by('en.id_edicion_noticia desc');
        $sql = $this->db->get();
        $resultado = $sql->result();
        return $resultado;
    }

    public function linea_actualizar($table, $editBtnId) {
        $this->db->where('id_edicion_noticia', $editBtnId);
        $result = $this->db->get($table);
        return $result->result();
    }

    public function actualizar_ednot($table, $data, $updateId) {
        $this->db->where('id_edicion_noticia', $updateId);
        $result = $this->db->update($table, $data);
        return $result;
    }

}
