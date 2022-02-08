<?php 

defined('BASEPATH') OR exit('No direct script access allowed');

class M_home extends CI_Model 
{

  public function getDownload()
  {
    $this->db->select('*');
    $this->db->from('tb_file');
    $this->db->order_by('id_file', 'desc');
    return $this->db->get()->result_array();
    
  }

  public function getGuru()
  {
    $this->db->select('*');
    $this->db->from('tb_guru');
    $this->db->join('mapel', 'mapel.id_mapel = tb_guru.id_mapel', 'left');
    $this->db->order_by('id_guru', 'desc');
    return $this->db->get()->result_array();
  }

  // get berita dengan pagination
  public function getBlog($limit, $start)
  {
    $this->db->select('*');
    $this->db->from('berita');
    $this->db->join('tb_user', 'tb_user.id_user = berita.id_user', 'left');
    $this->db->order_by('id_berita', 'desc');
    $this->db->limit($limit, $start);
    return $this->db->get()->result_array();
  }

  public function getAllBlog()
  {
    $this->db->select('*');
    $this->db->from('berita');
    $this->db->join('tb_user', 'tb_user.id_user = berita.id_user', 'left');
    $this->db->order_by('id_berita', 'desc');
    return $this->db->get()->result_array();
  }

  public function getDetailBlog($slug_berita)
  {
    $this->db->select('*');
    $this->db->from('berita');
    $this->db->join('tb_user', 'tb_user.id_user = berita.id_user', 'left');
    $this->db->where('slug_berita', $slug_berita);
    return $this->db->get()->row_array();
  }

}

/* End of file M_home.php */

?>