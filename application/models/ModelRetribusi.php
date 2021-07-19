<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class ModelRetribusi extends CI_model {
  
  public function getPerBulan($bulan)
  {
    $this->db->join('pedagang', 'bayar.id_pedagang = pedagang.id_pedagang');
    return $this->db->get_where('bayar', [
      'pedagang.id_pasar' => $this->input->get('id_pasar'),
      'month(tanggal)'    => $bulan,
      'year(tanggal)'     => $this->input->get('tahun')      
    ])->result_array();
  }

  public function getRetribusiHariIni()
  {
    $this->db->where('tanggal', date('Y-m-d'));
    $this->db->join('pedagang', 'bayar.id_pedagang = pedagang.id_pedagang');
    $this->db->join('pasar', 'pedagang.id_pasar = pasar.id_pasar');
    return $this->db->get('bayar')->result_array();
  }
}
