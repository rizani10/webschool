<?php

defined('BASEPATH') or exit('No direct script access allowed');

class Mapel extends CI_Controller
{

  public function __construct()
  {
    parent::__construct();
    cek_login();
    $this->load->model('M_model');
  }

  public function index()
  {
    $data = [
      'title'  => 'Admin - Web Sekolah',
      'title2' => 'Daftar Mata Pelajaran',
      'mapel'  => $this->M_model->detail(),
      'user'   => $this->db->get_where(
        'tb_user',
        [
          'username' => $this->session->userdata('username')
        ]
      )->row_array()  //session
    ];

    $this->load->view('admin/templates/header', $data);
    $this->load->view('admin/templates/sidebar', $data);
    $this->load->view('admin/templates/topbar', $data);
    $this->load->view('admin/mapel/index', $data);
    $this->load->view('admin/templates/footer');
  }

  public function add()
  {
    $this->M_model->insert();
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
          Mata Pelajaran Berhasil di Tambah
        </div>
      </div>'
    );
    redirect('mapel');
  }

  public function edit()
  {
    $this->M_model->getEdit();
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
          Mata Pelajaran Berhasil di Edit
        </div>
      </div>'
    );
    redirect('mapel');
  }

  public function hapus($id_mapel)
  {
    $this->db->delete('mapel', ['id_mapel' => $id_mapel]);
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
          Mata Pelajaran Berhasil di Hapus
        </div>
      </div>'
    );
    redirect('mapel');
  }
}

/* End of file Admin.php */
