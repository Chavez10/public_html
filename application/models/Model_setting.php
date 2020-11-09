<?php

defined('BASEPATH') OR exit('No direct script access allowed');

class Model_setting extends CI_Model {

    public function getinfo($settingid = 0) {
        if (!empty($settingid))
            $this->db->where('id', $settingid);
        $t = $this->db->get('settings2');

        return $t->result_array();
    }

}
