<?php

defined('BASEPATH') or exit('No direct script access allowed');

class Gallery extends CI_Controller
{


  public function __construct()
  {
    parent::__construct();
    cek_login();
    $this->load->model('Gallery_model');
  }


  public function index()
  {
    $data = [
      'title'  => 'Admin - Web Sekolah',
      'title2' => 'Gallery Foto',
      'gallery' => $this->Gallery_model->getAll(),
      'user'   => $this->db->get_where(
        'tb_user',
        [
          'username' => $this->session->userdata('username')
        ]
      )->row_array(),  //session
      'gallery' => $this->Gallery_model->getAll()
    ];

    $this->load->view('admin/templates/header', $data);
    $this->load->view('admin/templates/sidebar');
    $this->load->view('admin/templates/topbar');
    $this->load->view('admin/gallery/index', $data);
    $this->load->view('admin/templates/footer');
  }


  public function tambah()
  {
    $data = [
      'title'  => 'Admin - Web Sekolah',
      'title2' => 'Gallery Foto',
      'gallery' => $this->Gallery_model->getAll(),
      'user'   => $this->db->get_where(
        'tb_user',
        [
          'username' => $this->session->userdata('username')
        ]
      )->row_array()  //session

    ];

    $this->form_validation->set_rules('nama_gallery', 'Nama Gallery', 'trim|required');


    if ($this->form_validation->run() ==  FALSE) {
      $this->load->view('admin/templates/header', $data);
      $this->load->view('admin/templates/sidebar');
      $this->load->view('admin/templates/topbar');
      $this->load->view('admin/gallery/tambah', $data);
      $this->load->view('admin/templates/footer');
    } else {
      $this->Gallery_model->insert();
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
          Data Gallery Berhasil di Edit
        </div>
      </div>'
      );
      redirect('gallery');
    }
  }

  public function edit($id_gallery)
  {
    $data = [
      'title'  => 'Admin - Web Sekolah',
      'title2' => 'Gallery Foto',
      'gallery' => $this->Gallery_model->getAll(),
      'user'   => $this->db->get_where(
        'tb_user',
        [
          'username' => $this->session->userdata('username')
        ]
      )->row_array(),  //session
      'gallery' => $this->Gallery_model->getWhere($id_gallery)

    ];

    $this->form_validation->set_rules('nama_gallery', 'Nama Gallery', 'trim|required');


    if ($this->form_validation->run() ==  FALSE) {
      $this->load->view('admin/templates/header', $data);
      $this->load->view('admin/templates/sidebar');
      $this->load->view('admin/templates/topbar');
      $this->load->view('admin/gallery/edit', $data);
      $this->load->view('admin/templates/footer');
    } else {

      $sampul = $_FILES['sampul']['name'];
      if ($sampul) {
        $config['upload_path'] = './assets/gallery/';
        $config['allowed_types'] = 'gif|jpg|png';
        $config['max_size']  = '2000';

        $this->load->library('upload', $config);

        if ($this->upload->do_upload('sampul')) {
          $foto_lama = $data['gallery']['sampul'];
          unlink(FCPATH . 'assets/gallery/' . $foto_lama);
          $foto_baru = $this->upload->data('file_name');
          $this->db->set('sampul', $foto_baru);
        } else {
          echo $this->upload->display_errors();
        }
      }

      $data = [
        'nama_gallery' => $this->input->post('nama_gallery', true)
      ];

      $this->Gallery_model->getEdit($data);
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
          Data Gallery Berhasil di Edit
        </div>
      </div>'
      );
      redirect('gallery');
    }
  }

  public function hapus($id_gallery)
  {
    // ambil data guru berdasarkan id
    $gallery = $this->Gallery_model->getWhere($id_gallery);
    // hapus foto gallery di dalam directory
    if ($gallery['sampul'] != "") {
      unlink(FCPATH . 'assets/gallery/' . $gallery['sampul']);
    }

    $this->db->delete('gallery', ['id_gallery' => $id_gallery]);
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
        Data Gallery Berhasil di Hapus
      </div>
    </div>'
    );
    redirect('gallery');
  }

  public function add_foto($id_gallery)
  {
    $gallery = $this->Gallery_model->getWhere($id_gallery);
    $data = [
      'title'  => 'Admin - Web Sekolah',
      'title2' => 'Gallery Foto : ' . $gallery['nama_gallery'],
      'gallery' => $this->Gallery_model->getAll(),
      'user'   => $this->db->get_where(
        'tb_user',
        [
          'username' => $this->session->userdata('username')
        ]
      )->row_array(),  //session
      'gallery' => $this->Gallery_model->getWhere($id_gallery),
      'foto'    => $this->Gallery_model->list_foto($id_gallery)
    ];

    $this->form_validation->set_rules('ket_foto', 'Keterangan Foto', 'trim|required');


    if ($this->form_validation->run() == FALSE) {
      $this->load->view('admin/templates/header', $data);
      $this->load->view('admin/templates/sidebar');
      $this->load->view('admin/templates/topbar');
      $this->load->view('admin/gallery/add_foto', $data);
      $this->load->view('admin/templates/footer');
    } else {
      $this->Gallery_model->insertFoto($id_gallery);
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
          Foto  Berhasil di Tambah
        </div>
      </div>'
      );
      redirect('gallery/add_foto/' . $gallery['id_gallery']);
    }
  }

  public function hapus_foto($id_gallery, $id_foto)
  {
    // ambil data guru berdasarkan id
    $foto = $this->Gallery_model->detail_foto($id_foto);
    // hapus foto gallery di dalam directory
    if ($foto['foto'] != "") {
      unlink(FCPATH . 'assets/foto/' . $foto['foto']);
    }

    $this->db->delete('foto', ['id_foto' => $id_foto]);
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
        Data Foto Berhasil di Hapus
      </div>
    </div>'
    );
    redirect('gallery/add_foto/' . $id_gallery);
  }
}
