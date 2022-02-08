<?php

defined('BASEPATH') or exit('No direct script access allowed');

class Admin extends CI_Controller
{


  public function __construct()
  {
    parent::__construct();
    cek_login();
  }


  public function index()
  {
    $data = [
      'title'  => 'Admin - Web Sekolah',
      'title2' => 'Dashboard',
      'user'   => $this->db->get_where(
        'tb_user',
        [
          'username' => $this->session->userdata('username')
        ]
      )->row_array()  //session
    ];

    $this->load->view('admin/templates/header', $data);
    $this->load->view('admin/templates/sidebar');
    $this->load->view('admin/templates/topbar');
    $this->load->view('admin/home/index', $data);
    $this->load->view('admin/templates/footer');
  }

  public function logout()
  {

    $this->session->unset_userdata('username');
    $this->session->unset_userdata('id_user');
    $this->session->set_flashdata('pesan', '
      <div class="alert alert-danger alert-dismissible">
          <button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
          Kamu telah keluar dari aplikasi.
      </div>
    ');
    redirect('auth');
  }
}

/* End of file Admin.php */
