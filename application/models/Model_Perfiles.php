<?php

if (!defined('BASEPATH'))
    exit('No direct script access allowed');

class Model_Perfiles extends CI_Model {

    public function pef_ajax($buscar, $inicio = FALSE, $cantidadregistro = FALSE) {
        $this->db->like("nombre", $buscar);
        if ($inicio !== FALSE && $cantidadregistro !== FALSE) {
            $this->db->limit($cantidadregistro, $inicio);
        }
        $this->db->order_by('idperfiles', 'desc');
        $consulta = $this->db->get("perfiles");
        return $consulta->result();
    }


    public function info_perfiles() {
        $this->db->order_by('idperfiles', 'desc');
        $photo = $this->db->get('perfiles');

        $resultado = $photo->result();
        return $resultado;
    }

    public function modificar_textarea( $id, $update ){
        $this->db->where('idperfiles', $id);
        $this->db->limit(1);
        $this->db->update('perfiles', $update);
        return  $this->db->affected_rows() == '1' ? TRUE : FALSE ;
      }

    public function textarea($id) {
        $this->db->where('idperfiles', $id);
        $textarea = $this->db->get('perfiles');

        $resultado = $textarea->result();
        return $resultado;
    }

    public function eliminar_perfiles($table, $delteBtnId) {
        $this->db->where('idperfiles', $delteBtnId);
        $result = $this->db->delete($table);
        return $result;
    }

    public function crear_perfiles($table, $data) {
        $result = $this->db->insert($table, $data);
        return $result;
    }

    public function listar_perfiles($buscar, $inicio = FALSE, $cantidadregistro = FALSE) {
        $this->db->like("nombre", $buscar);
        if ($inicio !== FALSE && $cantidadregistro !== FALSE) {
            $this->db->limit($cantidadregistro, $inicio);
        } 
        $this->db->order_by('idperfiles', 'desc');
        $consulta = $this->db->get("perfiles");
        return $consulta->result();
    }
    public function linea_idperf($table, $editBtnId) {
        $this->db->where('idperfiles', $editBtnId);
        $result = $this->db->get($table);
        return $result->result();
    }
    public function linea_actualizar($table, $editBtnId) {
        $this->db->where('idperfiles', $editBtnId);
        $result = $this->db->get($table);
        return $result->result();
    }
    public function perfil($table, $perf) {
        $this->db->where('idperfiles', $perf);
        $result = $this->db->get($table);
        return $result->result();
    }

    public function actualizar_perfiles($table, $data, $updateId) {
        $this->db->where('idperfiles', $updateId);
        $result = $this->db->update($table, $data);
        return $result;
    }

}
