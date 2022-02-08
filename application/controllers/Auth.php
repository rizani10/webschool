<?php

defined('BASEPATH') or exit('No direct script access allowed');

class Auth extends CI_Controller
{
  public function __construct()
  {
    parent::__construct();
    $this->load->model('A_model');
  }


  public function index()
  {
    $data = [
      'title'  => 'Admin - Web Sekolah',
      // 'title2' => 'Dashboard'
    ];

    $this->form_validation->set_rules('username', 'Username', 'required|trim');
    $this->form_validation->set_rules('password', 'Password', 'required|trim');


    if ($this->form_validation->run() == FALSE) {
      $this->load->view('admin/auth/index', $data);
    } else {
      $this->A_model->getLogin();
    }
  }
}

/* End of file Auth.php */
