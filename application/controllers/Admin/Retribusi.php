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
    $this->load->view('admin/retribusi', $data);
    $this->load->view('template_admin/footer');
  }

  public function data_potensi_pasar()
  {
    $data['title']  = 'Data Potensi Pasar';
    $data['pasar']  = $this->ModelPasar->getAll();
    for ($i=0; $i < count($data['pasar']); $i++) { 
      $key      = $data['pasar'][$i];
      $data['pasar'][$i]['pkl']['jumlah'] = $this->db->get_where('pedagang', [
        'id_pasar'        => $key['id_pasar'],
        'jenis_pedagang'  => 'pkl',
        'status'          => 'buka'
      ])->num_rows();

      $data['pasar'][$i]['kios']['jumlah']  = $this->db->get_where('pedagang', [
        'id_pasar'        => $key['id_pasar'],
        'jenis_pedagang'  => 'kios',
        'status'          => 'buka'
      ])->num_rows();

      $data['pasar'][$i]['los']['jumlah']  = $this->db->get_where('pedagang', [
        'id_pasar'        => $key['id_pasar'],
        'jenis_pedagang'  => 'los',
        'status'          => 'buka'
      ])->num_rows();
    }
    $this->load->view('template_admin/header', $data);
    $this->load->view('template_admin/sidebar');
    $this->load->view('admin/data_potensi_pasar', $data);
    $this->load->view('template_admin/footer');
  }

  public function verifikasi($id_retribusi)
  {
    $this->db->update('retribusi', ['status'  => '1'], ['id_retribusi'  => $id_retribusi]);
    
    $this->session->set_flashdata('pesan',
      '<div class="alert alert-success" role="alert">
        <button type="button" class="close" data-dismiss="alert">
          <span class="fa fa-close"></span>
        </button> 
        Berhasil verifikasi
      </div>'
    );
    redirect('admin/retribusi');
  }

  public function tolak($id_retribusi)
  {
    $this->db->update('retribusi', [
      'status'  => '2',
      'bukti'   => NULL
    ], ['id_retribusi'  => $id_retribusi]);
    
    $this->session->set_flashdata('pesan',
      '<div class="alert alert-success" role="alert">
        <button type="button" class="close" data-dismiss="alert">
          <span class="fa fa-close"></span>
        </button> 
        Berhasil verifikasi
      </div>'
    );
    redirect('admin/retribusi');
  }
}
