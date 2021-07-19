<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Pengajuan extends CI_Controller
{
  public function __construct()
  {
    parent::__construct();
    if ($this->session->userdata('masuk') != TRUE)
    {
      redirect();
    }
  }

  public function index()
  {
    if ($this->input->post()) {
      $this->db->insert('pengajuan', [
        'id_pedagang'       => $this->session->id_pedagang,
        'id_pedagang_baru'  => $this->input->post('id_pedagang_baru')
      ]);
      redirect('Pedagang/Pengajuan');
    }
    $data['pengajuan']  = $this->db->get_where('pengajuan', [
      'id_pedagang' => $this->session->id_pedagang
    ])->row_array();
    $data['pedagang_baru']  = $this->db->get_where('tb_user', [
      'role_id' => '4'
    ])->result_array();
    $this->load->view('template_petugas/header');
    $this->load->view('template_petugas/sidebar');
    $this->load->view('pedagang/v_pengajuan', $data);
    $this->load->view('template_petugas/footer');
  }

  public function batal()
  {
    $this->db->delete('pengajuan', ['id_pedagang' => $this->session->id_pedagang]);
    redirect('pedagang/pengajuan');
  }
}
