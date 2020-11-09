<?php

if (!defined('BASEPATH'))
    exit('No direct script access allowed');
$this->load->model('model_setting');
$this->load->view('template/header');
$this->load->view('template/content');
$this->load->view('template/footer');
