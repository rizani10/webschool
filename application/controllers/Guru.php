<?php

defined('BASEPATH') or exit('No direct script access allowed');

class Guru extends CI_Controller
{

  public function __construct()
  {
    parent::__construct();
    cek_login();
    $this->load->model('G_model');
    $this->load->model('M_model');
  }

  public function index()
  {
    $data = [
      'title'  => 'Admin - Web Sekolah',
      'title2' => 'Data Guru',
      'user'   => $this->db->get_where(
        'tb_user',
        [
          'username' => $this->session->userdata('username')
        ]
      )->row_array(),  //session
      'guru' => $this->G_model->getGuru()
    ];

    $this->load->view('admin/templates/header', $data);
    $this->load->view('admin/templates/sidebar');
    $this->load->view('admin/templates/topbar');
    $this->load->view('admin/guru/index', $data);
    $this->load->view('admin/templates/footer');
  }

  public function tambah()
  {
    $data = [
      'title'  => 'Admin - Web Sekolah',
      'title2' => 'Form Tambah Data Guru',
      'user'   => $this->db->get_where(
        'tb_user',
        [
          'username' => $this->session->userdata('username')
        ]
      )->row_array(),  //session
      'mapel' =>  $this->M_model->detail()

    ];

    $this->form_validation->set_rules('nip', 'Nip', 'trim|required|numeric');
    $this->form_validation->set_rules('nama', 'Nama', 'trim|required');
    $this->form_validation->set_rules('tempat_lahir', 'Tempat Lahir', 'trim|required');
    $this->form_validation->set_rules('tgl_lahir', 'Tanggal Lahir', 'trim|required');
    $this->form_validation->set_rules('pendidikan', 'Pendidikan', 'trim|required');

    if ($this->form_validation->run() ==  FALSE) {
      $this->load->view('admin/templates/header', $data);
      $this->load->view('admin/templates/sidebar');
      $this->load->view('admin/templates/topbar');
      $this->load->view('admin/guru/tambah', $data);
      $this->load->view('admin/templates/footer');
    } else {
      $this->G_model->insert();
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
            Data Guru Berhasil di Tambah
          </div>
        </div>'
      );
      redirect('guru');
    }
  }

  public function edit($id_guru)
  {
    $data = [
      'title'  => 'Admin - Web Sekolah',
      'title2' => 'Form Tambah Data Guru',
      'user'   => $this->db->get_where(
        'tb_user',
        [
          'username' => $this->session->userdata('username')
        ]
      )->row_array(),  //session
      'mapel' =>  $this->M_model->detail(),
      // ambil data guru berdasarakn id
      'guru'  => $this->G_model->detail($id_guru)
    ];

    $this->form_validation->set_rules('nip', 'Nip', 'trim|required|numeric');
    $this->form_validation->set_rules('nama', 'Nama', 'trim|required');
    $this->form_validation->set_rules('tempat_lahir', 'Tempat Lahir', 'trim|required');
    $this->form_validation->set_rules('tgl_lahir', 'Tanggal Lahir', 'trim|required');
    $this->form_validation->set_rules('pendidikan', 'Pendidikan', 'trim|required');

    
    if ($this->form_validation->run() ==  FALSE) {
      $this->load->view('admin/templates/header', $data);
      $this->load->view('admin/templates/sidebar');
      $this->load->view('admin/templates/topbar');
      $this->load->view('admin/guru/edit', $data);
      $this->load->view('admin/templates/footer');
    } else {

      $foto = $_FILES['foto']['name'];
      if ($foto) {

        $config['upload_path'] = './assets/fotoguru/';
        $config['allowed_types'] = 'gif|jpg|png';
        $config['max_size']  = '2048';

        $this->load->library('upload', $config);

        if ($this->upload->do_upload('foto')) {
          $foto_lama = $data['guru']['foto'];
          unlink(FCPATH . 'assets/fotoguru/' . $foto_lama);
          $foto_baru = $this->upload->data('file_name');
          $this->db->set('foto', $foto_baru);
        } else {
          echo $this->upload->display_errors();
        }
      }
      $data = [
        'nip' => $this->input->post('nip', true),
        'nama' => $this->input->post('nama', true),
        'tempat_lahir' => $this->input->post('tempat_lahir', true),
        'tgl_lahir' => $this->input->post('tgl_lahir', true),
        'id_mapel' => $this->input->post('id_mapel', true),
        'pendidikan' => $this->input->post('pendidikan', true),
      ];

      $this->G_model->getEdit($data);
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
            Data Guru Berhasil di Ubah
          </div>
        </div>'
      );
      redirect('guru');
    }
  }

  public function hapus($id_guru)
  {
    // ambil data guru berdasarkan id
    $guru = $this->G_model->detail($id_guru);
    // hapus foto guru di dalam directory
    if ($guru['foto'] != "") {
      unlink(FCPATH . 'assets/fotoguru/' . $guru['foto']);
    }

    $this->db->delete('tb_guru', ['id_guru' => $id_guru]);
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
          Data Guru Berhasil di Hapus
        </div>
      </div>'
    );
    redirect('guru');
  }
}
