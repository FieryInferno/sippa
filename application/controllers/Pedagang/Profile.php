<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Profile extends CI_Controller
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
    $data = $this->Modelpedagang->getByIdUser();
    $this->load->view('template_petugas/header');
    $this->load->view('template_petugas/sidebar');
    $this->load->view('pedagang/profile', $data);
    $this->load->view('template_petugas/footer');
  }

  public function ubah()
  {
    $this->Modelpedagang->ubahStatus();
    redirect('pedagang/profile');
  }
}
