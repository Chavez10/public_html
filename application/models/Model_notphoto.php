<?php

if (!defined('BASEPATH'))
    exit('No direct script access allowed');

class Model_notphoto extends CI_Model {

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



    public function eliminar_notphoto($table, $delteBtnId) {
        $this->db->where('id_noticia_foto', $delteBtnId);
        $result = $this->db->delete($table);
        return $result;
    }

    public function crear_notphoto($table, $data) {
        $result = $this->db->insert($table, $data);
        return $result;
    }

    public function listar_notphoto($buscar, $inicio = FALSE, $cantidadregistro = FALSE) {
        $this->db->like("Titular", $buscar);
        if ($inicio !== FALSE && $cantidadregistro !== FALSE) {
            $this->db->limit($cantidadregistro, $inicio);
        }
        $this->db->select("noticia_foto.id_noticia_foto,
                            noticias.Titular,
                            fotografia.url,
                            noticia_foto.principal
                            ");
        $this->db->from('noticia_foto');
        $this->db->join('fotografia','noticia_foto.id_foto = fotografia.id_foto');
        $this->db->join('noticias','noticias.id_noticia = noticia_foto.id_noticia');
        $this->db->order_by('noticia_foto.id_noticia_foto desc');
        $sql = $this->db->get();
        $resultado = $sql->result();
        return $resultado;
    }

    public function linea_actualizar($table, $editBtnId) {
        $this->db->where('id_noticia_foto', $editBtnId);
        $result = $this->db->get($table);
        return $result->result();
    }

    public function actualizar_notphoto($table, $data, $updateId) {
        $this->db->where('id_noticia_foto', $updateId);
        $result = $this->db->update($table, $data);
        return $result;
    }

}
