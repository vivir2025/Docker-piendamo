<?php
defined('BASEPATH') or exit('No direct script access allowed');

class MProceso extends CI_Model
{

  public function __construct()
  {
    parent::__construct();

    $this->load->database();
  }
// Gets all the records from the 'proceso' table.
  public function ver()
  {

    $consulta = $this->db->query("SELECT * FROM proceso");

    return $consulta->result();
  }

}
