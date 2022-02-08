<?php

defined('BASEPATH') or exit('No direct script access allowed');

class Blog extends CI_Controller
{

  public function __construct()
  {
    parent::__construct();
    cek_login();
    $this->load->model('Blog_model');
  }

  public function index()
  {
    $data = [
      'title'  => 'Admin - Web Sekolah',
      'title2' => 'Blog',
      'user'   => $this->db->get_where(
        'tb_user',
        [
          'username' => $this->session->userdata('username')
        ]
      )->row_array(),  //session
      'blog' => $this->Blog_model->detail()
    ];

    $this->load->view('admin/templates/header', $data);
    $this->load->view('admin/templates/sidebar');
    $this->load->view('admin/templates/topbar');
    $this->load->view('admin/blog/index', $data);
    $this->load->view('admin/templates/footer');
  }

  public function tambah()
  {

    $data = [
      'title'  => 'Admin - Web Sekolah',
      'title2' => 'Form Tambah Blog',
      'user'   => $this->db->get_where(
        'tb_user',
        [
          'username' => $this->session->userdata('username')
        ]
      )->row_array() //session
    ];

    $this->form_validation->set_rules('judul_berita', 'Judul Berita', 'trim|required');
    $this->form_validation->set_rules('isi_berita', 'Isi Berita', 'trim|required');

    if ($this->form_validation->run() ==  FALSE) {
      $this->load->view('admin/templates/header', $data);
      $this->load->view('admin/templates/sidebar');
      $this->load->view('admin/templates/topbar');
      $this->load->view('admin/blog/tambah', $data);
      $this->load->view('admin/templates/footer');
    } else {

      $this->load->library('upload');
      $config['upload_path'] = './assets/fotoberita/';
      $config['allowed_types'] = 'gif|jpg|png|jpeg|bmp';
      $config['max_size'] = '1024';

      $this->upload->initialize($config);

      if ($_FILES['icon_berita']['name']) {
        if ($this->upload->do_upload('icon_berita')) {
          $gbr = $this->upload->data();
          $data = [
            'judul_berita' => $this->input->post('judul_berita'),
            'icon_berita' => $gbr['file_name'],
            'slug_berita' => url_title($this->input->post('judul_berita'), 'dash', true),
            'isi_berita'  => $this->input->post('isi_berita'),
            'tgl_berita' => date('Y-m-d h:i:s'),
            'id_user' => $this->session->userdata('id_user')
          ];

          $this->Blog_model->get_insert($data); //akses model untuk menyimpan ke database

          //pesan yang muncul jika berhasil diupload pada session flashdata
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
              Postingan Blog Berhasil di Posting
              </div>
            </div>'
          );
          redirect('blog');
        } else {
          //pesan yang muncul jika terdapat error dimasukkan pada session flashdata
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
              Blog gagal di posting
              </div>
            </div>'
          );
          redirect('blog/tambah');
        }
      }
    }
  }



  public function edit($id_berita)
  {
    $data = [
      'title'  => 'Admin - Web Sekolah',
      'title2' => 'Form Tambah Blog',
      'user'   => $this->db->get_where(
        'tb_user',
        [
          'username' => $this->session->userdata('username')
        ]
      )->row_array(), //session
      'blog' => $this->Blog_model->getWhere($id_berita)
    ];

    $this->form_validation->set_rules('judul_berita', 'Judul Berita', 'trim|required');
    $this->form_validation->set_rules('isi_berita', 'Isi Berita', 'trim|required');

    if ($this->form_validation->run() ==  FALSE) {
      $this->load->view('admin/templates/header', $data);
      $this->load->view('admin/templates/sidebar');
      $this->load->view('admin/templates/topbar');
      $this->load->view('admin/blog/edit', $data);
      $this->load->view('admin/templates/footer');
    } else {

      $foto = $_FILES['icon_berita']['name'];
      if ($foto) {
        $config['upload_path'] = './assets/fotoberita/';
        $config['allowed_types'] = 'gif|jpg|png|jpeg|bmp';
        $config['max_size'] = '1024';

        $this->load->library('upload', $config);

        if ($this->upload->do_upload('icon_berita')) {
          $foto_lama = $data['blog']['icon_berita'];
          unlink(FCPATH . 'assets/fotoberita/' . $foto_lama);
          $foto_baru = $this->upload->data('file_name');
          $this->db->set('icon_berita', $foto_baru);
        } else {
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
              Blog gagal di Edit
              </div>
            </div>'
          );
          redirect('blog/edit/' . $id_berita);
        }
      }
      $data = [
        'judul_berita' => $this->input->post('judul_berita', true),
        'slug_berita' => url_title($this->input->post('judul_berita'), 'dash', true),
        'isi_berita' => $this->input->post('isi_berita'),
        'id_user' => $this->session->userdata('id_user')
      ];
      $this->Blog_model->getEdit($data);
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
            Blog Berhasil di Posting
            </div>
          </div>'
      );
      redirect('blog');
    }
  }





  // public function edit($id_berita)
  // {
  //   $data = [
  //     'title'  => 'Admin - Web Sekolah',
  //     'title2' => 'Form Tambah Blog',
  //     'user'   => $this->db->get_where(
  //       'tb_user',
  //       [
  //         'username' => $this->session->userdata('username')
  //       ]
  //     )->row_array(), //session
  //     'blog' => $this->Blog_model->getWhere($id_berita)
  //   ];

  //   $this->form_validation->set_rules('judul_berita', 'Judul Berita', 'trim|required');
  //   $this->form_validation->set_rules('isi_berita', 'Isi Berita', 'trim|required');

  //   if ($this->form_validation->run() ==  FALSE) {
  //     $this->load->view('admin/templates/header', $data);
  //     $this->load->view('admin/templates/sidebar');
  //     $this->load->view('admin/templates/topbar');
  //     $this->load->view('admin/blog/edit', $data);
  //     $this->load->view('admin/templates/footer');
  //   } else {
  //     $this->Blog_model->getEdit();
  //     $this->session->set_flashdata(
  //       'pesan',
  //       '<div class="alert alert-success alert-dismissible" role="alert">
  //           <button type="button" class="close" data-dismiss="alert" aria-label="Close">
  //             <span aria-hidden="true">&times;</span>
  //           </button>
  //           <div class="alert-icon">
  //             <i class="far fa-fw fa-bell"></i>
  //           </div>
  //           <div class="alert-message">
  //             Blog Berhasil di Edit
  //           </div>
  //         </div>'
  //     );
  //     redirect('blog');
  //   }
  // }

  public function hapus($id_berita)
  {
    $this->db->delete('berita', ['id_berita' => $id_berita]);

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
        Postingan Blog Berhasil di Hapus
        </div>
      </div>'
    );
    redirect('blog');
  }
}

/* End of file Blog.php */
