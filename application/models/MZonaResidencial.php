<?php

defined('BASEPATH') or exit('No direct script access allowed');

class MZonaResidencial extends CI_Model
{

  public function __construct()
  {

    parent::__construct();
    $this->load->database();
  }
  // Gets all the records from the 'zona_residencial' table.

  public function ver()
  {

    $consulta = $this->db->query("SELECT *

          FROM zona_residencial");

    return $consulta->result();
  }
}
