<?php



defined('BASEPATH') or exit('No direct script access allowed');

class D_model extends CI_Model

{

  public function getAll()
  {
    $this->db->select('*');
    $this->db->from('tb_file');
    $this->db->order_by('id_file', 'desc');
    return $this->db->get()->result_array();
  }

  public function getWhere($id_file)
  {
    $this->db->select('*');
    $this->db->from('tb_file');
    $this->db->where('id_file', $id_file);
    return $this->db->get()->row_array();
    
    
  }

  public function insertFile()
  {

    $config['upload_path'] = './assets/berkas';
    $config['allowed_types'] = 'pdf|doc|docx|ppt|pptx';
    $config['max_size']  = '2000';
    $config['file_name'] = 'file' . date('Y-m-d');

    $this->load->library('upload', $config);

    if ($this->upload->do_upload('file')) {
      $data = [
        'nama_file' => $this->input->post('nama_file', true),
        'file' => $this->upload->data('file_name'),
        'tgl_upload' => date('Y-m-d h:i:s')
      ];

      if ($this->db->insert('tb_file', $data)) {
        $this->session->set_flashdata(
          'pesan',
          '<div class="alert alert-success alert-dismissible" role="alert">
              <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                <span aria-hidden="true">&times;</span>
              </button>
              <div class="alert-icon">
                <i class="far fa-fw fa-bell"></i>
              </div>
              <div class="alert-message">
                Blog Berhasil di Posting
              </div>
            </div>'
        );
      } else {
        $this->session->set_flashdata(
          'error',
          '<div class="alert alert-success alert-dismissible" role="alert">
              <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                <span aria-hidden="true">&times;</span>
              </button>
              <div class="alert-icon">
                <i class="far fa-fw fa-bell"></i>
              </div>
              <div class="alert-message">
                Blog gagal di Posting
              </div>
            </div>'
        );
      }
      redirect('download');
    } else {
      // $file = $this->upload->data();
      // $file = $file['file_name'];
      // $nama_file = $this->input->post('nama_file', true);
      $this->session->set_flashdata('error', $this->upload->display_errors());
      redirect('download');
    }
  }
}

/* End of file D_model.php */
