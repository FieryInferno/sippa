<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class KepalaBidang extends CI_Controller
{
  function index() {
    if ($this->input->get()) {
      $bulan_awal   = (int) $this->input->get('dari_bulan');
      $bulan_akhir  = (int) $this->input->get('sampai_bulan');
      $selisih      = $bulan_akhir - $bulan_awal;
      $jumlah       = [];
      $bulan        = [];
      for ($i=0; $i <= $selisih; $i++) {  
        // print_r($i);echo '<br/>';
        // print_r($bulan_awal++);echo '<br/>';
        $jumlah_sementara = 0;
        switch ($bulan_awal) {
          case '1':
            $bulan[$i]  = 'Januari';
            break;
          case '2':
            $bulan[$i]  = 'Februari';
            break;
          case '3':
            $bulan[$i]  = 'Maret';
            break;
          case '4':
            $bulan[$i]  = 'April';
            break;
          case '5':
            $bulan[$i]  = 'Mei';
            break;
          case '6':
            $bulan[$i]  = 'Juni';
            break;
          case '7':
            $bulan[$i]  = 'Juli';
            break;
          case '8':
            $bulan[$i]  = 'Agustus';
            break;
          case '9':
            $bulan[$i]  = 'September';
            break;
          case '10':
            $bulan[$i]  = 'Oktober';
            break;  
          case '11':
            $bulan[$i]  = 'November';
            break;
          case '12':
            $bulan[$i]  = 'Desember';
            break;
          
          default:
            # code...
            break;
        }
        $data = $this->ModelRetribusi->getPerBulan($bulan_awal++);
        if ($data) {
          foreach ($data as $key) {
            switch ($key['jenis_pedagang']) {
              case 'pkl':
                $jumlah_sementara += 1000;
                break;
              case 'kios':
                $jumlah_sementara += 2000;
                break;
              case 'los':
                $jumlah_sementara += 500; 
                break;
              
              default:
                # code...
                break;
            }
          }
          $jumlah[$i] = $jumlah_sementara;
        } else {
          $jumlah[$i] = 0;
        }
      }
      // print_r($jumlah);echo '<br/>';
      // print_r($bulan);
      // die();
      $data['jumlah'] = $jumlah;
      $data['bulan']  = $bulan;
    } else {
      $data['jumlah'] = [];
      $data['bulan']  = [];
    }
    $data['pasar']  = $this->ModelPasar->getAll();
    $this->load->view('template_admin/header');
    $this->load->view('template_admin/sidebar');
    $this->load->view('kepalaBidang/dashboard');
    $this->load->view('template_admin/footer');
  }
}
