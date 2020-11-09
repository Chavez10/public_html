<?php

class Model_bitacora extends CI_Model {

    public function __construct() {
        parent::__construct();
    }

    public function guardar_bitacora($data) {
        $this->db->insert('bitacora', $data);

        if ($this->db->affected_rows() > 0) {
            return true;
        } else {
            return false;
        }
    }

    public function listar_actividad($buscar, $inicio = FALSE, $cantidadregistro = FALSE) {
        $this->db->query('SET lc_time_names = "es_ES"');
        $this->db->like("s.fecha", $buscar);
        $this->db->order_by('s.id_sesion', 'desc');
        if ($inicio !== FALSE && $cantidadregistro !== FALSE) {
            $this->db->limit($cantidadregistro, $inicio);
        }
        $this->db->select("s.id_sesion AS id_sesion,
                            s.ip AS ip,
                            u.nombre AS id_usuario,
                            UPPER(DATE_FORMAT(s.fecha,'%W %d de %M de %Y %h:%i %p')) AS fecha,
                            UPPER(DATE_FORMAT(s.salida,'%W %d de %M de %Y %h:%i %p')) AS salida,
                            s.estado AS estado");
        $this->db->from('sesiones s');
        $this->db->join('usuarios u','s.id_usuario = u.id_usuario');
        $sql = $this->db->get();
        return $sql->result();
    }

    public function listar_acciones($buscar, $inicio = FALSE, $cantidadregistro = FALSE) {
        $this->db->query('SET lc_time_names = "es_ES"');
        $this->db->like("b.fecha_hora", $buscar);
        $this->db->order_by('b.id_bitacora', 'desc');
        if ($inicio !== FALSE && $cantidadregistro !== FALSE) {
            $this->db->limit($cantidadregistro, $inicio);
        }
        $this->db->select("b.id_bitacora AS id_bitacora,
                            UPPER(DATE_FORMAT(b.fecha_hora,'%W %d de %M de %Y %h:%i %p')) AS fecha_hora,
                            b.ip AS ip,
                            b.accion AS accion,
                            b.tabla AS tabla,
                            UPPER(u.nombre) AS id_usuario");
        $this->db->from('bitacora b');
        $this->db->join('usuarios u','b.id_usuario = u.id_usuario');
        $sql = $this->db->get();
        
        return $sql->result();
    }

}
