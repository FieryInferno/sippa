<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Pasar extends CI_Controller
{
  public function data_pedagang($id_pasar)
  {
    $this->db->join('pasar', 'pedagang.id_pasar = pasar.id_pasar');
    $data['pedagang'] = $this->db->get_where('pedagang', [
      'pedagang.id_pasar'  => $id_pasar
    ])->result_array();
    $this->load->view('data_pedagang', $data);
  }

  public function pedagang($id_pedagang)
  {
    $this->db->join('pasar', 'pedagang.id_pasar = pasar.id_pasar');
    $data = $this->db->get_where('pedagang', [
      'id_pedagang'  => $id_pedagang
    ])->row_array();
    $this->load->view('pedagang', $data);
  }
}