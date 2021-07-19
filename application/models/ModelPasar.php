<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class ModelPasar extends CI_model {

  protected $table  = 'pasar';
  
  public function getAll()
  {
    $this->input->get('nama_pasar') ? $this->db->like('nama_pasar', $this->input->get('nama_pasar')) : '' ; 
    return $this->db->get($this->table)->result_array();
  }
}
