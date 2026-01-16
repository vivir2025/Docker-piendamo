<?php
defined('BASEPATH') or exit('No direct script access allowed');

class MContrato extends CI_Model
{

  public function __construct()
  {
    parent::__construct();

    $this->load->database();
  }
  // It would be the CRUD functionality to update, save, delete, and list information about the patient from the table contrato
  public function ver()
  {

    $consulta = $this->db->query("SELECT * FROM contrato AS c
      INNER JOIN empresa AS e ON e.idEmpresa = c.empresa_idEmpresa");

    return $consulta->result();
  }

  public function guardar($datos)
  {
    $consulta = $this->db->insert('contrato', $datos);

    if ($consulta) {
      return true;
    } else {
      return null;
    }
  }
  public function eliminar($estado, $idContrato)
  {
    $this->db->where('idContrato', $idContrato);
    $consulta = $this->db->update('contrato', $estado);
    if ($consulta == true) {
      return true;
    } else {
      return false;
    }
  }
  public function recuperardatos($idContrato)
  {

    $consulta = $this->db->query("SELECT * FROM contrato WHERE idContrato = $idContrato");

    return $consulta->result();
  }

  public function actualizardatos($datos, $idContrato)
  {
    $this->db->where('idContrato', $idContrato);
    $consulta = $this->db->update('contrato', $datos);
    if ($consulta == true) {
      return true;
    } else {
      return false;
    }
  }

  public function get_data_contrato($idEmpresa)
  {

    $consulta = $this->db->query("SELECT * FROM contrato AS c
      INNER JOIN empresa AS e ON e.idEmpresa = c.empresa_idEmpresa
      WHERE c.empresa_idEmpresa = $idEmpresa");

    return $consulta->result();
  }

  public function detalle_contrato($idContrato)
  {

    $consulta = $this->db->query("

      SELECT * FROM cups_contratado AS cp
      INNER JOIN contrato AS c ON c.idContrato = cp.contrato_idContrato 
      INNER JOIN empresa AS e ON e.idEmpresa = c.empresa_idEmpresa

      WHERE c.idContrato = $idContrato");


    if ($consulta->num_rows() > 0) {
      return $consulta->result();
    } else {
      return false;
    }

  }

}
