<?php

defined('BASEPATH') or exit('No direct script access allowed');

class MTipoDocumento extends CI_Model
{

  public function __construct()
  {

    parent::__construct();
    $this->load->database();
  }
// Gets all the records from the 'tipo_documento' table.
  public function ver()
  {

    $consulta = $this->db->query("SELECT *

          FROM tipo_documento");

    return $consulta->result();
  }
}
