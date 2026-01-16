<?php
defined('BASEPATH') or exit('No direct script access allowed');

class MCups extends CI_Model
{

  public function __construct()
  {
    parent::__construct();

    $this->load->database();
  }
// It would be the CRUD functionality to update, save, delete, and list information about the patient from the table cups
  public function ver()
  {

    $consulta = $this->db->query("SELECT * FROM cups AS c WHERE c.cupEstado = 'ACTIVO'");

    return $consulta->result();
  }

 /* public function ver_sql()
  {

    $consulta = $this->db->query("SELECT * FROM usuario");

    return $consulta->result();
  }*/



  public function guardar($datos)
  {
    $consulta = $this->db->insert('cups', $datos);

    if ($consulta) {
      return true;
    } else {
      return null;
    }
  }
  public function recuperardatos($idCups)
  {

    $consulta = $this->db->query("SELECT * FROM cups WHERE idCups = $idCups");

    return $consulta->result();
  }

  public function actualizardatos($datos, $idCups)
  {
    $this->db->where('idCups', $idCups);
    $consulta = $this->db->update('cups', $datos);
    if ($consulta == true) {
      return true;
    } else {
      return false;
    }
  }

  public function eliminar($estado, $idCups)
  {
    $this->db->where('idCups', $idCups);
    $consulta = $this->db->update('cups', $estado);
    if ($consulta == true) {
      return true;
    } else {
      return false;
    }
  }
}
