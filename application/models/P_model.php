<?php

defined('BASEPATH') or exit('No direct script access allowed');

class P_model extends CI_Model
{

  public function getAll()
  {
    return $this->db->get('tb_pengumuman')->result_array();
  }

  public function insert()
  {
    $object = [
      'judul_pengumuman' => $this->input->post('judul_pengumuman', true),
      'isi_pengumuman' => $this->input->post('isi_pengumuman', true),
      'tgl_dibuat' => date('Y-m-d')
    ];

    $this->db->insert('tb_pengumuman', $object);
  }

  public function getEdit()
  {
    $object = [
      'judul_pengumuman' => $this->input->post('judul_pengumuman', true),
      'isi_pengumuman' => $this->input->post('isi_pengumuman', true)
    ];

    $this->db->where('id_pengumuman', $this->input->post('id_pengumuman'));
    $this->db->update('tb_pengumuman', $object);
  }
}

/* End of file P_model.php */
