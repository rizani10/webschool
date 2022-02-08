<?php

defined('BASEPATH') or exit('No direct script access allowed');

class G_model extends CI_Model
{
  public function getGuru()
  {
    $query = "SELECT * FROM `tb_guru` JOIN `mapel`
            ON `tb_guru`.`id_mapel` = `mapel`.`id_mapel`
        ";

    return $this->db->query($query)->result_array();
  }

  public function insert()
  {

    // upload gambar

    $config['upload_path'] = './assets/fotoguru/';
    $config['allowed_types'] = 'gif|jpg|png';
    $config['max_size']  = '3000';

    $this->load->library('upload', $config);

    if (!$this->upload->do_upload('foto')) {
      $error = array('error' => $this->upload->display_errors());
      echo $error;
    } else {
      $foto = $this->upload->data();
      $foto = $foto['file_name'];
      $nip = $this->input->post('nip', true);
      $nama = $this->input->post('nama', true);
      $tempat_lahir = $this->input->post('tempat_lahir', true);
      $tgl_lahir = $this->input->post('tgl_lahir', true);
      $id_mapel = $this->input->post('id_mapel', true);
      $pendidikan = $this->input->post('pendidikan', true);

      $data = [
        'nip' => $nip,
        'nama' => $nama,
        'tempat_lahir' => $tempat_lahir,
        'tgl_lahir' => $tgl_lahir,
        'id_mapel' => $id_mapel,
        'pendidikan' => $pendidikan,
        'foto' => $foto
      ];

      $this->db->insert('tb_guru', $data);
    }
  }

  public function detail($id_guru)
  {
    $query = "SELECT * FROM `tb_guru` JOIN `mapel`
            ON `tb_guru`.`id_mapel` = `mapel`.`id_mapel`
            WHERE `id_guru` = $id_guru
        ";

    return $this->db->query($query)->row_array();
  }
  

  public function getEdit($data)
  {
    $this->db->set($data);
    $this->db->where('id_guru', $this->input->post('id_guru'));
    $this->db->update('tb_guru');
  }
}
