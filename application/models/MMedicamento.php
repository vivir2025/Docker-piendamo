<?php

defined('BASEPATH') OR exit('No direct script access allowed');

class MMedicamento extends CI_Model {

  public function __construct() {
  
    parent::__construct();
    $this->load->database();
  }
// Gets all the records from the 'medicamento' table.
  public function guardar($data_medicamento)
  {
    $consulta = $this->db->insert('medicamento', $data_medicamento);


    return $this->db->insert_id();;
  }
}
