<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Pedagang extends CI_Controller
{
  function index($status = NULL)
  {
    if ($status) {
      $this->db->join('pasar', 'pedagang.id_pasar = pasar.id_pasar', 'left outer');
      $this->db->where('alasan !=', NULL);
      switch ($status) {
        case 'buka':
          $this->db->where('status', 'tutup');
          break;
        case 'tutup':
          $this->db->where('status', 'buka');
          break;
        
        default:
          # code...
          break;
      }
      $data['pedagang'] = $this->db->get('pedagang')->result_array();
    } else {
      $data['pedagang'] = $this->Modelpedagang->get_all();
    }
    $data['buka']     = $this->db->get_where('pedagang', [
      'status'    => 'tutup',
      'alasan !=' => NULL
    ])->num_rows();
    $data['tutup'] = $this->db->get_where('pedagang', [
      'status'    => 'buka',
      'alasan !=' => NULL
    ])->num_rows();
    $this->load->view('template_petugas/header');
    $this->load->view('template_petugas/sidebar');
    $this->load->view('petugas/v_pedagang',$data);
    $this->load->view('template_petugas/footer');
  }

  public function add_pedagang()
  {
    if ($this->input->post()) {
      $this->Modelpedagang->add_pedagang();
      $this->session->set_flashdata(['alert'=>'Data berhasil di masukan']);
      redirect('Petugas/Pedagang');
    } else {
      $data['pasar']  = $this->db->get('pasar')->result_array();
      $this->load->view('template_petugas/header');
      $this->load->view('template_petugas/sidebar');
      $this->load->view('petugas/v_add_pedagang', $data);
      $this->load->view('template_petugas/footer');

    }
  }

  public function edit($id_pedagang)
  {
    if ($this->input->post()) { 
      $this->db->update('tb_user', [
        'nama'      => $this->input->post('nama_pedagang'),
        'email'     => $this->input->post('email'),
        'username'  => $this->input->post('username'),
        'password'  => $this->input->post('password'),
      ], ['id'  => $this->input->post('id_user')]);
      $this->db->update('pedagang',[
        'nik'             => $this->input->post('nik'),
        'nama_pedagang'   => $this->input->post('nama_pedagang'),
        'alamat'          => $this->input->post('alamat'),
        'id_pasar'        => $this->input->post('id_pasar'),
        'no_kios'         => $this->input->post('no_kios'),
        'jenis_pedagang'  => $this->input->post('jenis_pedagang')
      ], ['id_pedagang'  => $id_pedagang]);
      $this->session->set_flashdata('alert', '
        <div class="alert alert-success alert-dismissible fade show" role="alert">
          Daftar Berhasil Diedit
          <button type="button" class="close" data-dismiss="alert" aria-label="Close">
            <span aria-hidden="true">&times;</span>
          </button>
        </div>
      ');
      redirect('petugas/pedagang');
    }
    $this->db->join('tb_user', 'pedagang.id_user = tb_user.id');
    $data           = $this->db->get_where('pedagang', ['id_pedagang' => $id_pedagang])->row_array();
    $data['pasar']  = $this->db->get('pasar')->result_array();
    $this->load->view('template_petugas/header');
    $this->load->view('template_petugas/sidebar');
    $this->load->view('petugas/editPedagang', $data);
    $this->load->view('template_petugas/footer');
  }
  
  public function verifikasi($status)
  {
    switch ($status) {
      case 'buka':
        $data = ['status' => 'buka'];
        break;
      case 'tutup':
        $data = ['status' => 'tutup'];
        break;
      
      default:
        # code...
        break;
    }
    $data['alasan'] = NULL;
    $this->db->update('pedagang', $data, ['id_pedagang' => $this->input->post('id_pedagang')]);
    redirect('petugas/pedagang/' . $status);
  }
}
