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
    $data['pasar']  = $this->db->get('pasar')->result_array();
		$this->load->view('welcome_message', $data);
	}
}
