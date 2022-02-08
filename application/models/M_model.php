<?php

defined('BASEPATH') or exit('No direct script access allowed');

class M_model extends CI_Model
{

  public function detail()
  {
    return $this->db->get('mapel')->result_array();
  }

  public function insert()
  {
    $object = [
      'mapel' => htmlspecialchars($this->input->post('mapel'), TRUE)
    ];

    $this->db->insert('mapel', $object);
  }

  public function getEdit()
  {
    $object = [
      'mapel' => htmlspecialchars($this->input->post('mapel'), TRUE)
    ];

    $this->db->where('id_mapel', $this->input->post('id_mapel'));
    $this->db->update('mapel', $object);
    
  }
}

/* End of file M_model.php */
