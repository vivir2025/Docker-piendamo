<?php

defined('BASEPATH') or exit('No direct script access allowed');

class MPaciente extends CI_Model
{

  public function __construct()
  {

    parent::__construct();
    $this->load->database();
  }
  // It would be the CRUD functionality to update, save, delete, and list information about the patient from the table paciente
  public function ver()
  {

    $consulta = $this->db->query("SELECT * FROM paciente AS p
      INNER JOIN empresa AS e ON e.idEmpresa = p.empresa_idEmpresa
      INNER JOIN tipo_afiliciacion AS ta ON ta.tip_afi = p.id_tipo_afiliacion
      INNER JOIN novedad AS nov ON nov.idnovedad = p.novedad_idnovedad");

    return $consulta->result();
  }

  public function guardar($datos)
  {
    $consulta = $this->db->insert('paciente', $datos);

    if ($consulta) {
      return true;
    } else {
      return null;
    }
  }

  public function eliminar($estado, $idPaciente)
  {
    $this->db->where('idPaciente', $idPaciente);
    $consulta = $this->db->update('paciente', $estado);
    if ($consulta == true) {
      return true;
    } else {
      return false;
    }
  }

  public function recuperardatos($idPaciente)
  {

    $consulta = $this->db->query("SELECT * FROM paciente as pac
      INNER JOIN tipo_documento AS tp ON tp.idTipDocumento = pac.pacTipDocumento
      INNER JOIN departamento AS d ON d.idDepartamento  = pac.depto_residencia
      INNER JOIN municipio AS m ON m.idMunicipio  = pac.municipio_residencia
      INNER JOIN empresa AS e ON e.idEmpresa = pac.empresa_idEmpresa
      INNER JOIN zona_residencial AS zr ON zr.zona_residencial = pac.id_zona_residencia
      INNER JOIN regimen AS r ON r.idRegimen = pac.regimen_idRegimen
      INNER JOIN tipo_afiliciacion AS ta ON ta.tip_afi = pac.id_tipo_afiliacion
      
      WHERE pac.idPaciente = $idPaciente");

    return $consulta->result();
  }

  public function actualizardatos($datos, $idPaciente)
  {
    $this->db->where('idPaciente', $idPaciente);
    $consulta = $this->db->update('paciente', $datos);
    if ($consulta == true) {
      return true;
    } else {
      return false;
    }
  }

  function get_paciente_detalle($postData = array())
  {

    $response = array();

    if (isset($postData['pacDocumento'])) {

      $records = $this->db->query("SELECT *

        FROM paciente AS p
        INNER JOIN tipo_documento AS tp ON tp.idTipDocumento = p.pacTipDocumento
        INNER JOIN empresa AS e ON e.idEmpresa = p.empresa_idEmpresa
        INNER JOIN regimen AS r ON r.idRegimen = p.regimen_idRegimen

        WHERE
        p.pacDocumento = '" . $postData['pacDocumento'] . "' 
        ");

      $response = $records->result_array();
    }

    return $response;
  }

  function get_paciente_by_doc($pacDocumento)
  {


    $consulta = $this->db->query("SELECT *

      FROM paciente AS p

      WHERE
      p.pacDocumento = '" . $pacDocumento . "' 
      ");

    return $consulta->result();

  }

  public function ver_paciente_by_fecha($fecha1, $fecha2)
  {

    $consulta = $this->db->query("

      SELECT * FROM paciente AS p

      WHERE
      p.pacFecRegistro BETWEEN '" . $fecha1 . "'
      AND '" . $fecha2 . "'


      ");

    return $consulta->result();
  }
  public function ver_paciente_by_actualizar($fecha1, $fecha2)
  {

    $consulta = $this->db->query("

      SELECT * FROM paciente AS p

      WHERE
      p.Fecha_Actua BETWEEN '" . $fecha1 . "'
      AND '" . $fecha2 . "'


      ");

    return $consulta->result();
  }


  function get_field()
  {
    $result = $this->db->list_fields('paciente');


    return $result;

  }
  
}
