<?php

defined('BASEPATH') or exit('No direct script access allowed');

class Siswa_model extends CI_Model
{

  public function getSiswa()
  {
    return $this->db->get('tb_siswa')->result_array();
  }

  public function insertSiswa()
  {



    $config['upload_path'] = './assets/fotosiswa/';
    $config['allowed_types'] = 'gif|jpg|png';
    $config['max_size']  = '2048';

    $this->load->library('upload', $config);

    if (!$this->upload->do_upload('foto_siswa')) {
      $error = array('error' => $this->upload->display_errors());
      echo $error;
    } else {
      $foto_siswa = $this->upload->data();
      $foto_siswa = $foto_siswa['file_name'];
      $nisn = $this->input->post('nisn', true);
      $nama = $this->input->post('nama', true);
      $tempat_lahir = $this->input->post('tempat_lahir', true);
      $tgl_lahir = $this->input->post('tgl_lahir', true);
      $kelas = $this->input->post('kelas', true);

      $object = [
        'nisn' => $nisn,
        'nama' => $nama,
        'tempat_lahir' => $tempat_lahir,
        'tgl_lahir' => $tgl_lahir,
        'kelas' => $kelas,
        'foto_siswa' => $foto_siswa
      ];

      $this->db->insert('tb_siswa', $object);
    }
  }

  public function detail($id_siswa)
  {
    return $this->db->get_where('tb_siswa', ['id_siswa' => $id_siswa])->row_array();
  }

  public function getEdit($object)
  {
    $this->db->set($object);
    $this->db->where('id_siswa', $this->input->post('id_siswa'));
    $this->db->update('tb_siswa');
  }
}

/* End of file Siswa_model.php */
