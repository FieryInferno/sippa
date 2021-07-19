<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Chat extends CI_Controller
{
  function index() {
    $this->db->join('pedagang', 'chat.id_pedagang = pedagang.id_pedagang');
    $data['chat'] = $this->db->get_where('chat', [
      'id_pedagang_baru' => $this->session->id
    ])->result_array();
    $this->load->view('pedagangBaru/daftarChat', $data);
  }
}
