<?php

defined('BASEPATH') OR exit('No direct script access allowed');

class MDepartamento extends CI_Model {

  public function __construct() {
  
    parent::__construct();
    $this->load->database();
  }

   /*public function ver() {

        $consulta = $this->db->query("SELECT *

          FROM departamento");

        return $consulta->result();
    }*/
    // It would be the CRUD functionality to update, save, delete, and list information about the patient from the table departamento
    public function ver()
    {

        $this->db->select('*');
        $records = $this->db->get('departamento');
        $departamento = $records->result_array();
        return $departamento;
    }
}
