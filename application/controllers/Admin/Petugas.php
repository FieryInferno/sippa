<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Petugas extends CI_Controller {
	
	public function index()
	{
    $data['petugas']  = $this->db->get_where('tb_user', ['role_id'  => '2'])->result_array();
    $this->load->view('template_admin/header');
    $this->load->view('template_admin/sidebar');
    $this->load->view('admin/petugas', $data);
    $this->load->view('template_admin/footer');
	}
	
	public function tambah()
	{
    if ($this->input->post()) {
      $this->db->insert('tb_user', [
        'id'        => uniqid(),
        'nama'      => $this->input->post('nama'),
        'email'     => $this->input->post('email'),
        'username'  => $this->input->post('username'),
        'password'  => $this->input->post('password'),
        'role_id'   => '2'
      ]);
      $this->session->set_flashdata('pesan', '
        <div class="alert alert-success">Berhasil tambah data</div>
      ');
      redirect('admin/petugas');
    }
    $this->load->view('template_admin/header');
    $this->load->view('template_admin/sidebar');
    $this->load->view('admin/tambahPetugas');
    $this->load->view('template_admin/footer');
	}
	
	public function edit($id_user)
	{
    if ($this->input->post()) {
      $this->db->update('tb_user', [
        'nama'      => $this->input->post('nama'),
        'email'     => $this->input->post('email'),
        'username'  => $this->input->post('username'),
        'password'  => $this->input->post('password')
      ], ['id' => $id_user]);
      $this->session->set_flashdata('pesan', '
        <div class="alert alert-success">Berhasil edit data</div>
      ');
      redirect('admin/petugas');
    }
    $data = $this->db->get_where('tb_user', ['id'  => $id_user])->row_array();
    $this->load->view('template_admin/header');
    $this->load->view('template_admin/sidebar');
    $this->load->view('admin/editPetugas', $data);
    $this->load->view('template_admin/footer');
	}

  public function hapus($id_user)
  {
    $this->db->delete('tb_user', ['id' => $id_user]);
    $this->session->set_flashdata('pesan', '
      <div class="alert alert-success">Berhasil hapus data</div>
    ');
    redirect('admin/petugas');
  }
}
