<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Chat extends CI_Controller
{

  function index($id) {
    switch ($this->session->role_id) {
      case '4':
        $data['chat'] = $this->db->get_where('chat', [
          'chat.id_pedagang'  => $id,
          'id_pedagang_baru'  => $this->session->id
        ])->row_array();
        if ($data['chat'] == NULL) {
          $id_chat  = uniqid();
          $this->db->insert('chat', [
            'id_chat'           => $id_chat,
            'id_pedagang_baru'  => $this->session->id,
            'id_pedagang'       => $id,
          ]);
          $data['chat'] = $this->db->get_where('chat', [
            'chat.id_pedagang'  => $id,
            'id_pedagang_baru'  => $this->session->id
          ])->row_array();
        }
        $this->db->join('chat', 'isi_chat.id_chat = chat.id_chat');
        $this->db->join('pedagang', 'chat.id_pedagang = pedagang.id_pedagang');
        $data['isi_chat'] = $this->db->get_where('isi_chat', [
          'isi_chat.id_chat' => $data['chat']['id_chat']
        ])->result_array();
        $this->load->view('pedagangBaru/chat', $data);
        break;
      case '3':
        $data['chat'] = $this->db->get_where('chat', [
          'chat.id_pedagang'  => $this->session->id_pedagang,
          'id_pedagang_baru'  => $id
        ])->row_array();
        $this->db->join('chat', 'isi_chat.id_chat = chat.id_chat');
        $this->db->join('tb_user', 'chat.id_pedagang_baru = tb_user.id');
        $data['isi_chat'] = $this->db->get_where('isi_chat', [
          'isi_chat.id_chat' => $data['chat']['id_chat']
        ])->result_array();
        $this->load->view('template_petugas/header');
        $this->load->view('template_petugas/sidebar');
        $this->load->view('pedagang/isi_chat', $data);
        $this->load->view('template_petugas/footer');
        break;
      
      default:
        # code...
        break;
    }
  }

  public function kirim()
  {
    $this->db->insert('isi_chat', [
      'id_chat'   => $this->input->post('id_chat'),
      'pengirim'  => $this->input->post('pengirim'),
      'penerima'  => $this->input->post('penerima'),
      'isi_chat'  => $this->input->post('isi')
    ]);
    redirect('chat/' . $this->input->post('penerima'));
  }
}
