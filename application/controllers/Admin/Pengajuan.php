<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Pengajuan extends CI_Controller
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
    $this->db->join('pedagang', 'pengajuan.id_pedagang = pedagang.id_pedagang');
    $this->db->join('pasar', 'pedagang.id_pasar = pasar.id_pasar');
    $this->db->join('tb_user', 'pengajuan.id_pedagang_baru = tb_user.id');
    $data['pengajuan']  = $this->db->get('pengajuan')->result_array();
    $this->load->view('template_admin/header');
    $this->load->view('template_admin/sidebar');
    $this->load->view('admin/v_pengajuan', $data);
    $this->load->view('template_admin/footer');
  }

  public function verifikasi($id_pengajuan)
  {
    $this->db->join('tb_user', 'pengajuan.id_pedagang_baru = tb_user.id');
    $this->db->join('pedagang', 'pengajuan.id_pedagang = pedagang.id_pedagang');
    $pengajuan  = $this->db->get_where('pengajuan', [
      'id_pengajuan'  => $id_pengajuan
    ])->row_array();

    $this->db->where('id', $pengajuan['id_pedagang_baru']);
    $this->db->update('tb_user', [
      'role_id' => '3'
    ]); 
    
    $this->db->where('id', $pengajuan['id_user']);
    $this->db->delete('tb_user');

    $this->db->where('id_pedagang', $pengajuan['id_pedagang']);
    $this->db->update('pedagang', [
      'id_user'       => $pengajuan['id_pedagang_baru'],
      'nama_pedagang' => $pengajuan['nama']
    ]);

    $this->db->where('id_pengajuan', $id_pengajuan);
    $this->db->delete('pengajuan');

    $config = [
			'mailtype'  	=> 'html',
			'charset'   	=> 'utf-8',
			'protocol'  	=> 'smtp',
			'smtp_host' 	=> 'smtp.gmail.com',
			'smtp_user'		=> 'fieryinferno33@gmail.com',  // Email gmail
			'smtp_pass'   => 'NaonWeAh00',  // Password gmail
			'smtp_crypto'	=> 'ssl',
			'smtp_port'   => 465,
			'crlf'    		=> "\r\n", 
			'newline' 		=> "\r\n"
		];
		$this->email->initialize($config);
		$this->email->from('fieryinferno33@gmail.com', 'Sistem Pengelolaan Pasar');
		$this->email->to($pengajuan['email']);
		$this->email->subject('Verifikasi');
		$this->email->message('Anda sudah bisa login');
		$this->email->attach('./assets/SPB.pdf');
		$this->email->send();

    $this->session->set_flashdata('pesan', 'Data Berhasil Diverifikasi');
    redirect('Admin/Pengajuan');
  }
}
