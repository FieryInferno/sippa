<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Pasar extends CI_Controller
{
  function index()
  {
    $data['pasar']  = $this->db->get('pasar')->result_array();
    $this->load->view('template_petugas/header');
    $this->load->view('template_petugas/sidebar');
    $this->load->view('petugas/pasar', $data);
    $this->load->view('template_petugas/footer');
  }

  public function add_pasar()
  {
    if ($this->input->post()) {
      $foto = upload();
      $this->db->insert('pasar', [
        'nama_pasar'    => $this->input->post('nama_pasar'),
        'alamat_pasar'  => $this->input->post('alamat_pasar'),
        'foto'          => $foto
      ]);
      $this->session->set_flashdata('alert', 'Data Berhasil Diinput');
      redirect('Petugas/Pasar');
    }
    $this->load->view('template_petugas/header');
    $this->load->view('template_petugas/sidebar');
    $this->load->view('petugas/add_pasar');
    $this->load->view('template_petugas/footer');
  }

  

  public function hapus_pasar($id_pasar)
  {
    $this->db->delete('pasar', ['id_pasar'  => $id_pasar]);
    $this->db->update('pedagang', ['id_pasar' => NULL], ['id_pasar' => $id_pasar]);
    $this->session->set_flashdata('alert', 'Data Berhasil Dihapus');
    redirect('Petugas/Pasar');
  }

  public function edit($id_pasar)
  {
    if ($this->input->post()) { 
      if ($_FILES['foto']['name'] !== NULL) {
        $foto = upload();
        if (file_exists('assets/img/' . $this->input->post('fotoLama'))) unlink('assets/img/' . $this->input->post('fotoLama'));
      } else {
        $foto = $this->input->post('fotoLama');
      }
      $this->db->update('pasar', [
        'nama_pasar'    => $this->input->post('nama_pasar'),
        'alamat_pasar'  => $this->input->post('alamat_pasar'),
        'foto'          => $foto
      ], ['id_pasar'  => $id_pasar]);
      $this->session->set_flashdata('alert', 'Data Berhasil Diinput');
      redirect('Petugas/Pasar');
    }
    $data = $this->db->get_where('pasar', ['id_pasar' => $id_pasar])->row_array();
    $this->load->view('template_petugas/header');
    $this->load->view('template_petugas/sidebar');
    $this->load->view('petugas/editPasar', $data);
    $this->load->view('template_petugas/footer');
  }
}
