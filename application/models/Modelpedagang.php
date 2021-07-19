<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Modelpedagang extends CI_model {

  protected $table  = 'pedagang';
  
	public function add_pedagang()
	{
    $idUser = uniqid();
    $this->db->insert('tb_user', [
      'id'        => $idUser,
      'nama'      => $this->input->post('nama_pedagang'),
      'email'     => $this->input->post('email'),
      'username'  => $this->input->post('username'),
      'password'  => $this->input->post('password'),
      'role_id'   => '3'
    ]);
		$this->db->insert('pedagang',[
			'nik'             => $this->input->post('nik'),
			'nama_pedagang'   => $this->input->post('nama_pedagang'),
			'alamat'          => $this->input->post('alamat'),
			'id_pasar'        => $this->input->post('id_pasar'),
			'no_kios'         => $this->input->post('no_kios'),
			'jenis_pedagang'  => $this->input->post('jenis_pedagang')
		]);
	}

	public function get_all($status = null)
	{
    $this->db->join('pasar', 'pedagang.id_pasar = pasar.id_pasar', 'left outer');
    $status ? $this->db->where('pedagang.status', $status) : '' ;
		return $this->db->get('pedagang')->result_array();
	}

	public function get_by_id($nik)
	{
		return $this->db->get_where('pedagang',['nik'=>$nik])->row_array();
	}

	public function updateregister($id_register)
	{
		$this->db->where('id_register',$id_register);
		$this->db->update('register',[
			'no_surat' => $this->input->post('no_surat'),
			'tanggal' => $this->input->post('tanggal'),
			'perihal' => $this->input->post('perihal'),
			'pengirim' => $this->input->post('pengirim'),
			'tujuan' => $this->input->post('tujuan')
		]);
	}

	public function delete_pedagang($id_pedagang)
	{
		$this->db->where('id_pedagang', $id_pedagang);
		$this->db->delete('pedagang');
	}

	public function verifikasi($id_register)
	{
		$data=$this->db->get_where('register',[
			'id_register'=>$id_register])->row_array();
		if ($data['status']=='belum'){
			$status='sudah';		
		} else {
			$status='belum';
		}

		$this->db->where('id_register',$id_register);
		$this->db->update('register',[
			'status' => $status
			
		]);
	}

	public function get_verifikasi()
	{
		return $this->db->get_where('register',[
			'status'=>'sudah'
		])->result_array();
	}

	private function upload_file()
    {
        $config['upload_path'] = './assets/file_surat/';
        $config['allowed_types'] = 'docx|doc|pdf';
        $config['max_size'] = 10000;
        $this->load->library('upload');
        $this->upload->initialize($config);
        $this->load->library('upload', $config);
        $cek = $this->upload->do_upload('upload');
        if(! $cek){
            echo $this->session->set_flashdata('alert','<div class="alert alert-danger" role="alert"><button type="button" class="close" data-dismiss="alert"><span class="fa fa-close"></span></button> Ada kesalahan upload! Mohon cek kembali</div>');
            redirect('tata_usaha/register');
        } else {
            return $this->upload->data('file_name');
        }
    }

  public function getByPasar($id_pasar)
  {
    return $this->db->get_where($this->table, [
      'id_pasar'  => $id_pasar
    ])->result_array();
  }

  public function getByIdUser()
  {
    return $this->db->get_where('pedagang', [
      'id_user' => $this->session->id
    ])->row_array();
  }

  public function ubahStatus()
  {
    if ($this->input->post('ubahFoto')) {
      if (file_exists('assets/' . $this->input->post('foto_lama'))) {
        unlink('assets/' . $this->input->post('foto_lama'));
      }
      $config['upload_path']          = './assets';
      $config['allowed_types']        = 'jpg|png|jpeg';

      $this->upload->initialize($config);

      if ( ! $this->upload->do_upload('foto'))
      {
        print_r($this->upload->display_errors());
        die();
      } else {
        $foto = $this->upload->data('file_name');    
      }
      $ubah = ['foto' => $foto];
    }

    if ($this->input->post('ubahStatus')) {
      $ubah = [
        'alasan'  => $this->input->post('alasan')
      ];
    }
    
    $this->db->update('pedagang', $ubah, ['id_user' => $this->session->id]);
  }
}
