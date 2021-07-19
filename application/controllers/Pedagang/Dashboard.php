<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Dashboard extends CI_Controller
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
      $this->load->view('template_petugas/header');
      $this->load->view('template_petugas/sidebar');
      $this->load->view('pedagang/v_dashboard');
      $this->load->view('template_petugas/footer');
  }

  public function delete_pedagang($nik)
  {
    $this->Modelpedagang->delete_pedagang($nik);
    $this->session->set_flashdata(['alert'=>'Data berhasil di hapus']);
    redirect('petugas/Dashboard/pedagang');
  }

}
