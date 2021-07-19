<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Retribusi extends CI_Controller
{

  public function index($id_pedagang = null)
  {
    if ($id_pedagang) {
      $this->db->insert('bayar', [
        'id_pedagang' => $id_pedagang,
        'tanggal'     => date('Y-m-d'),
        'id_petugas'  => $this->session->id
      ]);
      $this->session->set_flashdata('pesan', '
        <div class="alert alert-success alert-dismissible fade show" role="alert">
          <strong>Sukses!</strong> Berhasil bayar retribusi.
          <button type="button" class="close" data-dismiss="alert" aria-label="Close">
            <span aria-hidden="true">&times;</span>
          </button>
        </div>
      ');
      redirect('Petugas/Retribusi');
    }
    $data['title']  = 'Scan QR Code';
    $this->load->view('template_petugas/header', $data);
    $this->load->view('template_petugas/sidebar');
    $this->load->view('petugas/scan_qr', $data);
    $this->load->view('template_petugas/footer');
  }

  public function data_retribusi()
  {
    $data['retribusi']      = $this->ModelRetribusi->getRetribusiHariIni();
    $data['totalRetribusi'] = 0;
    foreach ($data['retribusi'] as $key) {
      switch ($key['jenis_pedagang']) {
        case 'pkl':
          $data['totalRetribusi'] += 1000;
          break;
        case 'kios':
          $data['totalRetribusi'] += 2000;
          break;
        case 'los':
          $data['totalRetribusi'] += 500;
          break;
        
        default:
          # code...
          break;
      }
    }

    $data['title']  = 'Data Retribusi';

    $data['upload'] = $this->db->get_where('retribusi', [
      'status'      => '2',
      'id_petugas'  => $this->session->id
    ])->result_array();
    if ($data['upload']) {
      for ($i=0; $i < count($data['upload']); $i++) {
        $key                              = $data['upload'][$i];  
        $data['upload'][$i]['jumlah']  = 0;
        $this->db->join('pedagang', 'bayar.id_pedagang = pedagang.id_pedagang');
        $bayar  = $this->db->get_where('bayar', [
          'tanggal'     => $key['tanggal'],
          'id_petugas'  => $key['id_petugas']
        ])->result_array();
        foreach ($bayar as $value) {
          switch ($value['jenis_pedagang']) {
            case 'pkl':
              $jumlah = 1000;
              break;
            case 'toko':
              $jumlah = 2000;
              break;
            case 'los':
              $jumlah = 500;
              break;
            
            default:
              # code...
              break;
          }
          $data['upload'][$i]['jumlah']  += $jumlah;
        }
      }
    }
    $this->load->view('template_petugas/header', $data);
    $this->load->view('template_petugas/sidebar');
    $this->load->view('petugas/retribusi', $data);
    $this->load->view('template_petugas/footer');
  }

  public function report()
  {
    $config['upload_path']          = './assets/img';
    $config['allowed_types']        = 'pdf';

    $this->upload->initialize($config);

    if ( ! $this->upload->do_upload('foto'))
    {
      $bukti  = '';
    } else {
      $bukti  = $this->upload->data('file_name');    
    }
    $this->db->insert('retribusi', [
      'id_petugas'  => $this->session->id,
      'bukti'       => $bukti,
      'tanggal'     => date('Y-m-d')
    ]);
    $this->session->set_flashdata('pesan', '
      <div class="alert alert-warning alert-dismissible fade show" role="alert">
        <strong>Sukses!</strong> Berhasil report.
        <button type="button" class="close" data-dismiss="alert" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
    ');
    redirect('Petugas/Retribusi/data_retribusi');
  }

  public function bayarTunggakan($id_pedagang)
  {
    $jumlah_tunggakan = $this->db->get_where('tunggakan', ['id_pedagang'  => $id_pedagang])->num_rows();
    for ($i=0; $i <= $jumlah_tunggakan; $i++) {
      $this->db->insert('bayar', [
        'id_pedagang' => $id_pedagang,
        'tanggal'     => date('Y-m-d'),
        'id_petugas'  => $this->session->id
      ]);
    }
    $this->db->delete('tunggakan', ['id_pedagang' => $id_pedagang]);
    $this->session->set_flashdata('pesan', '
      <div class="alert alert-success alert-dismissible fade show" role="alert">
        <strong>Sukses!</strong> Berhasil bayar retribusi.
        <button type="button" class="close" data-dismiss="alert" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
    ');
    redirect('Petugas/Retribusi');
  }

  public function dataTunggakan()
  {
    $jamSekarang        = strtotime('now');
    $jam12              = strtotime(date('Y-m-d') . '12:00');
    if ($jamSekarang > $jam12) {
      $pedagang = $this->db->get('pedagang')->result_array();
      foreach ($pedagang as $key) {
        $bayar  = $this->db->get_where('bayar', [
          'id_pedagang' => $key['id_pedagang'],
          'tanggal'     => date('Y-m-d')
        ])->num_rows();
        $tunggakan  = $this->db->get_where('bayar', [
          'id_pedagang' => $key['id_pedagang'],
          'tanggal'     => date('Y-m-d')
        ])->num_rows();
        if ($bayar == 0 && $tunggakan == 0) {
          $this->db->insert('tunggakan', [
            'id_pedagang' => $key['id_pedagang'],
            'tanggal'     => date('Y-m-d')
          ]);
        }
      }
    }
    $data['title']      = 'Data Tunggakan';
    $this->db->join('pedagang', 'tunggakan.id_pedagang = pedagang.id_pedagang');
    $this->db->join('pasar', 'pedagang.id_pasar = pasar.id_pasar');
    $tunggakan          = $this->db->get('tunggakan')->result_array();
    $data['tunggakan']  = [];
    foreach ($tunggakan as $key) {
      switch ($key['jenis_pedagang']) {
        case 'pkl':
          $tunggakan  = 1000;
          break;
        case 'kios':
          $tunggakan  = 2000;
          break;
        case 'los':
          $tunggakan  = 500;
          break;
        
        default:
          # code...
          break;
      }
      if (!empty($data['tunggakan'][$key['id_pedagang']])) {
        $data['tunggakan'][$key['id_pedagang']]['tunggakan']  += $tunggakan;
      } else {
        $data['tunggakan'][$key['id_pedagang']] = [
          'nama_pedagang' => $key['nama_pedagang'],
          'nama_pasar'    => $key['nama_pasar'],
          'tunggakan'     => $tunggakan
        ];
      }
    }
    $this->load->view('template_petugas/header', $data);
    $this->load->view('template_petugas/sidebar');
    $this->load->view('petugas/dataTunggakan', $data);
    $this->load->view('template_petugas/footer');
  }

  public function uploadUlang($id_retribusi)
  {
    $config['upload_path']          = './assets/img';
    $config['allowed_types']        = 'pdf';

    $this->upload->initialize($config);

    if ( ! $this->upload->do_upload('foto'))
    {
      $bukti  = '';
    } else {
      $bukti  = $this->upload->data('file_name');    
    }
    $this->db->update('retribusi', [
      'status'  => '0',
      'bukti'   => $bukti  
    ], ['id_retribusi'  => $id_retribusi]);
    redirect('Petugas/Retribusi/data_retribusi');
  }
}
