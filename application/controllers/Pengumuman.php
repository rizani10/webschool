<?php 

defined('BASEPATH') OR exit('No direct script access allowed');

class Pengumuman extends CI_Controller 
{
  public function __construct()
  {
    parent::__construct();
    cek_login();
    $this->load->model('P_model');
    
  }


  public function index()
  {
    $data = [
      'title'  => 'Admin - Web Sekolah',
      'title2' => 'Pengumuman',
      'user'   => $this->db->get_where(
        'tb_user',
        [
          'username' => $this->session->userdata('username')
        ]
      )->row_array(),  //session
      'pengumuman' => $this->P_model->getAll()
    ];

    $this->load->view('admin/templates/header', $data);
    $this->load->view('admin/templates/sidebar');
    $this->load->view('admin/templates/topbar');
    $this->load->view('admin/pengumuman/index', $data);
    $this->load->view('admin/templates/footer');
  }

  
  public function add()
  {
    $this->P_model->insert();
    $this->session->set_flashdata(
      'pesan',
      '<div class="alert alert-success alert-dismissible" role="alert">
        <button type="button" class="close" data-dismiss="alert" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
        <div class="alert-icon">
          <i class="far fa-fw fa-bell"></i>
        </div>
        <div class="alert-message">
          Pengumuman berhasil Berhasil di Tambah
        </div>
      </div>'
    );
    redirect('pengumuman');
  }


  public function edit()
  {
    $this->P_model->getEdit();
    $this->session->set_flashdata(
      'pesan',
      '<div class="alert alert-success alert-dismissible" role="alert">
        <button type="button" class="close" data-dismiss="alert" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
        <div class="alert-icon">
          <i class="far fa-fw fa-bell"></i>
        </div>
        <div class="alert-message">
          Pengumuman berhasil Berhasil di Ubah
        </div>
      </div>'
    );
    redirect('pengumuman');
  }
  
  public function hapus($id_pengumuman)
  {
    $this->db->delete('tb_pengumuman', ['id_pengumuman' => $id_pengumuman]);
    $this->session->set_flashdata(
      'pesan',
      '<div class="alert alert-success alert-dismissible" role="alert">
        <button type="button" class="close" data-dismiss="alert" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
        <div class="alert-icon">
          <i class="far fa-fw fa-bell"></i>
        </div>
        <div class="alert-message">
          Pengumuman berhasil Berhasil di Hapus
        </div>
      </div>'
    );
    redirect('pengumuman');
  }

}

/* End of file Pengumuman.php */
