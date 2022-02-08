<?php

defined('BASEPATH') or exit('No direct script access allowed');

class Blog_model extends CI_Model
{

  public function get_insert($data)
  {
    $this->db->insert('berita', $data);
    
  }

  public function  detail()
  {
    $this->db->select('*');
    $this->db->from('berita');
    $this->db->join('tb_user', 'tb_user.id_user = berita.id_user', 'left');
    $this->db->order_by('id_berita', 'asc');
    return $this->db->get()->result_array();
  }

  public function getWhere($id_berita)
  {
    $this->db->select('*');
    $this->db->from('berita');
    $this->db->where('id_berita', $id_berita);
    return $this->db->get()->row_array();
  }

  // public function getEdit()
  // {
  //   $object = [
  //     'judul_berita' => $this->input->post('judul_berita', true),
  //     'slug_berita' => url_title($this->input->post('judul_berita'), 'dash', true),
  //     'isi_berita' => $this->input->post('isi_berita'),
  //     'id_user' => $this->session->userdata('id_user')
  //   ];

  //   $this->db->where('id_berita', $this->input->post('id_berita'));
  //   $this->db->update('berita', $object);
  // }

  public function getEdit($data)
  {
    $this->db->set($data);
    $this->db->where('id_berita', $this->input->post('id_berita'));
    $this->db->update('berita');
    
  }
}

/* End of file Blog_model.php */
