<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Retribusi extends CI_Controller
{
  public function __construct()
  {
    parent::__construct();
    if ($this->session->userdata('masuk') != TRUE)
    {
      redirect();
    }
  }

  public function generate()
  {
    $data['bayar']  = $this->db->get_where('bayar', [
      'id_pedagang' => $this->session->id_pedagang,
      'tanggal'     => date('Y-m-d')
    ])->num_rows();
    
    $jamSekarang        = strtotime('now');
    $jam12              = strtotime(date('Y-m-d') . '12:00');
    $data['tunggakan']  = FALSE;
    if ($jamSekarang > $jam12) {
      $bayar  = $this->db->get_where('bayar', [
        'id_pedagang' => $this->session->id_pedagang,
        'tanggal'     => date('Y-m-d')
      ])->num_rows();
      $tunggakan  = $this->db->get_where('bayar', [
        'id_pedagang' => $this->session->id_pedagang,
        'tanggal'     => date('Y-m-d')
      ])->num_rows();
      if ($bayar == 0 && $tunggakan == 0) {
        $this->db->insert('tunggakan', [
          'id_pedagang' => $this->session->id_pedagang,
          'tanggal'     => date('Y-m-d')
        ]);
      }
      $data['tunggakan']  = TRUE;
    }
    $this->load->library('ciqrcode'); //pemanggilan library QR CODE
    $config['cacheable']    = true; //boolean, the default is true
    $config['cachedir']     = './assets/'; //string, the default is application/cache/
    $config['errorlog']     = './assets/'; //string, the default is application/logs/
    $config['imagedir']     = './assets/'; //direktori penyimpanan qr code
    $config['quality']      = true; //boolean, the default is true
    $config['size']         = '1024'; //interger, the default is 1024
    $config['black']        = array(224,255,255); // array, default is array(255,255,255)
    $config['white']        = array(70,130,180); // array, default is array(0,0,0)
    $this->ciqrcode->initialize($config);
    $image_name         = $this->session->id_pedagang . '.png'; //buat name dari qr code sesuai dengan nim
    $params['data']     = base_url() . 'bayar/' . $this->session->id_pedagang; //data yang akan di jadikan QR CODE
    $params['level']    = 'H'; //H=High
    $params['size']     = 10;
    $params['savename'] = FCPATH.$config['imagedir'].$image_name; //simpan image QR CODE ke folder assets/images/
    $this->ciqrcode->generate($params); // fungsi untuk generate QR CODE
    
    $this->load->view('template_petugas/header');
    $this->load->view('template_petugas/sidebar');
    $this->load->view('pedagang/qrcode', $data);
    $this->load->view('template_petugas/footer');
  }

  public function tunggakan()
  {
    $this->load->library('ciqrcode'); //pemanggilan library QR CODE
    $config['cacheable']    = true; //boolean, the default is true
    $config['cachedir']     = './assets/'; //string, the default is application/cache/
    $config['errorlog']     = './assets/'; //string, the default is application/logs/
    $config['imagedir']     = './assets/'; //direktori penyimpanan qr code
    $config['quality']      = true; //boolean, the default is true
    $config['size']         = '1024'; //interger, the default is 1024
    $config['black']        = array(224,255,255); // array, default is array(255,255,255)
    $config['white']        = array(70,130,180); // array, default is array(0,0,0)
    $this->ciqrcode->initialize($config);
    $image_name         = 'tunggakan-' . $this->session->id_pedagang . '.png'; //buat name dari qr code sesuai dengan nim
    $params['data']     = base_url() . 'bayar_tunggakan/' . $this->session->id_pedagang; //data yang akan di jadikan QR CODE
    $params['level']    = 'H'; //H=High
    $params['size']     = 10;
    $params['savename'] = FCPATH.$config['imagedir'].$image_name; //simpan image QR CODE ke folder assets/images/
    $this->ciqrcode->generate($params); // fungsi untuk generate QR CODE

    $this->db->join('pedagang', 'tunggakan.id_pedagang = pedagang.id_pedagang');
    $data['tunggakan']  = $this->db->get_where('tunggakan', ['tunggakan.id_pedagang' => $this->session->id_pedagang])->result_array();
    $this->load->view('template_petugas/header');
    $this->load->view('template_petugas/sidebar');
    $this->load->view('pedagang/tunggakan', $data);
    $this->load->view('template_petugas/footer');
  }
}
