<?php

defined('BASEPATH') or exit('No direct script access allowed');

class MTipoParentesco extends CI_Model
{

  public function __construct()
  {

    parent::__construct();
    $this->load->database();
  }
// Gets all the records from the 'tipo_parentesco' table.
  public function ver()
  {

    $consulta = $this->db->query("SELECT *

          FROM tipo_parentesco");

    return $consulta->result();
  }
}
