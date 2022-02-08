<?php

defined('BASEPATH') or exit('No direct script access allowed');

class A_model extends CI_Model
{

  public function getLogin()
  {
    $username = $this->input->post('username');
    $password = $this->input->post('password');

    $user = $this->db->get_where('tb_user', ['username' => $username])->row_array();

    // cek username
    if ($user) {
      // jika username ditemukan cek password
      if (password_verify($password, $user['password'])) {
        // jika password benar buat session
        $data = [
          'username' => $user['username'],
          'id_user' => $user['id_user']
        ];

        $this->session->set_userdata($data);

        redirect('admin');
      } else {
        $this->session->set_flashdata('pesan', '
        <div class="alert alert-danger alert-dismissible">
            <button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
            Password dan username salah.
        </div>
        ');
        redirect('auth');
      }
    } else {
      $this->session->set_flashdata('pesan', '
      <div class="alert alert-danger alert-dismissible">
          <button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
          Password dan username salah.
      </div>
        ');
      redirect('auth');
    }
  }
}

/* End of file A_model.php */
