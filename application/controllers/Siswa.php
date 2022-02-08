<?php

defined('BASEPATH') or exit('No direct script access allowed');

class Siswa extends CI_Controller
{

  public function __construct()
  {
    parent::__construct();
    cek_login();
    $this->load->model('Siswa_model');
  }


  public function index()
  {
    $data = [
      'title'  => 'Admin - Web Sekolah',
      'title2' => 'Data Siswa',
      'user'   => $this->db->get_where(
        'tb_user',
        [
          'username' => $this->session->userdata('username')
        ]
      )->row_array(),  //session
      'siswa' => $this->Siswa_model->getSiswa()
    ];

    $this->load->view('admin/templates/header', $data);
    $this->load->view('admin/templates/sidebar');
    $this->load->view('admin/templates/topbar');
    $this->load->view('admin/siswa/index', $data);
    $this->load->view('admin/templates/footer');
  }

  public function tambah()
  {
    $data = [
      'title'  => 'Admin - Web Sekolah',
      'title2' => 'Data Siswa',
      'user'   => $this->db->get_where(
        'tb_user',
        [
          'username' => $this->session->userdata('username')
        ]
      )->row_array()  //session
    ];

    $this->form_validation->set_rules('nisn', 'NISN', 'trim|required|numeric');
    $this->form_validation->set_rules('nama', 'Nama', 'trim|required');
    $this->form_validation->set_rules('tempat_lahir', 'Tempat Lahir', 'trim|required');
    $this->form_validation->set_rules('tgl_lahir', 'Tanggal Lahir', 'trim|required');
    $this->form_validation->set_rules('kelas', 'Kelas', 'trim|required');

    if ($this->form_validation->run() ==  FALSE) {
      $this->load->view('admin/templates/header', $data);
      $this->load->view('admin/templates/sidebar');
      $this->load->view('admin/templates/topbar');
      $this->load->view('admin/siswa/tambah', $data);
      $this->load->view('admin/templates/footer');
    } else {
      $this->Siswa_model->insertSiswa();
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
            Data Siswa Berhasil di Tambah
          </div>
        </div>'
      );
      redirect('siswa');
    }
  }

  
  public function edit($id_siswa)
  {
    $data = [
      'title'  => 'Admin - Web Sekolah',
      'title2' => 'Data Siswa',
      'user'   => $this->db->get_where(
        'tb_user',
        [
          'username' => $this->session->userdata('username')
        ]
      )->row_array(),  //session
      'siswa' => $this->Siswa_model->detail($id_siswa)
    ];

    $this->form_validation->set_rules('nisn', 'NISN', 'trim|required|numeric');
    $this->form_validation->set_rules('nama', 'Nama', 'trim|required');
    $this->form_validation->set_rules('tempat_lahir', 'Tempat Lahir', 'trim|required');
    $this->form_validation->set_rules('tgl_lahir', 'Tanggal Lahir', 'trim|required');
    $this->form_validation->set_rules('kelas', 'Kelas', 'trim|required');

    if ($this->form_validation->run() ==  FALSE) {
      $this->load->view('admin/templates/header', $data);
      $this->load->view('admin/templates/sidebar');
      $this->load->view('admin/templates/topbar');
      $this->load->view('admin/siswa/edit', $data);
      $this->load->view('admin/templates/footer');
    } else {

      $foto = $_FILES['foto_siswa']['name'];
      if ($foto) {

        $config['upload_path'] = './assets/fotosiswa/';
        $config['allowed_types'] = 'gif|jpg|png|jpeg';
        $config['max_size']  = '2048';

        $this->load->library('upload', $config);

        if ($this->upload->do_upload('foto_siswa')) {
          $foto_lama = $data['siswa']['foto_siswa'];
          unlink(FCPATH . 'assets/fotosiswa/' . $foto_lama);
          $foto_baru = $this->upload->data('file_name');
          $this->db->set('foto_siswa', $foto_baru);
        } else {
          echo $this->upload->display_errors();
        }
      }
      $object = [
        'nisn' => $this->input->post('nisn', true),
        'nama' => $this->input->post('nama', true),
        'tempat_lahir' => $this->input->post('tempat_lahir', true),
        'tgl_lahir' => $this->input->post('tgl_lahir', true),
        'kelas' => $this->input->post('kelas', true),
      ];
      $this->Siswa_model->getEdit($object);
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
            Data Siswa Berhasil di Edit
          </div>
        </div>'
      );
      redirect('siswa');
    }
  }

  public function hapus($id_siswa)
  {
    // ambil data siswa berdasarkan id
    $siswa = $this->Siswa_model->detail($id_siswa);
    // hapus foto siswa di dalam directory
    if ($siswa['foto_siswa'] != "") {
      unlink(FCPATH . 'assets/fotosiswa/' . $siswa['foto_siswa']);
    }

    $this->db->delete('tb_siswa', ['id_siswa' => $id_siswa]);
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
          Data siswa Berhasil di Hapus
        </div>
      </div>'
    );
    redirect('siswa');
  }
}

/* End of file Siswa.php */
