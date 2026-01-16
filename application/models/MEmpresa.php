<?php

defined('BASEPATH') or exit('No direct script access allowed');

class MEmpresa extends CI_Model
{
  // It would be the CRUD functionality to update, save, delete, and list information about the patient from the table empresa
  public function __construct()
  {

    parent::__construct();
    $this->load->database();
  }

  public function ver()
  {

    $consulta = $this->db->query("SELECT *

          FROM empresa AS e WHERE e.empEstado = 'ACTIVO'");

    return $consulta->result();
  }

   public function guardar($datos)
  {
    $consulta = $this->db->insert('empresa', $datos);

    if ($consulta) {
      return true;
    } else {
      return null;
    }
  }

  public function eliminar($estado, $idEmpresa)
  {
    $this->db->where('idEmpresa', $idEmpresa);
    $consulta = $this->db->update('empresa', $estado);
    if ($consulta == true) {
      return true;
    } else {
      return false;
    }
  }

  public function recuperardatos($idEmpresa)
  {

    $consulta = $this->db->query("SELECT * FROM empresa WHERE idEmpresa = $idEmpresa");

    return $consulta->result();
  }
  
  public function actualizardatos($datos, $idEmpresa)
  {
    $this->db->where('idEmpresa', $idEmpresa);
    $consulta = $this->db->update('empresa', $datos);
    if ($consulta == true) {
      return true;
    } else {
      return false;
    }
  }
}
