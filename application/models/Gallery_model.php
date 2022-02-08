<?php

defined('BASEPATH') or exit('No direct script access allowed');

class Gallery_model extends CI_Model
{

  public function getAll()
  {
    $this->db->select('gallery.*, count(foto.id_gallery) as jml_foto');
    $this->db->from('gallery');
    $this->db->join('foto', 'foto.id_gallery = gallery.id_gallery', 'left');
    $this->db->group_by('gallery.id_gallery');
    $this->db->order_by('gallery.id_gallery', 'asc');
    return $this->db->get()->result_array();
  }

  public function getWhere($id_gallery)
  {
    $this->db->select('*');
    $this->db->from('gallery');
    $this->db->where('id_gallery', $id_gallery);
    return $this->db->get()->row_array();
  }

  public function insert()
  {
    // upload gambar

    $config['upload_path'] = './assets/gallery/';
    $config['allowed_types'] = 'gif|jpg|png';
    $config['max_size']  = '3000';

    $this->load->library('upload', $config);

    if (!$this->upload->do_upload('sampul')) {
      $error = array('error' => $this->upload->display_errors());
      echo $error;
      
    } else {
      $sampul = $this->upload->data();
      $sampul = $sampul['file_name'];
      $nama_gallery = $this->input->post('nama_gallery', true);

      $data = [
        'nama_gallery' => $nama_gallery,
        'sampul' => $sampul
      ];

      $this->db->insert('gallery', $data);
    }

  }

  public function getEdit($data)
  {
    $this->db->set($data);
    $this->db->where('id_gallery', $this->input->post('id_gallery'));
    $this->db->update('gallery');
  }

  public function insertFoto($id_gallery)
  {
    // upload gambar

    $config['upload_path'] = './assets/foto/';
    $config['allowed_types'] = 'gif|jpg|png';
    $config['max_size']  = '1024';

    $this->load->library('upload', $config);

    if (!$this->upload->do_upload('foto')) {
      $error = array('error' => $this->upload->display_errors());
      echo $error;
    } else {
      $foto = $this->upload->data();
      $foto = $foto['file_name'];

      $ket_foto = $this->input->post('ket_foto', true);

      $data = [
        'id_gallery' => $id_gallery,
        'ket_foto' => $ket_foto,
        'foto' => $foto
      ];

      $this->db->insert('foto', $data);
    }
  }

  // fungsi menampilkan data foto berdasarkan galeri
  public function list_foto($id_gallery)
  {
    $this->db->select('*');
    $this->db->from('foto');
    $this->db->where('id_gallery', $id_gallery);
    $this->db->order_by('id_gallery', 'desc');
    return $this->db->get()->result_array();
  }

  // fungsi memilih foto berdasarkan id foto
  public function detail_foto($id_foto)
  {
    $this->db->select('*');
    $this->db->from('foto');
    $this->db->where('id_foto', $id_foto);
    return $this->db->get()->row_array();
  }
}

/* End of file Gallery_model.php */
