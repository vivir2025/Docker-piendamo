<?php

defined('BASEPATH') OR exit('No direct script access allowed');

class MMunicipio extends CI_Model {

  public function __construct() {
  
    parent::__construct();
    $this->load->database();
  }
  // Gets all the records from the 'municipio' table.
    public function ver() {

        $consulta = $this->db->query("SELECT *

          FROM municipio");

        return $consulta->result();
    }

    public function consultar_municipio($idDepartmento) {

        $consulta = $this->db->query("SELECT *

          FROM municipio
          WHERE departamento_idDepartamento = $idDepartmento");

        return $consulta->result();
    }
    function getMunicipio($postData = array())
    {

        $response = array();

        if (isset($postData['idDepartamento'])) {

            // Select record
            $this->db->select('*');
            $this->db->where('departamento_idDepartamento', $postData['idDepartamento']);
            $records = $this->db->get('municipio');
            $response = $records->result_array();
        }

        return $response;
    }
}
