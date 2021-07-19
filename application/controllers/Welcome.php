<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Welcome extends CI_Controller {
	
	public function index()
	{
    if ($this->input->get()) {
      $this->db->like('nama_pasar', $this->input->get('nama_pasar'));
      $data['pasar']  = $this->db->get('pasar')->result_array();
    } else {
      $data['pasar']  = $this->db->get('pasar')->result_array();
    }
		$this->load->view('welcome_message', $data);
	}
}
