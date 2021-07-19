<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class ModelDaftar extends CI_model {
  
  public function daftar()
  {
    $config['upload_path']          = './assets';
    $config['allowed_types']        = 'pdf';
    $config['max_size']             = 10000;
    $config['max_width']            = 1024;
    $config['max_height']           = 768;

    $this->upload->initialize($config);

    if ( ! $this->upload->do_upload('ktp'))
    {
      $ktp  = '';
    } else {
      $ktp  = $this->upload->data('file_name');    
    }
    $this->db->insert('tb_user', [
      'id'        => uniqid(),
      'nama'      => $this->input->post('nama'),
      'email'     => $this->input->post('email'),
      'username'  => $this->input->post('username'),
      'password'  => $this->input->post('password'),
      'ktp'       => $ktp,
      'role_id'   => '4'
    ]);
  }
}
