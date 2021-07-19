<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Login extends CI_Controller
{
  function __construct()
  {
    parent::__construct();
    $this->load->library('session');
    $this->load->model('M_login');
  }

  function index()
  {
    $this->load->view('v_login');
  }

	function cek()
  {
    $username = htmlspecialchars($this->input->post('username', TRUE) , ENT_QUOTES);
    $password = htmlspecialchars($this->input->post('password', TRUE) , ENT_QUOTES);
    $cek = $this->M_login->login($username, $password);
    if ($cek->num_rows() > 0)
    {
      $data = $cek->row_array();
      $this->session->set_userdata([
        'sess_nama' => $data['nama'],
        'masuk'     => TRUE,
        'role_id'   => $data['role_id'],
        'sess_id'   => $data['username'],
        'id'        => $data['id']
      ]);
      switch ($data['role_id']) {
        case '1':
          redirect('Admin/Dashboard');
          break;
        case '2':
          redirect('Petugas/dashboard');
          break;
        case '3':
          $pedagang = $this->db->get_where('pedagang', [
            'id_user' => $data['id']
          ])->row_array();
          $this->session->set_userdata('id_pedagang', $pedagang['id_pedagang']);
          redirect('Pedagang/dashboard');
          break;
        case '4':
          redirect('PedagangBaru/Dashboard');
          break;
        case '5':
          redirect('kepala_bidang');
          break;
        
        default:
          # code...
          break;
      }
    }
    else
    {
      $this->session->set_flashdata('pesan', '
        <div class="alert alert-danger alert-dismissible fade show" role="alert">
          <strong>Gagal!</strong> Login gagal.
          <button type="button" class="close" data-dismiss="alert" aria-label="Close">
            <span aria-hidden="true">&times;</span>
          </button>
        </div>
      ');
      redirect('login');
    }
  }

  function logout()
  {
    $this->session->unset_userdata('akses');
    $this->session->unset_userdata('ses_id');
    $this->session->unset_userdata('id');
    $this->session->unset_userdata('ses_nama');
    session_destroy();
    $this->session->set_flashdata('msg',
      '<div class="alert alert-dismissible alert-success">
          <button type="button" class="close" data-dismiss="alert">&times;</button>
          <strong>You have been logged out!</strong>  Please Come Back Again Later..
      </div>');
    redirect();
  }
}
