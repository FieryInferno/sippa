<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Chat extends CI_Controller
{
  function index() {
    $this->db->join('tb_user', 'chat.id_pedagang_baru = tb_user.id');
    $data['chat'] = $this->db->get_where('chat', [
      'id_pedagang' => $this->session->id_pedagang
    ])->result_array();
    $this->load->view('template_petugas/header');
    $this->load->view('template_petugas/sidebar');
    $this->load->view('pedagang/chat', $data);
    $this->load->view('template_petugas/footer');
  }
}