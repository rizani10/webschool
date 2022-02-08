<?php

defined('BASEPATH') or exit('No direct script access allowed');

class Download extends CI_Controller
{


  public function __construct()
  {
    parent::__construct();
    cek_login();
    $this->load->model('D_model');
    
  }

  public function index()
  {
    $data = [
      'title'  => 'Admin - Web Sekolah',
      'title2' => 'Halaman Upload Berkas',
      'user'   => $this->db->get_where(
        'tb_user',
        [
          'username' => $this->session->userdata('username')
        ]
      )->row_array(),  //session
      'download' => $this->D_model->getAll()
    ];

    $this->load->view('admin/templates/header', $data);
    $this->load->view('admin/templates/sidebar');
    $this->load->view('admin/templates/topbar');
    $this->load->view('admin/download/index', $data);
    $this->load->view('admin/templates/footer');
  }

  public function add()
  {
    $data = [
      'title'  => 'Admin - Web Sekolah',
      'title2' => 'Halaman Upload Berkas',
      'user'   => $this->db->get_where(
        'tb_user',
        [
          'username' => $this->session->userdata('username')
        ]
      )->row_array()  //session
    ];

    $this->form_validation->set_rules('nama_file', 'Keterangan File', 'trim|required');
    
    if ($this->form_validation->run() == FALSE) {
      $this->load->view('admin/templates/header', $data);
      $this->load->view('admin/templates/sidebar');
      $this->load->view('admin/templates/topbar');
      $this->load->view('admin/download/tambah', $data);
      $this->load->view('admin/templates/footer');
    } else {
      $this->D_model->insertFile();
      // $this->session->set_flashdata(
      //   'pesan',
      //   '<div class="alert alert-success alert-dismissible" role="alert">
      //       <button type="button" class="close" data-dismiss="alert" aria-label="Close">
      //         <span aria-hidden="true">&times;</span>
      //       </button>
      //       <div class="alert-icon">
      //         <i class="far fa-fw fa-bell"></i>
      //       </div>
      //       <div class="alert-message">
      //         Blog Berhasil di Posting
      //       </div>
      //     </div>'
      // );
      // redirect('download');
    }
  }

  // fungsi download
  public function file($id_file)
  {
    $data = $this->D_model->getWhere($id_file);
    force_download('assets/berkas/' . $data['file'],null);
  }

  public function hapus($id_file)
  {
    // ambil data guru berdasarkan id
    $file = $this->D_model->getWhere($id_file);
    // hapus foto file di dalam directory
    if ($file['file'] != "") {
      unlink(FCPATH . 'assets/berkas/' . $file['file']);
    }

    $this->db->delete('tb_file', ['id_file' => $id_file]);
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
          Berkas Berhasil di Hapus
        </div>
      </div>'
    );
    redirect('download');
  }
}

/* End of file Download.php */
