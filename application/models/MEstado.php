<?php

defined('BASEPATH') or exit('No direct script access allowed');

class MEstado extends CI_Model
{

  public function __construct()
  {

    parent::__construct();
    $this->load->database();
  }
// Gets all the records from the 'estado' table.
  public function ver()
  {

    $consulta = $this->db->query("SELECT *

          FROM estado");

    return $consulta->result();
  }
}
