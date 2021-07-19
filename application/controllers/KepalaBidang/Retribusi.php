<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Retribusi extends CI_Controller {

  public function index($id_pedagang = null)
  {
    $this->db->join('tb_user', 'retribusi.id_petugas = tb_user.id');
    $data['retribusi']  = $this->db->get('retribusi')->result_array();
    for ($i=0; $i < count($data['retribusi']); $i++) {
      $key                              = $data['retribusi'][$i];  
      $data['retribusi'][$i]['jumlah']  = 0;
      $this->db->join('pedagang', 'bayar.id_pedagang = pedagang.id_pedagang');
      $bayar  = $this->db->get_where('bayar', [
        'tanggal'     => $key['tanggal'],
        'id_petugas'  => $key['id_petugas']
      ])->result_array();
      foreach ($bayar as $value) {
        switch ($value['jenis_pedagang']) {
          case 'pkl':
            $jumlah = 1000;
            break;
          case 'kios':
            $jumlah = 2000;
            break;
          case 'los':
            $jumlah = 500;
            break;
          
          default:
            # code...
            break;
        }
        $data['retribusi'][$i]['jumlah']  += $jumlah;
      }
    }
    $data['title']      = 'Data Retribusi';
    $this->load->view('template_admin/header', $data);
    $this->load->view('template_admin/sidebar');
    $this->load->view('kepalaBidang/retribusi', $data);
    $this->load->view('template_admin/footer');
  }
}
