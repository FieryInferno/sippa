<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Pedagang extends CI_Controller
{
  function index($status = null) {
    $data['pedagang'] = $this->Modelpedagang->get_all($status);
    $this->load->view('template_admin/header');
    $this->load->view('template_admin/sidebar');
    $this->load->view('kepalaBidang/pedagang',$data);
    $this->load->view('template_admin/footer');
  }
}
