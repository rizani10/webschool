<?php

function cek_login()
{
  $CI = &get_instance();

  if (!$CI->session->userdata('username')) {
    $CI->session->set_flashdata('pesan', '
      <div class="alert alert-danger alert-dismissible">
          <button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
          Anda belum login, silahkan login !!! .
      </div>
    ');
    redirect('auth');
  }
}
